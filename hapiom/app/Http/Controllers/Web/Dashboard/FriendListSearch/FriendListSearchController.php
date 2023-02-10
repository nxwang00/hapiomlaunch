<?php

namespace App\Http\Controllers\Web\Dashboard\FriendListSearch;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Friendlist;
use App\Models\Friendrequest;
use Auth;
use DB;
use App\Http\DataProviders\Web\Dashboard\Friend\FriendRequestDataProvider;
use App\Http\Requests\Web\Dashboard\Friend\SendFriendRequest;
use App\Http\Requests\Web\Dashboard\Friend\AcceptFriendRequest;
use App\Http\Requests\Web\Dashboard\Friend\IndexRequest;
use App\Http\Requests\Web\Dashboard\Friend\BlockFriendRequest;
use App\Http\Requests\Web\Dashboard\Friend\UnBlockFriendRequest;
use App\Http\Requests\Web\Dashboard\Friend\UnFriendRequest;
use App\Http\DataProviders\Web\Dashboard\Friend\FriendListDataProvider;
use App\Http\Requests\Web\Dashboard\Friend\FriendlistUserRequest;
use Illuminate\Http\Request;
use App\Repositories\Users\FriendRepository;

class FriendListSearchController extends Controller
{

    public function index(Request $request, FriendRepository $friendRepository)
    {
        $active = $request->active;
    	$friends = Friendlist::where('user_id', Auth::id())->where('friendstatus', 1)->get();
        return view('dashboard.pages.freindlistsearch.index', compact('friends', 'active', 'friendRepository'));
    }

    public function addFriend(SendFriendRequest $request, User $user)
    {
    	if (request()->ajax()) {
            $msg = $request->persist()->getMsg();
            return response()->json(['status' => 'success', 'title' => 'Friend request!', 'text' => $msg]);
        }
        return errorWebResponse();
    }

    public function acceptFriendRequest(AcceptFriendRequest $request, User $user) {
        if (request()->ajax()) {
            $msg = $request->persist()->getMsg();
            return response()->json(['status' => 'success', 'title' => 'Friend request!', 'text' => 'Friend request accept successfully.!']);
        }
        return httpWebResponse();
    }

    public function blockFriend(BlockFriendRequest $request, User $user) {

        if (request()->ajax()) {
            $msg = $request->persist()->getMsg();
            return response()->json(['status' => 'success', 'title' => 'Created!', 'text' => 'You have succussfully block.!']);
        }
        return errorWebResponse();
    }

    public function unblockFriend(UnBlockFriendRequest $request, User $user) {

        if (request()->ajax()) {
            $msg = $request->persist()->getMsg();
            return response()->json(['status' => 'success', 'title' => 'Created!', 'text' => 'You have succussfully unblock.!']);
        }
        return errorWebResponse();
    }

    public function friendListUser(FriendlistUserRequest $request, User $user){

        return view('dashboard.pages.freindlistsearch.index',$request->getFriendlistUser());
    }

    public function unFriend(UnFriendRequest $request, User $user) {

        if (request()->ajax()) {
            $msg = $request->persist()->getMsg();
            return response()->json(['status' => 'success', 'title' => 'Created!', 'text' => 'You have succussfully unfriend.!']);
        }
        return errorWebResponse();
    }

    public function ajaxSuggestFriend(Request $request)
    {
        $queryTerm = $request->get('term');
        if (!isset($queryTerm))
            return [];

        $friends_id = Friendlist::select('friend_id')->where('user_id',Auth::user()->id)->pluck('friend_id');
        $requsetFriend = Friendrequest::where('request_from', Auth::user()->id)->pluck('request_to');
        $sendRequset = Friendrequest::where('request_to', Auth::user()->id)->pluck('request_from');
        $requestedAndFrinedsId = array_merge($friends_id->toArray(), $requsetFriend->toArray(), $sendRequset->toArray());
        $allData = User::where('id','!=',Auth::user()->id)->whereNotIn('id', $requestedAndFrinedsId)->where('role_id',Auth::user()->role_id)->where('name', 'like', "%$queryTerm%")->get();

        return $allData;
    }
}
