<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointedEvent extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $event;
    public $name;
    public $contact;
    public $email;
    public $organization;
    public $natureEvent;
    public $fromDate;
    public $todate;
    public $eventAddress;
    public $attendees;
    public $explanation;
    public $booth;
    public $ro200ml;
    public $ro500ml;
    public $m350ml;
    public $ro11L;
    public $remarks;

    /**
     * Create a new message instance.
     */
    public function __construct($user, 
                               $event,
                               $name,
                                $contact,
                                $email,
                                $organization,
                                $natureEvent,
                                $fromDate,
                                $todate,
                                $eventAddress,
                                $attendees,
                                $explanation,
                                $booth,
                                $ro200ml,
                                $ro500ml,
                                $m350ml,
                                $ro11L,
                                $remarks)
    {
        $this->user = $user;
        $this->event = $event;
        $this->name = $name;
        $this->contact = $contact;
        $this->email = $email;
        $this->organization = $organization;
        $this->natureEvent = $natureEvent;
        $this->fromDate = $fromDate;
        $this->toDate = $todate;
        $this->eventAddress = $eventAddress;
        $this->attendees = $attendees;
        $this->explaination = $explanation;
        $this->booth = $booth;
        $this->ro200ml = $ro200ml;
        $this->ro500ml = $ro500ml;
        $this->m350ml = $m350ml;
        $this->ro11L = $ro11L;
        $this->remarks = $remarks;
    }

    public function build()
    {
        return $this->view('emails.submission.appointedEvent')
                    ->subject('You will be handling sponsorship for ' . $this->event . ' event'); // Create a blade template in resources/views/emails/marketing.blade.php
    }
}
