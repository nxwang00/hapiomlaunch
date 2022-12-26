<?php

namespace App\Http\Controllers\Web\Dashboard\Globalnewsfeed;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Newsfeed;
use App\Models\Newsfeed_gallary;
use App\Models\Userinfo;
use App\Models\Friendlist;
use App\Models\Friendrequest;
use App\Models\Newsfeedlike;
use App\Models\Newsfeedcomment;
use App\Models\Newsfeedcommentlike;
use App\Models\Newsfeedcommentreply;
use App\Http\DataProviders\Web\Dashboard\GlobalNewsfeed\IndexDataProvider;
use App\Http\Requests\Web\Dashboard\GlobalNewsfeed\IndexRequest;
use Illuminate\Http\Request;
use Auth;

class GlobalNewsfeedController extends Controller
{

    public function index(IndexRequest $request, IndexDataProvider $provider)
    {
    	$userinfo = Userinfo::where('user_id',Auth::user()->id)->first();
        $friends_id = Friendlist::select('friend_id')->where('user_id',Auth::user()->id)->pluck('friend_id');
        $requsetFriend = Friendrequest::where('request_from', Auth::user()->id)->pluck('request_to');
        $sendRequset = Friendrequest::where('request_to', Auth::user()->id)->pluck('request_from');
        $requestedAndFrinedsId = array_merge($friends_id->toArray(), $requsetFriend->toArray(), $sendRequset->toArray());
        $allData = User::where('id','!=',Auth::user()->id)->whereNotIn('id', $requestedAndFrinedsId)->where('role_id',Auth::user()->role_id)->limit(10)->get();
        $accepted_friend_ids = Friendlist::select('friend_id')->where('user_id', Auth::id())->where('friendstatus', 1)->pluck('friend_id');
        $acceptedFriends = User::whereIn('id', $accepted_friend_ids->toArray())->limit(10)->get();
        $data = [
		    'userinfo'  => $userinfo,
		    'friends'   => $allData,
            'acceptedFriends' => $acceptedFriends
		]; 

    	return view('dashboard.pages.globalnewsfeed.index',$provider->meta())->with($data);
    }
}
