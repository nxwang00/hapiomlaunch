@extends('dashboard.layouts.master')
@section('title', ' Shopping-Cart')
@section('page', ' Shopping Cart')
@section('page-css-link') @endsection
@section('page-css')
 <style type="text/css">
	.hide {
		display: none;
	}
	.quantity {
    display: inline-block;
    width: 30px;
    height: 28px;
    border: 1px solid var(--iq-border-light);
    text-align: center;
	}
</style>
@endsection
@section('main-content')

 <!-- Page Content  -->
 <div id="content-page" class="content-page">
 	<div class="container">
 		<div class="row">
 			<div id="cart" class="cart-card-block show p-0 col-12">
 				<div class="row align-item-center">
 					<div class="col-lg-8">

 						<div class="iq-card">
 							<div class="iq-card-header d-flex justify-content-between iq-border-bottom mb-0">
 								<div class="iq-header-title">
 									<h4 class="card-title">Shopping Cart</h4>
 								</div>
 							</div>
 							@foreach($carts as $cart)
 							<div class="iq-card-body">
 								<div class="checkout-product">
 									<div class="row align-items-center">
 										<div class="col-sm-2">
 											<span class="checkout-product-img">
												@if ($cart->product->type === 'course')
													<img class="img-fluid rounded" src="{{ $cart->thumbnail }}" alt="">
												@else
													<img class="img-fluid rounded" src="{{ url('images/product/'.$cart->product->image_video) }}" alt="">
												@endif
 											</span>
 										</div>
 										<div class="col-sm-4">
 											<div class="checkout-product-details">
 												<h5>{{ $cart->product->name }}</h5>
 												<p class="text-success"> {{ $cart->product->type }}</p>
 											</div>
 										</div>
 										<div class="col-sm-6">
 											<div class="row">
 												<div class="col-sm-10">
 													<div class="row align-items-center mt-2">
 														<div class="col-sm-7 col-md-6">
 															<button type="button" class="fa fa-minus qty-btn" data-type="btn-minus" data-id="{{ $cart->id }}"></button>
 															<input type="text" class="quantity" value="1">
 															<button type="button" class="fa fa-plus qty-btn" data-type="btn-plus" data-id="{{ $cart->id }}"></button>
 														</div>
 														<div class="col-sm-5 col-md-6">
 															<span class="product-price">$ <span style="font-size: 16px;" id="price_{{$cart->id}}" data-price="{{$cart->product->price}}">{{ number_format((float)$cart->product->price, 2, '.', '') }}</span></span>
 														</div>
 													</div>
 												</div>
 												<input type="hidden" name="original-price" class="original-price-{{ $cart->id}}" value=" $cart->amount ">
 												<div class="col-sm-2">
 													<a href="javascript:void();" route="{{ route('remove-cart',$cart->id)}}" class="text-dark font-size-18 remove remove-cart"><i class="ri-delete-bin-7-fill"></i></a>
 												</div>
 											</div>
 										</div>
 									</div>
 								</div>
 							</div>
 							@endforeach
						</div>
 					</div>
 					<div class="col-lg-4">
 						<div class="iq-card">
 							<div class="iq-card-body">
 								<p><b>Order Details</b></p>
 								<div class="d-flex justify-content-between mb-2">
 									<span>cart({{$carts->count()}})</span>
 									<span>$<span id="total_amount">{{ number_format((float)$total_amount, 2, '.', '') }}</span></span>
 								</div>
 								<div class="d-flex justify-content-between mb-2">
 									<span>Bag Discount</span>
 									<span class="text-success">0$</span>
 								</div>
 								<div class="d-flex justify-content-between mb-4">
 									<span>Delivery Charges</span>
 									<span class="text-success">Free</span>
 								</div>
 								<hr>
 								<div class="d-flex justify-content-between mb-4">
 									<span class="text-dark"><strong>Total</strong></span>
 									<span class="text-dark"><strong>$<span id="grand_total_amount">{{ number_format((float)$total_amount, 2, '.', '') }}</span></strong></span>
 								</div>
 								<a id="place-order" href="javascript:void();" class="btn btn-primary d-block mt-3 next">Place order</a>
 							</div>
 						</div>
 						<div class="iq-card ">
 							<div class="card-body iq-card-body p-0 iq-checkout-policy">
 								<ul class="p-0 m-0">
 									<li class="d-flex align-items-center">
 										<div class="iq-checkout-icon">
 											<i class="ri-checkbox-line"></i>
 										</div>
 										<h6>Security policy (Safe and Secure Payment.)</h6>
 									</li>
 									<li class="d-flex align-items-center">
 										<div class="iq-checkout-icon">
 											<i class="ri-truck-line"></i>
 										</div>
 										<h6>Delivery policy (Home Delivery.)</h6>
 									</li>
 									<li class="d-flex align-items-center">
 										<div class="iq-checkout-icon">
 											<i class="ri-arrow-go-back-line"></i>
 										</div>
 										<h6>Return policy (Easy Retyrn.)</h6>
 									</li>
 								</ul>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 			<div id="address" class="cart-card-block p-0 col-12">

 				<div class="row align-item-center">
 					<div class="col-lg-8">
 						<div class="iq-card">
 							<div class="iq-card-header d-flex justify-content-between">
 								<div class="iq-header-title">
 									<h4 class="card-title">Payment Options</h4>
 								</div>
 							</div>
 							<div class="iq-card-body">
 								<div class="d-flex justify-content-between align-items-center">
 									<div class="d-flex justify-content-between align-items-center">
 										<img src="{{ url('assets/dashboard/images/icon/cart.png')}}" alt="" height="40" width="50">
 										<span>US Unlocked Debit Card 12XX XXXX XXXX 0000</span>
 									</div>
 									<span>{{ Auth::user()->name }}</span>
 									<span>{{ date('m/Y') }}</span>
 								</div>
 								<div class='form-row row'>
                   <div class='col-md-12 error form-group hide'>
                      <div class='alert-danger alert'>Please correct the errors and try
                         again.
                      </div>
                   </div>
                </div>
 								<form action="{{ route('user.checkout.post') }}"  method="post" data-cc-on-file="false"  data-stripe-publishable-key="{{ @$payment->stripe_key }}" autocomplete="off" class="require-validation mt-3" id="payment-form">
    						{{ csrf_field() }}
    						<input type="hidden" name="amount" value="{{ $total_amount }}">
 									<div class="align-items-center">
 										<span class="ml-3">Card Number: </span>
 										<div class="cvv-input ml-3 mr-3 mt-3 mb-2">
 											<input class="form-control card-number" placeholder="Card Number" type="text" autocomplete='off' size='20' required="">
 										</div>
 									</div>
 									<div class="align-items-center">
 										<span class="ml-3">Enter CVV: </span>
 										<div class="cvv-input ml-3 mr-3 mt-3 mb-2 cvc">
 											<input autocomplete='off' class='form-control card-cvc' placeholder='CVC' size='4' type='text' required="">
 										</div>
 									</div>
 									<div class="align-items-center">
 										<span class="ml-3">Card Expiry Month: </span>
 										<div class="cvv-input ml-3 mr-3 mt-3 mb-2 expiration">
 											<input class='form-control card-expiry-month' placeholder='Expiration Month' size='2' type='text' required="">
 										</div>
 									</div>
 									<div class="align-items-center">
 										<span class="ml-3">Card Expiry Year: </span>
 										<div class="cvv-input ml-3 mr-3 mt-3 mb-2 expiration">
 											<input class='form-control card-expiry-year' placeholder='Expiration Year' size='4' type='text' required="">
 										</div>
 									</div>
 									<div class="d-flex align-items-center">
 										<button type="submit" class="btn btn-primary">Continue</button>
 									</div>
 								</form>
 								<hr>
 							</div>
 						</div>
 					</div>
 					<div class="col-lg-4">
 						<div class="iq-card">
 							<div class="iq-card-body">
 								<h4 class="mb-2">Price Details</h4>
 								<div class="d-flex justify-content-between">
 									<span>Price</span>
 									<span><strong>$<span class="total_pay">{{ $total_amount }}</span></strong></span>
 								</div>
 								<div class="d-flex justify-content-between">
 									<span>Delivery Charges</span>
 									<span class="text-success">Free</span>
 								</div>
 								<hr>
 								<div class="d-flex justify-content-between">
 									<span>Amount Payable</span>
 									<span><strong>$<span class="total_pay">{{ $total_amount }}</span></strong></span>
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
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$(".remove-cart").on('click', function() {
		    toastr.options = {
					"closeButton": true,
					"newestOnTop": true,
					"positionClass": "toast-top-right"
				};
		    route = $(this).attr('route');
		    $.ajax({
					url: route,
					method: "GET",
					success: function(data) {
						toastr.success(data.text);
						if (data.status) {
								location.reload();
						}
					}
		    })
		});


		$('.qty-btn').on('click',function() {
			var qty = 0;
			var qtyType = $(this).data('type');
			var cartid = $(this).data('id');
			var price = parseFloat($("#price_" + cartid).data('price'));

			var curTotalAmount = parseFloat($("#total_amount").text());

			if(qtyType == 'btn-minus')
			{
				var qtyEle = $(this).next();
				qty = parseInt(qtyEle.val());
				if(qty > 0)
				{
					// changing amount
					var qty = qty - 1;
					qtyEle.val(qty);

					// set total amount
					var totalAmount = curTotalAmount - price;
				}
			}
			else
			{
				var qtyEle = $(this).prev();
				qty = parseInt(qtyEle.val()) + 1;
				qtyEle.val(qty);

				// set total amount
				var totalAmount = curTotalAmount + price;
			}

			$("#total_amount").html(totalAmount.toFixed(2));
			$("#grand_total_amount").html(totalAmount.toFixed(2));
			// changing price * amount
			$("#price_" + cartid).html((price * qty).toFixed(2));
    });

	});

</script>

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

@endsection