@extends('dashboard.layouts.master')
@section('title', ' Newsfeed')
@section('page', ' Newsfeed')
@section('page-css-link') @endsection
@section('page-css') @endsection
@section('main-content')
<!-- Top Header-Profile --> 
<div class="header-spacer"></div> 
<div class="container">
	<div class="row"> 
		<!-- Main Content --> 
		<main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">

			<div class="ui-block">
				
				<!-- News Feed Form  -->
				
				<div class="news-feed-form">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active inline-items" data-bs-toggle="tab" href="#home-1" role="tab" aria-expanded="true">
				
								<svg class="olymp-status-icon"><use xlink:href="#olymp-status-icon"></use></svg>
				
								<span>Status</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link inline-items" data-bs-toggle="tab" href="#profile-1" role="tab" aria-expanded="false">
				
								<svg class="olymp-multimedia-icon"><use xlink:href="#olymp-multimedia-icon"></use></svg>
				
								<span>Multimedia</span>
							</a>
						</li>
				
						<li class="nav-item">
							<a class="nav-link inline-items" data-bs-toggle="tab" href="#blog" role="tab" aria-expanded="false">
								<svg class="olymp-blog-icon"><use xlink:href="#olymp-blog-icon"></use></svg>
				
								<span>Blog Post</span>
							</a>
						</li>
					</ul>
				
					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane fade active show" id="home-1" role="tabpanel" aria-expanded="true">
							<form method="post" action="{{ route('newsfeed-create') }}" enctype="multipart/form-data">
								@csrf
								<div class="author-thumb"> 
									@if(isset($userinfo->profile_image))
									<img loading="lazy" src="{{ url('public/images/profile',$userinfo->profile_image ) }}" width="45" height="45" alt="author" class=" post__author_image rounded-circle">
									@endif
								</div>
								<div class="form-group with-icon label-floating is-empty">
									<label class="control-label">Share what you are thinking here...</label>
									<textarea class="form-control" placeholder="" name="textpost"></textarea>
								</div>
								<div class="add-options-message">
									<a href="#" class="options-message image_upload1">
										<svg class="olymp-camera-icon" data-bs-toggle="modal" data-bs-target="#update-header-photo"><use xlink:href="#olymp-camera-icon"></use></svg>
									</a>
									<input class="d-none" id="my_file1" type="file" name="image[]" multiple><use xlink:href="#olymp-camera-icon"></use>
									<a href="#" class="options-message" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="ADD PHOTOS">
									</a>
									<a href="#" class="options-message" data-bs-toggle="tooltip" data-bs-placement="top"   data-bs-original-title="TAG YOUR FRIENDS">
										<svg class="olymp-computer-icon"><use xlink:href="#olymp-computer-icon"></use></svg>
									</a>
				
									<a href="#" class="options-message" data-bs-toggle="tooltip" data-bs-placement="top"   data-bs-original-title="ADD LOCATION">
										<svg class="olymp-small-pin-icon"><use xlink:href="#olymp-small-pin-icon"></use></svg>
									</a>
				
									<button type="submit" class="btn btn-primary btn-md-2">Post</button>
									<button class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>
				
								</div> 
							</form>
						</div>
						<div class="tab-pane fade" id="profile-1" role="tabpanel" aria-expanded="true">
							<form method="post" action="{{ route('newsfeed-create') }}" enctype="multipart/form-data">
								@csrf
								<div class="author-thumb">
									@if(isset($userinfo->profile_image))
									<img loading="lazy" src="{{ url('public/images/profile',$userinfo->profile_image ) }}" width="36" height="36" alt="author">
									@endif
								</div>
								<div class="form-group with-icon label-floating is-empty">
									<label class="control-label">Share what you are thinking here...</label>
									<textarea class="form-control" placeholder="" name="textpost"></textarea>
								</div>
								<div class="add-options-message">
									<a href="#" class="options-message image_upload2">
										<svg class="olymp-camera-icon" data-bs-toggle="modal" data-bs-target="#update-header-photo"><use xlink:href="#olymp-camera-icon"></use></svg>
									</a>
									<input class="d-none" id="my_file2" type="file" name="image[]" multiple><use xlink:href="#olymp-camera-icon"></use>
									<a href="#" class="options-message" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="ADD PHOTOS">
									</a>
									<a href="#" class="options-message" data-bs-toggle="tooltip" data-bs-placement="top"   data-bs-original-title="TAG YOUR FRIENDS">
										<svg class="olymp-computer-icon"><use xlink:href="#olymp-computer-icon"></use></svg>
									</a>
				
									<a href="#" class="options-message" data-bs-toggle="tooltip" data-bs-placement="top"   data-bs-original-title="ADD LOCATION">
										<svg class="olymp-small-pin-icon"><use xlink:href="#olymp-small-pin-icon"></use></svg>
									</a>
				
									<button type="submit" class="btn btn-primary btn-md-2">Post</button>
									<button class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>
				
								</div>
				
							</form>
						</div>
				
						<div class="tab-pane fade" id="blog" role="tabpanel" aria-expanded="true">
							<form method="post" action="{{ route('newsfeed-create') }}" enctype="multipart/form-data">
								@csrf
								<div class="author-thumb">
									@if(isset($userinfo->profile_image))
									<img loading="lazy" src="{{ url('public/images/profile',$userinfo->profile_image ) }}" width="36" height="36" alt="author">
									@endif
								</div>
								<div class="form-group with-icon label-floating is-empty">
									<label class="control-label">Share what you are thinking here...</label>
									<textarea class="form-control" placeholder="" name="textpost"></textarea>
								</div>
								<div class="add-options-message">
									<a href="#" class="options-message image_upload3">
										<svg class="olymp-camera-icon" data-bs-toggle="modal" data-bs-target="#update-header-photo"><use xlink:href="#olymp-camera-icon"></use></svg>
									</a>
									<input class="d-none" id="my_file3" type="file" name="image[]" multiple><use xlink:href="#olymp-camera-icon"></use>
									<a href="#" class="options-message" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="ADD PHOTOS">
									</a>
									<a href="#" class="options-message" data-bs-toggle="tooltip" data-bs-placement="top"   data-bs-original-title="TAG YOUR FRIENDS">
										<svg class="olymp-computer-icon"><use xlink:href="#olymp-computer-icon"></use></svg>
									</a>
				
									<a href="#" class="options-message" data-bs-toggle="tooltip" data-bs-placement="top"   data-bs-original-title="ADD LOCATION">
										<svg class="olymp-small-pin-icon"><use xlink:href="#olymp-small-pin-icon"></use></svg>
									</a>
				
									<button type="submit" class="btn btn-primary btn-md-2">Post</button>
									<button class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>
				
								</div>
				
							</form>
						</div>
					</div>
				</div>
				
				<!-- ... end News Feed Form  -->			
			</div>

			<div id="newsfeed-items-grid" class="newsfeedItem">
				@php 
				$i = 1;
				$j = 1;
				@endphp
				@foreach($results as $result)

				<div id="del-newsfeed_{{ $result->id }}" class="ui-block main-div hide-newsfeed_{{ $result->id }}"> 
					<article class="hentry post video"> 
						<div class="post__author author vcard inline-items">
							@if(isset($result->userImageByPost->profile_image))
							<img loading="lazy" src="{{ url('public/images/profile',$result->userImageByPost->profile_image) }}" class="post__author_image" alt="author" width="45" height="45">
							@else
							<img loading="lazy" src="{{ url('public/assets/dashboard/img/noimage.jpg') }}" class="post__author_image" alt="author" width="45" height="45">
							@endif
					
							<div class="author-date">
								@if(isset($result->NewsfeedUser->name))
								<a class="h6 post__author-name fn" href="#">{{ ucwords($result->NewsfeedUser->name) }}</a>
								@endif
								<div class="post__date">
									<time class="published" datetime="2004-07-24T18:18">
										{{date("F", strtotime($result->created_at))}} {{date("d", strtotime($result->created_at))}} at {{date("h:i", strtotime($result->created_at))}} {{date("a", strtotime($result->created_at))}}
									</time>
								</div>
							</div>
							@if($result->user_id === Auth::user()->id)
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="javascript:void(0)" route="{{ route('edit-newsfeed',$result->id)}}" class="edit-newsfeed" data-toggle="modal" data-target='#newsfeedModal' newsfeed_id="{{ $result->id }}">Edit Post</a>
									</li>
									<li>
										<a href="javascript:void(0)" route="{{ route('delete-newsfeed',$result->id)}}" class="delete-newsfeed" newsfeed_id="{{ $result->id }}">Delete Post</a>
									</li>
									@if($result->status === 1)
										<li class="block-unbolock-{{$result->id}}">
											<a href="javascript:void(0)" route="{{ route('block-newsfeed',$result->id)}}" class="block-newsfeed block-hide-show-{{$result->id}}" newsfeed_id="{{$result->id}}" id="liveToastBtn">Block Post</a>
										</li>
									@else
										<li class="block-unbolock-{{$result->id}}">
											<a href="javascript:void(0)" route="{{ route('unblock-newsfeed',$result->id) }}" class="unblock-newsfeed unblock-hide-show-{{$result->id}}" newsfeed_id="{{$result->id}}" id="liveToastBtn">Unblock Post</a>
										</li>
									@endif
								</ul>
							</div>
							@endif 
						</div> 
						<p class="newsfeed-text-{{$result->id}}">{{ $result->text }}</p>
						@if(isset($result->NewsfeedGallaries))
						<div class="post-video newsfeed-update-img-{{$result->id}}">
						@foreach($result->NewsfeedGallaries as $imageValue)
							<img loading="lazy" src="{{ url('public/images/newsfeed/'.$imageValue->image) }}" alt="photo" width="488" height="194" ><br>
						@endforeach
						</div>
						<div class="post-video newsfeed-update-img-show-{{$result->id}}"> 
						</div>
						@endif
					
						<div class="post-additional-info inline-items">
					
							<a href="javascript:void(0);" class="post-add-icon inline-items likePost" newsfeed_id="{{ $result->id }}" route="{{ route('newsfeed-like')}}" user_id="{{ $result->user_id }}" likes_id="{{ Auth::user()->id }}">
								<svg id="" class="olymp-heart-icon like1Color_{{$result->id}}"><use xlink:href="#olymp-heart-icon"></use></svg>
								<strong id="" class="total_count_{{ $result->id }}">{{ $result->NewsfeedLike->count() }} </strong>
							</a>
							<input type="hidden" id="newsfeed_id_{{ $i }}" value="{{ $result->id }}" disabled="">
							<input type="hidden" id="user_id_{{ $i }}" value="{{ $result->user_id }}" disabled="">
							<input type="hidden" id="likes_id_{{ $i }}" value="{{ Auth::user()->id }}" disabled="">
					
							<ul class="friends-harmonic">
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/friend-harmonic9.webp') }}" alt="friend" width="28" height="28">
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
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/friend-harmonic11.webp') }}" alt="friend" width="28" height="28">
									</a>
								</li>
								<li>
									<a href="#">
										<img loading="lazy" src="{{ url('public/assets/dashboard/img/friend-harmonic11.webp') }}" alt="friend" width="28" height="28">
									</a>
								</li>
							</ul>
					
							<div class="names-people-likes">
								<a href="#">Jenny</a>, <a href="#">Robert</a> and
								<br>{{ $result->NewsfeedLike->count() - 1 }} more liked this
							</div>
					
							<div class="comments-shared">
								<a href="javascript:void(0)" class="post-add-icon inline-items comment_btn" id="{{ $result->id}}">
									<svg class="olymp-speech-balloon-icon"><use xlink:href="#olymp-speech-balloon-icon"></use></svg>
					
									<span></span>
								</a>
					
								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-share-icon"><use xlink:href="#olymp-share-icon"></use></svg>
									<span>16</span>
								</a>
							</div>
						</div> 
						<div class="control-block-button post-control-button">
					
							<a href="javascript:void(0);" class="btn btn-control likePost like2Color_{{$result->id}}" id="" newsfeed_id="{{ $result->id }}" route="{{ route('newsfeed-like')}}" user_id="{{ $result->user_id }}" likes_id="{{ Auth::user()->id }}">
								<svg class="olymp-like-post-icon"><use xlink:href="#olymp-like-post-icon"></use></svg>
							</a>
					
							<a href="javascript:void(0)" class="btn btn-control comment_btn" id="{{ $result->id}}">
								<svg class="olymp-comments-post-icon"><use xlink:href="#olymp-comments-post-icon"></use></svg>
							</a>
					
							<a href="#" class="btn btn-control">
								<svg class="olymp-share-icon"><use xlink:href="#olymp-share-icon"></use></svg>
							</a>
					
						</div> 
					</article>
					<div>
						
						<!-- Comment Form  -->  

						<form class="inline-items comment-form comment_add_{{$result->id}}" route="{{ route('comment_add')}}" user_id="{{ Auth::user()->id }}" newsfeed_id="{{ $result->id }}" id="">
							<div class="post__author author vcard inline-items">
								@if(isset($userinfo->profile_image))
								<img loading="lazy" src="{{ url('public/images/profile',$userinfo->profile_image ) }}" width="36" height="36" alt="author" class="rounded-circle">
								@endif

								<div class="form-group with-icon-right ">
									<textarea class="form-control comment-text-{{ $result->id }}" id="" name="comment" placeholder=""></textarea>
									<span class="text-danger comment-error-{{$result->id}}" id=""></span> 
									<div class="add-options-message">
										<a href="#" class="options-message" data-bs-toggle="modal" data-bs-target="#update-header-photo">
											<svg class="olymp-camera-icon">
												<use xlink:href="#olymp-camera-icon"></use>
											</svg>
										</a>
									</div>
								</div>
							</div>

							<button class="btn btn-md-2 btn-primary" id="submit" type="submit">Post Comment</button>

							<button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color comment_btn" id="{{ $result->id}}">Cancel</button>

						</form>

						<!-- ... end Comment Form  -->

					</div>

					<!-- Comments --> 					
					@foreach($result->NewsfeedComment as $key => $comment)  
					@if ($key == 1)
						@break
					@endif
					<ul id="del-comment_{{$comment->id}}" class="comments-list comments_list_{{$result->id}}">
						<li class="comment-item reply_comment_add_{{$comment->id}}">
							<div class="post__author author vcard inline-items">
								@if(isset($comment->profileImage->profile_image))
								<img loading="lazy" src="{{ url('public/images/profile',$comment->profileImage->profile_image) }}" width="40" height="40" alt="author">
								@else
								<img loading="lazy" src="{{ url('public/assets/dashboard/img/noimage.jpg') }}" width="36" height="36" alt="author">
								@endif

								<div class="author-date">
									<a class="h6 post__author-name fn" href="#">{{ ucwords($comment->NewsfeedUser->name) }}</a>
									<div class="post__date">
										<time class="published" datetime="2004-07-24T18:18">
											<?php 
											$created = new Carbon($comment->created_at); 
											$diffInDays = Carbon::parse($comment->created_at)->diffInDays();
											$showDiff = Carbon::parse($comment->created_at)->diffForHumans();

											if($diffInDays > 0){ 
											$showDiff .= ', '. Carbon::parse($comment->created_at)->addDays($diffInDays)->diffInHours().' Hours';
											}
											?> 
											{{$showDiff}}
										</time>
									</div>
								</div> 
								@if($comment->user_id === Auth::user()->id)
								<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
									<ul class="more-dropdown">
										<li>
											<a href="javascript:void(0)" route="{{ route('edit-comment',$comment->id)}}" class="edit-comment" data-toggle="modal" data-target='#commentModal' comment_id="{{ $comment->id }}">Edit Comments</a>
										</li>
										<li>
											<a href="javascript:void(0)" route="{{ route('delete-comment',$comment->id)}}" onclick="return myFunction();" class="delete-comment" comment_id="{{ $comment->id }}">Delete Comment</a>
										</li>
									</ul> 
								</div>
								@endif
							</div> 
							<?php 
								$commentLikeStatus = "";
								foreach($comment->NewsfeedcommentLike as $NewsfeedCommentLike){ 
									if(isset($NewsfeedCommentLike)){
										if($NewsfeedCommentLike['user_id'] === Auth::user()->id){
											$commentLikeStatus = "commentLikeColor";
										}
									} 
								}
							?>
							<p class="comment-txt-{{$comment->id}}">{{ ucwords($comment->comment) }}</p> 
							<a href="javascript:void(0);" class="post-add-icon inline-items likeCommentPost" comment_id="{{ $comment->id }}" newsfeed_id="{{ $result->id }}" route="{{ route('newsfeed-comment-like')}}" users_id="{{ Auth::user()->id }}">
								<svg id="" class="olymp-heart-icon commentlikeColor_{{$comment->id}} {{$commentLikeStatus}}"><use xlink:href="#olymp-heart-icon"></use></svg>
								<span id="" class="total_comment_like_count_{{ $comment->id }}">{{ $comment->NewsfeedcommentLike ? $comment->NewsfeedcommentLike->count() : "0"  }}</span>
							</a>
							<a href="javascript:void(0)" class="reply comment_reply_btn" id="{{ $comment->id}}">Reply</a>
							<div>
							
							<!-- Reply Comment Form  -->  

								<form class="inline-items comment-reply-form comment_reply_add_{{$comment->id}}" route="{{ route('comment_reply_add')}}" user_id="{{ Auth::user()->id }}" newsfeed_id="{{ $result->id }}" comment_id="{{$comment->id}}" id="">
									<div class="post__author author vcard inline-items">
										@if(isset($userinfo->profile_image))
										<img loading="lazy" src="{{ url('public/images/profile',$userinfo->profile_image ) }}" width="36" height="36" alt="author" class="rounded-circle">
										@endif

										<div class="form-group with-icon-right ">
											<textarea class="form-control comment-reply-text-{{ $comment->id }}" id="" name="comment" placeholder=""></textarea>
											<span class="text-danger comment-reply-error-{{$comment->id}}" id=""></span> 
											<div class="add-options-message">
												<a href="#" class="options-message" data-bs-toggle="modal" data-bs-target="#update-header-photo">
													<svg class="olymp-camera-icon">
														<use xlink:href="#olymp-camera-icon"></use>
													</svg>
												</a>
											</div>
										</div>
									</div>

									<button class="btn btn-md-2 btn-primary" id="submit" type="submit">Post Comment</button>

									<button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color comment_reply_btn" id="{{ $comment->id}}">Cancel</button>

								</form> 
							<!-- ... end Reply Comment Form  --> 
							</div>
							@foreach($replyComments as $replyComment)
							@if($replyComment->comment_id == $comment->id)
							<ul id="del-reply-comment_{{$replyComment->id}}" class="comments-list"> 
							<li class="comment-item ">
								<div class="post__author author vcard inline-items">
									@if(isset($replyComment->profileImage->profile_image))
									<img loading="lazy" src="{{ url('public/images/profile',$replyComment->profileImage->profile_image) }}" width="40" height="40" alt="author">
									@else
									<img loading="lazy" src="{{ url('public/assets/dashboard/img/noimage.jpg') }}" width="36" height="36" alt="author">
									@endif

									<div class="author-date">
										<a class="h6 post__author-name fn" href="#">{{ ucwords($replyComment->NewsfeedUser->name) }}</a>
										<div class="post__date">
											<time class="published" datetime="2004-07-24T18:18">
												<?php 
												$created = new Carbon($replyComment->created_at); 
												$diffInDays = Carbon::parse($replyComment->created_at)->diffInDays();
												$showDiff = Carbon::parse($replyComment->created_at)->diffForHumans();

												if($diffInDays > 0){ 
												$showDiff .= ', '. Carbon::parse($replyComment->created_at)->addDays($diffInDays)->diffInHours().' Hours';
												}
												?> 
												{{$showDiff}}
											</time>
										</div>
									</div> 
									@if($replyComment->user_id === Auth::user()->id)
									<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
										<ul class="more-dropdown">
											<li>
												<a href="javascript:void(0)" route="{{ route('edit-reply-comment',$replyComment->id)}}" class="edit-reply-comment" data-toggle="modal" data-target='#replyCommentModal' reply_comment_id="{{$replyComment->id}}" comment_id="{{ $replyComment->comment_id }}">Edit Comments</a>
											</li>
											<li>
												<a href="javascript:void(0)" route="{{ route('delete-reply-comment',$replyComment->id)}}" class="delete-reply-comment" reply_comment_id="{{$replyComment->id}}" comment_id="{{ $replyComment->comment_id }}">Delete Comment</a>
											</li>
										</ul> 
									</div>
									@endif
								</div> 
								<?php 
									$replyCommentLikeStatus = "";
									foreach($replyComment->NewsfeedreplycommentLike as $NewsfeedReplyCommentLike){ 
										if(isset($NewsfeedReplyCommentLike)){
											if($NewsfeedReplyCommentLike['user_id'] === Auth::user()->id){
												$replyCommentLikeStatus = "commentLikeColor";
											} 
										} 
									}
								?>
								<p class="comment-reply-txt-{{$replyComment->id}}">{{ ucwords($replyComment->reply_comment) }}</p> 
								<a href="javascript:void(0);" class="post-add-icon inline-items likeReplyCommentPost" comment_id="{{ $replyComment->comment_id }}" reply_comment_id="{{ $replyComment->id }}" newsfeed_id="{{ $result->id }}" route="{{ route('newsfeed-reply-comment-like')}}" users_id="{{ Auth::user()->id }}">
									<svg class="olymp-heart-icon replycommentlikeColor_{{$replyComment->id}} {{$replyCommentLikeStatus}}"><use xlink:href="#olymp-heart-icon"></use></svg>
									<span class="total_reply_comment_like_count_{{ $replyComment->id }}">{{ $replyComment->NewsfeedreplycommentLike ? $replyComment->NewsfeedreplycommentLike->count() : "0"  }}</span>
								</a>
								<a href="javascript:void(0)" class="reply comment_reply_child_btn" id="{{ $replyComment->id}}">Reply</a>
								
								<div>
							
							<!-- Reply Comment Child Form  -->  

								<form class="inline-items comment-reply-child-form comment_reply_child_add_{{$replyComment->id}}" route="{{ route('comment_reply_add')}}" reply_comment_id="{{ $replyComment->id}}" user_id="{{ Auth::user()->id }}" newsfeed_id="{{ $result->id }}" comment_id="{{$comment->id}}" id="">
									<div class="post__author author vcard inline-items">
										@if(isset($userinfo->profile_image))
										<img loading="lazy" src="{{ url('public/images/profile',$userinfo->profile_image ) }}" width="36" height="36" alt="author" class="rounded-circle">
										@endif

										<div class="form-group with-icon-right ">
											<textarea class="form-control comment-reply-child-text-{{ $replyComment->id }}" id="" name="comment" placeholder=""></textarea>
											<span class="text-danger comment-reply-child-error-{{$replyComment->id}}" id=""></span> 
											<div class="add-options-message">
												<a href="#" class="options-message" data-bs-toggle="modal" data-bs-target="#update-header-photo">
													<svg class="olymp-camera-icon">
														<use xlink:href="#olymp-camera-icon"></use>
													</svg>
												</a>
											</div>
										</div>
									</div>

									<button class="btn btn-md-2 btn-primary" id="submit" type="submit">Post Comment</button>

									<button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color comment_reply_child_btn" id="{{ $replyComment->id}}">Cancel</button>

								</form> 
							<!-- ... end Reply Comment Child Form  --> 
							</div>
							</li>
							<div>
							</ul>
							@endif
							@endforeach
						</li> 
					</ul> 
					@endforeach
					
					<!-- ... end Comments -->
					<?php 
					if($result->NewsfeedComment->count() >= 2 ){ 
						$view_more = 'View '. $result->NewsfeedComment->count() - 1 . ' more comments +' ;
					}else{ 
						$view_more = 'No comment found.'; 
					} ?>
					<a href="javascript:void(0)" newsfeed_id = "{{$result->id}}" route="{{ route('view-more-comments') }}" class="more-comments view-more-comment-btn-{{$result->id}}">{{$view_more}}</a>
				</div>
				@php 
				$i++;
				$j++;
				@endphp
				@endforeach

			</div>

			<!-- <a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a> -->
			<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 align-center pb60 pt60">

				<!-- Pagination -->
				
				<nav aria-label="Page navigation">
					<p class="text-center mt-4 mb-5"><button class="load-more btn btn-dark" route="{{ route('load-more-newsfeed')}}" style="border-color:#343a40; background:#343a40">See More</button></p>
					<p class="text-center mt-4 mb-5 no-result-found" style="font-weight: 800;"></p>
				</nav>
				
				<!-- ... end Pagination -->

			</div>

		</main>

		<!-- ... end Main Content -->


		<!-- Left Sidebar -->

		<aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
			<div class="ui-block">
				
				<!-- W-Weather -->
				
				<div class="widget w-weather">
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
				
					<div class="wethear-now inline-items">
						<div class="temperature-sensor">64°</div>
						<div class="max-min-temperature">
							<span>58°</span>
							<span>76°</span>
						</div>
				
						<svg class="olymp-weather-partly-sunny-icon"><use xlink:href="#olymp-weather-partly-sunny-icon"></use></svg>
					</div>
				
					<div class="wethear-now-description">
						<div class="climate">Partly Sunny</div>
						<span>Real Feel: <span>67°</span></span>
						<span>Chance of Rain: <span>49%</span></span>
					</div>
				
					<ul class="weekly-forecast">
				
						<li>
							<div class="day">sun</div>
							<svg class="olymp-weather-sunny-icon"><use xlink:href="#olymp-weather-sunny-icon"></use></svg>
				
							<div class="temperature-sensor-day">60°</div>
						</li>
				
						<li>
							<div class="day">mon</div>
							<svg class="olymp-weather-partly-sunny-icon"><use xlink:href="#olymp-weather-partly-sunny-icon"></use></svg>
							<div class="temperature-sensor-day">58°</div>
						</li>
				
						<li>
							<div class="day">tue</div>
							<svg class="olymp-weather-cloudy-icon"><use xlink:href="#olymp-weather-cloudy-icon"></use></svg>
				
							<div class="temperature-sensor-day">67°</div>
						</li>
				
						<li>
							<div class="day">wed</div>
							<svg class="olymp-weather-rain-icon"><use xlink:href="#olymp-weather-rain-icon"></use></svg>
				
							<div class="temperature-sensor-day">70°</div>
						</li>
				
						<li>
							<div class="day">thu</div>
							<svg class="olymp-weather-storm-icon"><use xlink:href="#olymp-weather-storm-icon"></use></svg>
				
							<div class="temperature-sensor-day">58°</div>
						</li>
				
						<li>
							<div class="day">fri</div>
							<svg class="olymp-weather-snow-icon"><use xlink:href="#olymp-weather-snow-icon"></use></svg>
				
							<div class="temperature-sensor-day">68°</div>
						</li>
				
						<li>
							<div class="day">sat</div>
				
							<svg class="olymp-weather-wind-icon-header"><use xlink:href="#olymp-weather-wind-icon-header"></use></svg>
				
							<div class="temperature-sensor-day">65°</div>
						</li>
				
					</ul>
				
					<div class="date-and-place">
						<h5 class="date">{{ date('l') }}, {{ date('F') }} {{ date('d') }}th</h5>
						<!-- <div class="place">San Francisco, CA</div> -->
					</div>
				
				</div>
				
				<!-- W-Weather -->			
			</div>
			
		</aside>

		<!-- ... end Left Sidebar -->


		<!-- Right Sidebar -->

		<aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
			@if(!empty($userinfo->dob))
			@if(date('d/m/Y') == $userinfo->dob)

			<div class="ui-block">
				
				<!-- W-Birthsday-Alert -->
				
				<div class="widget w-birthday-alert">
					<div class="icons-block">
						<svg class="olymp-cupcake-icon"><use xlink:href="#olymp-cupcake-icon"></use></svg>
						<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
					</div>
				
					<div class="content">
						<div class="author-thumb">
							<img loading="lazy" src="img/avatar48-sm.webp" alt="author" width="28" height="28">
						</div>
						<span>Today is</span>
						<a href="#" class="h4 title">{{ Auth::user()->name }} Birthday!</a>
						<p>Leave her a message with your best wishes on her profile page!</p>
					</div>
				</div>
				
				<!-- ... end W-Birthsday-Alert -->			
			</div>

			@endif
			@endif

			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Friend Suggestions</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
				</div>
				
				<!-- W-Action -->
				
				<ul class="widget w-friend-pages-added notification-list friend-requests">
					@foreach($friends as $value) 
					<li class="inline-items" id="suggest-friend_{{$value->id}}">
						<div class="author-thumb">
							<img loading="lazy" src="{{ url('public/assets/dashboard/img/avatar38-sm.webp') }}" alt="author" width="36" height="36">
						</div>
						<div class="notification-event">
							<a href="{{ route('user-profile',$value->id) }}" class="h6 notification-friend">{{ $value->name }}</a>
							<!-- <span class="chat-message-item">8 Friends in Common</span> -->
						</div> 
						<span class="notification-icon" id="add_to_me_{{$value->id}}">
							<a href="javascript:void(0)" route="{{ route('add-friend',$value->id)}}" user_id="{{$value->id}}" class="add-friend" id="liveToastBtn">
								<span class="icon-add without-text">
									<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
								</span>
							</a>
						</span>
					</li>
					
					@endforeach
				
				</ul>
				
				<!-- ... end W-Action -->
			</div>

		</aside>

		<!-- ... end Right Sidebar -->
		<!-- Newsfeed Modal -->
		<div class="modal fade" id="newsfeedModal" tabindex="-1" role="dialog" aria-labelledby="newsfeedModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="newsfeedModalLabel">Edit Newsfeed Post</h5>
					<button type="button" class="close close-newsfeed-model">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="newsfeed_form" >
					<div class="author-thumb">
						@if(isset($userinfo->profile_image))
						<img loading="lazy" src="{{ url('public/images/profile',$userinfo->profile_image ) }}" class="post__author_image" alt="author">
						@endif
					</div>
					<label class="control-label">Share what you are thinking here...</label>
					<div class="form-group with-icon label-floating is-empty"> 
						<textarea id="newsfeed_description"  class="form-control" placeholder="" name="textpost"></textarea>
						<input type="hidden" name="newsfeed_id" id="newsfeed-id">
					</div>
					<div class="post-video edit-img-hide" id="edit-img-show"> 
					</div>
					 
					<div class="add-options-message">
						<a href="#" class="options-message image_upload3">
							<svg class="olymp-camera-icon" data-bs-toggle="modal" data-bs-target="#update-header-photo"><use xlink:href="#olymp-camera-icon"></use></svg>
						</a>
						<input class="d-none" id="my_file2" type="file" name="image[]" multiple><use xlink:href="#olymp-camera-icon"></use>
						<a href="#" class="options-message" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="ADD PHOTOS">
						</a>
						<a href="#" class="options-message" data-bs-toggle="tooltip" data-bs-placement="top"   data-bs-original-title="TAG YOUR FRIENDS">
							<svg class="olymp-computer-icon"><use xlink:href="#olymp-computer-icon"></use></svg>
						</a>
	
						<a href="#" class="options-message" data-bs-toggle="tooltip" data-bs-placement="top"   data-bs-original-title="ADD LOCATION">
							<svg class="olymp-small-pin-icon"><use xlink:href="#olymp-small-pin-icon"></use></svg>
						</a> 
	
					</div> 
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-md-2">Post</button>
					<button type="button" class="btn btn-danger btn-md-2 close-newsfeed-model">
						<span aria-hidden="true">Cancel</span>
					</button>
				</div>
				</div>
				</form>
			</div>
		</div>

		<!-- Comment Modal -->
		<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="commentModalLabel">Edit Comment</h5>
					<button type="button" class="close close-comment-model">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="comment_form">
					<div class="author-thumb">
						@if(isset($userinfo->profile_image))
						<img loading="lazy" src="{{ url('public/images/profile',$userinfo->profile_image ) }}" class="post__author_image" alt="author">
						@endif
					</div> 
					<div class="form-group with-icon label-floating is-empty"> 
						<textarea id="comment_description" required="required" class="form-control" placeholder="" name="textpost"></textarea>
						<input type="hidden" name="comment_id" id="edit-comment-id">
					</div> 
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-md-2">Post</button>
					<button type="button" class="btn btn-danger btn-md-2 close-comment-model">
						<span aria-hidden="true">Cancel</span>
					</button>
				</div>
				</div>
				</form>
			</div>
		</div>

		<!-- Reply Comment Modal -->
		<div class="modal fade" id="replyCommentModal" tabindex="-1" role="dialog" aria-labelledby="replyCommentModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="replyCommentModalLabel">Edit Reply Comment</h5>
					<button type="button" class="close close-model close-reply-comment-model">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="comment_reply_form">
					@csrf
					<div class="author-thumb">
						@if(isset($userinfo->profile_image))
						<img loading="lazy" src="{{ url('public/images/profile',$userinfo->profile_image ) }}" class="post__author_image" alt="author">
						@endif
					</div> 
					<div class="form-group with-icon label-floating is-empty"> 
						<textarea id="reply_comment_description" required="required" class="form-control" placeholder="" name="textpost"></textarea>
						<input type="hidden" name="comment_id" id="edit-comments-id">
						<input type="hidden" name="reply_comment_id" id="edit-reply-comment-id">
					</div> 
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-md-2">Post</button>
					<button type="button" class="btn btn-danger btn-md-2 close-reply-comment-model">
						<span aria-hidden="true">Cancel</span>
					</button>
				</div>
				</div>
				</form>
			</div>
		</div>

	</div>
