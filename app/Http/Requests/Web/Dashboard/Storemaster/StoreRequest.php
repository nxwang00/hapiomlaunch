<?php

namespace App\Http\Requests\Web\Dashboard\Storemaster;
use App\Models\Storemasters;
use Auth;
use Hash;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    private $storemasters;

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
            'name'     => 'required|string',
            'storestatus'     => 'required',
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
        $this->storemasters = Storemasters::create($this->data());

        return $this;
    }

    protected function data(): array
    {
        return [
            'name'     => $this->input('name'),
            'storestatus'     => $this->input('storestatus'),
        ];
    }

    public function getStore(): Storemasters
    {
        return $this->storemasters;
    }
}
