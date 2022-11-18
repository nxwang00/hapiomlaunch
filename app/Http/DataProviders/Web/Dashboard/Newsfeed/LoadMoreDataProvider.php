<?php

namespace App\Http\DataProviders\Web\Dashboard\Newsfeed;
use App\Models\Newsfeed;
use App\Models\Newsfeedcomment;
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
            'comments' => Newsfeedcomment::all(),
        ];
    }

    protected function data()
    {
        $data = Newsfeed::select('*')->orderBy('newsfeeds.id','desc')->paginate(config()->get('constants.PER_PAGE_RECORD'));
        // echo "<pre>"; //print_r(Newsfeedcomment::where('newsfeed_id', 13)->get()); 
        // print_r($data);
        // exit;
        return $data;
        
    }

}