</div>

@endsection
@section('page-js-link') @endsection
@section('page-js')

<script type="text/javascript">
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
		$(".comment_btn").click(function(){ 
			var id =  $(this).attr('id');
			$(".comment_add_"+id).toggle();
		});

		$('.comment-reply-form').hide();
		$(".comment_reply_btn").click(function(){
			var id =  $(this).attr('id');
			$(".comment_reply_add_"+id).toggle();
		});

		$('.comment-reply-child-form').hide();
		$(".comment_reply_child_btn").click(function(){
			var id =  $(this).attr('id'); 
			$(".comment_reply_child_add_"+id).toggle();
		});

		$(document).on('click', '.likePost', function() {  
			newsfeed_id =  $(this).attr('newsfeed_id');
			user_id =  $(this).attr('user_id');
			likes_id =  $(this).attr('likes_id');
			route = $(this).attr('route'); 
			$.ajax({
				url: route,
				method: "GET",
				data: {
					"_token": "{{ csrf_token() }}", "newsfeed_id" : newsfeed_id, "user_id" : user_id, "likes_id" : likes_id,
				},
				beforeSend: function() {
				},
				success: function(data) { 
					if(data['is_like'] === true){
						$('.like1Color_'+newsfeed_id).css("background-color", "#ff5e3a");
						$('.like2Color_'+newsfeed_id).css("background-color", "#ff5e3a");
					}else{
						$('.like1Color_'+newsfeed_id).css("background-color", "#fafbfd"); 
						$('.like2Color_'+newsfeed_id).css("background-color", "#9a9fbf");
					}
					$('.total_count_'+ newsfeed_id).html(data['count']);
				}
			})
		});

		$(document).on('click', '.likeCommentPost', function() {  
			newsfeed_id =  $(this).attr('newsfeed_id');
			users_id =  $(this).attr('users_id');
			comment_id = $(this).attr('comment_id');
			route = $(this).attr('route');
			$.ajax({
				url: route,
				method: "GET",
				data: {
					"_token": "{{ csrf_token() }}", "newsfeed_id" : newsfeed_id, "comment_id" : comment_id, "users_id" : users_id,
				},
				beforeSend: function() {
				},
				success: function(data) {
					if(data['is_like'] === true){
						$('.commentlikeColor_'+comment_id).css("background-color", "#ff5e3a");
					}else{
						$('.commentlikeColor_'+comment_id).css("background-color", "#fafbfd"); 
					}
					$('.total_comment_like_count_'+ comment_id).html(data['count']);
				}
			})
		});
		$(document).on('click', '.likeReplyCommentPost', function() { 
			newsfeed_id =  $(this).attr('newsfeed_id');
			users_id =  $(this).attr('users_id');
			comment_id = $(this).attr('comment_id');
			reply_comment_id = $(this).attr('reply_comment_id');
			route = $(this).attr('route'); 
			$.ajax({
				url: route,
				method: "GET",
				data: {
					"_token": "{{ csrf_token() }}", "newsfeed_id" : newsfeed_id, "comment_id" : comment_id, "users_id" : users_id, "reply_comment_id" : reply_comment_id
				},
				beforeSend: function() {
				},
				success: function(data) {
					if(data['is_like'] === true){
						$('.replycommentlikeColor_'+reply_comment_id).css("background-color", "#ff5e3a");
					}else{
						$('.replycommentlikeColor_'+reply_comment_id).css("background-color", "#fafbfd"); 
					}
					$('.total_reply_comment_like_count_'+ reply_comment_id).html(data['count']);
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
		var route = "{{url('/block-newsfeed/')}}"+'/'+newsfeed_id;
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
				   $('.block-hide-show-'+newsfeed_id).hide();
				   var _html = '<a href="javascript:void(0)" class="unblock-newsfeed unblock-hide-show-'+newsfeed_id+'" newsfeed_id="'+newsfeed_id+'" id="liveToastBtn">Unblock Post</a>'
				   $(".block-unbolock-"+newsfeed_id).append(_html); 
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
		var route = "{{url('/unblock-newsfeed/')}}"+'/'+newsfeed_id;

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
					$('.unblock-hide-show-'+newsfeed_id).hide();
					var _html = '<a href="javascript:void(0)" class="block-newsfeed block-hide-show-'+newsfeed_id+'" newsfeed_id="'+newsfeed_id+'" id="liveToastBtn">Block Post</a>'
					$(".block-unbolock-"+newsfeed_id).append(_html); 
	            }
	        }
	    })
	});
