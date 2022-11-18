<?php

namespace App\Http\Requests\Web\Dashboard\Profile;

use App\Models\Userinfo;
use App\Models\Newsfeed;
use App\Models\Friendlist;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ProfileRequest extends FormRequest
{

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

    public function getProfile(): array
    {
        $friends_id = Friendlist::select('friend_id')->where('user_id',Auth::user()->id)->pluck('friend_id');
        return [
            'user' => User::findOrFail(decrypt($this->user)),
            'userinfo' => Userinfo::where('user_id',decrypt($this->user))->get(),
            'profilePosts' => Newsfeed::select('*')->where('user_id',decrypt($this->user))->orderBy('id','desc')->paginate(config()->get('constants.PER_PAGE_RECORD')),
            'friends' => User::where('id','!=',Auth::user()->id)->whereNotIn('id', $friends_id)->where('role_id',Auth::user()->role_id)->limit(10)->get(),
        ];
    }
}
