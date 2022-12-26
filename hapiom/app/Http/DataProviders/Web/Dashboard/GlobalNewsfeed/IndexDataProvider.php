<?php

namespace App\Http\DataProviders\Web\Dashboard\GlobalNewsfeed;
use App\Models\Newsfeed;
use App\Models\Newsfeedcomment;
use App\Models\Newsfeedcommentreply;
use App\Models\Newsfeed_gallary;
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

    public function meta()
    {
         return [
            'results' => $this->data(),
            'randomResults' => $this->getRandNewsfeeds(),
            'getEditData' => $this->getEditdata(),
            'comments' => Newsfeedcomment::all(),
            'replyComments'=> Newsfeedcommentreply::all()
        ];
    }

    protected function data()
    {
        if (Auth::user()->role_id == 3) {
            $users = User::select('id')->where('customer_id',Auth::user()->customer_id)->pluck('id');
            $data = Newsfeed::select('*')->whereIn('user_id',$users)->orWhere('user_id',Auth::user()->id)->orderBy('newsfeeds.id','desc')->paginate(config()->get('constants.NEWS_FEED_PER_PAGE_RECORD'));
        }
        else if (Auth::user()->role_id == 2) {
            $users = User::select('id')->where('customer_id',Auth::user()->id)->pluck('id');
            $data = Newsfeed::select('*')->whereIn('user_id',$users)->orWhere('user_id',Auth::user()->id)->orderBy('newsfeeds.id','desc')->paginate(config()->get('constants.NEWS_FEED_PER_PAGE_RECORD'));
        }
        else {
            $data = Newsfeed::select('*')->orderBy('newsfeeds.id','desc')->paginate(config()->get('constants.NEWS_FEED_PER_PAGE_RECORD'));
        }
        return $data;
    }

    protected function getRandArray($arr, $keys)
    {
        $data = []; 
        foreach ($keys as $key) {
            $data[] = Newsfeed::where('id', $arr[$key]['id'])->first();
        }
        return $data;
    }

    protected function getRandNewsfeeds()
    {   
        $num = 2;
        $randKeys = [];
        if (Auth::user()->role_id == 3) {
            $users = User::select('id')->where('customer_id',Auth::user()->customer_id)->pluck('id');
            $data = Newsfeed::select('*')->whereIn('user_id',$users)->orWhere('user_id',Auth::user()->id)->orderBy('newsfeeds.id','desc')->get()->toArray();
            if(count($data) > 1) {
                $randKeys = array_rand($data, $num);
            } else {
                return Newsfeed::select('*')->whereIn('user_id',$users)->orWhere('user_id',Auth::user()->id)->orderBy('newsfeeds.id','desc')->get();
            }
        }
        else if (Auth::user()->role_id == 2) {
            $users = User::select('id')->where('customer_id',Auth::user()->id)->pluck('id');
            $data = Newsfeed::select('*')->whereIn('user_id',$users)->orWhere('user_id',Auth::user()->id)->orderBy('newsfeeds.id','desc')->get()->toArray();
            if(count($data) > 1) {
                $randKeys = array_rand($data, $num);
            } else {
                return Newsfeed::select('*')->whereIn('user_id',$users)->orWhere('user_id',Auth::user()->id)->orderBy('newsfeeds.id','desc')->get();
            }
        }
        else {
            $data = Newsfeed::select('*')->orderBy('newsfeeds.id','desc')->get()->toArray();
            if(count($data) > 1) {
                $randKeys = array_rand($data, $num);
            } else {
                return Newsfeed::select('*')->orderBy('newsfeeds.id','desc')->get();
            }
        }
        return $this->getRandArray($data, $randKeys);
    }

    protected function getEditdata()
    {
        $data = Newsfeed::select('*')->where('id', $this->request->newsfeed_id)->get();
        return $data;
    }

}