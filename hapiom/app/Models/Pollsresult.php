<?php

namespace App\Models;

use App\Models\Pollsresult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pollsresult extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'polls_id',
        'polls_result',
    ];

    public function PollsGetUser()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }

    public function PollsResult($polls_result){

        if ($polls_result == 1) {
            echo "A";
        }elseif($polls_result == 2){
            echo "B";
        }elseif($polls_result == 3){
            echo "C";
        }elseif($polls_result == 4){
            echo "D";
        }  
    }

    public function PollsResultSL($polls_result){

        if ($polls_result == 1) {
            echo "a";
        }elseif($polls_result == 2){
            echo "b";
        }elseif($polls_result == 3){
            echo "c";
        }elseif($polls_result == 4){
            echo "d";
        }  
    }

}
