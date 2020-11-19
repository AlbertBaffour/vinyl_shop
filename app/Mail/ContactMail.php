<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $request;

    /** Create a new message instance. ...*/
    public function __construct($request)
    {
        $this->request = $request;
    }

    /** Build the message. ...*/
    public function build()
    {

        return $this->from( $this->request->contact,"The Vinyl Shop - ".  ($this->request->contact == 'info@thevinylshop.com' ? 'Info' : '').
                                                                                ($this->request->contact == 'billing@thevinylshop.com' ? 'Billing' : '').
                                                                                ($this->request->contact == 'support@thevinylshop.com' ? 'Support' : '')
        )
            ->cc('info@thevinylshop.com', 'The Vinyl Shop - Info')
            ->subject('The Vinyl Shop - Contact Form')
            ->markdown('email.contact');
    }
}
