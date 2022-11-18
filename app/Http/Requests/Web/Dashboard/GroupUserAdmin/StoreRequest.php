<?php

namespace App\Http\Requests\Web\Dashboard\GroupUserAdmin;
use App\Models\Groupmaster;
use App\Models\GroupMasterAdmin;
use Illuminate\Foundation\Http\FormRequest;

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
            'name'         => 'required|string',
            'status'  => 'required',
            'users'  => 'required',

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
        $this->groupmaster = Groupmaster::create($this->data());
        $users = $this->input('users');
        $data = [];
        foreach ($users as $user) {
           $data[] = ['groupmaster_id' => $this->groupmaster->id , 'user_id' => $user];
        }
        GroupMasterAdmin::insert($data);
        return $this;
    }

    protected function data(): array
    {
        return [
            'name'       => $this->input('name'),
            'status'     => $this->input('status'),
           
        ];
    }

    public function getGroup(): Groupmaster
    {
        return $this->groupmaster;
    }
}
