@extends('dashboard.layouts.master')
@section('title', ' Plan Upgrade')
@section('page', ' Plan Upgrade')
@section('page-css-link') @endsection
@section('page-css')
<style type="text/css">
	.hide {
 display: none;
}
</style>
 @endsection
@section('main-content')
<div class="header-spacer header-spacer-small"></div>

<!-- Main Header Account -->

<div class="main-header">
	<div class="content-bg-wrap bg-account"></div>
	<div class="container">
		<div class="row">
			<div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
				<div class="main-header-content">
					<h1>Your Account Dashboard</h1>
					<p>Welcome to your account dashboard! Here you’ll find everything you need to change your profile
	information, settings, read notifications and requests, view your latest messages, change your pasword and much
	more! Also you can create or manage your own favourite page, have fun!</p>
				</div>
			</div>
		</div>
	</div>
	<img class="img-bottom" src="{{ url('assets/dashboard/img/account-bottom.webp') }}" width="1169" height="153">
</div>

<!-- ... end Main Header Account -->



<!-- Your Account Personal Information -->

<div class="container">
	<div class="row">
		<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">

			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Plan Upgrade</h6>
				</div>
				<div class="ui-block-content">
					 @include('dashboard.includes.alert')
					<form class="needs-validation" method="post" action="{{ route('payment-setting-post') }}" novalidate>

						@csrf

						<div class="crumina-module crumina-heading with-title-decoration">
							<h5 class="heading-title">Plan Upgrade</h5>
						</div>

						<div class="row">
							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Level Name</label>
									<select class="form-control" id="level" name="level" >
										<option>Select Level</option>
										@foreach($meberships as $mebership)
											<option value="{{ $mebership->id }}" @if($mebership->id == Auth::user()->meberships_id) {{'selected'}}  @endif>{{ $mebership->name }}</option>
										@endforeach
									</select>
									<span class="invalid-feedback">
										<span class="error-box">
											Level is required
										</span>
									</span>
								</div>
							</div>
							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Amount</label>
									<input class="form-control" type="text" name="amount" id="amount" placeholder="" value="{{ @$amount }}"  readonly="">
								</div>
							</div>
							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<a  href="#" class="btn btn-md btn-primary"  data-bs-toggle="modal" data-bs-target="#create-friend-group-1">Upgrade</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		@include('dashboard.includes.profile-sidebar')
	</div>
</div>


<div class="modal fade" id="create-friend-group-1" tabindex="-1" role="dialog" aria-labelledby="create-friend-group-1" aria-hidden="true">
	<div class="modal-dialog window-popup create-friend-group create-friend-group-1" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-bs-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
			</a>
			<div class="modal-header">
				<h6 class="title">Create Friend Group</h6>
			</div>

			<div class="modal-body">
				<form action="{{ route('admin.upgradeplan.post') }}"  method="post" data-cc-on-file="false"  data-stripe-publishable-key="{{ $payment->stripe_key }}" autocomplete="off" class="require-validation" id="payment-form">
    				{{ csrf_field() }}
					<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="form-group required">
					   		<input class="form-control" type="text" placeholder="Amount" name="amount" id="amount" value="{{ $amount }}">
					   	</div>
					</div>

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
					<input type="hidden" name="meberships_id" id="meberships_id" value="{{ Auth::user()->meberships_id }}">
					<!-- ... end Order Totals List -->
					<div class='form-row row'>
	                   <div class='col-md-12 error form-group hide'>
	                      <div class='alert-danger alert'>Please correct the errors and try
	                         again.
	                      </div>
	                   </div>
	                </div>
				<button class="btn btn-md btn-primary" type="submit">Paynow</button>

				</form>

			</div>
		</div>
	</div>
</div>
<!-- ... end Your Account Personal Information -->

@endsection
@section('page-js-link') @endsection
@section('page-js')

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

<script type="text/javascript">
	$(document).ready(function() {

		$( "#level" ).change(function() {
		    id =  $('#level').val();
		    $('#create-friend-group-1 #meberships_id').val(id);

			$.ajax({
				url: "<?php echo route('plan-amount') ?>",
				method: "GET",
				data: {
					"_token": "{{ csrf_token() }}", "id" : id,
				},
				beforeSend: function() {
				},
				success: function(data) {
					$('#amount').val(data['amount']);
					$('#create-friend-group-1 #amount').val(data['amount']);

				}
			})
		});

	});

</script>
@endsection