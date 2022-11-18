<div class="fixed-sidebar left">
	<div class="fixed-sidebar-left sidebar--small" id="sidebar-left">

		<a href="{{ route('dashboard') }}" class="logo">
			<div class="img-wrap">
				<img loading="lazy" src="{{ url('public/assets/dashboard/img/logo.webp') }}" alt="Olympus" width="34" height="34">
			</div>
		</a>

		<div class="mCustomScrollbar" data-mcs-theme="dark">
			@if(Auth::user()->role_id == 1)
                @include('dashboard.includes.menu.admin-collapse-menu')
            @elseif(Auth::user()->role_id == 2)
                @include('dashboard.includes.menu.user-admin-collapse-menu')
            @else
                @include('dashboard.includes.menu.user-collapse-menu')
			@endif
		</div>
	</div>

	<div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1">
		<a href="02-ProfilePage.html" class="logo">
			<div class="img-wrap">
				<img loading="lazy" src="{{ url('public/assets/dashboard/img/logo.webp') }}" alt="Olympus" width="34" height="34">
			</div>
			<div class="title-block">
				<h6 class="logo-title">olympus</h6>
			</div>
		</a>

		<div class="mCustomScrollbar" data-mcs-theme="dark">
			@if(Auth::user()->role_id == 1)
                @include('dashboard.includes.menu.admin-menu')
            @elseif(Auth::user()->role_id == 2)
                @include('dashboard.includes.menu.user-admin-menu')
            @else
                @include('dashboard.includes.menu.user-menu')
			@endif
			

			<div class="profile-completion">

				<div class="skills-item">
					<div class="skills-item-info">
						<span class="skills-item-title">Profile Completion</span>
						<span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="76" data-from="0"></span><span class="units">76%</span></span>
					</div>
					<div class="skills-item-meter">
						<span class="skills-item-meter-active bg-primary" style="width: 76%"></span>
					</div>
				</div>

				<span>Complete <a href="#">your profile</a> so people can know more about you!</span>

			</div>
		</div>
	</div>
</div>