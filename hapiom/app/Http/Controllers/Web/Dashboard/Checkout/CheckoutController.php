<?php

namespace App\Http\Controllers\Web\Dashboard\Checkout;
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
use App\Models\ProductCheckouts;
use App\Models\Meberships;

use App\Models\Cart;
use App\Models\PaymentSetting;
use Auth;
use Carbon\Carbon;

class CheckoutController extends Controller
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
    public function userCheckoutPost(Request $request)
    {

      $user = User::where('id', Auth::user()->id)->orderBy('updated_at','DESC')->first();
      $newamount = ($request->payment_type == 0)?$request->amount:'0.25';
      $payment = PaymentSetting::where('user_id',Auth::user()->customer_id)->first();


      if ($user->id) {
          Stripe\Stripe::setApiKey($payment->stripe_secret);
          $stripe_obj = Stripe\Charge::create ([
                  "amount" => $newamount * 100,
                  "currency" => "usd",
                  "source" => $request->stripeToken,
                  "description" => "This payment is tested purpose from hapiom development team."
          ]);

          $payment                 = new PaymentModel();
          $payment->token_id       = $request->stripeToken;
          $payment->user_id        = $user->id;
          $payment->charge_id      = $stripe_obj->id;
          $payment->currency       = 'USD';
          $payment->payment_method = 'Stripe';
          //card items...
          $payment->total = $newamount;
          $payment->save();

          $carts = Cart::where(['user_id'=> Auth::user()->id,'status' => 1])->get();
          $productdata = [];
          foreach ($carts as $cart) {
             $productdata[] = ['user_id' => $cart->user_id, 'product_id' => $cart->product_id,'amount' => $cart->amount , 'status' => 1, 'payment_id' => $payment->id];
          }
          ProductCheckouts::insert($productdata);
          Cart::where('user_id',Auth::user()->id)->delete();

          //Payment Success Mail...
          $client_email = $user->email;

          //To client mail...
          // Mail::to($client_email)->send(new PaymentSuccess($user));

          //To admin mail...
          // Mail::to(get_setting_field('email'))->send(new PaymentSuccess($user));


          flashWebResponse('message', 'Thank you! Your payment has been made successfully.');
          return redirect()->route('payment-invoice',$payment->id);


          Session::flash('success', 'Payment successful!');
          return back();
      }

        $user = User::where('id', Auth::user()->id)->orderBy('updated_at','DESC')->first();
        $newamount = ($request->payment_type == 0)?$request->amount:'0.25';

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
                                'line1' => $user->userInfo->city.','.$user->userInfo->state.','.$user->userInfo->country,
                                'postal_code' => '460666',
                                'city' => $user->userInfo->city,
                                'state' => $user->userInfo->state,
                                'country' => $user->userInfo->country,
                              ],
                            ],
                          "customer" => $customer->id,
                          "amount" => $newamount*100,
                          "currency" => "usd",
                          // "source" => $request->stripeToken,
                          "description" => "checkout new product.(".$user->id.")",
                  ],[
                    'idempotency_key' => 'a-long-random-string-'.date('YmdHis').$string
                  ]);


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
                  echo "<pre>"; print_r($payment); die();
                  //Payment Success Mail...
                  $client_email = $user->email;

                  //To client mail...
                  Mail::to($client_email)->send(new PaymentSuccess($client));

                  //To admin mail...
                  Mail::to(get_setting_field('email'))->send(new PaymentSuccess($client));

                  Session::put('status', 'Success');
                  Session::put('message', 'Thank you for your payment.');
                  return redirect()->route('dashboard');

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
                die();
                return redirect()->route('reports');
              } catch (\Stripe\Exception\RateLimitException $e) {
                 echo 'Message is:' . $e->getError()->message . '\n';
                die();
                // Too many requests made to the API too quickly
              } catch (\Stripe\Exception\InvalidRequestException $e) {
                 echo 'Message is:' . $e->getError()->message . '\n';
                die();
                // Invalid parameters were supplied to Stripe's API
              } catch (\Stripe\Exception\AuthenticationException $e) {
                 echo 'Message is:' . $e->getError()->message . '\n';
                die();
                // Authentication with Stripe's API failed
                // (maybe you changed API keys recently)
              } catch (\Stripe\Exception\ApiConnectionException $e) {
                 echo 'Message is:' . $e->getError()->message . '\n';
                die();
                // Network communication with Stripe failed
              } catch (\Stripe\Exception\ApiErrorException $e) {
                 echo 'Message is:' . $e->getError()->message . '\n';
                die();
                // Display a very generic error to the user, and maybe send
                // yourself an email
              } catch (Exception $e) {
                // Something else happened, completely unrelated to Stripe
              }
            }

        }

        return redirect()->route('admin-login');
    }

    public function paymentInvoice (Request $request,$payment_id) {
      $carts = ProductCheckouts::where('payment_id',$payment_id)->get();
      $total_amount = ProductCheckouts::where('payment_id',$payment_id)->sum('amount');
      $payment = PaymentModel::where('id',$payment_id)->first();


      return view('dashboard.pages.shopping-cart.invoice', compact('carts','total_amount', 'payment'));
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

    public function upgradePlanCheckoutPost(Request $request)
    {
      // $user = User::where('id', Auth::user()->id)->orderBy('updated_at','DESC')->first();
      // $newamount = ($request->payment_type == 0)?$request->amount:'0.25';
      // $payment = PaymentSetting::where('user_id',1)->first();
      $user_id = Auth::user()->id;
      $userPlanId = $request->membershipId;
      $userMembership = Meberships::where('id', $userPlanId)->first();

      if ($user_id) {
          Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
          $stripe_obj = Stripe\Charge::create ([
                  "amount" => $userMembership->amount * 100,
                  "currency" => "usd",
                  "source" => $request->stripeToken,
                  "description" => "Your plan is upgrade."
          ]);

          // Saving user's payment in history
          $payment                 = new PaymentModel();
          $payment->token_id       = $request->stripeToken;
          $payment->user_id        = $user_id;
          $payment->charge_id      = $stripe_obj->id;
          $payment->currency       = 'USD';
          $payment->payment_method = 'Stripe';
          $payment->total = $userMembership->amount;
          $payment->save();

          User::where('id', $user_id)->update(['meberships_id' => $request->membershipId, 'edate' => Carbon::now()->addDays(30)]);
          //Payment Success Mail...
          // $client_email = $user->email;

          //To client mail...
          // Mail::to($client_email)->send(new PaymentSuccess($user));

          //To admin mail...
          // Mail::to(get_setting_field('email'))->send(new PaymentSuccess($user));


          flashWebResponse('message', 'Thank you! Your plan has been updated successfully.');
          return redirect()->route('personal-information');
      }

      return redirect()->route('admin-login');
    }

}