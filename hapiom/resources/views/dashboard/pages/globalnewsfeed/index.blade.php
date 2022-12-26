@extends('dashboard.layouts.master')
@section('title', 'Global Newsfeed')
@section('page', 'Global Newsfeed')
@section('page-css-link') @endsection
@section('page-css')
<style>
	.line-height-17 {
		line-height: 17px;
	}
</style>
@endsection
@section('main-content')

<div id="content-page" class="content-page">
	<div class="container">
		<div class="row">
			@include('dashboard.includes.alert')

			<div class="col-lg-8 m-0 p-0">
				<div class="col-sm-12">
					<div id="post-modal-data" class="iq-card iq-card-block iq-card-stretch iq-card-height">
						<div class="iq-card-header d-flex justify-content-between">
							<div class="iq-header-title">
								<h4 class="card-title">Create Post</h4>
							</div>
						</div>
						<div class="iq-card-body" data-toggle="modal" data-target="#post-modal">
							<div class="d-flex align-items-center">
								<div class="user-img">
									@if(isset($userinfo->profile_image) && file_exists('images/profile'. $userinfo->profile_image))
									<img src="{{ url('images/profile',$userinfo->profile_image ) }}" alt="userimg" class="avatar-60 rounded-circle">
									@else
									<img src="{{url('assets/dashboard/img/default-avatar.png')}}" alt="userimg" class="avatar-60 rounded-circle">
									@endif
								</div>
								<form class="post-text ml-3 w-100" action="javascript:void();">
									<input type="text" class="form-control" placeholder="What's on your mind?" style="border: none;">
								</form>
							</div>
							<hr>
							<ul class="post-opt-block d-flex align-items-center list-inline m-0 p-0">
								<li class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="{{ url('assets/dashboard/images/small/07.png') }}" alt="icon" class="img-fluid"> Photo/Video</li>
							</ul>
						</div>
						<div class="modal fade" id="post-modal" tabindex="-1" role="dialog" aria-labelledby="post-modalLabel" aria-hidden="true" style="display: none;">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="post-modalLabel">Create Post</h5>
										<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="ri-close-fill m-0"></i></button>
									</div>
									<form method="post" action="{{ route('newsfeed-create') }}" enctype="multipart/form-data" id="post_upload_Form">
										@csrf
										<div class="modal-body">
											<div class="d-flex align-items-center">
												<div class="user-img">
													@if(isset($userinfo->profile_image) && file_exists('images/profile'. $userinfo->profile_image))
													<img src="{{ url('images/profile',$userinfo->profile_image ) }}" alt="userimg" class="avatar-60 rounded-circle">
													@else
													<img src="{{url('assets/dashboard/img/default-avatar.png')}}" alt="userimg" class="avatar-60 rounded-circle">
													@endif
												</div>
												<div class="caption ml-2">
													<h5 class="mb-0 line-height">{{ ucwords(Auth::user()->name) }}</h5>
												</div>
											</div>
											<input type="text" class="form-control mt-3" name="textpost" placeholder="What's on your mind?" style="border-radius:20px;">

											<input type="hidden" name="group_id" value="{{ @$group_id }}">
											<hr>
											<ul class="d-flex flex-wrap align-items-center list-inline m-0 p-0">
												<li class="col-md-6 mb-3 d-flex">
													<div class="iq-bg-primary rounded p-2 pointer mr-3 image_upload1"><img src="{{ url('assets/dashboard/images/small/07.png') }}" alt="icon" class="img-fluid "> Photo/Video</div>
													<input class="d-none" id="my_file1" type="file" name="image[]" multiple>
													<div id="preview_embed"></div>
												</li>
											</ul>
											<hr>
											<div class="other-option">
												<div class="d-flex align-items-center justify-content-between">


												</div>
											</div>
											<button type="submit" class="btn btn-primary d-block w-100 mt-3">Post</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				@php
				$i = 1;
				$j = 1;
				@endphp
				@foreach($results as $key=>$result)
				<div class="col-sm-12 " id="del-newsfeed_{{ $result->id }}">
					<div class="iq-card iq-card-block iq-card-stretch iq-card-height">
						<div class="iq-card-body">
							<div class="user-post-data">
								<div class="d-flex flex-wrap">
									<div class="media-support-user-img mr-3">
										@if(isset($result->userImageByPost->profile_image) && file_exists('images/profile'. $result->userImageByPost->profile_image))
										<img class="rounded-circle img-fluid" src="{{ url('images/profile',$result->userImageByPost->profile_image) }}" alt="">
										@else
										<img class="rounded-circle img-fluid" src="{{url('assets/dashboard/img/default-avatar.png')}}" alt="">
										@endif
									</div>
									<div class="media-support-info mt-2">
										<h5 class="mb-0 d-inline-block"><a href="#" class="">{{ ucwords($result->NewsfeedUser->name) }}</a></h5>
										<p class="mb-0 d-inline-block pl-3"><a href="javascript:void(0)" route="{{ route('newsfeed-follow')}}" newsfeed_id="{{ $result->id }}" user_id="{{ $result->user_id }}" following_id="{{ Auth::user()->id }}" class="postFollow" id="post-follow-{{ $result->id }}"><i class="ri-user-follow-line line-height-17"></i>Follow</a></p>
										<p class="mb-0 text-primary">{{ newsfeeddateformate($result->created_at) }}</p>
									</div>
									<div class="iq-card-post-toolbar">
										<div class="dropdown">
											<span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
												<i class="ri-more-fill"></i>
											</span>
											<div class="dropdown-menu m-0 p-0">
												<a class="dropdown-item p-3 share-post-btn" href="mailto:?subject=See%20this%20post%20by%20%40James%20Spiegel&body=See%20this%20post%20by%20%40James%20Spiegelhttp%3A%2F%2F127.0.0.1%3A8000%2Fshownewsfeed%2F19" newsfeed-id="{{$result->id }}" username="{{ $result->NewsfeedUser->name }}">
													<div class="d-flex align-items-top">
														<div class="icon font-size-20"><i class="ri-share-box-line"></i></div>
														<div class="data ml-2">
															<h6>Share post</h6>
															<p class="mb-0">Share this to another users via email</p>
														</div>
													</div>
												</a>
												@if ($result->user_id === Auth::user()->id)
												<a class="dropdown-item p-3 edit-newsfeed" href="javascript:void(0)" route="{{ route('edit-newsfeed', $result->id)}}" data-toggle="modal" data-target="#newsfeedModal" newsfeed_id="{{ $result->id }}">
													<div class="d-flex align-items-top">
														<div class="icon font-size-20"><i class="ri-save-line"></i></div>
														<div class="data ml-2">
															<h6>Edit Post</h6>
															<p class="mb-0">Edit your newsfeed post</p>
														</div>
													</div>
												</a>
												<a class="dropdown-item p-3 delete-newsfeed" href="javascript:void(0)" route="{{ route('delete-newsfeed', $result->id)}}" newsfeed_id="{{ $result->id }}">
													<div class="d-flex align-items-top">
														<div class="icon font-size-20"><i class="ri-close-circle-line"></i></div>
														<div class="data ml-2">
															<h6>Delete Post</h6>
															<p class="mb-0">Delete your newsfeed post</p>
														</div>
													</div>
												</a>
												@endif
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="mt-3">
								<p class="newsfeed-text-{{ $result->id }}">{{ @$result->text }}</p>
							</div>
							<div class="user-post">
								<div class="d-flex">
									@if($result->NewsfeedGallaries->count() == 1)
									<div class="col-md-12 newsfeed-update-img-{{ $result->id }}">
										@foreach($result->NewsfeedGallaries as $imageValue)
										@if (isset($imageValue->image) && file_exists('images/newsfeed/'.$imageValue->image))
										<div class="col-md-12">
											<a href="{{ route('newsfeed-show', $result->id) }}"><img src="{{ url('images/newsfeed/'.$imageValue->image) }}" alt="post-image" class="img-fluid rounded w-100" style="height: 360px;"></a>
										</div>
										@endif
										@endforeach
									</div>
									@else
									<div class="col-md-6 row m-0 p-0 newsfeed-update-img-{{ $result->id }}">
										@foreach($result->NewsfeedGallaries as $imageValue)
										@if (isset($imageValue->image) && file_exists('images/newsfeed/'.$imageValue->image))
										<div class="col-sm-12">
											<a href="{{ route('newsfeed-show', $result->id) }}"><img src="{{ url('images/newsfeed/'.$imageValue->image) }}" alt="post-image" class="img-fluid rounded w-100" style="height: 360px;"></a>
										</div>
										@endif
										@endforeach
									</div>
									@endif
									<div class="col-md-12 newsfeed-update-img-show-{{ $result->id }}"></div>
								</div>
							</div>
							<div class="comment-area mt-3">
								<div class="d-flex justify-content-between align-items-center">
									<div class="like-block position-relative d-flex align-items-center">
										<div class="d-flex align-items-center">
											<div class="like-data">
												<div class="dropdown">
													<span class="dropdown-toggle">
														<a href="javascript:void(0);" class="likePost" newsfeed_id="{{ $result->id }}" route="{{ route('newsfeed-like')}}" user_id="{{ $result->user_id }}" likes_id="{{ Auth::user()->id }}">
															@if($result->NewsfeedLike->count() > 0)
															@php $hasMe = null; @endphp
															@foreach($result->NewsfeedLike as $newlike)
															@if($newlike->NewsfeedUser->id !== Auth::user()->id)
															@php $hasMe = null; @endphp
															@continue;
															@else
															@php $hasMe = true; @endphp
															@if($newlike->face_icon)
															<input type="hidden" value="{{ $newlike->face_icon }}" class="facemocion" />
															@else
															<input type="hidden" value="gusta" class="facemocion" />
															@endif
															@endif
															@endforeach
															@if(!$hasMe)
															<input type="hidden" value="gusta" class="facemocion" />
															@endif
															@else
															<input type="hidden" value="gusta" class="facemocion" />
															@endif
														</a>

													</span>
												</div>
											</div>
											<div class="total-like-block ml-2 mr-3">
												<div class="dropdown">
													<span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
														<span class="total_count_{{ $result->id }}">{{ $result->NewsfeedLike->count() }}</span> Likes
													</span>
													<input type="hidden" id="newsfeed_id_{{ $i }}" value="{{ $result->id }}" disabled="">
													<input type="hidden" id="user_id_{{ $i }}" value="{{ $result->user_id }}" disabled="">
													<input type="hidden" id="likes_id_{{ $i }}" value="{{ Auth::user()->id }}" disabled="">
													<div class="dropdown-menu">
														@if($result->NewsfeedLike->count() > 0)
														@php $like = 0; @endphp
														@foreach($result->NewsfeedLike as $newlike)
														@if($like < 7) <a class="dropdown-item" href="#">{{ $newlike->NewsfeedUser->name }}</a>
															@endif
															@php $like = $like + 1; @endphp
															@endforeach
															@endif
													</div>
												</div>
											</div>
										</div>
										<div class="total-comment-block">
											<div class="dropdown">
												<span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
													{{ $result->NewsfeedComment->count() }} Comment
												</span>
											</div>
										</div>
									</div>
									<div class="share-block d-flex align-items-center feather-icon mr-3 comment_btn" id="{{ $result->id}}">
										<a href="javascript:void();" style="font-size: 18px;"><i class="ri-chat-2-line"></i>
											<span class="ml-1">Comment</span></a>
									</div>
								</div>
								<hr>

								<ul class="post-comments p-0 m-0 hide-newsfeed_{{ $result->id }}">
									@foreach($result->NewsfeedComment as $key => $comment)
									@if ($key == 1)
									@break
									@endif
									<li class="mb-2 reply_comment_add_{{ $comment->id }}" id="comment-el-{{ $comment->id }}">
										<div class="d-flex flex-wrap justify-content-start">
											<div class="user-img">
												@if(isset($comment->profileImage->profile_image) && file_exists('images/profile'. $comment->profileImage->profile_image))
												<img src="{{ url('images/profile',$comment->profileImage->profile_image) }}" alt="userimg" class="avatar-35 rounded-circle img-fluid">
												@else
												<img src="{{url('assets/dashboard/img/default-avatar.png')}}" alt="userimg" class="avatar-35 rounded-circle img-fluid">
												@endif
											</div>
											<div class="comment-data-block ml-3">
												<h6>{{ ucwords($comment->NewsfeedUser->name) }}</h6>
												<p class="mb-0 comment-text-{{ $comment->id }}">{{ ucwords($comment->comment) }}</p>
												<div class="d-flex flex-wrap align-items-center comment-activity">
													<a href="javascript:void();" class="likeCommentPost" comment_id="{{ $comment->id }}" newsfeed_id="{{ $result->id }}" route="{{ route('newsfeed-comment-like')}}" users_id="{{ Auth::user()->id }}"><span id="" class="total_comment_like_count_{{ $comment->id }}">{{ $comment->NewsfeedcommentLike ? $comment->NewsfeedcommentLike->count() : "0"  }}</span> like</a>
													<a href="javascript:void();" class="reply comment_reply_btn" id="{{ $comment->id}}">reply</a>
													<a href="javascript:void();">translate</a>
													<span> {{ newsfeeddateformate($comment->created_at) }}</span>
												</div>
												<!-- Reply Comment Form  -->

												<form class="comment-text align-items-center mt-3 comment-reply-form comment_reply_add_{{$comment->id}}" route="{{ route('comment_reply_add')}}" user_id="{{ Auth::user()->id }}" newsfeed_id="{{ $result->id }}" comment_id="{{$comment->id}}" id="">
													<textarea class="form-control rounded comment-reply-text-{{ $comment->id }}" id="" name="comment" placeholder="" required></textarea>

													<button class="badge badge-primary mt-2" id="submit" type="submit">Post</button>
													<button class="badge badge-secondary mt-2 ml-2 comment_reply_btn" id="{{$comment->id}}">Cancel</button>

												</form>
												<!-- ... end Reply Comment Form  -->
											</div>
											@if ($comment->user_id === Auth::user()->id)
											<div class="iq-card-post-toolbar d-inline-block">
												<div class="dropdown">
													<span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
														<i class="ri-more-fill"></i>
													</span>
													<div class="dropdown-menu m-0 p-0">
														<a class="dropdown-item p-3 edit-comment" href="javascript:void();" route="{{ route('edit-comment')}}" comment_id="{{ $comment->id }}" data-toggle="modal" data-target="#commentModal">
															<div class="d-flex align-items-top">
																<div class="icon font-size-20"><i class="ri-edit-2-line"></i></div>
																<div class="data ml-2">
																	<h6>Edit comment</h6>
																</div>
															</div>
														</a>
														<a class="dropdown-item p-3 delete-comment" href="javascript:void();" route="{{ route('delete-comment', $comment->id)}}" comment_id="{{ $comment->id }}" newsfeed_id="{{ $comment->newsfeed_id }}">
															<div class="d-flex align-items-top">
																<div class="icon font-size-20"><i class="ri-delete-back-2-line"></i></div>
																<div class="data ml-2">
																	<h6>Delete comment</h6>
																</div>
															</div>
														</a>
														<!-- <li>
															<a href="javascript:void(0)" route="{{ route('edit-comment', $comment->id) }}" class="edit-comment" data-toggle="modal" data-target="#commentModal" comment_id="{{ $comment->id }}">Edit Comments</a>
														</li>
														<li>
															<a href="javascript:void(0)" route="{{ route('delete-comment', $comment->id) }}" class="delete-comment" comment_id="{{ $comment->id }}" >Delete Comment</a>
														</li> -->
													</div>
												</div>
											</div>
											@endif
										</div>
									</li>
									@endforeach
								</ul>
								<form class="comment-text align-items-center mt-3 comment-form comment_add_{{$result->id}}" route="{{ route('comment_add')}}" user_id="{{ Auth::user()->id }}" newsfeed_id="{{ $result->id }}" id="">
									<div class="comment-box comment-text-{{ $result->id }}" id="" contentEditable="true" name="comment" onkeydown="doComment(event, {{ $result->id }})"></div>
									<!-- <button class="badge badge-primary mt-2" id="submit" type="submit">Post</button>
									<button class="badge badge-secondary mt-2 ml-2 comment_btn" id="{{$result->id}}">Cancel</button> -->
								</form>
							</div>
							<?php
							if ($result->NewsfeedComment->count() >= 2) {
								$view_more = 'View ' . $result->NewsfeedComment->count() - 1 . ' more comments +';
							} else {
								$view_more = 'No comment found.';
							} ?>
							<a href="javascript:void(0)" newsfeed_id="{{$result->id}}" route="{{ route('view-more-comments') }}" class="more-comments view-more-comment-btn-{{$result->id}}">{{$view_more}}</a>
						</div>
					</div>
				</div>
				@php
				$i++;
				$j++;
				@endphp
				@endforeach

			</div>
			<div class="col-lg-4">
				<div class="iq-card">
					<div class="iq-card-header d-flex justify-content-between">
						<div class="iq-header-title">
							<h4 class="card-title">Friend Suggestions</h4>
						</div>
					</div>
					<div class="iq-card-body">
						<ul class="media-story m-0 p-0">
							@foreach($friends as $value)
							<li class="d-flex mb-4 align-items-center active add-friend-{{ $value->id }}">
								@if (isset($value->userInfo->profile_image) && file_exists('images/profile/'. $value->userInfo->profile_image))
								<a href="{{ route('user-profile',encrypt($value->id)) }}">
									<img src="{{url('images/profile/', $value->userInfo->profile_image)}}" class="rounded-circle img-fluid" alt="user">
								</a>
								@else
								<a href="{{ route('user-profile',encrypt($value->id)) }}">
									<img src="{{url('assets/dashboard/img/default-avatar.png')}}" class="rounded-circle img-fluid mr-3" alt="user">
								</a>
								@endif
								<div class="stories-data ml-3">
									<h5><a href="{{ route('user-profile',encrypt($value->id)) }}">{{ $value->name }}</a></h5>
									<p class="mb-0"><a href="javascript:void(0)" route="{{ route('add-friend',$value->id)}}" user_id="{{$value->id}}" class="add-friend" id="liveToastBtn">Add friend</a></p>
								</div>
							</li>
							@endforeach
						</ul>
						<a href="{{ route('friendlist') }}" class="btn btn-primary d-block mt-3">See All</a>
					</div>
				</div>
				<!-- <div class="iq-card">
					<div class="iq-card-header d-flex justify-content-between">
						<div class="iq-header-title">
							<h4 class="card-title">Events</h4>
						</div>
						<div class="iq-card-header-toolbar d-flex align-items-center">
							<div class="dropdown">
								<span class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false" role="button">
									<i class="ri-more-fill"></i>
								</span>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="">
									<a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
									<a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
									<a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
									<a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
									<a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
								</div>
							</div>
						</div>
					</div>
					<div class="iq-card-body">
						<ul class="media-story m-0 p-0">
							<li class="d-flex mb-4 align-items-center ">
								<img src="{{ url('assets/dashboard/images/page-img/s4.jpg') }}" alt="story-img" class="rounded-circle img-fluid">
								<div class="stories-data ml-3">
									<h5>Web Workshop</h5>
									<p class="mb-0">1 hour ago</p>
								</div>
							</li>
							<li class="d-flex align-items-center">
								<img src="{{ url('assets/dashboard/images/page-img/s5.jpg') }}" alt="story-img" class="rounded-circle img-fluid">
								<div class="stories-data ml-3">
									<h5>Fun Events and Festivals</h5>
									<p class="mb-0">1 hour ago</p>
								</div>
							</li>
						</ul>
					</div>
				</div> -->
				<div class="iq-card">
					<div class="iq-card-header d-flex justify-content-between">
						<div class="iq-header-title">
							<h4 class="card-title">Upcoming Birthday</h4>
						</div>
					</div>
					<div class="iq-card-body">
						@if($acceptedFriends && count($acceptedFriends) > 0)
						<ul class="media-story m-0 p-0">
							@foreach($acceptedFriends as $value)
							@php
							if ($value->userInfo) {
							$birthMonth = Carbon\Carbon::parse($value->userInfo->dob)->format('m');
							$birthDate = Carbon\Carbon::parse($value->userInfo->dob)->format('d');
							$currentMonth = Carbon\Carbon::now()->format('m');
							$currentDate = Carbon\Carbon::now()->format('d');
							$birthDay = Carbon\Carbon::parse($value->userInfo->dob);
							}
							@endphp
							@if ($value->userInfo)
							@if(($birthMonth == $currentMonth) && ($birthDate > $currentDate) )
							<li class="d-flex mb-4 align-items-center active">
								@if(isset($value->userInfo->profile_image) && file_exists('images/profile/'. $value->userInfo->profile_image))
								<a href="{{ route('user-profile',encrypt($value->id)) }}">
									<img src="{{ url('images/profile/',$value->userInfo->profile_image) }}" alt="profile-img" class="rounded-circle img-fluid" />
								</a>
								@else
								<a href="{{ route('user-profile',encrypt($value->id)) }}">
									<img src="{{ url('assets/dashboard/img/default-avatar.png') }}" alt="profile-img" class="rounded-circle img-fluid" />
								</a>
								@endif
								<div class="stories-data ml-3">
									<h5><a href="{{ route('user-profile',encrypt($value->id)) }}">{{ $value->name }}</a></h5>
									<p class="mb-0">{{ $birthDay->format('Y-m-d') }}</p>
								</div>
							</li>
							@else
							<h5 class="text-center">No upcoming birthday.</h5>
							@endif
							@else
							<h5 class="text-center">He needs to add his profile.</h5>
							<li class="d-flex mb-4 align-items-center active">
								<a href="{{ route('user-profile',encrypt($value->id)) }}">
									<img src="{{ url('assets/dashboard/img/default-avatar.png') }}" alt="profile-img" class="rounded-circle img-fluid" />
								</a>
								<div class="stories-data ml-3">
									<h5><a href="{{ route('user-profile',encrypt($value->id)) }}">{{ $value->name }}</a></h5>
									<p class="mb-0">No birthday</p>
								</div>
							</li>
							@endif
							@endforeach
						</ul>
						@else
						<h5 class="text-center">No friends accepted.</h5>
						@endif
					</div>
				</div>
				<div class="iq-card">
					<div class="iq-card-header d-flex justify-content-between">
						<div class="iq-header-title">
							<h4 class="card-title">Suggested Pages</h4>
						</div>
					</div>
					<div class="iq-card-body">
						<ul class="suggested-page-story m-0 p-0 list-inline">
							@foreach($randomResults as $result)
							<li class="mb-3">
								<div class="d-flex align-items-center mb-3">
									@if(isset($result->userImageByPost->profile_image) && file_exists('images/profile' .$result->userImageByPost->profile_image))
									<a href="{{ route('user-profile',encrypt($result->NewsfeedUser->id)) }}">
										<img alt="story-img" class="rounded-circle img-fluid avatar-50" src="{{ url('images/profile',$result->userImageByPost->profile_image) }}">
									</a>
									@else
									<a href="{{ route('user-profile',encrypt($result->NewsfeedUser->id)) }}">
										<img alt="story-img" class="rounded-circle img-fluid avatar-50" src="{{url('assets/dashboard/img/default-avatar.png')}}">
									</a>
									@endif
									<div class="stories-data ml-3">
										<h5><a href="{{ route('user-profile',encrypt($result->NewsfeedUser->id)) }}">{{ ucwords($result->NewsfeedUser->name) }}</a></h5>
										@php
										$truncated = (strlen($result->text) > 15) ? substr($result->text, 0, 15) . '...' : $result->text;
										@endphp
										<p class="mb-0">{{ $truncated }}</p>
									</div>
								</div>
								@if($result->NewsfeedGallaries->count() == 1)
								@foreach($result->NewsfeedGallaries as $imageValue)
								@if(isset($imageValue->image) && file_exists('images/newsfeed/'.$imageValue->image))
								<a href="{{ route('newsfeed-show', $result->id) }}"><img src="{{ url('images/newsfeed/'.$imageValue->image) }}" class="img-fluid rounded w-100 suggested-page_img" alt="Responsive image"></a>
								@endif
								@endforeach
								@else
								@foreach($result->NewsfeedGallaries as $imageValue)
								@if(isset($imageValue->image) && file_exists('images/newsfeed/'.$imageValue->image))
								<a href="{{ route('newsfeed-show', $result->id) }}"><img src="{{ url('images/newsfeed/'.$imageValue->image) }}" class="img-fluid rounded w-100 suggested-page_img" alt="Responsive image"></a>
								@endif
								@endforeach
								@endif
								<div class="mt-3">
									@php
									$like = null;
									foreach($result->NewsfeedLike as $newLike) {
									if($newLike->NewsfeedUser->id == Auth::user()->id) {
									$like = true;
									break;
									}
									}
									@endphp
									<a href="javascript:void(0)" class="btn d-block likePost like1Color_{{ $result->id }}" newsfeed_id="{{ $result->id }}" route="{{ route('newsfeed-like')}}" user_id="{{ $result->user_id }}" likes_id="{{ Auth::user()->id }}">
										@if($like)
										<span style="color: #ff5e3a;"><i class="ri-thumb-down-line mr-2"></i> Unlike Page</span>
										@else
										<i class="ri-thumb-up-line mr-2"></i> Like Page
										@endif
									</a>
								</div>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-12 text-center">
				<img src="{{ url('assets/dashboard/images/page-img/page-load-loader.gif') }}" alt="loader" style="height: 100px;">
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="newsfeedModal" tabindex="-1" role="dialog" aria-labelledby="newsfeedModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newsfeedModalLabel">Edit Post</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="newsfeed_form">
					<div class="form-group">
						<label for="newsfeed_description" class="col-form-label">Description:</label>
						<textarea type="text" class="form-control" id="newsfeed_description"></textarea>
						<input type="hidden" class="form-control" id="newsfeed-id">
					</div>
					<div class="form-group">
						<div class="row">
							<div class="iq-bg-primary col-md-4 rounded p-2 pointer mr-3 image_upload2"><img src="{{ url('assets/dashboard/images/small/07.png') }}" alt="icon" class="img-fluid "> Photo/Video</div>
							<input class="d-none" id="my_file2" type="file" name="image[]" multiple>
							<div class="col-md-8" id="edit-img-show">
								<img src="#" alt="icon" class="img-fluid ">
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary newsfeed_update_btn">Submit</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="commentModalLabel">Edit Comment</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="comment_form">
					<div class="form-group">
						<label for="comment_desc" class="col-form-label">Comment:</label>
						<textarea type="text" class="form-control" id="comment_desc"></textarea>
						<input type="hidden" class="form-control" id="edit-comment-id">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary comment_update_btn">Submit</button>
			</div>
		</div>
	</div>
