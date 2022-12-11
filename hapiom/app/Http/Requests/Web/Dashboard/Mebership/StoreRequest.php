<?php

namespace App\Http\Requests\Web\Dashboard\Mebership;
use App\Models\Meberships;
use App\Models\Storepermisions;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    private $mebership;

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
            'name'         => 'required|string',
            'levelstatus'  => 'required',
            'store'        => 'required',

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
        $this->mebership = Meberships::create($this->data());
        $stores = $this->input('store');
        $data = [];
        foreach ($stores as $value) {
           $data[] = ['store_id' => $value, 'meberships_id' => $this->mebership->id];
        }
        Storepermisions::insert($data);
        return $this;
    }

    protected function data(): array
    {
        return [
            'name'            => $this->input('name'),
            'levelstatus'     => $this->input('levelstatus'),
            'amount'     => $this->input('amount'),
            'description'     => $this->input('description'),
        ];
    }

    public function getLevel(): Meberships
    {
        return $this->mebership;
    }
}
