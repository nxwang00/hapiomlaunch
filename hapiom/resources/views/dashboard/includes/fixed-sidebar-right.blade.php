<div class="right-sidebar-mini right-sidebar">
    <div class="right-sidebar-panel p-0">
        <div class="iq-card shadow-none">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Direct Chat</h4>
                </div>
            </div>
            @php
            $friends = App\Models\Friendlist::where('user_id', Auth::id())->get();
            $users = [];
            foreach($friends as $friend)
            {
                $user = App\Models\User::find($friend->friend_id);
                $userinfo = App\Models\Userinfo::where('user_id', $friend->friend_id)->first();
                $user->profile_image = isset($userinfo) ? $userinfo->profile_image : "";

                $unread_messages = App\Models\Message::where('user_id', $friend->friend_id)->where('receiver_id', Auth::id())->where('is_seen', 0)->get();
                $user->unreads = count($unread_messages);
                array_push($users, $user);
            }
            @endphp
            <div class="iq-card-body p-0">
                <div class="media-height p-3" data-scrollbar="init">
                    @if (count($users) == 0)
                    <h5 class="text-center">No friendship.</h5>
                    @endif
                    <ul class="iq-chat-ui nav flex-column nav-pills">
                        @foreach($users as $user)
                        <li>
                            <a href="javascript:selectChatUser({{ $user->id }})">
                                <div class="d-flex align-items-center">
                                    <div class="avatar mr-2">
                                        @if (isset($user->userInfo->profile_image) && file_exists('images/profile/'.$user->userInfo->profile_image))
                                            <img src="{{url('images/profile/'.$user->userInfo->profile_image)}}" alt="chatuserimage" class="avatar-40" style="border-radius: 50%;">
                                        @else
                                            <img src="{{url('assets/dashboard/img/default-avatar.png')}}" alt="chatuserimage" class="avatar-40">
                                        @endif
                                    </div>
                                    <div class="chat-sidebar-name">
                                        <h6 class="mb-0">{{ ucfirst($user->first_name).' '.ucfirst($user->last_name) }}
                                            @if ($user->unreads > 0)
                                            <span class="badge badge-secondary float-right text-light mr-2" id="unreads_{{$user->id}}" style="display: block">{{$user->unreads}}</span>
                                            @else
                                            <span class="badge badge-secondary float-right text-light mr-2" id="unreads_{{$user->id}}" style="display: none">{{$user->unreads}}</span>
                                            @endif
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>