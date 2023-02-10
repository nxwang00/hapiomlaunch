<?php

namespace App\Repositories\Notifications;

interface NotificationsRepositoryInterface
{
    public function userJoinsGroup(int $group_id, int $user_id);
    
    public function groupJoinApproved(int $group_id, int $user_id, int $status);

    public function eventApproved(int $id, int $user_id, int $status, object $event);
}
