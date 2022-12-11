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
                                    @if(isset($user->userInfo->profile_image))
                                    <img src="{{ url('images/profile/',$user->userInfo->profile_image) }}" alt="profile-img" class="avatar-130 img-fluid" />
                                    @else
                                    <img src="{{url('assets/dashboard/img/default-avatar.png')}}" alt="profile-img" class="avatar-130 img-fluid" />
                                    @endif
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
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Life Event</h4>
                                            </div>
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
                                                <p class="m-0"><a href="javacsript:void();" data-toggle="modal" data-target="#createFriendModal"><i class="fas fa-plus"></i></a></p>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="iq-card-body">
                                            <ul class="request-list m-0 p-0">
                                                @foreach($friends as $friend)
                                                <li class="d-flex align-items-center">
                                                    <div class="user-img img-fluid">
                                                        @if(isset($friend->userInfo->profile_image))
                                                        <img src="{{ url('images/profile/',$friend->userInfo->profile_image) }}" alt="story-img" class="rounded-circle avatar-40">
                                                        @else
                                                        <img src="{{ url('assets/dashboard/img/default-avatar.png') }}" alt="profile-img" class="rounded-circle avatar-40" />
                                                        @endif
                                                    </div>
                                                    <div class="media-support-info ml-3">
                                                        <h6>{{ ucwords($friend->name) }}</h6>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div id="post-modal-data" class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Create Post</h4>
                                            </div>
                                        </div>
                                        <div class="iq-card-body" data-toggle="modal" data-target="#post-modal">
                                            <div class="d-flex align-items-center">
                                                <div class="user-img">
                                                    @if(isset(Auth::user()->userInfo->profile_image))
                                                    <img src="{{ url('images/profile/',$friend->userInfo->profile_image) }}" alt="userimg" class="avatar-60 rounded-circle img-fluid">
                                                    @else
                                                    <img src="{{ url('assets/dashboard/img/default-avatar.png') }}" alt="profile-img" class="avatar-60 rounded-circle img-fluid" />
                                                    @endif
                                                </div>
                                                <form class="post-text ml-3 w-100" action="javascript:void();">
                                                    <input type="text" class="form-control rounded" placeholder="Write something here..." style="border:none;">
                                                </form>
                                            </div>
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
                                        </div>
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
                                                                @if(isset(Auth::user()->userInfo->profile_image))
                                                                <img src="{{ url('images/profile/',$friend->userInfo->profile_image) }}" alt="userimg" class="avatar-60 rounded-circle img-fluid">
                                                                @else
                                                                <img src="{{ url('assets/dashboard/img/default-avatar.png') }}" alt="profile-img" class="avatar-60 rounded-circle img-fluid" />
                                                                @endif
                                                            </div>
                                                            <form class="post-text ml-3 w-100" action="javascript:void();">
                                                                <input type="text" class="form-control rounded" placeholder="Write something here..." style="border:none;">
                                                            </form>
                                                        </div>
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
                                                                        @if(isset(Auth::user()->userInfo->profile_image))
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
                                    <div class="iq-card">
                                        <div class="iq-card-body">
                                            @if($profilePosts->count() > 0)
                                            @foreach($profilePosts as $profilePost)
                                            <div class="post-item">
                                                <div class="user-post-data p-3">
                                                    <div class="d-flex flex-wrap">
                                                        <div class="media-support-user-img mr-3">
                                                            <img class="rounded-circle img-fluid" src="{{ url('assets/dashboard/images/user/1.jpg') }}" alt="">
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
                                                <div class="user-post">
                                                    <p>{{ $profilePost->text }}</p>
                                                </div>
                                                @endif
                                                @if(isset($profilePost->NewsfeedGallaries))
                                                <div class="user-post">
                                                    @foreach($profilePost->NewsfeedGallaries as $imageValue)
                                                    <a href="javascript:void();"><img src="{{ url('images/newsfeed/'.$imageValue->image) }}" alt="post-image" class="img-fluid w-100" /></a>
                                                    @endforeach
                                                </div>
                                                @endif

                                                <div class="comment-area mt-3">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="like-block position-relative d-flex align-items-center">
                                                            <div class="d-flex align-items-center">
                                                                <div class="like-data">
                                                                    <div class="dropdown">
                                                                        <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                                            <img src="{{ url('assets/dashboard/images/icon/01.png') }}" class="img-fluid" alt="">
                                                                        </span>
                                                                        <div class="dropdown-menu">
                                                                            <a class="ml-2 mr-2" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Like"><img src="{{ url('assets/dashboard/images/icon/01.png') }}" class="img-fluid" alt=""></a>
                                                                            <a class="mr-2" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Love"><img src="{{ url('assets/dashboard/images/icon/02.png') }}" class="img-fluid" alt=""></a>
                                                                            <a class="mr-2" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Happy"><img src="{{ url('assets/dashboard/images/icon/03.png') }}" class="img-fluid" alt=""></a>
                                                                            <a class="mr-2" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="HaHa"><img src="{{ url('assets/dashboard/images/icon/04.png') }}" class="img-fluid" alt=""></a>
                                                                            <a class="mr-2" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Think"><img src="{{ url('assets/dashboard/images/icon/05.png') }}" class="img-fluid" alt=""></a>
                                                                            <a class="mr-2" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sade"><img src="{{ url('assets/dashboard/images/icon/06.png') }}" class="img-fluid" alt=""></a>
                                                                            <a class="mr-2" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lovely"><img src="{{ url('assets/dashboard/images/icon/07.png') }}" class="img-fluid" alt=""></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="total-like-block ml-2 mr-3">
                                                                    <div class="dropdown">
                                                                        <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                                            {{ $profilePost->NewsfeedLike->count() }} Likes
                                                                        </span>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item" href="#">Max Emum</a>
                                                                            <a class="dropdown-item" href="#">Bill Yerds</a>
                                                                            <a class="dropdown-item" href="#">Hap E. Birthday</a>
                                                                            <a class="dropdown-item" href="#">Tara Misu</a>
                                                                            <a class="dropdown-item" href="#">Midge Itz</a>
                                                                            <a class="dropdown-item" href="#">Sal Vidge</a>
                                                                            <a class="dropdown-item" href="#">Other</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="total-comment-block">
                                                                <div class="dropdown">
                                                                    <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                                        {{ $profilePost->NewsfeedComment->count() }} Comment
                                                                    </span>
                                                                    <div class="dropdown-menu">
                                                                        @foreach($profilePost->NewsfeedComment as $key => $comment)
                                                                        <a class="dropdown-item" href="#">{{ ucwords($comment->NewsfeedUser->name) }}</a>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="share-block d-flex align-items-center feather-icon mr-3">
                                                            <a href="javascript:void();"><i class="ri-share-line"></i>
                                                                <span class="ml-1">99 Share</span></a>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <ul class="post-comments p-0 m-0">
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
                                                    </form>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
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
                                                                        @if(isset($friend->friendUser->userInfo->profile_image))
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
                                <div class="friend-list-tab mt-2">
                                    <ul class="nav nav-pills d-flex align-items-center justify-content-left friend-list-items p-0 mb-2">
                                        <li>
                                            <a class="nav-link active" data-toggle="pill" href="#photosofyou">Photos of You</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-toggle="pill" href="#your-photos">Your Photos</a>
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
                <img src="{{ url('assets/dashboard/images/page-img/page-load-loader.gif') }}" alt="loader" style="height: 100px;">
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
                                <div class="custom-file">
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
                        <div class="custom-file">
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
                        <div class="custom-file">
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
@endsection
@section('page-js-link')
@endsection

@section('page-js')
<script type="text/javascript">
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
                    // location.reload();
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
                    // location.reload();
                }
            }
        })
    });

    $("#createFriendRequest").on('click', function() {
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
    });

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

    $(document).on('click', '.un-friend', function() {
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
</script>
@endsection