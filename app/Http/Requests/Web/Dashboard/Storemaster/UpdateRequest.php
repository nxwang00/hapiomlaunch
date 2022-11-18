<?php

namespace App\Http\Requests\Web\Dashboard\Storemaster;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Storemasters;

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

    public function persist(): self
    {
        $this->storemasters->update($this->data());
        return $this;
    }

    protected function data(): array
    {
        $data = [
            'name'     => $this->input('name'),
            'storestatus'     => $this->input('storestatus'),
            
        ];
        
        return $data;
    }

    

    public function getStoremasters(): Storemasters
    {
        return $this->storemasters;
    }
}
