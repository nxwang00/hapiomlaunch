<!DOCTYPE html>
<html lang="en">
<head>

	<title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" class="logo" href="{{ url('public/assets/dashboard/img/logo.webp') }}" style="background-color:#ff5e3a; color: #ff5e3a;">
	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<!-- Theme Font -->
	<link rel="stylesheet" type="text/css" href="{{ url('public/assets/dashboard/css/theme-font.min.css') }}" >

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="{{ url('public/assets/dashboard/Bootstrap/dist/css/bootstrap.css') }}">

	<!-- Main Styles CSS -->
	<link rel="stylesheet" type="text/css" href="{{ url('public/assets/dashboard/css/main.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('public/assets/dashboard/css/main.css') }}">
	<!-- Main RTL CSS -->
	<!-- <link rel="stylesheet" type="text/css" href="{{ url('public/assets/dashboard/css/rtl.min.css') }}"> -->
	<link rel="stylesheet" href="{{ url('public/assets/dashboard/toastr/toastr.min.css') }}">
	
	@yield('page-css-link')
    @yield('page-css')

</head>
<body class="page-has-left-panels page-has-right-panels body-bg-white">


<!-- Preloader -->
@include('dashboard.includes.preloader')

<!-- ... end Preloader -->
<!-- Profile Settings Responsive -->
<!-- @include('dashboard.includes.profile-settings') -->
<!-- ... end Profile Settings Responsive -->

<!-- Fixed Sidebar Left -->

@include('dashboard.includes.fixed-sidebar-left')
<!-- ... end Fixed Sidebar Left -->


<!-- Fixed Sidebar Left -->
<!-- @include('dashboard.includes.fixed-sidebar-left-responsive') -->
<!-- ... end Fixed Sidebar Left -->


<!-- Fixed Sidebar Right -->
@include('dashboard.includes.fixed-sidebar-right')
<!-- ... end Fixed Sidebar Right -->


<!-- Fixed Sidebar Right-Responsive -->
<!-- @include('dashboard.includes.fixed-sidebar-right-responsive') -->
<!-- ... end Fixed Sidebar Right-Responsive -->


<!-- Header-BP -->
@include('dashboard.includes.header-bp')
<!-- ... end Header-BP -->


<!-- Responsive Header-BP -->
<!-- @include('dashboard.includes.header-responsive') -->
<!-- ... end Responsive Header-BP -->
<!-- <div class="header-spacer"></div> -->


<!-- Top Header-Profile -->
@yield('main-content')
<!-- Window-popup Update Header Photo -->

<div class="modal fade" id="update-header-photo1" tabindex="-1" role="dialog" aria-labelledby="update-header-photo" aria-hidden="true">
	<div class="modal-dialog window-popup update-header-photo" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-bs-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon">
					<use xlink:href="#olymp-close-icon"></use>
				</svg>
			</a>

			<div class="modal-header">
				<h6 class="title">Update Header Photo</h6>
			</div>

			<div class="modal-body">
				<a href="#" class="upload-photo-item">
					<svg class="olymp-computer-icon">
						<use xlink:href="#olymp-computer-icon"></use>
					</svg>

					<h6>Upload Photo</h6>
					<input type="file" name="file">
				</a>

				<a href="#" class="upload-photo-item" data-bs-toggle="modal" data-bs-target="#choose-from-my-photo">

					<svg class="olymp-photos-icon">
						<use xlink:href="#olymp-photos-icon"></use>
					</svg>

					<h6>Choose from My Photos</h6>
					<span>Choose from your uploaded photos</span>
				</a>
			</div>
		</div>
	</div>
</div>


<!-- ... end Window-popup Update Header Photo -->

<!-- Window-popup Choose from my Photo -->

