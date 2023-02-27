@extends('dashboard.layouts.master')
@section('title', ' Profile')
@section('page', ' Profile')
@section('page-css-link')
@endsection
@section('page-css')
<style>
    div#social-links {
        margin: 0 auto;
        max-width: 500px;
    }

    div#social-links ul {
        padding-left: 0;
        margin-bottom: 0;
    }

    div#social-links ul li {
        display: inline-block;
    }

    div#social-links ul li a {
        padding: 6px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin: 1px;
        font-size: 20px;
        margin-right: 6px;
    }

    div#social-links .fa-facebook {
        color: #0d6efd;
    }

    div#social-links .fa-twitter {
        color: deepskyblue;
    }

    div#social-links .fa-linkedin {
        color: #0e76a8;
    }

    div#social-links .fa-whatsapp {
        color: #25D366;
    }

    div#social-links .fa-reddit {
        color: #FF4500;
    }

    div#social-links .fa-telegram {
        color: #0088cc;
    }

    .custom-file-label::after {
        height: 3em;
        line-height: 2.0
    }

    /* select2 style */
    .select2-container .select2-selection--single {
        height: 43px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 40px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 5px;
    }

    .select2-container--default .select2-selection--single {
        background-color: #fff;
        border: 1px solid #edebeb;
        border-radius: 8px;
    }
</style>
@endsection
@section('main-content')

