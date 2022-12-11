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

<div class="container">
	<div class="row">
		<div class="col col-xl-12 order-xl-2 col-lg-12 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Edit Ads</h6>
					<a href="{{ route('ads.index') }}" class="btn btn-primary btn-md-2 float-right">Back<div class="ripple-container"></div></a>
				</div>
				<div class="ui-block-content">
					<!-- Personal Information Form  -->
					@include('dashboard.includes.alert')

						<div class="row">
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating is-select">
									<label class="control-label">Title</label>
									<input class="form-control" type="text" placeholder="" value="{{ @$googlead->title }}" name="title" required="">
									<span class="invalid-feedback">
										<span class="error-box">
											Title is required
										</span>
									</span>
								<span class="material-input"></span></div>
							</div>
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating is-select">
									<label class="control-label" for="direction">Direction</label>
									<select class="form-select form-control" name="direction" id="direction" required="">
										<option value="1" @if($googlead->direction == 1) {{ 'selected' }} @endif>Horizantal</option>
										<option value="0" @if($googlead->direction == 0) {{ 'selected' }} @endif>Vertical</option>
									</select>
									<span class="invalid-feedback">
										<span class="error-box">
											Direction is required
										</span>
									</span>
								</div>
							</div>
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Image</label>
									<input class="form-control" type="file" placeholder="" name="image" id="image">
								</div>
							</div>
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
								     <img src="{{ url('images/ads/'.@$googlead->image) }}">
								</div>
							</div>

							<div class="col col-lg-12 col-md-12 col-sm-12 col-12 mb30">
								<h6>Status</h6>
								<div class="radio">
									<label>
										<input type="radio" name="status" @if(@$googlead->status == 1) {{ 'checked=""' }} @endif value="1"><span class="circle"></span><span class="check"></span>
										Active
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="status" @if(@$googlead->status == 0) {{ 'checked=""' }} @endif value="0"><span class="circle"></span><span class="check"></span>
										In-active
									</label>
								</div>
							</div>
							
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating is-select">
									<label class="control-label" for="place">Target placement</label>
									<select class="form-select form-control" name="group_id" id="place" required="">
										<option value="0" @if($googlead->group_id == 0) {{ 'selected' }} @endif>Main feed</option>
										@foreach($groups as $group)
										<option value="{{ $googlead->group_id }}" @if($googlead->group_id == $group->id) {{ 'selected' }} @endif>{{ $group->name }}</option>
										@endforeach
									</select>
									<span class="invalid-feedback">
										<span class="error-box">
											Direction is required
										</span>
									</span>
								</div>
							</div>
						</div>


					<!-- ... end Personal Information Form  -->
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('page-js-link') @endsection
@section('page-js') @endsection