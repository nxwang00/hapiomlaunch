<?php

namespace App\Http\DataProviders\Web\Dashboard\Friend;
use App\Models\Friendlist;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class FriendListDataProvider
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
            'user' => User::findOrfail(Auth::user()->id),
        ];
    }

    //data results...
    protected function data()
    {
        $data = Friendlist::select('users.*','friendlists.friend_id')->join('users','users.id','=','friendlists.user_id')->where(['friendlists.user_id'=>Auth::user()->id, 'friendstatus' => 1])->orderBy('friendlists.id', 'ASC');
        $data = $this->search($data);
        // $data = $this->filter($data);
        return $data->paginate(config()->get('constants.PER_PAGE_RECORD_FRIEND'));
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
                $query = $query->where('users.first_name', 'LIKE', "%{$q}%")
                    ->orWhere('users.last_name', 'LIKE', "%{$q}%")
                    ->orWhere('users.email', 'LIKE', "%{$q}%");


            });
        }
        return $object;
    }
}
