<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Friendlist extends Model
{
     use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'friend_id',
        'friendstatus',
    ];

    public function friendUser()
    {
        return $this->belongsTo('App\Models\User','friend_id','id');
    }

    public function SearchUserfriends()
    { 
        return $this->hasMany('App\Models\Friendlist','friend_id', 'id');
    }

    public function friendsImages()
    {
        return $this->belongsTo('App\Models\Userinfo','user_id','user_id');
    }

    public function userImgCount()
    {
        return $this->belongsTo('App\Models\Userinfo','id','user_id');
    }
   
   
}