<div id="content-page" class="content-page">
    <div class="container">
        <p>@include('dashboard.includes.alert')</p>
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-body profile-page p-0">
                        <div class="profile-header">
                            <div class="cover-container">
                                <img src="{{ url('assets/dashboard/images/page-img/profile-bg1.jpg') }}" alt="profile-bg" class="rounded img-fluid">
                            </div>
                            <div class="user-detail text-center mb-3">
                                <div class="profile-img">
                                    @if(isset($user->userInfo->profile_image) && file_exists('images/profile/'. $user->userInfo->profile_image))
                                    <img src="{{ url('images/profile/',$user->userInfo->profile_image) }}" alt="profile-img" class="avatar-130 img-fluid" />
                                    @else
                                    <img src="{{url('assets/dashboard/img/default-avatar.png')}}" alt="profile-img" class="avatar-130 img-fluid" />
                                    @endif
                                    <input type="file" class="profile-picture" id="file-upload" name="profile_image" accept="image/*">
                                </div>
                                <div class="profile-detail">
                                    <h3 class="">{{ ucwords($user->name) }}</h3>
                                </div>
                            </div>
                            <div class="profile-info p-4 d-flex align-items-center justify-content-between position-relative">
                                <div class="social-links">
                                    {!! $shareComponent !!}
                                </div>
                                <div class="social-info">
                                    <ul class="social-data-block d-flex align-items-center justify-content-between list-inline p-0 m-0">
                                        <li class="text-center pl-3">
                                            <h6>Posts</h6>
                                            <p class="mb-0">{{ @$user->UserNewsFeedPost->count() }}</p>
                                        </li>
                                        <li class="text-center pl-3">
                                            <h6>Followers</h6>
                                            <p class="mb-0">{{ $followerCount }}</p>
                                        </li>
                                        <li class="text-center pl-3">
                                            <h6>Following</h6>
                                            <p class="mb-0">{{ $followingCount }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="iq-card">
                    <div class="iq-card-body p-0">
                        <div class="user-tabing">
                            <ul class="nav nav-pills d-flex align-items-center justify-content-center profile-feed-items p-0 m-0">
                                <li class="col-sm-3 p-0">
                                    <a class="nav-link active" data-toggle="pill" href="#timeline">Timeline</a>
                                </li>
                                <li class="col-sm-3 p-0">
                                    <a class="nav-link" data-toggle="pill" href="#about">About</a>
                                </li>
                                <li class="col-sm-3 p-0">
                                    <a class="nav-link" data-toggle="pill" href="#friends">friends</a>
                                </li>
                                <li class="col-sm-3 p-0">
                                    <a class="nav-link" data-toggle="pill" href="#photos">Photos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="timeline" role="tabpanel">
                        <div class="iq-card-body p-0">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="iq-card">
                                        <div class="iq-card-body">
                                            <a href="#"><span class="badge badge-pill badge-primary font-weight-normal ml-auto mr-1"><i class="ri-star-line"></i></span> 27 Items for you</a>
                                        </div>
                                    </div>
                                    @if ($user->role_id === 2)
                                    <div class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Store</h4>
                                            </div>
                                            @if ($user->id === Auth::id())
                                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                                <p class="m-0">
                                                    <span onclick="onCreateStore();" class="text-primary" style="cursor:pointer">
                                                        @if (isset($user->store->id))
                                                        <i class="fas fa-edit"></i>
                                                        @else
                                                        <i class="fas fa-plus"></i>
                                                        @endif
                                                    </span>
                                                </p>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="iq-card-body">
                                            @if (isset($user->store->id))
                                            <img src="{{ url('images/store/', $user->store->image) }}" alt="story-img" style="max-width: 100%" class="rounded">
                                            <div class="text-center mt-2">
                                                <h5>{{ $user->store->sname }}</h5>
                                                <div>{{ $user->store->created_at }}</div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                    <div class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                        @if ($user->id === Auth::id())
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Create Event</h4>
                                            </div>
                                            @else
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Events</h4>
                                            </div>
                                            @endif
                                            @if ($user->id === Auth::id())
                                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                                <p class="m-0">
                                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#createEventModal"><i class="fas fa-plus"></i></a>
                                                </p>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="iq-card-body">
                                            <div class="row">
                                                @foreach($events as $event)
                                                <div class="col-sm-12">
                                                    <div class="event-post position-relative">
                                                        <a href="javascript:void();"><img src="{{ url('images/event/', $event->image) }}" width="100%" alt="gallary-image" class="img-fluid rounded"></a>
                                                        <div class="job-icon-position">
                                                            <div class="job-icon bg-primary p-2 d-inline-block rounded-circle"><i class="ri-briefcase-line"></i></div>
                                                        </div>
                                                        <div class="iq-card-body text-center p-2">
                                                            <h5>{{ $event->ename }}</h5>
                                                            <p>{{ $event->start_date }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Photos</h4>
                                            </div>
                                            @if ($user->id === Auth::id())
                                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                                <p class="m-0"><a href="javascript:void(0);" data-toggle="modal" data-target="#createPhotoModal"><i class="fas fa-plus"></i></a></p>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="iq-card-body">
                                            <div class="row">
                                                @foreach($photos as $photo)
                                                <div class="col-4">
                                                    <img src="{{ url('images/photo/', $photo->image) }}" width="100%" alt="gallary-image" class="img-fluid rounded">
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Friends</h4>
                                            </div>
                                            @if ($user->id === Auth::id())
                                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                                <p class="m-0"><a href="javascript:void();" data-toggle="modal" data-target="#createFriendModal"><i class="fas fa-plus"></i></a></p>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="iq-card-body">
                                            <ul class="request-list m-0 p-0">
                                                @foreach($friends as $friend)
                                                <li class="d-flex align-items-center">
                                                    <div class="user-img img-fluid">
                                                    <a href="{{ route('user-profile',encrypt($friend->id)) }}" class="">
                                                        @if(isset($friend->profile_image) && file_exists('images/profile/'. $friend->profile_image))
                                                        <img src="{{ url('images/profile/',$friend->profile_image) }}" alt="story-img" class="rounded-circle avatar-40">
                                                        @else
                                                        <img src="{{ url('assets/dashboard/img/default-avatar.png') }}" alt="profile-img" class="rounded-circle avatar-40" />
                                                        @endif
                                                    </a>
                                                    </div>
                                                    <div class="media-support-info ml-3">
                                                        <h6><a href="{{ route('user-profile',encrypt($friend->id)) }}" class="">{{ ucwords($friend->name) }}</a></h6>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div id="post-modal-data" class="iq-card">
                                    @if ($user->id == Auth::user()->id)<div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Create Post</h4>
                                            </div>
                                        </div>
                                        <!------------------------------------------------------------------------------->

                                        <form method="post" action="{{ route('newsfeed-create') }}" enctype="multipart/form-data" id="post_upload_Form"  >
									@csrf
									<div style="padding: 1em;">
										<div class="d-flex align-items-center">
											<div class="user-img">
												@if(isset($userinfo->profile_image) && file_exists('images/profile/'. $userinfo->profile_image))
												<img src="{{ url('images/profile',$userinfo->profile_image ) }}" alt="userimg" class="avatar-60 rounded-circle">
												@else
												<img src="{{url('assets/dashboard/img/default-avatar.png')}}" alt="userimg" class="avatar-60 rounded-circle">
												@endif
											</div>
											<div class="caption ml-2">
												<h5 class="mb-0 line-height">{{ ucwords(Auth::user()->name) }}</h5>
											</div>
										</div>
										<input onkeyup="enableDisablePost()" id="mainpost" type="text" class="form-control mt-3" name="textpost" placeholder="What's on your mind?" style="border-radius:20px;">

										<input type="hidden" name="group_id" value="{{ @$group_id }}">
										<hr>
										<ul class="d-flex flex-wrap align-items-center list-inline m-0 p-0">
											<li class="col-md-6 mb-3 d-flex">
												<div class="iq-bg-primary rounded p-2 pointer mr-3 image_upload1"><img src="{{ url('assets/dashboard/images/small/07.png') }}" alt="icon" class="img-fluid "> Photo/Video</div>
												<input class="d-none" id="my_file1" type="file" name="image[]" multiple>
												<div id="preview_embed"></div>
											</li>
										</ul>
										<hr>
										<div class="other-option">
											<div class="d-flex align-items-center justify-content-between">


											</div>
										</div>
										<button id="post_submit" type="submit" class="btn btn-primary d-block w-100 mt-3" disabled>Post</button>
									</div>
								</form>
@endif
                                        <!--<div class="iq-card-body" data-toggle="modal" data-target="#post-modal">
                                           <div class="d-flex align-items-center">
                                                <div class="user-img">
                                                    @if(isset(Auth::user()->profile_image) && file_exists('images/profile/'. $friend->profile_image))
                                                    <img src="{{ url('images/profile/',$friend->userInfo->profile_image) }}" alt="userimg" class="avatar-60 rounded-circle img-fluid">
                                                    @else
                                                    <img src="{{ url('assets/dashboard/img/default-avatar.png') }}" alt="profile-img" class="avatar-60 rounded-circle img-fluid" />
                                                    @endif
                                                </div>
                                                <!--<form class="post-text ml-3 w-100" action="javascript:void();">
                                                    <input type="text" class="form-control" placeholder="What's on your mind?" style="border: none;">
                                                </form>


                                            </div>-
                                            <hr>
                                            <ul class="post-opt-block d-flex align-items-center list-inline m-0 p-0">
                                                <li class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="{{ url('assets/dashboard/images/small/07.png') }}" alt="icon" class="img-fluid"> Photo/Video</li>
                                                <li class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="{{ url('assets/dashboard/images/small/08.png') }}" alt="icon" class="img-fluid"> Tag Friend</li>
                                                <li class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="{{ url('assets/dashboard/images/small/09.png') }}" alt="icon" class="img-fluid"> Feeling/Activity</li>
                                                <li class="iq-bg-primary rounded p-2 pointer">
                                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                                        <div class="dropdown">
                                                            <span class="dropdown-toggle" id="post-option" data-toggle="dropdown">
                                                                <i class="ri-more-fill"></i>
                                                            </span>
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="post-option" style="">
                                                                <a class="dropdown-item" href="#">Check in</a>
                                                                <a class="dropdown-item" href="#">Live Video</a>
                                                                <a class="dropdown-item" href="#">Gif</a>
                                                                <a class="dropdown-item" href="#">Watch Party</a>
                                                                <a class="dropdown-item" href="#">Play with Friend</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>-->
                                        <div class="modal fade" id="post-modal" tabindex="-1" role="dialog" aria-labelledby="post-modalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="post-modalLabel">Create Post</h5>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="ri-close-fill"></i></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="d-flex align-items-center">
                                                            <div class="user-img">
                                                                @if(isset(Auth::user()->profile_image) && file_exists('images/profile/'. $friend->profile_image))
                                                                <img src="{{ url('images/profile/',$friend->userInfo->profile_image) }}" alt="userimg" class="avatar-60 rounded-circle img-fluid">
                                                                @else
                                                                <img src="{{ url('assets/dashboard/img/default-avatar.png') }}" alt="profile-img" class="avatar-60 rounded-circle img-fluid" />
                                                                @endif
                                                            </div>
                                                            <div class="caption ml-2">
                                                                <h5 class="mb-0 line-height">{{ ucwords(Auth::user()->name) }}</h5>
                                                            </div>

                                                        </div>
                                                        <form class="post-text w-100 mt-3" action="javascript:void();">
                                                            <input type="text" class="form-control" placeholder="What's on your mind?" style="border-radius:20px;">
                                                        </form>
                                                        <hr>
                                                        <ul class="d-flex flex-wrap align-items-center list-inline m-0 p-0">
                                                            <li class="col-md-6 mb-3">
                                                                <div class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="{{ url('assets/dashboard/images/small/07.png') }}" alt="icon" class="img-fluid"> Photo/Video</div>
                                                            </li>
                                                            <li class="col-md-6 mb-3">
                                                                <div class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="{{ url('assets/dashboard/images/small/08.png') }}" alt="icon" class="img-fluid"> Tag Friend</div>
                                                            </li>
                                                            <li class="col-md-6 mb-3">
                                                                <div class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="{{ url('assets/dashboard/images/small/09.png') }}" alt="icon" class="img-fluid"> Feeling/Activity</div>
                                                            </li>
                                                            <li class="col-md-6 mb-3">
                                                                <div class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="{{ url('assets/dashboard/images/small/10.png') }}" alt="icon" class="img-fluid"> Check in</div>
                                                            </li>
                                                            <li class="col-md-6 mb-3">
                                                                <div class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="{{ url('assets/dashboard/images/small/11.png') }}" alt="icon" class="img-fluid"> Live Video</div>
                                                            </li>
                                                            <li class="col-md-6 mb-3">
                                                                <div class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="{{ url('assets/dashboard/images/small/12.png') }}" alt="icon" class="img-fluid"> Gif</div>
                                                            </li>
                                                            <li class="col-md-6 mb-3">
                                                                <div class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="{{ url('assets/dashboard/images/small/13.png') }}" alt="icon" class="img-fluid"> Watch Party</div>
                                                            </li>
                                                            <li class="col-md-6 mb-3">
                                                                <div class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="{{ url('assets/dashboard/images/small/14.png') }}" alt="icon" class="img-fluid"> Play with Friends</div>
                                                            </li>
                                                        </ul>
                                                        <hr>
                                                        <div class="other-option">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="user-img mr-3">
                                                                        @if(isset(Auth::user()->profile_image) && file_exists('images/profile/'. $friend->userInfo->profile_image))
                                                                        <img src="{{ url('images/profile/',$friend->userInfo->profile_image) }}" alt="userimg" class="avatar-60 rounded-circle img-fluid">
                                                                        @else
                                                                        <img src="{{ url('assets/dashboard/img/default-avatar.png') }}" alt="profile-img" class="avatar-60 rounded-circle img-fluid" />
                                                                        @endif
                                                                    </div>
                                                                    <h6>Your Story</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary d-block w-100 mt-3">Post</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                   
                                        <div >
                                        <div id="newsfeedposts">
                                            @if($profilePosts->count() > 0)

                                            @php
                                            				$i = 1;
                                            				$j = 1;
                                            @endphp

                                            @foreach($profilePosts as $profilePost)
                                            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                                                <div class="user-post-data  iq-card-body">
                                                    <div class="d-flex flex-wrap">
                                                        <div class="media-support-user-img mr-3">
                                                            @if(isset($user->userInfo->profile_image) && file_exists('images/profile/' . $user->userInfo->profile_image))
                                                            <img class="rounded-circle img-fluid" src="{{ url('images/profile/' . $user->userInfo->profile_image) }}" alt="profile-img">
                                                            @else
                                                            <img class="rounded-circle img-fluid" src="{{ url('assets/dashboard/img/default-avatar.png') }}" alt="profile-img">
                                                            @endif
                                                        </div>
                                                        <div class="media-support-info mt-2">
                                                            <h5 class="mb-0 d-inline-block"><a href="#" class="">{{ ucwords($user->name) }}</a></h5>
                                                            <p class="ml-1 mb-0 d-inline-block">Add New Post</p>
                                                            <p class="mb-0">{{ newsfeeddateformate($profilePost->created_at) }} </p>
                                                        </div>
                                                        <div class="iq-card-post-toolbar">
                                                            <div class="dropdown">
                                                                <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                                    <i class="ri-more-fill"></i>
                                                                </span>
                                                                <div class="dropdown-menu m-0 p-0">
                                                                    <a class="dropdown-item p-3" href="#">
                                                                        <div class="d-flex align-items-top">
                                                                            <div class="icon font-size-20"><i class="ri-save-line"></i></div>
                                                                            <div class="data ml-2">
                                                                                <h6>Save Post</h6>
                                                                                <p class="mb-0">Add this to your saved items</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <a class="dropdown-item p-3" href="#">
                                                                        <div class="d-flex align-items-top">
                                                                            <div class="icon font-size-20"><i class="ri-pencil-line"></i></div>
                                                                            <div class="data ml-2">
                                                                                <h6>Edit Post</h6>
                                                                                <p class="mb-0">Update your post and saved items</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <a class="dropdown-item p-3" href="#">
                                                                        <div class="d-flex align-items-top">
                                                                            <div class="icon font-size-20"><i class="ri-close-circle-line"></i></div>
                                                                            <div class="data ml-2">
                                                                                <h6>Hide From Timeline</h6>
                                                                                <p class="mb-0">See fewer posts like this.</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <a class="dropdown-item p-3" href="#">
                                                                        <div class="d-flex align-items-top">
                                                                            <div class="icon font-size-20"><i class="ri-delete-bin-7-line"></i></div>
                                                                            <div class="data ml-2">
                                                                                <h6>Delete</h6>
                                                                                <p class="mb-0">Remove thids Post on Timeline</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <a class="dropdown-item p-3" href="#">
                                                                        <div class="d-flex align-items-top">
                                                                            <div class="icon font-size-20"><i class="ri-notification-line"></i></div>
                                                                            <div class="data ml-2">
                                                                                <h6>Notifications</h6>
                                                                                <p class="mb-0">Turn on notifications for this post</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(isset($profilePost->text) && !empty($profilePost->text))
                                                <div class="user-post iq-card-body">
                                                    <p>{{ $profilePost->text }}</p>
                                                </div>
                                                @endif
                                                @if(isset($profilePost->NewsfeedGallaries))
                                                <div class="user-post">
                                                    @foreach($profilePost->NewsfeedGallaries as $imageValue)
                                                    <a href="javascript:void();"><img src="{{ url('images/newsfeed/'.$imageValue->image) }}" alt="post-image" class="img-fluid w-100" style="height: 360px;" /></a>
                                                    @endforeach
                                                </div>
                                                @endif

                                                <div class="comment-area iq-card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="like-block position-relative d-flex align-items-center">
                                                            <div class="d-flex align-items-center">

<!--************ -->

<div class="like-data">
												<div class="dropdown">
													<span class="dropdown-toggle">
														<a href="javascript:void(0);" class="likePost" newsfeed_id="{{ $profilePost->id }}" route="{{ route('newsfeed-like')}}" user_id="{{ $profilePost->user_id }}" likes_id="{{ Auth::user()->id }}">
															@if($profilePost->NewsfeedLike->count() > 0)
															@php $hasMe = null; @endphp
															@foreach($profilePost->NewsfeedLike as $newlike)
															@if($newlike->NewsfeedUser->id !== Auth::user()->id)
															@php $hasMe = null; @endphp
															@continue;
															@else
															@php $hasMe = true; @endphp
															@if($newlike->face_icon)
															<input type="hidden" value="{{ $newlike->face_icon }}" class="facemocion" />
															@else
															<input type="hidden" value="gusta" class="facemocion" />
															@endif
															@endif
															@endforeach
															@if(!$hasMe)
															<input type="hidden" value="gusta" class="facemocion" />
															@endif
															@else
															<input type="hidden" value="gusta" class="facemocion" />
															@endif
														</a>

													</span>
												</div>
											</div>

                      <div class="total-like-block ml-2 mr-3">
                        <div class="dropdown">
                          <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                            <span class="total_count_{{ $profilePost->id }}">{{ $profilePost->NewsfeedLike->count() }}</span> Likes
                          </span>
                          <input type="hidden" id="newsfeed_id_{{ $i }}" value="{{ $profilePost->id }}" disabled="">
                          <input type="hidden" id="user_id_{{ $i }}" value="{{ $profilePost->user_id }}" disabled="">
                          <input type="hidden" id="likes_id_{{ $i }}" value="{{ Auth::user()->id }}" disabled="">
                          <div class="dropdown-menu" @if($profilePost->NewsfeedLike->count() == 0) style="background: #fff; border: 0 none;" @endif>
                            @if($profilePost->NewsfeedLike->count() > 0)
                            @php $like = 0; @endphp
                            @foreach($profilePost->NewsfeedLike as $newlike)
                            @if($like < 7) <a class="dropdown-item" href="#">{{ $newlike->NewsfeedUser->name }}</a>
                              @endif
                              @php $like = $like + 1; @endphp
                              @endforeach
                              @endif
                          </div>
                        </div>
                      </div>
<!--******************* -->





                                                            </div>
                                                            <div class="total-comment-block">
                                                                <div class="dropdown">
                                                                    <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                                        {{ $profilePost->NewsfeedComment->count() }} Comment
                                                                    </span>
                                                                    <div class="dropdown-menu" @if($profilePost->NewsfeedComment->count() == 0) style="background: #fff; border: 0 none;" @endif>
                                                                        @foreach($profilePost->NewsfeedComment as $key => $comment)
                                                                        <a class="dropdown-item" href="#">{{ ucwords($comment->NewsfeedUser->name) }}</a>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--
                                                        <div class="share-block d-flex align-items-center feather-icon mr-3">
                                                            <a href="javascript:void();"><i class="ri-share-line"></i>
                                                                <span class="ml-1">99 Share</span></a>
                                                        </div>-->

                                                        <div class="share-block d-flex align-items-center feather-icon mr-3 comment_btn" id="{{ $profilePost->id}}">
                                                          <a href="javascript:void();" style="font-size: 18px;"><i class="ri-chat-2-line"></i>
                                                            <span class="ml-1">Comment</span></a>
                                                        </div>

                                                    </div>
                                                    <hr>

<!------------------------------------------------------------------------------------------->
<ul class="post-comments p-0 m-0 hide-newsfeed_{{ $profilePost->id }}">
  @foreach($profilePost->NewsfeedComment as $key => $comment)
  @if ($key == 1)
  @break
  @endif
  <li class="mb-2 reply_comment_add_{{ $comment->id }}" id="comment-el-{{ $comment->id }}" >
    <div class="d-flex flex-wrap justify-content-start">
      <div class="user-img">
        @if(isset($comment->profileImage->profile_image)  )
        <img src="{{ url('images/profile',$comment->profileImage->profile_image) }}" alt="userimg" class="avatar-35 rounded-circle img-fluid">
        @else
        <img src="{{url('assets/dashboard/img/default-avatar.png')}}" alt="userimg" class="avatar-35 rounded-circle img-fluid">
        @endif
      </div>
      <div class="comment-data-block ml-3">
        <h6>{{ ucwords($comment->NewsfeedUser->name) }}</h6>
        @if (isset($comment->CommentImage->image))
	    <img src="{{ url('images/comments', $comment->CommentImage->image) }}" alt="image Comment" style="max-width: 300px; max-height: 300px;">
		@endif
        <p class="mb-0 comment-text-{{ $comment->id }}">{{ ucwords($comment->comment) }}</p>
        <div class="d-flex flex-wrap align-items-center comment-activity">
            <!------------------------------------------------->
            <div class="dropdown">
													<span>&nbsp;
														<a href="javascript:void();" class="likeCommentPost" comment_id="{{ $comment->id }}" newsfeed_id="{{ $profilePost->id }}" route="{{ route('newsfeed-comment-like')}}" users_id="{{ Auth::user()->id }}">
															@if($comment->NewsfeedcommentLike->count() > 0)
															@php $hasMe = null; @endphp
															@foreach($comment->NewsfeedcommentLike as $newlike)
															@if($newlike->user_id !== Auth::user()->id)
															@php $hasMe = null; @endphp
															@continue;
															@else
															@php $hasMe = true; @endphp
															@if($newlike->face_icon)
															<input type="hidden" value="{{ $newlike->face_icon }}" class="facemocion" />
															@else
															<input type="hidden" value="gusta" class="facemocion" />
															@endif
															@endif
															@endforeach
															@if(!$hasMe)
															<input type="hidden" value="gusta" class="facemocion" />
															@endif
															@else
															<input type="hidden" value="gusta" class="facemocion" />
															@endif
														</a>

													</span>
												</div>
		<!------------------------------------------------->										

        <a href="javascript:void();" class="likeCommentPost" comment_id="{{ $comment->id }}" newsfeed_id="{{ $profilePost->id  }}" route="{{ route('newsfeed-comment-like')}}" users_id="{{ Auth::user()->id }}"><span id="" class="total_comment_like_count_{{ $comment->id }}">{{ $comment->NewsfeedcommentLike ? $comment->NewsfeedcommentLike->count() : "0"  }}</span> like</a>
													<a href="javascript:void();" class="reply comment_reply_btn" id="{{ $comment->id}}">reply</a>
													<a href="javascript:void();">translate</a>
													<span> {{ newsfeeddateformate($comment->created_at) }}</span>
												</div>
												<!-- Reply Comment Form  -->

												<form class="comment-text align-items-center mt-3 comment-reply-form comment_reply_add_{{$comment->id}}" route="{{ route('comment_reply_add')}}" user_id="{{ Auth::user()->id }}" newsfeed_id="{{ $profilePost->id }}" comment_id="{{$comment->id}}" id="">
													<textarea class="form-control rounded comment-reply-text-{{ $comment->id }}" id="" name="comment" placeholder="" required></textarea>

													<button class="badge badge-primary mt-2" id="submit" type="submit">Post</button>
													<button class="badge badge-secondary mt-2 ml-2 comment_reply_btn" id="{{$comment->id}}">Cancel</button>

												</form>
												<!-- ... end Reply Comment Form  -->
      </div>
      @if ($comment->user_id === Auth::user()->id)
      <div class="iq-card-post-toolbar d-inline-block">
        <div class="dropdown">
          <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
            <i class="ri-more-fill"></i> 
          </span>
          <div class="dropdown-menu m-0 p-0">
            <a class="dropdown-item p-3 edit-comment" href="javascript:void();" route="{{ route('edit-comment')}}" comment_id="{{ $comment->id }}" data-toggle="modal" data-target="#commentModal">
              <div class="d-flex align-items-top">
                <div class="icon font-size-20"><i class="ri-edit-2-line"></i></div>
                <div class="data ml-2">
                  <h6>Edit comment</h6>
                </div>
              </div>
            </a>
            <a class="dropdown-item p-3 delete-comment" href="javascript:void();" route="{{ route('delete-comment', $comment->id)}}" comment_id="{{ $comment->id }}" newsfeed_id="{{ $comment->newsfeed_id }}">
              <div class="d-flex align-items-top">
                <div class="icon font-size-20"><i class="ri-delete-back-2-line"></i></div>
                <div class="data ml-2">
                  <h6>Delete comment</h6>
                </div>
              </div>
            </a>
            <!-- <li>
              <a href="javascript:void(0)" route="{{ route('edit-comment', $comment->id) }}" class="edit-comment" data-toggle="modal" data-target="#commentModal" comment_id="{{ $comment->id }}">Edit Comments</a>
            </li>
            <li>
              <a href="javascript:void(0)" route="{{ route('delete-comment', $comment->id) }}" class="delete-comment" comment_id="{{ $comment->id }}" >Delete Comment</a>
            </li> -->
          </div>
        </div>
      </div>
      @endif
    </div>
  </li>
  @endforeach
</ul>


 
<form class="comment-text align-items-center mt-3 comment-form comment_add_{{$profilePost->id}}" route="{{ route('comment_add')}}" user_id="{{ Auth::user()->id }}" newsfeed_id="{{ $profilePost->id }}" id="">
								 

									<input type="text" class="form-control rounded comment-text-{{ $profilePost->id }}" onkeydown="doComment(event, {{ $profilePost->id }})" />
									<input class="d-none" id="comment_file_{{ $profilePost->id }}" type="file" name="image" />
                                                        <div class="comment-attagement d-flex">
                                                            <!-- <a href="javascript:void();"><i class="ri-link mr-3"></i></a>
                                                            <a href="javascript:void();"><i class="ri-user-smile-line mr-3"></i></a> -->
                                                            <a href="javascript:void();" onClick="commentPicture({{ $profilePost->id }})"><i class="ri-camera-line mr-3"></i></a>
                                                        </div>

								</form>


<?php
if ($profilePost->NewsfeedComment->count() >= 2) {
  $view_more = 'View ' . $profilePost->NewsfeedComment->count() - 1 . ' more comments +';
} else {
  $view_more = '';
} ?>
<a href="javascript:void(0)" newsfeed_id="{{$profilePost->id}}" route="{{ route('view-more-comments') }}" class="more-comments view-more-comment-btn-{{$profilePost->id}}">{{$view_more}}</a>



<!---------------------------------------------------------------------------------------------->

                                                  <!--  <ul class="post-comments p-0 m-0">
                                                        @foreach($profilePost->NewsfeedComment as $key => $comment)
                                                        @if ($key == 1)
                                                        @break
                                                        @endif
                                                        <li class="mb-2">
                                                            <div class="d-flex flex-wrap">
                                                                <div class="user-img">
                                                                    <img src="{{ url('assets/dashboard/images/user/02.jpg') }}" alt="userimg" class="avatar-35 rounded-circle img-fluid">
                                                                </div>
                                                                <div class="comment-data-block ml-3">
                                                                    <h6>{{ ucwords($comment->NewsfeedUser->name) }}</h6>
                                                                    <p class="mb-0">{{ ucwords($comment->comment) }}</p>
                                                                    <div class="d-flex flex-wrap align-items-center comment-activity">
                                                                        <a href="javascript:void();">like</a>
                                                                        <a href="javascript:void();">reply</a>
                                                                        <span>
                                                                            <?php
                                                                            $created = new Carbon($comment->created_at);
                                                                            $diffInDays = Carbon::parse($comment->created_at)->diffInDays();
                                                                            $showDiff = Carbon::parse($comment->created_at)->diffForHumans();

                                                                            if ($diffInDays > 0) {
                                                                                $showDiff .= ', ' . Carbon::parse($comment->created_at)->addDays($diffInDays)->diffInHours() . ' Hours';
                                                                            }
                                                                            ?>
                                                                            {{$showDiff}}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                    <form class="comment-text d-flex align-items-center mt-3" action="javascript:void(0);">
                                                        <input type="text" class="form-control rounded">
                                                        <div class="comment-attagement d-flex">
                                                            <a href="javascript:void();"><i class="ri-link mr-3"></i></a>
                                                            <a href="javascript:void();"><i class="ri-user-smile-line mr-3"></i></a>
                                                            <a href="javascript:void();"><i class="ri-camera-line mr-3"></i></a>
                                                        </div>
                                                    </form>-->
                                                </div>
                                            </div>
                                            @php
                                    				$i++;
                                    				$j++;
                                    				@endphp
                                            @endforeach
                                            @endif
                                            </div> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="about" role="tabpanel">
                        <div class="iq-card">
                            <div class="iq-card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="nav nav-pills basic-info-items list-inline d-block p-0 m-0">
                                            <li>
                                                <a class="nav-link active" data-toggle="pill" href="#basicinfo">Contact and Basic Info</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-9 pl-4">
                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="basicinfo" role="tabpanel">
                                                <h4>Contact Information</h4>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <h6>Email</h6>
                                                    </div>
                                                    <div class="col-9">
                                                        <p class="mb-0">{{ $user->email }}</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <h6>Mobile</h6>
                                                    </div>
                                                    <div class="col-9">
                                                        @if(@$user->userInfo->status == 1)
                                                        <p class="mb-0">{{ @$user->userInfo->phone_number }}</p>
                                                        @else
                                                        <p class="mb-0">This user has private profile.</p>
                                                        @endif
                                                    </div>
                                                    <div class="col-3">
                                                        <h6>Address</h6>
                                                    </div>
                                                    <div class="col-9">
                                                        @if(@$user->userInfo->status == 1)
                                                        <p class="mb-0">{{ @$user->userInfo->city }}, {{ @$user->userInfo->state }}, {{ @$user->userInfo->country }}</p>
                                                        @else
                                                        <p class="mb-0">This user has private profile.</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <h4 class="mt-3">Websites and Social Links</h4>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <h6>Social Link</h6>
                                                    </div>
                                                    <div class="col-9">
                                                        <p class="mb-0">{{ @$user->facebook_url }}</p>
                                                    </div>
                                                </div>
                                                <h4 class="mt-3">Basic Information</h4>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <h6>Birth Date</h6>
                                                    </div>
                                                    <div class="col-9">
                                                        @if(@$user->userInfo->status == 1)
                                                        <p class="mb-0">{{ @$user->userInfo->dob }}</p>
                                                        @else
                                                        <p class="mb-0">This user has private profile.</p>
                                                        @endif
                                                    </div>
                                                    <div class="col-3">
                                                        <h6>Gender</h6>
                                                    </div>
                                                    <div class="col-9">
                                                        @if(@$user->userInfo->status == 1)
                                                        <p class="mb-0">
                                                            @if(isset($user->userInfo->gender) && $user->userInfo->gender == 1)
                                                            {{ 'Male' }}
                                                            @elseif(isset($user->userInfo->gender) && $user->userInfo->gender == 0)
                                                            {{ 'Female' }}
                                                            @endif
                                                        </p>
                                                        @else
                                                        <p class="mb-0">This user has private profile.</p>
                                                        @endif
                                                    </div>
                                                    <div class="col-3">
                                                        <h6>marriage status</h6>
                                                    </div>
                                                    <div class="col-9">
                                                        @if(@$user->userInfo->status == 1)
                                                        <p class="mb-0">
                                                            @if(isset($user->userInfo->marriage_status) && $user->userInfo->marriage_status == 1)
                                                            {{ 'Married' }}
                                                            @elseif(isset($user->userInfo->marriage_status) && $user->userInfo->marriage_status == 0)
                                                            {{ 'Singel' }}
                                                            @endif
                                                        </p>
                                                        @else
                                                        <p class="mb-0">This user has private profile.</p>
                                                        @endif
                                                    </div>
                                                    <div class="col-3">
                                                        <h6>language</h6>
                                                    </div>
                                                    <div class="col-9">
                                                        <p class="mb-0">English</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="friends" role="tabpanel">
                        <div class="iq-card">
                            <div class="iq-card-body">
                                <h2>Friends</h2>
                                <div class="friend-list-tab mt-2">
                                    <ul class="nav nav-pills d-flex align-items-center justify-content-left friend-list-items p-0 mb-2">
                                        <li>
                                            <a class="nav-link active" data-toggle="pill" href="#all-friends">All Friends</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="all-friends" role="tabpanel">
                                            <div class="iq-card-body p-0">
                                                <div class="row">
                                                    @foreach($user->Userfriends as $friend)
                                                    <div class="col-md-6 col-lg-6 mb-3">
                                                        <div class="iq-friendlist-block">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <a href="#">
                                                                        @if(isset($friend->friendUser->userInfo->profile_image) && file_exists('images/profile/'. $friend->friendUser->userInfo->profile_image))
                                                                        <img src="{{ url('images/profile/',$friend->friendUser->userInfo->profile_image) }}" alt="profile-img" class="img-fluid" />
                                                                        @else
                                                                        <img src="{{ url('assets/dashboard/images/user/04.jpg') }}" alt="profile-img" class="img-fluid" />
                                                                        @endif
                                                                    </a>
                                                                    <div class="friend-info ml-3">
                                                                        <h5>{{ ucwords($friend->friendUser->name) }}</h5>
                                                                        <p class="mb-0">{{ $friend->friendUser->Userfriends->count() }} friends</p>
                                                                    </div>
                                                                </div>
                                                                <div class="iq-card-header-toolbar d-flex align-items-center">
                                                                    <div class="dropdown">
                                                                        <span class="dropdown-toggle btn btn-secondary mr-2" id="dropdownMenuButton01" data-toggle="dropdown" aria-expanded="true" role="button">
                                                                            <i class="ri-check-line mr-1 text-white font-size-16"></i> Friend
                                                                        </span>
                                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton01">
                                                                            <!--   <a class="dropdown-item" href="#">Get Notification</a>
                                                          <a class="dropdown-item" href="#">Close Friend</a>
                                                          <a class="dropdown-item" href="#">Unfollow</a>
                                                          <a class="dropdown-item" href="#">Unfriend</a> -->
                                                                            <a class="dropdown-item" href="{{ route('block-friend',$friend->id)}}">Block</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="photos" role="tabpanel">
                        <div class="iq-card">
                            <div class="iq-card-body">
                                <h2>Photos</h2>
                                @php
                                if ($user->id !== Auth::id())  {
                                    $photosof  = "Photos of ".ucwords($user->name);
                                    $userPhotos = ucwords($user->name). " Photos";
                                }
                                else {
                                    $photosof  = "Photos of you";
                                    $userPhotos = "Your Photos";
                                }
                                @endphp
                                <div class="friend-list-tab mt-2">
                                    <ul class="nav nav-pills d-flex align-items-center justify-content-left friend-list-items p-0 mb-2">
                                        <li>
                                            <a class="nav-link active" data-toggle="pill" href="#photosofyou">{{$photosof}}</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-toggle="pill" href="#your-photos">{{$userPhotos}}</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="photosofyou" role="tabpanel">
                                            <div class="iq-card-body p-0">
                                                <div class="row">
                                                    @php $i = 1; @endphp
                                                    @foreach($user->UserNewsFeedPost as $newsfeed )
                                                    @if($i <= 9) @foreach($newsfeed->NewsfeedGallaries as $imageValue)
                                                        <div class="col-md-6 col-lg-3 mb-3">
                                                            <div class="user-images position-relative overflow-hidden">
                                                                <a href="#">
                                                                    <img src="{{ url('images/newsfeed/'.$imageValue->image) }}" class="img-fluid rounded" alt="Responsive image">
                                                                </a>
                                                                <div class="image-hover-data">
                                                                    <div class="product-elements-icon">
                                                                        <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                            <li><a href="#" class="pr-3 text-white"> {{ @$newsfeed->NewsfeedLike->count() }} <i class="ri-thumb-up-line"></i> </a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <a href="#" class="image-edit-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit or Remove"><i class="ri-edit-2-fill"></i></a>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        @endif
                                                        @php $i = $i + 1; @endphp
                                                        @endforeach
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
            <div class="col-sm-12 text-center">
                <img id="page_load_loader" src="{{ url('assets/dashboard/images/page-img/page-load-loader.gif') }}" alt="loader" style="display: none; height: 100px;">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="createEventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('create-event') }}" method="POST" id="create-event" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="event_name">Name:</label>
                                <input type="text" class="form-control" id="event_name" name="event_name" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="event_group">Group:</label>
                                <select class="select2 form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" id="event_group" name="event_group" required>
                                    @foreach($groups as $group)
                                    <option value="{{$group->id}}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="event_name">Image:</label>
                                <div class="custom-file" style="z-index: 0;">
                                    <input type="file" class="custom-file-input" id="event_image" name="event_image" required>
                                    <label class="group-image-label custom-file-label form-control" for="event_image" style="line-height: 30px !important;"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="event_hoster">Hoster:</label>
                                <select class="select2 form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" id="event_hoster" name="event_hoster" required>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Description:</label>
                        <textarea class="form-control" id="event_description" name="event_description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="event_name">Date:</label>
                        <div class="d-flex justify-content-between">
                            <input type="datetime-local" class="form-control" name="start_date" style="width: 48%" required>
                            <input type="datetime-local" class="form-control" name="end_date" style="width: 48%">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="event_location">Location:</label>
                        <input type="text" class="form-control" id="event_location" name="event_location">
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="createPhotoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('create-photo') }}" method="POST" id="create-photo" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="photo_group">Group:</label>
                        <select class="select2 form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" id="photo_group" name="photo_group" required>
                            @foreach($groups as $group)
                            <option value="{{$group->id}}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="photo_image">Image:</label>
                        <div class="custom-file" style="z-index: 0;">
                            <input type="file" class="custom-file-input" id="photo_image" name="photo_image" required>
                            <label class="photo-image-label custom-file-label form-control" for="photo_image" style="line-height: 30px !important;"></label>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <label for="photo_image">Visible:</label><br />
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="photo_visible" id="photo_visible1" value="0" checked>
                            <label class="form-check-label" for="photo_visible1">Public</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="photo_visible" id="photo_visible2" value="1">
                            <label class="form-check-label" for="photo_visible2">Group</label>
                        </div>
                    </div>
                    <div class="text-right mt-3">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="createFriendModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Friend Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="photo_group">Select a user:</label>
                    <select class="select2 form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" id="friend_list" name="friend_list">
                    </select>
                </div>
                <div class="text-right mt-3">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="createFriendRequest">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="storeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Store</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store-save') }}" method="POST" id="save-store" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{isset($user->store) ? $user->store->id : ''}}" name="store_id">
                    <div class="form-group">
                        <label for="store_name">Name:</label>
                        <input type="text" class="form-control" id="store_name" name="store_name" value="{{ isset($user->store) ? $user->store->sname : ''}}" required>
                    </div>
                    <div class="form-group">
                        <label for="store_image">Image:</label>
                        <div class="custom-file" style="z-index: 0;">
                            <input type="file" class="custom-file-input" id="store_image" name="store_image" @if(!isset($user->store)) required @endif>
                            <label class="store-image-label custom-file-label form-control" for="store_image" style="line-height: 30px !important;">@if (isset($user->store)) {{$user->store->image}} @endif</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="store_description">Description:</label>
                        <textarea class="form-control" id="store_description" name="store_description" value="{{ isset($user->store) ? $user->store->description : ''}}">@if (isset($user->store)) {{$user->store->description}} @endif
                        </textarea>
                    </div>
                    <div class="text-right mt-3">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Membership Alert</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h5>
                        You need to have Gold or Platinum membership.
                    </h5>
                    <h6 class="mt-3">
                        Will you upgrade your membership now?
                    </h6>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="goMembershipPage()">Ok</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="cropImageModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update profile picture</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="resizer"></div>
                <button class="btn rotate float-lef" data-deg="90" >
                <i class="fas fa-undo"></i></button>
                <button class="btn rotate float-right" data-deg="-90" >
                <i class="fas fa-redo"></i></button>
                <hr>
                <button class="btn btn-block btn-dark" id="upload" route="{{ route('profile-image-upload-save')}}">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="commentModalLabel">Edit Comment</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="comment_form">
					<div class="form-group">
						<label for="comment_desc" class="col-form-label">Comment:</label>
						<textarea type="text" class="form-control" id="comment_desc"></textarea>
						<input type="hidden" class="form-control" id="edit-comment-id">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary comment_update_btn">Submit</button>
			</div>
		</div>
	</div>
</div>
@endsection
@section('page-js-link')
@endsection

@section('page-js')
<script type="text/javascript">


function enableDisablePost() {
	var preview_embed = jQuery('#preview_embed').html();
	var inputText = jQuery('#mainpost').val();
    if (preview_embed.trim() != '' || inputText.trim() != '') {
        jQuery('#post_submit').prop("disabled", false); 
	}
    else {
		jQuery('#post_submit').prop("disabled", true); 
	}
}

function blockFriend($this)
{
    toastr.options = {
        "closeButton": true,
        "newestOnTop": true,
        "positionClass": "toast-top-right"
    };
    route = $($this).attr('route');
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
}

function unblockFriend($this) {
    toastr.options = {
        "closeButton": true,
        "newestOnTop": true,
        "positionClass": "toast-top-right"
    };
    route = $($this).attr('route');
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
}

function createFriendRequest() {
    toastr.options = {
        "closeButton": true,
        "newestOnTop": true,
        "positionClass": "toast-top-right"
    };
    let user_id = $("#friend_list").val();
    let route = `/add-friend/${user_id}`;
    $.ajax({
        url: route,
        method: "GET",
        success: function(data) {
            if (data.status === "success") {
                toastr.success(data.text);
            }
        },
        error: function(response) {
            toastr.error(response.responseJSON.message);
        }
    })
}

function acceptFriendRequest($this) {
    toastr.options = {
        "closeButton": true,
        "newestOnTop": true,
        "positionClass": "toast-top-right"
    };
    route = $($this).attr('route');
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
}

function likePost($this) {
            newsfeed_id = $($this).attr('newsfeed_id');
			user_id = $($this).attr('user_id');
			likes_id = $($this).attr('likes_id');
			route = $($this).attr('route');
			face_icon = $($this).find('input').val();

			$.ajax({
				url: route,
				method: "GET",
				data: {
					"_token": "{{ csrf_token() }}",
					"newsfeed_id": newsfeed_id,
					"user_id": user_id,
					"likes_id": likes_id,
					"face_icon": face_icon,
				},
				beforeSend: function() {},
				success: function(data) {
					console.log('data', data);
					if (null !== (data['newsfeedLike'])) {
						$('.likePost').find('input').val(data['newsfeedLike']['face_icon']);
				    }
					if (data['is_like'] === true) {
						html = `<i class="ri-thumb-down-line mr-2"></i>Unlike Page`;
						$('.like1Color_' + newsfeed_id).html(html);
						$('.like1Color_' + newsfeed_id).css("color", "#ff5e3a");
						//$('.like2Color_' + newsfeed_id).css("background-color", "#ff5e3a");
					} else {
						html = `<i class="ri-thumb-up-line mr-2"></i>Like Page`;
						$('.like1Color_' + newsfeed_id).html(html);
						$('.like1Color_' + newsfeed_id).css("color", "#212529");
						//$('.like2Color_' + newsfeed_id).css("background-color", "#9a9fbf");
					}
					$('.total_count_' + newsfeed_id).html(data['count']);
				}
			})
        }

        function moreComments($this)
	{
		newsfeed_id = $($this).attr('newsfeed_id');
		route = $($this).attr('route');
		$.ajax({
			url: route,
			method: "GET",
			data: {
				"_token": "{{ csrf_token() }}",
				"newsfeed_id": newsfeed_id,
			},
			beforeSend: function() {
				$('.view-more-comment-btn-' + newsfeed_id).html('Loading...');
			},
			success: function(data) {
				if (data.length > 0) {
					_html = data;
					$('.view-more-comment-btn-' + newsfeed_id).hide();
					$(".comments_list_" + newsfeed_id).hide();
					$(".hide-newsfeed_" + newsfeed_id).html(data);
					// $('.comment-form').hide();
					// $('.comment-reply-form').hide();
					// $('.comment-reply-child-form').hide();
					
					$('.comment-reply-form').hide();
					$(".comment_reply_btn").unbind('click');

					$(".comment_reply_btn").click(function() {
						var id = $(this).attr('id');
						$(".cr_" + id).toggle();
					});

				    $(".comment_reply_btn").click(function() {
						var id = $(this).attr('id');
						$(".comment_reply_add_" + id).toggle();
					});



					$(".comment_reply_child_btn").click(function() {
						var id = $(this).attr('id');
						$(".crc_" + id).toggle();
					});
					 
					$('.comment-reply-form').on('submit', function(e) {
						console.log(4444444444444444444);
						e.preventDefault();
						CommentReplyForm(this);
					});
					$('.comment-reply-child-form').on('submit', function(e) {
						e.preventDefault();
						CommentReplyChildForm(this);
				    });
					 $('.facemocion').faceMocion({
		emociones: [{
				"emocion": "amo",
				"TextoEmocion": "I love"
			},
			{
				"emocion": "divierte",
				"TextoEmocion": "I enjoy"
			},
			{
				"emocion": "gusta",
				"TextoEmocion": "I like"
			},
			{
				"emocion": "asombro",
				"TextoEmocion": "It amazes me"
			},
			{
				"emocion": "alegre",
				"TextoEmocion": "I am glad"
			}
		]
	});

 


				} else {
					$('.view-more-comment-btn-' + newsfeed_id).html('No Comment Found.');
				}
			}
		})
	}

function unFriend($this) {
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        route = $($this).attr('route');
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
}

function sharePost() {
    let newsfeed_id = $('.share-post-btn').attr('newsfeed-id');
    let username = $('.share-post-btn').attr('username');
    let subject = `${encodeURIComponent('See this post by @' + username)}`;
    let body = subject + `${encodeURIComponent('{{url()->current()}}')}`;
    let mailtoURL = 'mailto:?subject=' + subject + '&body=' + body;
    $('.share-post-btn').attr('href', mailtoURL);
}

    $(document).ready(function() {
        var croppie = null;
        var el = document.getElementById('resizer');

        $.base64ImageToBlob = function(str) {
            // extract content type and base64 payload from original string
            var pos = str.indexOf(';base64,');
            var type = str.substring(5, pos);
            var b64 = str.substr(pos + 8);

            // decode base64
            var imageContent = atob(b64);

            // create an ArrayBuffer and a view (as unsigned 8-bit)
            var buffer = new ArrayBuffer(imageContent.length);
            var view = new Uint8Array(buffer);

            // fill the view, using the decoded base64
            for (var n = 0; n < imageContent.length; n++) {
                view[n] = imageContent.charCodeAt(n);
            }

            // convert ArrayBuffer to Blob
            var blob = new Blob([buffer], { type: type });

            return blob;
        }

        $.getImage = function(input, croppie) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    croppie.bind({
                        url: e.target.result,
                    });
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".image_upload1").click(function() {
			$("input[id='my_file1']").click();
		});

        $("#file-upload").on("change", function(event) {
            $("#cropImageModal").modal();
            // Initailize croppie instance and assign it to global variable
            croppie = new Croppie(el, {
                    viewport: {
                        width: 200,
                        height: 200,
                        type: 'circle'
                    },
                    boundary: {
                        width: 250,
                        height: 250
                    },
                    enableOrientation: true
                });
            $.getImage(event.target, croppie);
        });

        $("#upload").on("click", function() {
            croppie.result('base64').then(function(base64) {
                $("#cropImageModal").modal("hide");
                $(".profile-img img").attr("src","assets/dashboard/images/page-img/page-load-loader.gif");

                var route = $("#upload").attr('route');
                var formData = new FormData();
                formData.append("profile_image", $.base64ImageToBlob(base64));
                let _token = $('meta[name="csrf-token"]').attr('content');
                _token = document.getElementsByName("_token")[0].value
                formData.append('_token', _token);
                $.ajax({
                    type: 'POST',
                    url: route,
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data == "uploaded") {
                            $(".profile-img img").attr("src", base64);
                        } else {
                            $(".profile-img img").attr("src","assets/dashboard/img/default-avatar.png");
                            console.log(data['profile_image']);
                        }
                    },
                    error: function(error) {
                        console.log(error);
                        $(".profile-img img").attr("src","assets/dashboard/img/default-avatar.png");
                    }
                });
            });
        });

        // To Rotate Image Left or Right
        $(".rotate").on("click", function() {
            croppie.rotate(parseInt($(this).data('deg')));
        });

        $('#cropImageModal').on('hidden.bs.modal', function (e) {
            // This function will call immediately after model close
            // To ensure that old croppie instance is destroyed on every model close
            setTimeout(function() { croppie.destroy(); }, 100);
        })

    });

    

    $(document).on('click', '.block-friend', function() {
        blockFriend(this);
    });

    $(document).on('click', '.unblock-friend', function() {
        unblockFriend(this);
    });

    $("#createFriendRequest").on('click', function() {
        createFriendRequest();
    });

    $(document).on('click', '.accept-friend-request', function() {
        acceptFriendRequest(this);
    });

    $(document).on('click', '.un-friend', function() {
        unFriend(this);
    });

    function postFollow($this)
    {
        newsfeed_id = $($this).attr('newsfeed_id');
        user_id = $($this).attr('user_id');
        following_id = $($this).attr('following_id');
        route = $($this).attr('route');

        $.ajax({
            url: route,
            method: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "newsfeed_id": newsfeed_id,
                "user_id": user_id,
                "following_id": following_id,
            },
            beforeSend: function() {},
            success: function(response) {
                if (response.data.is_follow === true) {
                    $('#post-follow-' + newsfeed_id).html('');
                    html = '<i class="ri-user-unfollow-line line-height-17"></i>Unfollow';
                    $('#post-follow-' + newsfeed_id).html(html);
                    $('#post-follow-' + newsfeed_id).css('color', 'black');
                    $('#post-follow-' + newsfeed_id).css('font-weight', 'bold');
                } else {
                    $('#post-follow-' + newsfeed_id).html('');
                    html = '<i class="ri-user-follow-line line-height-17"></i>Follow';
                    $('#post-follow-' + newsfeed_id).html(html);
                    $('#post-follow-' + newsfeed_id).css('color', '#50b5ff');
                    $('#post-follow-' + newsfeed_id).css('font-weight', 'normal');
                }
                //$('.total_count_' + newsfeed_id).html(data['count']);
            }
        })
    }

    function likeCommentPost($this) {
			newsfeed_id = $($this).attr('newsfeed_id');
			users_id = $($this).attr('users_id');
			comment_id = $($this).attr('comment_id');
			route = $($this).attr('route');
            face_icon = $($this).find('input').val();

			$.ajax({
				url: route,
				method: "GET",
				data: {
					"_token": "{{ csrf_token() }}",
					"newsfeed_id": newsfeed_id,
					"comment_id": comment_id,
					"users_id": users_id,
                    "face_icon": face_icon,
				},
				beforeSend: function() {},
				success: function(data) {
					if (data['is_like'] === true) {
						$('.commentlikeColor_' + comment_id).css("background-color", "#ff5e3a");
					} else {
						$('.commentlikeColor_' + comment_id).css("background-color", "#fafbfd");
					}
					$('.total_comment_like_count_' + comment_id).html(data['count']);
				}
			})
        }

    function likeReplyCommentPost($this) {
        newsfeed_id = $($this).attr('newsfeed_id');
        users_id = $($this).attr('users_id');
        comment_id = $($this).attr('comment_id');
        reply_comment_id = $($this).attr('reply_comment_id');
        route = $($this).attr('route');
        $.ajax({
            url: route,
            method: "GET",
            data: {
                "_token": "{{ csrf_token() }}",
                "newsfeed_id": newsfeed_id,
                "comment_id": comment_id,
                "users_id": users_id,
                "reply_comment_id": reply_comment_id
            },
            beforeSend: function() {},
            success: function(data) {
                if (data['is_like'] === true) {
                    $('.replycommentlikeColor_' + reply_comment_id).css("background-color", "#ff5e3a");
                } else {
                    $('.replycommentlikeColor_' + reply_comment_id).css("background-color", "#fafbfd");
                }
                $('.total_reply_comment_like_count_' + reply_comment_id).html(data['count']);
            }
        })
    }

    function blocknewsfeed($this) {
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        newsfeed_id = $($this).attr('newsfeed_id');
        var route = "{{url('/block-newsfeed/')}}" + '/' + newsfeed_id;
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
                    $('.block-hide-show-' + newsfeed_id).hide();
                    var _html = '<a href="javascript:void(0)" class="unblock-newsfeed unblock-hide-show-' + newsfeed_id + '" newsfeed_id="' + newsfeed_id + '" id="liveToastBtn">Unblock Post</a>'
                    $(".block-unbolock-" + newsfeed_id).append(_html);
                }
            }
        })
    }

    function unblockNewsfeed($this) {
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };

        newsfeed_id = $($this).attr('newsfeed_id');
        var route = "{{url('/unblock-newsfeed/')}}" + '/' + newsfeed_id;

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
                    $('.unblock-hide-show-' + newsfeed_id).hide();
                    var _html = '<a href="javascript:void(0)" class="block-newsfeed block-hide-show-' + newsfeed_id + '" newsfeed_id="' + newsfeed_id + '" id="liveToastBtn">Block Post</a>'
                    $(".block-unbolock-" + newsfeed_id).append(_html);
                }
            }
        }) 
    }

    function addFriend($this) {
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };

        route = $($this).attr('route');
        user_id = $($this).attr('user_id');
        $.ajax({
            url: route,
            method: "GET",
            data: {
                "_token": "{{ csrf_token() }}",
                "user_id": user_id,
            },
            beforeSend: function() {},
            success: function(data) {
                toastr.success(data.text.message);
                if (data.status) {
                    $('.add-friend-' + user_id).remove();
                }
            }
        })
    }

    function deleteComment($this) {
        comment_id = $($this).attr('comment_id');
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        route = $($this).attr('route');
        if (confirm("Are you Sure to delete this comment ?") == true) {
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
                        $('#comment-el-' + comment_id).remove();
                        $('.reply_comment_add_' + comment_id).remove();
                    }
                }
            })
        }
    }

    function deleteNewsfeed($this) {
        newsfeed_id = $($this).attr('newsfeed_id');
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        route = $($this).attr('route');
        if (confirm("Are You Sure to delete this newsfeed post ?") == true) {
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
                        document.getElementById("del-newsfeed_" + newsfeed_id).remove();
                    }
                }
            })
        }
    }

    // Post Comment
	function doComment(event, newsfeed_id) {
       
		if (event.keyCode == 13) {
            event.preventDefault();
			let comment = $('.comment-text-' + newsfeed_id).val();
			 
			

			 

			var fd = new FormData();
		    var files = jQuery('#comment_file_' + newsfeed_id)[0].files;
			fd.append('comment_file',files[0]);
			fd.append('newsfeed_id', newsfeed_id);
			fd.append('comment', comment);
			 
			jQuery.ajax({
				url: '{{ route('comment_add')}}',
				type: 'post',
				headers: {'X-CSRF-TOKEN': '{{csrf_token()}}' },
				data: fd,
				contentType: false,
				processData: false,
				success: function(response){ 
                    //alert(response.upload_error);
					jQuery('.hide-newsfeed_' + newsfeed_id).prepend(response.comment);
					jQuery('.comment_add_' + newsfeed_id).html('<input type="text" class="form-control rounded comment-text-'+newsfeed_id+'" onkeydown="doComment(event, '+newsfeed_id+')" /> \
									<input class="d-none" id="comment_file_'+newsfeed_id+'" type="file" name="image" /> \
                                                        <div class="comment-attagement d-flex"> \
                                                            <!-- <a href="javascript:void();"><i class="ri-link mr-3"></i></a> \
                                                            <a href="javascript:void();"><i class="ri-user-smile-line mr-3"></i></a> --> \
                                                            <a href="javascript:void();" onClick="commentPicture('+newsfeed_id+')"><i class="ri-camera-line mr-3"></i></a> \
                                                        </div>'); 

														//_html = data;
					//$('.view-more-comment-btn-' + newsfeed_id).hide();
					$(".comments_list_" + newsfeed_id).hide();
					
					$('.comment-reply-form').hide();
		            $(".comment_reply_btn").unbind('click');
		 
					
					$(".comment_reply_btn").click(function() {
						var id = $(this).attr('id');
						$(".cr_" + id).toggle();
					});

					$(".comment_reply_btn").click(function() {
						var id = $(this).attr('id');
					    $(".comment_reply_add_" + id).toggle();
					});

					

					$(".comment_reply_child_btn").click(function() {
						var id = $(this).attr('id');
						$(".crc_" + id).toggle();
					});
					 
					$('.comment-reply-form').on('submit', function(e) {
						//console.log(4444444444444444444);
						e.preventDefault();
						CommentReplyForm(this);
					});
					$('.comment-reply-child-form').on('submit', function(e) {
						e.preventDefault();
						CommentReplyChildForm(this);
				    });
					 $('.facemocion').faceMocion({
		emociones: [{
				"emocion": "amo",
				"TextoEmocion": "I love"
			},
			{
				"emocion": "divierte",
				"TextoEmocion": "I enjoy"
			},
			{
				"emocion": "gusta",
				"TextoEmocion": "I like"
			},
			{
				"emocion": "asombro",
				"TextoEmocion": "It amazes me"
			},
			{
				"emocion": "alegre",
				"TextoEmocion": "I am glad"
			}
		]
	});

				}
			});
    }
 
	}
    function commentPicture(newsfeed_id) {
		jQuery('#comment_file_' + newsfeed_id).click();
    }
    function editNewsFeed($this) 
    {
        newsfeed_id = $($this).attr('newsfeed_id');
        route = $($this).attr('route');

        $.ajax({
            url: route,
            method: "GET",
            data: {
                "_token": "{{ csrf_token() }}",
                "newsfeed_id": newsfeed_id,
            },
            beforeSend: function() {},
            success: function(data) {
                $('#newsfeedModal').modal('show');
                $('#newsfeed_description').val('');
                $('#newsfeed_description').val(data.data.newfeed.text);
                document.getElementById("newsfeed-id").value = data.data.newfeed.id;
                var images = data.data.newfeed_galary;
                var arrayImagesElement = document.getElementById("edit-img-show");

                function createImageNode(images) {
                    var img = document.createElement('img');
                    img.src = "images/newsfeed/" + images.image;
                    img.id = "edit-image-show";
                    img.class = "edit-image-show";
                    img.width = "435";
                    img.height = "194"
                    img.style.margin = "15px";
                    return img;
                }
                $('div#edit-img-show  img').remove();
                images.forEach(img => {
                    arrayImagesElement.appendChild(createImageNode(img));
                });

            }
        })
    }

    function editReplyComment($this) {
		comment_id = $($this).attr('comment_id');
		reply_comment_id = $($this).attr('reply_comment_id');
		route = $($this).attr('route');

		$.ajax({
			url: route,
			method: "GET",
			data: {
				"_token": "{{ csrf_token() }}",
				"comment_id": comment_id,
				"reply_comment_id": reply_comment_id
			},
			beforeSend: function() {},
			success: function(data) {
				$('#replyCommentModal').modal('show');
				$('#reply_comment_description').val('');
				$('#reply_comment_description').val(data.reply_comment);
				document.getElementById("edit-comments-id").value = data.comment_id;
				document.getElementById("edit-reply-comment-id").value = data.id;
			}
		})
    }

    function editComment($this) {
		comment_id = $($this).attr('comment_id');
		route = $($this).attr('route');

		$.ajax({
			url: route,
			method: "GET",
			data: {
				"_token": "{{ csrf_token() }}",
				"comment_id": comment_id,
			},
			beforeSend: function() {},
			success: function(data) {
				//$('#commentModal').modal('show');
				$('#comment_desc').val('');
				$('#comment_desc').val(data.comment);
				$('#edit-comment-id').val(data.id);
			}
		})
    }

    function commentForm($this) {
        let user_id = $($this).attr('user_id')
        let newsfeed_id = $($this).attr('newsfeed_id')
        let comment = $(".comment-text-" + newsfeed_id).text();
        route = $($this).attr('route');
        $.ajax({
            url: route,
            method: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                comment: comment,
                user_id: user_id,
                newsfeed_id: newsfeed_id,
            },
            success: function(response) {
                location.reload();
            },
            error: function(response) {
                $('.comment-error-' + newsfeed_id).text(response.responseJSON.errors.comment);
            }
        });
    }

    function deleteReplyComment($this) {
            comment_id = $($this).attr('comment_id');
            reply_comment_id = $($this).attr('reply_comment_id');
            toastr.options = {
                "closeButton": true,
                "newestOnTop": true,
                "positionClass": "toast-top-right"
            };
            route = $($this).attr('route');
            if (confirm("Are You Sure to delete this comment reply ?") == true) {
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
                            document.getElementById("del-reply-comment_" + reply_comment_id).remove();
                        }
                    }
                })
            }
        }

    function NewsfeedForm() 
    {
        var formData = new FormData();
        let newsfeed_description = $('#newsfeed_description').val();
        let my_file2 = $('#my_file2').prop('files');
        let newsfeed_id = $('#newsfeed-id').val();
        let TotalFiles = $('#my_file2')[0].files.length; //Total files
        let files = $('#my_file2')[0];

        for (let i = 0; i < TotalFiles; i++) {
            formData.append('image' + i, files.files[i]);
        }

        let _token = $('meta[name="csrf-token"]').attr('content');
        _token = document.getElementsByName("_token")[0].value
        formData.append('_token', _token);
        formData.append('textpost', newsfeed_description);
        formData.append('totalFile', TotalFiles);
        formData.append('newsfeed_id', newsfeed_id);

        $.ajax({
            url: "{{ url('/newsfeed/update')}}",
            type: "POST",
            contentType: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            beforeSend: function() {

            },
            success: (response) => {
                toastr.success(response.text);
                $("#newsfeedModal").modal('hide');

                $('.newsfeed-text-' + newsfeed_id).text(newsfeed_description);
                $('.newsfeed-update-img-' + newsfeed_id).hide();
                let _html = ''
                response.data.forEach(function(element) {
                    let imagePath = "{{ url('images/newsfeed/') }}";
                    _html += '<img loading="lazy" src="' + imagePath + '/' + element.image + '" alt="photo" width="488" height="194" ><br>'
                });
                $('div.newsfeed-update-img-show-' + newsfeed_id + ' > img, br').remove();
                $(".newsfeed-update-img-show-" + newsfeed_id).append(_html);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function filePreview(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#post_upload_Form + embed').remove();
				 $('#post_upload_Form #preview_embed').html('<embed src="' + e.target.result + '" width="80" height="50">');
                 enableDisablePost();
			};
			reader.readAsDataURL(input.files[0]);
            
		}
	}

    function CommentForm_2() 
        {
            var formData = new FormData();
            let comment_desc = $('#comment_desc').val();
            let comment_id = $('#edit-comment-id').val();
            let _token = $('meta[name="csrf-token"]').attr('content');
            _token = document.getElementsByName("_token")[0].value
            formData.append('_token', _token);
            formData.append('textpost', comment_desc);
            formData.append('comment_id', comment_id);
            $.ajax({
                url: "{{ url('/comment-update')}}",
                type: "POST",
                contentType: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                beforeSend: function() {

                },
                success: (response) => {
                    toastr.success(response.text);
                    if (response.status === "success") {
                        $("#commentModal").modal('hide');
                        $('.comment-text-' + comment_id).text(comment_desc);
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }


    function CommentReplyForm_2()
    {
        var formData = new FormData();
        let reply_comment_description = $('#reply_comment_description').val();
        let comment_id = $('#edit-comments-id').val();
        let reply_comment_id = $('#edit-reply-comment-id').val();
        let _token = $('meta[name="csrf-token"]').attr('content');
        _token = document.getElementsByName("_token")[0].value
        formData.append('_token', _token);
        formData.append('textpost', reply_comment_description);
        formData.append('comment_id', comment_id);
        formData.append('reply_comment_id', reply_comment_id);

        $.ajax({
            url: "{{ url('/reply-comment-update')}}",
            type: "POST",
            contentType: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            beforeSend: function() {

            },
            success: (response) => {
                toastr.success(response.text);
                if (response.status === "success") {
                    $("#replyCommentModal").modal('hide');
                    $('.comment-reply-txt-' + reply_comment_id).text(reply_comment_description);
                }
            },
            error: function(data) {
                console.log(data);
            }
    });
    }

    function CommentReplyForm($this) {
        let user_id = $($this).attr('user_id')
        let newsfeed_id = $($this).attr('newsfeed_id')
        let comment_id = $($this).attr('comment_id')
        let comment = $(".comment-reply-text-" + comment_id).val();

        route = $($this).attr('route');
        if (comment === "") {
            $('.comment-reply-error-' + comment_id).text("This field is required.");
        } else {
            $.ajax({
                url: route,
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    comment: comment,
                    user_id: user_id,
                    newsfeed_id: newsfeed_id,
                    comment_id: comment_id
                },
                success: function(response) {
                    console.log(response.data);
                    $('.comment_reply_add_' + comment_id).hide();
                    $(".reply_comment_add_" + comment_id).html(response.data);
                    $('.comment-reply-child-form').hide();
                    $('.comment-reply-text-' + comment_id).val('');
                    $(".comment_reply_child_btn").click(function() {
                        var id = $(this).attr('id');
                        $(".crc_" + response.insertData.id).toggle();
                    });
                },
                error: function(response) {
                    alert('errrorrrrrrrr');
                    $('.comment-reply-error-' + comment_id).text(response.responseJSON.errors.comment);
                }
            });
        }
    }

    $(document).ready(function() {
        // event modal
        $("#event_image").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".group-image-label").addClass("selected").html(fileName);
        });
        $('#event_group').select2({
            dropdownParent: $('#createEventModal'),
        });

        $('#event_hoster').select2({
            dropdownParent: $('#createEventModal'),
            ajax: {
                url: function() {
                    return getEventHosterPath();
                },
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });

        // photo modal
        $("#photo_image").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".photo-image-label").addClass("selected").html(fileName);
        });
        $('#photo_group').select2({
            dropdownParent: $('#createPhotoModal'),
        });

        // friend modal
        $('#friend_list').select2({
            dropdownParent: $('#createFriendModal'),
            ajax: {
                url: "{{ route('ajax-suggest-friend') }}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });

        // store modal
        $("#store_image").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".store-image-label").addClass("selected").html(fileName);
        });
    })

    function getEventHosterPath() {
        let selectedGroupId = $("#event_group").val();
        let pathForEvent = `/user-group/members/${selectedGroupId}`;
        return pathForEvent;
    }

    function onCreateStore() {
        let membershipId = "{{ $user->meberships_id }}";
        if (membershipId !== "1" && membershipId !== "2") {
            $("#alertModal").modal('show');
        } else {
            $("#storeModal").modal('show');
        }
    }

    function goMembershipPage() {
        location.href = "{{ route('profile-setting', ['active'=>'membership']) }}"
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#create-event').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: "{{ route('create-event') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
                if (response) {
                    this.reset();
                    $("#createEventModal").modal('hide');
                    toastr.success(response.text);
                }
            },
            error: function(response) {
                toastr.error(response.responseJSON.message);
            }
        });
    });

    $('#create-photo').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: "{{ route('create-photo') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
                if (response === "ok") {
                    location.reload();
                }
            },
            error: function(response) {
                toastr.error(response.responseJSON.message);
            }
        });
    });

    $('#save-store').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: "{{ route('store-save') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
                if (response === "ok") {
                    location.reload();
                } else {
                    toastr.error("Saving store is failed. Server error!");
                }
            },
            error: function(response) {
                toastr.error(response.responseJSON.message);
            }
        });
    });
