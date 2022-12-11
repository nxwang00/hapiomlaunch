<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class InviteGroupUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'group_id',
        'email',
        'status',
        'message',
        'token',
    ];
   
   
}
