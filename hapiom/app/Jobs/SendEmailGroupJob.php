<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendEmailGroupInvitation;
use Mail;

class SendEmailGroupJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new SendEmailGroupInvitation(
            [
                'message' => $this->details['message'],
                'name' => $this->details['name'] ,
                'token' => $this->details['token'],
                'group_name' => $this->details['group_name'],
                'inviteGroupUser' => $this->details['inviteGroupUser']
            ]
        );
        Mail::to($this->details['email'])->send($email);
    }
}
