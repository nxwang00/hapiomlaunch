@extends('dashboard.layouts.master')
@section('title', ' Chat')
@section('page', ' Chat')
@section('page-css-link') @endsection
@section('page-css') @endsection
@section('main-content')

<div id="content-page" class="content-page">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="iq-card">
					<div class="iq-card-body chat-page p-0">
						<div class="chat-data-block">
							<div class="row">
								<div class="col-lg-3 chat-data-left scroller">
									<div class="chat-search pt-3 pl-3">
										<div class="d-flex align-items-center">
											<div class="mr-3">
												@if (isset(Auth::user()->userInfo->profile_image))
												<img src="{{ url('images/profile/' . Auth::user()->userInfo->profile_image) }}" alt="chat-user" class="avatar-60 ">
												@else
												<img src="{{url('assets/dashboard/img/default-avatar-1.png')}}" alt="chatuserimage" class="avatar-50">
												@endif
											</div>
											<div class="chat-caption">
												<h5 class="mb-0">{{ Auth::user()->name }}</h5>
												<p class="m-0"></p>
											</div>
											<button type="submit" class="close-btn-res p-3"><i class="ri-close-fill"></i></button>
										</div>
										<div id="user-detail-popup" class="scroller">
											<div class="user-profile">
												<button type="submit" class="close-popup p-3"><i class="ri-close-fill"></i></button>
												<div class="user text-center mb-4">
													<a class="avatar m-0">
														@if (isset(Auth::user()->userInfo->profile_image))
														<img src="{{ url('images/profile/' . Auth::user()->userInfo->profile_image) }}" alt="avatar">
														@else
														<img src="{{url('assets/dashboard/img/default-avatar-1.png')}}" alt="chatuserimage" class="avatar-100">
														@endif
													</a>
													<div class="user-name mt-4">
														<h4>{{ Auth::user()->name }}</h4>
													</div>
													<div class="user-desc">
														@if (isset(Auth::user()->userInfo->description))
														<p>{{ Auth::user()->userInfo->description }}</p>
														@endif
													</div>
												</div>
												<hr>
												<div class="user-detail text-left mt-4 pl-4 pr-4">
													<h5 class="mt-4 mb-4">About</h5>
													<p>It is long established fact that a reader will be distracted bt the reddable.</p>
													<h5 class="mt-3 mb-3">Status</h5>
													<ul class="user-status p-0">
														<li class="mb-1"><i class="ri-checkbox-blank-circle-fill text-success pr-1"></i><span>Online</span></li>
														<li class="mb-1"><i class="ri-checkbox-blank-circle-fill text-warning pr-1"></i><span>Away</span></li>
														<li class="mb-1"><i class="ri-checkbox-blank-circle-fill text-danger pr-1"></i><span>Do Not Disturb</span></li>
														<li class="mb-1"><i class="ri-checkbox-blank-circle-fill text-light pr-1"></i><span>Offline</span></li>
													</ul>
												</div>
											</div>
										</div>
										<div class="chat-searchbar mt-4">
											<div class="form-group chat-search-data m-0">
												<input type="text" class="form-control round" id="chat-search" placeholder="Search" onkeydown="chatUserSearch(event)"/>
												<i class="ri-search-line"></i>
											</div>
										</div>
									</div>
									<div class="chat-sidebar-channel scroller mt-4 pl-3">

										<h5 class="mt-3">Direct Message</h5>
										<ul class="iq-chat-ui nav flex-column nav-pills">
											@if (count($users) === 0)
											<li>No users</li>
											@else
												@foreach ($users as $user)
												<li>
													<a href="javascript:selectChatUser({{ $user->id }})">
														<div class="d-flex align-items-center">
															<div class="avatar mr-2">
																@if (isset($user->profile_image) && $user->profile_image != '')
																<img src="{{url('images/profile/'.$user->profile_image)}}" alt="chatuserimage" class="avatar-40" style="border-radius: 50%;">
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
											@endif
										</ul>
									</div>
								</div>
								<div class="col-lg-9 chat-data p-0 chat-data-right">
									<div class="tab-content">
										<div class="tab-pane fade active show" id="default-block" role="tabpanel">
											<div class="chat-start">
												<span class="iq-start-icon text-primary"><i class="ri-message-3-line"></i></span>
												<button id="chat-start" class="btn bg-white mt-3">Start
													Conversation!</button>
											</div>
										</div>
										<div class="tab-pane fade" id="chat-block" role="tabpanel">
											<?php if (isset($otherUser->first_name)) { ?>
												<div class="col col-xl-7 col-lg-6 col-md-12 col-sm-12 col-12">

													<!-- Chat Field -->

													<chat-messages :auth-user="{{ auth()->user() }}" :other-user="{{$otherUser}}" :image-src="'{{url('/')}}'"></chat-messages>

													<!-- ... end Chat Field -->

												</div>
											<?php } ?>
											<div class="chat-head">
												<header class="d-flex justify-content-between align-items-center bg-white pt-3 pl-3 pr-3 pb-3">
													<div class="d-flex align-items-center">
														<div class="sidebar-toggle">
															<i class="ri-menu-3-line"></i>
														</div>
														<div class="avatar chat-user-profile m-0 mr-3">
															<img src="{{ url('assets/dashboard/images/user/10.jpg') }}" alt="avatar" class="avatar-50 chat_user_avatar">
															<span class="avatar-status"><i class="ri-checkbox-blank-circle-fill text-success"></i></span>
														</div>
														<h5 class="mb-0 chat_user_name">Paul Molive</h5>
													</div>
													<div class="chat-user-detail-popup scroller">
														<div class="user-profile text-center">
															<button type="submit" class="close-popup p-3"><i class="ri-close-fill"></i></button>
															<div class="user mb-4">
																<a class="avatar m-0">
																	<img src="{{ url('assets/dashboard/images/user/10.jpg') }}" alt="avatar" class="avatar-100 chat_user_avatar">
																</a>
																<div class="user-name mt-4">
																	<h4 class="chat_user_name">Paul Molive</h4>
																</div>
																<div class="user-desc">
																	<p id="chat_user_address"></p>
																</div>
															</div>
															<hr>
															<div class="chatuser-detail text-left mt-4">
																<div class="row">
																	<div class="col-6 col-md-6 title">Tel:</div>
																	<div class="col-6 col-md-6 text-right" id="chat_user_tel">072 143 9920</div>
																</div>
																<hr>
																<div class="row">
																	<div class="col-6 col-md-6 title">Date Of Birth:</div>
																	<div class="col-6 col-md-6 text-right" id="chat_user_birthday">July 12, 1989</div>
																</div>
																<hr>
																<div class="row">
																	<div class="col-6 col-md-6 title">Gender:</div>
																	<div class="col-6 col-md-6 text-right" id="chat_user_gender">Male</div>
																</div>
															</div>
														</div>
													</div>
													<div class="chat-header-icons d-flex">
														<a href="javascript:void();" class="chat-icon-phone">
															<i class="ri-phone-line"></i>
														</a>
														<a href="javascript:void();" class="chat-icon-video">
															<i class="ri-vidicon-line"></i>
														</a>
														<a href="javascript:void();" class="chat-icon-delete">
															<i class="ri-delete-bin-line"></i>
														</a>
														<span class="dropdown">
															<i class="ri-more-2-line cursor-pointer dropdown-toggle nav-hide-arrow cursor-pointer" id="dropdownMenuButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></i>
															<span class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton4">
																<a class="dropdown-item" href="JavaScript:void(0);"><i class="fa fa-thumb-tack" aria-hidden="true"></i> Pin to top</a>
																<a class="dropdown-item" href="JavaScript:void(0);"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete chat</a>
																<a class="dropdown-item" href="JavaScript:void(0);"><i class="fa fa-ban" aria-hidden="true"></i> Block</a>
															</span>
														</span>
													</div>
												</header>
											</div>
											<div class="chat-content scroller">
											</div>
											<div class="chat-footer p-3 bg-white">
												<form class="d-flex align-items-center" action="javascript:void(0);">
													<div class="chat-attagement d-flex">
														<a href="javascript:void();"><i class="fa fa-smile-o pr-3" aria-hidden="true"></i></a>
														<a href="javascript:void();"><i class="fa fa-paperclip pr-3" aria-hidden="true"></i></a>
													</div>
													<input type="text" class="form-control mr-3" placeholder="Type your message" id="sendMsgTxt">
													<button type="button" class="btn btn-primary d-flex align-items-center p-2" id="sendMsgBtn" disabled>
														<i class="fas fa-paper-plane" aria-hidden="true"></i>
														<span class="d-none d-lg-block ml-1">Send</span>
													</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@section('page-js-link')
