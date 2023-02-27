<?php

namespace App\Models;
use App\Models\Newsfeedcomment;
use App\Models\Newsfeed;
use App\Models\CommentGallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newsfeedcomment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'newsfeed_id',
        'comment',
    ];

    public function NewsfeedUser()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function Newsfeed()
    {
        return $this->belongsTo('App\Models\Newsfeed','newsfeed_id','id');
    }

    public function NewsfeedcommentLike()
    {
        return $this->hasMany('App\Models\Newsfeedcommentlike','comment_id','id');
    }

    public function profileImage()
    {
        return $this->belongsTo('App\Models\Userinfo','user_id','user_id'); 
    }

    public function CommentImage()
    {
        return $this->belongsTo('App\Models\CommentGallery','id','comment_id'); 
    }
}




