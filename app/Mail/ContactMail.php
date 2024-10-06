<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
    public function __construct($contact)
    {
        $this->contact = $contact;
    }
    public function build()
    {
        return $this->from('info@textyvoice.com', 'Texty Voice')
            ->subject('New Contact Form Submission')
            ->view('emails.contact',['contact' => $this->contact]);
    }
}