// Delete Newsfeed Post
	$(document).on('click', '.delete-newsfeed', function() {
		newsfeed_id =  $(this).attr('newsfeed_id');
	    toastr.options = {
          "closeButton": true,
          "newestOnTop": true,
          "positionClass": "toast-top-right"
        };
	    route = $(this).attr('route');
		if(confirm("Are You Sure to delete this newsfeed post ?") == true){
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
						document.getElementById("del-newsfeed_"+newsfeed_id).remove();
					}
				}
			})
		}
      	
	});

// Newsfeed Model-popup 
	$(document).on('click', '.edit-newsfeed', function() {
		newsfeed_id =  $(this).attr('newsfeed_id');
		route = $(this).attr('route');

		$.ajax({
		url: route,
		method: "GET",
		data: {
			"_token": "{{ csrf_token() }}", "newsfeed_id" : newsfeed_id,
		},
		beforeSend: function() {
		},
		success: function(data) {
			$('#newsfeedModal').modal('show');
			$('#newsfeed_description').val('');
			$('#newsfeed_description').val(data.data.newfeed.text); 
			document.getElementById("newsfeed-id").value = data.data.newfeed.id;
			var images = data.data.newfeed_galary; 
			var arrayImagesElement = document.getElementById("edit-img-show");

			function createImageNode(images) {
				var img = document.createElement('img');
				img.src = "public/images/newsfeed/"+images.image;
				img.id = "edit-image-show";
				img.class = "edit-image-show";
				img.width = "435";
				img.height = "194"
				img.style.margin = "15px";
				return img;
			} 
			$('div#edit-img-show > img').remove();
			images.forEach(img => {  
				arrayImagesElement.appendChild(createImageNode(img));
			}); 
			
		}
		})
	})

	@if(Session::has('message'))
		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true
		}
		toastr.success("{{ session('message') }}");
	@endif

