<?php

namespace App\Http\Requests\Web\Dashboard\Groupmaster;

use App\Models\Groupmaster;
use App\Models\GroupMasterAdmin;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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

    public function getData(): array
    {
        return [
            'groupmaster' => Groupmaster::findOrFail($this->id),
            'groupadmins' =>  GroupMasterAdmin::select('user_id')->where('groupmaster_id',$this->id)->pluck('user_id')->toArray(),
            'users' => User::where(['role_id' => 2, 'block' => 1])->get(),

        ];
    }
}
