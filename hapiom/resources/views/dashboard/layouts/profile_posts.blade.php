  @if($profilePosts->count() > 0)

                                            @php
                                            				$i = 1;
                                            				$j = 1;
                                            @endphp

                                            @foreach($profilePosts as $profilePost)
                                            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                                            <div class="user-post-data  iq-card-body">
                                                    <div class="d-flex flex-wrap">
                                                        <div class="media-support-user-img mr-3">
                                                            @if(isset($user->userInfo->profile_image) && file_exists('images/profile/' . $user->userInfo->profile_image))
                                                            <img class="rounded-circle img-fluid" src="{{ url('images/profile/' . $user->userInfo->profile_image) }}" alt="profile-img">
                                                            @else
                                                            <img class="rounded-circle img-fluid" src="{{ url('assets/dashboard/img/default-avatar.png') }}" alt="profile-img">
                                                            @endif
                                                        </div>
                                                        <div class="media-support-info mt-2">
                                                            <h5 class="mb-0 d-inline-block"><a href="#" class="">{{ ucwords($user->name) }}</a></h5>
                                                            <p class="ml-1 mb-0 d-inline-block">Add New Post</p>
                                                            <p class="mb-0">{{ newsfeeddateformate($profilePost->created_at) }} </p>
                                                        </div>
                                                        <div class="iq-card-post-toolbar">
                                                            <div class="dropdown">
                                                                <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                                    <i class="ri-more-fill"></i>
                                                                </span>
                                                                <div class="dropdown-menu m-0 p-0">
                                                                    <a class="dropdown-item p-3" href="#">
                                                                        <div class="d-flex align-items-top">
                                                                            <div class="icon font-size-20"><i class="ri-save-line"></i></div>
                                                                            <div class="data ml-2">
                                                                                <h6>Save Post</h6>
                                                                                <p class="mb-0">Add this to your saved items</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <a class="dropdown-item p-3" href="#">
                                                                        <div class="d-flex align-items-top">
                                                                            <div class="icon font-size-20"><i class="ri-pencil-line"></i></div>
                                                                            <div class="data ml-2">
                                                                                <h6>Edit Post</h6>
                                                                                <p class="mb-0">Update your post and saved items</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <a class="dropdown-item p-3" href="#">
                                                                        <div class="d-flex align-items-top">
                                                                            <div class="icon font-size-20"><i class="ri-close-circle-line"></i></div>
                                                                            <div class="data ml-2">
                                                                                <h6>Hide From Timeline</h6>
                                                                                <p class="mb-0">See fewer posts like this.</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <a class="dropdown-item p-3" href="#">
                                                                        <div class="d-flex align-items-top">
                                                                            <div class="icon font-size-20"><i class="ri-delete-bin-7-line"></i></div>
                                                                            <div class="data ml-2">
                                                                                <h6>Delete</h6>
                                                                                <p class="mb-0">Remove thids Post on Timeline</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <a class="dropdown-item p-3" href="#">
                                                                        <div class="d-flex align-items-top">
                                                                            <div class="icon font-size-20"><i class="ri-notification-line"></i></div>
                                                                            <div class="data ml-2">
                                                                                <h6>Notifications</h6>
                                                                                <p class="mb-0">Turn on notifications for this post</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(isset($profilePost->text) && !empty($profilePost->text))
                                                <div class="user-post  iq-card-body">
                                                    <p>{{ $profilePost->text }}</p>
                                                </div>
                                                @endif
                                                @if(isset($profilePost->NewsfeedGallaries))
                                                <div class="user-post">
                                                    @foreach($profilePost->NewsfeedGallaries as $imageValue)
                                                    <a href="javascript:void();"><img src="{{ url('images/newsfeed/'.$imageValue->image) }}" alt="post-image" class="img-fluid w-100" style="height: 360px;" /></a>
                                                    @endforeach
                                                </div>
                                                @endif

                                                <div class="comment-area iq-card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="like-block position-relative d-flex align-items-center">
                                                            <div class="d-flex align-items-center">

<!--************ -->

