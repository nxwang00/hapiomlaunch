<?php

namespace App\Http\Controllers\Web\Dashboard\Search;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\DataProviders\Web\Dashboard\Search\SearchUserDataProvider;
use App\Http\DataProviders\Web\Dashboard\Search\SearchUserListDataProvider;
use App\Http\Requests\Web\Dashboard\Search\SearchUserRequest;
use App\Http\Requests\Web\Dashboard\Search\SearchUserListRequest;

use Illuminate\Http\Request;

class SeacrhController extends Controller
{

    public function index()
    {	 
    	return view('dashboard.pages.search.index');
    }

    public function searchUser(SearchUserRequest $request, SearchUserDataProvider $provider) 
    {
        if (request()->ajax()) {
            return response()->json(['names' =>$provider->getUsers()]);
        }
    }

    public function searchUserList(SearchUserListRequest $request, SearchUserListDataProvider $provider)
    {   
        return view('dashboard.pages.search.search_users_list', $provider->meta());
    }
}