<div class="modal fade" id="choose-from-my-photo" tabindex="-1" role="dialog" aria-labelledby="choose-from-my-photo" aria-hidden="true">
	<div class="modal-dialog window-popup choose-from-my-photo" role="document">

		<div class="modal-content">
			<a href="#" class="close icon-close" data-bs-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon">
					<use xlink:href="#olymp-close-icon"></use>
				</svg>
			</a>
			<div class="modal-header">
				<h6 class="title">Choose from My Photos</h6>

				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab" aria-expanded="true">
							<svg class="olymp-photos-icon">
								<use xlink:href="#olymp-photos-icon"></use>
							</svg>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab" aria-expanded="false">
							<svg class="olymp-albums-icon">
								<use xlink:href="#olymp-albums-icon"></use>
							</svg>
						</a>
					</li>
				</ul>
			</div>

			<div class="modal-body">
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane fade active show" id="home" role="tabpanel" aria-expanded="true">

						<div class="choose-photo-item">
							<div class="radio">
								<label class="custom-radio">
									<img loading="lazy" src="{{ url('public/assets/dashboard/img/choose-photo1.webp') }}" alt="photo" width="247" height="166">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item">
							<div class="radio">
								<label class="custom-radio">
									<img loading="lazy" src="{{ url('public/assets/dashboard/img/choose-photo2.webp') }}" alt="photo" width="247" height="166">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item">
							<div class="radio">
								<label class="custom-radio">
									<img loading="lazy" src="{{ url('public/assets/dashboard/img/choose-photo3.webp') }}" alt="photo" width="247" height="166">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>

						<div class="choose-photo-item">
							<div class="radio">
								<label class="custom-radio">
									<img loading="lazy" src="{{ url('public/assets/dashboard/img/choose-photo4.webp') }}" alt="photo" width="247" height="166">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item">
							<div class="radio">
								<label class="custom-radio">
									<img loading="lazy" src="{{ url('public/assets/dashboard/img/choose-photo5.webp') }}" alt="photo" width="247" height="166">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item">
							<div class="radio">
								<label class="custom-radio">
									<img loading="lazy" src="{{ url('public/assets/dashboard/img/choose-photo6.webp') }}" alt="photo" width="247" height="166">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>

						<div class="choose-photo-item">
							<div class="radio">
								<label class="custom-radio">
									<img loading="lazy" src="{{ url('public/assets/dashboard/img/choose-photo7.webp') }}" alt="photo" width="247" height="166">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item">
							<div class="radio">
								<label class="custom-radio">
									<img loading="lazy" src="{{ url('public/assets/dashboard/img/choose-photo8.webp') }}" alt="photo" width="247" height="166">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item">
							<div class="radio">
								<label class="custom-radio">
									<img loading="lazy" src="{{ url('public/assets/dashboard/img/choose-photo9.webp') }}" alt="photo" width="247" height="166">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>


						<a href="#" class="btn btn-secondary btn-lg btn--half-width">Cancel</a>
						<a href="#" class="btn btn-primary btn-lg btn--half-width">Confirm Photo</a>

					</div>
					<div class="tab-pane fade" id="profile" role="tabpanel" aria-expanded="false">

						<div class="choose-photo-item">
							<figure>
								<img loading="lazy" src="{{ url('public/assets/dashboard/img/choose-photo10.webp') }}" alt="photo" width="225" height="180">
								<figcaption>
									<a href="#">South America Vacations</a>
									<span>Last Added: 2 hours ago</span>
								</figcaption>
							</figure>
						</div>
						<div class="choose-photo-item">
							<figure>
								<img loading="lazy" src="{{ url('public/assets/dashboard/img/choose-photo11.webp') }}" alt="photo" width="225" height="180">
								<figcaption>
									<a href="#">Photoshoot Summer 2016</a>
									<span>Last Added: 5 weeks ago</span>
								</figcaption>
							</figure>
						</div>
						<div class="choose-photo-item">
							<figure>
								<img loading="lazy" src="{{ url('public/assets/dashboard/img/choose-photo12.webp') }}" alt="photo" width="225" height="180">
								<figcaption>
									<a href="#">Amazing Street Food</a>
									<span>Last Added: 6 mins ago</span>
								</figcaption>
							</figure>
						</div>

						<div class="choose-photo-item">
							<figure>
								<img loading="lazy" src="{{ url('public/assets/dashboard/img/choose-photo13.webp') }}" alt="photo" width="224" height="179">
								<figcaption>
									<a href="#">Graffity & Street Art</a>
									<span>Last Added: 16 hours ago</span>
								</figcaption>
							</figure>
						</div>
						<div class="choose-photo-item">
							<figure>
								<img loading="lazy" src="{{ url('public/assets/dashboard/img/choose-photo14.webp') }}" alt="photo" width="225" height="180">
								<figcaption>
									<a href="#">Amazing Landscapes</a>
									<span>Last Added: 13 mins ago</span>
								</figcaption>
							</figure>
						</div>
						<div class="choose-photo-item">
							<figure>
								<img loading="lazy" src="{{ url('public/assets/dashboard/img/choose-photo15.webp') }}" alt="photo" width="225" height="180">
								<figcaption>
									<a href="#">The Majestic Canyon</a>
									<span>Last Added: 57 mins ago</span>
								</figcaption>
							</figure>
						</div>


						<a href="#" class="btn btn-secondary btn-lg btn--half-width">Cancel</a>
						<a href="#" class="btn btn-primary btn-lg disabled btn--half-width">Confirm Photo</a>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<!-- ... end Window-popup Choose from my Photo -->

