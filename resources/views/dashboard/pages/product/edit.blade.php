@extends('dashboard.layouts.master')
@section('title', ' Product')
@section('page', ' Product')
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
					<h6 class="title">Update Product</h6>
					<a href="{{ route('product') }}" class="btn btn-primary btn-md-2 float-right">Back<div class="ripple-container"></div></a>
				</div>
				<div class="ui-block-content">
					@include('dashboard.includes.alert')					
					<form class="needs-validation" method="POST" action="{{ route('product-update',$product->id) }}" enctype="multipart/form-data" novalidate>
						@csrf
						<div class="crumina-module crumina-heading with-title-decoration">
							<h5 class="heading-title">Product</h5>
						</div>

						<div class="row">
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Product</label>
									<input class="form-control" type="text" name="product_name" placeholder="" value="{{ $product->product }}" required>
									<span class="invalid-feedback">
										<span class="error-box">
											Product is required
										</span>
									</span>
								</div>
							</div>
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Description</label>
									<textarea class="form-control" name="description" id="description" required>{{ $product->description }}</textarea>
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
									<input class="form-control" type="file" name="image" id="image">
								</div>
							</div>
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
								    <img src="{{ url('public/images/product/'.$product->image) }}" style="max-width: 65px;">
								</div>
							</div>

							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating is-select">
									<label class="control-label">Status</label>
									<select class="form-select form-control" name="product_status" id="product_status">
										<option value="1" @if($product->product_status == 1) {{ 'selected' }} @endif>Active</option>
										<option value="0" @if($product->product_status == 0) {{ 'selected' }} @endif>Inactive</option>
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