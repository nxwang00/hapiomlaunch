<?php

namespace App\Http\Requests\Web\Dashboard\GroupUserAdmin;

use App\Models\Groupmaster;
use App\Models\GroupMasterAdmin;
use Illuminate\Foundation\Http\FormRequest;

class DestroyRequest extends FormRequest
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

    public function persist(): self
    {
        $this->group->delete();
        $this->group->groupAdmin()->delete();
        return $this;
    }

    public function getMsg(): array
    {
        return ['message' => 'The Group has been trashed successfully'];
    }
}
