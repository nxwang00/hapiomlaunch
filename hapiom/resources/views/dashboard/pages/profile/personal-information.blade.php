@extends('dashboard.layouts.master')
@section('title', ' Personal Information')
@section('page', ' Personal Information')
@section('page-css-link') @endsection
@section('page-css')
<style type="text/css">
	.hide {
		display: none;
	}
	.switch {
		position: relative;
		display: inline-block;
		width: 60px;
		height: 34px;
	}

	.switch input { 
		opacity: 0;
		width: 0;
		height: 0;
	}

	.slider {
		position: absolute;
		cursor: pointer;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background-color: #ccc;
		-webkit-transition: .4s;
		transition: .4s;
	}

	.slider:before {
		position: absolute;
		content: "";
		height: 26px;
		width: 26px;
		left: 4px;
		bottom: 4px;
		background-color: white;
		-webkit-transition: .4s;
		transition: .4s;
	}

	input:checked + .slider {
		background-color: #50b5ff;
	}

	input:focus + .slider {
		box-shadow: 0 0 1px #50b5ff;
	}

	input:checked + .slider:before {
		-webkit-transform: translateX(26px);
		-ms-transform: translateX(26px);
		transform: translateX(26px);
	}

	/* Rounded sliders */
	.slider.round {
		border-radius: 34px;
	}

	.slider.round:before {
		border-radius: 50%;
	}
	.h-switch {
		margin: 0px 10px;
		display: flex;
		justify-content: center;
		align-items: center;
		text-align: center;
	}
