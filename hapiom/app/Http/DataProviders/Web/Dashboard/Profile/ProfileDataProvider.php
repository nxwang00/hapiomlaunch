<?php

namespace App\Http\DataProviders\Web\Dashboard\Profile;
use App\Models\Userinfo;
use App\Models\Newsfeed;
use App\Models\User;
use App\Models\Friendlist;
use Illuminate\Http\Request;
use Auth;

class ProfileDataProvider
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    //meta data info...
    public function meta()
    {
        $friends_id = Friendlist::select('friend_id')->where('user_id',Auth::user()->id)->pluck('friend_id');
        return [
            'results' => $this->data(),
            'profilePosts' => Newsfeed::select('*')->where('user_id',Auth::user()->id)->orderBy('id','desc')->paginate(config()->get('constants.PER_PAGE_RECORD')),
            'friends' => User::where('id','!=',Auth::user()->id)->whereNotIn('id', $friends_id)->where('role_id',Auth::user()->role_id)->limit(10)->get(),
        ];
    }

    //data results...
    protected function data()
    {
        $data = Userinfo::where('user_id',Auth::user()->id)->orderBy('id', 'ASC');
        
        return $data->paginate(config()->get('constants.PER_PAGE_RECORD'));
    }
}
