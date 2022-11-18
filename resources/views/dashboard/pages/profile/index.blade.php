@extends('dashboard.layouts.master')
@section('title', ' Profile')
@section('page', ' Profile')
@section('page-css-link') @endsection
@section('page-css') @endsection
@section('main-content')
<div class="header-spacer"></div>

<!-- Top Header-Profile -->
@include('dashboard.includes.header-profile');
<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">

					</div>
					<div class="profile-section">
						<div class="row">
							<div class="col col-lg-5 col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="{{ route('customer-dashboard') }}" class="active">Timeline</a>
									</li>
									<li>
										<a href="{{ route('about') }}">About</a>
									</li>
									<li>
										@if(!empty($user->name))
										<a href="{{ route('friendlist-user',$user->id) }}">Friends</a>
										@else
										<a href="{{ route('friendlist') }}">Friends</a>
										@endif
									</li>
								</ul>
							</div>
							<div class="col col-lg-5 ms-auto col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="#">Photos</a>
									</li>
									<li>
										<a href="#">Videos</a>
									</li>
									<li>
										<div class="more">
											<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
											<ul class="more-dropdown more-with-triangle">
												@if(Auth::user()->isFriendBlocked($user->id))
												<li>
													<a href="javascript::void()" route="{{ route('unblock-friend',$user->id) }}" class="unblock-friend" id="liveToastBtn">Unblock</a>
												</li>
												@else
												<li>
													<a href="javascript::void()" route="{{ route('block-friend',$user->id)}}" class="block-friend" id="liveToastBtn">Block</a>
												</li>
												@endif
												@if(Auth::user()->isFriend($user->id))
												<li>
													<a href="javascript::void()" route="{{ route('un-friend',$user->id) }}" class="un-friend" id="liveToastBtn">Unfriend</a>
												</li>
												@elseif(Auth::user()->isFriendRequest($user->id))
												<li>
													<a href="javascript::void()">Friend Request Sent</a>
												</li>
												@elseif(Auth::user()->isFriendRequestAccept($user->id))
												<li>
													<a href="javascript::void()" route="{{ route('accept-friend-request',$user->id)}}" class="accept-friend-request" id="liveToastBtn">Accept Friend Request</a>
												</li>
												@else
												<li>
													<a href="javascript::void()" route="{{ route('add-friend',$user->id)}}" class="add-friend" id="liveToastBtn">Add  Friend</a>
												</li>
												@endif
											</ul>
										</div>
									</li>
								</ul>
							</div>
						</div>

						<div class="control-block-button">
							<a href="#" class="btn btn-control bg-blue">
								<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control bg-purple">
								<svg class="olymp-chat---messages-icon"><use xlink:href="#olymp-chat---messages-icon"></use></svg>
							</a>

							<div class="btn btn-control bg-primary more">
								<svg class="olymp-settings-icon"><use xlink:href="#olymp-settings-icon"></use></svg>

								<ul class="more-dropdown more-with-triangle triangle-bottom-right">
									<li>
										<a href="#" data-bs-toggle="modal" data-bs-target="#update-header-photo">Update Profile Photo</a>
									</li>
									<li>
										<a href="#" data-bs-toggle="modal" data-bs-target="#update-header-photo">Update Header Photo</a>
									</li>
									<li>
										<a href="#">Account Settings</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="top-header-author">
						<a href="#" class="author-thumb">
							@if(isset(Auth::user()->userInfo))
							<img loading="lazy" src="{{ url('public/images/profile/',Auth::user()->userInfo->profile_image) }}" alt="author" width="124" height="124">
							@else
							<img loading="lazy" src="{{ url('public/assets/dashboard/img/noimage.jpg') }}" alt="author" width="124" height="124">
							@endif
						</a>
						<div class="author-content">
							@if(!empty($user->name))
							<a href="{{ route('profile') }}" class="h4 author-name">{{ ucwords($user->name) }}</a>
							@else
							<a href="{{ route('profile') }}" class="h4 author-name">{{ ucwords(Auth::user()->name) }}</a>
							@endif
							<div class="country">San Francisco, CA</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ... end Top Header-Profile -->

