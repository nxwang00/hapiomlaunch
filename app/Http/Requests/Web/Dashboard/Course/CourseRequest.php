<?php

namespace App\Http\Requests\Web\Dashboard\Course;
use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;
use Auth;

class CourseRequest extends FormRequest
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
        return [

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

    public function getCourse(): array
    {
        return [
            'course' => $this->course,
            'courses' => Course::where('id','!=',$this->course->id)->where('user_id',Auth::user()->customer_id)->limit(3)->get()
        ];
    }
}
