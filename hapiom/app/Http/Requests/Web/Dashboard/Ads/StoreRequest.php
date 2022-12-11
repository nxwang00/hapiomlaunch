<?php

namespace App\Http\Requests\Web\Dashboard\Ads;
use App\Models\GoogleAd;
use Auth;
use Hash;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class StoreRequest extends FormRequest
{
    private $ads;

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
            'title'         => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'direction'  => 'required',
            'status'  => 'required',
            'group_id' => 'required',
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
        $this->ads = GoogleAd::create($this->data());
        $this->ads->save();

        return $this;
    }

    protected function data(): array
    {
        return [
            'title'     => $this->input('title'), 
            'image'     => $this->storeFilesIfExists('image'),    
            'direction' => $this->input('direction'),
            'status'    => $this->input('status'),
            'group_id'    => $this->input('group_id'),
        ];
    }

    protected function storeFilesIfExists($file_name = ''): string
    {
        if ($this->hasFile($file_name)) {
            $filenameWithExt = $this->file($file_name)->getClientOriginalName();
            $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension       = $this->file($file_name)->getClientOriginalExtension();
            $avatar          = $this->input('name').'_'.time() . '.' . $extension;
            $this->file($file_name)->move(public_path('images/ads'), $filenameWithExt);
            // $path            = $this->file($file_name)->storeAs('public/admin/profilelogo', $avatar);
            return $filenameWithExt;           

        } else {
            return 'image.png';
        }
    }

    public function upload($folder = 'images/ads', $key = 'image', $validation = 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048|sometimes')
    {
        request()->validate([$key => $validation]);
        $file = null;
        if (request()->hasFile($key)) {

            $file = Storage::disk('public')->putFile($folder, request()->file($key), 'public');
            $image_path = public_path('images/ads'); 
            $public_file=request()->file($key);           
            $fileName = explode('/', $file);
            $public_file->move($image_path, $fileName[2]);
        }

        return $file;
    }


    public function getAds(): GoogleAd
    {
        return $this->ads;
    }
}
