<div class="col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12 responsive-display-none">
	<div class="ui-block">

		<!-- Your Profile  -->
		
		<div class="your-profile">
			<div class="ui-block-title ui-block-title-small">
				<h6 class="title">Your PROFILE</h6>
			</div>

			<div class="accordion" id="accordionExample">
				<div class="accordion-item">
					<h6 class="accordion-header" id="headingOne">
						<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							Profile Settings
							<svg class="olymp-dropdown-arrow-icon"><use xlink:href="#olymp-dropdown-arrow-icon"></use></svg>
						</button>
					</h6>
					<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
						<div class="accordion-body">
							<ul class="your-profile-menu">
								<li>
									<a href="{{ route('personal-information') }}">Personal Information</a>
								</li>
								<!-- <li>
									<a href="javascript:void(0)">Account Settings</a>
								</li> -->
								<li>
									<a href="{{ route('change-password') }}">Change Password</a>
								</li>
								<li>
									<a href="{{ route('invite') }}" class="h6 title">Invite</a>
								</li>
								<!-- <li>
									<a href="javascript:void(0)">Education and Employement</a>
								</li> -->
							</ul>
						</div>
					</div>
				</div>
			</div>
		
			<!-- <div class="ui-block-title">
				<a href="javascript:void(0)" class="h6 title">Notifications</a>
				<a href="#" class="items-round-little bg-primary">8</a>
			</div> -->
			<div class="ui-block-title">
				<a href="{{ route('chat') }}" class="h6 title">Chat / Messages</a>
			</div>
			<div class="ui-block-title">
				<a href="{{ route('user-friend-request') }}" class="h6 title">Friend Requests</a>
				<a href="#" class="items-round-little bg-blue">{{ Auth::user()->UserfriendRequest->count() }}</a>
			</div>
			@if(Auth::user()->role_id == 2)
			<div class="ui-block-title">
				<a href="{{ route('plan-upgrade') }}" class="h6 title">Upgrade Plan</a>
			</div>
			@endif
			@if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
			<div class="ui-block-title">
				<a href="{{ route('payment-setting') }}" class="h6 title">Payment Setting</a>
			</div>
			@endif
			<!-- <div class="ui-block-title ui-block-title-small">
				<h6 class="title">FAVOURITE PAGE</h6>
			</div>
			<div class="ui-block-title">
				<a href="javascript:void(0)" class="h6 title">Create Fav Page</a>
			</div>
			<div class="ui-block-title">
				<a href="javascript:void(0)" class="h6 title">Fav Page Settings</a>
			</div> -->
		</div>
		
		<!-- ... end Your Profile  -->

	</div>
</div>