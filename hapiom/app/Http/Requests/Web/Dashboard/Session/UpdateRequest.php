<?php

namespace App\Http\Requests\Web\Dashboard\Session;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Session_detail;
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
            'session_name'     => 'required|string',
            'description'     => 'required|string',
            'session_status'     => 'required',
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
        $this->session_detail->update($this->data());
        if ($avatar = $this->upload()) {
            $this->session_detail->image = $avatar;
        }
        $this->session_detail->save();
        return $this;
    }

    protected function data(): array
    {
        $data = [
            'session'     => $this->input('session_name'),
            'description'     => $this->input('description'),
            'image'     => '',
            'session_status'     => $this->input('session_status'),
            
        ];
        
        return $data;
    }

    public function upload($folder = '', $key = 'image', $validation = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|sometimes')
    {
        request()->validate([$key => $validation]);
        $file = null;
        if (request()->hasFile($key)) {

            $file = Storage::disk('public')->putFile($folder, request()->file($key), 'public');
            $image_path = public_path('images/session'); 
            $public_file=request()->file($key);          
            $fileName = explode('images/', $file);
            $public_file->move($image_path, $fileName[0]);
        }

        return $file;
    }

    

    public function getFree(): Session_detail
    {
        return $this->session_detail;
    }
}
