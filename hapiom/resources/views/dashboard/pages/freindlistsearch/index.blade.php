@extends('dashboard.layouts.master')
@section('title', ' Friend List')
@section('page', ' Friend List & Search')
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
<!-- Page Content  -->
<div id="content-page" class="content-page">
	<div class="container">
		<div class="iq-card">
			<div class="iq-card-body p-0">
				<div class="iq-edit-list">
					<ul class="iq-edit-profile d-flex nav nav-pills">
						<li class="col-md-6 p-0">
							<a class="nav-link @if($active!=='suggest') active @endif" data-toggle="pill" href="#my-friends">
								My Friends
							</a>
						</li>
						<li class="col-md-6 p-0">
							<a class="nav-link @if($active==='suggest') active @endif" data-toggle="pill" href="#friend-suggests">
								Friend Suggests
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="iq-edit-list-data">
			<div class="tab-content">
				<div class="tab-pane fade @if($active!=='suggest') active show @endif" id="my-friends" role="tabpanel">
					<div class="iq-card">
						<div class="iq-card-header d-flex justify-content-between">
							<div class="iq-header-title">
								<h4 class="card-title">My Friends</h4>
							</div>
						</div>
						<div class="iq-card-body">
							<div class="row">
								@foreach($friends as $result)
								<div class="col-md-4 mt-4">
									<div class="iq-card">
										<div class="iq-card-body profile-page p-0">
											<div class="profile-header-image">
												<div class="profile-info p-4">
													<div class="user-detail">
														<div class="profile-detail">
															<div class="friend-item-img pr-4">
																@if(isset($result->friendUser->userInfo->profile_image))
																<img src="{{ url('images/profile/',$result->friendUser->userInfo->profile_image) }}" alt="profile-img" class="avatar-60 img-fluid rounded-circle" />
																@else
																<img src="{{ url('assets/dashboard/img/default-avatar.png') }}" alt="profile-img" class="avatar-60 img-fluid rounded-circle" />
																@endif
															</div>
															<div class="user-data-block text-center mt-2">
																<h4><a href="{{ route('user-profile',encrypt($result->friendUser->id)) }}">{{ ucwords($result->friendUser->name) }}</a></h4>
																<h6>Friends : {{ $result->friendUser->Userfriends->count() }}</h6>
																<p></p>
															</div>
														</div>
														<div class="text-center">
															<a route="{{ route('block-friend',$result->friend_id)}}" class="btn btn-primary block-friend text-white">Block</a>
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
				<div class="tab-pane fade @if($active==='suggest') active show @endif" id="friend-suggests" role="tabpanel">
					<div class="iq-card">
						<div class="iq-card-header d-flex justify-content-between">
							<div class="iq-header-title">
								<h4 class="card-title">Friends Suggest</h4>
							</div>
						</div>
						<div class="iq-card-body">
							<div class="row">
								@foreach(Auth::user()->friendSuggestion() as $result)
								<div class="col-md-4 mt-4">
									<div class="iq-card">
										<div class="iq-card-body profile-page p-0">
											<div class="profile-header-image">
												<div class="profile-info p-4">
													<div class="user-detail">
														<div class="profile-detail">
															<div class="friend-item-img pr-4">
																@if(isset($result->userInfo->profile_image))
																<img src="{{ url('images/profile/',$result->userInfo->profile_image) }}" alt="profile-img" class="avatar-60 img-fluid rounded-circle" />
																@else
																<img src="{{ url('assets/dashboard/img/default-avatar.png') }}" alt="profile-img" class="avatar-60 img-fluid rounded-circle" />
																@endif
															</div>
															<div class="user-data-block text-center mt-2">
																<h4><a href="{{ route('user-profile',encrypt($result->id)) }}">{{ ucwords($result->name) }}</a></h4>
																<h6>Friends : {{ $result->Userfriends->count() }}</h6>
																<p></p>
															</div>
														</div>
														<div class="text-center">
															<button class="btn btn-primary" onclick='addFriend("{{ $result->id }}")'>Send request</a>
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
	function addFriend(userId) {
		var url = `/add-friend/${userId}`;
		$.get(url, function(res) {
			if (res.status === "success") {
				location.reload();
			} else {
				toastr.error("Sending request is failed");
			}
		})
	}
</script>
@endsection