</style>
@endsection
@section('main-content')
<div id="content-page" class="content-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="iq-card">
					<div class="iq-card-body p-0">
						<div class="iq-edit-list">
							<ul class="iq-edit-profile d-flex nav nav-pills">
								<li class="col-md-3 p-0">
									<a class="nav-link @if(!isset($activeTab)) active @endif" data-toggle="pill" href="#personal-information">
										Personal Information
									</a>
								</li>
								<li class="col-md-3 p-0">
									<a class="nav-link" data-toggle="pill" href="#chang-pwd">
										Change Password
									</a>
								</li>
								<li class="col-md-3 p-0">
									<a class="nav-link @if($activeTab==='membership') active @endif" data-toggle="pill" href="#upgrade-plan">
										Upgrade Plan
									</a>
								</li>
								<li class="col-md-3 p-0">
									<a class="nav-link" data-toggle="pill" href="#manage-contact">
										Payment Setting
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<p>@include('dashboard.includes.alert')</p>
			<div class="col-lg-12">
				<div class="iq-edit-list-data">
					<div class="tab-content">
						<div class="tab-pane fade @if(!isset($activeTab)) active show @endif" id="personal-information" role="tabpanel">
							<div class="iq-card">
								<div class="iq-card-header d-flex justify-content-between">
									<div class="iq-header-title">
										<h4 class="card-title">Personal Information</h4>
									</div>
								</div>
								<div class="iq-card-body">
									<form class="needs-validation" method="post" action="{{ route('personal-information-save') }}" enctype="multipart/form-data" novalidate>
									@csrf
										<div class="form-group row">
											<div class="col-md-9">
												<div class="profile-img-edit">
													@if(isset(Auth::user()->userInfo->profile_image) && file_exists('images/profile/'. Auth::user()->userInfo->profile_image))
													<img class="profile-pic" src="{{ url('images/profile/',Auth::user()->userInfo->profile_image) }}" alt="profile-pic">
													@else
													<img class="profile-pic" src="{{url('assets/dashboard/img/default-avatar.png')}}" alt="profile-pic">
													@endif
													<div class="p-image">
														<i class="ri-pencil-line upload-button"></i>
														<input class="file-upload" type="file" id="profile_image" name="profile_image" accept="image/*"/>
													</div>
												</div>
											</div>
											@if (Auth::user()->userInfo)
											<div class="d-flex col-md-3 align-top" style="height: 30px;">
												<h5 class="text-center h-switch">Private</h4>
												<label class="switch">
													<input type="checkbox" @if(Auth::user()->userInfo->status == 1) {{ 'checked=""' }} @endif name="status" value="1">
													<span class="slider round"></span>
												</label>
												<h5 class="text-center h-switch">Public</h4>
											</div>
											@endif
										</div>
										<div class=" row align-items-center">
											<div class="form-group col-sm-6">
												<label for="fname">First Name:</label>
												<input type="text" class="form-control" id="first_name" name="first_name" value="{{ Auth::user()->first_name }}" required>
											</div>
											<div class="form-group col-sm-6">
												<label for="lname">Last Name:</label>
												<input class="form-control" type="text" name="last_name" id="last_name" value="{{ Auth::user()->last_name }}" required>
											</div>
											<div class="form-group col-sm-6">
												<label for="uname">Email:</label>
												<input class="form-control" type="email" name="email" id="email" value="{{ Auth::user()->email }}" required>
											</div>
											<div class="form-group col-sm-6">
												<label for="cname">City:</label>
												<input class="form-control" type="text" name="city" id="city" value="{{ @$user_info->city }}" required>
											</div>
											<div class="form-group col-sm-6">
												<label class="d-block">Gender:</label>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" id="customRadio6" name="gender" class="custom-control-input" value="1" {{@$user_info->gender == 1  ? 'checked=""' : ''}}>
													<label class="custom-control-label" for="customRadio6"> Male </label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" id="customRadio7" name="gender" class="custom-control-input" value="0" {{@$user_info->gender == 0  ? 'checked=""' : ''}}>
													<label class="custom-control-label" for="customRadio7"> Female </label>
												</div>
											</div>
											<!-- <div class="form-group col-sm-6">
												<label for="dob">Date Of Birth:</label>
												<input class="form-control" type="text" name="dob" id="dob" value="{{ @$user_info->dob }}" required>
											</div> -->
											<div class="form-group col-sm-6">
												<label for="birthday">Date Of Birth:</label>
												<div class="d-flex justify-content-between">
													<input type="datetime-local" class="form-control" id="birthday" name="dob" value="{{ @$user_info->dob }}" required>
												</div>
											</div>
											<div class="form-group col-sm-6">
												<label>Marital Status:</label>
												<select class="form-control" id="marriage_status" name="marriage_status">
													<option value="0" {{@$user_info->marriage_status == 0  ? 'selected' : ''}}>Single</option>
													<option value="1" {{@$user_info->marriage_status == 1  ? 'selected' : ''}}>Married</option>
													<option value="2" {{@$user_info->marriage_status == 2  ? 'selected' : ''}}>Widowed</option>
													<option value="3" {{@$user_info->marriage_status == 3  ? 'selected' : ''}}>Divorced</option>
													<option value="4" {{@$user_info->marriage_status == 4  ? 'selected' : ''}}>Separated </option>
												</select>
											</div>
											<div class="form-group col-sm-6">
												<label>Country:</label>
												<input class="form-control" type="text" name="country" id="country" value="{{ @$user_info->country }}" >
											</div>
											<div class="form-group col-sm-6">
												<label>State:</label>
												<input class="form-control" type="text" name="state" id="state" value="{{ @$user_info->state }}">
											</div>
											<div class="form-group col-sm-12">
												<label>Description:</label>
												<textarea class="form-control" name="address" rows="5" style="line-height: 22px;" name="description" id="description">
													{{ @$user_info->description }}
												</textarea>
											</div>
											<div class="form-group col-sm-6">
												<label for="lname">Your Phone Number:</label>
												<input class="form-control" type="text" name="phone_number" id="phone_number" value="{{ @$user_info->phone_number }}">
											</div>
											<div class="form-group col-sm-6">
												<label for="lname">Your Website:</label>
												<input class="form-control" type="text" name="website" id="website" value="{{ @$user_info->website }}" >
											</div>
											<div class="form-group col-sm-6">
												<label for="lname">Your Facebook Account:</label>
												<input class="form-control" type="text" name="facebook_url" id="facebook_url" value="{{ @$user_info->facebook_url }}">
											</div>
										</div>
										<button type="submit" class="btn btn-primary mr-2">Submit</button>
										<button type="reset" class="btn iq-bg-danger">Cancle</button>
									</form>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="chang-pwd" role="tabpanel">
							<div class="iq-card">
								<div class="iq-card-header d-flex justify-content-between">
									<div class="iq-header-title">
										<h4 class="card-title">Change Password</h4>
									</div>
								</div>
								<div class="iq-card-body">
									<form class="needs-validation" method="post" action="{{ route('change-password-save') }}" novalidate>
									@csrf
										<div class="form-group">
											<label for="cpass">Current Password:</label>
											<a href="{{ route('forget.password.get') }}" class="float-right d-none">Forgot Password</a>
											<input class="form-control" type="password" name="current_password" id="current_password" placeholder="" value="{{ old('current_password') }}" required>
										</div>
										<div class="form-group">
											<label for="npass">New Password:</label>
											<input class="form-control" type="password" name="new_password" id="new_password" placeholder="" value="{{ old('new_password') }}" required>
										</div>
										<div class="form-group">
											<label for="vpass">Confirm New Password:</label>
											<input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="" value="{{ old('confirm_password') }}" required>
										</div>
										<button type="submit" class="btn btn-primary mr-2">Submit</button>
										<button type="reset" class="btn iq-bg-danger">Cancle</button>
									</form>
								</div>
							</div>
						</div>
						<div class="tab-pane fade @if($activeTab==='membership') active show @endif" id="upgrade-plan" role="tabpanel">
							<div class="iq-card">
								<div class="iq-card-header d-flex justify-content-between">
									<div class="iq-header-title">
										<h4 class="card-title">Upgrade Plan</h4>
									</div>
								</div>
								<div class="iq-card-body">
									<div class="card-deck">
										@foreach($meberships as $mebership)
											<div class="card @if ($mebership->id === $currentUserTier->id) border-primary @endif">
												<div class="card-header text-center @if ($mebership->id === $currentUserTier->id) border-primary @endif"><h5>{{$mebership->name}}</h5></div>
												<div class="card-body">
													<h4 class="card-title text-center">${{$mebership->amount}}</h4>
													<div class="h-75">
														@foreach($mebership->descs as $desc)
															<div class="card-text mb-2"><i class="fa fa-check" aria-hidden="true"></i>{{ $desc }}</div>
														@endforeach
													</div>
													<div class="text-center">
														@if ($mebership->id === $currentUserTier->id)
															<button class="btn btn-outline-primary">Choose</button>
														@else
															<button class="btn btn-primary" onclick="showPaymentTierModal({{ $mebership->id }})" >Choose</button>
														@endif
													</div>
												</div>
											</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="manage-contact" role="tabpanel">
							<div class="iq-card">
								<div class="iq-card-header d-flex justify-content-between">
									<div class="iq-header-title">
										<h4 class="card-title">Payment Setting</h4>
									</div>
								</div>
								<div class="iq-card-body">
									<form class="needs-validation" method="post" action="{{ route('payment-setting-post') }}" novalidate>
									@csrf
										<div class="form-group">
											<label for="cno">Stripe Key:</label>
											<input class="form-control" type="password" name="stripe_key" id="stripe_key" placeholder="" value="{{ is_null($payment) ? '' : @$payment->stripe_key }}" required>
										</div>
										<div class="form-group">
											<label for="email">Stripe Secret Key:</label>
											<input class="form-control" type="password" name="stripe_secret" id="stripe_secret" placeholder="" value="{{ is_null($payment) ? '' : @$payment->stripe_secret }}" required>
										</div>
										<button type="submit" class="btn btn-primary mr-2">Submit</button>
										<button type="reset" class="btn iq-bg-danger">Cancle</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="stripePaymentModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
        <div class="modal-header">
           <h5 class="modal-title" id="gridModalLabel">Upgrade Plan</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
					<form action="{{ route('admin.upgradeplan.post') }}"  method="post" data-cc-on-file="false"  data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" autocomplete="off" class="require-validation" id="payment-form">
						{{ csrf_field() }}
						<input type="hidden" id="membershipId" name="membershipId" value=""/>
						<div class="form-group">
							<label for="card_name">Full name (on the card)</label>
							<input class="form-control card-name" type="text" id="card_name" required>
						</div>
						<div class="form-group">
							<label for="card_number">Card number</label>
							<div class="input-group">
								<input type="text" class="form-control card-number" id="card_number" aria-describedby="basic-addon2" required>
								<div class="input-group-append">
									<span class="input-group-text" id="basic-addon2">
										<i class="fab fa-cc-visa" aria-hidden="true" style="font-size: 24px"></i>
										<i class="fab fa-cc-amex" aria-hidden="true" style="font-size: 24px; margin-left:5px"></i>
										<i class="fab fa-cc-mastercard" aria-hidden="true" style="font-size: 24px; margin-left:5px"></i>
									</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
								<div class="form-group expiration">
									<label>Expiration</label>
									<div class="d-flex">
										<select class="form-control" id="expiration_month" required>
											<option value="" hidden>MM</option>
											<option value="01">01</option>
											<option value="02">02</option>
											<option value="03">03</option>
											<option value="04">04</option>
											<option value="05">05</option>
											<option value="06">06</option>
											<option value="07">07</option>
											<option value="08">08</option>
											<option value="09">09</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
										</select>
										<select class="form-control" id="expiration_year" required>
											<option value="" hidden>YY</option>
											<option value="2022">2022</option>
											<option value="2023">2023</option>
											<option value="2024">2024</option>
											<option value="2025">2025</option>
											<option value="2026">2026</option>
											<option value="2027">2027</option>
											<option value="2028">2028</option>
											<option value="2029">2029</option>
											<option value="2030">2030</option>
											<option value="2031">2031</option>
											<option value="2032">2032</option>
											<option value="2033">2033</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
								<div class="form-group cvc">
									<label for="cvc">CVC</label>
									<input autocomplete='off' class='form-control card-cvc' placeholder='CVC' size='4' type='text' id="card_cvc" required>
								</div>
							</div>
						</div>
						<input type="hidden" name="meberships_id" id="meberships_id" value="{{ Auth::user()->meberships_id }}">
						<!-- ... end Order Totals List -->
						<div class='form-row row'>
							<div class='col-md-12 error form-group hide'>
								<div class='alert-danger alert'>Please correct the errors and try again.
								</div>
							</div>
						</div>
			    	<button class="btn btn-primary mt-2" type="submit">
							Pay now
							<span class="spinner-border spinner-border-sm ml-2 hide" role="status" aria-hidden="true" id="payment_loader"></span>
						</button>
					</form>
        </div>
     </div>
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
				<form action="{{ route('admin.upgradeplan.post') }}"  method="post" data-cc-on-file="false"  data-stripe-publishable-key="{{ is_null($payment) ? '' : @$payment->stripe_key }}" autocomplete="off" class="require-validation" id="payment-form">
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
				<button class="btn btn-blue btn-lg full-width" type="submit">Paynow</button>

				</form>

			</div>
		</div>
	</div>
