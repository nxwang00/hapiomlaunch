<?php

namespace App\Http\Requests\Web\Dashboard\Photo;

use App\Models\Photo;
use Illuminate\Http\Request;
use Auth;

class DeleteRequest
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
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
        return [];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [];
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
        $photoId = $this->request->photoId;
        $this->photo = Photo::findOrFail($photoId);
        $this->photo->delete();
        return $this;
    }

    public function getPhotoMsg(): array
    {
        return ['message' => 'The photo has been trashed successfully'];
    }
}
