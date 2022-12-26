<?php

namespace App\Models;

use App\Models\Newsfeedlike;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newsfeedlike extends Model
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
        'likes_id',
        'face_icon',
    ];

    public function NewsfeedUser()
    {
        return $this->belongsTo('App\Models\User','likes_id','id');
    }


}
