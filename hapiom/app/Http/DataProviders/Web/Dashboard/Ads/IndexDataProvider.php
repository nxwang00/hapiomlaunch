<?php

namespace App\Http\DataProviders\Web\Dashboard\Ads;
use App\Models\GoogleAd;
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
        $data = GoogleAd::orderBy('id', 'ASC');
        // $data = $this->search($data);
        // $data = $this->filter($data);
        return $data->paginate(config()->get('constants.PER_PAGE_RECORD'));
    }

    //data filter...
    protected function filter($object = null)
    {
        if (!empty($this->request->type)) {
            $object = $object->whereType($this->request->type);
        }
        return $object;
    }

    //data search...
    protected function search($object = null)
    {
        if (!empty($this->request->keywords)) {
            $q      = $this->request->keywords;
            $object = $object->where(function ($query) use ($q) {
                $query = $query->where('state', 'LIKE', "%{$q}%")
                    ->orWhere('email', 'LIKE', "%{$q}%")
                    ->orWhere('city', 'LIKE', "%{$q}%")
                    ->orWhere('contact_person', 'LIKE', "%{$q}%");
            });
        }
        return $object;
    }
}
