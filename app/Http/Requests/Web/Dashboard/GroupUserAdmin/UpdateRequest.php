<?php

namespace App\Http\Requests\Web\Dashboard\GroupUserAdmin;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Groupmaster;
use App\Models\GroupMasterAdmin;

class UpdateRequest extends FormRequest
{
   private $group,$user;
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
        

    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required'               => 'The :attribute field is required.',
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
        $this->group->update($this->data());
        $this->group->groupAdmin()->delete(); 
        $users = $this->input('users');
        $data = [];
        foreach ($users as $user) {
           $data[] = ['groupmaster_id' => $this->group->id , 'user_id' => $user];
        }
        $this->group->groupAdmin()->insert($data);

        // GroupMasterAdmin::insert($data);
        return $this;
    }

    protected function data(): array
    {
        $data = [
            'name'     => $this->input('name'),
            'status' => $this->input('status'),
            
        ];
        
        return $data;
    }

    

    public function getGroup(): Groupmaster
    {
        return $this->group;
    }
}
