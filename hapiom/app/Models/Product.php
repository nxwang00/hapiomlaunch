<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'type',
        'image_video',
        'price',
        'store_id',
        'status'
    ];

    public function store()
    {
        return $this->belongsTo('App\Models\Store','store_id','id');
    }
}
