<?php

namespace App\Http\Controllers\Web\Dashboard\Chat;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\DataProviders\Web\Dashboard\IndexDataProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Events\MessageSent;
use App\Models\Friendlist;
use App\Models\Userinfo;
use Redirect;

class ChatController extends Controller
{

    public function index(Request $request)
    {
        // $users = $this->getconversationUsers();
        // when using the link in header message alert panel
        $partner = $request->user;

        $friends = Friendlist::where('user_id', Auth::id())->get();
        $users = [];
        foreach($friends as $friend)
        {
            $user = User::find($friend->friend_id);
            $userinfo = Userinfo::where('user_id', $friend->friend_id)->first();
            $user->profile_image = isset($userinfo) ? $userinfo->profile_image : "";

            $unread_messages = Message::where('user_id', $friend->friend_id)->where('receiver_id', Auth::id())->where('is_seen', 0)->get();
            $user->unreads = count($unread_messages);
            array_push($users, $user);
        }

        $otherUser = new User();
        $channelName  = null;
        return view('dashboard.pages.chat.index', compact('users','otherUser','channelName', 'partner'));
    }

    public function chat(Request $request, $ids)
    {

        $ids = decrypt($ids);
        $authUser = Auth::user();

        $otherUser = User::find(explode('-', $ids)[1]);
        $users = $this->getconversationUsers();

       /* $msg = new Message();
        $msg->id = null;
        $msg->user = $authUser;
        $msg->user_id = $authUser->id;
        $msg->receiver_id = $otherUser->id;
        $msg->message = null;

        // echo "<pre>"; print_r($msg->toArray()); die;
        array_push($users, $msg);*/


        return view('dashboard.pages.chat.index', compact('users', 'otherUser'));

    }

    private function getconversationUsers() {
        $conversations =  Message::where('user_id', Auth::user()->id)
                ->orWhere('receiver_id', Auth::user()->id)
                ->get();

        $users = $conversations->map(function($conversation){
            if($conversation->user_id === auth()->id()) {
                $conv = $conversation->receiver;
                $conv->msg = $conversation->message;
                $conv->datetime = $conversation->created_at;
                return $conv;
            }
            $conv = $conversation->sender;
            $conv->msg = $conversation->message;
            $conv->datetime = $conversation->created_at;
            return $conv;
        })->unique();

        return $users;
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages(Request $request)
    {
        $id = $request->input('chatUserId');
        $preChatUserId = $request->input('previousChatUserId');

        $affectedRows = Message::where('user_id', $id)->where('receiver_id', Auth::id())->where('is_seen', 0)->update(array('is_seen' => 1));
        $affectedRows1 = Message::where('user_id', $preChatUserId)->where('receiver_id', Auth::id())->where('is_seen', 0)->update(array('is_seen' => 1));

        return Message::where(['user_id'=> Auth::user()->id,'receiver_id'=> $id])
                ->orWhere(function($q) use ($id) {
                    return $q->where('user_id',$id)
                    ->where('receiver_id',Auth::user()->id);
                })->with('user')->orderBy('created_at', 'ASC')->get();
    }

    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        $message = Message::create([
            'user_id' => $request->user['id'],
            'receiver_id' => $request->receiver['id'],
            'message' => $request->input('message')
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Sent!'];
    }

    public function unreadMessages(Request $request)
    {
        $senderId = $request->input('senderId');
        $receiverId = $request->input('receiverId');

        $unread_messages = Message::where('user_id', $senderId)->where('receiver_id', $receiverId)->where('is_seen', 0)->get();
        $unreads_num = count($unread_messages);

        return $unreads_num;
    }
}

