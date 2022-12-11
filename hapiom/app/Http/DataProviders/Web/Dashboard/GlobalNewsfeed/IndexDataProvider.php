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

    protected function getEditdata()
    {
        $data = Newsfeed::select('*')->where('id', $this->request->newsfeed_id)->get();
        return $data;
    }

}