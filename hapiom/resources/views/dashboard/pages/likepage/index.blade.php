@extends('dashboard.layouts.master')
@section('title', ' Liked Page')
@section('page', 'Liked Page')
@section('page-css-link') @endsection
@section('page-css')
<style>
	.friend-item-img {
		margin-top: -52px;
		margin-left: 100px;
		position: relative;
	}
</style>
@endsection
@section('main-content')
<div id="content-page" class="content-page">
	<div class="container">
		<div class="iq-edit-list-data">
			<div class="tab-content">
				<div class="tab-pane fade show active" id="friend-suggests" role="tabpanel">
					<div class="iq-card">
						<div class="iq-card-header d-flex justify-content-between">
							<div class="iq-header-title">
								<h4 class="card-title">Liked Posts</h4>
							</div>
						</div>
						<div class="iq-card-body">
							<div class="row">
								@foreach( $newsfeedLikes as $key => $newsfeedLike)
								<div class="col-md-4 mt-4">
									<div class="iq-card">
										<div class="iq-card-body profile-page p-0">
											<div class="profile-header-image">
												<div class="profile-info p-4">
													<div class="user-detail">
														<div class="profile-detail">
															<div class="d-flex flex-wrap">
																<div class="col-md-6 pr-4">
																	@if(isset($likedUsers[$key]->userInfo->profile_image) && file_exists('images/profile/'. $likedUsers[$key]->userInfo->profile_image))
																	<img src="{{ url('images/profile/',$likedUsers[$key]->userInfo->profile_image) }}" alt="profile-img" class="avatar-60 img-fluid rounded-circle" />
																	@else
																	<img src="{{ url('assets/dashboard/img/default-avatar.png') }}" alt="profile-img" class="avatar-60 img-fluid rounded-circle" />
																	@endif
																</div>
																<div class="iq-card-post-toolbar col-md-6 text-right">
																	<div class="dropdown">
																		<span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
																			<i class="ri-more-fill"></i>
																		</span>
																		<div class="dropdown-menu m-0 p-0">
																			<a class="dropdown-item p-3 send-request-btn" href="#" user_id="{{ $likedUsers[$key]->id }}" route="{{ route('add-friend', $likedUsers[$key]->id)}}">
																				<div class="d-flex align-items-top">
																					<div class="icon font-size-20"><i class="ri-share-box-line"></i></div>
																					<div class="data ml-2">
																						<h6>Send Friend Request</h6>
																					</div>
																				</div>
																			</a>
																			<a class="dropdown-item p-3 postFollow" href="javascript:void(0)" route="{{ route('newsfeed-follow')}}" newsfeed_id="{{ $newsfeeds[$key]->id }}" user_id="{{ $likedUsers[$key]->id }}" following_id="{{ Auth::user()->id }}">
																				@if ($likeStatuses[$key] === false)
																				<div class="d-flex align-items-top" id="post-follow-{{ $newsfeeds[$key]->id }}">
																					<div class="icon font-size-20"><i class="ri-user-follow-line"></i></div>
																					<div class="data ml-2">
																						<h6>Follow</h6>
																					</div>
																				</div>
																				@else 
																				<div class="d-flex align-items-top" id="post-follow-{{ $newsfeeds[$key]->id }}">
																					<div class="icon font-size-20"><i class="ri-user-unfollow-line"></i></div>
																					<div class="data ml-2">
																						<h6>Unfollow</h6>
																					</div>
																				</div>
																				@endif
																			</a>
																		</div>
																	</div>
																</div>
															</div>
															<div class="user-data-block text-center mt-2">
																<h4><a href="{{ route('user-profile',encrypt($likedUsers[$key]->id)) }}">{{ ucwords($likedUsers[$key]->name) }}</a></h4>
																<h6>Likes : {{ $likedUsers[$key]->UserLikes->count() }}</h6>
																<p></p>
															</div>
														</div>
														<div class="text-center">
															<a class="btn btn-primary" href="{{ route('newsfeed-show', $newsfeeds[$key]->id) }}">View Newsfeed</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endforeach
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
<script>
	$('.send-request-btn').on('click', function() {
		toastr.options = {
			"closeButton": true,
			"newestOnTop": true,
			"positionClass": "toast-top-right"
		};
		route = $(this).attr('route');
		user_id = $(this).attr('user_id');
		console.log('data', route);
		$.ajax({
			url: route,
			method: "GET",
			data: {
				"_token": "{{ csrf_token() }}",
				'user_id': user_id
			},
			beforeSend: function() {},
			success: function(data) {
				if (data.status) {
					toastr.success(data.text);
				}
			}
		})
	});
	$('.postFollow').on('click', function() {
		toastr.options = {
			"closeButton": true,
			"newestOnTop": true,
			"positionClass": "toast-top-right"
		};
		newsfeed_id = $(this).attr('newsfeed_id');
		user_id = $(this).attr('user_id');
		following_id = $(this).attr('following_id');
		route = $(this).attr('route');

		$.ajax({
			url: route,
			method: "POST",
			data: {
				"_token": "{{ csrf_token() }}",
				"newsfeed_id": newsfeed_id,
				"user_id": user_id,
				"following_id": following_id,
			},
			beforeSend: function() {},
			success: function(response) {
				if (response.data.is_follow === true) {
					$('#post-follow-' + newsfeed_id).html('');
					html = `<div class="icon font-size-20"><i class="ri-user-unfollow-line"></i></div>
							<div class="data ml-2"><h6>Unfollow</h6></div>`;
					$('#post-follow-' + newsfeed_id).html(html);
					$('#post-follow-' + newsfeed_id).css('color', 'black');
					$('#post-follow-' + newsfeed_id).css('font-weight', 'bold');
				} else {
					$('#post-follow-' + newsfeed_id).html('');
					html = `<div class="icon font-size-20"><i class="ri-user-follow-line"></i></div>
							<div class="data ml-2"><h6>Follow</h6></div>`;
					$('#post-follow-' + newsfeed_id).html(html);
					$('#post-follow-' + newsfeed_id).css('color', '#50b5ff');
					$('#post-follow-' + newsfeed_id).css('font-weight', 'normal');
				}
				toastr.success(response.text);
			}
		})
	});
</script>
@endsection