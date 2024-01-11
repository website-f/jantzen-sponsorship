<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubmitNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($event, $date)
    {
        $this->event = $event;
        $this->date = $date;
    }

    public function build()
    {
        return $this->view('emails.submission.submitNotification')
                    ->subject('Sponsorship Request for ' . $this->event . ' event - ' . $this->date); // Create a blade template in resources/views/emails/marketing.blade.php
    }
}
