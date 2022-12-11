@extends('dashboard.layouts.master')
@section('title', ' Product Details')
@section('page', ' Product Details')
@section('page-css-link') @endsection
@section('page-css')
<style>
	.img_card {
		width: 100%;
		height: 300px;
		border: 1px red dotted;
	}
	.product_img {
		width: 100%;
		height: 100%;
	}
	.store-info {
		height: 350px;
	}
	.store-inner-info {
    background-color: #ffffff;
    opacity: 0.7;
    padding-top: 20px;
    padding-bottom: 10px;
		border-radius: 20px;
		height: 250px;
	}
	.iq-edit-profile .nav-link {
    padding: 15px 5px;
	}
	.hide {
		display: none;
	}
</style>
@endsection
@section('main-content')
<div id="content-page" class="content-page">
	<div class="container">
		<div class="store-info">
			<div class="p-5">
				<div class="store-inner-info text-center">
					<h3>{{ $store->sname }}</h3>
					<p class="px-5" style="color: black">{{ $store->description }}</p>
					<span style="color: black">Created by <span>
					@if (isset($store->master->userInfo->profile_image))
						<img src="{{ url('images/profile', $store->master->userInfo->profile_image) }}" alt="chatuserimage" class="avatar-45" style="border-radius: 50%;">
					@else
						<img src="{{url('assets/dashboard/img/default-avatar.png')}}" alt="chatuserimage" class="avatar-45" style="border-radius: 50%;">
					@endif
					<span style="color: black">{{ $store->master->name }}</span>
					<div class="mt-3"><i class="fas fa-store-alt mr-2"></i>{{ $store->created_at }}</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="iq-card">
					<div class="iq-card-body p-0">
						<div class="iq-edit-list">
							<ul class="iq-edit-profile d-flex nav nav-pills">
								<li class="col-md-4 p-0">
									<a class="nav-link active" data-toggle="pill" href="#goods">
										Goods
									</a>
								</li>
								<li class="col-md-4 p-0">
									<a class="nav-link" data-toggle="pill" href="#courses">
										Courses
									</a>
								</li>
								<li class="col-md-4 p-0">
									<a class="nav-link" data-toggle="pill" href="#services">
										Services
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="tab-content">
					<div class="tab-pane fade active show" id="goods" role="tabpanel">
						<div class="row">
							@foreach ($goods as $good)
							<div class="col-sm-6 col-md-6 col-lg-4">
								<div class="iq-card iq-card-block iq-card-stretch iq-card-height product">
									<div class="iq-card-body">
										<div class="d-flex align-items-center justify-content-between pb-3">
											<div class="d-flex align-items-center">
												<div class="media-body ml-2">
													<h5><a href="{{ route('store-product-detail',$good->id) }}">{{ $good->name }}</a></h5>
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
										<div class="image-block position-relative img_card">
											<a href="{{ route('store-product-detail',$good->id) }}">
												<img src="{{ url('images/product/'.$good->image_video) }}" class="img-fluid w-100 rounded product_img" alt="product-img">
											</a>
											<h6 class="price"><span class="regular-price text-dark pr-2"></span>${{$good->price}}</h6>
										</div>
										<div class="mt-3">
											<a href="javascript:void(0)" data-id="{{$good->id}}" class="add-to-cart @if(in_array($good->id, $cartIds)) hide @endif">
												<i class="fas fa-cart-plus" style="font-size: 18px"></i>
											</a>
											<a href="javascript:void(0)" style="float:right; font-weight: bold">Buy Now</a>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<div class="tab-pane fade" id="courses" role="tabpanel">
						<div class="row">
							@foreach ($courses as $course)
							<div class="col-sm-6 col-md-6 col-lg-4">
								<div class="iq-card iq-card-block iq-card-stretch iq-card-height product">
									<div class="iq-card-body">
										<div class="d-flex align-items-center justify-content-between pb-3">
											<div class="d-flex align-items-center">
												<div class="media-body ml-2">
													<h5><a href="{{ route('store-product-detail',$course->id) }}">{{ $course->name }}</a></h5>
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
										<div class="image-block position-relative" style="padding-bottom:40px; border: 1px red dotted">
											<a href="{{ route('store-product-detail',$course->id) }}"><img src="{{ $course->thumbnail }}" class="img-fluid w-100 rounded product_img" alt="product-img"></a>
											<h6 class="price"><span class="regular-price text-dark pr-2"></span>${{$course->price}}</h6>
										</div>
										<div class="mt-3">
											<a href="javascript:void(0)" data-id="{{$course->id}}" class="add-to-cart @if(in_array($course->id, $cartIds)) hide @endif">
												<i class="fas fa-cart-plus" style="font-size: 18px"></i>
											</a>
											<a href="javascript:void(0)" style="float:right; font-weight: bold">Buy Now</a>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<div class="tab-pane fade" id="services" role="tabpanel">
						<div class="row">
							@foreach ($services as $service)
							<div class="col-sm-6 col-md-6 col-lg-4">
								<div class="iq-card iq-card-block iq-card-stretch iq-card-height product">
									<div class="iq-card-body">
										<div class="d-flex align-items-center justify-content-between pb-3">
											<div class="d-flex align-items-center">
												<div class="media-body ml-2">
													<h6><a href="{{ route('store-product-detail',$service->id) }}">{{ $service->name }}</a></h6>
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
										<div class="image-block position-relative img_card">
											<a href="{{ route('store-product-detail',$service->id) }}"><img src="{{ url('images/product/'.$service->image_video) }}" class="img-fluid w-100 rounded product_img" alt="product-img"></a>
											<h6 class="price"><span class="regular-price text-dark pr-2"></span>${{$service->price}}</h6>
										</div>
										<div class="mt-3">
											<a href="javascript:void(0)" data-id="{{$service->id}}" class="add-to-cart @if(in_array($service->id, $cartIds)) hide @endif">
												<i class="fas fa-cart-plus" style="font-size: 18px"></i>
											</a>
											<a href="javascript:void(0)" style="float:right; font-weight: bold">Buy Now</a>
										</div>
									</div>
								</div>
							</div>
							@endforeach
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
		let storeImage = "{{ url('images/store', $store->image) }}";
		$(".store-info").css('background', `url(${storeImage}) no-repeat center`);
		$(".store-info").css('background-size', 'cover');

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
	});

</script>
@endsection