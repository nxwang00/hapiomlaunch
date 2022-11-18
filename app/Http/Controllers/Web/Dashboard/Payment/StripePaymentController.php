<?php
   
namespace App\Http\Controllers\Web\Dashboard\Payment;
use App\Http\Controllers\Controller;
use App\Mail\Payments\PaymentCancel;
use App\Mail\Payments\PaymentSuccess;
use App\Models\Payment as PaymentModel;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;   
use Redirect;
use Session;
use Stripe;
use Exception;
use App\Log;
use App\Models\User;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
    */
    public function stripePost(Request $request)
    {
        $user = User::where('email', $request->email)->orderBy('updated_at','DESC')->first();
        // $client = new Client();
        // if ( $request->clients_id && $request->clients_id > 0 ) {
        //     $client = Client::findOrFail($request->clients_id);
        // }
        // else
        // {
        //   return redirect()->route('reports');
        // }
        $newamount = ($request->payment_type == 0)?$request->amount:'0.25';    
        $result = $request->tokendetail;
        if ($user->id) {
            //save client id...
            $string = str_random(6);
            Session::put('client', $user->id);
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));           

            try {
            /** Add customer to stripe, Stripe customer */
                $customer = Stripe\Customer::create([
                    'email'  => $user->email,
                    'name'   => $user->name,
                    'source' => $request->stripeToken,
                ]);
            } catch (Exception $e) {
                // PaymentStatuslog::where('client_id',$client->id)->update(['step_2' => 'Failed', 'payment_method' => 'Stripe']);
                $apiError = $e->getMessage();
                echo $apiError;
            }
            if (empty($apiError) && $customer) {
              try {
                  $stripe_obj = Stripe\Charge::create ([
                          'shipping' => [
                              'name' => $user->name,
                              'address' => [
                                'line1' => 'test city',
                                'postal_code' => '460666',
                                'city' => 'indore',
                                'state' => 'mp',
                                'country' => $request->country,
                              ],
                            ],
                          "customer" => $customer->id,
                          "amount" => 100*100,
                          "currency" => "usd",
                          // "source" => $request->stripeToken,
                          "description" => "Hapiom Paid plan.(".$user->id.")",
                  ],[
                    'idempotency_key' => 'a-long-random-string-'.date('YmdHis').$string
                  ]);                                

                  // $client                 = Client::findOrFail($request->clients_id);
                  // $claim_number           = $first_digit_year.''.$second_digit_month.''.$third_digits.'-'.$request->clients_id;
                  // $client->claim_start    = $third_digits;
                  // $client->claim_number   = $claim_number;
                  // $client->status         = '7';
                  // $client->operation_type = 'New claim is created.';
                  // $client->payment_status = 'Success';
                  // $client->save();            
                  /**
                   * add transaction to DB...
                   */

                  // $payer_email = $result->payer->payer_info->email;
                  // $payer_total = $result->transactions[0]->amount->total;

                  $payment                 = new PaymentModel();
                  $payment->token_id       = $request->stripeToken;
                  $payment->client_id      = $request->clients_id;
                  $payment->charge_id      = $stripe_obj->id;
                  $payment->currency       = 'USD';
                  $payment->payment_status = 'success';
                  $payment->payment_method = 'Stripe';
                  //card items...
                  $payment->total = $newamount;
                  $payment->save();
                  //Payment Success Mail...
                  $client_email = $user->email;

                  //To client mail...
                  Mail::to($client_email)->send(new PaymentSuccess($client));

                  //To admin mail...
                  Mail::to(get_setting_field('email'))->send(new PaymentSuccess($client));
                  
                  Session::put('status', 'Success');
                  Session::put('message', 'Thank you for your payment.');
                  return redirect()->route('payments.status');

              } catch(\Stripe\Exception\CardException $e) {
                // Since it's a decline, \Stripe\Exception\CardException will be caught
                // $client                 = Client::findOrFail(Session::get('client'));
                // PaymentStatuslog::where('client_id',$client->id)->update(['step_2' => 'Failed', 'payment_method' => 'Stripe']);
                echo 'Status is:' . $e->getHttpStatus() . '\n';
                echo 'Type is:' . $e->getError()->type . '\n';
                echo 'Code is:' . $e->getError()->code . '\n';
                // param is '' in this case
                echo 'Param is:' . $e->getError()->param . '\n';
                echo 'Message is:' . $e->getError()->message . '\n';
                return redirect()->route('reports');
              } catch (\Stripe\Exception\RateLimitException $e) {
                // Too many requests made to the API too quickly
              } catch (\Stripe\Exception\InvalidRequestException $e) {
                // Invalid parameters were supplied to Stripe's API
              } catch (\Stripe\Exception\AuthenticationException $e) {
                // Authentication with Stripe's API failed
                // (maybe you changed API keys recently)
              } catch (\Stripe\Exception\ApiConnectionException $e) {
                // Network communication with Stripe failed
              } catch (\Stripe\Exception\ApiErrorException $e) {
                // Display a very generic error to the user, and maybe send
                // yourself an email
              } catch (Exception $e) {
                // Something else happened, completely unrelated to Stripe
              }
            }
            
        }

        return redirect()->route('admin-login');
    }


    public function getClaimDetails(Request $request, $charge_id)
    {
      // Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      // $stripe = new Stripe\StripeClient(env('STRIPE_SECRET'));
      //           $stripe->tokens->retrieve(
      //             'tok_1K12mcSIVNjpufxVkRiQ3Wqr',
      //             []
      //           );
      // echo "<pre>"; print_r($stripe); die();
      // Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      $stripe = new \Stripe\StripeClient(
        env('STRIPE_SECRET')
      );
      $data = $stripe->charges->retrieve(
        $charge_id,
        []
      );
      return view('dashboard.pages.paymentdetial.claim-details', compact('data'));

      echo "<pre>"; print_r($data); die();

      

    }

}