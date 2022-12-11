<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" class="logo" href="{{ url('assets/dashboard/img/logo.webp') }}" style="background-color:#ff5e3a; color: #ff5e3a;">
	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<!-- Theme Font -->
	<link rel="stylesheet" type="text/css" href="{{ url('assets/dashboard/css/theme-font.min.css') }}" >

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="{{ url('assets/dashboard/Bootstrap/assets/css/bootstrap.css') }}">

	<!-- Main Styles CSS -->
	<link rel="stylesheet" type="text/css" href="{{ url('assets/dashboard/css/main.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('assets/dashboard/css/main.css') }}">
	<!-- Main RTL CSS -->
	<!-- <link rel="stylesheet" type="text/css" href="{{ url('assets/dashboard/css/rtl.min.css') }}"> -->
	<link rel="stylesheet" href="{{ url('assets/dashboard/toastr/toastr.min.css') }}">

	@yield('page-css-link')
    @yield('page-css')
    <style type="text/css">
	.hide {
 display: none;
}
</style>

</head>
<body class="body-bg-white">


<!-- Preloader -->

<div id="hellopreloader">
	<div class="preloader">
		<svg width="45" height="45" stroke="#fff">
			<g fill="none" fill-rule="evenodd" stroke-width="2" transform="translate(1 1)">
				<circle cx="22" cy="22" r="6" stroke="none">
					<animate attributeName="r" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite" values="6;22"/>
					<animate attributeName="stroke-opacity" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite" values="1;0"/>
					<animate attributeName="stroke-width" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite" values="2;0"/>
				</circle>
				<circle cx="22" cy="22" r="6" stroke="none">
					<animate attributeName="r" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite" values="6;22"/>
					<animate attributeName="stroke-opacity" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite" values="1;0"/>
					<animate attributeName="stroke-width" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite" values="2;0"/>
				</circle>
				<circle cx="22" cy="22" r="8">
					<animate attributeName="r" begin="0s" calcMode="linear" dur="1.5s" repeatCount="indefinite" values="6;1;2;3;4;5;6"/>
				</circle>
			</g>
		</svg>

		<div class="text">Loading ...</div>
	</div>
</div>

<!-- ... end Preloader -->
<!-- Stunning header -->

<div class="stunning-header bg-primary-opacity">

	<div class="header-spacer--standard"></div>

	<div class="stunning-header-content">
		<h1 class="stunning-header-title">Checkout</h1>
		<ul class="breadcrumbs">
			<li class="breadcrumbs-item">
				<a href="#">Home</a>
				<span class="icon breadcrumbs-custom">/</span>
			</li>
			<li class="breadcrumbs-item active">
				<span>Checkout</span>
			</li>
		</ul>
	</div>

	<div class="content-bg-wrap stunning-header-bg1"></div>
</div>

<!-- End Stunning header -->


