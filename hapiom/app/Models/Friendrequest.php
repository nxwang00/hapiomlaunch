<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Friendrequest extends Model
{
     use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'request_from',
        'request_to',
        'friendrequesttatus',
    ];


    // public function clientInfo()
    // {
    //     return $this->belongsTo('App\Models\Client','client_id','id');
    // }

    public function FriendReequestName()
    {
        return $this->belongsTo('App\Models\User','request_from','id');
    }
   
}
