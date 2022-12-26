<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('assets/dashboard/images/favicon.ico') }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('assets/dashboard/css/bootstrap.min.css') }}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ url('assets/dashboard/css/typography.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ url('assets/dashboard/css/style.css') }}">
    <link href="{{ url('assets/dashboard/css/faceMocion.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ url('assets/dashboard/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ url('assets/dashboard/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="{{ url('assets/dashboard/css/croppie.css') }}">
    @yield('page-css-link')
    @yield('page-css')

    </head>

<body class="sidebar-main-active right-column-fixed">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Sidebar  -->
        @include('dashboard.includes.fixed-sidebar-left')
        <!-- TOP Nav Bar -->
        @include('dashboard.includes.header-bp')
        <!-- TOP Nav Bar END -->
        <!-- Right Sidebar Panel Start-->
        @include('dashboard.includes.fixed-sidebar-right')
        <!-- Right Sidebar Panel End-->
        <!-- Page Content  -->
        @yield('main-content')
        <!--  <div id="content-page" class="content-page">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     Here Add Your HTML Content.....
                  </div>
               </div>
            </div>
         </div> -->
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
        <div id="chat-msg"></div>
    </div>
    <!-- Wrapper END -->
    <!-- Footer -->
    @include('dashboard.includes.footer')
    <!-- Footer END -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ url('assets/dashboard/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/js/bootstrap.min.js') }}"></script>
    <!-- Appear JavaScript -->
    <script src="{{ url('assets/dashboard/js/jquery.appear.js') }}"></script>
    <!-- Countdown JavaScript -->
    <script src="{{ url('assets/dashboard/js/countdown.min.js') }}"></script>
    <!-- Counterup JavaScript -->
    <script src="{{ url('assets/dashboard/js/waypoints.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/js/jquery.counterup.min.js') }}"></script>
    <!-- Wow JavaScript -->
    <script src="{{ url('assets/dashboard/js/wow.min.js') }}"></script>
    <!-- Apexcharts JavaScript -->
    <script src="{{ url('assets/dashboard/js/apexcharts.js') }}"></script>
    <!-- lottie JavaScript -->
    <script src="{{ url('assets/dashboard/js/lottie.js') }}"></script>
    <!-- Slick JavaScript -->
    <script src="{{ url('assets/dashboard/js/slick.min.js') }}"></script>
    <!-- Select2 JavaScript -->
    <script src="{{ url('assets/dashboard/js/select2.min.js') }}"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="{{ url('assets/dashboard/js/owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="{{ url('assets/dashboard/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="{{ url('assets/dashboard/js/smooth-scrollbar.js') }}"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ url('assets/dashboard/js/chart-custom.js') }}"></script>
    <!-- Custom JavaScript -->
    <script src="{{ url('assets/dashboard/js/custom.js') }}"></script>
    <script src="{{ url('assets/dashboard/js/croppie.js') }}"></script>
    <script src="{{ url('assets/dashboard/toastr/toastr.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('socket/socket.io.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/js/faceMocion.js') }}"></script>
    <script type="text/javascript">
        $(document).on('click', '.accept-friend-request', function() {
            toastr.options = {
                "closeButton": true,
                "newestOnTop": true,
                "positionClass": "toast-top-right"
            };
            route = $(this).attr('route');
            $.ajax({
                url: route,
                method: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    toastr.success(data.text);
                    if (data.status) {
                        // location.reload();
                    }
                }
            })
        });

        $(document).on('click', '.block-friend', function() {
            toastr.options = {
                "closeButton": true,
                "newestOnTop": true,
                "positionClass": "toast-top-right"
            };
            route = $(this).attr('route');
            $.ajax({
                url: route,
                method: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    toastr.success(data.text);
                    if (data.status) {
                        $('.profile-header-image').remove();
                    }
                }
            })
        });

        $(document).on('click', '.add-friend', function() {
            toastr.options = {
                "closeButton": true,
                "newestOnTop": true,
                "positionClass": "toast-top-right"
            };
            route = $(this).attr('route');
            let list_id = $(this).attr('user_id');
            $.ajax({
                url: route,
                method: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    toastr.success(data.text);
                    if (data.status) {
                        $('.add-friend-list-' + list_id).html('');
                    }
                }
            })
        });


        $(document).on('click', '.unblock-friend', function() {
            toastr.options = {
                "closeButton": true,
                "newestOnTop": true,
                "positionClass": "toast-top-right"
            };
            route = $(this).attr('route');
            $.ajax({
                url: route,
                method: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    toastr.success(data.text);
                    if (data.status) {
                        $('.block-friend-card ul').remove();
                        let block_friend_count = parseInt($('.block-friend-count').text());
                        //alert(block_friend_count);
                        $('.block-friend-count').text(block_friend_count-1);
                    }
                }
            })
        });

        $(".link-find-friend").click(function() {
            $("#friendSearch").submit();
        });

        $("#search_btn").click(function() {
            let searchKey = $("#search").val();
            location.href = ("{{url()->current()}}" + '?search=' + searchKey);
        });
        const urlParam = new URLSearchParams(window.location.search);
        $("#search").val(urlParam.get('search'));

        const currentRouteName = "{{Route::currentRouteName()}}";
        setInterval(() => {
            $.get("{{ route('user.alert') }}", (alerts, status) => {
                // messages
                const messengers = alerts.messengers;
                if (currentRouteName !== 'chat') {
                    if (messengers.length > 0) {
                        $("#alert_messenger").css('display', 'block');
                        $("#alert_no_messenger").css('display', 'none');

                        $("#header_total_messengers").html(messengers.length);

                        let alertMessengers = "";
                        for (let msger of messengers) {
                            const profileLink = msger.profile_image ? "<?php echo url('images/profile') ?>" + "/" + msger.profile_image :
                                "<?php echo url('assets/dashboard/img/default-avatar-1.png'); ?>";
                            const msg = msger.message.length > 50 ? msger.message.substring(0, 50) + " ..." : msger.message;

                            alertMessengers +=
                                `<a href="/chat?user=${msger.user_id}" class="iq-sub-card">
                                    <h6 class="mb-1">${msger.name}</h6>
                                    <div class="media align-items-center">
                                        <div class="">
                                            <img class="avatar-40 rounded" src="${profileLink}" alt="">
                                        </div>
                                        <div class="media-body ml-3">
                                            ${msg}
                                        </div>
                                    </div>
                                    <small class="float-right font-size-12 mt-1 text-info">${msger.created_at.substring(5, 16)}</small>
                                </a><div style="border-top: 1px solid #e0e0e0;"></div>`;
                        }
                        $("#header_message_div").empty();
                        $("#header_message_div").append(alertMessengers);
                    }
                }

                // notifications
                const notifications = alerts.notifications;
                if (notifications.length > 0) {
                    $("#alert_notification").css('display', 'block');
                    $("#alert_no_notification").css('display', 'none');

                    $("#header_total_notifications").html(notifications.length);

                    let alertNotifications = "";
                    for (let noti of notifications) {
                        const profileLink = noti.profile_image ? "<?php echo url('images/profile') ?>" + "/" + noti.profile_image :
                            "<?php echo url('assets/dashboard/img/default-avatar-1.png'); ?>";
                        const cont = noti.content.length > 50 ? noti.content.substring(0, 50) + " ..." : noti.content;

                        alertNotifications +=
                            `<a href="/notification?recent=${noti.id}" class="iq-sub-card">
                                <h6 class="mb-1">${noti.name}</h6>
                                <div class="media align-items-center">
                                    <div class="">
                                        <img class="avatar-40 rounded" src="${profileLink}" alt="">
                                    </div>
                                    <div class="media-body ml-3">
                                        ${cont}
                                    </div>
                                </div>
                                <small class="float-right font-size-12 mt-1 text-info">${noti.created_at.substring(5, 16)}</small>
                            </a><div style="border-top: 1px solid #e0e0e0;"></div>`;
                    }
                    $("#header_notification_div").empty();
                    $("#header_notification_div").append(alertNotifications);
                }
            });
        }, 10000);



        let _URL = window.URL || window.webkitURL;
        $('#uploadFile').click(function() {
            $('#uploadFile').blur();
        });
        $('#uploadBtn').change(function() {
            let direction = $('#direction').val();
            $('#uploadFile').val(this.value.replace("C:\\fakepath\\", ""));
            $.fn.imageValidate(direction);
        });
        $('#submit_btn').click(function() {
            let direction = $('#direction').val();
            $.fn.imageValidate(direction);
            setTimeout(
                function() {
                    if (!$('#image-size-warning').text()) {
                        $('#ads_form').submit();
                    }
                }, 200
            );
        });
        $.fn.imageValidate = function(direction) {
            let file = $('#uploadBtn')[0].files[0];
            img = new Image();
            let imgWidth = 0;
            let imgHeight = 0;
            let maxWidth = 700;
            let maxHeight = 700;
            if (direction == 1) {
                maxWidth = 1500;
                maxHeight = 500;
            } else {
                maxWidth = 500;
                maxHeight = 1500;
            }
            if (file) {
                img.src = _URL.createObjectURL(file);
            } else {
                img.src = $('#preview_img img').attr('src');
            }
            img.onload = function() {
                imgWidth = this.width;
                imgHeight = this.height;
                if (imgWidth >= maxWidth || imgHeight >= maxHeight) {
                    $('#image-size-warning').text('Image size must be under ' + maxWidth + 'X' + maxHeight);
                    $('#uploadFile').val('');
                } else {
                    $('#image-size-warning').text('');
                }
            }
        }


        var chatUsers = {!! json_encode($users, JSON_HEX_TAG) !!};
		var userIdStr = "<?php echo Auth::id(); ?>";
		var userId = parseInt(userIdStr);
		var receiverId = "";

        var socket = io.connect("https://hapiom.com", {path: '/nodesock/socket.io/'});
		// var socket = io.connect("http://localhost:4000")
		$(document).ready(function() {
			socket.on('requestUser', (data) =>{
				socket.emit('registerUser', {
					userId,
				});
			})

			socket.on('newMessage', (data) =>{
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

					$("#" + chatUser.id + " " + ".chat-content-d").append(newMsgElement);
				}
			})
		})

        function sendMsg(event, id) {
            let msgText
            if (event.keyCode == 13) {
                msgText = $("#" + id + " " + "#sendMsgTxt").val();
                if (!msgText) return;
                const now = new Date();
                const sendTime = now.getHours() + ':' + now.getMinutes();
                var newMsgElement =
                    `<div class="chat">
                        <div class="chat-time text-right" style="margin-right: 32px; color: white;">${sendTime}</div>
                        <div class="chat-detail">
                            <div class="chat-message">
                                <p>${msgText}</p>
                            </div>
                        </div>
                    </div>`;
                $("#" + id + " " + ".chat-content-d").append(newMsgElement);

                $("#" + id + " " + "#sendMsgTxt").val("");

                socket.emit('newMessage', {
                    body: msgText,
                    senderId: userId,
                    receiverId: receiverId,
                });
            }
        }
		function selectChatUser(chatUserId) {
			let newChat = `<div class="chat-block" id="`+ chatUserId +`">
                <div class="chat-head" style="background-color: green;">
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
                        <div class="chat-header-icons d-flex">
                            <i class="ri-close-line cursor-pointer" id="closeChatBtn`+ chatUserId +`" ></i>
                        </div>
                    </header>
                </div>
                <div class="chat-content-d scroller">
                </div>
                <div class="chat-footer p-3 bg-white">
                    <form class="d-flex align-items-center"  action="javascript:void(0);">
                        <div class="chat-attagement d-flex">
                            <a href="javascript:void();"><i class="fa fa-smile-o pr-3" aria-hidden="true"></i></a>
                            <a href="javascript:void();"><i class="fa fa-paperclip pr-3" aria-hidden="true"></i></a>
                        </div>
                        <input type="text" class="form-control mr-3" placeholder="Type your message" id="sendMsgTxt" onkeydown="sendMsg(event, `+ chatUserId + `)">
                    </form>
                </div>
            </div>`;
            //$('#chat-msg').append(newChat);
            if ($('#chat-msg').find('#' + chatUserId).length == 0) {
                $('#chat-msg').append(newChat);
            }
            $('#closeChatBtn' + chatUserId).on('click', function() {
                $('#chat-msg').find('#' + chatUserId).remove();
            });
			// remove the badge for unread message number
			$("#unreads_"+chatUserId).css('display', 'none');

			// // change the chatting user's image and name
			const chatUser = chatUsers.find(cuser => cuser.id === chatUserId);
			const chatUserProfile = chatUser.profile_image;
			const profileLink = chatUserProfile ? "<?php echo url('images/profile') ?>" + "/" + chatUserProfile :
			"<?php echo url('assets/dashboard/img/default-avatar-1.png'); ?>";
			$("#" + chatUserId + " " + ".chat_user_avatar").attr('src', profileLink);
			$("#" + chatUserId + " " + ".chat_user_name").html(chatUser.name);

			const data = {
				chatUserId,
				previousChatUserId: receiverId,
				"_token": "{{ csrf_token() }}",
			}
			receiverId = chatUserId;
			$.post("{{ route('messages-fetch') }}", data, (msgs, status) => {
				$("#" + chatUserId + " " + ".chat-content-d").empty();
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
				$("#" + chatUserId + " " + ".chat-content-d").append(msgElements);
			});
		}



        var dropdown = document.getElementsByClassName("dropdown-group-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            console.log(this.lastElementChild.className);
            if (this.lastElementChild.className == 'las la-plus') {
                this.lastElementChild.classList.remove('la-plus');
                this.lastElementChild.classList.add('la-minus');
            } else {
                this.lastElementChild.classList.remove('la-minus');
                this.lastElementChild.classList.add('la-plus');
            }

            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
            } else {
            dropdownContent.style.display = "block";
            }
        });
        }
    </script>

    @yield('page-js-link')
    @yield('page-js')
</body>

</html>