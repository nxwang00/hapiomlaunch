<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'image',
        'group_id',
        'creater_id',
        'visible'
    ];

    public function group()
    {
        return $this->belongsTo('App\Models\Groupmaster','group_id','id');
    }
    public function creater()
    {
        return $this->belongsTo('App\Models\User','creater_id','id');
    }
}
