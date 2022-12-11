@extends('dashboard.layouts.master')
@section('title', ' Session Details')
@section('page', ' Session Details')
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
		<h1 class="stunning-header-title">Session Details</h1>
		<ul class="breadcrumbs">
			<li class="breadcrumbs-item">
				<a href="#">Home</a>
				<span class="icon breadcrumbs-custom">/</span>
			</li>
			<li class="breadcrumbs-item active">
				<span>Session Details</span>
			</li>
		</ul>
	</div>

	<div class="content-bg-wrap stunning-header-bg1"></div>
</div>

<!-- End Stunning header -->


<section>


	<!-- Shop Product Detail -->

	<div class="shop-product-detail">
		<div class="container">
			<div class="row">
				<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="thumbs-wrap">
						<!-- <div class="small-thumbs-wrap js-zoom-gallery">
							<a href="{{ url('assets/dashboard/img/product-small1.webp') }}" class="small-thumb">
								<img loading="lazy" src="{{ url('assets/dashboard/img/product-small1.webp') }}" width="61" height="50" alt="product">
							</a>
							<a href="{{ url('assets/dashboard/img/product-small2.webp') }}" class="small-thumb">
								<img loading="lazy" src="{{ url('assets/dashboard/img/product-small2.webp') }}" width="80" height="56" alt="product">
							</a>
						</div> -->

						<div class="shop-product-detail-thumb">
							<img class="main-img" alt="product" src="{{ url('images/session/'.$session->image) }}" width="420" height="301">
						</div>
					</div>
				</div>
				<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="shop-product-detail-content">
						<div class="main-content-wrap">
							<div class="block-title">
								<a href="#" class="product-category">COFFEE MUGS</a>
								<h2 class="title bold">{{ $session->session }}</h2>
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

							<div class="block-price">
								<div class="product-price">$20</div>
							</div>
						</div>

						<p>{{ $session->description }}</p>

						<div class="inputs-wrap">

							<div class="form-group label-floating quantity">
								<label class="control-label">Quantity</label>
								<a href="#" class="quantity-minus">&#8744;</a>
								<input title="Qty" class="form-control" value="2" type="text">
								<a href="#" class="quantity-plus">&#8743;</a>
							</div>

							<div class="form-group label-floating is-select">
								<label class="control-label">Select Size</label>
								<select class="form-select">
									<option value="SM">Small Mug (2,5’’ High)</option>
									<option value="BI">Big Mug (3,5’’ High)</option>
								</select>
							</div>

						</div>

						<a href="#" class="btn btn-blue btn-md with--icon">
							<svg class="olymp-shopping-bag-icon icon"><use xlink:href="#olymp-shopping-bag-icon"></use></svg>
							<div class="text">
								<span class="title">Add to Cart</span>
							</div>
						</a>

						<ul class="tags">
							<li>
								Tags:
							</li>
							<li>
								<a class="tags-item" href="#">Enamel,</a>
							</li>
							<li>
								<a class="tags-item" href="#">Coffee,</a>
							</li>
							<li>
								<a class="tags-item" href="#">Mugs,</a>
							</li>
							<li>
								<a class="tags-item" href="#">White</a>
							</li>
						</ul>

						<div class="article-number">
							SKU:<span>ASF55GX</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- ... end Shop Product Detail -->

</section>

