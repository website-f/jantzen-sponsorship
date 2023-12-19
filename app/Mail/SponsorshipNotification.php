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
    
    public $confirmro_200ml;
    public $confirmro_500ml;
    public $confirmro_350ml;
    public $confirmro_11L;
    public $pickup_location;
    public $emailTemplate;

    /**
     * Create a new message instance.
     */
    public function __construct($template, $confirmro_200ml, $confirmro_500ml, $confirmro_350ml, $confirmro_11L, $pickup_location)
    {
        $this->emailTemplate = $template;
        $this->confirmro_200ml = $confirmro_200ml;
        $this->confirmro_500ml = $confirmro_500ml;
        $this->confirmro_350ml = $confirmro_350ml;
        $this->confirmro_11L = $confirmro_11L;
        $this->pickup_location = $pickup_location;
    }

    public function build()
    {
        return $this->view('emails.template.' . $this->emailTemplate); // Create a blade template in resources/views/emails/marketing.blade.php
    }
}
