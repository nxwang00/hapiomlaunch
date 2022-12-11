<?php

namespace App\Http\DataProviders\Web\Dashboard\Groupmaster;
use App\Models\Groupmaster;
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
    public function meta(string $search = null)
    {
        return [
            'results' => $this->data($search),
        ];
    }

    //data results...
    protected function data(string $search = null)
    {
        $query = Groupmaster::query();
        if ($search) {
            $query = $query->where('name', 'LIKE', "%{$search}%");
        }
        $data = $query->orderBy('id', 'ASC');
        
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
