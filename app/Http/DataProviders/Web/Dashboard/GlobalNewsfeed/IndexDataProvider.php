<?php

namespace App\Http\DataProviders\Web\Dashboard\GlobalNewsfeed;
use App\Models\Newsfeed;
use App\Models\Newsfeed_gallary;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;


class IndexDataProvider
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function meta()
    {
        return [
            'results' => $this->data(),
        ];
    }

    protected function data()
    {
        if(Auth::user()->role_id == 2) {
           $users = User::select('id')->where('customer_id',Auth::user()->id)->pluck('id');
           $data = Newsfeed::whereIn('user_id',$users)->orWhere('user_id',Auth::user()->id)->orderBy('newsfeeds.id','desc')->paginate(config()->get('constants.PER_PAGE_RECORD'));
        } else {
           $data = Newsfeed::where('user_id',Auth::user()->id)->orderBy('newsfeeds.id','desc')->paginate(config()->get('constants.PER_PAGE_RECORD'));
        }
        return $data;
    }

}