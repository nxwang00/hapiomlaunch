@extends('dashboard.layouts.master')
@section('title', ' User List')
@section('page', ' User List')
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
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">{{ @$user->name }} Details</h6>
					<a href="{{ route('user.index') }}" class="btn btn-primary btn-md-2 float-right">Back<div class="ripple-container"></div></a>
				</div>
				<div class="ui-block-content">
				    @include('dashboard.includes.alert')
					<form class="crumina-submit" method="post" data-nonce="crumina-submit-form-nonce" data-type="standard" action="{{ route('user.addcomment') }}" novalidate>
						@csrf
						<div class="crumina-module crumina-heading with-title-decoration">
							<h5 class="heading-title">Comment</h5>
						</div>
                        <input type="hidden" name="user_id" value="{{ @$user->id }}">
						<div class="row">
							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Comment</label>
									<textarea name="comment" class="form-control valid" type="text" placeholder="" required="" aria-invalid="false"> {{ @$user->userInfo->comment }}</textarea><label id="message-error" class="error" for="message" style="display: none;"></label>
								<span class="material-input"></span></div>
								@error('comment')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
								<button class="btn btn-md btn-primary">Add<div class="ripple-container"></div></button>
							</div>
						</div>
					</form>
				</div>
				<div class="ui-block-title">
					<h6 class="title">Refund Payment</h6>
				</div>
				<div class="ui-block-content">
					<div class="row">
						<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<button class="btn btn-md btn-primary">Refund<div class="ripple-container"></div></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('page-js-link') @endsection
@section('page-js')
@endsection