// Load More Functionality...
	// $(document).ready(function(){
        $(".load-more").on('click',function(){ 
            var _totalCurrentResult=$(".main-div").length;
			route = $(this).attr('route'); 
            // Ajax Reuqest
            $.ajax({
                url: route,
                type:'get',
                dataType:'json',
                data:{
                    skip:_totalCurrentResult
                },
                beforeSend:function(){
                    $(".load-more").html('Loading...');
                },
                success:function(response){ 
					if(response.length != 0){
						$(".load-more").html('See More'); 
						var _html=response; 
						$(".newsfeedItem").append(_html);
						$('.comment-reply-form').hide();
						$(".comment_btn").click(function(){
							var id =  $(this).attr('id');
							$(".comment_add_"+id).toggle();
						}); 

						$('.comment-form').hide();
						$('.comment-reply-form').hide();
						$(".comment_reply_btn").click(function(){
							var id =  $(this).attr('id');
							$(".comment_reply_add_"+id).toggle();
						});

						$('.comment-reply-child-form').hide();
						$(".comment_reply_child_btn").click(function(){
							var id =  $(this).attr('id');
							$(".comment_reply_child_add_"+id).toggle();
						});
						$('.comment-form').on('submit',function(e){
							e.preventDefault(); 
							let user_id = $(this).attr('user_id')
							let newsfeed_id = $(this).attr('newsfeed_id')
							let comment = $(".comment-text-"+newsfeed_id).val();
							route = $(this).attr('route');  
							
							$.ajax({
								url: route,
								method:"POST",
								data:{
									"_token": "{{ csrf_token() }}",
									comment:comment,
									user_id:user_id,
									newsfeed_id:newsfeed_id,
								},
								success:function(response){
									_html = response.data;
									$('.comment_add_'+newsfeed_id).hide();
									$(".comments_list_"+newsfeed_id).hide();
									$(".hide-newsfeed_"+newsfeed_id).append(_html); 
									$('.comment-reply-form').hide();
									console.log(response);
									$('.comment-text-'+newsfeed_id).val('');
									$(".comment_reply_btn").click(function(){
										var id =  $(this).attr('id');
										$(".cr_"+response.insertData.id).toggle();
									}); 
								},
								error: function(response) {
									$('.comment-error-'+newsfeed_id).text(response.responseJSON.errors.comment); 
								}
							});
						});
						$('.comment-reply-form').on('submit',function(e){
							e.preventDefault(); 
							let user_id = $(this).attr('user_id')
							let newsfeed_id = $(this).attr('newsfeed_id')
							let comment_id = $(this).attr('comment_id')
							
							let comment = $(".comment-reply-text-"+comment_id).val();
							route = $(this).attr('route'); 
							if(comment === ""){
								$('.comment-reply-error-'+comment_id).text("This field is required."); 
							}else{
								$.ajax({
									url: route,
									method:"POST",
									data:{
										"_token": "{{ csrf_token() }}",
										comment:comment,
										user_id:user_id,
										newsfeed_id:newsfeed_id,
										comment_id:comment_id
									},
									success:function(response){ 
										$('.comment_reply_add_'+comment_id).hide();
										$(".reply_comment_add_"+comment_id).append(response.data);
										$('.comment-reply-child-form').hide();
										$('.comment-reply-text-'+comment_id).val('');
										$(".comment_reply_child_btn").click(function(){
											var id =  $(this).attr('id');
											$(".crc_"+response.insertData.id).toggle();
										}); 
									},
									error: function(response) {
										$('.comment-reply-error-'+comment_id).text(response.responseJSON.errors.comment); 
									}
								});
							} 
						});
						$('.comment-reply-child-form').on('submit',function(e){
							e.preventDefault(); 
							let user_id = $(this).attr('user_id')
							let newsfeed_id = $(this).attr('newsfeed_id')
							let comment_id = $(this).attr('comment_id')
							let reply_comment_id = $(this).attr('reply_comment_id')
							let comment = $(".comment-reply-child-text-"+reply_comment_id).val();
							route = $(this).attr('route');
							if(comment === ""){
								$('.comment-reply-child-error-'+reply_comment_id).text("This field is required."); 
							}else{
								$.ajax({
									url: route,
									method:"POST",
									data:{
										"_token": "{{ csrf_token() }}",
										comment:comment,
										user_id:user_id,
										newsfeed_id:newsfeed_id,
										comment_id:comment_id
									},
									success:function(response){
										$('.comment_reply_child_add_'+ reply_comment_id).hide();
										$(".reply_comment_add_"+comment_id).append(response.data);
										$('.comment-reply-child-form').hide();
										$('.comment-reply-child-text-'+reply_comment_id).val('');
										$(".comment_reply_child_btn").click(function(){
											var id =  $(this).attr('id');
											$(".crc_"+response.insertData.id).toggle();
										}); 
									},
									error: function(response) {
										$('.comment-reply-child-error-'+comment_id).text(response.responseJSON.errors.comment); 
									}
								});
							} 
						});

					}else{
						$(".load-more").hide();
						$(".no-result-found").html("No Result Found");
					}
                }
            });
        });
    // });
