<?php

namespace App\Models;
use App\Models\Newsfeedcommentreply;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newsfeedcommentreply extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'newsfeed_id',
        'comment_id',
        'reply_comment'
    ];

    public function NewsfeedUser()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function NewsfeedreplycommentLike()
    {
        return $this->hasMany('App\Models\Newsfeedreplycommentlike','replycomment_id','id');
    }

    public function profileImage()
    {
        return $this->belongsTo('App\Models\Userinfo','user_id','user_id'); 
    }
}




