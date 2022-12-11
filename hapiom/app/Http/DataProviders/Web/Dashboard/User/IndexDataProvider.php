<?php

namespace App\Http\DataProviders\Web\Dashboard\User;
use App\Models\User;
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
    protected function data($search)
    {
        $query = User::query();
        if ($search) {
            $query = $query->where('name', 'LIKE', "%{$search}%")
                           ->orWhere('email', 'LIKE', "%{$search}%")
                           ->orWhere('company_name', 'LIKE', "%{$search}%");
        }
        if(Auth::user()->role_id == 1) {
            if(isset($this->request->user)) {
                $query = $query->where('customer_id', $this->request->user);
            }
            else {
                $query = $query->where('role_id', 2);
            }
        }
        else {
            $query = $query->where('customer_id', Auth::user()->id);
        }
        $data = $query->orderBy('id', 'ASC');
        return $data->paginate(30);
    }
   
}
