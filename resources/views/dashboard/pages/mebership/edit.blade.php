@extends('dashboard.layouts.master')
@section('title', ' Mebership')
@section('page', ' Mebership')
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
					<h6 class="title">Update Level</h6>
					<a href="{{ route('mebership') }}" class="btn btn-primary btn-md-2 float-right">Back<div class="ripple-container"></div></a>
				</div>
				<div class="ui-block-content">					
					<!-- Personal Information Form  -->
				    @include('dashboard.includes.alert')					
					<form method="POST" action="{{ route('mebership-update',$meberships->id) }}">
						@csrf
						<div class="row">
					
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Level Name</label>
									<input class="form-control" placeholder="" id="name" name="name" type="text" value="{{ $meberships->name }}">
								</div>
							</div>

							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Amount</label>
									<input class="form-control" placeholder="" id="amount" name="amount" type="text" value="{{ $meberships->amount }}">
								</div>
							</div>
					
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group label-floating is-select">
									<label class="control-label">Status</label>
									<select class="form-select" id="levelstatus" name="levelstatus"> 
										<option value="1" @if($meberships->levelstatus == 1) {{ 'selected' }} @endif>Active</option>
										<option value="0" @if($meberships->levelstatus == 0) {{ 'selected' }} @endif>Inactive</option>
									</select>
								</div>								
							</div>
							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								@if($storemasters->count() > 0)
                                @foreach ($storemasters as $storemaster)
								<div class="description-toggle">
									<div class="description-toggle-content">
										<div class="h6">{{ $storemaster->name }}</div>
									</div>
									<div class="togglebutton">
										<label>
											<input type="checkbox" name="store[]" checked="" value="{{ $storemaster->id }}" >
										</label>
									</div>
								</div>
								@endforeach
								@endif
							</div>											
							
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<button class="btn btn-secondary btn-lg full-width">Restore all Attributes</button>
							</div>
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<button class="btn btn-primary btn-lg full-width">Save all Changes</button>
							</div>
					
						</div>
					</form>
					
					<!-- ... end Personal Information Form  -->
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('page-js-link') @endsection
@section('page-js') @endsection