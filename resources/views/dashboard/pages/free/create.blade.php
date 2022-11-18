@extends('dashboard.layouts.master')
@section('title', ' Free Create')
@section('page', ' Free Create')
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
					<h6 class="title">Add New Free</h6>
					<a href="{{ route('free') }}" class="btn btn-primary btn-md-2 float-right">Back<div class="ripple-container"></div></a>
				</div>
				<div class="ui-block-content">
					@include('dashboard.includes.alert')
					<form class="needs-validation" method="post" action="{{ route('free-save') }}" enctype="multipart/form-data" novalidate >
						@csrf
					
						<div class="crumina-module crumina-heading with-title-decoration">
							<h5 class="heading-title">Free</h5>
						</div>

						<div class="row">
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Free Name</label>
									<input class="form-control" type="text" name="free_name" id="free_name" placeholder="" value="{{ old('free_name') }}" required>
									<span class="invalid-feedback">
										<span class="error-box">
											Free Name is required
										</span>
									</span>
								</div>
							</div>
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Description</label>
									<textarea class="form-control" name="description" id="description" required>{{ old('description') }}</textarea>
									<span class="invalid-feedback">
										<span class="error-box">
											Description is required
										</span>
									</span>
								</div>
							</div>
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Image</label>
									<input class="form-control" type="file" placeholder="" name="image" id="image" required>
									<span class="invalid-feedback">
										<span class="error-box">
											Image is required
										</span>
									</span>
								</div>
							</div>

							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating is-select">
									<label class="control-label">Status</label>
									<select class="form-select form-control" name="free_status" id="free_status">
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