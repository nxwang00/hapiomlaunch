<?php

namespace App\Http\Controllers\Web\Dashboard\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Userinfo;
use App\Http\DataProviders\Web\Dashboard\Mebership\IndexDataProvider;
use App\Http\DataProviders\Web\Dashboard\Profile\ProfileDataProvider;
use App\Http\DataProviders\Web\Dashboard\Profile\UserProfileDataProvider;
use App\Http\Requests\Web\Dashboard\Profile\UserProfileRequest;
use App\Http\Requests\Web\Dashboard\Profile\ProfileRequest;
use App\Http\Requests\Web\Dashboard\Profile\StoreRequest;
use Illuminate\Http\Request;
use Auth, Hash;
class ProfileController extends Controller
{

    public function index(ProfileRequest $Request, ProfileDataProvider $provider)
    {
    	return view('dashboard.pages.profile.index',$provider->meta());
    }

    public function profileSetting() {
    	return view('dashboard.pages.profile.profile-setting');
    }

    public function personalInformation() {

        $user_info = Userinfo::where('user_id',Auth::user()->id)->first();
    	return view('dashboard.pages.profile.personal-information',compact('user_info'));
    }

    public function store(StoreRequest $request){

        if($store = $request->persist()->getProfile()){
            flashWebResponse('updated', 'Profile');
            return redirect()->route('personal-information', $store->id);
        }
        flashWebResponse('error');
        return redirect()->back();
    }

    public function userProfile(UserProfileRequest $request, UserProfileDataProvider $provider) {
        return view('dashboard.pages.profile.user-search-profile',$provider->meta());
    }

    public function friendRequest() {

        return view('dashboard.pages.profile.user-friend-request');
    }

    public function changePassword() {

        return view('dashboard.pages.profile.change-password');
    }

    public function updatePassword(Request $request){

        $request->validate([
          'current_password'     => 'required',
          'new_password'     => 'required|min:6',
          'confirm_password' => 'required|same:new_password',
        ]);
        
        User::where('name',Auth::user()->name)->update(array('password'=>bcrypt($request->new_password)));

        return redirect()->route('change-password');
        
    }

    public function aboutProfile() {

        $user_info = Userinfo::where('user_id',Auth::user()->id)->first();
        return view('customer.about.about',compact('user_info'));
    }  

    public function friendlistUserProfile(ProfileRequest $request,$user) {

        return view('dashboard.pages.profile.index',$request->getProfile());
    }  
}
