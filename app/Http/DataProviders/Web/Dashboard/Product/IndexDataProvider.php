<?php

namespace App\Http\DataProviders\Web\Dashboard\Product;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;


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
        if(Auth::user()->role_id == 2) {
           $users = User::select('id')->where('customer_id',Auth::user()->id)->pluck('id'); 
           $data  = Product::whereIn('user_id',$users)->orWhere('user_id',Auth::user()->id)->orderBy('id', 'ASC');
        }
        else {
            $data = Product::where('user_id',Auth::user()->id)->orderBy('id', 'ASC');
        }
       
        // $data = $this->search($data);
        // $data = $this->filter($data);
        return $data->paginate(config()->get('constants.PER_PAGE_RECORD'));
    }

    //data filter...
    // protected function filter($object = null)
    // {
    //     if (!empty($this->request->type)) {
    //         $object = $object->whereType($this->request->type);
    //     }
    //     return $object;
    // }

    //data search...
    // protected function search($object = null)
    // {
    //     if (!empty($this->request->keywords)) {
    //         $q      = $this->request->keywords;
    //         $object = $object->where(function ($query) use ($q) {
    //             $query = $query->where('state', 'LIKE', "%{$q}%")
    //                 ->orWhere('email', 'LIKE', "%{$q}%")
    //                 ->orWhere('city', 'LIKE', "%{$q}%")
    //                 ->orWhere('contact_person', 'LIKE', "%{$q}%");
    //         });
    //     }
    //     return $object;
    // }
}
