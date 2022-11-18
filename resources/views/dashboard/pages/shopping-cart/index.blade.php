@extends('dashboard.layouts.master')
@section('title', ' Shopping-Cart')
@section('page', ' Shopping Cart')
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
						<img loading="lazy" src="img/logo.webp" alt="Olympus" width="34" height="34">
						<img loading="lazy" src="img/logo-colored-small.webp" width="34" height="34" alt="Olympus" class="logo-colored">
					</div>
					<div class="title-block">
						<h6 class="logo-title">olympus</h6>
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
												<h6 class="title">Olympus Orange Shirt</h6>
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
		<h1 class="stunning-header-title">Shopping Cart</h1>
		<ul class="breadcrumbs">
			<li class="breadcrumbs-item">
				<a href="#">Home</a>
				<span class="icon breadcrumbs-custom">/</span>
			</li>
			<li class="breadcrumbs-item active">
				<span>Shopping Cart</span>
			</li>
		</ul>
	</div>

	<div class="content-bg-wrap stunning-header-bg1"></div>
</div>

<!-- End Stunning header -->


<section>
	<div class="container">
		<div class="row">
			<div class="col col-xl-10 m-auto col-lg-10 col-md-12 col-sm-12 col-12">
				<form action="#" method="post" class="cart-main">

					
					<!-- Shop Table Cart -->
					
					<table class="shop_table cart">
						<thead>
						<tr>
							<th class="product-thumbnail">ITEM DESCRIPTION</th>
							<th class="product-price">UNIT PRICE</th>
							<th class="product-quantity">QUANTITY</th>
							<th class="product-subtotal">TOTAL</th>
							<th class="product-remove">REMOVE</th>
						</tr>
						</thead>
						<tbody>
						<tr class="cart_item">
					
							<td class="product-thumbnail">
					
								<div class="cart-product__item">
									<a href="img/product-small1.webp" class="product-thumb js-zoom-image">
										<img loading="lazy" src="img/product-small1.webp" width="61" height="50" alt="product" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
									</a>
									<div class="cart-product-content">
										<a href="#" class="product-category">COFFEE MUGS</a>
										<a href="#" class="h6 cart-product-title">White Enamel Mug</a>
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
									</div>
								</div>
							</td>
					
							<td class="product-price">
								<h6 class="price amount">$20</h6>
							</td>
					
							<td class="product-quantity">
					
								<div class="form-group label-floating quantity">
									<label class="control-label">Quantity</label>
									<a href="#" class="quantity-minus">&#8744;</a>
									<input title="Qty" class="form-control" value="2" type="text">
									<a href="#" class="quantity-plus">&#8743;</a>
								</div>
					
							</td>
					
							<td class="product-subtotal">
								<h6 class="total amount">$40</h6>
							</td>
					
							<td class="product-remove">
								<a href="#" class="product-del remove" title="Remove this item">
									<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
								</a>
							</td>
						</tr>
						<tr class="cart_item">
					
							<td class="product-thumbnail">
					
								<div class="cart-product__item">
									<a href="img/product-small3.webp" class="product-thumb js-zoom-image">
										<img loading="lazy" src="img/product-small3.webp" width="43" height="67" alt="product" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
									</a>
									<div class="cart-product-content">
										<a href="#" class="product-category">CLOTHING</a>
										<a href="#" class="h6 cart-product-title">Olympus Orange Shirt</a>
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
									</div>
								</div>
							</td>
					
							<td class="product-price">
								<h6 class="price amount">$40</h6>
							</td>
					
							<td class="product-quantity">
					
								<div class="form-group label-floating quantity">
									<label class="control-label">Quantity</label>
									<a href="#" class="quantity-minus">&#8744;</a>
									<input title="Qty" class="form-control" value="1" type="text">
									<a href="#" class="quantity-plus">&#8743;</a>
								</div>
					
							</td>
					
							<td class="product-subtotal">
								<h6 class="total amount">$40</h6>
							</td>
					
							<td class="product-remove">
								<a href="#" class="product-del remove" title="Remove this item">
									<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
								</a>
							</td>
						</tr>
						<tr>
							<td colspan="4" class="actions">
								<div class="form-inline coupon">
									<div class="form-group label-floating">
										<label class="control-label">Enter Coupon</label>
										<input class="form-control bg-white" placeholder="" value="OLYMPUSDSCNT88" type="text" name="coupon_code">
									</div>
									<button class="btn btn-blue btn-lg">Apply</button>
								</div>
					
								<div class="cart-subtotal">
									Cart Subtotal:<span>$80</span>
								</div>
					
							</td>
						</tr>
						</tbody>
					</table>
					
					<!-- ... end Shop Table Cart -->
				</form>

				<div class="row medium-padding100">
					<div class="col col-xl-5 me-auto col-lg-5 col-md-6 col-sm-6 col-12">

						
						<!-- Form Calculate Shiping -->
						
						<form>
							<div class="crumina-module crumina-heading with-title-decoration">
								<h5 class="heading-title">Calculate Shipping</h5>
							</div>
							<div class="row">
								<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="form-group label-floating is-select">
										<label class="control-label">Select your Country</label>
										<select class="form-select">
											<option value="US">United States</option>
											<option value="AR">Argentina</option>
										</select>
									</div>
								</div>
								<div class="col col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
									<div class="form-group label-floating is-select">
										<label class="control-label">Select Your State</label>
										<select class="form-select">
											<option value="CA">California</option>
											<option value="AR">Arizona</option>
										</select>
									</div>
								</div>
								<div class="col col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
									<div class="form-group">
										<input class="form-control" placeholder="Zip Code" type="text">
									</div>
								</div>
								<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<button class="btn btn-blue btn-lg full-width">Calculate Shipping</button>
								</div>
							</div>
						</form>
						
						<!-- ... end Form Calculate Shiping -->
					</div>

					<div class="col col-xl-5 ms-auto col-lg-5 col-md-6 col-sm-6 col-12">
						<div class="crumina-module crumina-heading with-title-decoration">
							<h5 class="heading-title">Order Totals</h5>
						</div>

						
						<!-- Order Totals List -->
						
						<ul class="order-totals-list">
							<li>
								Cart Subtotal <span>$80</span>
							</li>
							<li>
								Shipping & Handling  <span>$20</span>
							</li>
							<li>
								Coupon / Discount <span>-$5</span>
							</li>
							<li class="total">
								Order Total <span>$95</span>
							</li>
						</ul>
						
						<!-- ... end Order Totals List -->

						<a href="#" class="btn btn-purple btn-lg full-width">Go to Checkout</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
@section('page-js-link') @endsection
@section('page-js') @endsection