<!-- Playlist Popup -->

<div class="window-popup playlist-popup" tabindex="-1" role="dialog" aria-labelledby="playlist-popup" aria-hidden="true">

	<a href="" class="icon-close js-close-popup">
		<svg class="olymp-close-icon">
			<use xlink:href="#olymp-close-icon"></use>
		</svg>
	</a>

	<div class="mCustomScrollbar">
		<table class="playlist-popup-table">

			<thead>

			<tr>

				<th class="play">
					PLAY
				</th>

				<th class="cover">
					COVER
				</th>

				<th class="song-artist">
					SONG AND ARTIST
				</th>

				<th class="album">
					ALBUM
				</th>

				<th class="released">
					RELEASED
				</th>

				<th class="duration">
					DURATION
				</th>

				<th class="spotify">
					GET IT ON SPOTIFY
				</th>

				<th class="remove">
					REMOVE
				</th>
			</tr>

			</thead>

			<tbody>
			<tr>
				<td class="play">
					<a href="#" class="play-icon">
						<svg class="olymp-music-play-icon-big">
							<use xlink:href="#olymp-music-play-icon-big"></use>
						</svg>
					</a>
				</td>
				<td class="cover">
					<div class="playlist-thumb">
						<img loading="lazy" src="{{ url('public/assets/dashboard/img/playlist19.webp') }}" alt="thumb-composition" width="34" height="34">
					</div>
				</td>
				<td class="song-artist">
					<div class="composition">
						<a href="#" class="composition-name">We Can Be Heroes</a>
						<a href="#" class="composition-author">Jason Bowie</a>
					</div>
				</td>
				<td class="album">
					<a href="#" class="album-composition">Ziggy Firedust</a>
				</td>
				<td class="released">
					<div class="release-year">2014</div>
				</td>
				<td class="duration">
					<div class="composition-time">
						<time class="published" datetime="2017-03-24T18:18">6:17</time>
					</div>
				</td>
				<td class="spotify">
					<svg class="composition-icon" width="22" height="22">
						<use xlink:href="#olymp-spotify-icon"></use>
					</svg>
				</td>
				<td class="remove">
					<a href="#" class="remove-icon">
						<svg class="olymp-close-icon">
							<use xlink:href="#olymp-close-icon"></use>
						</svg>
					</a>
				</td>
			</tr>

			<tr>
				<td class="play">
					<a href="#" class="play-icon">
						<svg class="olymp-music-play-icon-big">
							<use xlink:href="#olymp-music-play-icon-big"></use>
						</svg>
					</a>
				</td>
				<td class="cover">
					<div class="playlist-thumb">
						<img loading="lazy" src="{{ url('public/assets/dashboard/img/playlist6.webp') }}" alt="thumb-composition" width="34" height="34">
					</div>
				</td>
				<td class="song-artist">
					<div class="composition">
						<a href="#" class="composition-name">The Past Starts Slow and Ends</a>
						<a href="#" class="composition-author">System of a Revenge</a>
					</div>
				</td>
				<td class="album">
					<a href="#" class="album-composition">Wonderize</a>
				</td>
				<td class="released">
					<div class="release-year">2014</div>
				</td>
				<td class="duration">
					<div class="composition-time">
						<time class="published" datetime="2017-03-24T18:18">6:17</time>
					</div>
				</td>
				<td class="spotify">
					<svg class="composition-icon" width="22" height="22">
						<use xlink:href="#olymp-spotify-icon"></use>
					</svg>
				</td>
				<td class="remove">
					<a href="#" class="remove-icon">
						<svg class="olymp-close-icon">
							<use xlink:href="#olymp-close-icon"></use>
						</svg>
					</a>
				</td>
			</tr>

			<tr>
				<td class="play">
					<a href="#" class="play-icon">
						<svg class="olymp-music-play-icon-big">
							<use xlink:href="#olymp-music-play-icon-big"></use>
						</svg>
					</a>
				</td>
				<td class="cover">
					<div class="playlist-thumb">
						<img loading="lazy" src="{{ url('public/assets/dashboard/img/playlist7.webp') }}" alt="thumb-composition" width="34" height="34">
					</div>
				</td>
				<td class="song-artist">
					<div class="composition">
						<a href="#" class="composition-name">The Pretender</a>
						<a href="#" class="composition-author">Kung Fighters</a>
					</div>
				</td>
				<td class="album">
					<a href="#" class="album-composition">Warping Lights</a>
				</td>
				<td class="released">
					<div class="release-year">2014</div>
				</td>
				<td class="duration">
					<div class="composition-time">
						<time class="published" datetime="2017-03-24T18:18">6:17</time>
					</div>
				</td>
				<td class="spotify">
					<svg class="composition-icon" width="22" height="22">
						<use xlink:href="#olymp-spotify-icon"></use>
					</svg>
				</td>
				<td class="remove">
					<a href="#" class="remove-icon">
						<svg class="olymp-close-icon">
							<use xlink:href="#olymp-close-icon"></use>
						</svg>
					</a>
				</td>
			</tr>

			<tr>
				<td class="play">
					<a href="#" class="play-icon">
						<svg class="olymp-music-play-icon-big">
							<use xlink:href="#olymp-music-play-icon-big"></use>
						</svg>
					</a>
				</td>
				<td class="cover">
					<div class="playlist-thumb">
						<img loading="lazy" src="{{ url('public/assets/dashboard/img/playlist8.webp') }}" alt="thumb-composition" width="34" height="34">
					</div>
				</td>
				<td class="song-artist">
					<div class="composition">
						<a href="#" class="composition-name">Seven Nation Army</a>
						<a href="#" class="composition-author">The Black Stripes</a>
					</div>
				</td>
				<td class="album">
					<a href="#" class="album-composition ">Icky Strung (LIVE at Cube Garden)</a>
				</td>
				<td class="released">
					<div class="release-year">2014</div>
				</td>
				<td class="duration">
					<div class="composition-time">
						<time class="published" datetime="2017-03-24T18:18">6:17</time>
					</div>
				</td>
				<td class="spotify">
					<svg class="composition-icon" width="22" height="22">
						<use xlink:href="#olymp-spotify-icon"></use>
					</svg>
				</td>
				<td class="remove">
					<a href="#" class="remove-icon">
						<svg class="olymp-close-icon">
							<use xlink:href="#olymp-close-icon"></use>
						</svg>
					</a>
				</td>
			</tr>

			<tr>
				<td class="play">
					<a href="#" class="play-icon">
						<svg class="olymp-music-play-icon-big">
							<use xlink:href="#olymp-music-play-icon-big"></use>
						</svg>
					</a>
				</td>
				<td class="cover">
					<div class="playlist-thumb">
						<img loading="lazy" src="{{ url('public/assets/dashboard/img/playlist9.webp') }}" alt="thumb-composition" width="34" height="34">
					</div>
				</td>
				<td class="song-artist">
					<div class="composition">
						<a href="#" class="composition-name">Leap of Faith</a>
						<a href="#" class="composition-author">Eden Artifact</a>
					</div>
				</td>
				<td class="album">
					<a href="#" class="album-composition">The Assassins’s Soundtrack</a>
				</td>
				<td class="released">
					<div class="release-year">2014</div>
				</td>
				<td class="duration">
					<div class="composition-time">
						<time class="published" datetime="2017-03-24T18:18">6:17</time>
					</div>
				</td>
				<td class="spotify">
					<svg class="composition-icon" width="22" height="22">
						<use xlink:href="#olymp-spotify-icon"></use>
					</svg>
				</td>
				<td class="remove">
					<a href="#" class="remove-icon">
						<svg class="olymp-close-icon">
							<use xlink:href="#olymp-close-icon"></use>
						</svg>
					</a>
				</td>
			</tr>

			<tr>
				<td class="play">
					<a href="#" class="play-icon">
						<svg class="olymp-music-play-icon-big">
							<use xlink:href="#olymp-music-play-icon-big"></use>
						</svg>
					</a>
				</td>
				<td class="cover">
					<div class="playlist-thumb">
						<img loading="lazy" src="{{ url('public/assets/dashboard/img/playlist10.webp') }}" alt="thumb-composition" width="34" height="34">
					</div>
				</td>
				<td class="song-artist">
					<div class="composition">
						<a href="#" class="composition-name">Killer Queen</a>
						<a href="#" class="composition-author">Archiduke</a>
					</div>
				</td>
				<td class="album">
					<a href="#" class="album-composition ">News of the Universe</a>
				</td>
				<td class="released">
					<div class="release-year">2014</div>
				</td>
				<td class="duration">
					<div class="composition-time">
						<time class="published" datetime="2017-03-24T18:18">6:17</time>
					</div>
				</td>
				<td class="spotify">
					<svg class="composition-icon" width="22" height="22">
						<use xlink:href="#olymp-spotify-icon"></use>
					</svg>
				</td>
				<td class="remove">
					<a href="#" class="remove-icon">
						<svg class="olymp-close-icon">
							<use xlink:href="#olymp-close-icon"></use>
						</svg>
					</a>
				</td>
			</tr>
			</tbody>
		</table>
	</div>

	<!----------------------------------------------- MediaPlayer ----------------------------------------------------->

	<audio id="mediaplayer" data-showplaylist="true">
		<source src="{{ url('public/assets/dashboard/mp3/Twice.mp3') }}" title="Track 1" data-poster="track1.webp" type="audio/mpeg">
		<source src="{{ url('public/assets/dashboard/mp3/Twice.mp3') }}" title="Track 2" data-poster="track2.webp" type="audio/mpeg">
		<source src="{{ url('public/assets/dashboard/mp3/Twice.mp3') }}" title="Track 3" data-poster="track3.webp" type="audio/mpeg">
		<source src="{{ url('public/assets/dashboard/mp3/Twice.mp3') }}" title="Track 4" data-poster="track4.webp" type="audio/mpeg">
	</audio>

	<!-- JS library for MediaPlayer -->
	<script defer src="{{ url('public/assets/dashboard/js/libs/mediaelement-and-player.min.js') }}"></script>
	<script defer src="{{ url('public/assets/dashboard/js/libs/mediaelement-playlist-plugin.min.js') }}"></script>
	<!-- ...end JS library for MediaPlayer -->

	<!------------------------------------------------ ... end MediaPlayer -------------------------------------------->

