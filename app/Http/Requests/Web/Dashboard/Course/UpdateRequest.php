<?php

namespace App\Http\Requests\Web\Dashboard\Course;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Course;
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
            'course_name'     => 'required',
            'description'     => 'required',
            'course_status'     => 'required',
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
        $this->course->update($this->data());
        if ($avatar = $this->upload()) {
            $this->course->image = $avatar;
        }
        $this->course->save();
        return $this;
    }

    protected function data(): array
    {
        $data = [
            'course'     => $this->input('course_name'),
            'description'     => $this->input('description'),
            'course_status'     => $this->input('course_status'),
            
        ];
        
        return $data;
    }

    public function upload($folder = '', $key = 'image', $validation = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|sometimes')
    {
        request()->validate([$key => $validation]);
        $file = null;
        if (request()->hasFile($key)) {

            if(File::exists(public_path('images/course/'.$this->course->image))){
                File::delete(public_path('images/course/'.$this->course->image));
            } 

            $file =request()->file($key);
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/images/course';
            $file->move($destinationPath,$fileName);
            return $fileName;
        }
        return $this->course->image;
    }

    

    public function getCourses(): Course
    {
        return $this->course;
    }
}
