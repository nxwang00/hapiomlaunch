<?php

namespace App\Http\Requests\Web\Dashboard\Friend;

use App\Models\User;
use App\Models\Friendrequest;
use App\Models\Friendlist;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Auth;
class AcceptFriendRequest
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [

        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [

        ];
    }

    public function persist(): self
    { 
        $this->friendrequest = Friendlist::create($this->data());
        $this->friendrequest = Friendlist::create(['user_id' => $this->request->user->id, 'friend_id' => Auth::user()->id,'friendstatus' => 1]);
        Friendrequest::where(['request_to' => Auth::user()->id, 'request_from' =>$this->request->user->id])->delete();
        return $this;
    }

    protected function data(): array
    {
        return [
            'user_id'       => Auth::user()->id,
            'friend_id'     => $this->request->user->id,
            'friendstatus'  => 1,
        ];
    }

    public function getMsg(): array
    {
        return ['message' => 'friend request accepted.!'];
    }
}
