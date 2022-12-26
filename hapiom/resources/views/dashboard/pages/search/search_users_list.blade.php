@extends('dashboard.layouts.master')
@section('title', ' Search User List')
@section('page', ' Search User List')
@section('page-css-link') @endsection
@section('page-css') @endsection
@section('main-content')
<!-- Top Header-Profile -->
<div class="header-spacer header-spacer-small"></div>
<div class="header-spacer header-spacer-small"></div>


<div class="container">
	<div class="row">
		<div class="col col-xl-12 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
			<div class="ui-block responsive-flex">
				<div class="ui-block-title">
					<div class="h6 title">({{ $results->total() }}) Friends Found.</div>
					<form class="w-search">
						<div class="form-group with-button">
							<input class="form-control" type="text" name="keywordtext" id="keywordtext" value="{{$keywordtext}}" placeholder="Search Friends...">
							<button>
								<svg class="olymp-magnifying-glass-icon"><use xlink:href="#olymp-magnifying-glass-icon"></use></svg>
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="row">
			@if($results->count() > 0)
				@foreach($results as $index => $result)
				<div class="col col-lg-4 col-md-6 col-sm-12 col-12">
					<div class="ui-block">

						<!-- Friend Item -->

						<div class="friend-item">
							<div class="friend-header-thumb">
								<img loading="lazy" src="{{ url('assets/dashboard/img/friend9.webp') }}" alt="friend" width="318" height="122">
							</div>

							<div class="friend-item-content">

								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
									<ul class="more-dropdown">
										@if(Auth::user()->isFriendBlocked($result->id))
										<li>
											<a href="javascript::void();" route="{{ route('unblock-friend',$result->id) }}" class="unblock-friend" id="liveToastBtn">Unblock</a>
										</li>
										@else
										<li>
											<a href="javascript::void();" route="{{ route('block-friend',$result->id)}}" class="block-friend" id="liveToastBtn">Block</a>
										</li>
										@endif
										@if(Auth::user()->isFriend($result->id))
										<li>
											<a href="javascript::void();" route="{{ route('un-friend',$result->id) }}" class="un-friend" id="liveToastBtn">Unfriend</a>
										</li>
										@elseif(Auth::user()->isFriendRequest($result->id))
										<li>
											<a href="javascript::void();">Friend Request Sent</a>
										</li>
										@elseif(Auth::user()->isFriendRequestAccept($result->id))
										<li>
											<a href="javascript::void();" route="{{ route('accept-friend-request',$result->id)}}" class="accept-friend-request" id="liveToastBtn">Accept Friend Request</a>
										</li>
										@else
										<li>
											<a href="javascript::void();" route="{{ route('add-friend',$result->id)}}" class="add-friend" id="liveToastBtn">Add  Friend</a>
										</li>
										@endif
									</ul>
								</div>
								<div class="friend-avatar">
									<div class="author-thumb">
									    @if(isset($result->userInfo->profile_image) && file_exists('images/profile/'. $result->userInfo->profile_image))
											<img loading="lazy" src="{{ url('images/profile/',$result->userInfo->profile_image) }}" alt="author" width="92" height="92">
										@else
											<img loading="lazy" src="{{ url('assets/dashboard/img/noimage.jpg') }}" alt="author" width="92" height="92">
										@endif
									</div>
									<div class="author-content">
										<a href="{{ route('user-profile',encrypt($result->id)) }}" class="h5 author-name">{{ ucwords($result->name) }}</a>
										<div class="country">{{ @$result->userInfo->city }}, {{ @$result->userInfo->country }}</div>
									</div>
								</div>

								<div class="swiper-container">
									<div class="swiper-wrapper">
										<div class="swiper-slide">
											<div class="friend-count" data-swiper-parallax="-500">
												<a href="#" class="friend-count-item">
													<div class="h6">{{ $result->Userfriends->count() }}</div>
													<div class="title">Friends</div>
												</a>
												<a href="#" class="friend-count-item">
													<div class="h6">{{ @$result->UserNewsFeedPost->count() }}</div>
													<div class="title">Post</div>
												</a>
											</div>
											<div class="control-block-button" data-swiper-parallax="-100">
												<a href="{{ route('user-profile',$result->id) }}" class="btn btn-control bg-blue">
													<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
												</a>
												<a href="#" class="btn btn-control bg-purple">
													<svg class="olymp-chat---messages-icon"><use xlink:href="#olymp-chat---messages-icon"></use></svg>
												</a>
											</div>
										</div>

										<div class="swiper-slide">
											<p class="friend-about" data-swiper-parallax="-500">
												{{ @$result->userInfo->description }}
											</p>
						                    @if(isset($result->Userfriend->id))
											<div class="friend-since" data-swiper-parallax="-100">
												<span>Friends Since:</span>
												<div class="h6">{{ date("M Y", strtotime($result->Userfriend->created_at )) }}</div>
											</div>
											@endif
										</div>
									</div>

									<!-- If we need pagination -->
									<div class="swiper-pagination"></div>
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
				<nav aria-label="Page navigation">
					@if($results->lastPage() > 1)
					<ul class="pagination justify-content-center">
						<li class="page-item {{ ($results->currentPage() == 1) ? ' disabled' : '' }}">
							<a class="page-link" href="{{ $results->url(1) }}" tabindex="-1">Previous</a>
						</li>
						@for ($i = 1; $i <= $results->lastPage(); $i++)
						<li class="page-item"><a class="page-link" href="{{ $results->url($i) }}">{{ $i }}</a></li>
	                    @endfor
						<li class="page-item">
							<a class="page-link" href="{{ $results->url($results->lastPage($keywordtext)) }}">Next</a>
						</li>
					</ul>
					@endif
				</nav>
		</div>
	</div>
