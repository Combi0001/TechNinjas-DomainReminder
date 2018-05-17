<?php

namespace App\Console\Commands\DomainChecker;

use App\Domain;
use App\Jobs\SendDomainStatusUpdates;
use App\Mail\EmailStatusUpdate;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Mail;
use Whois\Client as WhoisClient;
use Whois\WhoisException;

class CheckDomainStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'domain-reminder:check-domains {--debug} {--errors}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks the status of the oldest last checked domains (batched in sizes of 100 domains)';

    protected $mapping;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->mapping = new ServerMapping();
    }

    /**
     * Parses the WHOIS repsonse string into a normalised array
     *
     * @param $server
     * @param $response
     * @return array
     */
    public function parse_whois_response($server, $response) {
        // Initialise the results array
        $results = [];

        // Split the lines of the response into an array
        $lines = explode("\r\n", $response);

        // Loop through the lines and parse
        foreach ($lines as $line) {
            // Skip line if it doesn't contain a ":" character
            if (strpos($line, ":") === false) {
                continue;
            }

            // Split the array by ":" character
            $split = explode(':', $line);

            // Remove the first item off the array
            $key = array_shift($split);

            // Resets the rest of the array
            $value = implode(':', $split);

            // Remove whitespaces
            $key = trim($key);
            $value = trim($value);

            // Skip if value is empty
            if (empty($value)) {
                continue;
            }

            // Get normalised key name
            $key = $this->mapping->mapKey($server, $key);

            // If key could be normalised set the value
            if (isset($key)) {
                if (empty($results[$key])) {
                    $results[$key] = $value;
                }
            }
        }

        return $results;
    }

    private function encode_value($key, $value)
    {
        switch($key) {
            case "expiry":
            case "registration_date":
                return isset($value) ? Carbon::parse($value) : $value;
            default:
                return $value;
        }
    }

    // List of users that need to be send the notifications
    private $users = [];

    /**
     * Handles preparing the status changes for sending notifications
     *
     * @param Domain $domain
     * @param $status
     */
    public function handleStatusChange(Domain $domain, $status) {
        switch($domain->status) {
            case "UNSUPPORTED":
            case "QUEUED":
            case "UNAVAILABLE":
                if ($status === "UNAVAILABLE") {
                    // No point in notifying about the domain
                    return;
                }
                break;
            case "AVAILABLE":
                if ($status === "AVAILABLE") {
                    // No point in notifying about the domain
                    return;
                }
                break;
        }

        // Get list of users from the domain
        $users = $domain->users;
        foreach ($users as $user) {
            // Check if the user wants to be notified about the domain
            if ($user->pivot->notify) {
                if (!isset($this->users[$user->id])) {
                    $this->users[$user->id] = [];
                }

                if (!isset($this->users[$user->id][$status])) {
                    $this->users[$user->id][$status] = [];
                }

                // Push the domain to the user table
                $this->users[$user->id][$status][] = $domain->domain;
            }
        }
    }

    public function sendUpdateNotifications() {
        foreach ($this->users as $user_id => $domains) {
            // Get the user
            $user = User::where('id', '=', $user_id)->first();

            // Get the users emails
            $emails = $user->emails()->select('email')->get();
            $to_emails = [];

            // Flatten the emails
            foreach ($emails as $email) {
                $to_emails[] = $email->email;
            }

            dispatch(new SendDomainStatusUpdates($domains, $to_emails));
        }
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // Check to see if debug mode is enabled
        $debug = $this->option('debug');

        // Get 100 domains with last_checked going from smallest to largest
        $domains = Domain::where('last_checked', '<', DB::raw('DATE_SUB(NOW(), INTERVAL 12 HOUR)'))->orderBy('last_checked', 'asc')->limit(100)->get();
        $count = $domains->count();

        // Check if any domains found
        if ($count === 0) {
            if ($debug) {
                $this->line('No domains found, quitting');
            }

            // Quit
            return;
        }

        if ($debug) {
            // Print the number of domains we are checking
            $this->line('Checking ' . $count . ' domains');
        }

        // Create the whois client
        $client = new WhoisClient();

        // Loop through the domains and send a whois request
        for ($i = 0; $i < $count; $i++) {
            $domain = $domains[$i];

            if ($debug) {
                // Print the domain name
                $this->line('Checking domain: ' . $domain->domain);
            }

            // Send the whois request
            $response = null;
            try {
                $response = $client->lookup($domain->domain);
            } catch (WhoisException $e) {
                $this->line("Error sending request");

                if ($this->option('errors')) {
                    $this->error($e);
                }
            }

            // Check if the we managed to get a response
            if (!isset($response)) {
                // Update the domain in the DB to be unsupported status
                $domain->status = 'UNSUPPORTED';
                $domain->expiry = null;
                $domain->registration_date = null;
            } else {
                // Initialise the final resulting data
                $details = [];

                // Prepare array for parsed reponse
                $parsed = [];

                // Prepare for primary server
                $primary = null;
                $primary_conflict = false;

                // Loop through the responses based of the servers they where received by
                foreach ($response->responses as $server => $data) {
                    // Parse the response and push it onto the response array
                    $parsed[$server] = $this->parse_whois_response($server, $data);

                    // Check if there has been a conflict with primary servers previously
                    if (!$primary_conflict && isset($parsed[$server]['whois_server'])) {
                        // Get primary server
                        $whois_server = $parsed[$server]['whois_server'];

                        // Check if primary server is set
                        if ($this->mapping->hasServer($whois_server)) {
                            // Check if primary has been set before
                            if (!isset($primary)) {
                                $primary = $whois_server;
                            } else if ($primary !== $whois_server) {
                                if ($debug) {
                                    $this->line('Primary WHOIS server conflict has occurred between ' . $primary . ' and ' . $whois_server);
                                }

                                // Set primary to null and stop checking for primary
                                $primary = null;
                                $primary_conflict = true;
                            }
                        }
                    }
                }

                // Check if primary server is set
                if (isset($primary) && isset($parsed[$primary])) {
                    // Add the primary server details first

                    // Loop through data
                    foreach ($parsed[$primary] as $key => $value) {
                        // Check if details already has the key set
                        if (isset($details[$key])) {
                            // Skip data
                            continue;
                        }

                        // Add key and value pair to the details array
                        $details[$key] = $value;
                    }
                }

                // Loop through the parsed data and add it to the details
                foreach ($parsed as $server => $data) {
                    if ($server === $primary) {
                        continue;
                    }

                    // Loop through data
                    foreach ($data as $key => $value) {
                        // Check if details already has the key set
                        if (isset($details[$key])) {
                            // Skip data
                            continue;
                        }

                        // Add key and value pair to the details array
                        $details[$key] = $value;
                    }
                }

                // Unset WHOIS Server as we don't want to store data
                if (isset($details['whois_server'])) {
                    unset($details['whois_server']);
                }

                // Check status of the domain
                $status = 'UNAVAILABLE';
                if (empty($details)) {
                    $status = 'AVAILABLE';

                    $details = [
                        'expiry' => null,
                        'registration_date' => null,
                    ];
                }

                // Send the required notification about the update in status
                $this->handleStatusChange($domain, $status);

                // Set the status for the details
                $details['status'] = $status;

                // Update the Database entry
                foreach ($details as $key => $value) {
                    $domain->{$key} = $this->encode_value($key, $value);
                }
            }

            // Update the last checked date
            $domain->last_checked = Carbon::now();

            // Save the Database entry
            $domain->save();
        }

        if ($debug) {
            $this->line('Sending update emails');
        }

        // Send all the notifications to the users
        $this->sendUpdateNotifications();
    }
}
