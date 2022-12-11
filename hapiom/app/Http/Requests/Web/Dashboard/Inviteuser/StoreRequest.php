<?php

namespace App\Http\Requests\Web\Dashboard\Inviteuser;

use App\Models\InviteUser;
use App\Models\Storepermisions;
use Illuminate\Foundation\Http\FormRequest;
use Auth;
use App\Jobs\SendEmailJob;


class StoreRequest extends FormRequest
{
    private $status;

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
            'emails'       => 'required',
            'message'       => 'required',
            'optionsCheckbox'        => 'required',
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
        $emails  = explode(",", request()->emails);
        $message = request()->message;
        $this->status  = (count($emails) > 5) ? 1 : 0;

        if ($this->status == 1) {
            return $this;
        }

        foreach ($emails as $value) {
            $token = uniqid();
            $data = ['user_id' => Auth::user()->id, 'email' => $value, 'message' => trim($message), 'token' => $token];
            $inviteUser = InviteUser::create($data);
            SendEmailJob::dispatch(['email' => $value, 'message' => trim($message), 'name' => Auth::user()->name, 'token' => $token, 'inviteUser' => $inviteUser]);
        }

        return $this;
    }

    public function getStaus()
    {
        return $this->status;
    }
}
