@extends('dashboard.layouts.master')
@section('title', ' Personal Information')
@section('page', ' Personal Information')
@section('page-css-link') @endsection
@section('page-css') @endsection
@section('main-content')
<div class="header-spacer header-spacer-small"></div>

<!-- Main Header Account -->
@include('dashboard.includes.header-profile');
<!-- <div class="main-header">
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
	@if(isset($$user_info->profile_image))
	<img class="img-bottom rounded" src="{{ url('public/images/profile',@$user_info->profile_image) }}" width="210" height="153">
	@endif
</div> -->

<!-- ... end Main Header Account -->



<!-- Your Account Personal Information -->

<div class="container">
	<div class="row">
		<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">

			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Personal Information</h6>
				</div>
				<div class="ui-block-content">
					@include('dashboard.includes.alert')
					
					<form class="needs-validation" method="post" action="{{ route('personal-information-save') }}" enctype="multipart/form-data" novalidate>
					@csrf
						<div class="crumina-module crumina-heading with-title-decoration">
							<h5 class="heading-title">Information</h5>
						</div>

						<div class="row">
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">First Name</label>
									<input class="form-control" type="text" name="first_name" id="first_name" value="{{ Auth::user()->first_name }}" required>
									<span class="invalid-feedback">
										<span class="error-box">
											First Name is required
										</span>
									</span>
								</div>
							</div>
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Last Name</label>
									<input class="form-control" type="text" name="last_name" id="last_name" value="{{ Auth::user()->last_name }}" required>
									<span class="invalid-feedback">
										<span class="error-box">
											Last Name is required
										</span>
									</span>
								</div>
							</div>
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Email</label>
									<input class="form-control" type="email" name="email" id="email" value="{{ Auth::user()->email }}" required>
									<span class="invalid-feedback">
										<span class="error-box">
											Email is required
										</span>
									</span>
								</div>
							</div>
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Your Website</label>
									<input class="form-control" type="text" name="website" id="website" value="{{ @$user_info->website }}" required>
									<span class="invalid-feedback">
										<span class="error-box">
											Your website is required
										</span>
									</span>
								</div>
							</div>

							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Your Birthday</label>
									<input class="form-control" type="text" name="datetimepicker" id="dob" value="{{ @$user_info->dob }}" required>
									<span class="input-group-addon">
										<svg class="olymp-month-calendar-icon icon"><use xlink:href="#olymp-month-calendar-icon"></use></svg>
									</span>
									<span class="invalid-feedback">
										<span class="error-box">
											Your Birthday is required
										</span>
									</span>
								</div>
							</div>

							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Your Phone Number</label>
									<input class="form-control" type="text" name="phone_number" id="phone_number" value="{{ @$user_info->phone_number }}" required>
									<span class="invalid-feedback">
										<span class="error-box">
											Your number is required
										</span>
									</span>
								</div>
							</div>

							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Country</label>
									<input class="form-control" type="text" name="country" id="country" value="{{ @$user_info->country }}" required>
									<span class="invalid-feedback">
										<span class="error-box">
											Country is required
										</span>
									</span>
								</div>
							</div>

							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">State</label>
									<input class="form-control" type="text" name="state" id="state" value="{{ @$user_info->state }}" required>
									<span class="invalid-feedback">
										<span class="error-box">
											State is required
										</span>
									</span>
								</div>
							</div>

							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">City</label>
									<input class="form-control" type="text" name="city" id="city" value="{{ @$user_info->city }}" required>
									<span class="invalid-feedback">
										<span class="error-box">
											City is required
										</span>
									</span>
								</div>
							</div>

							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Description</label>
									<textarea class="form-control" name="description" id="description">{{ @$user_info->description }}</textarea>
									<span class="invalid-feedback">
										<span class="error-box">
											Description is required
										</span>
									</span>
								</div>
							</div>

							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Birth Place</label>
									<input class="form-control" type="text" name="birth_place" id="birth_place" value="{{ @$user_info->birth_place }}" required>
									<span class="invalid-feedback">
										<span class="error-box">
											Birthplace is required
										</span>
									</span>
								</div>
							</div>

							<div class="col col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12">
								<div class="form-group label-floating is-select">
									<label class="control-label">Gender</label>
									<select class="form-select form-control" name="gender" id="gender">
										<option value="1" {{@$user_info->gender == 1  ? 'selected' : ''}}>Male</option>
										<option value="0" {{@$user_info->gender == 0  ? 'selected' : ''}}>Female</option>
									</select>
								</div>
							</div>

							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Your Occupation</label>
									<input class="form-control" type="text" name="occupation" id="occupation" value="{{ @$user_info->occupation }}" required>
									<span class="invalid-feedback">
										<span class="error-box">
											Occupation is required
										</span>
									</span>
								</div>
							</div>
							<div class="col col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12">
								<div class="form-group label-floating is-select">
									<label class="control-label">Status</label>
									<select class="form-select form-control" name="marriage_status" id="marriage_status">
										<option value="1" {{@$user_info->marriage_status == 1  ? 'selected' : ''}}>Married</option>
										<option value="0" {{@$user_info->marriage_status == 0  ? 'selected' : ''}}>Not Married</option>
									</select>
								</div>
							</div>
							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Your Facebook Account</label>
									<input class="form-control" type="text" name="facebook_url" id="facebook_url" value="{{ @$user_info->facebook_url }}" required>
									<span class="input-group-addon"><svg class="c-facebook" width="20" height="20"><use xlink:href="#olymp-facebook-icon"></use></svg></span>
									<span class="invalid-feedback">
										<span class="error-box">
											Facebook account is required
										</span>
									</span>
								</div>
							</div>
							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Profile Image</label>
									<input class="form-control" type="file" name="profile_image" id="profile_image">
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