<div class="like-data">
												<div class="dropdown">
													<span class="dropdown-toggle">
														<a href="javascript:void(0);" class="likePost" newsfeed_id="{{ $profilePost->id }}" route="{{ route('newsfeed-like')}}" user_id="{{ $profilePost->user_id }}" likes_id="{{ Auth::user()->id }}">
															@if($profilePost->NewsfeedLike->count() > 0)
															@php $hasMe = null; @endphp
															@foreach($profilePost->NewsfeedLike as $newlike)
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
                            <span class="total_count_{{ $profilePost->id }}">{{ $profilePost->NewsfeedLike->count() }}</span> Likes
                          </span>
                          <input type="hidden" id="newsfeed_id_{{ $i }}" value="{{ $profilePost->id }}" disabled="">
                          <input type="hidden" id="user_id_{{ $i }}" value="{{ $profilePost->user_id }}" disabled="">
                          <input type="hidden" id="likes_id_{{ $i }}" value="{{ Auth::user()->id }}" disabled="">
                          <div class="dropdown-menu" @if($profilePost->NewsfeedLike->count() == 0) style="background: #fff; border: 0 none;" @endif>
                            @if($profilePost->NewsfeedLike->count() > 0)
                            @php $like = 0; @endphp
                            @foreach($profilePost->NewsfeedLike as $newlike)
                            @if($like < 7) <a class="dropdown-item" href="#">{{ $newlike->NewsfeedUser->name }}</a>
                              @endif
                              @php $like = $like + 1; @endphp
                              @endforeach
                              @endif
                          </div>
                        </div>
                      </div>
<!--******************* -->





                                                            </div>
                                                            <div class="total-comment-block">
                                                                <div class="dropdown">
                                                                    <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                                        {{ $profilePost->NewsfeedComment->count() }} Comment
                                                                    </span>
                                                                    <div class="dropdown-menu" @if($profilePost->NewsfeedComment->count() == 0) style="background: #fff; border: 0 none;" @endif>
                                                                        @foreach($profilePost->NewsfeedComment as $key => $comment)
                                                                        <a class="dropdown-item" href="#">{{ ucwords($comment->NewsfeedUser->name) }}</a>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--
                                                        <div class="share-block d-flex align-items-center feather-icon mr-3">
                                                            <a href="javascript:void();"><i class="ri-share-line"></i>
                                                                <span class="ml-1">99 Share</span></a>
                                                        </div>-->

                                                        <div class="share-block d-flex align-items-center feather-icon mr-3 comment_btn" id="{{ $profilePost->id}}">
                                                          <a href="javascript:void();" style="font-size: 18px;"><i class="ri-chat-2-line"></i>
                                                            <span class="ml-1">Comment</span></a>
                                                        </div>

                                                    </div>
                                                    <hr>

<!------------------------------------------------------------------------------------------->
<ul class="post-comments p-0 m-0 hide-newsfeed_{{ $profilePost->id }}">
  @foreach($profilePost->NewsfeedComment as $key => $comment)
  @if ($key == 1)
  @break
  @endif
  <li class="mb-2 reply_comment_add_{{ $comment->id }}" id="comment-el-{{ $comment->id }}">
    <div class="d-flex flex-wrap justify-content-start">
      <div class="user-img">
        @if(isset($comment->profileImage->profile_image))
        <img src="{{ url('images/profile',$comment->profileImage->profile_image) }}" alt="userimg" class="avatar-35 rounded-circle img-fluid">
        @else
        <img src="{{url('assets/dashboard/img/default-avatar.png')}}" alt="userimg" class="avatar-35 rounded-circle img-fluid">
        @endif
      </div>
      <div class="comment-data-block ml-3">
        <h6>{{ ucwords($comment->NewsfeedUser->name) }}</h6>
        @if (isset($comment->CommentImage->image))
	      <img src="{{ url('images/comments', $comment->CommentImage->image) }}" alt="image Comment" style="max-width: 300px; max-height: 300px;">
		   @endif
        <p class="mb-0 comment-text-{{ $comment->id }}">{{ ucwords($comment->comment) }}</p>
        <div class="d-flex flex-wrap align-items-center comment-activity">
            <!------------------------------------------------->
            <div class="dropdown">
													<span>&nbsp;
														<a href="javascript:void();" class="likeCommentPost" comment_id="{{ $comment->id }}" newsfeed_id="{{ $profilePost->id }}" route="{{ route('newsfeed-comment-like')}}" users_id="{{ Auth::user()->id }}">
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
          <a href="javascript:void();" class="likeCommentPost" comment_id="{{ $comment->id }}" newsfeed_id="{{ $profilePost->id }}" route="{{ route('newsfeed-comment-like')}}" users_id="{{ Auth::user()->id }}"><span id="" class="total_comment_like_count_{{ $comment->id }}">{{ $comment->NewsfeedcommentLike ? $comment->NewsfeedcommentLike->count() : "0"  }}</span> like</a>
          <a href="javascript:void();" class="reply comment_reply_btn" id="{{ $comment->id}}">reply</a>
          <a href="javascript:void();">translate</a>
          <span> {{ newsfeeddateformate($comment->created_at) }}</span>
        </div>
        <!-- Reply Comment Form  -->

        <form class="comment-text align-items-center mt-3 comment-reply-form comment_reply_add_{{$comment->id}}" route="{{ route('comment_reply_add')}}" user_id="{{ Auth::user()->id }}" newsfeed_id="{{ $profilePost->id }}" comment_id="{{$comment->id}}" id="">
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
<form class="comment-text align-items-center mt-3 comment-form comment_add_{{$profilePost->id}}" route="{{ route('comment_add')}}" user_id="{{ Auth::user()->id }}" newsfeed_id="{{ $profilePost->id }}" id="">
								 

                 <input type="text" class="form-control rounded comment-text-{{ $profilePost->id }}" onkeydown="doComment(event, {{ $profilePost->id }})" />
                 <input class="d-none" id="comment_file_{{ $profilePost->id }}" type="file" name="image" />
                                                       <div class="comment-attagement d-flex">
                                                           <!-- <a href="javascript:void();"><i class="ri-link mr-3"></i></a>
                                                           <a href="javascript:void();"><i class="ri-user-smile-line mr-3"></i></a> -->
                                                           <a href="javascript:void();" onClick="commentPicture({{ $profilePost->id }})"><i class="ri-camera-line mr-3"></i></a>
                                                       </div>

               </form>

