@extends('dashboard.layouts.master')
@section('title', ' Free List')
@section('page', ' Free List')
@section('page-css-link') @endsection
@section('page-css') @endsection
@section('main-content')
<!-- Stunning header -->

<div class="stunning-header bg-primary-opacity">

	<!-- Header Standard Landing  -->

	<div class="header--standard header--standard-landing" id="header--standard">
		<div class="container">
			<div class="header--standard-wrap">

				<a href="#" class="logo">
					<div class="img-wrap">
						<img loading="lazy" src="img/logo.webp" alt="Hapiom" width="34" height="34">
						<img loading="lazy" src="img/logo-colored-small.webp" width="34" height="34" alt="Hapiom" class="logo-colored">
					</div>
					<div class="title-block">
						<h6 class="logo-title">Hapiom</h6>
						<div class="sub-title">SOCIAL NETWORK</div>
					</div>
				</a>

				<a href="#" class="open-responsive-menu js-open-responsive-menu">
					<svg class="olymp-menu-icon"><use xlink:href="#olymp-menu-icon"></use></svg>
				</a>

				<div class="nav nav-pills nav1 header-menu">
					<div class="mCustomScrollbar">
						<ul>
							<li class="nav-item">
								<a href="#" class="nav-link">Home</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" data-bs-hover="dropdown" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false" tabindex='1'>Profile</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#">Profile Page</a>
									<a class="dropdown-item" href="#">Newsfeed</a>
									<a class="dropdown-item" href="#">Post Versions</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-has-megamenu">
								<a href="#" class="nav-link dropdown-toggle" data-bs-hover="dropdown" data-bs-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false" tabindex='1'>Forums</a>
								<div class="dropdown-menu megamenu">
									<div class="row">
										<div class="col col-sm-3">
											<h6 class="column-tittle">Main Links</h6>
											<a class="dropdown-item" href="#">Profile Page<span class="tag-label bg-blue-light">new</span></a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
										</div>
										<div class="col col-sm-3">
											<h6 class="column-tittle">BuddyPress</h6>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page<span class="tag-label bg-primary">HOT!</span></a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
										</div>
										<div class="col col-sm-3">
											<h6 class="column-tittle">Corporate</h6>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
										</div>
										<div class="col col-sm-3">
											<h6 class="column-tittle">Forums</h6>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
										</div>
									</div>
								</div>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">Terms & Conditions</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">Events</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">Privacy Policy</a>
							</li>
							<li class="close-responsive-menu js-close-responsive-menu">
								<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
							</li>
							<li class="nav-item js-expanded-menu">
								<a href="#" class="nav-link">
									<svg class="olymp-menu-icon"><use xlink:href="#olymp-menu-icon"></use></svg>
									<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
								</a>
							</li>
							<li class="shoping-cart more">
								<a href="#" class="nav-link">
									<svg class="olymp-shopping-bag-icon"><use xlink:href="#olymp-shopping-bag-icon"></use></svg>
									<span class="count-product">2</span>
								</a>
								<div class="more-dropdown shop-popup-cart">
									<ul>
										<li class="cart-product-item">
											<div class="product-thumb">
												<img loading="lazy" src="img/product1.webp" alt="product" width="35" height="28">
											</div>
											<div class="product-content">
												<h6 class="title">White Enamel Mug</h6>
												<ul class="rait-stars">
													<li>
														<svg class="star-icon c-primary" width="10" height="10"><use xlink:href="#olymp-star-full"></use></svg>
													</li>
													<li>
														<svg class="star-icon c-primary" width="10" height="10"><use xlink:href="#olymp-star-full"></use></svg>
													</li>

													<li>
														<svg class="star-icon c-primary" width="10" height="10"><use xlink:href="#olymp-star-full"></use></svg>
													</li>
													<li>
														<svg class="star-icon c-primary" width="10" height="10"><use xlink:href="#olymp-star-full"></use></svg>
													</li>
													<li>
														<svg class="star-icon" width="10" height="10"><use xlink:href="#olymp-star-null"></use></svg>
													</li>
												</ul>
												<div class="counter">x2</div>
											</div>
											<div class="product-price">$20</div>
											<div class="more">
												<svg class="olymp-little-delete"><use xlink:href="#olymp-little-delete"></use></svg>
											</div>
										</li>
										<li class="cart-product-item">
											<div class="product-thumb">
												<img loading="lazy" src="img/product2.webp" alt="product" width="28" height="45">
											</div>
											<div class="product-content">
												<h6 class="title">Hapiom Orange Shirt</h6>
												<ul class="rait-stars">
													<li>
														<svg class="star-icon c-primary" width="10" height="10"><use xlink:href="#olymp-star-full"></use></svg>
													</li>
													<li>
														<svg class="star-icon c-primary" width="10" height="10"><use xlink:href="#olymp-star-full"></use></svg>
													</li>

													<li>
														<svg class="star-icon c-primary" width="10" height="10"><use xlink:href="#olymp-star-full"></use></svg>
													</li>
													<li>
														<svg class="star-icon c-primary" width="10" height="10"><use xlink:href="#olymp-star-full"></use></svg>
													</li>
													<li>
														<svg class="star-icon" width="10" height="10"><use xlink:href="#olymp-star-null"></use></svg>
													</li>
												</ul>
												<div class="counter">x1</div>
											</div>
											<div class="product-price">$40</div>
											<div class="more">
												<svg class="olymp-little-delete"><use xlink:href="#olymp-little-delete"></use></svg>
											</div>
										</li>
									</ul>

									<div class="cart-subtotal">Cart Subtotal:<span>$80</span></div>

									<div class="cart-btn-wrap">
										<a href="#" class="btn btn-primary btn-sm">Go to Your Cart</a>
										<a href="#" class="btn btn-purple btn-sm">Go to Checkout</a>
									</div>
								</div>
							</li>

							<li class="menu-search-item">
								<a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#main-popup-search">
									<svg class="olymp-magnifying-glass-icon"><use xlink:href="#olymp-magnifying-glass-icon"></use></svg>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- ... end Header Standard Landing  -->
	<div class="header-spacer--standard"></div>

	<div class="stunning-header-content">
		<h1 class="stunning-header-title">Free List</h1>
		<ul class="breadcrumbs">
			<li class="breadcrumbs-item">
				<a href="#">Home</a>
				<span class="icon breadcrumbs-custom">/</span>
			</li>
			<li class="breadcrumbs-item active">
				<span>Free List</span>
			</li>
		</ul>
	</div>

	<div class="content-bg-wrap stunning-header-bg1"></div>
