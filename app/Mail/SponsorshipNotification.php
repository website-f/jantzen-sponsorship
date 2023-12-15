<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SponsorshipNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($template)
    {
        $this->emailTemplate = $template;
    }

    public function build()
    {
        return $this->view('emails.template.' . $this->emailTemplate); // Create a blade template in resources/views/emails/marketing.blade.php
    }
}
