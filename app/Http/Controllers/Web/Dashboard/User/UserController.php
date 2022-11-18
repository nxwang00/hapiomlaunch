<?php

namespace App\Http\Controllers\Web\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Userinfo;
use App\Http\DataProviders\Web\Dashboard\User\IndexDataProvider;
use App\Http\Requests\Web\Dashboard\User\BlockRequest;
use App\Http\Requests\Web\Dashboard\User\UnBlockRequest;
use App\Http\Requests\Web\Dashboard\User\DeleteRequest;

use App\Http\Requests\Web\Dashboard\Mebership\EditRequest;
use App\Http\Requests\Web\Dashboard\User\IndexRequest;
use App\Http\Requests\Web\Dashboard\Mebership\StoreRequest;
use App\Http\Requests\Web\Dashboard\Mebership\UpdateRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(IndexRequest $request, IndexDataProvider $provider)
    {
    	return view('dashboard.pages.user.index',$provider->meta());
    }

    public function blockUser(BlockRequest $request, User $user) 
    {
        if (request()->ajax()) {
            flashWebResponse('block', 'block! user has been block successfully.');
            return ($request->persist()->getMsg()) ? blockWebResponse('block') : errorWebResponse();
        }
        return httpWebResponse();
    }

    public function unblockUser(UnBlockRequest $request, User $user) 
    {
        if (request()->ajax()) {
            flashWebResponse('unblock', 'unblock! user has been unblock successfully.');
            return ($request->persist()->getMsg()) ? unblockWebResponse('block') : errorWebResponse();
        }
        return httpWebResponse();
    }

    public function userList(IndexRequest $request, IndexDataProvider $provider) 
    {
       return view('dashboard.pages.user.userlist',$provider->meta());
    }

    public function create(CreateRequest $request)
    {
    	return view('dashboard.pages.mebership.create',$request->getStore());
    }

    public function store(StoreRequest $request)
    {
    	if ($level = $request->persist()->getLevel()) {
            flashWebResponse('created', 'store level');
            return redirect()->route('mebership', $level->id);
        }
        flashWebResponse('error');
        return redirect()->back();
    }
    public function edit(Request $request,$meberships)
    {   
        $meberships = Meberships::findOrFail($meberships);
        $storemasters = Storemasters::join('storepermisions','storepermisions.store_id','storemasters.id')->where('storepermisions.meberships_id',$meberships->id)->get();
        return view('dashboard.pages.mebership.edit',['meberships' => $meberships,'storemasters' => $storemasters]);
    }

    public function update(UpdateRequest $request, Meberships $meberships)
    {   
        if ($update = $request->persist()->getMeberships()) {
            flashWebResponse('updated', 'level');
            return redirect()->route('mebership-edit', $update->id);
        }
        flashWebResponse('error');
        return redirect()->back();
    }

    public function destroy(DestroyRequest $request, Meberships $mebership)
    {
        if (request()->ajax()) {
            flashWebResponse('trashed', 'level');
            return ($request->persist()->getMsg()) ? trashedWebResponse('level') : errorWebResponse();
        }
        return httpWebResponse();
    }

    public function delete(DeleteRequest $request, User $user)
    {
        if (request()->ajax()) {
            flashWebResponse('trashed', 'user');
            return ($request->persist()->getMsg()) ? trashedWebResponse('level') : errorWebResponse();
        }
        return httpWebResponse();
    }

    public function admindetails(User $user) 
    {       
       return view('dashboard.pages.user.admindetails',compact('user'));
    }

    public function addUserComment(Request $request) {
        $this->validate($request, [
          'comment' => 'required',
        ]);
     
        //  Store data in database
        $userinfo = Userinfo::where('user_id',$request->user_id)->first();
        if (isset($userinfo->user_id)) {
            Userinfo::where('user_id',$request->user_id)->update(['comment' => $request->comment]);
        }
        else {
            Userinfo::create(['comment' => $request->comment, 'user_id' => $request->user_id]);
        }
        flashWebResponse('updated', 'comment');
        return redirect()->route('user.viewdetails', $request->user_id);
    }
}
