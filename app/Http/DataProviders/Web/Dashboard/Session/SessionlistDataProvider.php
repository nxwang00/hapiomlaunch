<?php

namespace App\Http\DataProviders\Web\Dashboard\Session;
use App\Models\Session_detail;
use Illuminate\Http\Request;
use Auth;

class SessionlistDataProvider
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
        $data = Session_detail::where('user_id',Auth::user()->customer_id)->orderBy('id', 'ASC');
        
        return $data->paginate(config()->get('constants.PER_PAGE_RECORD'));
    }

}
