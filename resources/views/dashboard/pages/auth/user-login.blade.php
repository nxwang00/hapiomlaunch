<!DOCTYPE html>
<html lang="en">
<head>

	<title>User-Login</title>

	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Theme Font -->
	<link rel="preload" type="text/css" href="{{ url('public/assets/dashboard/css/theme-font.min.css') }}" as="style">

	<!-- Bootstrap CSS -->

	<link rel="stylesheet" type="text/css" href="{{ url('public/assets/dashboard/Bootstrap/dist/css/bootstrap.css') }}">

	<!-- Main Styles CSS -->
	<link rel="stylesheet" type="text/css" href="{{ url('public/assets/dashboard/css/main.min.css') }}">

	<!-- Main RTL CSS -->
	<!--<link rel="stylesheet" type="text/css" href="css/rtl.min.css">-->

</head>

<body class="landing-page">


<!-- Preloader -->

<div id="hellopreloader">
	<div class="preloader">
		<svg width="45" height="45" stroke="#fff">
			<g fill="none" fill-rule="evenodd" stroke-width="2" transform="translate(1 1)">
				<circle cx="22" cy="22" r="6" stroke="none">
					<animate attributeName="r" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite" values="6;22"/>
					<animate attributeName="stroke-opacity" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite" values="1;0"/>
					<animate attributeName="stroke-width" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite" values="2;0"/>
				</circle>
				<circle cx="22" cy="22" r="6" stroke="none">
					<animate attributeName="r" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite" values="6;22"/>
					<animate attributeName="stroke-opacity" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite" values="1;0"/>
					<animate attributeName="stroke-width" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite" values="2;0"/>
				</circle>
				<circle cx="22" cy="22" r="8">
					<animate attributeName="r" begin="0s" calcMode="linear" dur="1.5s" repeatCount="indefinite" values="6;1;2;3;4;5;6"/>
				</circle>
			</g>
		</svg>

		<div class="text">Loading ...</div>
	</div>
</div>

<!-- ... end Preloader -->
<div class="content-bg-wrap"></div>



<div class="header-spacer--standard"></div>

<div class="container">
	<div class="row display-flex">
		<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
			<div class="landing-content">
				<h1>Welcome to the Biggest Social Network in the World</h1>
				<p>We are the best and biggest social network with 5 billion active users all around the world. Share you
					thoughts, write blog posts, show your favourite music via Stopify, earn badges and much more!
				</p>
				<a href="#" class="btn btn-md btn-border c-white">Register Now!</a>
			</div>
		</div>

		<div class="col col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">
			
			<!-- Login-Registration Form  -->

			<div class="registration-login-form">

				<!-- Nav tabs -->
				<ul class="nav nav-tabs" id="registration-form-tabs" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">
							<svg class="olymp-login-icon"><use xlink:href="#olymp-login-icon"></use></svg>
						</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
							<svg class="olymp-register-icon"><use xlink:href="#olymp-register-icon"></use></svg>
						</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content" id="registration-form-tabs-content">
					<!-- @if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif -->
					@if ($message = Session::get('error'))
					<div class="alert alert-danger alert-block">
					    <strong>{{ $message }}</strong>
					</div>
					@endif
					@include('dashboard.includes.alert')
					<div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
						<div class="title h6">Register to Hapiom</div>
						<form class="content" method="POST" action="{{ route('admin-registration') }}">
                            {{ csrf_field() }}
							<div class="row">
								<div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
									<div class="form-group label-floating">
										<label class="control-label">First Name</label>
										<input class="form-control" placeholder="" type="text" name="first_name" value="{{ old('first_name') }}">
									</div>
								</div>
								<div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
									<div class="form-group label-floating">
										<label class="control-label">Last Name</label>
										<input class="form-control" placeholder="" type="text" name="last_name" value="{{ old('last_name') }}">
									</div>
								</div>
								<div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="form-group label-floating">
										<label class="control-label">Your Email</label>
										<input class="form-control" placeholder="" type="email" name="email" autocomplete="abc" value="{{ old('email') }}">
									</div>
									<div class="form-group label-floating">
										<label class="control-label">Your Password</label>
										<input class="form-control" placeholder="" type="password" name="password" autocomplete="abc" >
									</div>
									<input type="hidden" name="role" value="3">

									<div class="form-group date-time-picker label-floating d-none">
										<label class="control-label">Your Birthday</label>
										<input name="datetimepicker" value="10/24/1984" />
										<span class="input-group-addon">
														<svg class="olymp-calendar-icon"><use xlink:href="#olymp-calendar-icon"></use></svg>
													</span>
									</div>

									<div class="form-group label-floating is-select d-none">
										<label class="control-label">Your Gender</label>
										<select class="form-select">
											<option value="MA">Male</option>
											<option value="FE">Female</option>
										</select>
									</div>

									<div class="remember">
										<div class="checkbox">
											<label>
												<input name="optionsCheckboxes" type="checkbox">
												I accept the <a href="#" data-bs-toggle="modal" data-bs-target="#main-popup-term-condition">Terms and Conditions</a> of the website
											</label>
										</div>
									</div>
									<button type="submit" class="btn btn-purple btn-lg full-width">Complete Registration!</button>
								</div>
							</div>
						</form>
					</div>

					<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<div class="title h6">Login to your Account</div>
						<form class="content" method="POST" action="{{ route('userlogin') }}">
                            {{ csrf_field() }}
							<div class="row">
								<div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="form-group label-floating">
										<label class="control-label">Your Email</label>
										<input class="form-control" placeholder="" type="email" name="email">
										@if(session()->has('message'))
										    <div class="alert alert-success">
										        {{ session()->get('message') }}
										    </div>
										@endif
									</div>
									<div class="form-group label-floating">
										<label class="control-label">Your Password</label>
										<input class="form-control" placeholder="" type="password" name="password">
									</div>

									<div class="remember">

										<div class="checkbox">
											<label>
												<input name="optionsCheckboxes" type="checkbox">
												Remember Me
											</label>
										</div>
										<a href="#" class="forgot" data-bs-toggle="modal" data-bs-target="#restore-password">Forgot my Password</a>
									</div>

									<button type="submit" class="btn btn-lg btn-primary full-width">Login</button>

									<div class="or"></div>

									<a href="#" class="btn btn-lg bg-facebook full-width btn-icon-left"><svg width="16" height="16"><use xlink:href="#olymp-facebook-icon"></use></svg>Login with Facebook</a>

									<a href="#" class="btn btn-lg bg-twitter full-width btn-icon-left"><svg width="16" height="16"><use xlink:href="#olymp-twitter-icon"></use></svg>Login with Twitter</a>


									<p>Don’t you have an account? <a href="#">Register Now!</a> it’s really simple and you can start enjoing all the benefits!</p>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			<!-- ... end Login-Registration Form  -->		</div>
	</div>
