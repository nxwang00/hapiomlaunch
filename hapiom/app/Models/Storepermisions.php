<?php

namespace App\Models;
use App\Models\Product;
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

    public function totalProduct()
    {
        return $this->hasMany('App\Models\Product','category_id','id');
    }

    public function productInfo($category_id)
    {
        return Product::select('image')->where('category_id',$category_id)->value('image');
    }

    
   
}