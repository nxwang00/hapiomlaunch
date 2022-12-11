<?php

namespace App\Http\DataProviders\Web\Dashboard\CustomerDashboad;
use App\Models\Userinfo;
use App\Models\Polls;
use App\Models\Newsfeed;
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
            'userinfo' => Userinfo::where('user_id',Auth::user()->id)->first(),
            'getPolls' => Polls::where('user_id',Auth::user()->customer_id)->orderBy('id', 'ASC')->get(),
            'friendlists' => Newsfeed::select('*')->orderBy('id', 'DESC')->paginate(config()->get('constants.PER_PAGE_RECORD')),
        ];
    }

    //data results...
    protected function data()
    {
        $data = Meberships::orderBy('id', 'ASC');
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
