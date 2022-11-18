<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\GroupMasterAdmin;
use App\Models\GroupUser;

class Groupmaster extends Model
{
     use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'group_type',
        'image',
        'status',
    ];

    public function groupAdmin()
    {
        return $this->hasMany(GroupMasterAdmin::class);
    }

    public function groupUser($group_id,$user_id)
    {
       return GroupUser::where(['group_id'=> $group_id, 'user_id' => $user_id])->get()->count();
    }

   
}
