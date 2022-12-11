<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public $timestamps = false;

    // fillable field
    protected $fillable = [
        'ename',
        'image',
        'group_id',
        'hoster_id',
        'creater_id',
        'description',
        'start_date',
        'end_date',
        'location',
        'status',
        'visible'
    ];

    public function group()
    {
        return $this->belongsTo('App\Models\Groupmaster','group_id','id');
    }

    public function hoster()
    {
        return $this->belongsTo('App\Models\User','hoster_id','id');
    }

    public function creater()
    {
        return $this->belongsTo('App\Models\User','creater_id','id');
    }
}
