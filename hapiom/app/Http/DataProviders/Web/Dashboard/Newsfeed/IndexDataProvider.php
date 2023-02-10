<?php

namespace App\Http\DataProviders\Web\Dashboard\Newsfeed;
use App\Models\Newsfeed;
use App\Models\Newsfeedcomment;
use App\Models\Newsfeedcommentreply;
use App\Models\Newsfeed_gallary;
use App\Models\User;
use App\Models\GroupUser;
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
            'replyComments'=> Newsfeedcommentreply::all(),
            'group_id' => isset($this->request->group_id)?($this->request->group_id):'',
        ];
    }

    protected function data()
    {
         
        /*if(isset($this->request->group_id) && !empty($this->request->group_id))
        {
            if(isset($this->request->newsfeed_id) && !empty($this->request->newsfeed_id))
            return $this->getEditdata();
            $users = GroupUser::select('user_id')->where('group_id',($this->request->group_id))->where('status',1)->pluck('user_id');
            $data = Newsfeed::select('*')->whereIn('user_id',$users)->where('group_id',($this->request->group_id))->orderBy('newsfeeds.id','desc')->paginate(config()->get('constants.NEWS_FEED_PER_PAGE_RECORD'));
            return $data;

        }
        if (Auth::user()->role_id == 3) {
            if(isset($this->request->newsfeed_id) && !empty($this->request->newsfeed_id))
            return $this->getEditdata();
            $users = User::select('id')->where('customer_id',Auth::user()->customer_id)->pluck('id');
            $data = Newsfeed::select('*')->whereIn('user_id',$users)->orWhere('user_id',Auth::user()->id)->where('group_id',null)->orderBy('newsfeeds.id','desc')->paginate(config()->get('constants.NEWS_FEED_PER_PAGE_RECORD'));
        }
        else if (Auth::user()->role_id == 2) {
            if(isset($this->request->newsfeed_id) && !empty($this->request->newsfeed_id))
            return $this->getEditdata();
            $users = User::select('id')->where('customer_id',Auth::user()->id)->pluck('id');
            $data = Newsfeed::select('*')->whereIn('user_id',$users)->orWhere('user_id',Auth::user()->id)->where('group_id',null)->orderBy('newsfeeds.id','desc')->paginate(config()->get('constants.NEWS_FEED_PER_PAGE_RECORD'));
        }
        else {*/
            if(isset($this->request->newsfeed_id) && !empty($this->request->newsfeed_id))
            return $this->getEditdata();
            $data = Newsfeed::select('*')->where('group_id',null)->orderBy('newsfeeds.id','desc')->paginate(config()->get('constants.NEWS_FEED_PER_PAGE_RECORD'));
        //}
         
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
    {   $num = 2;
        $randKeys = [];
        if(isset($this->request->group_id) && !empty($this->request->group_id))
        {
            if(isset($this->request->newsfeed_id) && !empty($this->request->newsfeed_id))
            return $this->getEditdata();
            $users = GroupUser::select('user_id')->where('group_id',($this->request->group_id))->where('status',1)->pluck('user_id');
            $data = Newsfeed::select('*')->whereIn('user_id',$users)->where('group_id',($this->request->group_id))->orderBy('newsfeeds.id','desc')->get()->toArray();
            if(count($data) > 1) {
                $randKeys = array_rand($data, $num);
            } else {
                return Newsfeed::select('*')->whereIn('user_id',$users)->where('group_id',($this->request->group_id))->orderBy('newsfeeds.id','desc')->get();
            }

        }
        if (Auth::user()->role_id == 3) {
            if(isset($this->request->newsfeed_id) && !empty($this->request->newsfeed_id))
            return $this->getEditdata();
            $users = User::select('id')->where('customer_id',Auth::user()->customer_id)->pluck('id');
            $data = Newsfeed::select('*')->whereIn('user_id',$users)->orWhere('user_id',Auth::user()->id)->where('group_id',null)->orderBy('newsfeeds.id','desc')->get()->toArray();
            if(count($data) > 1) {
                $randKeys = array_rand($data, $num);
            } else {
                return Newsfeed::select('*')->whereIn('user_id',$users)->orWhere('user_id',Auth::user()->id)->where('group_id',null)->orderBy('newsfeeds.id','desc')->get();
            }
        }
        else if (Auth::user()->role_id == 2) {
            if(isset($this->request->newsfeed_id) && !empty($this->request->newsfeed_id))
            return $this->getEditdata();
            $users = User::select('id')->where('customer_id',Auth::user()->id)->pluck('id');
            $data = Newsfeed::select('*')->whereIn('user_id',$users)->orWhere('user_id',Auth::user()->id)->where('group_id',null)->orderBy('newsfeeds.id','desc')->get()->toArray();
            if(count($data) > 1) {
                $randKeys = array_rand($data, $num);
            } else {
                return Newsfeed::select('*')->whereIn('user_id',$users)->orWhere('user_id',Auth::user()->id)->where('group_id',null)->orderBy('newsfeeds.id','desc')->get();
            }
        }
        else {
            if(isset($this->request->newsfeed_id) && !empty($this->request->newsfeed_id))
            return $this->getEditdata();
            $data = Newsfeed::select('*')->where('group_id',null)->orderBy('newsfeeds.id','desc')->get()->toArray();
            if(count($data) > 1) {
                $randKeys = array_rand($data, $num);
            } else {
                return Newsfeed::select('*')->where('group_id',null)->orderBy('newsfeeds.id','desc')->get();
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
