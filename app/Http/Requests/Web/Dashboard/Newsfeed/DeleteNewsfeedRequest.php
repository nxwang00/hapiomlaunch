<?php

namespace App\Http\Requests\Web\Dashboard\Newsfeed;

use App\Models\Newsfeed; 
// use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Auth;
class DeleteNewsfeedRequest
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
        return [

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
        $this->delete_request = Newsfeed::where(['user_id' => Auth::user()->id, 'id' => $this->request->newsfeed_id])->delete();
        return $this;
    }

    public function getData(): array
    {
        return [
            'user_id'      => Auth::user()->id,
            'deleted_id'     => $this->request->newsfeed_id,
        ];
    }

    public function getMsg(): array
    {
        return ['message' => 'The Newsfeed has been trashed successfully'];
    }
}
