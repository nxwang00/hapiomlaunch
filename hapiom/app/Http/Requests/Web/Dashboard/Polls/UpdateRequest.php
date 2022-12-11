<?php

namespace App\Http\Requests\Web\Dashboard\Polls;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Polls;
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
            'title'    => 'required',
            'question'    => 'required',
            'optiona'    => 'required',
            'optionb'    => 'required',
            'optionc'    => 'required',
            'optiond'    => 'required',
            'polls_status'  => 'required',
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
        $this->polls->update($this->data());
        return $this;
    }

    protected function data(): array
    {
        $data = [
            'title'     => $this->input('title'),
            'question'     => $this->input('question'),
            'option_a'     => $this->input('optiona'),
            'option_b'     => $this->input('optionb'),
            'option_c'     => $this->input('optionc'),
            'option_d'     => $this->input('optiond'),
            'polls_status'     => $this->input('polls_status'),
            
        ];
        
        return $data;
    }


    public function getPolls(): Polls
    {
        return $this->polls;
    }
}
