@extends('dashboard.layouts.master')
@section('title', ' Personal Information')
@section('page', ' Personal Information')
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
	<img class="img-bottom" src="{{ url('public/assets/dashboard/img/account-bottom.webp') }}" width="1169" height="153">
</div>

<!-- ... end Main Header Account -->



<!-- Your Account Personal Information -->

<div class="container">
	<div class="row">
		<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">

			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Change Password</h6>
				</div>
				<div class="ui-block-content">
					 @include('dashboard.includes.alert')
					<form class="needs-validation" method="post" action="{{ route('change-password-save') }}" novalidate>

						@csrf
					
						<div class="crumina-module crumina-heading with-title-decoration">
							<h5 class="heading-title">Change Password</h5>
						</div>

						<div class="row">
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Confirm Current Password</label>
									<input class="form-control" type="password" name="current_password" id="current_password" placeholder="" value="{{ old('current_password') }}" required>
									<span class="invalid-feedback">
										<span class="error-box">
											Current Password is required
										</span>
									</span>
								</div>
							</div>
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label"> Current New Password</label>
									<input class="form-control" type="password" name="new_password" id="new_password" placeholder="" value="{{ old('new_password') }}" required>
									<span class="invalid-feedback">
										<span class="error-box">
											Current New Password is required
										</span>
									</span>
								</div>
							</div>
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label"> Confirm New Password</label>
									<input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="" value="{{ old('confirm_password') }}" required>
									<span class="invalid-feedback">
										<span class="error-box">
											Confirm New Password is required
										</span>
									</span>
								</div>
							</div>

							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

								<button class="btn btn-md btn-primary" type="submit">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		@include('dashboard.includes.profile-sidebar')
	</div>
</div>

<!-- ... end Your Account Personal Information -->

@endsection
@section('page-js-link') @endsection
@section('page-js') @endsection