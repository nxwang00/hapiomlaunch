<?php

namespace App\Models;

use App\Models\CommentGallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentGallery extends Model
{
    use SoftDeletes;

    protected $table = 'newsfeedcomment_galleries';

    protected $fillable = [
        'comment_id',
        'image',
    ];
}


