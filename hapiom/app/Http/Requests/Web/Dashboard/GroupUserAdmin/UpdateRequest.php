<?php

namespace App\Http\Requests\Web\Dashboard\GroupUserAdmin;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Groupmaster;
use App\Models\GroupMasterAdmin;
use Illuminate\Support\Facades\Storage;
use File;

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
        $rules = [
            'name'         => 'required|string',
            'group_type'  => 'required',
            'status'  => 'required',
            'amount' => 'exclude_if:group_type,0|required',

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

    public function persist($group): self
    {  
        $this->group = $group;
        $this->group->update($this->data());
        if ($avatar = $this->upload()) {
            $this->group->image = $avatar;
        }        
        $this->group->save();
        return $this;
    }

    protected function data(): array
    {
        $data = [
            'name'     => $this->input('name'),
            'group_type'     => $this->input('group_type'),  
            'status' => $this->input('status'),
            'amount'     => $this->input('amount'),
            'terms_and_condition'     => $this->input('terms_and_condition'),
            

            
        ];
        
        return $data;
    }

    public function upload($folder = 'images/ads', $key = 'image', $validation = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|sometimes')
    {
        request()->validate([$key => $validation]);
        $file = null;
        if (request()->hasFile($key)) {
            if(File::exists(public_path('images/group/'.$this->group->image))){
                File::delete(public_path('images/group/'.$this->group->image));
            }          

            $file =request()->file($key);
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/images/group' ;
            $file->move($destinationPath,$fileName);
            return $fileName;
        }
        return $this->group->image;
    }   

   
    public function getGroup(): Groupmaster
    {
        return $this->group;
    }
}
