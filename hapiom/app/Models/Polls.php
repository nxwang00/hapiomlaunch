<?php

namespace App\Models;

use App\Models\Polls;
use App\Models\Pollsresult;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Polls extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'question',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'polls_status',
    ];

    public function PollsGetCount()
    {
        return $this->hasMany('App\Models\Pollsresult','polls_id','id');
    }

    public function pollCountPer($poll_id,$question_id)
    {
        $res = Pollsresult::where(['polls_id' => $poll_id, 'polls_result' => $question_id])->get()->count();
        $total = Pollsresult::where('polls_id',$poll_id)->get()->count();

        if (!empty($res) && !empty($res)) {
            $percent = ($res/$total)*100;

        }else{
            $percent = 0;
        }
        

        return $percent;
    }

    
}
