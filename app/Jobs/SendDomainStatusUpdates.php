<?php

namespace App\Jobs;

use App\Mail\EmailStatusUpdate;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;

class SendDomainStatusUpdates implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $domains;
    protected $emails;

    /**
     * Create a new job instance.
     *
     * @param $domains
     * @param $emails
     */
    public function __construct($domains, $emails)
    {
        $this->domains = $domains;
        $this->emails = $emails;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach($this->emails as $email) {
            Mail::to($email)->send(new EmailStatusUpdate($this->domains));
        }
    }
}
