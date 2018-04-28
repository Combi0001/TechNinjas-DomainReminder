<?php

namespace App\Console\Commands;

use App\Domain;
use Illuminate\Console\Command;
use Whois\Client as WhoisClient;
use Whois\WhoisException;

class CheckDomainStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'domain-reminder:check-domains {--debug}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks the status of the oldest last checked domains (batched in sizes of 100 domains)';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function parseWhoisResponse($server, $response) {
        // Initialise the results array
        $results = [];

        // Split the lines of the response into an array
        $lines = explode("\r\n", $response);

        // Loop through the lines and parse
        foreach ($lines as $line) {
            // Check if the line doesn't contain a ":" character
            if (strpos($line, ":") === false) {
                // Skip line if it doesn't
                continue;
            }

            // Split the array by ":" character
            $split = explode(':', $line);

            // Remove the first item off the array
            $key = array_shift($split);

            // Resets the rest of the array
            $value = implode(':', $split);

            // TODO: Sort and rename the key based of the server that the whois response is sent from
            $results[$key] = $value;
        }

        return $results;
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
        $domains = Domain::orderBy('last_checked', 'asc')->limit(100)->get();
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
                $this->error("Error sending request\n" . $e);
            }

            // Check if the we managed to get a response
            if (!isset($response)) {
                // TODO: SET STATUS AS ERROR
                continue;
            } else {
                // Initialise the final resulting data
                $details = [];

                // Prepare array for parsed reponse
                $parsed = [];

                // Loop through the responses based of the servers they where received by
                foreach ($response->responses as $server => $data) {
                    // Parse the response and push it onto the response array
                    $parsed[$server] = $this->parseWhoisResponse($server, $data);

                    // TODO: Check for primary server
                }

                // TODO: Add the primary server's details first

                // Loop through the parsed data and add it to the details
                foreach ($parsed as $server => $data) {
                    // TODO: Skip if primary sever

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

                // TODO: Update database to reflect parsed data
            }
        }
    }
}
