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
            'description'     => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
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
        $this->storemasters->save();
        return $this;
    }

    protected function data(): array
    {
        return [
            'name'     => $this->input('name'),
            'image'     => $this->storeFilesIfExists('image'),    
            'description' => $this->input('description'),
            'storestatus'     => $this->input('storestatus'),
        ];
    }

    protected function storeFilesIfExists($file_name = ''): string
    {
        if ($this->hasFile($file_name)) {
            $filenameWithExt = $this->file($file_name)->getClientOriginalName();
            $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension       = $this->file($file_name)->getClientOriginalExtension();
            $avatar          = $this->input('name').'_'.time() . '.' . $extension;
            $this->file($file_name)->move(public_path('images/store'), $filenameWithExt);
            // $path            = $this->file($file_name)->storeAs('public/admin/profilelogo', $avatar);
            return $filenameWithExt;           

        } else {
            return 'image.png';
        }
    }

    public function getStore(): Storemasters
    {
        return $this->storemasters;
    }
}
