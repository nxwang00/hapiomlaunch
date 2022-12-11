<?php

namespace App\Http\DataProviders\Web\Dashboard\Free;
use App\Models\Free;
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
        $data = Free::orderBy('id', 'ASC');
        
        return $data->paginate(config()->get('constants.PER_PAGE_RECORD'));
    }
}
