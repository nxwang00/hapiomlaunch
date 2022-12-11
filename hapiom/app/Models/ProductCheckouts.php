<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCheckouts extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_id',
        'user_id',
        'product_id',
        'amount',
        'status',    
    ];   

    public function ProductDetail()
    {
        return $this->belongsTo('App\Models\Product','product_id','id');
    }

    
}
