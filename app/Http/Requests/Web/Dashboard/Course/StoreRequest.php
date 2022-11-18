<?php

namespace App\Http\Requests\Web\Dashboard\Course;
use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Illuminate\Support\Facades\Storage;

class StoreRequest extends FormRequest
{
    private $course;

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
            'course'    => 'required',
            'description'    => 'required',
            'image'    => 'required',
            'course_status'  => 'required',
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
        $this->course = Course::create($this->data());        
        $this->course->save();
        return $this;
    }

    protected function data(): array
    {
        return [
            'user_id'     => Auth::user()->id,
            'course'     => $this->input('course'),
            'description'     => $this->input('description'),
            'image'     => $this->storeFilesIfExists('image'),
            'course_status'     => $this->input('course_status'),           
        ];
    }

    protected function storeFilesIfExists($file_name = ''): string
    {
        if ($this->hasFile($file_name)) {
            $filenameWithExt = $this->file($file_name)->getClientOriginalName();
            $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $this->file($file_name)->move(public_path('images/course'), $filenameWithExt);
            return $filenameWithExt;           

        } else {
            return 'image.png';
        }
    }    

    public function getCourse(): Course
    {
        return $this->course;
    }
}
