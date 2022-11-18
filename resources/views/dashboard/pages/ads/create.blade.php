@extends('dashboard.layouts.master')
@section('title', ' Ads')
@section('page', ' Ads')
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

<!-- Top Header-Profile -->
<div class="header-spacer"></div>

<div class="container">
	<div class="row">
		<div class="col col-xl-12 order-xl-2 col-lg-12 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
			<div class="ui-block">				
				<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Ads</h6>
				</div>
				<div class="ui-block-content">
					@include('dashboard.includes.alert')
					<form method="post" action="{{ route('ads.store') }}" enctype="multipart/form-data" class="needs-validation"  novalidate>
						@csrf
						<div class="row">
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating is-empty">
									<label class="control-label">Title</label>
									<input class="form-control" type="text" placeholder="" value="{{ old('title') }}" name="title" required="">
									<span class="invalid-feedback">
										<span class="error-box">
											Title is required
										</span>
									</span>
								<span class="material-input"></span></div>
							</div>
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Image</label>
									<input class="form-control" type="file" placeholder="" name="image" id="image" required="" value="{{ old('image') }}">
									<span class="invalid-feedback">
										<span class="error-box">
											Image is required
										</span>
									</span>
								</div>
							</div>
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating is-select">
									<label class="control-label">Position</label>
									<input class="form-control" type="text" placeholder="" value="{{ old('position') }}" name="position" id="position" required="">
									<span class="invalid-feedback">
										<span class="error-box">
											Position is required
										</span>
									</span>
								</div>
							</div>

							<div class="col col-lg-12 col-md-12 col-sm-12 col-12 mb30">
								<h6>Status</h6>
								<div class="radio">
									<label>
										<input type="radio" name="status" checked="" value="1"><span class="circle"></span><span class="check"></span>
										Active
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="status"  value="0"><span class="circle"></span><span class="check"></span>
										In-active
									</label>
								</div>
							</div>							
							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								
								<input class="form-control" type="hidden" placeholder="" name="email">
							    <a href="{{ route('ads.index') }}" class="btn btn-secondary btn-sm">Cancel</a>
								<button class="btn btn-primary btn-sm btn-invite-user" type="submit">Submit form</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('page-js-link') @endsection
@section('page-js')
