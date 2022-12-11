<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class GoogleAd extends Model
{
     use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'googleads';
    
    protected $fillable = [
        'title',
        'image',
        'direction',
        'status',
        'group_id',
    ];
    
   
}