</div>

<!-- ... end Playlist Popup -->


<a class="back-to-top" href="#">
	<svg class="back-icon" width="14" height="18">
		<use xlink:href="#olymp-back-to-top"></use>
	</svg>
</a>


<!-- Window-popup-CHAT for responsive min-width: 768px -->

<div class="ui-block popup-chat popup-chat-responsive" tabindex="-1" role="dialog" aria-labelledby="popup-chat-responsive" aria-hidden="true">

	<div class="modal-content">
		<div class="modal-header">
			<span class="icon-status online"></span>
			<h6 class="title">Chat</h6>
			<div class="more">
				<svg class="olymp-three-dots-icon">
					<use xlink:href="#olymp-three-dots-icon"></use>
				</svg>
				<svg class="olymp-little-delete js-chat-open">
					<use xlink:href="#olymp-little-delete"></use>
				</svg>
			</div>
		</div>
		<div class="modal-body">
			<div class="mCustomScrollbar">
				<ul class="notification-list chat-message chat-message-field">
					<li>
						<div class="author-thumb">
							<img loading="lazy" src="{{ url('public/assets/dashboard/img/avatar14-sm.webp') }}" width="28" height="28" alt="author" class="mCS_img_loaded">
						</div>
						<div class="notification-event">
							<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img loading="lazy" src="{{ url('public/assets/dashboard/img/author-page.webp') }}" width="36" height="36" alt="author" class="mCS_img_loaded">
						</div>
						<div class="notification-event">
							<span class="chat-message-item">Don’t worry Mathilda!</span>
							<span class="chat-message-item">I already bought everything</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:29pm</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img loading="lazy" src="{{ url('public/assets/dashboard/img/avatar14-sm.webp') }}" width="28" height="28" alt="author" class="mCS_img_loaded">
						</div>
						<div class="notification-event">
							<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
						</div>
					</li>
				</ul>
			</div>

			<form class="need-validation">

				<div class="form-group">
					<textarea class="form-control" placeholder="Press enter to post..."></textarea>
					<div class="add-options-message">
						<a href="#" class="options-message">
							<svg class="olymp-computer-icon">
								<use xlink:href="#olymp-computer-icon"></use>
							</svg>
						</a>
						<div class="options-message smile-block">

							<svg class="olymp-happy-sticker-icon">
								<use xlink:href="#olymp-happy-sticker-icon"></use>
							</svg>

							<ul class="more-dropdown more-with-triangle triangle-bottom-right">
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat1.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat2.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat3.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat4.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat5.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat6.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat7.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat8.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat9.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat10.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat11.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat12.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat13.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat14.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat15.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat16.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat17.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat18.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat19.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat20.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat21.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat22.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat23.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat24.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat25.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat26.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat27.webp') }}" alt="icon" width="20" height="20">
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>

			</form>
		</div>
	</div>

