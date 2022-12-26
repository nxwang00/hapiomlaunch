<?php

namespace App\Http\Requests\Web\Dashboard\Friend;

use App\Models\User;
use App\Models\Friendrequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Auth;
class SendFriendRequest
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
        $this->friendrequest = Friendrequest::create($this->data());
        return $this;
    }

    protected function data(): array
    {
        return [
            'request_from'       => Auth::user()->id,
            'request_to'         => $this->request->user_id,
            'friendrequesttatus' => 0,
        ];
    }

    public function getMsg(): array
    {
        return ['message' => 'friend request sent successfullu.!'];
    }
}
