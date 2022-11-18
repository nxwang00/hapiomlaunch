<?php

namespace App\Http\Controllers\Web\Dashboard\GroupUserAdmin;

use App\Http\Controllers\Controller;
use App\Http\DataProviders\Web\Dashboard\GroupUserAdmin\IndexDataProvider;
use App\Http\Requests\Web\Dashboard\GroupUserAdmin\GroupDetailsRequest;
use App\Http\Requests\Web\Dashboard\GroupUserAdmin\IndexRequest;
use App\Http\Requests\Web\Dashboard\GroupUserAdmin\CreateRequest;
use App\Http\Requests\Web\Dashboard\GroupUserAdmin\StoreRequest;
use App\Http\Requests\Web\Dashboard\GroupUserAdmin\UpdateRequest;
use App\Http\Requests\Web\Dashboard\GroupUserAdmin\DestroyRequest;
use Illuminate\Http\Request; 
use App\Models\Groupmaster;
use Auth;
use App\Models\GroupUser;

class UserAdminGroupController extends Controller
{

    public function index(IndexRequest $request, IndexDataProvider $provider)
    {  
    	return view('dashboard.pages.groupuseradmin.index',$provider->meta());
    }
    public function create(CreateRequest $request)
    {
        return view('dashboard.pages.groupuseradmin.create', $request->getAdmin());
    } 

    public function store(StoreRequest $request)
    {

    	if ($request->persist()->getGroup()) {
            flashWebResponse('created', 'Group');
            return redirect()->route('group');
        }
        flashWebResponse('error');
        return redirect()->back();
    }

    public function groupDetail(GroupDetailsRequest $request,$id)
    {   
        return view('dashboard.pages.groupuseradmin.detail',$request->getData());
    }

    public function groupAction($group_id,$user_id,$status)
    {
        $action = GroupUser::where(['group_id' =>$group_id,'user_id' => $user_id])->update(['status' => $status]);
        if ($action) {
            flashWebResponse('message', 'You have successfully change action.');
            return redirect()->route('group-details',$group_id);
        }
        flashWebResponse('error');
        return redirect()->back();
    }

    public function destroy(DestroyRequest $request, Groupmaster $group)
    {
        if (request()->ajax()) {
            flashWebResponse('trashed', 'Group');
            return ($request->persist()->getMsg()) ? trashedWebResponse('level') : errorWebResponse();
        }
        return httpWebResponse();
    }
}