</div>

<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->
<!-- JS Scripts -->
<script src="{{ url('public/assets/dashboard/js/jQuery/jquery-3.5.1.min.js') }}"></script>

<script src="{{ url('public/assets/dashboard/js/libs/jquery.mousewheel.min.js') }}"></script>
<script src="{{ url('public/assets/dashboard/js/libs/perfect-scrollbar.min.js') }}"></script>
<script src="{{ url('public/assets/dashboard/js/libs/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ url('public/assets/dashboard/js/libs/material.min.js') }}"></script>
<script src="{{ url('public/assets/dashboard/js/libs/selectize.min.js') }}"></script>
<script src="{{ url('public/assets/dashboard/js/libs/swiper.jquery.min.js') }}"></script>


<script src="{{ url('public/assets/dashboard/js/libs/moment.min.js') }}"></script>

<script src="{{ url('public/assets/dashboard/js/libs/daterangepicker.min.js') }}"></script>

<script src="{{ url('public/assets/dashboard/js/libs/isotope.pkgd.min.js') }}"></script>
<script src="{{ url('public/assets/dashboard/js/libs/ajax-pagination.min.js') }}"></script>
<script src="{{ url('public/assets/dashboard/js/libs/jquery.magnific-popup.min.js') }}"></script>

<script src="{{ url('public/assets/dashboard/js/libs/jquery.appear.min.js') }}"></script>

