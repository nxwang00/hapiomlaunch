@extends('dashboard.layouts.master')
@section('title', ' About')
@section('page', ' About')
@section('page-css-link') @endsection
@section('page-css') @endsection
@section('main-content')
<!-- Top Header-Profile -->
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
											<svg class="olymp-three-dots-icon">
												<use xlink:href="#olymp-three-dots-icon"></use>
											</svg>
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
								<svg class="olymp-happy-face-icon">
									<use xlink:href="#olymp-happy-face-icon"></use>
								</svg>
							</a>

							<a href="#" class="btn btn-control bg-purple">
								<svg class="olymp-chat---messages-icon">
									<use xlink:href="#olymp-chat---messages-icon"></use>
								</svg>
							</a>

							<div class="btn btn-control bg-primary more">
								<svg class="olymp-settings-icon">
									<use xlink:href="#olymp-settings-icon"></use>
								</svg>

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
							<img loading="lazy" src="{{ url('images/profile/',Auth::user()->userInfo->profile_image) }}" alt="author" width="124" height="124">
							@else
							<img loading="lazy" src="{{ url('assets/dashboard/img/noimage.jpg') }}" alt="author" width="124" height="124">

							@endif
						</a>
						<div class="author-content">
							<a href="{{ route('profile') }}" class="h4 author-name">{{ ucwords(Auth::user()->name) }}</a>
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
		<div class="col col-xl-8 order-xl-2 col-lg-8 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Hobbies and Interests</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
				</div>
				<div class="ui-block-content">
					<div class="row">
						<div class="col col-lg-6 col-md-6 col-sm-12 col-12 mb-3 mb-md-0">


							<!-- W-Personal-Info -->

							<ul class="widget w-personal-info item-block">
								<li>
									<span class="title">Hobbies:</span>
									<span class="text">@if(isset($user_info->description)){{ $user_info->description }}@endif</span>
								</li>
								<li>
									<span class="title">Favourite TV Shows:</span>
									<span class="text">@if(isset($user_info->birth_place)){{ $user_info->birth_place }}@endif</span>
								</li>
								<li>
									<span class="title">Favourite Movies:</span>
									<span class="text">@if(isset($user_info->occupation)){{ $user_info->occupation }}@endif</span>
								</li>
								<li>
									<span class="title">Favourite Games:</span>
									<span class="text">@if(isset($user_info->phone_number)){{ $user_info->phone_number }}@endif</span>
								</li>
							</ul>

							<!-- ... end W-Personal-Info -->
						</div>
						<div class="col col-lg-6 col-md-6 col-sm-12 col-12">


							<!-- W-Personal-Info -->

							<ul class="widget w-personal-info item-block">
								<li>
									<span class="title">Favourite Music Bands / Artists:</span>
									<span class="text">@if(isset($user_info->description)){{ $user_info->description }}@endif</span>
								</li>
								<li>
									<span class="title">Favourite Books:</span>
									<span class="text">@if(isset($user_info->state)){{ $user_info->state }}@endif</span>
								</li>
								<li>
									<span class="title">Favourite Writers:</span>
									<span class="text">@if(isset($user_info->country)){{ $user_info->country }}@endif</span>
								</li>
								<li>
									<span class="title">Other Interests:</span>
									<span class="text">@if(isset($user_info->dob)){{ $user_info->dob }}@endif</span>
								</li>
							</ul>

							<!-- ... end W-Personal-Info -->
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Education and Employement</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
				</div>
				<div class="ui-block-content">
					<div class="row">
						<div class="col col-lg-6 col-md-6 col-sm-12 col-12"> -->

							<!-- W-Personal-Info -->

							<!-- <ul class="widget w-personal-info item-block">
								<li>
									<span class="title">The New College of Design</span>
									<span class="date">2001 - 2006</span>
									<span class="text">Breaking Good, RedDevil, People of Interest, The Running Dead, Found,  American Guy.</span>
								</li>
								<li>
									<span class="title">Rembrandt Institute</span>
									<span class="date">2008</span>
									<span class="text">Five months Digital Illustration course. Professor: Leonardo Stagg.</span>
								</li>
								<li>
									<span class="title">The Digital College </span>
									<span class="date">2010</span>
									<span class="text">6 months intensive Motion Graphics course. After Effects and Premire. Professor: Donatello Urtle. </span>
								</li>
							</ul> -->

							<!-- ... end W-Personal-Info -->

						<!-- </div>
						<div class="col col-lg-6 col-md-6 col-sm-12 col-12"> -->

							<!-- W-Personal-Info -->

							<!-- <ul class="widget w-personal-info item-block">
								<li>
									<span class="title">Digital Design Intern</span>
									<span class="date">2006-2008</span>
									<span class="text">Digital Design Intern for the “Multimedz” agency. Was in charge of the communication with the clients.</span>
								</li>
								<li>
									<span class="title">UI/UX Designer</span>
									<span class="date">2008-2013</span>
									<span class="text">UI/UX Designer for the “Daydreams” agency. </span>
								</li>
								<li>
									<span class="title">Senior UI/UX Designer</span>
									<span class="date">2013-Now</span>
									<span class="text">Senior UI/UX Designer for the “Daydreams” agency. I’m in charge of a ten person group, overseeing all the proyects and talking to potential clients.</span>
								</li>
							</ul> -->

							<!-- ... end W-Personal-Info -->
						<!-- </div>
					</div>
				</div>
			</div> -->
		</div>

		<div class="col col-xl-4 order-xl-1 col-lg-4 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Personal Info</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
				</div>
				<div class="ui-block-content">

					<!-- W-Personal-Info -->

					<ul class="widget w-personal-info">
						<li>
							<span class="title">About Me:</span>
							<span class="text">@if(isset($user_info->description)){{ $user_info->description }}@endif</span>
						</li>
						<li>
							<span class="title">Birthday:</span>
							<span class="text">@if(isset($user_info->dob)){{date("F", strtotime($user_info->dob))}} {{date("j", strtotime($user_info->dob))}}th, {{date("Y", strtotime($user_info->dob))}}@endif</span>
						</li>
						<li>
							<span class="title">Birthplace:</span>
							<span class="text">@if(isset($user_info->birth_place)){{ $user_info->birth_place }}, {{ $user_info->state }}, {{ $user_info->country }}@endif</span>
						</li>
						<li>
							<span class="title">Lives in:</span>
							<span class="text">@if(isset($user_info->country)){{ $user_info->city }}, {{ $user_info->state }}, {{ $user_info->country }}@endif</span>
						</li>
						<li>
							<span class="title">Occupation:</span>
							<span class="text">@if(isset($user_info->occupation)){{ $user_info->occupation }}@endif</span>
						</li>
						<li>
							<span class="title">Joined:</span>
							<span class="text">@if(isset($user_info->created_at)){{date("F", strtotime($user_info->created_at))}} {{date("j", strtotime($user_info->created_at))}}th, {{date("Y", strtotime($user_info->created_at))}}@endif</span>
						</li>
						<li>
							<span class="title">Gender:</span>
							@if(isset($user_info->gender))
								@if($user_info->gender == 1)
								<span class="text">Male</span>
								@else
								<span class="text">Female</span>
								@endif
							@endif
						</li>
						<li>
							<span class="title">Status:</span>
							@if(isset($user_info->marriage_status))
								@if($user_info->marriage_status == 1)
								<span class="text">Married</span>
								@else
								<span class="text">Not Married</span>
								@endif
							@endif
						</li>
						<li>
							<span class="title">Email:</span>
							<a href="#" class="text">@if(isset($user_info->email)){{$user_info->userInfo->email}}@endif</a>
						</li>
						<li>
							<span class="title">Website:</span>
							<a href="#" class="text">@if(isset($user_info->website)){{ $user_info->website }}@endif</a>
						</li>
						<li>
							<span class="title">Phone Number:</span>
							<span class="text">(+91) @if(isset($user_info->phone_number)){{ $user_info->phone_number }}@endif</span>
						</li>
					</ul>

					<!-- ... end W-Personal-Info -->
					<!-- W-Socials -->

					<div class="widget w-socials">
						<h6 class="title">Other Social Networks:</h6>
						@if(isset($user_info->facebook_url))
						<a href="{{ $user_info->facebook_url }}" class="social-item bg-facebook">
							<svg width="16" height="16"><use xlink:href="#olymp-facebook-icon"></use></svg>
							Facebook
						</a>
						@endif
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
			</div>
		</div>
	</div>
</div>
@endsection
@section('page-js-link') @endsection
@section('page-js') @endsection