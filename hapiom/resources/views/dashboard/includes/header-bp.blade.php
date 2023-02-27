<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-navbar-logo d-flex justify-content-between">
                <a href="/">
                    <img src="{{ url('assets/dashboard/images/logo.png') }}" class="img-fluid" alt="">
                    <span></span>
                </a>
                <div class="iq-menu-bt align-self-center">
                    <div class="wrapper-menu">
                        <div class="main-circle"><i class="ri-menu-line"></i></div>
                    </div>
                </div>
            </div>
            <div class="iq-search-bar">
                <div class="searchbox">
                    <input type="text" class="text search-input" id="search" placeholder="Type here to search...">
                    <a class="search-link" id="search_btn" href="#"><i class="ri-search-line"></i></a>
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                <i class="ri-menu-3-line"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-list">
                    <li>
                        <a href="{{ route('user-profile', encrypt(Auth::user()->id)) }}" class="  d-flex align-items-center">
                            @if (isset(Auth::user()->userInfo->profile_image))
                                <img src="{{url('images/profile/'.Auth::user()->userInfo->profile_image)}}" class="img-fluid rounded-circle mr-3" alt="user">
                            @else
                                <img src="{{url('assets/dashboard/img/default-avatar.png')}}" class="img-fluid rounded-circle mr-3" alt="user">
                            @endif
                            <div class="caption">
                                <h6 class="mb-0 line-height">{{ ucwords(Auth::user()->name) }}</h6>
                            </div>
                        </a>
                    </li>
                   <!-- <li>
                        <a href="{{ url('/') }}" class="  d-flex align-items-center">
                            <i class="ri-home-line"></i>
                        </a>
                    </li>-->
                    <li class="nav-item">
                        <a class="search-toggle  " href="#"><i class="ri-group-line"></i></a>
                        <div class="iq-sub-dropdown iq-sub-dropdown-large">
                            <div class="iq-card shadow-none m-0">
                                <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                        <h5 class="mb-0 text-white">Friend Request<small class="badge  badge-light float-right pt-1">{{ Auth::user()->UserfriendRequest->count() }}</small></h5>
                                    </div>
                                    @if(Auth::user()->UserfriendRequest->count() > 0)
                                    @foreach( Auth::user()->UserfriendRequest as $friendrequest )
                                    <div class="iq-friend-request">
                                        <div class="iq-sub-card iq-sub-card-big d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="">
                                                    <img class="avatar-40 rounded" src="{{ url('assets/dashboard/images/user/01.jpg') }}" alt="">
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">{{ ucwords($friendrequest->FriendReequestName->name) }}</h6>
                                                    <p class="mb-0">{{$friendrequest->FriendReequestName->Userfriends->count()}} friends</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void();" class="mr-3 btn btn-primary rounded accept-friend-request" route="{{ route('accept-friend-request',$friendrequest->FriendReequestName->id)}}">Confirm</a>
                                                <a href="javascript:void();" class="mr-3 btn btn-secondary rounded">Delete Request</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif

                                    @if(Auth::user()->UserfriendRequest->count() > 4)
                                    <div class="text-center">
                                        <a href="{{ route('user-friend-request') }}" class="mr-3 btn text-primary">View More Request</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0);" class="search-toggle" id="alert_notification" style="display: none">
                            <div id="lottie-beil"></div>
                            <span class="bg-danger dots"></span>
                        </a>
                        <a class="search-toggle" href="javascript:void(0)" id="alert_no_notification"><i class="ri-notification-3-line"></i></a>
                        <div class="iq-sub-dropdown">
                            <div class="iq-card shadow-none m-0">
                                <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                        <h5 class="mb-0 text-white">
                                            <a href="{{ route('notification') }}">
                                                All Notifications
                                            </a>
                                            <small class="badge  badge-light float-right pt-1" id="header_total_notifications">0</small>
                                        </h5>
                                    </div>
                                    <div id="header_notification_div" style="max-height:600px; overflow-y: scroll;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);" class="search-toggle" id="alert_messenger" style="display: none">
                            <div id="lottie-mail"></div>
                            <span class="bg-danger count-mail"></span>
                        </a>
                        <a class="search-toggle" href="javascript:void(0)" id="alert_no_messenger"><i class="ri-mail-line"></i></a>
                        <div class="iq-sub-dropdown">
                            <div class="iq-card shadow-none m-0">
                                <div class="iq-card-body p-0">
                                    <div class="bg-primary p-3">
                                        <h5 class="mb-0 text-white">
                                            <a href="{{ route('chat') }}">
                                                All Messages
                                            </a>
                                            <small class="badge badge-light float-right pt-1" id="header_total_messengers">0</small>
                                        </h5>
                                    </div>
                                    <div id="header_message_div" style="max-height:600px; overflow-y: scroll;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-list">
                    <li>
                        <a href="#" class="search-toggle   d-flex align-items-center">
                            <i class="ri-arrow-down-s-fill"></i>
                        </a>
                        <div class="iq-sub-dropdown iq-user-dropdown">
                            <div class="iq-card shadow-none m-0">
                                <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3 line-height">
                                        <h5 class="mb-0 text-white line-height">Hello {{ ucwords(Auth::user()->name) }}</h5>
                                        <span class="text-white font-size-12">Available</span>
                                    </div>
                                    <a href="{{ route('profile-setting') }}" class="iq-sub-card iq-bg-warning-hover">
                                        <div class="media align-items-center">
                                            <div class="rounded iq-card-icon iq-bg-warning">
                                                <i class="ri-file-user-line"></i>
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Profile Settings</h6>
                                                <p class="mb-0 font-size-12">Modify your personal details.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ route('invite') }}" class="iq-sub-card iq-bg-warning-hover">
                                        <div class="media align-items-center">
                                            <div class="rounded iq-card-icon iq-bg-warning">
                                                <i class="ri-profile-line"></i>
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Invite Users</h6>
                                                <p class="mb-0 font-size-12">Invite Users.</p>
                                            </div>
                                        </div>
                                    </a>
                                    @if(Auth::user()->role_id == 1 || in_array(Auth::user()->meberships_id, [1,2,3]))
                                    <a href="{{ route('group-invite') }}" class="iq-sub-card iq-bg-warning-hover">
                                        <div class="media align-items-center">
                                            <div class="rounded iq-card-icon iq-bg-warning">
                                                <i class="ri-group-line"></i>
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Invite Group Users</h6>
                                                <p class="mb-0 font-size-12">Invite Group Users.</p>
                                            </div>
                                        </div>
                                    </a>
                                    @endif
                                    <div class="d-inline-block w-100 text-center p-3">
                                        <a class="bg-primary iq-sign-btn" href="{{ route('signout') }}" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>