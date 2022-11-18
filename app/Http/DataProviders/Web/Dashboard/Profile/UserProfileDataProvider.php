<?php

namespace App\Http\DataProviders\Web\Dashboard\Profile;
use App\Models\User;
use App\Models\Friendrequest;
use Illuminate\Http\Request;
use Auth;

class UserProfileDataProvider
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    //meta data info...
    public function meta()
    {
        $userdata  = $this->data();
        $friendrequest = Friendrequest::where(['request_from'=> Auth::user()->id, 'request_to' => $userdata->id])->first();

        return [
            'user' => $userdata,
            'friendrequest' => $friendrequest,
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
