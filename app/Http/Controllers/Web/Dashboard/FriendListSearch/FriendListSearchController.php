<?php

namespace App\Http\Controllers\Web\Dashboard\FriendListSearch;

use App\Http\Controllers\Controller;
use App\Models\User;
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

class FriendListSearchController extends Controller
{

    public function index(IndexRequest $request, FriendListDataProvider $provider)
    {
    	return view('dashboard.pages.freindlistsearch.index',$provider->meta());
    }

    public function addFriend(SendFriendRequest $request, User $user)
    {
    	if (request()->ajax()) {
            $msg = $request->persist()->getMsg();
            return response()->json(['status' => 'success', 'title' => 'Friend request!', 'text' => 'Friend request sent successfully.!']);
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

    

        
}
