<?php

namespace App\Http\DataProviders\Web\Dashboard\Session;
use App\Models\Session_detail;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class IndexDataProvider
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
            'results' => $this->data(),
        ];
    }

    //data results...
    protected function data()
    {
        if(Auth::user()->role_id == 2) {
           $users = User::select('id')->where('customer_id',Auth::user()->id)->pluck('id'); 
           $data  = Session_detail::whereIn('user_id',$users)->orWhere('user_id',Auth::user()->id)->orderBy('id', 'ASC');
        }
        else {
            $data = Session_detail::where('user_id',Auth::user()->id)->orderBy('id', 'ASC');
        }
        return $data->paginate(config()->get('constants.PER_PAGE_RECORD'));
    }

    
}
