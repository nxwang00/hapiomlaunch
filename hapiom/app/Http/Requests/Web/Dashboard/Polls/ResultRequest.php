<?php

namespace App\Http\Requests\Web\Dashboard\Polls;
use App\Models\Polls;
use App\Models\Pollsresult;
use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ResultRequest extends FormRequest
{
    private $pollsresult;

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

    public function persist(): self
    {
        $this->pollsresult = Pollsresult::create($this->data());

        return $this;
    }

    protected function data(): array
    {
        return [
            'user_id'  => Auth::user()->id,
            'polls_id'  => $this->input('polls_id'),
            'polls_result'  => $this->input('polls_select'),           
        ];
    }


    public function getResult(): Pollsresult
    {
        return $this->pollsresult;
    }
}