</div>

<!-- Window-popup Restore Password -->

<div class="modal fade" id="restore-password" tabindex="-1" role="dialog" aria-labelledby="restore-password" aria-hidden="true">
	<div class="modal-dialog window-popup restore-password-popup" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-bs-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
			</a>

			<div class="modal-header">
				<h6 class="title">Restore your Password</h6>
			</div>

			<div class="modal-body">
				<form  method="get">
					<p>Enter your email and click the send code button. You’ll receive a code in your email. Please use that
						code below to change the old password for a new one.
					</p>
					<div class="form-group label-floating">
						<label class="control-label">Your Email</label>
						<input class="form-control" placeholder="" type="email" value="james-spiegel@yourmail.com">
					</div>
					<button class="btn btn-purple btn-lg full-width">Send me the Code</button>
					<div class="form-group label-floating">
						<label class="control-label">Enter the Code</label>
						<input class="form-control" placeholder="" type="text" value="">
					</div>
					<div class="form-group label-floating">
						<label class="control-label">Your New Password</label>
						<input class="form-control" placeholder="" type="password" value="Hapiom">
					</div>
					<button class="btn btn-primary btn-lg full-width">Change your Password!</button>
				</form>

			</div>
		</div>
	</div>
</div>

<!-- ... end Window-popup Restore Password -->


<!-- Window Popup Main Search -->

<div class="modal fade" id="main-popup-search" tabindex="-1" role="dialog" aria-labelledby="main-popup-search" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered window-popup main-popup-search" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-bs-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
			</a>
			<div class="modal-body">
				<form class="form-inline search-form" method="post">
					<div class="form-group label-floating">
						<label class="control-label">What are you looking for?</label>
						<input class="form-control bg-white" placeholder="" type="text" value="">
					</div>

					<button class="btn btn-purple btn-lg">Search</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="main-popup-term-condition" tabindex="-1" role="dialog" aria-labelledby="main-popup-term-condition" aria-hidden="true">
	<div class="modal-dialog  modal-dialog-centered  main-popup-term-condition" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-bs-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
			</a>
			<div class="modal-body">
				<form class="form-inline search-form" method="post">
					<p>System should be that if someone does not pay within 2 weeks of their due date, their
						account is put on hold and they cannot login until they pay.</p>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- ... end Window Popup Main Search -->

<!-- JS Scripts -->
<script src="{{ url('public/assets/dashboard/js/jQuery/jquery-3.5.1.min.js') }}"></script>

<script src="{{ url('public/assets/dashboard/js/libs/jquery.mousewheel.min.js') }}"></script>
<script src="{{ url('public/assets/dashboard/js/libs/perfect-scrollbar.min.js') }}"></script>
<script src="{{ url('public/assets/dashboard/js/libs/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ url('public/assets/dashboard/js/libs/material.min.js') }}"></script>
<script src="{{ url('public/assets/dashboard/js/libs/selectize.min.js') }}"></script>
<script src="{{ url('public/assets/dashboard/js/libs/moment.min.js') }}"></script>
<script src="{{ url('public/assets/dashboard/js/libs/daterangepicker.min.js') }}"></script>
<script src="{{ url('public/assets/dashboard/js/libs/isotope.pkgd.min.js') }}"></script>
<script src="{{ url('public/assets/dashboard/js/libs/ajax-pagination.min.js') }}"></script>
<script src="{{ url('public/assets/dashboard/js/libs/jquery.magnific-popup.min.js') }}"></script>

<script src="{{ url('public/assets/dashboard/js/main.js') }}"></script>
<script src="{{ url('public/assets/dashboard/js/libs-init/libs-init.js') }}"></script>

<script src="{{ url('public/assets/dashboard/Bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

<!-- SVG icons loader -->
<script src="{{ url('public/assets/dashboard/js/svg-loader.js') }}"></script>
<!-- /SVG icons loader -->
<script type="text/javascript">
	$( document ).ready(function() {
	    $('input').attr('autocomplete','abc');
	});
</script>
</body>
</html>