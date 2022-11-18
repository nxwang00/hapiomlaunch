<?php

namespace App\Mail\Payments;

use App\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentCancel extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The payment instance.
     *
     * @var Payment
     */
    public $client;

    /**
     * Create a new message instance.
     *
     * @param  \App\Payment $payment
     * @return void
     */
    public function __construct(Client $client)
    {

        $this->client = $client;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(get_setting_field('payment_cancel_email_subject'))->markdown('emails.payments.cancel');
    }
}
