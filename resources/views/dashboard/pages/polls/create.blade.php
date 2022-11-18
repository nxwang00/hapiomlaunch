@extends('dashboard.layouts.master')
@section('title', ' Polls Create')
@section('page', ' Polls Create')
@section('page-css-link') @endsection
@section('page-css')
<style type="text/css">
	.float-right {
	  float: right !important;
	}
</style> 
@endsection
@section('main-content')
<!-- Top Header-Profile -->
<div class="header-spacer"></div>

<div class="container">
	<div class="row">
		<div class="col col-xl-12 order-xl-2 col-lg-12 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">

			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Add New Polls</h6>
					<a href="{{ route('polls') }}" class="btn btn-primary btn-md-2 float-right">Back<div class="ripple-container"></div></a>
				</div>
				<div class="ui-block-content">
					 @include('dashboard.includes.alert')
					<form class="needs-validation" method="post" action="{{ route('polls-save') }}" enctype="multipart/form-data" novalidate>
						@csrf
					
						<div class="crumina-module crumina-heading with-title-decoration">
							<h5 class="heading-title">Polls</h5>
						</div>

						<div class="row">
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Title</label>
									<input class="form-control" type="text" name="title" id="title" placeholder="" value="{{ old('title') }}" required>
									<span class="invalid-feedback">
										<span class="error-box">
											Title is required
										</span>
									</span>
								</div>
							</div>
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Question</label>
									<textarea class="form-control" name="question" id="question" required>{{ old('question') }}</textarea>
									<span class="invalid-feedback">
										<span class="error-box">
											Question is required
										</span>
									</span>
								</div>
							</div>
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Option A</label>
									<input class="form-control" type="text" name="optiona" id="optiona" placeholder="" value="{{ old('optiona') }}" required>
									<span class="invalid-feedback">
										<span class="error-box">
											Option A is required
										</span>
									</span>
								</div>
							</div>
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Option B</label>
									<input class="form-control" type="text" name="optionb" id="optionb" placeholder="" value="{{ old('optionb') }}" required>
									<span class="invalid-feedback">
										<span class="error-box">
											Option B is required
										</span>
									</span>
								</div>
							</div>

							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Option C</label>
									<input class="form-control" type="text" name="optionc" id="optionc" placeholder="" value="{{ old('optionc') }}" required>
									<span class="invalid-feedback">
										<span class="error-box">
											Option C is required
										</span>
									</span>
								</div>
							</div>

							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Option D</label>
									<input class="form-control" type="text" name="optiond" id="optiond" placeholder="" value="{{ old('optiond') }}" required>
									<span class="invalid-feedback">
										<span class="error-box">
											Option D is required
										</span>
									</span>
								</div>
							</div>
							

							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating is-select">
									<label class="control-label">Status</label>
									<select class="form-select form-control" name="polls_status" id="polls_status">
										<option value="1">Active</option>
										<option value="0">Inactive</option>
									</select>
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
	</div>
</div>
@endsection
@section('page-js-link') @endsection
@section('page-js') @endsection