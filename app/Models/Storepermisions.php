<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Storepermisions extends Model
{
     use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'meberships_id',
        'store_id',
    ];

    
    public function Storemaster()
    {
        return $this->belongsTo('App\Models\Storemasters','store_id','id');
    }

    
   
}