@php
if ($profilePost->NewsfeedComment->count() >= 2) {
  $view_more = 'View ' . $profilePost->NewsfeedComment->count() - 1 . ' more comments +';
} else {
  $view_more = '';
}
@endphp
<a href="javascript:void(0)" newsfeed_id="{{$profilePost->id}}" route="{{ route('view-more-comments') }}" class="more-comments view-more-comment-btn-{{$profilePost->id}}">{{$view_more}}</a>



<!---------------------------------------------------------------------------------------------->

                                                  <!--  <ul class="post-comments p-0 m-0">
                                                        @foreach($profilePost->NewsfeedComment as $key => $comment)
                                                        @if ($key == 1)
                                                        @break
                                                        @endif
                                                        <li class="mb-2">
                                                            <div class="d-flex flex-wrap">
                                                                <div class="user-img">
                                                                    <img src="{{ url('assets/dashboard/images/user/02.jpg') }}" alt="userimg" class="avatar-35 rounded-circle img-fluid">
                                                                </div>
                                                                <div class="comment-data-block ml-3">
                                                                    <h6>{{ ucwords($comment->NewsfeedUser->name) }}</h6>
                                                                    <p class="mb-0">{{ ucwords($comment->comment) }}</p>
                                                                    <div class="d-flex flex-wrap align-items-center comment-activity">
                                                                        <a href="javascript:void();">like</a>
                                                                        <a href="javascript:void();">reply</a>
                                                                        <span>
                                                                            @php
                                                                            $created = new Carbon($comment->created_at);
                                                                            $diffInDays = Carbon::parse($comment->created_at)->diffInDays();
                                                                            $showDiff = Carbon::parse($comment->created_at)->diffForHumans();

                                                                            if ($diffInDays > 0) {
                                                                                $showDiff .= ', ' . Carbon::parse($comment->created_at)->addDays($diffInDays)->diffInHours() . ' Hours';
                                                                            }
                                                                            @endphp
                                                                            {{$showDiff}}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                    <form class="comment-text d-flex align-items-center mt-3" action="javascript:void(0);">
                                                        <input type="text" class="form-control rounded">
                                                        <div class="comment-attagement d-flex">
                                                            <a href="javascript:void();"><i class="ri-link mr-3"></i></a>
                                                            <a href="javascript:void();"><i class="ri-user-smile-line mr-3"></i></a>
                                                            <a href="javascript:void();"><i class="ri-camera-line mr-3"></i></a>
                                                        </div>
                                                    </form>-->
                                                </div>
                                            </div>
                                            @php
                                    				$i++;
                                    				$j++;
                                    				@endphp
                                            @endforeach
                                            @endif