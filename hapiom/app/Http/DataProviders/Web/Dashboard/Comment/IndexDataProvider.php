<?php

namespace App\Http\DataProviders\Web\Dashboard\Comment;
use App\Models\Newsfeedcomment;
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
        $data = Newsfeedcomment::orderBy('id', 'ASC');
        // $data = $this->search($data);
        // $data = $this->filter($data);
        return $data->paginate(config()->get('constants.PER_PAGE_RECORD'));
    }

}
