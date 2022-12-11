<?php

namespace App\Http\Requests\Web\Dashboard\Storemaster;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Storemasters;
use File;
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
            'name'     => 'required|string',
            'description' => 'required|string',
            'storestatus'     => 'required',
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

    public function persist($storemaster): self
    {
        $this->storemasters = Storemasters::findOrFail($storemaster);
        $this->storemasters->update($this->data());
        if ($avatar = $this->upload()) {
            $this->storemasters->image = $avatar;
        }
        $this->storemasters->save();

        return $this;
    }

    protected function data(): array
    {
        $data = [
            'name'     => $this->input('name'),
            'description' => $this->input('description'),
            'image'     => $this->storeFilesIfExists('image'),  
            'storestatus' => $this->input('storestatus'),
            
        ];
        
        return $data;
    }

    protected function storeFilesIfExists($file_name = ''): string
    {
        if ($this->hasFile($file_name)) {
            if(File::exists(public_path('images/store/'.$this->storemasters->image))){
                File::delete(public_path('admin/profilelogo/'.$this->storemasters->image));
            }
            $filenameWithExt = $this->file($file_name)->getClientOriginalName();
            $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension       = $this->file($file_name)->getClientOriginalExtension();
            $avatar          = $this->input('name').'_'.time() . '.' . $extension;
            $path            = $this->file($file_name)->storeAs('public/admin/profilelogo', $avatar);
            return $avatar;
        } else {
            return $this->storemasters->image;
        }
    }

    public function upload($folder = 'images/store', $key = 'image', $validation = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|sometimes')
    {
        request()->validate([$key => $validation]);
        $file = null;
        if (request()->hasFile($key)) {
            if(File::exists(public_path('images/store/'.$this->storemasters->image))){
                File::delete(public_path('images/store/'.$this->storemasters->image));
            }          

            $file =request()->file($key);
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/images/store' ;
            $file->move($destinationPath,$fileName);
            return $fileName;
        }
        return $this->storemasters->image;
    }

    public function getStoremasters(): Storemasters
    {
        return $this->storemasters;
    }
}
