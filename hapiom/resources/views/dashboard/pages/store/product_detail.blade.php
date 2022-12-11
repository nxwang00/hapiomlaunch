@extends('dashboard.layouts.master')
@section('title', ' Product Details')
@section('page', ' Product Details')
@section('page-css-link') @endsection
@section('page-css')
<style>
	.hide {
		display: none
	}
</style>
@endsection
@section('main-content')

<div id="content-page" class="content-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="iq-card shadow-none p-0">
					<div class="iq-card-header d-flex justify-content-between">
						<div class="iq-header-title">
							<h4 class="card-title">Product Detail</h4>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 col-md-6 col-lg-12">
						<div class="iq-card iq-card-block iq-card-stretch iq-card-height product">
							<div class="iq-card-body">
								<div class="row">
									<div class="col-md-5">
										<div class="d-flex align-items-center justify-content-between pb-3">
											<div class="d-flex align-items-center">
												<div class="media-body ml-2">
													<p class="mb-0 line-height">{{ $product->type }}</p>
													<h5>{{ $product->name }}</h5>
												</div>
											</div>
											<div class="d-block line-height">
												<span class="font-size-11 text-warning">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</span>
											</div>
										</div>
										<div class="image-block position-relative">
											@if ($product->type === 'course')
												<img src="{{ $product->thumbnail }}" class="img-fluid w-100 rounded" alt="product-img">
											@else
												<img src="{{ url('images/product/'.$product->image_video) }}" class="img-fluid w-100 rounded" alt="product-img">
											@endif
											<h6 class="price"><span class="regular-price text-dark pr-2"></span>${{ $product->price }}</h6>
										</div>
									</div>
									<div class="col-md-6 offset-1">
										<div class="product-description mt-3">
											<h6>Description</h6>
											<p class="mb-0">{{ $product->description }}</p>
											<a href="javascript:void(0)" data-id="{{ $product->id }}" class="add-to-cart btn btn-blue btn-md with--icon mt-3 @if(isset($cart)) hide @endif">
												<span class="categry text-primary pl-3 mb-2 position-relative">Add To Cart</span>
											</a><br/>
											<a href="javascript:void(0)" class="btn btn-blue btn-md with--icon">
												<span class="categry text-primary pl-3 mb-2 position-relative">Buy Now</span>
											</a>
										</div>
									</div>
								</div>
							</div>
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
<script type="text/javascript">
	$(document).ready(function() {
		$(".add-to-cart").on('click', function() {
			var product_id = $(this).data('id');
			var ele = $(this);
			toastr.options = {
				"closeButton": true,
				"newestOnTop": true,
				"positionClass": "toast-top-right"
			};
			route = `/cart/add/${product_id}`;
			$.ajax({
					url: route,
					method: "GET",
					success: function(data) {
						if (data === "ok") {
							toastr.success("Product is added to your cart.");
							ele.addClass('hide');
						} else {
							toastr.error("Adding to cart is failed.")
						}
					}
			})
		})
	})

</script>
@endsection