</div>

<!-- End Stunning header -->


<section>
	<div class="container">
		<div class="row">
			<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="ui-block responsive-flex1200">
					<div class="ui-block-title">

						<div class="w-select">
							<div class="title">Filter By:</div>
							<fieldset class="form-group">
								<select class="form-select">
									<option value="NU">All Categories</option>
									<option value="NU">Favourite</option>
									<option value="NU">Likes</option>
								</select>
							</fieldset>
						</div>

						<div class="w-select">
							<fieldset class="form-group">
								<select class="form-select">
									<option value="NU">Date (Descending)</option>
									<option value="NU">Date (Ascending)</option>
								</select>
							</fieldset>
						</div>

						<div class="w-select">
							<fieldset class="form-group">
								<select class="form-select">
									<option value="AL">All Colors</option>
									<option value="RE">Red</option>
									<option value="GR">Green</option>
									<option value="BL">Blue</option>
								</select>
							</fieldset>
						</div>

						<a href="#" class="btn btn-blue btn-md-2">Filter Products</a>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="pt120">
	<div class="container">
		<div class="row">
			@if($results->count() > 0)
	            @foreach ($results as $index => $result)

				<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
					<a href="{{ route('free-details',$result->id) }}">
					<!-- Product Item -->

					<div class="shop-product-item">
						<div class="product-thumb">
							<img loading="lazy" src="{{ url('images/free/'.$result->image) }}" alt="product" width="230" height="218">
						</div>
						<div class="product-content">
							<div class="block-title">
								<a href="#" class="product-category">COFFEE MUGS</a>
								<a href="#" class="h5 title">{{ $result->free }}</a>
							</div>
							<div class="block-price">
								<ul class="rait-stars">
									<li>
										<svg class="star-icon c-primary" width="10" height="10"><use xlink:href="#olymp-star-full"></use></svg>
									</li>
									<li>
										<svg class="star-icon c-primary" width="10" height="10"><use xlink:href="#olymp-star-full"></use></svg>
									</li>

									<li>
										<svg class="star-icon c-primary" width="10" height="10"><use xlink:href="#olymp-star-full"></use></svg>
									</li>
									<li>
										<svg class="star-icon c-primary" width="10" height="10"><use xlink:href="#olymp-star-full"></use></svg>
									</li>
									<li>
										<svg class="star-icon" width="10" height="10"><use xlink:href="#olymp-star-null"></use></svg>
									</li>
								</ul>
								<div class="product-price">$20</div>

								<a href="#" class="in-cart">
									<svg class="olymp-shopping-bag-icon"><use xlink:href="#olymp-shopping-bag-icon"></use></svg>
								</a>
							</div>
						</div>
					</div>
					</a>
					<!-- ... end Product Item -->

				</div>
				@endforeach
			@endif


			<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 align-center pb120 pt120">


				<!-- Pagination -->

				<nav aria-label="Page navigation">
					@if ($results->lastPage() > 1)
					<ul class="pagination justify-content-center">
						<li class="page-item disabled {{ ($results->currentPage() == 1) ? ' disabled' : '' }}">
							<a class="page-link" href="{{ $results->url(1) }}" tabindex="-1">Previous</a>
						</li>
						@for ($i = 1; $i <= $results->lastPage(); $i++)
						<li class="page-item {{ ($results->currentPage() == $i) ? ' active' : '' }}"><a class="page-link" href="{{ $results->url($i) }}">{{ $i }}<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: -10.3833px; top: -16.8333px; background-color: rgb(255, 255, 255); transform: scale(16.7857);"></div></div></a></li>
						@endfor
						<li class="page-item {{ ($results->currentPage() == $results->lastPage()) ? ' disabled' : '' }}">
							<a class="page-link" href="{{ $results->url($results->lastPage()) }}">Next</a>
						</li>
					</ul>
					@endif
				</nav>

				<!-- ... end Pagination -->

			</div>
		</div>
	</div>
</section>


@endsection
@section('page-js-link') @endsection
@section('page-js') @endsection