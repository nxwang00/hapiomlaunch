<?php

namespace App\Http\DataProviders\Web\Dashboard\Newsfeed;
use App\Models\Newsfeed;
use App\Models\Newsfeedcomment;
use App\Models\Newsfeedcommentreply;
use App\Models\Newsfeed_gallary;
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
        $data = Newsfeed::select('*')->orderBy('newsfeeds.id','desc')->paginate(config()->get('constants.PER_PAGE_RECORD'));
        return $data;
    }

    protected function getEditdata()
    {
        $data = Newsfeed::select('*')->where('id', $this->request->newsfeed_id)->get();
        return $data;
    }

}
