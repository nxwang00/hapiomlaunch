<?php

namespace App\Http\Requests\Web\Dashboard\Profile;

use App\Models\Userinfo;
use App\Models\Newsfeed;
use App\Models\Friendlist;
use App\Models\NewsfeedFollow;
use App\Models\User;
use App\Models\GroupUser;
use App\Models\Groupmaster;
use App\Models\Event;
use App\Models\Photo;
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
        $friends_id = Friendlist::select('friend_id')->where('user_id', decrypt($this->user))->pluck('friend_id');
        $groups_id = GroupUser::select('group_id')->where('user_id',Auth::id())->where('status', 1)->pluck('group_id');
        $followingCount = NewsfeedFollow::where('following_id', Auth::user()->id)->get()->count();
        $followerCount = NewsfeedFollow::where('user_id', Auth::user()->id)->get()->count();
        return [
            'user' => User::findOrFail(decrypt($this->user)),
            'userinfo' => Userinfo::where('user_id',decrypt($this->user))->get(),
            'profilePosts' => Newsfeed::select('*')->where('user_id',decrypt($this->user))->orderBy('id','desc')->paginate(config()->get('constants.PER_PAGE_RECORD')),
            'friends' => User::where('id','!=',Auth::user()->id)->whereNotIn('id', $friends_id)->whereNotIn('id', [decrypt($this->user)])->where('role_id',Auth::user()->role_id)->limit(10)->get(),
            'groups' => Groupmaster::whereIn('id', $groups_id)->where('status', 1)->get(),
            'followingCount' => $followingCount,
            'followerCount' => $followerCount,
            'events' => Event::where('creater_id', decrypt($this->user))->whereDate('start_date', '>', date('y-m-d h:i:s'))->where('status', 1)->where('visible', 0)->orderBy('start_date','asc')->limit(2)->get(),
            'photos' => Photo::where('creater_id', decrypt($this->user))->where('visible', 0)->get()
        ];
    }
}
