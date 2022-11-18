<?php

namespace App\Http\Requests\Web\Dashboard\Groupmaster;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Groupmaster;
use App\Models\GroupMasterAdmin;
use Illuminate\Support\Facades\Storage;

class UpdateRequest extends FormRequest
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
        $rules = [
            'name'         => 'required|string',
            'group_type'  => 'required',
            'image'  => 'required',
            'status'  => 'required',
            'users'  => 'required',
        ];
        
        return $rules;

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
        if ($avatar = $this->upload()) {
            $this->group->image = $avatar;
        }
        $this->group->save();
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
            'group_type'     => $this->input('group_type'),
            'image'     => '',
            'status' => $this->input('status'),
            
        ];
        
        return $data;
    }

    public function upload($folder = 'images/group', $key = 'image', $validation = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|sometimes')
    {
        request()->validate([$key => $validation]);
        $file = null;
        if (request()->hasFile($key)) {

            $file = Storage::disk('public')->putFile($folder, request()->file($key), 'public');
            $image_path = public_path('images/group'); 
            $public_file=request()->file($key);           
            $fileName = explode('/', $file);
            $public_file->move($image_path, $fileName[2]);
        }

        return $file;
    }

    public function getGroup(): Groupmaster
    {
        return $this->group;
    }
}
