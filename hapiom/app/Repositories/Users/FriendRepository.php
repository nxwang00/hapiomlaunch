<?php

namespace App\Repositories\Users;

use App\Models\Friendlist;
use App\Models\Friendrequest;
use App\Models\User;
use Auth;
use DB;

class FriendRepository  implements FriendRepositoryInterface
{
    public function friendSuggestions($limit) {
        //first let's get the list of friends and friend requests
        $friends_id = Friendlist::select('friend_id')->where('user_id', Auth::user()->id)->pluck('friend_id');
        $requsetFriend = Friendrequest::where('request_from', Auth::user()->id)->pluck('request_to');
        $sendRequset = Friendrequest::where('request_to', Auth::user()->id)->pluck('request_from');
        $requestedAndFrinedsId = array_merge($friends_id->toArray(), $requsetFriend->toArray(), $sendRequset->toArray());

        $possible_friends = $this->getUsersByPriority($requestedAndFrinedsId, $limit);

        if ($possible_friends == 0) {
            $query = 'SELECT a.*, b.profile_image FROM users as a LEFT JOIN userinfos b ON a.id = b.user_id LIMIT '.$limit;
        }
        else {
            $query = 'SELECT a.*, b.profile_image FROM users as a LEFT JOIN userinfos b ON a.id = b.user_id WHERE a.id IN ('.implode(',', $possible_friends).') ORDER BY FIELD(a.id, '.implode(',', $possible_friends).') LIMIT '.$limit;
        }
        return $users = DB::select(DB::raw($query));
    }

    private function getUsersByPriority($requestedAndFrinedsId, $limit = 10)
    {
        if  (count($requestedAndFrinedsId) == 0) {
            $notIn1 = $notIn2 = '';
        } else {
            $notIn1 = 'AND a.id NOT IN ('.implode(',', $requestedAndFrinedsId).')';
            $notIn2 = 'AND user_id NOT IN ('.implode(',', $requestedAndFrinedsId).')';
        }
        //Completed Profiles. We use mst here in order to have the same amount of fields
        $query_1 = 'SELECT a.id as user_id, 1 as mst FROM users a INNER JOIN userinfos b ON a.id = b.user_id WHERE a.id != :somevariable '.$notIn1.' LIMIT '.$limit;
        //Users in the Same Group. We use mst here in order to have the same amount of fields
        $query_2 = 'SELECT user_id, 1 as mst FROM `group_users` WHERE group_id in (SELECT group_id FROM group_users where user_id = :somevariable2) AND status=1 AND user_id != :somevariable3 '.$notIn2.' LIMIT '.$limit;
        //Most friends
        $query_3 = '(SELECT user_id, count(*) as mst FROM `friendlists` WHERE user_id != :somevariable4 '.$notIn2.' GROUP BY user_id ORDER BY mst DESC LIMIT '.$limit.')';

        $query = '('.$query_1.') UNION ('.$query_2.') UNION '.$query_3;
        $users = DB::select(DB::raw($query), ['somevariable' => Auth::user()->id, 'somevariable2' => Auth::user()->id, 'somevariable3' => Auth::user()->id, 'somevariable4' => Auth::user()->id]);

        $users = array_map(function ($value) {
            return $value->user_id;
        }, $users);

        return $users;
    }

    private function UserCompletedProfiles($requestedAndFrinedsId, $limit)
    {
        $query = 'SELECT a.id FROM users a INNER JOIN userinfos b ON a.id = b.user_id WHERE a.id != :somevariable AND a.id NOT IN ('.implode(',', $requestedAndFrinedsId).') LIMIT '.$limit;
        $users = DB::select(DB::raw($query), ['somevariable' => Auth::user()->id]);
        $users = array_map(function ($value) {
            return $value->id;
        }, $users);

        return User::whereIn('id', $users)->get()->toArray();
    }

    private function UsersSameGroup($requestedAndFrinedsId, $limit)
    {
        $query = 'SELECT user_id FROM `group_users` WHERE group_id in (SELECT group_id FROM group_users where user_id = :somevariable) AND status=1 AND user_id != :somevariable2 AND user_id NOT IN ('.implode(',', $requestedAndFrinedsId).') LIMIT '.$limit;
        $users = DB::select(DB::raw($query), ['somevariable' => Auth::user()->id, 'somevariable2' => Auth::user()->id]);
        $users = array_map(function ($value) {
            return $value->user_id;
        }, $users);

        return User::whereIn('id', $users)->get()->toArray();
    }

    private function UsersMostFriends($requestedAndFrinedsId, $limit)
    {
        $query = '(SELECT user_id, count(*) as mst FROM `friendlists` WHERE user_id != :somevariable AND user_id NOT IN ('.implode(',', $requestedAndFrinedsId).') GROUP BY user_id ORDER BY mst DESC LIMIT '.$limit.') UNION (SELECT friend_id as user_id, count(*) as mst FROM `friendlists` WHERE  friend_id NOT IN ('.implode(',', $requestedAndFrinedsId).') AND friend_id != :somevariable2 GROUP BY friend_id ORDER BY mst DESC LIMIT '.$limit.');';
        $users = DB::select(DB::raw($query), ['somevariable' => Auth::user()->id, 'somevariable2' => Auth::user()->id]);
        $users = array_map(function ($value) {
            return $value->user_id;
        }, $users);

        return User::whereIn('id', $users)->get()->toArray();
    }

    public function userFriendsCount($id)
    {

        $query = "SELECT id FROM users WHERE id IN ((SELECT user_id FROM friendlists WHERE friend_id = :somevariable)) AND status = 1";
        $users = DB::select(DB::raw($query), ['somevariable' => $id]);
        echo count($users);
    }

}