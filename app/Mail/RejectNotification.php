<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RejectNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $fullname;
    public $remarks;

    /**
     * Create a new message instance.
     */
    public function __construct($fullname, $remarks)
    {
        $this->fullname = $fullname;
        $this->remarks = $remarks;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->view('emails.submission.rejectNotification')
                    ->subject('You Sponsorship has been rejected due to ' . $this->remarks); // Create a blade template in resources/views/emails/marketing.blade.php
    }
}
