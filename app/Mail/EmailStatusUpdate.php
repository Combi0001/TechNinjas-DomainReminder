<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailStatusUpdate extends Mailable
{
    use Queueable, SerializesModels;

    protected $available;
    protected $unavailable;

    protected $single;

    /**
     * Create a new message instance.
     *
     * @param $domains
     */
    public function __construct($domains)
    {
        $total = 0;

        // Get available domains to notify about
        if (isset($domains['AVAILABLE'])) {
            $this->available = $domains['AVAILABLE'];
            $total += count($this->available);
        } else {
            $this->available = [];
        }

        // Get unavailable domains to notify about
        if (isset($domains['UNAVAILABLE'])) {
            $this->available = $domains['UNAVAILABLE'];
            $total += count($this->unavailable);
        } else {
            $this->unavailable = [];
        }

        // If total domains is 1 change text
        $this->single = ($total === 1);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
            'available' => $this->available,
            'unavailable' => $this->unavailable,
        ];

        if ($this->single) {
            return $this->subject("A domain has changes status")
                ->view('mail.domain_status', $data);
        } else {
            return $this->subject("Multiple domains has changes status")
                ->view('mail.domains_status', $data);
        }
    }
}