// Show Like Status 
	$(document).ready( function () { 
		route = "get-like-status";
	    $.ajax({
	        url: route,
	        method: "GET",
	        data: {
	            "_token": "{{ csrf_token() }}",
	        },
	        beforeSend: function() {
	        },
	        success: function(data) {
				data.forEach(element => { 
					if(element.newsfeed_id){
						$('.like1Color_'+element.newsfeed_id).css("background-color", "#ff5e3a");
						$('.like2Color_'+element.newsfeed_id).css("background-color", "#ff5e3a");
					}
				});
				 
	        }
	    })
	}); 

// Post Comment
	// $(document).ready( function () {
		
		$('.comment-form').on('submit',function(e){
			e.preventDefault();  
			let user_id = $(this).attr('user_id')
			let newsfeed_id = $(this).attr('newsfeed_id')
			let comment = $(".comment-text-"+newsfeed_id).val();
			route = $(this).attr('route');  
			$.ajax({
				url: route,
				method:"POST",
				data:{
					"_token": "{{ csrf_token() }}",
					comment:comment,
					user_id:user_id,
					newsfeed_id:newsfeed_id,
				},
				success:function(response){
					_html = response.data;
					$('.comment_add_'+newsfeed_id).hide();
					$(".comments_list_"+newsfeed_id).hide();
					$(".view-more-comment-btn-"+newsfeed_id).hide();
					$(".hide-newsfeed_"+newsfeed_id).append(_html); 
					$('.comment-reply-form').hide();
					console.log(response);
					$('.comment-text-'+newsfeed_id).val('');
					$(".comment_reply_btn").click(function(){
						var id =  $(this).attr('id');
						$(".cr_"+response.insertData.id).toggle();
					}); 
				},
				error: function(response) {
					$('.comment-error-'+newsfeed_id).text(response.responseJSON.errors.comment); 
				}
			});
		});
	// });

