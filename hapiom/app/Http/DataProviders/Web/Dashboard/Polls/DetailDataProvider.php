<?php

namespace App\Http\DataProviders\Web\Dashboard\Polls;
use App\Models\Pollsresult;
use Illuminate\Http\Request;
use Auth;

class DetailDataProvider
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
        $data = Pollsresult::orderBy('id', 'ASC');

        return $data->paginate(config()->get('constants.PER_PAGE_RECORD'));
    }
    
}
