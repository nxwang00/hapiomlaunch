<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Blocklist extends Model
{
     use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'block_id',
        'blockstatus',
    ];
    
    public function blockFriendInfo()
    {
        return $this->belongsTo('App\Models\User','block_id','id');
    }

    // public function SearchUserfriends()
    // { 
    //     return $this->hasMany('App\Models\Friendlist','friend_id', 'id');
    // }
   
   
}
