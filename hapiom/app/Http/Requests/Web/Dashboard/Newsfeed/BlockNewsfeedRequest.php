<?php

namespace App\Http\Requests\Web\Dashboard\Newsfeed;
use App\Models\Blocklist;
use App\Models\Newsfeed;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Auth;
class BlockNewsfeedRequest
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
        $this->blockrequest = Newsfeed::where(['user_id' => Auth::user()->id, 'id' => $this->request->newsfeed_id])->update(['status' => 0]);
        return $this;
    }

    protected function data(): array
    {
        return [
            'user_id'      => Auth::user()->id,
            'block_id'     => $this->request->newsfeed_id,
            'blockstatus'  => 1,
        ];
    }

    public function getMsg(): array
    {
        return ['message' => 'block successfully!'];
    }
}
