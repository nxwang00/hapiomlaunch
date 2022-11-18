@extends('dashboard.layouts.master')
@section('title', ' Invite Users')
@section('page', ' Invite Users')
@section('page-css-link') @endsection
@section('page-css')
<style type="text/css">
	.float-right {
	  float: right !important;
	}
	.bootstrap-tagsinput {
	   min-width: 50% !important;
	   padding: 15px 2px !important;
	}
	.bootstrap-tagsinput .tag {
	   background: #ff5e3a;
	   padding: 4px;
	   font-size: 14px;
	}
</style> 
@endsection
@section('main-content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
<!-- Top Header-Profile -->
<div class="header-spacer"></div>

<div class="container">
	<div class="row">
		<div class="col col-xl-12 order-xl-2 col-lg-12 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
			<div class="ui-block">				
				<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Invite Users</h6>
				</div>
				<div class="ui-block-content">
					@include('dashboard.includes.alert')
					<form method="post" action="{{ route('users-invite-send') }}" class="needs-validation frmInviteUser" id="frmInviteUser" >
						@csrf
						<div class="crumina-module crumina-heading with-title-decoration">
							<h5 class="heading-title">Add member Invite People to collaborate on "HapiOm Home Page"</h5>
						</div>

						<div class="row">
							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Email</label>
									<input class="form-control" type="text" placeholder="" id="tags-input"  name="emails">
								</div>
							</div>
							
							
							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Your Message</label>
									<input class="form-control" type="text" placeholder="" name="message">
								</div>								

								<div class="checkbox">
									<label>
										<input type="checkbox" name="optionsCheckbox">
										Send invitation via email
									</label>
								</div>
								<input class="form-control" type="hidden" placeholder="" name="email">
							    <a href="{{ route('profile-setting') }}" class="btn btn-secondary btn-sm">Cancel</a>
								<button class="btn btn-primary btn-sm btn-invite-user" type="button">Submit form</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('page-js-link') @endsection
@section('page-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g==" crossorigin="anonymous"></script>

<script type="text/javascript">
	$(document).ready(function(){        
	  var tagInputEle = $('#tags-input');
	  tagInputEle.tagsinput();
	});

	$(".btn-invite-user").click(function() {
	  $("#frmInviteUser").submit();
	});

</script>
@endsection