<?php

namespace App\Http\Requests\Web\Dashboard\UserGroup;
use App\Models\GroupUser;
use Illuminate\Foundation\Http\FormRequest;
use Auth;

class StoreRequest extends FormRequest
{
    private $groupmaster;

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
            'group_id'         => 'required',
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
            'required' => 'The :attribute field is required.',
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
        $this->groupuser = GroupUser::create($this->data());
        return $this;
    }

    protected function data(): array
    {
        return [
            'group_id'  => $this->input('group_id'),
            'user_id'   => Auth::user()->id,
            'status'    => FALSE
        ];
    }

    public function getGroup(): GroupUser
    {
        return $this->groupuser;
    }
}
