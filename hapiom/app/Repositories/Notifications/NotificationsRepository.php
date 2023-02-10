<?php

namespace App\Repositories\Notifications;

use App\Models\Notification;
use App\Models\Groupmaster;
use App\Models\User;

class NotificationsRepository  implements NotificationsRepositoryInterface
{
    public function userJoinsGroup(int $group_id, int $user_id):void {
        if (!is_numeric($group_id)) {
            return;
        }
        $group = GroupMaster::where('id', $group_id)->first();
        if (!$group) {
            return;
        }

        $user = User::where('id', $user_id)->first();
        $content = 'User '.$user->first_name.' '.$user->last_name.' wants to join group '.$group->name;
        Notification::create(['user_id' => $user_id, 'receiver_id' => $group->created_by, 'is_seen' => 0, 'content' => $content ]);
    }

    public function groupJoinApproved(int $group_id, int $user_id, int $status):void {
        $group = Groupmaster::find($group_id);
        if (!$group) {
            return;
        }
        if ($status == 1) {
            $content = 'Your request to join the group '.$group->name.' has been approved';
        }
        else {
            $content = 'Your request to join the group '.$group->name.' has been rejected';
        }
        Notification::create(['user_id' => $group->created_by, 'receiver_id' => $user_id, 'is_seen' => 0, 'content' => $content ]);
    }

    public function eventApproved(int $id, int $user_id, int $status, object $event) {

        $user = User::where('id', $user_id)->first();
        if ($status == 1 ) {
            $content = $user->name .' has approved your event '.ucwords($event->ename);
        } else {
            $content = 'Your event '.ucwords($event->ename).' has been rejected';
        }
        Notification::create(['user_id' => $user_id, 'receiver_id' => $event->creater_id, 'is_seen' => 0, 'content' => $content ]);
    }
}