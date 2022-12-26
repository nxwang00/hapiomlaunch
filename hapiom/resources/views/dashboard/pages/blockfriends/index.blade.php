@extends('dashboard.layouts.master')
@section('title', ' Block friends')
@section('page', ' Block friends')
@section('page-css-link') @endsection
@section('page-css') @endsection
@section('main-content')


<div id="content-page" class="content-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Block Friend (<span class="block-friend-count">{{ Auth::user()->blockFriends->count() }}</span>)</h4>
                        </div>
                    </div>
                    <div class="iq-card-body block-friend-card">
                        <ul class="request-list list-inline m-0 p-0">
                            @if(Auth::user()->blockFriends->count() > 0)
                            @foreach(Auth::user()->blockFriends as $blockFriend)
                            <li class="d-flex align-items-center">
                                <div class="user-img img-fluid">
                                    @if(isset($blockFriend->blockFriendInfo->userInfo->profile_image))
                                    <img src="{{ url('images/profile/',$blockFriend->blockFriendInfo->userInfo->profile_image) }}" alt="story-img" class="rounded-circle avatar-40">
                                    @else
                                    <img src="{{ url('assets/dashboard/images/user/04.jpg') }}" alt="profile-img" class="rounded-circle avatar-40" />
                                    @endif
                                </div>
                                <div class="media-support-info ml-3">
                                    <h6>{{ $blockFriend->blockFriendInfo->name }}</h6>
                                    <p class="mb-0">{{ $blockFriend->blockFriendInfo->Userfriends->count() }} friends</p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void();" route="{{ route('unblock-friend',$blockFriend->block_id)}}" class="mr-3 btn btn-primary rounded unblock-friend">Unblock</a>
                                    <a href="{{ route('user-profile',encrypt($blockFriend->user_id)) }}" class="mr-3 btn btn-secondary rounded">Profile</a>
                                </div>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">People You May Know</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <ul class="request-list m-0 p-0">
                            @foreach(Auth::user()->friendSuggestion() as $user)
                            <li class="d-flex align-items-center add-friend-list-{{ $user->id }}">
                                <div class="user-img img-fluid">
                                    @if(isset($user->userInfo->profile_image) && file_exists('images/profile/'. $user->userInfo->profile_image))
                                    <img src="{{ url('images/profile/',$user->userInfo->profile_image) }}" alt="story-img" class="rounded-circle avatar-40">
                                    @else
                                    <img src="{{ url('assets/dashboard/images/user/04.jpg') }}" alt="profile-img" class="rounded-circle avatar-40" />
                                    @endif
                                </div>
                                <div class="media-support-info ml-3">
                                    <h6>{{ ucwords($user->name) }}</h6>
                                    <p class="mb-0">{{ $user->Userfriends->count() }} friends</p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void();" class="mr-3 btn btn-primary rounded add-friend" route="{{ route('add-friend',$user->id)}}" user_id="{{ $user->id }}"><i class="ri-user-add-line"></i>Add Friend</a>
                                    <a href="{{ route('user-profile',encrypt($user->id)) }}" class="mr-3 btn btn-secondary rounded">Profile</a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
             </div>
          </div>
       </div>
    </div>
</div>




@endsection
@section('page-js-link') @endsection
@section('page-js') @endsection