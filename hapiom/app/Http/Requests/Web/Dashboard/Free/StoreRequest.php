<?php

namespace App\Http\Requests\Web\Dashboard\Free;
use App\Models\Free;
use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Illuminate\Support\Facades\Storage;

class StoreRequest extends FormRequest
{
    private $free;

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
            'free_name'    => 'required',
            'description'    => 'required',
            'image'    => 'required',
            'free_status'  => 'required',
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
        $this->free = Free::create($this->data());
        if ($avatar = $this->upload()) {
            $this->free->image = $avatar;
        }
        $this->free->save();
        return $this;
    }

    protected function data(): array
    {
        return [
            'user_id'     => Auth::user()->id,
            'free'     => $this->input('free_name'),
            'description'     => $this->input('description'),
            'image'     => '',
            'free_status'     => $this->input('free_status'),           
        ];
    }

    public function upload($folder = '', $key = 'image', $validation = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|sometimes')
    {
        request()->validate([$key => $validation]);
        $file = null;
        if (request()->hasFile($key)) {

            $file = Storage::disk('public')->putFile($folder, request()->file($key), 'public');
            $image_path = public_path('images/free'); 
            $public_file=request()->file($key);          
            $fileName = explode('images/', $file);
            $public_file->move($image_path, $fileName[0]);
        }

        return $file;
    }


    public function getFree(): Free
    {
        return $this->free;
    }
}
