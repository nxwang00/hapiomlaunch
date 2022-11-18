<?php

namespace App\Models;

use App\Models\Newsfeedreplycommentlike;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newsfeedreplycommentlike extends Model
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
        'replycomment_id' 
    ];
}
