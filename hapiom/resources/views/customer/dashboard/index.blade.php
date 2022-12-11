@extends('dashboard.layouts.master')
@section('title', ' Dashboard')
@section('page', ' Dashboard')
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
							<img loading="lazy" src="{{ url('images/profile',Auth::user()->userInfo->profile_image) }}" alt="author" width="124" height="124">
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

		<!-- Main Content -->

		<div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
			<div id="newsfeed-items-grid">

			@if($friendlists->count() > 0)
			  @foreach($friendlists as $friendlist)

			  	@if($friendlist->user_id == Auth::user()->customer_id)
				<div class="ui-block">
					<!-- Post -->

					<article class="hentry post">

						<div class="post__author author vcard inline-items">
							<img loading="lazy" src="{{ url('images/profile',$friendlist->userImageByPost->profile_image) }}" width="36" height="36" alt="author">

							<div class="author-date">
								@if(isset($friendlist->NewsfeedUser->name))
								<a class="h6 post__author-name fn" href="#">{{ $friendlist->NewsfeedUser->name }}</a>
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

						<p>{{ $friendlist->text }}
						</p>

						@if(isset($friendlist->NewsfeedGallaries))
						<div class="post-video">

						@foreach($friendlist->NewsfeedGallaries as $imageValue)
							<img loading="lazy" src="{{ url('images/newsfeed/'.$imageValue->image) }}" alt="photo" width="400" height="194"><br>
						@endforeach
						</div>
						@endif

						<div class="post-additional-info inline-items">

							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon">
									<use xlink:href="#olymp-heart-icon"></use>
								</svg>
								<strong>{{ $friendlist->NewsfeedLike->count() }}</strong>
							</a>

							<ul class="friends-harmonic">
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('assets/dashboard/img/friend-harmonic7.webp') }}" alt="friend" width="28" height="28">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('assets/dashboard/img/friend-harmonic8.webp') }}" alt="friend" width="28" height="28">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('assets/dashboard/img/friend-harmonic9.webp') }}" alt="friend" width="28" height="28">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('assets/dashboard/img/friend-harmonic10.webp') }}" alt="friend" width="28" height="28">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('assets/dashboard/img/friend-harmonic11.webp') }}" alt="friend" width="28" height="28">
									</a>
								</li>
							</ul>

							<div class="names-people-likes">
								<a href="#">Jenny</a>, <a href="#">Robert</a> and
								<br>{{ $friendlist->NewsfeedLike->count() - 1 }} more liked this
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
				@endif
			  @endforeach
			  @endif
			</div>

			<!-- <a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid">
				<svg class="olymp-three-dots-icon">
					<use xlink:href="#olymp-three-dots-icon"></use>
				</svg>
			</a> -->
			<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 align-center pb120 pt120">

				<!-- Pagination -->

				<nav aria-label="Page navigation">
					@if ($friendlists->lastPage() > 1)
					<ul class="pagination justify-content-center">
						<li class="page-item disabled {{ ($friendlists->currentPage() == 1) ? ' disabled' : '' }}">
							<a class="page-link" href="{{ $friendlists->url(1) }}" tabindex="-1">Previous</a>
						</li>
						@for ($i = 1; $i <= $friendlists->lastPage(); $i++)
						<li class="page-item {{ ($friendlists->currentPage() == $i) ? ' active' : '' }}"><a class="page-link" href="{{ $friendlists->url($i) }}">{{ $i }}<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: -10.3833px; top: -16.8333px; background-color: rgb(255, 255, 255); transform: scale(16.7857);"></div></div></a></li>
						@endfor
						<li class="page-item {{ ($friendlists->currentPage() == $friendlists->lastPage()) ? ' disabled' : '' }}">
							<a class="page-link" href="{{ $friendlists->url($friendlists->lastPage()) }}">Next</a>
						</li>
					</ul>
					@endif
				</nav>

				<!-- ... end Pagination -->

			</div>
		</div>

		<!-- ... end Main Content -->


		<!-- Left Sidebar -->

		<div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">

			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Profile Intro</h6>
				</div>
				<div class="ui-block-content">

					<!-- W-Personal-Info -->

					<ul class="widget w-personal-info item-block">
						<li>
							<span class="title">About Me:</span>
							@if(!empty($userinfo->description))
							<span class="text">{{ $userinfo->description }}</span>
							@endif
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
						<a href="#" class="social-item bg-facebook">
							<svg width="16" height="16">
								<use xlink:href="#olymp-facebook-icon"></use>
							</svg>
							Facebook
						</a>
						<a href="#" class="social-item bg-twitter">
							<svg width="16" height="16">
								<use xlink:href="#olymp-twitter-icon"></use>
							</svg>
							Twitter
						</a>
						<a href="#" class="social-item bg-dribbble">
							<svg width="16" height="16">
								<use xlink:href="#olymp-dribble-icon"></use>
							</svg>
							Dribbble
						</a>
					</div>


					<!-- ... end W-Socials -->
				</div>
			</div>

		</div>

		<!-- ... end Left Sidebar -->


		<!-- Right Sidebar -->

		<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">

			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Polls</h6>
				</div>
				@if(!empty(Auth::user()->customer_id))
				@foreach($getPolls as $pollsresult)
				<div class="ui-block-content">

				  <form method="post" action="{{ route('polls-result') }}">
				  @csrf

					<ul class="widget w-pool">
						<li>
							<p>{{ $pollsresult->question }}</p>
						</li>
						<li>
							<div class="skills-item">
								<div class="skills-item-info">
									<span class="skills-item-title">
										<span class="radio">
											<label>
												<input type="hidden" name="polls_id" value="{{ $pollsresult->id }}">
												<input type="radio" name="polls_select" value="1" checked>
												{{ $pollsresult->option_a }}
											</label>
										</span>
									</span>
									<span class="skills-item-count">
										<span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="62" data-from="0"></span>
										<span class="units">{{ round($pollsresult->pollCountPer($pollsresult->id,1), 2) }}%</span>
									</span>
								</div>
								<div class="skills-item-meter">
									<span class="skills-item-meter-active bg-primary" style="width: {{ $pollsresult->pollCountPer($pollsresult->id,1) }}%"></span>
								</div>

								<div class="counter-friends">12 friends voted for this</div>

								<!-- <ul class="friends-harmonic">
									<li>
										<a href="#">
											<img loading="lazy" src="img/friend-harmonic1.webp" alt="friend" width="28" height="28">
										</a>
									</li>
									<li>
										<a href="#">
											<img loading="lazy" src="img/friend-harmonic2.webp" alt="friend" width="28" height="28">
										</a>
									</li>
									<li>
										<a href="#">
											<img loading="lazy" src="img/friend-harmonic3.webp" alt="friend" width="28" height="28">
										</a>
									</li>
									<li>
										<a href="#">
											<img loading="lazy" src="img/friend-harmonic4.webp" alt="friend" width="28" height="28">
										</a>
									</li>
									<li>
										<a href="#">
											<img loading="lazy" src="img/friend-harmonic5.webp" alt="friend" width="28" height="28">
										</a>
									</li>
									<li>
										<a href="#">
											<img loading="lazy" src="img/friend-harmonic6.webp" alt="friend" width="28" height="28">
										</a>
									</li>
									<li>
										<a href="#">
											<img loading="lazy" src="img/friend-harmonic7.webp" alt="friend" width="28" height="28">
										</a>
									</li>
									<li>
										<a href="#">
											<img loading="lazy" src="img/friend-harmonic8.webp" alt="friend" width="28" height="28">
										</a>
									</li>
									<li>
										<a href="#">
											<img loading="lazy" src="img/friend-harmonic9.webp" alt="friend" width="28" height="28">
										</a>
									</li>
									<li>
										<a href="#" class="all-users">+3</a>
									</li>
								</ul> -->
							</div>
						</li>

						<li>
							<div class="skills-item">
								<div class="skills-item-info">
									<span class="skills-item-title">
										<span class="radio">
											<label>
												<input type="radio" name="polls_select" value="2" checked>
												{{ $pollsresult->option_b }}
											</label>
										</span>
									</span>
									<span class="skills-item-count">
										<span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="27" data-from="0"></span>
										<span class="units">{{ round($pollsresult->pollCountPer($pollsresult->id,2), 2) }}%</span>
									</span>
								</div>
								<div class="skills-item-meter">
									<span class="skills-item-meter-active bg-primary" style="width: {{ $pollsresult->pollCountPer($pollsresult->id,2) }}%"></span>
								</div>
								<div class="counter-friends">7 friends voted for this</div>

								<!-- <ul class="friends-harmonic">
									<li>
										<a href="#">
											<img loading="lazy" src="img/friend-harmonic7.webp" alt="friend" width="28" height="28">
										</a>
									</li>
									<li>
										<a href="#">
											<img loading="lazy" src="img/friend-harmonic8.webp" alt="friend" width="28" height="28">
										</a>
									</li>
									<li>
										<a href="#">
											<img loading="lazy" src="img/friend-harmonic9.webp" alt="friend" width="28" height="28">
										</a>
									</li>
									<li>
										<a href="#">
											<img loading="lazy" src="img/friend-harmonic10.webp" alt="friend" width="28" height="28">
										</a>
									</li>
									<li>
										<a href="#">
											<img loading="lazy" src="img/friend-harmonic11.webp" alt="friend" width="28" height="28">
										</a>
									</li>
									<li>
										<a href="#">
											<img loading="lazy" src="img/friend-harmonic12.webp" alt="friend" width="28" height="28">
										</a>
									</li>
									<li>
										<a href="#">
											<img loading="lazy" src="img/friend-harmonic13.webp" alt="friend" width="28" height="28">
										</a>
									</li>
								</ul> -->
							</div>
						</li>

						<li>
							<div class="skills-item">
								<div class="skills-item-info">
									<span class="skills-item-title">
										<span class="radio">
											<label>
												<input type="radio" name="polls_select" value="3" checked>
												{{ $pollsresult->option_c }}
											</label>
										</span>
									</span>
									<span class="skills-item-count">
										<span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="11" data-from="0"></span>
										<span class="units">{{ round($pollsresult->pollCountPer($pollsresult->id,3), 2) }}%</span>
									</span>
								</div>
								<div class="skills-item-meter">
									<span class="skills-item-meter-active bg-primary" style="width: {{ $pollsresult->pollCountPer($pollsresult->id,3) }}%"></span>
								</div>

								<div class="counter-friends">2 people voted for this</div>

								<!-- <ul class="friends-harmonic">
									<li>
										<a href="#">
											<img loading="lazy" src="img/friend-harmonic14.webp" alt="friend" width="28" height="28">
										</a>
									</li>
									<li>
										<a href="#">
											<img loading="lazy" src="img/friend-harmonic15.webp" alt="friend" width="28" height="28">
										</a>
									</li>
								</ul> -->
							</div>
						</li>

						<li>
							<div class="skills-item">
								<div class="skills-item-info">
									<span class="skills-item-title">
										<span class="radio">
											<label>
												<input type="radio" name="polls_select" value="4" checked>
												{{ $pollsresult->option_d }}
											</label>
										</span>
									</span>
									<span class="skills-item-count">
										<span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="11" data-from="0"></span>
										<span class="units">{{ round($pollsresult->pollCountPer($pollsresult->id,4), 2) }}%</span>
									</span>
								</div>
								<div class="skills-item-meter">
									<span class="skills-item-meter-active bg-primary" style="width: {{ $pollsresult->pollCountPer($pollsresult->id,4) }}%"></span>
								</div>

								<div class="counter-friends">2 people voted for this</div>

								<!-- <ul class="friends-harmonic">
									<li>
										<a href="#">
											<img loading="lazy" src="img/friend-harmonic14.webp" alt="friend" width="28" height="28">
										</a>
									</li>
									<li>
										<a href="#">
											<img loading="lazy" src="img/friend-harmonic15.webp" alt="friend" width="28" height="28">
										</a>
									</li>
								</ul> -->
							</div>
						</li>
					</ul>

					<!-- .. end W-Pool -->
					<button type="submit" name="submit" class="btn btn-md-2 btn-border-think custom-color c-grey full-width">Vote Now!</button>
				  </form>
				</div>
				@endforeach
				@endif
			</div>

		</div>

		<!-- ... end Right Sidebar -->

	</div>
</div>
@endsection
@section('page-js-link') @endsection
@section('page-js') @endsection