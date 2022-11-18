<?php

namespace App\Http\DataProviders\Web\Dashboard\Search;
use App\Http\Resources\Web\Dashboard\Search\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class SearchUserDataProvider
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    //data results...
    public function getUsers()
    {   
        return new UserCollection(User::where('role_id',3)->where('name','LIKE', '%'.$this->request->keywordtext.'%')->get());
    }
}
