<?php

namespace App\Http\Requests\Web\Dashboard\Photo;

use App\Models\Photo;
use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class StoreRequest extends FormRequest
{
    private $photo;

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
            'photo_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
        return [];
    }

    public function persist(): self
    {
        $this->photo = Photo::create($this->data());

        return $this;
    }

    protected function data(): array
    {
        $file = $this->file('photo_image');
        if (!empty($file)) {
            $name = time() . $file->getClientOriginalName();
            Storage::putfile('images/photo', $file);
            $file->move('images/photo', $name);

            return [
                'image' => $name,
                'group_id' => $this->input('photo_group'),
                'creater_id' => Auth::id(),
                'visible' => $this->input('photo_visible')
            ];
        }
    }

    public function getPhoto(): Photo
    {
        return $this->photo;
    }
}