</div>

@endsection
@section('page-js-link') @endsection
@section('page-js')

<script type="text/javascript">
	$('.share-post-btn').on('click', function() {
		let newsfeed_id = $('.share-post-btn').attr('newsfeed-id');
		let username = $('.share-post-btn').attr('username');
		let subject = `${encodeURIComponent('See this post by @' + username)}`;
		let body = subject + `${encodeURIComponent('{{url()->current()}}')}`;
		let mailtoURL = 'mailto:?subject=' + subject + '&body=' + body;
		$('.share-post-btn').attr('href', mailtoURL);
	});
	$(document).ready(function() {
		$(".image_upload1").click(function() {
			$("input[id='my_file1']").click();
		});

		$(".image_upload2").click(function() {
			$("input[id='my_file2']").click();
		});

		$(".image_upload3").click(function() {
			$("input[id='my_file3']").click();
		});

		$('.comment-form').hide();
		$(".comment_btn").click(function() {
			var id = $(this).attr('id');
			$(".comment_add_" + id).toggle();
		});

		$('.comment-reply-form').hide();
		$(".comment_reply_btn").click(function() {
			var id = $(this).attr('id');
			$(".comment_reply_add_" + id).toggle();
		});

		$('.comment-reply-child-form').hide();
		$(".comment_reply_child_btn").click(function() {
			var id = $(this).attr('id');
			$(".comment_reply_child_add_" + id).toggle();
		});

		$(document).on('click', '.likePost', function() {
			newsfeed_id = $(this).attr('newsfeed_id');
			user_id = $(this).attr('user_id');
			likes_id = $(this).attr('likes_id');
			route = $(this).attr('route');
			face_icon = $(this).find('input').val();

			$.ajax({
				url: route,
				method: "GET",
				data: {
					"_token": "{{ csrf_token() }}",
					"newsfeed_id": newsfeed_id,
					"user_id": user_id,
					"likes_id": likes_id,
					"face_icon": face_icon,
				},
				beforeSend: function() {},
				success: function(data) {
					console.log('data', data);
					$('.likePost').find('input').val(data['newsfeedLike']);
					if (data['is_like'] === true) {
						html = `<i class="ri-thumb-down-line mr-2"></i>Unlike Page`;
						$('.like1Color_' + newsfeed_id).html(html);
						$('.like1Color_' + newsfeed_id).css("color", "#ff5e3a");
						//$('.like2Color_' + newsfeed_id).css("background-color", "#ff5e3a");
					} else {
						html = `<i class="ri-thumb-up-line mr-2"></i>Like Page`;
						$('.like1Color_' + newsfeed_id).html(html);
						$('.like1Color_' + newsfeed_id).css("color", "#212529");
						//$('.like2Color_' + newsfeed_id).css("background-color", "#9a9fbf");
					}
					$('.total_count_' + newsfeed_id).html(data['count']);
				}
			})
		});
		$('.postFollow').on('click', function() {
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
						html = '<i class="ri-user-unfollow-line line-height-17"></i>Unfollow';
						$('#post-follow-' + newsfeed_id).html(html);
						$('#post-follow-' + newsfeed_id).css('color', 'black');
						$('#post-follow-' + newsfeed_id).css('font-weight', 'bold');
					} else {
						$('#post-follow-' + newsfeed_id).html('');
						html = '<i class="ri-user-follow-line line-height-17"></i>Follow';
						$('#post-follow-' + newsfeed_id).html(html);
						$('#post-follow-' + newsfeed_id).css('color', '#50b5ff');
						$('#post-follow-' + newsfeed_id).css('font-weight', 'normal');
					}
					//$('.total_count_' + newsfeed_id).html(data['count']);
				}
			})
		});

		$(document).on('click', '.likeCommentPost', function() {
			newsfeed_id = $(this).attr('newsfeed_id');
			users_id = $(this).attr('users_id');
			comment_id = $(this).attr('comment_id');
			route = $(this).attr('route');
			$.ajax({
				url: route,
				method: "GET",
				data: {
					"_token": "{{ csrf_token() }}",
					"newsfeed_id": newsfeed_id,
					"comment_id": comment_id,
					"users_id": users_id,
				},
				beforeSend: function() {},
				success: function(data) {
					if (data['is_like'] === true) {
						$('.commentlikeColor_' + comment_id).css("background-color", "#ff5e3a");
					} else {
						$('.commentlikeColor_' + comment_id).css("background-color", "#fafbfd");
					}
					$('.total_comment_like_count_' + comment_id).html(data['count']);
				}
			})
		});
		$(document).on('click', '.likeReplyCommentPost', function() {
			newsfeed_id = $(this).attr('newsfeed_id');
			users_id = $(this).attr('users_id');
			comment_id = $(this).attr('comment_id');
			reply_comment_id = $(this).attr('reply_comment_id');
			route = $(this).attr('route');
			$.ajax({
				url: route,
				method: "GET",
				data: {
					"_token": "{{ csrf_token() }}",
					"newsfeed_id": newsfeed_id,
					"comment_id": comment_id,
					"users_id": users_id,
					"reply_comment_id": reply_comment_id
				},
				beforeSend: function() {},
				success: function(data) {
					if (data['is_like'] === true) {
						$('.replycommentlikeColor_' + reply_comment_id).css("background-color", "#ff5e3a");
					} else {
						$('.replycommentlikeColor_' + reply_comment_id).css("background-color", "#fafbfd");
					}
					$('.total_reply_comment_like_count_' + reply_comment_id).html(data['count']);
				}
			})
		});
	});

	// Block Newsfeed Post
	$(document).on('click', '.block-newsfeed', function() {
		toastr.options = {
			"closeButton": true,
			"newestOnTop": true,
			"positionClass": "toast-top-right"
		};
		newsfeed_id = $(this).attr('newsfeed_id');
		var route = "{{url('/block-newsfeed/')}}" + '/' + newsfeed_id;
		$.ajax({
			url: route,
			method: "GET",
			data: {
				"_token": "{{ csrf_token() }}",
			},
			beforeSend: function() {},
			success: function(data) {
				toastr.success(data.text);
				if (data.status) {
					$('.block-hide-show-' + newsfeed_id).hide();
					var _html = '<a href="javascript:void(0)" class="unblock-newsfeed unblock-hide-show-' + newsfeed_id + '" newsfeed_id="' + newsfeed_id + '" id="liveToastBtn">Unblock Post</a>'
					$(".block-unbolock-" + newsfeed_id).append(_html);
				}
			}
		})
	});
	// Block Newsfeed Post
	$(document).on('click', '.unblock-newsfeed', function() {
		toastr.options = {
			"closeButton": true,
			"newestOnTop": true,
			"positionClass": "toast-top-right"
		};

		newsfeed_id = $(this).attr('newsfeed_id');
		var route = "{{url('/unblock-newsfeed/')}}" + '/' + newsfeed_id;

		$.ajax({
			url: route,
			method: "GET",
			data: {
				"_token": "{{ csrf_token() }}",
			},
			beforeSend: function() {},
			success: function(data) {
				toastr.success(data.text);
				if (data.status) {
					$('.unblock-hide-show-' + newsfeed_id).hide();
					var _html = '<a href="javascript:void(0)" class="block-newsfeed block-hide-show-' + newsfeed_id + '" newsfeed_id="' + newsfeed_id + '" id="liveToastBtn">Block Post</a>'
					$(".block-unbolock-" + newsfeed_id).append(_html);
				}
			}
		})
	});
	// Delete Newsfeed Post
	$(document).on('click', '.delete-newsfeed', function() {
		newsfeed_id = $(this).attr('newsfeed_id');
		toastr.options = {
			"closeButton": true,
			"newestOnTop": true,
			"positionClass": "toast-top-right"
		};
		route = $(this).attr('route');
		if (confirm("Are You Sure to delete this newsfeed post ?") == true) {
			$.ajax({
				url: route,
				method: "GET",
				data: {
					"_token": "{{ csrf_token() }}",
				},
				beforeSend: function() {},
				success: function(data) {
					toastr.success(data.text);
					if (data.status) {
						document.getElementById("del-newsfeed_" + newsfeed_id).remove();
					}
				}
			})
		}

	});

	// Newsfeed Model-popup
	$(document).on('click', '.edit-newsfeed', function() {
		newsfeed_id = $(this).attr('newsfeed_id');
		route = $(this).attr('route');

		$.ajax({
			url: route,
			method: "GET",
			data: {
				"_token": "{{ csrf_token() }}",
				"newsfeed_id": newsfeed_id,
			},
			beforeSend: function() {},
			success: function(data) {
				$('#newsfeedModal').modal('show');
				$('#newsfeed_description').val('');
				$('#newsfeed_description').val(data.data.newfeed.text);
				document.getElementById("newsfeed-id").value = data.data.newfeed.id;
				var images = data.data.newfeed_galary;
				var arrayImagesElement = document.getElementById("edit-img-show");

				function createImageNode(images) {
					var img = document.createElement('img');
					img.src = "images/newsfeed/" + images.image;
					img.id = "edit-image-show";
					img.class = "edit-image-show";
					img.width = "435";
					img.height = "194"
					img.style.margin = "15px";
					return img;
				}
				$('div#edit-img-show  img').remove();
				images.forEach(img => {
					arrayImagesElement.appendChild(createImageNode(img));
				});

			}
		})
	})

	@if(Session::has('message'))
	toastr.options = {
		"closeButton": true,
		"progressBar": true
	}
	toastr.success("{{ session('message') }}");
	@endif

	// Load More Functionality...
	$(document).ready(function() {
		$(".load-more").on('click', function() {
			var _totalCurrentResult = $(".main-div").length;
			route = $(this).attr('route');
			// Ajax Reuqest
			$.ajax({
				url: route,
				type: 'get',
				dataType: 'json',
				data: {
					skip: _totalCurrentResult
				},
				beforeSend: function() {
					// $(".load-more").html('Loading...');
				},
				success: function(response) {
					if (response.length != 0) {
						// $(".load-more").html('ABC See More');
						var _html = response;
						$(".newsfeedItem").append(_html);
						$('.comment-reply-form').hide();
						$(".comment_btn").click(function() {
							var id = $(this).attr('id');
							$(".comment_add_" + id).toggle();
						});

						$('.comment-form').hide();
						$('.comment-reply-form').hide();
						$(".comment_reply_btn").click(function() {
							var id = $(this).attr('id');
							$(".comment_reply_add_" + id).toggle();
						});

						$('.comment-reply-child-form').hide();
						$(".comment_reply_child_btn").click(function() {
							var id = $(this).attr('id');
							$(".comment_reply_child_add_" + id).toggle();
						});
						$('.comment-form').on('submit', function(e) {
							e.preventDefault();
							let user_id = $(this).attr('user_id')
							let newsfeed_id = $(this).attr('newsfeed_id')
							let comment = $(".comment-text-" + newsfeed_id).val();
							route = $(this).attr('route');

							$.ajax({
								url: route,
								method: "POST",
								data: {
									"_token": "{{ csrf_token() }}",
									comment: comment,
									user_id: user_id,
									newsfeed_id: newsfeed_id,
								},
								success: function(response) {
									_html = response.data;
									$('.comment_add_' + newsfeed_id).hide();
									$(".comments_list_" + newsfeed_id).hide();
									$(".hide-newsfeed_" + newsfeed_id).html(_html);
									$('.comment-reply-form').hide();
									$('.comment-text-' + newsfeed_id).val('');
									$(".comment_reply_btn").click(function() {
										var id = $(this).attr('id');
										$(".cr_" + response.insertData.id).toggle();
									});
								},
								error: function(response) {
									$('.comment-error-' + newsfeed_id).text(response.responseJSON.errors.comment);
								}
							});
						});
						$('.comment-reply-form').on('submit', function(e) {
							e.preventDefault();
							let user_id = $(this).attr('user_id')
							let newsfeed_id = $(this).attr('newsfeed_id')
							let comment_id = $(this).attr('comment_id')

							let comment = $(".comment-reply-text-" + comment_id).val();
							route = $(this).attr('route');
							if (comment === "") {
								$('.comment-reply-error-' + comment_id).text("This field is required.");
							} else {
								$.ajax({
									url: route,
									method: "POST",
									data: {
										"_token": "{{ csrf_token() }}",
										comment: comment,
										user_id: user_id,
										newsfeed_id: newsfeed_id,
										comment_id: comment_id
									},
									success: function(response) {
										alert(response);
										$('.comment_reply_add_' + comment_id).hide();
										$(".reply_comment_add_" + comment_id).append(response.data);
										$('.comment-reply-child-form').hide();
										$('.comment-reply-text-' + comment_id).val('');
										$(".comment_reply_child_btn").click(function() {
											var id = $(this).attr('id');
											$(".crc_" + response.insertData.id).toggle();
										});
									},
									error: function(response) {
										$('.comment-reply-error-' + comment_id).text(response.responseJSON.errors.comment);
									}
								});
							}
						});
						$('.comment-reply-child-form').on('submit', function(e) {
							e.preventDefault();
							let user_id = $(this).attr('user_id')
							let newsfeed_id = $(this).attr('newsfeed_id')
							let comment_id = $(this).attr('comment_id')
							let reply_comment_id = $(this).attr('reply_comment_id')
							let comment = $(".comment-reply-child-text-" + reply_comment_id).val();
							route = $(this).attr('route');
							if (comment === "") {
								$('.comment-reply-child-error-' + reply_comment_id).text("This field is required.");
							} else {
								$.ajax({
									url: route,
									method: "POST",
									data: {
										"_token": "{{ csrf_token() }}",
										comment: comment,
										user_id: user_id,
										newsfeed_id: newsfeed_id,
										comment_id: comment_id
									},
									success: function(response) {
										$('.comment_reply_child_add_' + reply_comment_id).hide();
										$(".reply_comment_add_" + comment_id).append(response.data);
										$('.comment-reply-child-form').hide();
										$('.comment-reply-child-text-' + reply_comment_id).val('');
										$(".comment_reply_child_btn").click(function() {
											var id = $(this).attr('id');
											$(".crc_" + response.insertData.id).toggle();
										});
									},
									error: function(response) {
										$('.comment-reply-child-error-' + comment_id).text(response.responseJSON.errors.comment);
									}
								});
							}
						});

					} else {
						$(".load-more").hide();
						$(".no-result-found").html("No Result Found");
					}
				}
			});
		});
	});
	// Show Like Status
	// $(document).ready( function () {
	// 	route = "get-like-status";
	//     $.ajax({
	//         url: route,
	//         method: "GET",
	//         data: {
	//             "_token": "{{ csrf_token() }}",
	//         },
	//         beforeSend: function() {
	//         },
	//         success: function(data) {
	// 			data.forEach(element => {
	// 				if(element.newsfeed_id){
	// 					$('.post-add-icon .like1Color_'+element.newsfeed_id).css("color", "#ff5e3a");
	// 					$('.post-add-icon'+element.newsfeed_id).css("color", "#ff5e3a","fill: #ff5e3a;");
	// 				}
	// 			});

	//         }
	//     })
	// });

	// Post Comment
	function doComment(event, newsfeed_id) {
		if (event.keyCode == 13) {
			let comment = $('.comment-text-' + newsfeed_id).text();
			if (!event.shiftKey && comment) {
				$('.comment_add_' + newsfeed_id).submit();
				event.stopPropagation();
			}
		}

	}
	$(document).ready(function() {
		$('.comment-form').on('submit', function(e) {
			e.preventDefault();
			let user_id = $(this).attr('user_id')
			let newsfeed_id = $(this).attr('newsfeed_id')
			let comment = $(".comment-text-" + newsfeed_id).text();
			route = $(this).attr('route');
			$.ajax({
				url: route,
				method: "POST",
				data: {
					"_token": "{{ csrf_token() }}",
					comment: comment,
					user_id: user_id,
					newsfeed_id: newsfeed_id,
				},
				success: function(response) {
					location.reload();
				},
				error: function(response) {
					$('.comment-error-' + newsfeed_id).text(response.responseJSON.errors.comment);
				}
			});
		});
	});

	// Add Friend
	$(document).on('click', '.add-friend', function() {
		toastr.options = {
			"closeButton": true,
			"newestOnTop": true,
			"positionClass": "toast-top-right"
		};

		route = $(this).attr('route');
		user_id = $(this).attr('user_id');
		$.ajax({
			url: route,
			method: "GET",
			data: {
				"_token": "{{ csrf_token() }}",
				"user_id": user_id,
			},
			beforeSend: function() {},
			success: function(data) {
				toastr.success(data.text.message);
				if (data.status) {
					$('.add-friend-' + user_id).remove();
				}
			}
		})
	});
	// Comment Model-popup
	$(document).on('click', '.edit-comment', function() {
		comment_id = $(this).attr('comment_id');
		route = $(this).attr('route');

		$.ajax({
			url: route,
			method: "GET",
			data: {
				"_token": "{{ csrf_token() }}",
				"comment_id": comment_id,
			},
			beforeSend: function() {},
			success: function(data) {
				//$('#commentModal').modal('show');
				$('#comment_desc').val('');
				$('#comment_desc').val(data.comment);
				$('#edit-comment-id').val(data.id);
			}
		})
	})
	// Delete comment Post
	$(document).on('click', '.delete-comment', function() {
		comment_id = $(this).attr('comment_id');
		toastr.options = {
			"closeButton": true,
			"newestOnTop": true,
			"positionClass": "toast-top-right"
		};
		route = $(this).attr('route');
		if (confirm("Are you Sure to delete this comment ?") == true) {
			$.ajax({
				url: route,
				method: "GET",
				data: {
					"_token": "{{ csrf_token() }}",
				},
				beforeSend: function() {},
				success: function(data) {
					toastr.success(data.text);
					if (data.status) {
						$('#comment-el-' + comment_id).remove();
						$('.reply_comment_add_' + comment_id).remove();
					}
				}
			})
		}
	});

	// Post Reply Comment

	$('.comment-reply-form').on('submit', function(e) {
		e.preventDefault();
		let user_id = $(this).attr('user_id')
		let newsfeed_id = $(this).attr('newsfeed_id')
		let comment_id = $(this).attr('comment_id')
		let comment = $(".comment-reply-text-" + comment_id).val();

		route = $(this).attr('route');
		if (comment === "") {
			$('.comment-reply-error-' + comment_id).text("This field is required.");
		} else {
			$.ajax({
				url: route,
				method: "POST",
				data: {
					"_token": "{{ csrf_token() }}",
					comment: comment,
					user_id: user_id,
					newsfeed_id: newsfeed_id,
					comment_id: comment_id
				},
				success: function(response) {
					console.log(response.data);
					$('.comment_reply_add_' + comment_id).hide();
					$(".reply_comment_add_" + comment_id).html(response.data);
					$('.comment-reply-child-form').hide();
					$('.comment-reply-text-' + comment_id).val('');
					$(".comment_reply_child_btn").click(function() {
						var id = $(this).attr('id');
						$(".crc_" + response.insertData.id).toggle();
					});
				},
				error: function(response) {
					alert('errrorrrrrrrr');
					$('.comment-reply-error-' + comment_id).text(response.responseJSON.errors.comment);
				}
			});
		}
	});

	$('.comment-reply-child-form').on('submit', function(e) {
		e.preventDefault();
		let user_id = $(this).attr('user_id')
		let newsfeed_id = $(this).attr('newsfeed_id')
		let comment_id = $(this).attr('comment_id')
		let reply_comment_id = $(this).attr('reply_comment_id')
		let comment = $(".comment-reply-child-text-" + reply_comment_id).val();
		route = $(this).attr('route');
		if (comment === "") {
			$('.comment-reply-child-error-' + reply_comment_id).text("This field is required.");
		} else {
			$.ajax({
				url: route,
				method: "POST",
				data: {
					"_token": "{{ csrf_token() }}",
					comment: comment,
					user_id: user_id,
					newsfeed_id: newsfeed_id,
					comment_id: comment_id
				},
				success: function(response) {
					// location.reload();
					$('.comment_reply_child_add_' + reply_comment_id).hide();
					$(".reply_comment_add_" + comment_id).html(response.data);
					$('.comment-reply-child-form').hide();
					$('.comment-reply-child-text-' + reply_comment_id).val('');
					$(".comment_reply_child_btn").click(function() {
						var id = $(this).attr('id');
						$(".crc_" + response.insertData.id).toggle();
					});


				},
				error: function(response) {
					$('.comment-reply-child-error-' + reply_comment_id).text("This field is required.");
				}
			});
		}
	});

	// Reply Comment Model-popup
	$(document).on('click', '.edit-reply-comment', function() {
		comment_id = $(this).attr('comment_id');
		reply_comment_id = $(this).attr('reply_comment_id');
		route = $(this).attr('route');

		$.ajax({
			url: route,
			method: "GET",
			data: {
				"_token": "{{ csrf_token() }}",
				"comment_id": comment_id,
				"reply_comment_id": reply_comment_id
			},
			beforeSend: function() {},
			success: function(data) {
				$('#replyCommentModal').modal('show');
				$('#reply_comment_description').val('');
				$('#reply_comment_description').val(data.reply_comment);
				document.getElementById("edit-comments-id").value = data.comment_id;
				document.getElementById("edit-reply-comment-id").value = data.id;
			}
		})
	})

	// Delete comment Post
	$(document).on('click', '.delete-reply-comment', function() {
		comment_id = $(this).attr('comment_id');
		reply_comment_id = $(this).attr('reply_comment_id');
		toastr.options = {
			"closeButton": true,
			"newestOnTop": true,
			"positionClass": "toast-top-right"
		};
		route = $(this).attr('route');
		if (confirm("Are You Sure to delete this comment reply ?") == true) {
			$.ajax({
				url: route,
				method: "GET",
				data: {
					"_token": "{{ csrf_token() }}",
				},
				beforeSend: function() {},
				success: function(data) {
					toastr.success(data.text);
					if (data.status) {
						document.getElementById("del-reply-comment_" + reply_comment_id).remove();
					}
				}
			})
		}
	});
	// View More Comments+
	$(document).on('click', '.more-comments', function() {
		newsfeed_id = $(this).attr('newsfeed_id');
		route = $(this).attr('route');
		$.ajax({
			url: route,
			method: "GET",
			data: {
				"_token": "{{ csrf_token() }}",
				"newsfeed_id": newsfeed_id,
			},
			beforeSend: function() {
				$('.view-more-comment-btn-' + newsfeed_id).html('Loading...');
			},
			success: function(data) {
				if (data.length > 0) {
					_html = data;
					$('.view-more-comment-btn-' + newsfeed_id).hide();
					$(".comments_list_" + newsfeed_id).hide();
					$(".hide-newsfeed_" + newsfeed_id).html(data);
					// $('.comment-form').hide();
					// $('.comment-reply-form').hide();
					// $('.comment-reply-child-form').hide();
					$(".comment_reply_btn").click(function() {
						var id = $(this).attr('id');
						$(".cr_" + id).toggle();
					});
					$(".comment_reply_child_btn").click(function() {
						var id = $(this).attr('id');
						$(".crc_" + id).toggle();
					});
					// $('.comment-form').on('submit',function(e){
					// 	e.preventDefault();
					// 	let user_id = $(this).attr('user_id')
					// 	let newsfeed_id = $(this).attr('newsfeed_id')
					// 	let comment = $(".comment-text-"+newsfeed_id).val();
					// 	route = $(this).attr('route');

					// 	$.ajax({
					// 		url: route,
					// 		method:"POST",
					// 		data:{
					// 			"_token": "{{ csrf_token() }}",
					// 			comment:comment,
					// 			user_id:user_id,
					// 			newsfeed_id:newsfeed_id,
					// 		},
					// 		success:function(response){
					// 			_html = response.data;
					// 			$('.comment_add_'+newsfeed_id).hide();
					// 			$(".comments_list_"+newsfeed_id).hide();
					// 			$(".hide-newsfeed_"+newsfeed_id).append(_html);
					// 			$('.comment-reply-form').hide();
					// 			console.log(response);
					// 			$('.comment-text-'+newsfeed_id).val('');
					// 			$(".comment_reply_btn").click(function(){
					// 				var id =  $(this).attr('id');
					// 				$(".cr_"+response.insertData.id).toggle();
					// 			});
					// 		},
					// 		error: function(response) {
					// 			$('.comment-error-'+newsfeed_id).text(response.responseJSON.errors.comment);
					// 		}
					// 	});
					// });
					$('.comment-reply-form').on('submit', function(e) {
						console.log(4444444444444444444);
						e.preventDefault();
						let user_id = $(this).attr('user_id')
						let newsfeed_id = $(this).attr('newsfeed_id');
						let comment_id = $(this).attr('comment_id');
						let comment = $("#comment-reply-text-" + comment_id).val();
						route = $(this).attr('route');
						if (comment === "") {
							$('.comment-reply-error-' + comment_id).text("This field is required.");
						} else {
							$.ajax({
								url: route,
								method: "POST",
								data: {
									"_token": "{{ csrf_token() }}",
									comment: comment,
									user_id: user_id,
									newsfeed_id: newsfeed_id,
									comment_id: comment_id
								},
								success: function(response) {
									$('.comment_reply_add_' + comment_id).hide();
									$(".reply_comment_add_" + comment_id).html(response.data);
									$('.comment-reply-child-form').hide();
									$('.comment-reply-text-' + comment_id).val('');
									$(".comment_reply_child_btn").click(function() {
										var id = $(this).attr('id');
										$(".crc_" + response.insertData.id).toggle();
									});
								},
								error: function(response) {
									$('.comment-reply-error-' + comment_id).text(response.responseJSON.errors.comment);
								}
							});
						}
					});
					$('.comment-reply-child-form').on('submit', function(e) {
						e.preventDefault();
						let user_id = $(this).attr('user_id')
						let newsfeed_id = $(this).attr('newsfeed_id')
						let comment_id = $(this).attr('comment_id')
						let reply_comment_id = $(this).attr('reply_comment_id')
						let comment = $("#comment-reply-child-text-" + reply_comment_id).val();
						route = $(this).attr('route');
						if (comment === "") {
							$('.comment-reply-child-error-' + reply_comment_id).text("This field is required.");
						} else {
							$.ajax({
								url: route,
								method: "POST",
								data: {
									"_token": "{{ csrf_token() }}",
									comment: comment,
									user_id: user_id,
									newsfeed_id: newsfeed_id,
									comment_id: comment_id
								},
								success: function(response) {
									$('.comment_reply_child_add_' + reply_comment_id).hide();
									$(".reply_comment_add_" + comment_id).html(response.data);
									$('.comment-reply-child-form').hide();
									$('.comment-reply-child-text-' + reply_comment_id).val('');
									$(".comment_reply_child_btn").click(function() {
										var id = $(this).attr('id');
										$(".crc_" + response.insertData.id).toggle();
									});
								},
								error: function(response) {
									$('.comment-reply-child-error-' + reply_comment_id).text("This field is required.");
								}
							});
						}
					});
				} else {
					$('.view-more-comment-btn-' + newsfeed_id).html('No Comment Found.');
				}
			}
		})
	})

	// Model Close
	$(".close-newsfeed-model").click(function() {
		$("#newsfeedModal").modal('hide');
	});
	$(".close-comment-model").click(function() {
		$("#commentModal").modal('hide');
	});

	$(".close-reply-comment-model").click(function() {
		$("#replyCommentModal").modal('hide');
	});
	$('.newsfeed_update_btn').click(function() {
		$('.newsfeed_form').submit();
	});
	// Update Newsfeed
	$('.newsfeed_form').on('submit', function(e) {
		e.preventDefault();
		var formData = new FormData();
		let newsfeed_description = $('#newsfeed_description').val();
		let my_file2 = $('#my_file2').prop('files');
		let newsfeed_id = $('#newsfeed-id').val();
		let TotalFiles = $('#my_file2')[0].files.length; //Total files
		let files = $('#my_file2')[0];

		for (let i = 0; i < TotalFiles; i++) {
			formData.append('image' + i, files.files[i]);
		}

		let _token = $('meta[name="csrf-token"]').attr('content');
		_token = document.getElementsByName("_token")[0].value
		formData.append('_token', _token);
		formData.append('textpost', newsfeed_description);
		formData.append('totalFile', TotalFiles);
		formData.append('newsfeed_id', newsfeed_id);

		$.ajax({
			url: "{{ url('/newsfeed/update')}}",
			type: "POST",
			contentType: 'multipart/form-data',
			cache: false,
			contentType: false,
			processData: false,
			data: formData,
			beforeSend: function() {

			},
			success: (response) => {
				toastr.success(response.text);
				$("#newsfeedModal").modal('hide');

				$('.newsfeed-text-' + newsfeed_id).text(newsfeed_description);
				$('.newsfeed-update-img-' + newsfeed_id).hide();
				let _html = ''
				response.data.forEach(function(element) {
					let imagePath = "{{ url('images/newsfeed/') }}";
					_html += '<img loading="lazy" src="' + imagePath + '/' + element.image + '" alt="photo" width="488" height="194" ><br>'
				});
				$('div.newsfeed-update-img-show-' + newsfeed_id + ' > img, br').remove();
				$(".newsfeed-update-img-show-" + newsfeed_id).append(_html);
			},
			error: function(data) {
				console.log(data);
			}
		});
	});

	$('.comment_update_btn').on('click', function() {
		$('.comment_form').submit();
	});
	// Update Comment
	$('.comment_form').on('submit', function(e) {
		e.preventDefault();
		var formData = new FormData();
		let comment_desc = $('#comment_desc').val();
		let comment_id = $('#edit-comment-id').val();
		let _token = $('meta[name="csrf-token"]').attr('content');
		_token = document.getElementsByName("_token")[0].value
		formData.append('_token', _token);
		formData.append('textpost', comment_desc);
		formData.append('comment_id', comment_id);
		$.ajax({
			url: "{{ url('/comment-update')}}",
			type: "POST",
			contentType: 'multipart/form-data',
			cache: false,
			contentType: false,
			processData: false,
			data: formData,
			beforeSend: function() {

			},
			success: (response) => {
				toastr.success(response.text);
				if (response.status === "success") {
					$("#commentModal").modal('hide');
					$('.comment-text-' + comment_id).text(comment_desc);
				}
			},
			error: function(data) {
				console.log(data);
			}
		});
	});

	// // Update Comment Reply
	$('.comment_reply_form').on('submit', function(e) {
		e.preventDefault();
		var formData = new FormData();
		let reply_comment_description = $('#reply_comment_description').val();
		let comment_id = $('#edit-comments-id').val();
		let reply_comment_id = $('#edit-reply-comment-id').val();
		let _token = $('meta[name="csrf-token"]').attr('content');
		_token = document.getElementsByName("_token")[0].value
		formData.append('_token', _token);
		formData.append('textpost', reply_comment_description);
		formData.append('comment_id', comment_id);
		formData.append('reply_comment_id', reply_comment_id);

		$.ajax({
			url: "{{ url('/reply-comment-update')}}",
			type: "POST",
			contentType: 'multipart/form-data',
			cache: false,
			contentType: false,
			processData: false,
			data: formData,
			beforeSend: function() {

			},
			success: (response) => {
				toastr.success(response.text);
				if (response.status === "success") {
					$("#replyCommentModal").modal('hide');
					$('.comment-reply-txt-' + reply_comment_id).text(reply_comment_description);
				}
			},
			error: function(data) {
				console.log(data);
			}
		});
	});
	$('#my_file1').change(function() {
		filePreview(this);
	});

	function filePreview(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#post_upload_Form + embed').remove();
				$('#post_upload_Form #preview_embed').html('<embed src="' + e.target.result + '" width="80" height="50">');
			};
			reader.readAsDataURL(input.files[0]);
		}
	}

	$('.facemocion').faceMocion({
		emociones: [{
				"emocion": "amo",
				"TextoEmocion": "I love"
			},
			{
				"emocion": "divierte",
				"TextoEmocion": "I enjoy"
			},
			{
				"emocion": "gusta",
				"TextoEmocion": "I like"
			},
			{
				"emocion": "asombro",
				"TextoEmocion": "It amazes me"
			},
			{
				"emocion": "alegre",
				"TextoEmocion": "I am glad"
			}
		]
	});
</script>

@endsection