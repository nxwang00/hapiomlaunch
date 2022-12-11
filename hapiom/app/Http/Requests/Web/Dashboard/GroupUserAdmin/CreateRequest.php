<?php

namespace App\Http\Requests\Web\Dashboard\GroupUserAdmin;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class CreateRequest extends FormRequest
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

    public function getAdmin(): array
    {
        return [
           'users' => User::where(['role_id' => 2, 'block' => 1])->get()
        ];
    }

    
}