<section class="medium-padding120">
	<div class="container">
		<div class="row">
			<div class="col col-xl-8 m-auto col-lg-8 col-md-12 col-sm-12 col-12">


				<!-- Product Description -->

				<div class="product-description">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-bs-toggle="tab" href="#additional" role="tab">
								Additional Description
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-bs-toggle="tab" href="#rewievs" role="tab">
								Customer Reviews
								<span class="total-topic">3</span>
							</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active align-center" id="additional" role="tabpanel">
							<h2 class="title">The Best Camping Mug!</h2>
							<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,
								sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
								voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit
								laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit
								qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum
								fugiat quo voluptas nulla pariatur?
							</p>

							<p>
								Duis en aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
								nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
								deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit
								voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
								inventore veritatis et quasi hitecto beatae vitae dicta sunt explicabo. Nemo enim ipsam
								voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni
								dolores eos qui ratione voluptatem sequi nesciunt Sed ut perspiciatis unde omnis
								iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
								eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
								explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
								quia consequuntur magni dolores.
							</p>
						</div>

						<div class="tab-pane fade" id="rewievs" role="tabpanel">

							<div class="comments-title-wrap">
								<div class="block-title">
									<h2 class="title">3 Reviews</h2>
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
										<li class="numerical-rating">4.3 / 5</li>
									</ul>
								</div>

								<a href="#" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#popup-write-rewiev">Write a Review</a>
							</div>

							<ul class="comments__list-review">

								<li class="comments__item-review">

									<div class="comment-entry comment comments__article">

										<div class="comments__body ovh">

											<h5 class="title">Really Great for Camping</h5>

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

											<div class="comment-content comment">
												Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
												fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem
												sequi nesciunt. Sed ut perspiciatis unde omnis iste natus error sit
												voluptatem accusantium ntium, totam rem aperiam, eaque ipsa quae ab illo
												inventore veritatis et quasi architecto.
											</div>

											<header class="comment-meta comments__header-review">


												<time class="published comments__time-review" datetime="2017-10-02 12:00:00">4 hours ago by</time>


												<cite class="fn url comments__author-review">
													<a href="#" rel="external" class=" ">Nicholas Grissom</a>
												</cite>

											</header>


										</div>

									</div>
								</li>

								<li class="comments__item-review">

									<div class="comment-entry comment comments__article">

										<div class="comments__body ovh">

											<h5 class="title">The Best Mug I’ve ever Bought!!</h5>

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
													<svg class="star-icon c-primary" width="10" height="10"><use xlink:href="#olymp-star-full"></use></svg>
												</li>

											</ul>

											<div class="comment-content comment">
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor labore eter dolore magna aliqua. Ut enim ad minim veniam, quis
												nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
											</div>

											<header class="comment-meta comments__header-review">


												<time class="published comments__time-review" datetime="2017-10-02 12:00:00">12 hours ago by</time>


												<cite class="fn url comments__author-review">
													<a href="#" rel="external" class=" ">Marina Valentine</a>
												</cite>

											</header>


										</div>

									</div>
								</li>

								<li class="comments__item-review">

									<div class="comment-entry comment comments__article">

										<div class="comments__body ovh">

											<h5 class="title">Really Cool Design</h5>

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

											<div class="comment-content comment">
												Duis aute irure dolor in reprehenderit  voluptate velit esse cillum
												dolore. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit
												aut fugit, sed quia consequuntur magni dolores eos qui ratione.
											</div>

											<header class="comment-meta comments__header-review">


												<time class="published comments__time-review" datetime="2017-10-02 12:00:00">2 days ago by</time>


												<cite class="fn url comments__author-review">
													<a href="#" rel="external">Jack Stevens</a>
												</cite>

											</header>


										</div>

									</div>
								</li>

							</ul>
						</div>
					</div>

				</div>

				<!-- ... end Product Description -->

			</div>
		</div>
	</div>
</section>

@if($sessions->count() > 0)
<section class="medium-padding100">
	<div class="container">
		<div class="related-products">
			<div class="row">
				<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="crumina-module crumina-heading with-title-decoration">
						<h5 class="heading-title">Related Courses</h5>
					</div>
				</div>

				@if($sessions->count() > 0)
	                @foreach ($sessions as $index => $value)
					<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">


						<!-- Product Item -->

						<div class="shop-product-item">
							<div class="product-thumb">
								@if(!empty($value->image))
								<img loading="lazy" src="{{ url('images/session/'.$value->image) }}" alt="product" width="230" height="218">
								@endif
							</div>
							<div class="product-content">
								<div class="block-title">
									<a href="#" class="product-category">COFFEE MUGS</a>
									<a href="#" class="h5 title">{{ $value->session }}</a>
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

						<!-- ... end Product Item -->

					</div>
					@endforeach
				@endif
			</div>
		</div>
	</div>
</section>
@endif

@endsection
@section('page-js-link') @endsection
@section('page-js') @endsection