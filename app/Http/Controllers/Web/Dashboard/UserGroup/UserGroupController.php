<?php

namespace App\Http\Controllers\Web\Dashboard\UserGroup;

use App\Http\Controllers\Controller;
use App\Http\DataProviders\Web\Dashboard\UserGroup\IndexDataProvider;
use App\Http\Requests\Web\Dashboard\UserGroup\IndexRequest;
use App\Http\Requests\Web\Dashboard\UserGroup\JoinGroupRequest;
use App\Http\Requests\Web\Dashboard\UserGroup\StoreRequest;
use Illuminate\Http\Request;
use Auth;

class UserGroupController extends Controller
{

    public function index(IndexRequest $request, IndexDataProvider $provider)
    {  
    	return view('dashboard.pages.usergroup.index',$provider->meta());
    }

    public function joinGroup(StoreRequest $request)
    {   
        if ($request->persist()->getGroup()) {
            flashWebResponse('message', 'You have successfully joined the group');
            return redirect()->route('user-groups');
        }
        flashWebResponse('error');
        return redirect()->back();
    }  
}
