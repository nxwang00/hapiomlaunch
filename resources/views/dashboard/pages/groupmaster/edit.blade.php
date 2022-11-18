@extends('dashboard.layouts.master')
@section('title', ' Group Type')
@section('page', ' Group Type')
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
					<h6 class="title">Update Group</h6>
					<a href="{{ route('group') }}" class="btn btn-primary btn-md-2 float-right">Back<div class="ripple-container"></div></a>
				</div>
				<div class="ui-block-content">
					@include('dashboard.includes.alert')
					<form method="post" action="{{ route('group-update',$groupmaster->id) }}" enctype="multipart/form-data" class="needs-validation"  novalidate>
						@csrf
						<div class="row">
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating is-empty">
									<label class="control-label">Name</label>
									<input class="form-control" type="text" placeholder="" value="{{ $groupmaster->name }}" name="name" required="">
									<span class="invalid-feedback">
										<span class="error-box">
											Name is required
										</span>
									</span>
								<span class="material-input"></span></div>
							</div>
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating is-select">
									<label class="control-label">Select User Admin</label>
									<select class="form-select form-control" name="users[]"  multiple="" required="">
										@foreach($users as $user)										  
										    <option value="{{ $user->id }}" @if(in_array($user->id, $groupadmins)) {{'selected'}} @endif>{{ $user->name }}</option>
										@endforeach
									</select>
									<span class="invalid-feedback">
										<span class="error-box">
											User Admin is required
										</span>
									</span>
								<span class="material-input"></span></div>

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
									<label class="control-label">Type</label>
									<select class="form-select form-control" name="group_type" id="group_type">
										<option value="1" @if($groupmaster->group_type == 1) {{ 'selected' }} @endif>Paid</option>
										<option value="0" @if($groupmaster->group_type == 0) {{ 'selected' }} @endif>Free</option>
									</select>
								</div>
							</div>
							<div class="col col-lg-12 col-md-12 col-sm-12 col-12 mb30">
								<h6>Status</h6>
								<div class="radio">
									<label>
										<input type="radio" name="status" @if($groupmaster->status == 1) {{ 'checked=""' }} @endif value="1"><span class="circle"></span><span class="check"></span>
										Active
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="status" @if($groupmaster->status == 0) {{ 'checked=""' }} @endif  value="0"><span class="circle"></span><span class="check"></span>
										In-active
									</label>
								</div>
							</div>							
							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								
								<input class="form-control" type="hidden" placeholder="" name="email">
							    <a href="{{ route('group') }}" class="btn btn-secondary btn-sm">Cancel</a>
								<button class="btn btn-primary btn-sm btn-invite-user" type="submit">Submit form</button>
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