<section class="medium-padding120">
	<div class="container">
		<div class="row">
			<div class="col col-xl-7 col-lg-7 col-md-6 col-sm-6 col-12">


				<!-- Form Billing Details -->

				<form class="mb60">
					<div class="crumina-module crumina-heading with-title-decoration">
						<h5 class="heading-title">Billing Details</h5>
					</div>

					<div class="row">
						<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="form-group label-floating">
								<label class="control-label">First Name</label>
								<input class="form-control" type="text" placeholder="" value="James" required>
								<div class="invalid-feedback">
									<div class="error-box">
										<div class="danger"><svg class="olymp-little-delete"><use xlink:href="#olymp-little-delete"></use></svg></div>
										<h5 class="title">Error Box</h5>
										<p>Lorem ipsum dolor sit amet, consect adipisicing elit, sed do eiusmod por incidid ut labore et lorem.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="form-group label-floating">
								<label class="control-label">Last Name</label>
								<input class="form-control" type="text" placeholder="" value="Spiegel" required>
							</div>
						</div>

						<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="form-group label-floating">
								<label class="control-label">Email</label>
								<input class="form-control" type="email" placeholder="" value="jspiegel@yourmail.com" required>
								<div class="invalid-feedback">
									<div class="error-box">
										<div class="danger"><svg class="olymp-little-delete"><use xlink:href="#olymp-little-delete"></use></svg></div>
										<h5 class="title">Error Box</h5>
										<p>Lorem ipsum dolor sit amet, consect adipisicing elit, sed do eiusmod por incidid ut labore et lorem.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="form-group">
								<input class="form-control" type="tel" placeholder="Phone Number" required>
								<div class="invalid-feedback">
									<div class="error-box">
										<div class="danger"><svg class="olymp-little-delete"><use xlink:href="#olymp-little-delete"></use></svg></div>
										<h5 class="title">Error Box</h5>
										<p>Lorem ipsum dolor sit amet, consect adipisicing elit, sed do eiusmod por incidid ut labore et lorem.</p>
									</div>
								</div>
							</div>
						</div>

						<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="form-group label-floating is-select">
								<label class="control-label">Select your Country</label>
								<select class="form-select">
									<option value="US">United States</option>
									<option value="AR">Argentina</option>
								</select>
							</div>
						</div>
						<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="form-group label-floating is-select">
								<label class="control-label">Select Your State</label>
								<select class="form-select">
									<option value="CA">California</option>
									<option value="AR">Arizona</option>
								</select>
							</div>
						</div>
						<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="form-group">
								<input class="form-control" placeholder="Zip Code" type="text" required>
							</div>
						</div>

						<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="form-group">
								<input class="form-control" type="text" placeholder="Your Address" required>
							</div>

							<div class="form-group">
								<input class="form-control" type="text" placeholder="Apartment Number / Suite" required>
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox" name="optionsCheckboxes" checked>
									Ship to a differnt address
								</label>
							</div>
						</div>
					</div>
				</form>

				<!-- ... end Form Billing Details -->

				<!-- Form Shiping Details -->

				<form>
					<div class="crumina-module crumina-heading with-title-decoration">
						<h5 class="heading-title">Shipping Details</h5>
					</div>

					<div class="row">
						<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="form-group label-floating">
								<label class="control-label">First Name</label>
								<input class="form-control" type="text" placeholder="" value="James">
							</div>
						</div>
						<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="form-group label-floating">
								<label class="control-label">Last Name</label>
								<input class="form-control" type="text" placeholder="" value="Spiegel">
							</div>
						</div>

						<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="form-group label-floating">
								<label class="control-label">Email</label>
								<input class="form-control" type="email" placeholder="" value="jspiegel@yourmail.com">
							</div>
						</div>
						<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="form-group">
								<input class="form-control" type="tel" placeholder="Phone Number">
							</div>
						</div>

						<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="form-group label-floating is-select">
								<label class="control-label">Select your Country</label>
								<select class="form-select">
									<option value="US">United States</option>
									<option value="AR">Argentina</option>
								</select>
							</div>
						</div>
						<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="form-group label-floating is-select">
								<label class="control-label">Select Your State</label>
								<select class="form-select">
									<option value="CA">California</option>
									<option value="AR">Arizona</option>
								</select>
							</div>
						</div>
						<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="form-group">
								<input class="form-control" placeholder="Zip Code" type="text">
							</div>
						</div>

						<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="form-group">
								<input class="form-control" type="text" placeholder="Your Address">
							</div>

							<div class="form-group">
								<input class="form-control" type="text" placeholder="Apartment Number / Suite">
							</div>

							<div class="form-group">
								<textarea class="form-control" placeholder="Shipping Notes">Please remember to ring the red doorbell when delivering the package</textarea>
							</div>
						</div>
					</div>
				</form>

				<!-- ... end Form Shiping Details -->

			</div>
			<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 ms-auto">


				<form action="{{ route('user.checkout.post') }}"  method="post" data-cc-on-file="false"  data-stripe-publishable-key="{{ $payment->stripe_key }}" autocomplete="off" class="require-validation" id="payment-form">
    				{{ csrf_field() }}
					<div class="crumina-module crumina-heading with-title-decoration">
						<h5 class="heading-title">Order Totals</h5>
					</div>


					<!-- Order Totals List -->

					<ul class="order-totals-list">
						<li>
							Cart Subtotal <span>${{ $total_amount }}</span>
						</li>
						<li>
							Shipping & Handling  <span>$0</span>
						</li>
						<li class="total">
							Order Total <span>${{ $total_amount }}</span>
						</li>
					</ul>
					<input type="hidden" name="amount" value="{{ $total_amount }}">
					<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="form-group required">
							<input class="form-control card-number" placeholder="Card Number" type="text" autocomplete='off' size='20'>
						</div>
					</div>
					<div class="row">
						<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="form-group cvc required">
								<input autocomplete='off' class='form-control card-cvc' placeholder='CVC' size='4' type='text'>
							</div>
						</div>
						<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="form-group expiration required">
								<input class='form-control card-expiry-month' placeholder='Expiration Month' size='2' type='text'>
							</div>
						</div>
					</div>
					<div class="col col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
						<div class="form-group expiration required">
							<input class='form-control card-expiry-year' placeholder='Expiration Year' size='4' type='text'>
						</div>
					</div>
					<!-- ... end Order Totals List -->
					<div class='form-row row'>
	                   <div class='col-md-12 error form-group hide'>
	                      <div class='alert-danger alert'>Please correct the errors and try
	                         again.
	                      </div>
	                   </div>
	                </div>
					<!-- ... end Order Totals List -->


					<!-- Payment Methods List -->

					<ul class="payment-methods-list d-none">
						<li>
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios" checked>
									Direct Bank Transfer
								</label>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur cing elit, sed do eiusmod tempor incididunt ut la etere dolore magna aliqua.</p>
						</li>
						<li>
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios">
									Cheque Payment
								</label>
							</div>
						</li>
						<li>
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios">
									Paypal
								</label>
							</div>
						</li>
					</ul>
					<!-- ... end Payment Methods List -->

					<button type="submit" class="btn btn-purple btn-lg full-width">Place Order</button>
				</form>
			</div>
		</div>
	</div>
