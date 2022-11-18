<?php

namespace App\Http\Requests\Web\Dashboard\Comment;
use App\Models\Newsfeedcomment;
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
            'comment'     => 'required',
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
        $this->comment = Newsfeedcomment::create($this->data());

        return $this;
    }

    protected function data(): array
    {
        return [
            'user_id'     => $this->input('user_id'),
            'newsfeed_id'     => $this->input('newsfeed_id'),
            'comment'     => $this->input('comment'),
        ];
    }

    public function getComment(): Newsfeedcomment
    {
        return $this->comment;
    }
}