<div class="container">
	<div class="row">

		<!-- Main Content -->

		<div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
			<div id="newsfeed-items-grid">

				@if($profilePosts->count() > 0)
				@foreach($profilePosts as $profilePost)

				<div class="ui-block">
					<!-- Post -->
					
					<article class="hentry post">
					
							<div class="post__author author vcard inline-items">
								<img loading="lazy" src="{{ url('public/images/profile',$profilePost->userImageByPost->profile_image) }}" width="36" height="36" alt="author">
					
								<div class="author-date">
									@if(!empty($user->name))
									<a class="h6 post__author-name fn" href="{{ route('profile') }}">{{ ucwords($user->name) }}</a>
									@else
									<a href="{{ route('profile') }}" class="h4 author-name">{{ ucwords(Auth::user()->name) }}</a>
									@endif
									<div class="post__date">
										<time class="published" datetime="2017-03-24T18:18">
											19 hours ago
										</time>
									</div>
								</div>
					
								<div class="more">
									<svg class="olymp-three-dots-icon">
										<use xlink:href="#olymp-three-dots-icon"></use>
									</svg>
									<ul class="more-dropdown">
										<li>
											<a href="#">Edit Post</a>
										</li>
										<li>
											<a href="#">Delete Post</a>
										</li>
										<li>
											<a href="#">Turn Off Notifications</a>
										</li>
										<li>
											<a href="#">Select as Featured</a>
										</li>
									</ul>
								</div>
					
							</div>
					
							<p>{{ $profilePost->text }}</p>
							@if(!empty($profilePost))
							<div class="post-video">
							@foreach($profilePost->NewsfeedGallaries as $imageValue)
								<img loading="lazy" src="{{ url('public/images/newsfeed/'.$imageValue->image) }}" alt="photo" width="400" height="194"><br>
							@endforeach
							</div>
							@endif
					
							<div class="post-additional-info inline-items">
					
								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-heart-icon">
										<use xlink:href="#olymp-heart-icon"></use>
									</svg>
									<strong id="total_count">{{ $profilePost->NewsfeedLike->count() }}</strong>
								</a>
					
								<ul class="friends-harmonic">
									<li>
										<a href="#">
											<img loading="lazy" src="{{ url('public/assets/dashboard/img/friend-harmonic7.webp') }}" alt="friend" width="28" height="28">
										</a>
									</li>
									<li>
										<a href="#">
											<img loading="lazy" src="{{ url('public/assets/dashboard/img/friend-harmonic8.webp') }}" alt="friend" width="28" height="28">
										</a>
									</li>
									<li>
										<a href="#">
											<img loading="lazy" src="{{ url('public/assets/dashboard/img/friend-harmonic9.webp') }}" alt="friend" width="28" height="28">
										</a>
									</li>
									<li>
										<a href="#">
											<img loading="lazy" src="{{ url('public/assets/dashboard/img/friend-harmonic10.webp') }}" alt="friend" width="28" height="28">
										</a>
									</li>
									<li>
										<a href="#">
											<img loading="lazy" src="{{ url('public/assets/dashboard/img/friend-harmonic11.webp') }}" alt="friend" width="28" height="28">
										</a>
									</li>
								</ul>
					
								<div class="names-people-likes">
									<a href="#">Jenny</a>, <a href="#">Robert</a> and
									<br>{{ $profilePost->NewsfeedLike->count() - 1 }} more liked this
								</div>
					
					
								<div class="comments-shared">
									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-speech-balloon-icon">
											<use xlink:href="#olymp-speech-balloon-icon"></use>
										</svg>
										<span>17</span>
									</a>
					
									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-share-icon">
											<use xlink:href="#olymp-share-icon"></use>
										</svg>
										<span>24</span>
									</a>
								</div>
					
					
							</div>
					
							<div class="control-block-button post-control-button">
					
								<a href="#" class="btn btn-control featured-post">
									<svg class="olymp-trophy-icon">
										<use xlink:href="#olymp-trophy-icon"></use>
									</svg>
								</a>
					
								<a href="#" class="btn btn-control">
									<svg class="olymp-like-post-icon">
										<use xlink:href="#olymp-like-post-icon"></use>
									</svg>
								</a>
					
								<a href="#" class="btn btn-control">
									<svg class="olymp-comments-post-icon">
										<use xlink:href="#olymp-comments-post-icon"></use>
									</svg>
								</a>
					
								<a href="#" class="btn btn-control">
									<svg class="olymp-share-icon">
										<use xlink:href="#olymp-share-icon"></use>
									</svg>
								</a>
					
							</div>
					
						</article>
					
					<!-- .. end Post -->				
				</div>
				
				@endforeach
				@else
				<h3 class="text-danger text-center">Ooops! no data found.</h3>
				@endif
			</div>

			<!-- <a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid">
				<svg class="olymp-three-dots-icon">
					<use xlink:href="#olymp-three-dots-icon"></use>
				</svg>
			</a> -->
		</div>

		<!-- ... end Main Content -->


		<!-- Left Sidebar -->

		<div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
			<div class="crumina-sticky-sidebar">
				<div class="sidebar__inner">

					<div class="ui-block">
						<div class="ui-block-title">
							<h6 class="title">Profile Intro</h6>
						</div>
						@if(!empty($results) > 0)
						@foreach($results as $result)
						<div class="ui-block-content">

							<!-- W-Personal-Info -->
							
							<ul class="widget w-personal-info item-block">
								<li>
									<span class="title">About Me:</span>
									<span class="text">{{ $result->description }}</span>
								</li>
								<!-- <li>
									<span class="title">Favourite TV Shows:</span>
									<span class="text">Breaking Good, RedDevil, People of Interest, The Running Dead, Found,  American Guy.</span>
								</li>
								<li>
									<span class="title">Favourite Music Bands / Artists:</span>
									<span class="text">Iron Maid, DC/AC, Megablow, The Ill, Kung Fighters, System of a Revenge.</span>
								</li> -->
							</ul>
							
							<!-- .. end W-Personal-Info -->
							<!-- W-Socials -->
							
							<div class="widget w-socials">
								<h6 class="title">Other Social Networks:</h6>
								<a href="www.facebook.com" class="social-item bg-facebook">
									<svg width="16" height="16"><use xlink:href="#olymp-facebook-icon"></use></svg>
									Facebook
								</a>
								<a href="#" class="social-item bg-twitter">
									<svg width="16" height="16"><use xlink:href="#olymp-twitter-icon"></use></svg>
									Twitter
								</a>
								<a href="#" class="social-item bg-dribbble">
									<svg width="16" height="16"><use xlink:href="#olymp-dribble-icon"></use></svg>
									Dribbble
								</a>
							</div>
							
							
							<!-- ... end W-Socials -->
						</div>
						@endforeach
						@endif
					</div>

					<div class="ui-block">
						<div class="ui-block-title">
							<h6 class="title">Friend Suggestions</h6>
							<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
						</div>
						
						<!-- W-Action -->
						
						<ul class="widget w-friend-pages-added notification-list friend-requests">
							@foreach($friends as $value)

							<li class="inline-items">
								<div class="author-thumb">
									<img loading="lazy" src="{{ url('public/assets/dashboard/img/avatar38-sm.webp') }}" alt="author" width="36" height="36">
								</div>
								<div class="notification-event">
									<a href="{{ route('user-profile',$value->id) }}" class="h6 notification-friend">{{ $value->name }}</a>
									<!-- <span class="chat-message-item">8 Friends in Common</span> -->
								</div>
								<span class="notification-icon">
									<a href="#" class="accept-request">
										<span class="icon-add without-text">
											<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
										</span>
									</a>
								</span>
							</li>
							
							@endforeach
						
						</ul>
						
						<!-- ... end W-Action -->
					</div>

				</div>
			</div>
		</div>

		<!-- ... end Left Sidebar -->


		<!-- Right Sidebar -->

		<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
			<div class="crumina-sticky-sidebar">
				<div class="sidebar__inner">
					<div class="ui-block">
						<div class="ui-block-title">
							<h6 class="title">Last Photos</h6>
						</div>
						<div class="ui-block-content">

							<!-- W-Latest-Photo -->
							
							<ul class="widget w-last-photo js-zoom-gallery">
								
								@if($profilePosts->count() > 0)
								@foreach($profilePosts as $profilePost)
								@if($profilePost->NewsfeedGallaries->count() > 0)

								<li>
									<a href="{{ url('public/images/newsfeed',$profilePost->NewsfeedGallaries[0]->image) }}">
										<img loading="lazy" src="{{ url('public/images/newsfeed',$profilePost->NewsfeedGallaries[0]->image) }}" alt="photo" width="600" height="600">
									</a>
								</li>
								@endif
								@endforeach
								@endif
								<!-- <li>
									<a href="{{ url('public/assets/dashboard/img/last-phot11-large.webp') }}">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/last-phot11-large.webp') }}" alt="photo" width="600" height="600">
									</a>
								</li>
								<li>
									<a href="{{ url('public/assets/dashboard/img/last-phot12-large.webp') }}">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/last-phot12-large.webp') }}" alt="photo" width="600" height="600">
									</a>
								</li>
								<li>
									<a href="{{ url('public/assets/dashboard/img/last-phot13-large.webp') }}">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/last-phot13-large.webp') }}" alt="photo" width="600" height="600">
									</a>
								</li>
								<li>
									<a href="{{ url('public/assets/dashboard/img/last-phot14-large.webp') }}">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/last-phot14-large.webp') }}" alt="photo" width="600" height="600">
									</a>
								</li>
								<li>
									<a href="{{ url('public/assets/dashboard/img/last-phot15-large.webp') }}">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/last-phot15-large.webp') }}" alt="photo" width="600" height="600">
									</a>
								</li>
								<li>
									<a href="{{ url('public/assets/dashboard/img/last-phot16-large.webp') }}">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/last-phot16-large.webp') }}" alt="photo" width="600" height="600">
									</a>
								</li>
								<li>
									<a href="{{ url('public/assets/dashboard/img/last-phot17-large.webp') }}">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/last-phot17-large.webp') }}" alt="photo" width="600" height="600">
									</a>
								</li>
								<li>
									<a href="{{ url('public/assets/dashboard/img/last-phot18-large.webp') }}">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/last-phot18-large.webp') }}" alt="photo" width="600" height="600">
									</a>
								</li> -->
							</ul>
							
							
							<!-- .. end W-Latest-Photo -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- ... end Right Sidebar -->

	</div>
</div>

@endsection
@section('page-js-link') @endsection

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
	        beforeSend: function() {
	        },
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
	        beforeSend: function() {
	        },
	        success: function(data) {
	        	toastr.success(data.text);
	            if (data.status) {
	               // location.reload();
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
	    $.ajax({
	        url: route,
	        method: "GET",
	        data: {
	            "_token": "{{ csrf_token() }}",
	        },
	        beforeSend: function() {
	        },
	        success: function(data) {
	        	toastr.success(data.text);
	            if (data.status) {
	               // location.reload();
	            }
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
	        beforeSend: function() {
	        },
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
	        beforeSend: function() {
	        },
	        success: function(data) {
	        	toastr.success(data.text);
	            if (data.status) {
	               // location.reload();
	            }
	        }
	    })
	});

</script>
@endsection