// Add Friend
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
	               location.reload();
	            }
	        }
	    })
	});
// Comment Model-popup 
	$(document).on('click', '.edit-comment', function() { 
		comment_id =  $(this).attr('comment_id');
		route = $(this).attr('route');

		$.ajax({
		url: route,
		method: "GET",
		data: {
			"_token": "{{ csrf_token() }}", "comment_id" : comment_id,
		},
		beforeSend: function() {
		},
		success: function(data) { 
			$('#commentModal').modal('show');
			$('#comment_description').val('');
			$('#comment_description').val(data.comment);
			document.getElementById("edit-comment-id").value = data.id;
		}
		})
	})
// Delete comment Post
	$(document).on('click', '.delete-comment', function() {
		comment_id =  $(this).attr('comment_id'); 
	    toastr.options = {
          "closeButton": true,
          "newestOnTop": true,
          "positionClass": "toast-top-right"
        };
	    route = $(this).attr('route');
		if(confirm("Are You Sure to delete this comment ?") == true){
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
					console.log(data)
					if (data.status) {
						document.getElementById("del-comment_"+comment_id).remove();
					}
				}
			})
		}
	});

// Post Reply Comment 
		
	$('.comment-reply-form').on('submit',function(e){ 
		e.preventDefault(); 
		let user_id = $(this).attr('user_id')
		let newsfeed_id = $(this).attr('newsfeed_id')
		let comment_id = $(this).attr('comment_id') 
		let comment = $(".comment-reply-text-"+comment_id).val();

		route = $(this).attr('route'); 
		if(comment === ""){
			$('.comment-reply-error-'+comment_id).text("This field is required."); 
		}else{
			$.ajax({
				url: route,
				method:"POST",
				data:{
					"_token": "{{ csrf_token() }}",
					comment:comment,
					user_id:user_id,
					newsfeed_id:newsfeed_id,
					comment_id:comment_id
				},
				success:function(response){ 
					$('.comment_reply_add_'+comment_id).hide();
					$(".reply_comment_add_"+comment_id).append(response.data);
					$('.comment-reply-child-form').hide();
					$('.comment-reply-text-'+comment_id).val('');
					$(".comment_reply_child_btn").click(function(){
						var id =  $(this).attr('id');
						$(".crc_"+response.insertData.id).toggle();
					}); 
				},
				error: function(response) {
					$('.comment-reply-error-'+comment_id).text(response.responseJSON.errors.comment); 
				}
			});
		} 
	});

	$('.comment-reply-child-form').on('submit',function(e){
		e.preventDefault(); 
		let user_id = $(this).attr('user_id')
		let newsfeed_id = $(this).attr('newsfeed_id')
		let comment_id = $(this).attr('comment_id')
		let reply_comment_id = $(this).attr('reply_comment_id')
		let comment = $(".comment-reply-child-text-"+reply_comment_id).val();
		route = $(this).attr('route');
		if(comment === ""){
			$('.comment-reply-child-error-'+reply_comment_id).text("This field is required."); 
		}else{
			$.ajax({
				url: route,
				method:"POST",
				data:{
					"_token": "{{ csrf_token() }}",
					comment:comment,
					user_id:user_id,
					newsfeed_id:newsfeed_id,
					comment_id:comment_id
				},
				success:function(response){
					// location.reload();
					$('.comment_reply_child_add_'+ reply_comment_id).hide();
					$(".reply_comment_add_"+comment_id).append(response.data);
					$('.comment-reply-child-form').hide();
					$('.comment-reply-child-text-'+reply_comment_id).val('');
					$(".comment_reply_child_btn").click(function(){
						var id =  $(this).attr('id');
						$(".crc_"+response.insertData.id).toggle();
					}); 


				},
				error: function(response) {
					$('.comment-reply-child-error-'+reply_comment_id).text("This field is required.");  
				}
			});
		} 
	}); 

