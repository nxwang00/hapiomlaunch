<?php

namespace App\Http\Requests\Web\Dashboard\InviteGroupUser;

use App\Models\InviteGroupUser;
use App\Models\Groupmaster;
use App\Models\Storepermisions;
use Illuminate\Foundation\Http\FormRequest;
use Auth;
use App\Jobs\SendEmailGroupJob;


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
        $group_id = request()->group;
        $group = Groupmaster::findOrFail($group_id);
        $this->status  = (count($emails) > 5) ? 1 : 0;

        if ($this->status == 1) {
            return $this;
        }

        foreach ($emails as $value) {
            $token = uniqid();
            $data = ['user_id' => Auth::user()->id, 'email' => $value, 'message' => trim($message), 'token' => $token, 'group_id' => $group_id];
            $inviteGroupUser = InviteGroupUser::create($data);
            SendEmailGroupJob::dispatch(['email' => $value, 'message' => trim($message), 'name' => Auth::user()->name, 'token' => $token, 'group_name' => $group->name,  'inviteGroupUser' => $inviteGroupUser]);
        }

        return $this;
    }

    public function getStaus()
    {
        return $this->status;
    }
}
