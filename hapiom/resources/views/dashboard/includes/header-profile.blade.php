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
							<div class="col col-lg-5 ms-auto col-md-5 col-sm-12 col-12 d-none">
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

						<div class="control-block-button d-none">
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
							@if(isset(Auth::user()->userInfo->profile_image) && file_exists('images/profile/'. Auth::user()->userInfo->profile_image))
							<img loading="lazy" src="{{ url('images/profile/',Auth::user()->userInfo->profile_image) }}" alt="author" width="124" height="124">
							@else
							<img loading="lazy" src="{{ url('assets/dashboard/img/noimage.jpg') }}" alt="author" width="124" height="124">
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