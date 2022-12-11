<?php

namespace App\Http\Requests\Web\Dashboard\Mebership;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Storemasters;
use App\Models\Meberships;
use App\Models\Storepermisions;


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
            'levelstatus'     => 'required',
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

    public function persist($id): self
    {
        $this->meberships =  $this->meberships->update($this->data());

        Storepermisions::where('meberships_id',$id)->delete();

        $stores = $this->input('store');
        $data = [];
        foreach ($stores as $value) {
           $data[] = ['store_id' => $value, 'meberships_id' => $id];
        }
        Storepermisions::insert($data);

        return $this->meberships;
    }

    protected function data(): array
    {
        $data = [
            'name'     => $this->input('name'),
            'levelstatus'     => $this->input('levelstatus'),
            'amount'     => $this->input('amount'),
        ];
        
        return $data;
    }

    

    public function getMeberships(): Meberships
    {
        return $this->meberships;
    }
}