<script type="text/javascript" src="{{ asset('socket/socket.io.min.js') }}"></script>
@endsection
@section('page-js')
<script>
	var chatUsers = {!! json_encode($users, JSON_HEX_TAG) !!};
	var partner = {!! json_encode($partner, JSON_HEX_TAG) !!};
	var userIdStr = "<?php echo Auth::id(); ?>";
	var userId = parseInt(userIdStr);
	var receiverId = "";

	var socket = io.connect("https://enjoy.hapiom.com", {path: '/nodesock/socket.io/'});
	// var socket = io.connect("http://localhost:4000");
	$(document).ready(function() {
		if (partner) {
			selectChatUser(parseInt(partner));
		}

		socket.on('requestUser', (data) => {
			socket.emit('registerUser', {
				userId,
			});
		})

		socket.on('newMessage', (data) => {
			// if current user is not choosing the recever
			if (receiverId !== data.senderId) {
				var isShowBadge = $("#unreads_" + data.senderId).css('display');
				if (isShowBadge === "none") {
					$("#unreads_" + data.senderId).html(1);
					$("#unreads_" + data.senderId).css('display', 'block');
				} else {
					var unreadMsgNums = parseInt($("#unreads_" + data.senderId).html());
					unreadMsgNums += 1;
					$("#unreads_" + data.senderId).html(unreadMsgNums);
				}
			} else {
				const now = new Date();
				const receiveTime = now.getHours() + ':' + now.getMinutes();
				const senderId = data.senderId;

				const chatUser = chatUsers.find(cuser => cuser.id === senderId);
				const chatUserProfile = chatUser.profile_image;
				const profileLink = chatUserProfile ? "<?php echo url('images/profile') ?>" + "/" + chatUserProfile :
					"<?php echo url('assets/dashboard/img/default-avatar-1.png'); ?>";

				var newMsgElement =
					`<div class="chat chat-left">
							<div class="chat-user" style="margin-top:32px">
								<a class="avatar m-0">
									<img src="${profileLink}" alt="avatar" class="avatar-35 ">
								</a>
							</div>
							<div class="chat-time text-left" style="margin-left:52px">${receiveTime}</div>
							<div class="chat-detail">
								<div class="chat-message">
									<p>${data.body}</p>
								</div>
							</div>
						</div>`;

				$(".chat-content").append(newMsgElement);
			}
		})

		$("#sendMsgBtn").on('click', () => {
			const msgText = $("#sendMsgTxt").val();
			if (!msgText) return;

			const now = new Date();
			const sendTime = now.getHours() + ':' + now.getMinutes();

			var newMsgElement =
				`<div class="chat">
						<div class="chat-time text-right" style="margin-right: 32px">${sendTime}</div>
						<div class="chat-detail">
							<div class="chat-message">
								<p>${msgText}</p>
							</div>
						</div>
					</div>`;

			$(".chat-content").append(newMsgElement);

			$("#sendMsgTxt").val("");

			socket.emit('newMessage', {
				body: msgText,
				senderId: userId,
				receiverId: receiverId,
			});
		})

		$("#sendMsgTxt").keydown(function() {
			if ($(this).val())
				$("#sendMsgBtn").removeAttr('disabled');
			else
				$("#sendMsgBtn").attr('disabled', 'true');
		});

		const urlParams = new URLSearchParams(window.location.search);
		const param_x = urlParams.get('chat-search');
		$('#chat-search').val(param_x);
	})

	function selectChatUser(chatUserId) {

		$("#default-block").removeClass('active show');
		$("#chat-block").addClass('active show');
		// remove the badge for unread message number
		$("#unreads_" + chatUserId).css('display', 'none');

		// change the chatting user's image and name
		const chatUser = chatUsers.find(cuser => cuser.id === chatUserId);
		const chatUserProfile = chatUser.profile_image;
		const profileLink = chatUserProfile ? "<?php echo url('images/profile') ?>" + "/" + chatUserProfile :
			"<?php echo url('assets/dashboard/img/default-avatar-1.png'); ?>";
		$(".chat_user_avatar").attr('src', profileLink);
		$(".chat_user_name").html(chatUser.name);

		let chatUserAddress = "";
		if (chatUser.user_info && chatUser.user_info.city)
			chatUserAddress += chatUser.user_info.city;
		if (chatUser.user_info && chatUser.user_info.country)
			chatUserAddress += ", " + chatUser.user_info.country;
		$("#chat_user_address").html(chatUserAddress)

		$("#chat_user_tel").html(chatUser.user_info ? chatUser.user_info.phone_number : "");
		$("#chat_user_birthday").html(chatUser.user_info ? chatUser.user_info.dob : "");

		let gender = "";
		if (chatUser.user_info)
			if (chatUser.user_info.gender === "1")
				gender = "Male";
			else if (chatUser.user_info.gender === "0")
			gender = "Female";

		$("#chat_user_gender").html(gender);

		const data = {
			chatUserId,
			previousChatUserId: receiverId,
			"_token": "{{ csrf_token() }}",
		}
		receiverId = chatUserId;
		$.post("{{ route('messages-fetch') }}", data, (msgs, status) => {
			$(".chat-content").empty();
			let msgElements = "";
			for (let msg of msgs) {
				const createdAt = msg.created_at;
				const created = createdAt.split("T");
				const createdTimes = created[1].split(":");
				if (msg.receiver_id === chatUserId) {
					msgElements +=
						`<div class="chat">
								<div class="chat-time text-right" style="margin-right: 32px">${createdTimes[0] + ":" + createdTimes[1]}</div>
								<div class="chat-detail">
									<div class="chat-message">
										<p>${msg.message}</p>
									</div>
								</div>
							</div>`;
				} else if (msg.user_id === chatUserId) {
					msgElements +=
						`<div class="chat chat-left">
								<div class="chat-user" style="margin-top:32px">
									<a class="avatar m-0">
										<img src="${profileLink}" alt="avatar" class="avatar-35 ">
									</a>
								</div>
								<div class="chat-time text-left" style="margin-left:52px">${createdTimes[0] + ":" + createdTimes[1]}</div>
								<div class="chat-detail">
									<div class="chat-message">
										<p>${msg.message}</p>
									</div>
								</div>
							</div>`
				}
			}
			$(".chat-content").append(msgElements);
		});
	}

	function chatUserSearch(event) {
		if (event.keyCode == 13) {
			let searchKey = $('#chat-search').val();
			location.href = ("{{url()->current()}}" + '?chat-search=' + searchKey);
		}
	}

</script>
@endsection