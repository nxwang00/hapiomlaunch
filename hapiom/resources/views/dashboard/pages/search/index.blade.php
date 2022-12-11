@extends('dashboard.layouts.master')
@section('title', ' Search')
@section('page', ' Search')
@section('page-css-link') @endsection
@section('page-css') @endsection
@section('main-content')
<!-- Top Header-Profile -->

<div class="container">
	<div class="row">

		<!-- Main Content -->

		<div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<div class="h6 title">Showing 12 Results for: “<span class="c-primary">Mari</span>”</div>
				</div>
			</div>

			<div id="search-items-grid">

				<div class="ui-block">

					<!-- Search Result -->
					
					<article class="hentry post searches-item">
					
						<div class="post__author author vcard inline-items">
							<img loading="lazy" src="img/avatar7-sm.webp" alt="author" width="42" height="42">
					
							<div class="author-date">
								<a class="h6 post__author-name fn" href="02-ProfilePage.html">Marina Valentine</a>
								<div class="country">Long Island, NY</div>
							</div>
					
							<span class="notification-icon">
								<a href="#" class="accept-request">
									<span class="icon-add without-text">
										<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
									</span>
								</a>
					
								<a href="#" class="accept-request chat-message">
									<svg class="olymp-chat---messages-icon"><use xlink:href="#olymp-chat---messages-icon"></use></svg>
								</a>
							</span>
					
							<div class="more">
								<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
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
					
						<p class="user-description">
							<span class="title">About Me:</span> Hi!, I’m Marina and I’m a Community Manager for “Gametube”. Gamer and full-time mother.
							<span class="title">Favourite TV Shows:</span> Breaking Good, RedDevil, People of Interest, The...
						</p>
					
						<div class="post-block-photo js-zoom-gallery">
							<a href="img/post-photo3.webp" class="col col-3-width"><img loading="lazy" src="img/post-photo3.webp" alt="photo" width="600" height="600"></a>
							<a href="img/post-photo4.webp" class="col col-3-width"><img loading="lazy" src="img/post-photo4.webp" alt="photo" width="600" height="600"></a>
							<a href="img/post-photo5.webp" class="more-photos col col-3-width">
								<img loading="lazy" src="img/post-photo5.webp" alt="photo" width="600" height="600">
								<span class="h2">+352</span>
							</a>
						</div>
					
						<div class="post-additional-info">
					
							<ul class="friends-harmonic">
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
										<img loading="lazy" src="img/friend-harmonic11.webp" alt="friend" width="28" height="28">
									</a>
								</li>
							</ul>
							<div class="names-people-likes">
								You and Marina have
								<a href="#">4 Friends in Common</a>
							</div>
					
							<div class="friend-count">
								<a href="#" class="friend-count-item">
									<div class="h6">189</div>
									<div class="title">Friends</div>
								</a>
								<a href="#" class="friend-count-item">
									<div class="h6">254</div>
									<div class="title">Photos</div>
								</a>
								<a href="#" class="friend-count-item">
									<div class="h6">16</div>
									<div class="title">Videos</div>
								</a>
							</div>
					
						</div>
					
					</article>
					<!-- ... end Search Result -->
				</div>

				<div class="ui-block">

					<!-- Search Result -->
					
					<article class="hentry post searches-item">
					
						<div class="post__author author vcard inline-items">
							<img loading="lazy" src="img/avatar75-sm.webp" alt="author" width="28" height="28">
					
							<div class="author-date">
								<a class="h6 post__author-name fn" href="02-ProfilePage.html">Dave Marinara</a>
								<div class="country">San Francisco, CA</div>
							</div>
					
							<span class="notification-icon">
								<a href="#" class="accept-request">
									<span class="icon-add without-text">
										<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
									</span>
								</a>
					
								<a href="#" class="accept-request chat-message">
									<svg class="olymp-chat---messages-icon"><use xlink:href="#olymp-chat---messages-icon"></use></svg>
								</a>
							</span>
					
							<div class="more">
								<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
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
					
						<p class="user-description">
							<span class="title">About Me:</span> I’m a photographer that travels around the world to find all the best vacation spots!
							<span class="title">Favourite Music Bands / Artists:</span> Iron Maid, DC/AC, Megablow, The Ill, Kung...
						</p>
					
						<div class="post-block-photo js-zoom-gallery">
							<a href="img/post-photo1.webp" class="col col-3-width"><img loading="lazy" src="img/post-photo1.webp" alt="photo" width="600" height="600"></a>
							<a href="img/post-photo2.webp" class="col col-3-width"><img loading="lazy" src="img/post-photo2.webp" alt="photo" width="600" height="600"></a>
							<a href="img/post-photo7.webp" class="more-photos col col-3-width">
								<img loading="lazy" src="img/post-photo7.webp" alt="photo" width="600" height="600">
								<span class="h2">+2.6K</span>
							</a>
						</div>
					
						<div class="post-additional-info">
					
							<ul class="friends-harmonic">
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
										<img loading="lazy" src="img/friend-harmonic11.webp" alt="friend" width="28" height="28">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="img/friend-harmonic10.webp" alt="friend" width="28" height="28">
									</a>
								</li>
								<li>
									<a href="#" class="all-users">+13</a>
								</li>
							</ul>
							<div class="names-people-likes">
								You and Dave have
								<a href="#">8 Friends in Common</a>
							</div>
					
							<div class="friend-count">
								<a href="#" class="friend-count-item">
									<div class="h6">120</div>
									<div class="title">Friends</div>
								</a>
								<a href="#" class="friend-count-item">
									<div class="h6">4.3K</div>
									<div class="title">Photos</div>
								</a>
								<a href="#" class="friend-count-item">
									<div class="h6">8</div>
									<div class="title">Videos</div>
								</a>
							</div>
					
						</div>
					
					</article>
					<!-- ... end Search Result -->
				</div>

				<div class="ui-block">

					<!-- Search Result -->
					
					<article class="hentry post searches-item">
					
						<div class="post__author author vcard inline-items">
							<img loading="lazy" src="img/avatar41-sm.webp" alt="author" width="36" height="36">
					
							<div class="author-date">
								<a class="h6 post__author-name fn" href="02-ProfilePage.html">The Marina Bar</a>
								<div class="country">Restaurant / Bar</div>
							</div>
					
							<span class="notification-icon">
								<a href="#" class="accept-request fav-pages">
									<span class="icon-add without-text">
										<svg class="olymp-star-icon"><use xlink:href="#olymp-star-icon"></use></svg>
									</span>
								</a>
					
								<a href="#" class="accept-request chat-message">
									<svg class="olymp-chat---messages-icon"><use xlink:href="#olymp-chat---messages-icon"></use></svg>
								</a>
							</span>
					
							<div class="more">
								<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
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
					
						<p class="user-description">
							<span class="title">Page Intro:</span> We’re a little resto bar that specializes in Seafood. All Saturdays we have Karaoke Night!
							<span class="title">Based in:</span> Miami, Florida
							<span class="title">Contact:</span> reservations@marinarestobar.com
						</p>
					
						<div class="post-block-photo js-zoom-gallery">
							<a href="img/post-photo4.webp" class="col col-3-width"><img loading="lazy" src="img/post-photo4.webp" alt="photo" width="600" height="600"></a>
							<a href="img/post-photo7.webp" class="col col-3-width"><img loading="lazy" src="img/post-photo7.webp" alt="photo" width="600" height="600"></a>
							<a href="img/post-photo2.webp" class="more-photos col col-3-width">
								<img loading="lazy" src="img/post-photo2.webp" alt="photo" width="600" height="600">
								<span class="h2">+988</span>
							</a>
						</div>
					
						<div class="post-additional-info">
					
							<ul class="friends-harmonic">
								<li>
									<a href="#">
										<img loading="lazy" src="img/friend-harmonic11.webp" alt="friend" width="28" height="28">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="img/friend-harmonic10.webp" alt="friend" width="28" height="28">
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
									<a href="#" class="all-users">+33</a>
								</li>
							</ul>
							<div class="names-people-likes">
								<a href="#">14 Friends</a>
								Added this Page to Favs
							</div>
					
							<div class="friend-count">
								<a href="#" class="friend-count-item">
									<div class="h6">599</div>
									<div class="title">Fav +</div>
								</a>
								<a href="#" class="friend-count-item">
									<div class="h6">2.8K</div>
									<div class="title">Posts</div>
								</a>
								<a href="#" class="friend-count-item">
									<div class="h6">35</div>
									<div class="title">Videos</div>
								</a>
							</div>
					
						</div>
					
					</article>
					<!-- ... end Search Result -->
				</div>

			</div>

			<a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="search-items-to-load.html" data-container="search-items-grid">
				<svg class="olymp-three-dots-icon">
					<use xlink:href="#olymp-three-dots-icon"></use>
				</svg>
			</a>
		</div>

		<!-- ... end Main Content -->


		<!-- Left Sidebar -->

		<div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
			<div class="ui-block">

				<!-- W-Build-Fav -->
				
				<div class="widget w-build-fav">
				
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
				
					<div class="widget-thumb">
						<img loading="lazy" src="img/build-fav.webp" alt="notebook" width="197" height="137">
					</div>
				
					<div class="content">
						<span>Increase your Audience</span>
						<a href="#" class="h4 title">Build Your Fav Page in Seconds!</a>
						<p><a href="#" class="bold">Click here</a> to start now and get your own fav page up and running! </p>
					</div>
				</div>
				
				<!-- ... end W-Build-Fav -->
				

			</div>

			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Pages You May Like</h6>
				</div>

				<!-- W-Friend-Pages-Added -->
				
				<ul class="widget w-friend-pages-added notification-list friend-requests">
					<li class="inline-items">
						<div class="author-thumb">
							<img loading="lazy" src="img/avatar41-sm.webp" alt="author" width="36" height="36">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">The Marina Bar</a>
							<span class="chat-message-item">Restaurant / Bar</span>
						</div>
						<span class="notification-icon" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="ADD TO YOUR FAVS">
							<a href="#">
								<svg class="olymp-star-icon"><use xlink:href="#olymp-star-icon"></use></svg>
							</a>
						</span>
				
					</li>
				
					<li class="inline-items">
						<div class="author-thumb">
							<img loading="lazy" src="img/avatar42-sm.webp" alt="author" width="36" height="36">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Tapronus Rock</a>
							<span class="chat-message-item">Rock Band</span>
						</div>
						<span class="notification-icon" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="ADD TO YOUR FAVS">
							<a href="#">
								<svg class="olymp-star-icon"><use xlink:href="#olymp-star-icon"></use></svg>
							</a>
						</span>
				
					</li>
				
					<li class="inline-items">
						<div class="author-thumb">
							<img loading="lazy" src="img/avatar43-sm.webp" alt="author" width="36" height="36">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Pixel Digital Design</a>
							<span class="chat-message-item">Company</span>
						</div>
						<span class="notification-icon" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="ADD TO YOUR FAVS">
							<a href="#">
								<svg class="olymp-star-icon"><use xlink:href="#olymp-star-icon"></use></svg>
							</a>
						</span>
					</li>
				
					<li class="inline-items">
						<div class="author-thumb">
							<img loading="lazy" src="img/avatar44-sm.webp" alt="author" width="36" height="36">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Thompson’s Custom Clothing Boutique</a>
							<span class="chat-message-item">Clothing Store</span>
						</div>
						<span class="notification-icon" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="ADD TO YOUR FAVS">
							<a href="#">
								<svg class="olymp-star-icon"><use xlink:href="#olymp-star-icon"></use></svg>
							</a>
						</span>
				
					</li>
				
					<li class="inline-items">
						<div class="author-thumb">
							<img loading="lazy" src="img/avatar45-sm.webp" alt="author" width="36" height="36">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Crimson Agency</a>
							<span class="chat-message-item">Company</span>
						</div>
						<span class="notification-icon" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="ADD TO YOUR FAVS">
							<a href="#">
								<svg class="olymp-star-icon"><use xlink:href="#olymp-star-icon"></use></svg>
							</a>
						</span>
					</li>
				
					<li class="inline-items">
						<div class="author-thumb">
							<img loading="lazy" src="img/avatar46-sm.webp" alt="author" width="38" height="38">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Mannequin Angel</a>
							<span class="chat-message-item">Clothing Store</span>
						</div>
						<span class="notification-icon" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="ADD TO YOUR FAVS">
							<a href="#">
								<svg class="olymp-star-icon"><use xlink:href="#olymp-star-icon"></use></svg>
							</a>
						</span>
					</li>
				</ul>
				
				<!-- .. end W-Friend-Pages-Added -->
			</div>


		</div>

		<!-- ... end Left Sidebar -->


		<!-- Right Sidebar -->

		<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">

			<div class="ui-block">

				
				<!-- W-Action -->
				
				<div class="widget w-action">
				
					<img loading="lazy" src="img/logo.webp" alt="Hapiom" width="34" height="34">
					<div class="content">
						<h4 class="title">Hapiom</h4>
						<span>THE BEST SOCIAL NETWORK THEME IS HERE!</span>
						<a href="01-LandingPage.html" class="btn btn-bg-secondary btn-md">Register Now!</a>
					</div>
				</div>
				
				<!-- ... end W-Action -->
			</div>
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Friend Suggestions</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
				</div>

				
				
				<!-- W-Action -->
				
				<ul class="widget w-friend-pages-added notification-list friend-requests">
					<li class="inline-items">
						<div class="author-thumb">
							<img loading="lazy" src="img/avatar38-sm.webp" alt="author" width="36" height="36">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Francine Smith</a>
							<span class="chat-message-item">8 Friends in Common</span>
						</div>
						<span class="notification-icon">
							<a href="#" class="accept-request">
								<span class="icon-add without-text">
									<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
								</span>
							</a>
						</span>
					</li>
				
					<li class="inline-items">
						<div class="author-thumb">
							<img loading="lazy" src="img/avatar39-sm.webp" alt="author" width="36" height="36">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Hugh Wilson</a>
							<span class="chat-message-item">6 Friends in Common</span>
						</div>
						<span class="notification-icon">
							<a href="#" class="accept-request">
								<span class="icon-add without-text">
									<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
								</span>
							</a>
						</span>
					</li>
				
					<li class="inline-items">
						<div class="author-thumb">
							<img loading="lazy" src="img/avatar40-sm.webp" alt="author" width="36" height="36">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Karen Masters</a>
							<span class="chat-message-item">6 Friends in Common</span>
						</div>
						<span class="notification-icon">
							<a href="#" class="accept-request">
								<span class="icon-add without-text">
									<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
								</span>
							</a>
						</span>
					</li>
				
				</ul>
				
				<!-- ... end W-Action -->
			</div>
		</div>

		<!-- ... end Right Sidebar -->

	</div>
</div>

@endsection
@section('page-js-link') @endsection
@section('page-js') @endsection