</div>

@endsection
@section('page-js-link') @endsection
@section('page-js')

<script type="text/javascript">
	$(document).on('click', '.block-friend', function() {
	    toastr.options = {
          "closeButton": true,
          "newestOnTop": true,
          "positionClass": "toast-top-right"
        };
	    route = $(this).attr('route');
	    $.ajax({
	        url: route,
	        method: "GET",
	        data: {
	            "_token": "{{ csrf_token() }}",
	        },
	        beforeSend: function() {
	        },
	        success: function(data) {
	        	toastr.success(data.text);
	            if (data.status) {
	               // location.reload();
	            }
	        }
	    })
	});

	$(document).on('click', '.unblock-friend', function() {
	    toastr.options = {
          "closeButton": true,
          "newestOnTop": true,
          "positionClass": "toast-top-right"
        };
	    route = $(this).attr('route');
	    $.ajax({
	        url: route,
	        method: "GET",
	        data: {
	            "_token": "{{ csrf_token() }}",
	        },
	        beforeSend: function() {
	        },
	        success: function(data) {
	        	toastr.success(data.text);
	            if (data.status) {
	               // location.reload();
	            }
	        }
	    })
	});

	$(document).on('click', '.add-friend', function() {
	    toastr.options = {
          "closeButton": true,
          "newestOnTop": true,
          "positionClass": "toast-top-right"
        };
	    route = $(this).attr('route');
	    $.ajax({
	        url: route,
	        method: "GET",
	        data: {
	            "_token": "{{ csrf_token() }}",
	        },
	        beforeSend: function() {
	        },
	        success: function(data) {
	        	toastr.success(data.text);
	            if (data.status) {
	               // location.reload();
	            }
	        }
	    })
	});

	$(document).on('click', '.accept-friend-request', function() {
	    toastr.options = {
          "closeButton": true,
          "newestOnTop": true,
          "positionClass": "toast-top-right"
        };
	    route = $(this).attr('route');
	    $.ajax({
	        url: route,
	        method: "GET",
	        data: {
	            "_token": "{{ csrf_token() }}",
	        },
	        beforeSend: function() {
	        },
	        success: function(data) {
	        	toastr.success(data.text);
	            if (data.status) {
	               // location.reload();
	            }
	        }
	    })
	});

	$(document).on('click', '.un-friend', function() {
	    toastr.options = {
          "closeButton": true,
          "newestOnTop": true,
          "positionClass": "toast-top-right"
        };
	    route = $(this).attr('route');
	    $.ajax({
	        url: route,
	        method: "GET",
	        data: {
	            "_token": "{{ csrf_token() }}",
	        },
	        beforeSend: function() {
	        },
	        success: function(data) {
	        	toastr.success(data.text);
	            if (data.status) {
	               // location.reload();
	            }
	        }
	    })
	});

</script>


@endsection