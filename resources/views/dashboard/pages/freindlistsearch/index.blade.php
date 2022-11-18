@extends('dashboard.layouts.master')
@section('title', ' Friend List')
@section('page', ' Friend List & Search')
@section('page-css-link') @endsection
@section('page-css') @endsection
@section('main-content')
<div class="header-spacer"></div>

<!-- Top Header-Profile -->
@include('dashboard.includes.header-profile');
<!-- <div class="container">
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
										<a href="{{ route('friendlist') }}">Friends</a>
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
												<li>
													<a href="#">Report Profile</a>
												</li>
												<li>
													<a href="#">Block Profile</a>
												</li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
						</div>

						<div class="control-block-button">
							<a href="35-YourAccount-FriendsRequests.html" class="btn btn-control bg-blue">
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
					
								<a href="{{ route('profile') }}" class="h4 author-name">{{ ucwords($user->name) }}</a>							
							
							<div class="country">San Francisco, CA</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->

<!-- ... end Top Header-Profile -->

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block responsive-flex">
				<div class="ui-block-title">
						<div class="h6 title">{{ ucwords($user->name) }} ({{$user->Userfriends->count()}})</div>						
					<form class="w-search" method="get" action="">
						<div class="form-group with-button">
							<input class="form-control" type="text" id="keywords" name="keywords" placeholder="Search Friends...">
							<button>
								<svg class="olymp-magnifying-glass-icon"><use xlink:href="#olymp-magnifying-glass-icon"></use></svg>
							</button>
						</div>
					</form>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Friends -->

<div class="container">
	<div class="row">
		@if($results->count() > 0)
	        @foreach ($results as $index => $result)
	        
				<div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">

					<div class="ui-block">
						
						<!-- Friend Item -->
						
						<div class="friend-item">
							<div class="friend-header-thumb">
								<img loading="lazy" src="{{url('public/assets/dashboard/img/friend2.webp') }}" alt="friend" width="318" height="122">
							</div>
						
							<div class="friend-item-content">
						
								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
									<ul class="more-dropdown">
										<!-- <li>
											<a href="#">Report Profile</a>
										</li> -->
										<li>
											<a href="{{ route('block-friend',$result->friend_id)}}">Block</a>
										</li>
										<!-- <li>
											<a href="#">Turn Off Notifications</a>
										</li> -->
									</ul>
								</div>
								<div class="friend-avatar">
									<div class="author-thumb">
										<img loading="lazy" src="img/avatar2.webp" alt="author" width="92" height="92">
									</div>
									<div class="author-content">
										<a href="{{ route('user-profile',$result->friendUser->id) }}" class="h5 author-name">{{ ucwords($result->friendUser->name) }}</a>
										<div class="country">Long Island, NY</div>
									</div>
								</div>
						
								<div class="swiper-container">
									<div class="swiper-wrapper">
										<div class="swiper-slide">
											<div class="friend-count" data-swiper-parallax="-500">
												<a href="#" class="friend-count-item">
													<div class="h6">{{ $result->friendUser->Userfriends->count() }}</div>
													<div class="title">Friends</div>
												</a>
												<a href="#" class="friend-count-item">
													@if(isset($result->userImgCount))
													<div class="h6">{{ $result->userImgCount->count() }}</div>
													@endif
													<div class="title">Photos</div>
												</a>
												<a href="#" class="friend-count-item">
													<div class="h6">16</div>
													<div class="title">Videos</div>
												</a>
											</div>
											<div class="control-block-button" data-swiper-parallax="-100">
												<a href="#" class="btn btn-control bg-blue">
													<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
												</a>
						
												<a href="#" class="btn btn-control bg-purple">
													<svg class="olymp-chat---messages-icon"><use xlink:href="#olymp-chat---messages-icon"></use></svg>
												</a>
						
											</div>
										</div>
						
										<div class="swiper-slide">
											<p class="friend-about" data-swiper-parallax="-500">
												Hi!, I’m Marina and I’m a Community Manager for “Gametube”. Gamer and full-time mother.
											</p>
						
											<div class="friend-since" data-swiper-parallax="-100">
												<span>Friends Since:</span>
												<div class="h6">December 2014</div>
											</div>
										</div>
									</div>
						
									<!-- If we need pagination -->
									<div class="swiper-pagination"></div>
								</div>
							</div>
						</div>
						
						<!-- ... end Friend Item -->			
					</div>
				</div>
		    @endforeach
	    @else
        <h3 class="text-danger">Ooops! no data found.</h3>
	    @endif
	    <!-- Pagination -->
		<nav aria-label="Page navigation">
			@if($results->lastPage() > 1)
			<ul class="pagination justify-content-center">
				<li class="page-item {{ ($results->currentPage() == 1) ? ' disabled' : '' }}">
					<a class="page-link" href="{{ $results->url(1) }}" tabindex="-1">Previous</a>
				</li>
				@for ($i = 1; $i <= $results->lastPage(); $i++)
				<li class="page-item"><a class="page-link" href="{{ $results->url($i) }}">{{ $i }}</a></li>
                @endfor
				<li class="page-item">
					<a class="page-link" href="{{ $results->url($results->lastPage()) }}">Next</a>
				</li>
			</ul>
			@endif
		</nav>
		<!-- ... end Pagination -->
	</div>
</div>

<!-- ... end Friends -->

@endsection
@section('page-js-link') @endsection
@section('page-js') @endsection