<script src="{{ url('public/assets/dashboard/js/libs/Chart.min.js') }}"></script>
<script src="{{ url('public/assets/dashboard/js/libs/chartjs-plugin-deferred.min.js') }}"></script>
<script src="{{ url('public/assets/dashboard/js/libs/chartjs-plugin-deferred.min.js') }}"></script>
<script src="{{ url('public/assets/dashboard/js/libs/circle-progress.min.js') }}"></script>
<script src="{{ url('public/assets/dashboard/js/libs/loader.min.js') }}"></script>
<script src="{{ url('public/assets/dashboard/js/libs/run-chart.min.js') }}"></script>

<script src="{{ url('public/assets/dashboard/js/main.js') }}"></script>
<script src="{{ url('public/assets/dashboard/js/libs-init/libs-init.js') }}"></script>

<script src="{{ url('public/assets/dashboard/Bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>

<!-- SVG icons loader -->
<script src="{{ url('public/assets/dashboard/js/svg-loader.js') }}"></script>
<!-- /SVG icons loader -->
<script src="{{ url('public/assets/dashboard/toastr/toastr.min.js') }}"></script>

<script type="text/javascript">
	$(document).ready(function () {
		$(".serach_userasdfghjk_").keyup( function() {
			var keywordtext = $("#search_name").val();
		    var topUserSearch = $('.serach_user');
		    $.ajax({
		        url: "{{route('search-users')}}", 
		        method: "GET",
		        data: {
		            "_token": "{{ csrf_token() }}",
		            "keywordtext": keywordtext,
		        },
		        beforeSend: function() {
		        },
		        success: function(data) {
		            if (data.names) {
		               var users  = data.names;
		            }
		            if (topUserSearch.length) {
						topUserSearch.selectize({
							delimiter: ',',
							maxItems: 1,
							persist: false,
							valueField: 'name',
							labelField: 'name',
							searchField: ['name'],
							options: users,
							render: {
								option: function (item, escape) {
									return '<div class="inline-items">' +
										(item.image ? '<div class="author-thumb"><img src="' + escape(item.image) + '" alt="avatar"></div>' : '') +
										'<div class="notification-event">' +
										(item.name ? '<span class="h6 notification-friend"></a>' + escape(item.name) + '</span>' : '') +
										(item.message ? '<span class="chat-message-item">' + escape(item.message) + '</span>' : '') +
										'</div>' +
										(item.icon ? '<span class="notification-icon"><svg class="' + escape(item.icon) + '"><use xlink:href="#' + escape(item.icon) + '"></use></svg></span>' : '') +
										'</div>';
								},
								item: function (item, escape) {
									var label = item.name;
									return '<div>' +
										'<span class="label">' + escape(label) + '</span>' +
										'</div>';
								}
							}
						});
					}
		        }
		    })
	    });		
	});

	$(".link-find-friend").click(function() {
	  $("#friendSearch").submit();
	});
	
</script>


@yield('page-js-link')
@yield('page-js')
</body>
</html>