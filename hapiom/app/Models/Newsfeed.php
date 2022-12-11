<?php

namespace App\Models;

use App\Models\Newsfeed;
use App\Models\Newsfeedlike;
use App\Models\Newsfeedcomment;
use App\Models\Newsfeedcommentlike;
use App\Models\Newsfeed_gallary;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newsfeed extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'text',
        'group_id',
    ];

    public function NewsfeedLike()
    {
        return $this->hasMany('App\Models\Newsfeedlike','newsfeed_id','id');
    }

    public function NewsfeedComment()
    {
        return $this->hasMany('App\Models\Newsfeedcomment','newsfeed_id','id');
    }


    public function NewsfeedGallaries()
    {
        return $this->hasMany('App\Models\Newsfeed_gallary','newsfeed_id','id');
    }

    public function friendUser()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function NewsfeedUser()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function globalNewsFeedUser()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function DashboardFriendPost()
    {
        return $this->hasMany('App\Models\Newsfeed','id','user_id');
    }

    public function userImageByPost()
    {
        return $this->belongsTo('App\Models\Userinfo','user_id','user_id');
    }  


}