/*
    $('.facemocion').faceMocion({
      emociones: [{
          "emocion": "amo",
          "TextoEmocion": "I love"
        },
        {
          "emocion": "divierte",
          "TextoEmocion": "I enjoy"
        },
        {
          "emocion": "gusta",
          "TextoEmocion": "I like"
        },
        {
          "emocion": "asombro",
          "TextoEmocion": "It amazes me"
        },
        {
          "emocion": "alegre",
          "TextoEmocion": "I am glad"
        }
      ]
    });


		$(document).on('click', '.likePost', function() {
            likePost(this);
            
		});

        $('#my_file1').change(function() {
		filePreview(this);
	});

	

 
 
 
 $('.share-post-btn').on('click', function() { sharePost(); });


    $(document).ready(function() {
		$(".image_upload1").click(function() {
			$("input[id='my_file1']").click();
		});

		$(".image_upload2").click(function() {
			$("input[id='my_file2']").click();
		});

		$(".image_upload3").click(function() {
			$("input[id='my_file3']").click();
		});

		$('.comment-form').hide();
		$(".comment_btn").click(function() {
			var id = $(this).attr('id');
			$(".comment_add_" + id).toggle();
		});

		$('.comment-reply-form').hide();
		$(".comment_reply_btn").click(function() {
			var id = $(this).attr('id');
			$(".comment_reply_add_" + id).toggle();
		});

		$('.comment-reply-child-form').hide();
		$(".comment_reply_child_btn").click(function() {
			var id = $(this).attr('id');
			$(".comment_reply_child_add_" + id).toggle();
		});

		 
		$('.postFollow').on('click', function() {
            postFollow(this);
        });

		$(document).on('click', '.likeCommentPost', function() {
            likeCommentPost(this);
           
		});
		$(document).on('click', '.likeReplyCommentPost', function() {
            likeReplyCommentPost(this);
        });


    // Block Newsfeed Post
	$(document).on('click', '.block-newsfeed', function() {
        blocknewsfeed(this);
        
	});

    // Block Newsfeed Post
	$(document).on('click', '.unblock-newsfeed', function() {
        unblockNewsfeed(this);
        
	});

   // Delete Newsfeed Post
	$(document).on('click', '.delete-newsfeed', function() {
        deleteNewsfeed(this);
	});
    
    // Newsfeed Model-popup
	$(document).on('click', '.edit-newsfeed', function() {
        editNewsFeed(this);
        
	})


    @if(Session::has('message'))
	toastr.options = {
		"closeButton": true,
		"progressBar": true
	}
	toastr.success("{{ session('message') }}");
	@endif

	   

    

    $(document).ready(function() {
		$('.comment-form').on('submit', function(e) {
			e.preventDefault();
            commentForm(this);

            
		});
	});

    // Add Friend
	$(document).on('click', '.add-friend', function() {
        addFriend(this);
        
	});

    // Comment Model-popup
    $(document).on('click', '.edit-comment', function() {
        editComment(this);
    })

    // Delete comment Post
	$(document).on('click', '.delete-comment', function() {
        deleteComment(this);
    });

    // Post Reply Comment

	$('.comment-reply-form').on('submit', function(e) {
		e.preventDefault();
        CommentReplyForm(this);
        
	});


    // Reply Comment Model-popup
	$(document).on('click', '.edit-reply-comment', function() {
        editReplyComment(this);
    })



    // Delete comment Post
	$(document).on('click', '.delete-reply-comment', function() {
        deleteReplyComment(this);
        
	});

    // View More Comments+
	$(document).on('click', '.more-comments', function() {
		moreComments(this);
	});

    // Model Close
	$(".close-newsfeed-model").click(function() {
		$("#newsfeedModal").modal('hide');
	});
	$(".close-comment-model").click(function() {
		$("#commentModal").modal('hide');
	});

	$(".close-reply-comment-model").click(function() {
		$("#replyCommentModal").modal('hide');
	});
	$('.newsfeed_update_btn').click(function() {
		$('.newsfeed_form').submit();
	});

    // Update Newsfeed
	$('.newsfeed_form').on('submit', function(e) {
		e.preventDefault();
        NewsfeedForm();
        
	});

    $('.comment_update_btn').on('click', function() {
		$('.comment_form').submit();
	});
	// Update Comment
	$('.comment_form').on('submit', function(e) {
		e.preventDefault();
		CommentForm_2();
        
	});

    $('.comment_reply_form').on('submit', function(e) {
		e.preventDefault();
        CommentReplyForm_2();
        
	});

    */


