<?php

namespace App\Models;

use App\Models\Newsfeedcommentlike;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newsfeedcommentlike extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'newsfeed_id',
        'user_id',
        'comment_id',
        'likes_id',
        'face_icon'
    ];

    public function NewsfeedUser()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
