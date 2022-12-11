<?php

namespace App\Models;

use App\Models\Userinfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Userinfo extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'website',
        'dob',
        'phone_number',
        'country',
        'state',
        'city',
        'description',
        'birthplace',
        'gender',
        'occupation',
        'marriage_status',
        'facebook_url',
        'profile_image',
        'comment',
        'status',
    ];

    public function userInfo()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
