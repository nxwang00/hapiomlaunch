<?php

namespace App\Http\Controllers\Web\Dashboard\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Userinfo;
use App\Models\PaymentSetting;
use App\Models\Meberships;
use App\Http\DataProviders\Web\Dashboard\Mebership\IndexDataProvider;
use App\Http\DataProviders\Web\Dashboard\Profile\ProfileDataProvider;
use App\Http\DataProviders\Web\Dashboard\Profile\UserProfileDataProvider;
use App\Http\Requests\Web\Dashboard\Profile\UserProfileRequest;
use App\Http\Requests\Web\Dashboard\Profile\ProfileRequest;
use App\Http\Requests\Web\Dashboard\Profile\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth, Hash;
use Validator;

class ProfileController extends Controller
{

    public function index(ProfileRequest $Request, ProfileDataProvider $provider)
    {
        
        return view('dashboard.pages.profile.index', $provider->meta());
    }

    public function profileSetting()
    {
        return view('dashboard.pages.profile.profile-setting');
    }

    public function saveProfileImageUpload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'profile_image' => 'required|image|max:1000',
        ]);

        if ($validator->fails()) {

            return $validator->errors();
        }

        $status = "";
        $file = null;
        $data = [
            'user_id'     => Auth::user()->id,
            'status' => 0
        ];
        if ($request->hasFile('profile_image')) {
            $file = Storage::disk('public')->putFile('', $request->file('profile_image'), 'public');
            $image_path = public_path('images/profile');
            $public_file = $request->file('profile_image');
            $fileName = explode('images/', $file);
            $public_file->move($image_path, $fileName[0]);

            $status = "uploaded";
        }

        $userinfo = Userinfo::where('user_id', Auth::user()->id)->get()->count();
        if ($status == "uploaded") {
            if ($userinfo == 0) {
                $this->userinfo = Userinfo::create($data);
            }
            $this->userinfo = Userinfo::where('user_id', '=', Auth::user()->id)->update(array('profile_image' => $file));
        }
        

        return response($status, 200);
    }

    public function personalInformation(Request $request)
    {
        $activeTab = $request->active;

        $user_info = Userinfo::where('user_id', Auth::user()->id)->first();
        
        $payment = PaymentSetting::where('user_id', Auth::user()->id)->first();
        $meberships = Meberships::where('levelstatus', 1)->orderBy('amount', 'ASC')->get();
        $currentUserTier = $meberships[0];
        for ($i = 0; $i < count($meberships); $i++) {
            $desc = nl2br($meberships[$i]->description);
            $meberships[$i]->descs = explode("<br />", $desc);

            if (Auth::user()->meberships_id === $meberships[$i]->id)
                $currentUserTier = $meberships[$i];
        }
        $amount = Meberships::select('amount')->where('id', Auth::user()->meberships_id)->value('amount');
        return view('dashboard.pages.profile.personal-information', compact('user_info', 'payment', 'meberships', 'amount', 'currentUserTier', 'activeTab'));
    }

    public function store(StoreRequest $request)
    {

        if ($store = $request->persist()->getProfile()) {
            flashWebResponse('updated', 'Profile');
            return redirect()->route('personal-information', $store->id);
        }
        flashWebResponse('error');
        return redirect()->back();
    }

    public function userProfile(UserProfileRequest $request, UserProfileDataProvider $provider)
    {
        return view('dashboard.pages.profile.user-search-profile', $provider->meta());
    }

    public function friendRequest()
    {

        return view('dashboard.pages.profile.user-friend-request');
    }

    public function changePassword()
    {

        return view('dashboard.pages.profile.change-password');
    }

    public function updatePassword(Request $request)
    {
        $user = User::where('id', Auth::id())->first();
        $request->validate([
            'current_password'     => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!\Hash::check($value, $user->password)) {
                    return $fail(__('The current password is incorrect.'));
                }
            }],
            'new_password'     => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        User::where('name', Auth::user()->name)->update(array('password' => bcrypt($request->new_password)));

        flashWebResponse('updated', 'Password');

        return redirect()->route('personal-information');
    }

    public function aboutProfile()
    {
         
        $user_info = Userinfo::where('user_id', Auth::user()->id)->first();
        return view('customer.about.about', compact('user_info'));
    }

    public function friendlistUserProfile(ProfileRequest $request, $user)
    { 
        $data = $request->getProfile();
        $shareComponent = \Share::page(
            'https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/',
            'Your share text comes here',
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->reddit();
        $data['shareComponent'] = $shareComponent;
        $data['userstring'] = $user;
        //wreturn view('dashboard.layouts.profile_posts', $data);
        return view('dashboard.pages.profile.index', $data);
    }

    public function loadMore(ProfileRequest $request, $user)
    {
        $data = $request->getMoreProfilePosts();
        return view('dashboard.layouts.profile_posts', $data);
    }

    public function paymentSetting()
    {
        $payment = PaymentSetting::where('user_id', Auth::user()->id)->first();
        return view('dashboard.pages.profile.payment-setting', compact('payment'));
    }

    public function updatePaymentSetting(Request $request)
    {
        $request->validate([
            'stripe_key'     => 'required',
            'stripe_secret'     => 'required',
        ]);

        $payment = PaymentSetting::where('user_id', Auth::user()->id)->first();

        if (isset($payment->user_id)) {
            PaymentSetting::where('user_id', Auth::user()->id)->update(array('stripe_key' => $request->stripe_key, 'stripe_secret' => $request->stripe_secret));
        } else {
            PaymentSetting::create(['user_id' => Auth::user()->id, 'stripe_key' => $request->stripe_key, 'stripe_secret' => $request->stripe_secret]);
        }

        flashWebResponse('updated', 'Payment Setting');
        return redirect()->route('personal-information');
    }

    public function planUpgrade()
    {
        $payment = PaymentSetting::where('user_id', Auth::user()->id)->first();
        $meberships = Meberships::where('levelstatus', 1)->get();
        $amount = Meberships::select('amount')->where('id', Auth::user()->meberships_id)->value('amount');
        $payment = PaymentSetting::where('user_id', 1)->first();


        return view('dashboard.pages.profile.plan-upgrade', compact('payment', 'meberships', 'amount'));
    }

    public function getPlanValue(Request $request)
    {
        $amount = Meberships::select('amount')->where('id', $request->id)->value('amount');

        $response = [
            'amount' => $amount,
        ];
        return $response;
    }
}
