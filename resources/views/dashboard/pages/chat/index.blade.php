@extends('dashboard.layouts.master')
@section('title', ' Chat')
@section('page', ' Chat')
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
					<h6 class="title">Chat / Messages</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
				</div>

				<div class="row">
					<div class="col col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">

						
						<!-- Notification List Chat Messages -->
						
						<ul class="notification-list chat-message">
							<li>
								<div class="author-thumb">
									<img loading="lazy" src="img/avatar8-sm.webp" alt="author" width="36" height="36">
								</div>
								<div class="notification-event">
									<a href="#" class="h6 notification-friend">Diana Jameson</a>
									<span class="chat-message-item">Hi James! It’s Diana, I just wanted to let you know that we have to reschedule...</span>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
								</div>
								<span class="notification-icon">
																<svg class="olymp-chat---messages-icon"><use xlink:href="#olymp-chat---messages-icon"></use></svg>
															</span>
						
								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
								</div>
							</li>
						
							<li>
								<div class="author-thumb">
									<img loading="lazy" src="img/avatar9-sm.webp" alt="author" width="36" height="36">
								</div>
								<div class="notification-event">
									<a href="#" class="h6 notification-friend">Jake Parker</a>
									<span class="chat-message-item">Great, I’ll see you tomorrow!.</span>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
								</div>
								<span class="notification-icon">
																<svg class="olymp-chat---messages-icon"><use xlink:href="#olymp-chat---messages-icon"></use></svg>
															</span>
						
								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
								</div>
							</li>
							<li>
								<div class="author-thumb">
									<img loading="lazy" src="img/avatar10-sm.webp" alt="author" width="36" height="36">
								</div>
								<div class="notification-event">
									<a href="#" class="h6 notification-friend">Elaine Dreyfuss</a>
									<span class="chat-message-item">We’ll have to check that at the office and see if the client is on board with...</span>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 9:56pm</time></span>
								</div>
								<span class="notification-icon">
															<svg class="olymp-chat---messages-icon"><use xlink:href="#olymp-chat---messages-icon"></use></svg>
														</span>
								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
								</div>
							</li>
						
							<li class="chat-group">
								<div class="author-thumb">
									<img loading="lazy" src="img/avatar11-sm.webp" alt="author" width="16" height="16">
									<img loading="lazy" src="img/avatar12-sm.webp" alt="author" width="16" height="16">
									<img loading="lazy" src="img/avatar13-sm.webp" alt="author" width="16" height="16">
									<img loading="lazy" src="img/avatar10-sm.webp" alt="author" width="36" height="36">
								</div>
								<div class="notification-event">
									<a href="#" class="h6 notification-friend">You, Faye, Ed & Jet +3</a>
									<span class="last-message-author">Ed:</span>
									<span class="chat-message-item">Yeah! Seems fine by me!</span>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 16th at 10:23am</time></span>
								</div>
								<span class="notification-icon">
															<svg class="olymp-chat---messages-icon"><use xlink:href="#olymp-chat---messages-icon"></use></svg>
														</span>
								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
								</div>
							</li>
						</ul>
						
						<!-- ... end Notification List Chat Messages -->

						
						<!-- Popup Chat -->
						
						<div class="ui-block popup-chat">
							<div class="ui-block-title">
								<span class="icon-status online"></span>
								<h6 class="title">Mathilda Brinker</h6>
								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
									<svg class="olymp-little-delete"><use xlink:href="#olymp-little-delete"></use></svg>
								</div>
							</div>
							<div class="mCustomScrollbar" data-mcs-theme="dark">
								<ul class="notification-list chat-message chat-message-field">
									<li>
										<div class="author-thumb">
											<img loading="lazy" src="img/avatar14-sm.webp" width="28" height="28" alt="author">
										</div>
										<div class="notification-event">
											<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
											<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
										</div>
									</li>
						
									<li>
										<div class="author-thumb">
											<img loading="lazy" src="img/author-page.webp" width="36" height="36" alt="author">
										</div>
										<div class="notification-event">
											<span class="chat-message-item">Don’t worry Mathilda!</span>
											<span class="chat-message-item">I already bought everything</span>
											<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:29pm</time></span>
										</div>
									</li>
						
									<li>
										<div class="author-thumb">
											<img loading="lazy" src="img/avatar14-sm.webp" width="28" height="28" alt="author">
										</div>
										<div class="notification-event">
											<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
											<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
										</div>
									</li>
								</ul>
							</div>
						
							<form>
						
								<div class="form-group label-floating is-empty">
									<textarea class="form-control" placeholder="Press enter to post..."></textarea>
									<div class="add-options-message">
										<a href="#" class="options-message">
											<svg class="olymp-computer-icon"><use xlink:href="#olymp-computer-icon"></use></svg>
										</a>
										<div class="options-message smile-block">
						
											<svg class="olymp-happy-sticker-icon"><use xlink:href="#olymp-happy-sticker-icon"></use></svg>
						
											<ul class="more-dropdown more-with-triangle triangle-bottom-right">
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat1.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat2.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat3.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat4.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat5.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat6.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat7.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat8.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat9.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat10.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat11.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat12.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat13.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat14.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat15.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat16.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat17.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat18.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat19.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat20.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat21.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat22.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat23.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat24.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat25.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat26.webp" alt="icon" width="20" height="20">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="img/icon-chat27.webp" alt="icon" width="20" height="20">
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
						
							</form>
						
						
						</div>
						
						<!-- ... end Popup Chat -->
						

					</div>

					<div class="col col-xl-7 col-lg-6 col-md-12 col-sm-12 col-12">

						
						<!-- Chat Field -->
						
						<div class="chat-field">
							<div class="ui-block-title">
								<h6 class="title">Elaine Dreyfuss</h6>
								<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
							</div>
							<div class="mCustomScrollbar" data-mcs-theme="dark">
								<ul class="notification-list chat-message chat-message-field">
									<li>
										<div class="author-thumb">
											<img loading="lazy" src="img/avatar10-sm.webp" alt="author" width="36" height="36">
										</div>
										<div class="notification-event">
											<div class="event-info-wrap">
												<a href="#" class="h6 notification-friend">Elaine Dreyfuss</a>
												<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
											</div>
											<span class="chat-message-item">Hi James, How are your doing? Please remember that next week we are going to Gotham Bar to celebrate Marina’s Birthday.</span>
										</div>
									</li>
						
									<li>
										<div class="author-thumb">
											<img loading="lazy" src="img/author-page.webp" width="36" height="36" alt="author">
										</div>
										<div class="notification-event">
											<div class="event-info-wrap">
												<a href="#" class="h6 notification-friend">James Spiegel</a>
												<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:30pm</time></span>
											</div>
											<span class="chat-message-item">Hi Elaine! I have a question, do you think that tomorrow we could talk to
																	the client to iron out some details before the presentation? I already finished the first screen but
																	I need to ask him something before moving on. Anyway, here’s a preview!
																</span>
											<div class="added-photos">
												<img loading="lazy" src="img/photo-message1.webp" alt="photo" width="75" height="61">
												<img loading="lazy" src="img/photo-message2.webp" alt="photo" width="71" height="62">
												<span class="photos-name">icons.jpeg; bunny.jpeg</span>
											</div>
										</div>
									</li>
						
									<li>
										<div class="author-thumb">
											<img loading="lazy" src="img/avatar10-sm.webp" alt="author" width="36" height="36">
										</div>
										<div class="notification-event">
											<div class="event-info-wrap">
												<a href="#" class="h6 notification-friend">Elaine Dreyfuss</a>
												<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 9:56pm</time></span>
											</div>
											<span class="chat-message-item">We’ll have to check that at the office and see if the client is on board with it. I think That looks really good!</span>
										</div>
									</li>
								</ul>
							</div>
						
							<form>
						
								<div class="form-group">
									<textarea class="form-control" placeholder="Write your reply here..."></textarea>
								</div>
						
								<div class="add-options-message">
									<a href="#" class="options-message">
										<svg class="olymp-computer-icon"><use xlink:href="#olymp-computer-icon"></use></svg>
									</a>
									<a href="#" class="options-message">
										<svg class="olymp-computer-icon"><use xlink:href="#olymp-computer-icon"></use></svg>
									</a>
									<div class="options-message smile-block">
										<svg class="olymp-happy-sticker-icon"><use xlink:href="#olymp-happy-sticker-icon"></use></svg>
						
										<ul class="more-dropdown more-with-triangle triangle-bottom-right">
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat1.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat2.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat3.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat4.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat5.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat6.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat7.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat8.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat9.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat10.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat11.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat12.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat13.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat14.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat15.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat16.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat17.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat18.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat19.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat20.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat21.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat22.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat23.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat24.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat25.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat26.webp" alt="icon" width="20" height="20">
												</a>
											</li>
											<li>
												<a href="#">
													<img loading="lazy" src="img/icon-chat27.webp" alt="icon" width="20" height="20">
												</a>
											</li>
										</ul>
									</div>
						
									<button class="btn btn-primary btn-sm">Post Reply</button>
								</div>
						
							</form>
						
						</div>
						
						<!-- ... end Chat Field -->

					</div>
				</div>

			</div>

			
			<!-- Pagination -->
			
			<nav aria-label="Page navigation">
				<ul class="pagination justify-content-center">
					<li class="page-item disabled">
						<a class="page-link" href="#" tabindex="-1">Previous</a>
					</li>
					<li class="page-item"><a class="page-link" href="#">1<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: -10.3833px; top: -16.8333px; background-color: rgb(255, 255, 255); transform: scale(16.7857);"></div></div></a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item"><a class="page-link" href="#">...</a></li>
					<li class="page-item"><a class="page-link" href="#">12</a></li>
					<li class="page-item">
						<a class="page-link" href="#">Next</a>
					</li>
				</ul>
			</nav>
			
			<!-- ... end Pagination -->

		</div>

		@include('dashboard.includes.profile-sidebar')
	</div>
</div>

<!-- ... end Your Account Personal Information -->

@endsection
@section('page-js-link') @endsection
@section('page-js') @endsection