</div>
@endsection
@section('page-js-link') @endsection
@section('page-js')

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
   $(function() {
        var $form = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');
            if (!$form.data('cc-on-file')) {
							e.preventDefault();
							const stripePublishableKey = $form.data('stripe-publishable-key');
							if (!stripePublishableKey) {
								$errorMessage.removeClass('hide');
								$errorMessage.children('div').html('Please correct your payment settings');
								return
							}
							$("#payment_loader").removeClass('hide');
							Stripe.setPublishableKey($form.data('stripe-publishable-key'));
							Stripe.createToken({
									number: $('#card_number').val(),
									cvc: $('#card_cvc').val(),
									exp_month: $('#expiration_month').val(),
									exp_year: $('#expiration_year').val()
							}, stripeResponseHandler);
            }
        });
        function stripeResponseHandler(status, response) {
            if (response.error) {
							$('.error').removeClass('hide').find('.alert').text(response.error.message);
            } else {
							var token = response['id'];
							$form.find('input[type=text]').empty();
							$form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
							$form.append("<input type='hidden' name='tokendetail' value='" + response + "'/>");
							$form.get(0).submit();
            }
        }
    });

		function showPaymentTierModal(membershipId) {
			$("#membershipId").val(membershipId);
			$('#stripePaymentModal').modal('show');
		}
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