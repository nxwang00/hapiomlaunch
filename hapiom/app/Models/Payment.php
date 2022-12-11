<?php

namespace App\Models;

use App\Models\Newsfeedlike;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'token_id', 'charge_id', 'user_id', 'email_id', 'currency', 'payment_status', 'payment_method', 'total', 'status',
    ];
}
