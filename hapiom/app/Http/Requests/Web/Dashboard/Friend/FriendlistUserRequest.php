<?php

namespace App\Http\Requests\Web\Dashboard\Friend;

use App\Models\Friendlist;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Auth;

class FriendlistUserRequest extends FormRequest
{

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

    public function getFriendlistUser(): array
    {
        return [
            'results' => Friendlist::join('users','users.id','=','friendlists.user_id')->where(['friendlists.user_id'=>$this->user->id, 'friendstatus' => 1])->orderBy('friendlists.id', 'ASC')->paginate(config()->get('constants.PER_PAGE_RECORD_FRIEND')),
            'user' => User::findOrfail($this->user->id),
        ];
    }
}
