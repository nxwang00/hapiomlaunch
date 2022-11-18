<?php

namespace App\Http\Requests\Web\Dashboard\Free;
use App\Models\Free;
use Illuminate\Foundation\Http\FormRequest;
use Auth;

class FreeRequest extends FormRequest
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

    public function getFree(): array
    {
        return [
            'free' => $this->free,
            'frees' => Free::where('id','!=',$this->free->id)->where('user_id',Auth::user()->customer_id)->limit(3)->get()
        ];
    }
}

