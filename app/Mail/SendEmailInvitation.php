<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class SendEmailInvitation extends Mailable
{
    use Queueable, SerializesModels;
    protected $details;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $message = $this->details['message'];
        $name = $this->details['name'];
        return $this->view('emails.invitation', compact('message','name'));
    }
}
