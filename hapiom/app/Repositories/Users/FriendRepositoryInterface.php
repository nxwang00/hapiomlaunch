<?php

namespace App\Repositories\Users;

interface FriendRepositoryInterface
{
    public function friendSuggestions($limit);

    public function userFriendsCount($id);
}