// Reply Comment Model-popup 
	$(document).on('click', '.edit-reply-comment', function() { 
		comment_id =  $(this).attr('comment_id');
		reply_comment_id =  $(this).attr('reply_comment_id');
		route = $(this).attr('route');

		$.ajax({
			url: route,
			method: "GET",
			data: {
				"_token": "{{ csrf_token() }}", "comment_id" : comment_id, "reply_comment_id": reply_comment_id
			},
			beforeSend: function() {
			},
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
		comment_id =  $(this).attr('comment_id'); 
		reply_comment_id =  $(this).attr('reply_comment_id'); 
	    toastr.options = {
          "closeButton": true,
          "newestOnTop": true,
          "positionClass": "toast-top-right"
        };
	    route = $(this).attr('route');
	    if(confirm("Are You Sure to delete this comment reply ?") == true){
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
						document.getElementById("del-reply-comment_"+reply_comment_id).remove();
					}
				}
			})
		}
	});
// View More Comments+
	$(document).on('click', '.more-comments', function() {
		newsfeed_id =  $(this).attr('newsfeed_id'); 
		route = $(this).attr('route');   
		$.ajax({
			url: route,
			method: "GET",
			data: {
				"_token": "{{ csrf_token() }}",
				"newsfeed_id" : newsfeed_id,
			},
			beforeSend: function() {
				$('.view-more-comment-btn-'+newsfeed_id).html('Loading...');
			},
			success: function(data) { 
				if(data.length > 0){ 
					_html = data;
					$('.view-more-comment-btn-'+newsfeed_id).hide();
					$(".comments_list_"+newsfeed_id).hide(); 
					$(".hide-newsfeed_"+newsfeed_id).append(_html);
					$('.comment-form').hide();
					$('.comment-reply-form').hide();
					$('.comment-reply-child-form').hide();
					$(".comment_reply_btn").click(function(){
						var id =  $(this).attr('id');
						$(".cr_"+id).toggle();
					});
					$(".comment_reply_child_btn").click(function(){
						var id =  $(this).attr('id');
						$(".crc_"+id).toggle();
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
					$('.comment-reply-form').on('submit',function(e){ 
						console.log(4444444444444444444);
						e.preventDefault();
						let user_id = $(this).attr('user_id')
						let newsfeed_id = $(this).attr('newsfeed_id');
						let comment_id = $(this).attr('comment_id');
						let comment = $("#comment-reply-text-"+comment_id).val();
						route = $(this).attr('route'); 
						if(comment === ""){
							$('.comment-reply-error-'+comment_id).text("This field is required."); 
						}else{
							$.ajax({
								url: route,
								method:"POST",
								data:{
									"_token": "{{ csrf_token() }}",
									comment:comment,
									user_id:user_id,
									newsfeed_id:newsfeed_id,
									comment_id:comment_id
								},
								success:function(response){ 
									$('.comment_reply_add_'+comment_id).hide();
									$(".reply_comment_add_"+comment_id).append(response.data);
									$('.comment-reply-child-form').hide();
									$('.comment-reply-text-'+comment_id).val('');
									$(".comment_reply_child_btn").click(function(){
										var id =  $(this).attr('id');
										$(".crc_"+response.insertData.id).toggle();
									}); 
								},
								error: function(response) {
									$('.comment-reply-error-'+comment_id).text(response.responseJSON.errors.comment); 
								}
							});
						} 
					});
					$('.comment-reply-child-form').on('submit',function(e){ 
						e.preventDefault(); 
						let user_id = $(this).attr('user_id')
						let newsfeed_id = $(this).attr('newsfeed_id')
						let comment_id = $(this).attr('comment_id')
						let reply_comment_id = $(this).attr('reply_comment_id')
						let comment = $("#comment-reply-child-text-"+reply_comment_id).val();
						route = $(this).attr('route');
						if(comment === ""){
							$('.comment-reply-child-error-'+reply_comment_id).text("This field is required."); 
						}else{
							$.ajax({
								url: route,
								method:"POST",
								data:{
									"_token": "{{ csrf_token() }}",
									comment:comment,
									user_id:user_id,
									newsfeed_id:newsfeed_id,
									comment_id:comment_id
								},
								success:function(response){
									$('.comment_reply_child_add_'+ reply_comment_id).hide();
									$(".reply_comment_add_"+comment_id).append(response.data);
									$('.comment-reply-child-form').hide();
									$('.comment-reply-child-text-'+reply_comment_id).val('');
									$(".comment_reply_child_btn").click(function(){
										var id =  $(this).attr('id');
										$(".crc_"+response.insertData.id).toggle();
									}); 
								},
								error: function(response) {
									$('.comment-reply-child-error-'+reply_comment_id).text("This field is required.");
								}
							});
						} 
					});
				}else{ 
					$('.view-more-comment-btn-'+newsfeed_id).html('No Comment Found.');
				}   
			}
		}) 
	})

// Model Close
	$(".close-newsfeed-model").click(function(){
		$("#newsfeedModal").modal('hide');
	});
	$(".close-comment-model").click(function(){
		$("#commentModal").modal('hide');
	});
	
	$(".close-reply-comment-model").click(function(){
		$("#replyCommentModal").modal('hide');
	});
// Update Newsfeed
	$('.newsfeed_form').on('submit',function(e){
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
				
				$('.newsfeed-text-'+newsfeed_id).text(newsfeed_description);
				$('.newsfeed-update-img-'+newsfeed_id).hide();
				let _html = ''
				response.data.forEach(function(element) {
					let imagePath = "{{ url('public/images/newsfeed/') }}"; 
					_html += '<img loading="lazy" src="'+ imagePath +'/'+ element.image +'" alt="photo" width="488" height="194" ><br>'
				}); 
				$('div.newsfeed-update-img-show-'+newsfeed_id+' > img, br').remove();
				$(".newsfeed-update-img-show-"+newsfeed_id).append(_html); 
			},
			error: function(data){
				console.log(data);
			}
		});
	}); 

// Update Comment
	$('.comment_form').on('submit',function(e){
		e.preventDefault(); 
		var formData = new FormData();
		let comment_description = $('#comment_description').val();  
		let comment_id = $('#edit-comment-id').val();
		
		let _token = $('meta[name="csrf-token"]').attr('content');
		_token = document.getElementsByName("_token")[0].value
		formData.append('_token', _token);
		formData.append('textpost', comment_description);
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
				if(response.status === "success"){
					$("#commentModal").modal('hide'); 
					$('.comment-txt-'+comment_id).text(comment_description);
				}
			},
			error: function(data){
				console.log(data);
			}
		});
	}); 

// // Update Comment Reply
	$('.comment_reply_form').on('submit',function(e){
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
				if(response.status === "success"){
					$("#replyCommentModal").modal('hide');  
					$('.comment-reply-txt-'+reply_comment_id).text(reply_comment_description);
				}
			},
			error: function(data){
				console.log(data);
			}
		});
	}); 
	 
</script>

@endsection