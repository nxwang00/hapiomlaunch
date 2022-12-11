<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Auth;
use Illuminate\Queue\SerializesModels;
class SendEmailGroupInvitation extends Mailable
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
        $groupName = $this->details['group_name'];
        $inviteGroupUser = $this->details['inviteGroupUser'];
        
        return $this->from(Auth::user()->email)->view('emails.groupInvitation', compact('message','name', 'inviteGroupUser', 'groupName'));
    }
}
