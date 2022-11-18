@extends('dashboard.layouts.master')
@section('title', ' Group Type')
@section('page', ' Group Type')
@section('page-css-link') @endsection
@section('page-css')
<style type="text/css">
	.float-right {
	  float: right !important;
	}
</style> 
@endsection
@section('main-content')

<div class="main-header">
	<div class="content-bg-wrap bg-group"></div>
	<div class="container">
		<div class="row">
			<div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
				<div class="main-header-content">
					<h1>Manage your Friend Groups</h1>
					<p>Welcome to your friends groups! Do you wanna know what your close friends have been up to? Groups
	will let you easily manage your friends and put the into categories so when you enter you’ll only
	see a newsfeed of those friends that you placed inside the group. Just click on the plus button below and start now!</p>
				</div>
			</div>
		</div>
	</div>

	<img loading="lazy" class="img-bottom" src="{{ url('public/assets/dashboard/img/group-bottom.webp') }}" alt="friends" width="1087" height="148">
</div>

<!-- ... end Main Header Groups -->

<!-- Main Content Groups -->

<div class="container">
	<div class="row">
		@include('dashboard.includes.alert')
        @if($results->count() > 0)
	    @foreach ($results as $index => $result)
		<div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
			<div class="ui-block h-100 mb-0">
				
				<!-- Friend Item -->
				<div class="friend-item friend-groups">
				
					<div class="friend-item-content">
				
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
							<ul class="more-dropdown">
								<li>
									<a href="#">Report Profile</a>
								</li>
								<li>
									<a href="#">Block Profile</a>
								</li>
								<li>
									<a href="#">Turn Off Notifications</a>
								</li>
							</ul>
						</div>
						<div class="friend-avatar">
							<div class="author-thumb">
								<img loading="lazy" src="{{ url('public/'.$result->image) }}" alt="Olympus" width="34" height="34">
							</div>
							<div class="author-content">
								<a href="#" class="h5 author-name">{{ $result->name }}</a>
								<div class="country">6 Friends in the Group</div>
							</div>
						</div>
				
						<ul class="friends-harmonic">
							<li>
								<a href="#">
									<img loading="lazy" src="{{ url('public/assets/dashboard/img/friend-harmonic5.webp') }}" alt="friend" width="28" height="28">
								</a>
							</li>
							<li>
								<a href="#">
									<img loading="lazy" src="{{ url('public/assets/dashboard/img/friend-harmonic10.webp') }}" alt="friend" width="28" height="28">
								</a>
							</li>
							<li>
								<a href="#">
									<img loading="lazy" src="{{ url('public/assets/dashboard/img/friend-harmonic7.webp') }}" alt="friend" width="28" height="28">
								</a>
							</li>
							<li>
								<a href="#">
									<img loading="lazy" src="{{ url('public/assets/dashboard/img/friend-harmonic8.webp') }}" alt="friend" width="28" height="28">
								</a>
							</li>
							<li>
								<a href="#">
									<img loading="lazy" src="{{ url('public/assets/dashboard/img/friend-harmonic2.webp') }}" alt="friend" width="28" height="28">
								</a>
							</li>
							<li>
								<a href="#">
									<img loading="lazy" src="{{ url('public/assets/dashboard/img/avatar30-sm.webp') }}" alt="author" width="42" height="42">
								</a>
							</li>
						</ul>
				
				
						<div class="control-block-button">
                            
                            @if($result->groupUser($result->id,Auth::user()->id) > 0)
                            <a href="#" class="btn btn-control btn-grey-lighter">
								<svg class="olymp-settings-icon"><use xlink:href="#olymp-settings-icon"></use></svg>
							</a>
							@else
							<a href="#" route="{{ route('user-join-group') }}" id="{{ $result->id }}" class="btn btn-control bg-blue joingroup">
								<svg class="olymp-happy-faces-icon"><use xlink:href="#olymp-happy-faces-icon"></use></svg>
							</a>
							@endif
						</div>
					</div>
				</div>
				<!-- ... end Friend Item -->
				
			</div>
		</div>
		@endforeach
		@else
        <h3 class="text-danger">Ooops! no data found.</h3>
        @endif
	</div>
</div>

<!-- ... end Main Content Groups -->

<!-- Window-popup Create Friends Group Add Friends -->
<div class="modal fade" id="joingroupmodal" tabindex="-1" role="dialog" aria-labelledby="joingroupmodal" aria-hidden="true">
	<div class="modal-dialog window-popup create-friend-group joingroupmodal" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-bs-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
			</a>

			<div class="modal-header">
				<h6 class="title">Join Group</h6>
			</div>

			<div class="modal-body">
				<form class="form-group is-select" method="post" action="{{ route('user-join-group') }}">
					@csrf
					<div class="col col-lg-6 col-md-6 col-sm-12 col-12 mb30">
						<h6>Preview Rules</h6>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="optionsCheckboxes" required="">
								Be Kind and Courteous
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="optionsCheckboxes" checked required="">
								No Hate Speech or Buylling
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="optionsCheckboxes" required="">
								No Promotions or Spam
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="optionsCheckboxes" required="">
								Respect Everyone's Privacy
							</label>
						</div>
					</div>
					<input type="hidden" name="group_id" id="group_id" value="">
					<button type="submit" class="btn btn-blue btn-lg full-width">Join Group</button>
				</form>

			</div>
		</div>
	</div>
</div>

<!-- ... end Window-popup Create Friends Group Add Friends -->

@endsection
@section('page-js-link') @endsection
@section('page-js')
<script type="text/javascript">
	$(document).on('click', '.joingroup', function() {
        
        $('#joingroupmodal').modal('show');
       
	    group_id = $(this).attr('id');
	    route   = $(this).attr('route');
	    $('#group_id').val(group_id);
	    return false;
	    
	    $.ajax({
	        url: route,
	        method: "GET",
	        data: {
	            "_token": "{{ csrf_token() }}",
	        },
	        beforeSend: function() {
	        },
	        success: function(data) {
	            if (data.status) {
	               location.reload();
	            }
	        }
	    })
	});

</script> 
@endsection