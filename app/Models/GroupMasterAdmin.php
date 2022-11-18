<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class GroupMasterAdmin extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'groupmaster_id',
        'user_id',
    ]; 

    public function userData()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
