<?php

namespace App\Http\Controllers\Web\Dashboard\Shopping;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Cart;
use App\Models\PaymentSetting;
use App\Http\DataProviders\Web\Dashboard\IndexDataProvider;
use Illuminate\Http\Request;
use Auth;

class ShoppingCartController extends Controller
{

    public function index()
    {
        $carts = Cart::where(['user_id'=> Auth::user()->id])->get();
        $total_amount = 0;
        foreach($carts as $cart)
        {
            if ($cart->product->type === 'course')
            {
                $regex = "/[0-9]+/";
                $string = $cart->product->image_video;
                preg_match($regex, $string, $match);

                $videoId = $match[0];

                $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$videoId.php"));
                $thumbnail = $hash[0]['thumbnail_medium'];
                $cart->thumbnail = $thumbnail;
            }
            $total_amount += $cart->product->price;
        }
        $payment = PaymentSetting::where('user_id',Auth::user()->customer_id)->first();

    	return view('dashboard.pages.shopping-cart.index', compact('carts','total_amount', 'payment'));
    }

    public function removeCart (Request $request, $id) {

    	if (request()->ajax()) {
            Cart::where('id', $id)->delete();
            return response()->json(['status' => 'success', 'title' => 'Remove Cart!', 'text' => 'Remove Cart Successfully.!']);
        }
        return errorWebResponse();
    }

    public function checkout (Request $request) {

        $carts = Cart::where(['user_id'=> Auth::user()->id])->get();
        $total_amount = Cart::select('amount')->where('user_id',Auth::user()->id)->sum('amount');
        $payment = PaymentSetting::where('user_id',Auth::user()->customer_id)->first();

        return view('dashboard.pages.shopping-cart.checkout', compact('carts','total_amount','payment'));

    }

    public function addToCart($id)
    {
        $cart = new Cart;
        $cart->user_id = Auth::id();
        $cart->product_id= $id;
        $cart->save();

        if (isset($cart->id))
        {
            return response()->json("ok");
        }
        return response()->json("failed");
    }
}
