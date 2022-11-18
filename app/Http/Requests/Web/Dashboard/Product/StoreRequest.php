<?php

namespace App\Http\Requests\Web\Dashboard\Product;
use App\Models\Product;
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
            'product'    => 'required',
            'description'    => 'required',
            'image'    => 'required',
            'product_status'  => 'required',
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
        $this->product = Product::create($this->data());
        if ($avatar = $this->upload()) {
            $this->product->image = $avatar;
        }
        $this->product->save();
        return $this;
    }

    protected function data(): array
    {
        return [
            'user_id'     => Auth::user()->id,
            'product'     => $this->input('product'),
            'description'     => $this->input('description'),
            'image'     => '',
            'product_status'     => $this->input('product_status'),           
        ];
    }

    public function upload($folder = '', $key = 'image', $validation = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|sometimes')
    {
        request()->validate([$key => $validation]);
        $filenameWithExt = null;
        if (request()->hasFile($key)) {
            $filenameWithExt = $this->file('image')->getClientOriginalName();
            $file = Storage::disk('public')->putFile($folder, request()->file($key), 'public');
            $image_path = public_path('images/product'); 
            $public_file=request()->file($key);
            $public_file->move($image_path, $filenameWithExt);
        }

        return $filenameWithExt;
    }

    public function getLevel(): Product
    {
        return $this->product;
    }
}
