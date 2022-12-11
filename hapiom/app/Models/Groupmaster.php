<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\GroupMasterAdmin;
use App\Models\GroupUser;
use App\Models\Friendlist;
use Auth;

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
        'amount',
        'created_by',
        'terms_and_condition',
    ];

    public function groupAdmin()
    {
        return $this->hasMany(GroupMasterAdmin::class);
    }

    public function groupUser($group_id,$user_id)
    {
       return GroupUser::where(['group_id'=> $group_id, 'user_id' => $user_id])->get()->count();
    }
    public function approvedGroupUser($group_id,$user_id)
    {
       return GroupUser::where(['group_id'=> $group_id, 'user_id' => $user_id])->first();
    }
    public function friendGroupList($group_id,$user_id)
    {
        $users = Friendlist::select('friend_id')->where(['user_id' => Auth::user()->id, 'friendstatus' => 1])->pluck('friend_id');
        return GroupUser::whereIn('user_id',$users)->where(['group_users.group_id'=> $group_id])->where('status', 1)->get();
    }

    public function groupUserCount()
    {
         return $this->hasMany('App\Models\GroupUser','group_id', 'id');
    }




}