</section>

<!-- Footer Full Width -->

<div class="footer footer-full-width" id="footer">
	<div class="container">
		<div class="row">

			<div class="col col-lg-12 col-md-12 col-sm-12 col-12">
				<!-- SUB Footer -->
				<div class="sub-footer-copyright">
					<span>
						Copyright <a href="index.html">Hapiom</a> All Rights Reserved {{ date('Y')}}
					</span>
				</div>
				<!-- ... end SUB Footer -->
			</div>
		</div>
	</div>
</div>

<!-- ... end Footer Full Width -->


<a class="back-to-top" href="#">
	<svg class="back-icon" width="14" height="18"><use xlink:href="#olymp-back-to-top"></use></svg>
</a>



<!-- JS Scripts -->
<script src="{{ url('assets/dashboard/js/jQuery/jquery-3.5.1.min.js') }}"></script>

<script src="{{ url('assets/dashboard/js/libs/jquery.mousewheel.min.js') }}"></script>
<script src="{{ url('assets/dashboard/js/libs/perfect-scrollbar.min.js') }}"></script>
<script src="{{ url('assets/dashboard/js/libs/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ url('assets/dashboard/js/libs/material.min.js') }}"></script>
<script src="{{ url('assets/dashboard/js/libs/selectize.min.js') }}"></script>
<script src="{{ url('assets/dashboard/js/libs/moment.min.js') }}"></script>
<script src="{{ url('assets/dashboard/js/libs/daterangepicker.min.js') }}"></script>
<script src="{{ url('assets/dashboard/js/libs/isotope.pkgd.min.js') }}"></script>
<script src="{{ url('assets/dashboard/js/libs/ajax-pagination.min.js') }}"></script>
<script src="{{ url('assets/dashboard/js/libs/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ url('assets/dashboard/js/libs/aos.min.js') }}"></script>

<script src="{{ url('assets/dashboard/js/main.js') }}"></script>
<script src="{{ url('assets/dashboard/js/libs-init/libs-init.js') }}"></script>
<script src="{{ url('assets/dashboard/Bootstrap/assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- SVG icons loader -->
<script src="{{ url('assets/dashboard/js/svg-loader.js') }}"></script>
<!-- /SVG icons loader -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
   $(function() {
        var $form = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
            $('#next-setup-4').prop( 'disabled',true);
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });
            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }
        });
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('#next-setup-4').prop( 'disabled',false);
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                $('#next-setup-4').prop( 'disabled',true);
                $('.payment-loader').removeClass('d-none');
                $('#next-setup-4').addClass('d-none');
                $('#pre-setup-2').addClass('d-none');
                $('#pendingclass').removeClass('d-none');
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.append("<input type='hidden' name='tokendetail' value='" + response + "'/>");
                $form.get(0).submit();
            }
        }
    });
</script>

</body>
</html>