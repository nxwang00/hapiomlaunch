<?php

namespace App\Mail\Payments;

use App\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;
use Storage;

class PaymentSuccess extends Mailable
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
        $email = $this->subject( get_setting_field('payment_success_email_subject') . ' ' . strtoupper($this->client->claim_number))->markdown('emails.payments.success');

        try{
            //generate & store pdf...
            $pdfName = 'LostItem' . strtoupper($this->client->claim_number) . '.pdf';

            ini_set('max_execution_time', 300); // 5 minutes
            $pdf = PDF::loadView('dashboard.pages.reports.pdf', ['client' => $this->client]);
            Storage::put('public/reports/pdf/' . $pdfName, $pdf->output());

            if (!empty($pdfName)) {
                if (storage_path() . '/app/public/reports/pdf/' . $pdfName) {
                    $email = $email->attach(storage_path() . '/app/public/reports/pdf/' . $pdfName, [
                        'as'   => $pdfName,
                        'mime' => 'application/pdf',
                    ]);
                }
            }

        } catch (Exception $ex) {
            // Debug via $ex->getMessage();
        }

        return $email;

    }
}
