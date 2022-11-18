<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Auth;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'name',
        'email',
        'password',
        'role_id',
        'customer_id',
        'block',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Role()
    {
        return $this->belongsTo('App\Models\Role','role_id','id');
    }

    public function UserfriendRequest()
    { 
        return $this->hasMany('App\Models\Friendrequest','request_to','id');
    }

    public function Userfriends()
    { 
        return $this->hasMany('App\Models\Friendlist','user_id','id');
    }

    public function blockFriends()
    {
        return $this->hasMany('App\Models\Blocklist','user_id','id');  
    }

    public function friendUser()
    {
        return $this->hasMany('App\Models\User','friend_id','id');
    }

    public function userInfo()
    {
        return $this->hasOne('App\Models\Userinfo','user_id','id');
    }

    public function getUser()
    {
        return Friendlist::join('users','users.id','=','friendlists.user_id')->where(['friendlists.user_id'=>Auth::user()->id, 'friendstatus' => 1])->orderBy('friendlists.id', 'ASC')->get();
    }
    public function userNewsfeed()
    {
        return $this->belongsTo('App\Models\Newsfeed','newsfeed_id','id');
    }

    public function UserNewsFeedPost()
    {
        return $this->hasMany('App\Models\Newsfeed','user_id','id');
    }

    public function Userfriend()
    {
        return $this->belongsTo('App\Models\Friendlist','user_id','id');
    }

    public function isFriendBlocked($block_id):bool
    {   
        return $this->hasOne('App\Models\Blocklist','user_id','id')->where('block_id', $block_id)->exists();  
    }

    public function isFriend($friend_id):bool
    {   
        return $this->hasOne('App\Models\Friendlist','user_id','id')->where(['friend_id' => $friend_id, 'friendstatus' => 1])->exists();  
    }

    public function isFriendRequest($request_to):bool
    {   
        return $this->hasOne('App\Models\Friendrequest','request_from','id')->where(['request_to' => $request_to, 'friendrequesttatus' => 0])->exists();  
    }

    public function isFriendRequestAccept($request_from):bool
    {   
        return $this->hasOne('App\Models\Friendrequest','request_to','id')->where(['request_from' => $request_from, 'friendrequesttatus' => 0])->exists();  
    }

}
