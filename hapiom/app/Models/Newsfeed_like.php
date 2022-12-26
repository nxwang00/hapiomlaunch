<?php

namespace App\Models;

use App\Models\Newsfeed_like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newsfeed_like extends Model
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
}
