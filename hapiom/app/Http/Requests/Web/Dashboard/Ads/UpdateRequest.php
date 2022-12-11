<?php

namespace App\Http\Requests\Web\Dashboard\Ads;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\GoogleAd;
use Illuminate\Support\Facades\Storage;
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
            'title' => 'required|string',
            'direction' => 'required',
            'status' => 'required',
            'group_id' => 'required',
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

    public function persist($googlead): self
    {
        $this->googlead = GoogleAd::findOrFail($googlead);
        $this->googlead->update($this->data());
        if ($avatar = $this->upload()) {
            $this->googlead->image = $avatar;
        }
        $this->googlead->save();

        return $this;
    }

    protected function data(): array
    {   
        return [
            'title'     => $this->input('title'), 
            // 'image'     => $this->storeFilesIfExists('image'),    
            'direction'     => $this->input('direction'),
            'status'     => $this->input('status'),
            'group_id'     => $this->input('group_id'),
        ];       
        
    }

    public function upload($folder = 'images/ads', $key = 'image', $validation = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|sometimes')
    {
        request()->validate([$key => $validation]);
        $file = null;
        if (request()->hasFile($key)) {
            if(File::exists(public_path('images/ads/'.$this->googlead->image))){
                File::delete(public_path('images/ads/'.$this->googlead->image));
            }          

            $file =request()->file($key);
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/images/ads' ;
            $file->move($destinationPath,$fileName);
            return $fileName;
        }
        return $this->googlead->image;
    }

    protected function storeFilesIfExists($file_name = ''): string
    {
        if ($this->hasFile($file_name)) {
            if(File::exists(public_path('images/ads/'.$this->googlead->image))){
                File::delete(public_path('admin/profilelogo/'.$this->googlead->image));
            }
            $filenameWithExt = $this->file($file_name)->getClientOriginalName();
            $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension       = $this->file($file_name)->getClientOriginalExtension();
            $avatar          = $this->input('name').'_'.time() . '.' . $extension;
            $path            = $this->file($file_name)->storeAs('public/admin/profilelogo', $avatar);
            return $avatar;
        } else {
            return $this->googlead->image;
        }
    }

    

    public function getAds(): GoogleAd
    {
        return $this->googlead;
    }
}
