<?php

namespace App\Models;
use App\Models\Storepermisions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Meberships extends Model
{
     use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'levelstatus',
        'store_id',
        'amount',
        'description'
    ];

    public function storePermisions()
    {
        return $this->hasMany(Storepermisions::class);
    }

}
