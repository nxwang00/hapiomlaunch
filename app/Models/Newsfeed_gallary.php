<?php

namespace App\Models;

use App\Models\Newsfeed_gallary;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newsfeed_gallary extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'newsfeed_id',
        'image',
    ];
}


