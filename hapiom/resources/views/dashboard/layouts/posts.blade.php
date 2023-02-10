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
										@if(isset($result->userImageByPost->profile_image) && file_exists('images/profile/'. $result->userImageByPost->profile_image))
										<img class="rounded-circle img-fluid" src="{{ url('images/profile',$result->userImageByPost->profile_image) }}" alt="">
										@else
										<img class="rounded-circle img-fluid" src="{{url('assets/dashboard/img/default-avatar.png')}}" alt="">
										@endif
									</div>
									<div class="media-support-info mt-2">
										<h5 class="mb-0 d-inline-block"><a href="{{ route('user-profile',encrypt($result->user_id)) }}" class="">{{ ucwords($result->NewsfeedUser->name) }}</a></h5>
										@if ($result->user_id != $my_user_id)
										<p class="mb-0 d-inline-block pl-3"><a href="javascript:void(0)" route="{{ route('newsfeed-follow')}}" newsfeed_id="{{ $result->id }}" user_id="{{ $result->user_id }}" following_id="{{ Auth::user()->id }}" class="postFollow" id="post-follow-{{ $result->id }}"><i class="ri-user-follow-line line-height-17"></i>Follow</a></p>
										@endif
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
													<div class="dropdown-menu" @if($result->NewsfeedLike->count() == 0) style="background: #fff; border: 0 none;" @endif>
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
<!------------------------------------------------->
												<div class="dropdown">
													<span>&nbsp;
														<a href="javascript:void();" class="likeCommentPost" comment_id="{{ $comment->id }}" newsfeed_id="{{ $result->id }}" route="{{ route('newsfeed-comment-like')}}" users_id="{{ Auth::user()->id }}">
															@if($comment->NewsfeedcommentLike->count() > 0)
															@php $hasMe = null; @endphp
															@foreach($comment->NewsfeedcommentLike as $newlike)
															@if($newlike->user_id !== Auth::user()->id)
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
		<!------------------------------------------------->										

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
								$view_more = '';
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