function clickFunctionality() {
	$('.comment-form').on('submit', function(e) {
			e.preventDefault();
			commentForm(this);
		});

		$(".image_upload1").unbind('click');
		$(".image_upload1").click(function() {
			$("input[id='my_file1']").click();
		});

		$(".image_upload2").unbind('click');
		$(".image_upload2").click(function() {
			$("input[id='my_file2']").click();
		});

		$(".image_upload3").unbind('click');
		$(".image_upload3").click(function() {
			$("input[id='my_file3']").click();
		});

		$('.comment-form').hide();

		$(".comment_btn").unbind('click');
		$(".comment_btn").click(function() {  
			var id = $(this).attr('id');
			$(".comment_add_" + id).toggle();
		});

		$('.comment-reply-form').hide();
		$(".comment_reply_btn").unbind('click');
		$(".comment_reply_btn").click(function() {
			var id = $(this).attr('id');
			$(".comment_reply_add_" + id).toggle();
		});

		$('.comment-reply-child-form').hide();
		$(".comment_reply_child_btn").unbind('click');
		$(".comment_reply_child_btn").click(function() {
			var id = $(this).attr('id');
			$(".comment_reply_child_add_" + id).toggle();
		});

		$(".postFollow").unbind('click');
		$('.postFollow').on('click', function() {
			postFollow(this);
		});

		$(document).off('click', '.likeCommentPost');
		$(document).on('click', '.likeCommentPost', function() {
			likeCommentPost(this);
		});

		$(document).off('click', '.likeReplyCommentPost');
		$(document).on('click', '.likeReplyCommentPost', function() { 
			likeReplyCommentPost(this); 
		});
}
function reAddClickFunctions()
{
	$('.share-post-btn').on('click', function() { sharePost() });

	$(document).off('click', '.likePost');
	$(document).on('click', '.likePost', function() { likePost(this); });

	// Block Newsfeed Post
	$(document).off('click', '.block-newsfeed');
	$(document).on('click', '.block-newsfeed', function() { 
		blocknewsfeed(this);
	});
	// Block Newsfeed Post
	$(document).off('click', '.unblock-newsfeed');
	$(document).on('click', '.unblock-newsfeed', function() {
		unblockNewsfeed(this);
	});
	// Delete Newsfeed Post
	$(document).off('click', '.delete-newsfeed');
	$(document).on('click', '.delete-newsfeed', function() {
		deleteNewsfeed(this);
	});

	// Newsfeed Model-popup
	$(document).off('click', '.edit-newsfeed');
	$(document).on('click', '.edit-newsfeed', function() {
		editNewsFeed(this);
		
	})

	 // Update Comment
	$('.comment_form').on('submit', function(e) {
		e.preventDefault();
		CommentForm_2();
	});

	// Add Friend
	$(document).off('click', '.add-friend');
	$(document).on('click', '.add-friend', function() {
		addFriend(this);
		
	});
	// Comment Model-popup
	$(document).off('click', '.edit-comment');
	$(document).on('click', '.edit-comment', function() {
		editComment(this);
		
	})
	// Delete comment Post
	$(document).off('click', '.delete-comment');
	$(document).on('click', '.delete-comment', function() {
		deleteComment(this);
	});

	// Post Reply Comment

	$(".comment-reply-form").unbind('click');
	$('.comment-reply-form').on('submit', function(e) {
		e.preventDefault();
		CommentReplyForm(this);
	});

	$('.comment-reply-child-form').on('submit', function(e) {
		e.preventDefault();
		CommentReplyChildForm(this);
	});

	// Reply Comment Model-popup
	$(document).off('click', '.edit-reply-comment');
	$(document).on('click', '.edit-reply-comment', function() {
		editReplyComment(this);
	})

	// Delete comment Post
	$(document).off('click', '.delete-reply-comment');
	$(document).on('click', '.delete-reply-comment', function() {
		deleteReplyComment(this);
	});
	// View More Comments+
	$(document).off('click', '.more-comments');
	$(document).on('click', '.more-comments', function() {
		moreComments(this);
	});

	// Model Close
	$(".close-newsfeed-model").unbind('click');
	$(".close-newsfeed-model").click(function() {
		$("#newsfeedModal").modal('hide');
	});

	$(".close-comment-model").unbind('click');
	$(".close-comment-model").click(function() {
		$("#commentModal").modal('hide');
	});

	$(".close-reply-comment-model").unbind('click');
	$(".close-reply-comment-model").click(function() {
		$("#replyCommentModal").modal('hide');
	});

	$(".newsfeed_update_btn").unbind('click');
	$('.newsfeed_update_btn').click(function() {
		$('.newsfeed_form').submit();
	});
	// Update Newsfeed
	$('.newsfeed_form').on('submit', function(e) {
		e.preventDefault();
		NewsfeedForm();
	});

	$(".comment_update_btn").unbind('click');
	$('.comment_update_btn').on('click', function() {
		$('.comment_form').submit();
	});
	

	// // Update Comment Reply
	$('.comment_reply_form').on('submit', function(e) {
		e.preventDefault();
        CommentReplyForm_2();
	});

	$('#my_file1').change(function() {
		filePreview(this);
	});

	

	$('.facemocion').faceMocion({
		emociones: [{
				"emocion": "amo",
				"TextoEmocion": "I love"
			},
			{
				"emocion": "divierte",
				"TextoEmocion": "I enjoy"
			},
			{
				"emocion": "gusta",
				"TextoEmocion": "I like"
			},
			{
				"emocion": "asombro",
				"TextoEmocion": "It amazes me"
			},
			{
				"emocion": "alegre",
				"TextoEmocion": "I am glad"
			}
		]
	});

}


$(document).ready(function() { clickFunctionality(); });
reAddClickFunctions();	

var page = 2;
$(window).scroll(function() {
   if($(window).scrollTop() + $(window).height() == $(document).height()) {
	   if (page !== false) {
       jQuery('#page_load_loader').fadeIn();
       $.get( "{{ url('/load-more-profilefeed') }}/{{$userstring}}?page=" + page, function( data ) { 
            page++; 
			jQuery('#newsfeedposts').append(data);
		    reAddClickFunctions();
			clickFunctionality();
			if (data == '') { page = false; jQuery('#page_load_loader').fadeOut(); }
		});
	}
   }
});



</script>
@endsection
