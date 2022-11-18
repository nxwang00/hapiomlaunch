<?php

namespace App\Http\Requests\Web\Dashboard\Product;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use File;

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
            'product_name'     => 'required',
            'description'     => 'required',
            'product_status'     => 'required',
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
        $this->product->update($this->data());
        if ($avatar = $this->upload()) {
            $this->product->image = $avatar;
        }
        $this->product->save();
        return $this;
    }

    protected function data(): array
    {
        $data = [
            'product'     => $this->input('product_name'),
            'description'     => $this->input('description'),
            'product_status'     => $this->input('product_status'),
            
        ];
        
        return $data;
    }

    public function upload($folder = '', $key = 'image', $validation = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|sometimes')
    {
        request()->validate([$key => $validation]);
        $file = null;
        if (request()->hasFile($key)) {

            if(File::exists(public_path('images/product/'.$this->product->image))){
                File::delete(public_path('images/product/'.$this->product->image));
            } 

            $file =request()->file($key);
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/images/product';
            $file->move($destinationPath,$fileName);
            return $fileName;
        }
        return $this->product->image;
    }

    

    public function getProducts(): Product
    {
        return $this->product;
    }
}
