<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function master()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
