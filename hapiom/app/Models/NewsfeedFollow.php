<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsfeedFollow extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'newsfeed_id',
        'user_id',
        'following_id',
    ];

}
