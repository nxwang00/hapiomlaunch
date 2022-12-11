<?php

namespace App\Http\DataProviders\Web\Dashboard\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class FriendRequestDataProvider
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    //meta data info...
    public function meta()
    {
        return [
            'user' => $this->data(),
        ];
    }

    //data results...
    protected function data()
    {
        $query = User::query();
        if(isset($this->request->name)) {
            $query = $query->where('name', $this->request->name)->first();
            return $query;
        }        
        return [];
    }
   
}
