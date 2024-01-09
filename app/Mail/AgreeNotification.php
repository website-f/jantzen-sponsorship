<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AgreeNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $phone;
    public $name;

    /**
     * Create a new message instance.
     */
    public function __construct($email, $phone, $name)
    {
        $this->email = $email;
        $this->phone = $phone;
        $this->name = $name;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->view('emails.submission.agreeNotification')
                    ->subject('The user agree to provide proof of agreement'); // Create a blade template in resources/views/emails/marketing.blade.php
    }
}
