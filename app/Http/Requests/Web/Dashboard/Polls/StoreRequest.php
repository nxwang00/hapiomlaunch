<?php

namespace App\Http\Requests\Web\Dashboard\Polls;
use App\Models\Polls;
use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Illuminate\Support\Facades\Storage;

class StoreRequest extends FormRequest
{
    private $product;

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
            'title'    => 'required',
            'question'    => 'required',
            'optiona'    => 'required',
            'optionb'    => 'required',
            'optionc'    => 'required',
            'optiond'    => 'required',
            'polls_status'  => 'required',
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
        $this->polls = Polls::create($this->data());

        return $this;
    }

    protected function data(): array
    {
        return [
            'user_id'     => Auth::user()->id,
            'title'     => $this->input('title'),
            'question'     => $this->input('question'),
            'option_a'     => $this->input('optiona'),
            'option_b'     => $this->input('optionb'),
            'option_c'     => $this->input('optionc'),
            'option_d'     => $this->input('optiond'),
            'polls_status'     => $this->input('polls_status'),           
        ];
    }


    public function getPolls(): Polls
    {
        return $this->polls;
    }
}
