@extends('dashboard.layouts.master')
@section('title', ' Block friends')
@section('page', ' Block friends')
@section('page-css-link') @endsection
@section('page-css') @endsection
@section('main-content')
<div class="header-spacer header-spacer-small"></div>

<!-- Main Header Account -->

<div class="main-header">
	<div class="content-bg-wrap bg-account"></div>
	<div class="container">
		<div class="row">
			<div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
				<div class="main-header-content">
					<h1>Your Account Dashboard</h1>
					<p>Welcome to your account dashboard! Here you’ll find everything you need to change your profile
	information, settings, read notifications and requests, view your latest messages, change your pasword and much
	more! Also you can create or manage your own favourite page, have fun!</p>
				</div>
			</div>
		</div>
	</div>
	<img class="img-bottom" src="img/account-bottom.webp" width="1169" height="153">
</div>

<!-- ... end Main Header Account -->

<!-- Your Account Personal Information -->

<div class="container">
	<div class="row">
		<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Block Friend ({{ Auth::user()->blockFriends->count() }})</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
				</div>

				
				<!-- Notification List Frien Requests -->
				
				<ul class="notification-list friend-requests">
					@if(Auth::user()->blockFriends->count() > 0)
					@foreach(Auth::user()->blockFriends as $blockFriend)
					<li>
						<div class="author-thumb">
							<img loading="lazy" src="{{url('public/assets/dashboard/img/avatar71-sm.webp')}}" alt="author" width="42" height="42">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">{{ $blockFriend->blockFriendInfo->name }}</a>
							<!-- <span class="chat-message-item">Mutual Friend: Sarah Hetfield</span> -->
						</div>
						<span class="notification-icon">
											<a href="{{ route('unblock-friend',$blockFriend->block_id)}}" class="accept-request">
												<span class="icon-add">
													<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
												</span>
												<span class="accept-request-text">Unblock</span>
											</a>
				
											<a href="#" class="accept-request request-del">
												<span class="icon-minus">
													<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
												</span>
											</a>
				
										</span>
				
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="#olymp-little-delete"></use></svg>
						</div>
					</li>
					@endforeach
					@endif
				</ul>
				
				<!-- ... end Notification List Frien Requests -->
			</div>

		</div>

		@include('dashboard.includes.profile-sidebar')
	</div>
</div>

<!-- ... end Your Account Personal Information -->

@endsection
@section('page-js-link') @endsection
@section('page-js') @endsection