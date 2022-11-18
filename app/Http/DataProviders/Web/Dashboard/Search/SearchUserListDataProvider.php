<?php

namespace App\Http\DataProviders\Web\Dashboard\Search;
// use App\Http\Resources\Web\Dashboard\Search\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class SearchUserListDataProvider
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    //data results...
    public function meta()
    {
        return [
            'results' => $this->data(),
            'keywordtext' => $this->request->keywordtext,
        ];
    }

    //data results...
    protected function data()
    {   
        $data = User::where('role_id',3)->whereNotIn('id',[Auth::user()->id])->orderBy('id', 'ASC');
        $data = $this->search($data);
        $data = $this->filter($data);
        $data = $data->paginate(config()->get('constants.PER_PAGE_RECORD'));  
        return $data->appends(['keywordtext' => $this->request->keywordtext]);      
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
        if (!empty($this->request->keywordtext)) {
            $q      = $this->request->keywordtext;
            $object = $object->where(function ($query) use ($q) {
                $query = $query->where('name', 'LIKE', "%{$q}%")
                    ->orWhere('first_name', 'LIKE', "%{$q}%")
                    ->orWhere('last_name', 'LIKE', "%{$q}%");
            });
        }
        return $object;
    }
}
