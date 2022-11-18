@extends('dashboard.layouts.master')
@section('title', ' Newsfeed')
@section('page', ' Global News feed')
@section('page-css-link') @endsection
@section('page-css') @endsection
@section('main-content')
<!-- Top Header-Profile -->

<section class="blog-post-wrap medium-padding80">
	<div class="container">
		<div class="row">
			@if($results->count() > 0)
			@php
			$i = 0;
			@endphp
	        @foreach($results as $index => $result)
	        
			<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
				<div class="ui-block">

					<!-- Post -->
					
					<article class="hentry blog-post">
						@if($result->NewsfeedGallaries->count() > 0)
						<div class="post-thumb">
							<img loading="lazy" src="{{ url('public/images/newsfeed',$result->NewsfeedGallaries[$i]->image) }}" alt="photo" width="370" height="261">
						</div>
						@endif
						<div class="post-content">
							<a href="#" class="post-category bg-blue-light">THE COMMUNITY</a>
							<!-- <a href="#" class="h4 post-title">Here’s the Featured Urban photo of August! </a> -->
							<p>{{ $result->text }}</p>
					
							<div class="author-date">
								by
								<a class="h6 post__author-name fn" href="{{ route('user-profile',$result->friendUser->id) }}">{{ ucwords($result->globalNewsFeedUser->name) }}</a>
								<div class="post__date">
									<time class="published" datetime="2017-03-24T18:18">
										- 7 hours ago
									</time>
								</div>
							</div>
					
							<div class="post-additional-info inline-items">
								<div class="friends-harmonic-wrap">
									<ul class="friends-harmonic">
										<li>
											<a href="javascript:void(0)" id="likePost" newsfeed_id="{{ $result->id }}" route="{{ route('newsfeed-like')}}" user_id="{{ $result->user_id }}" likes_id="{{ Auth::user()->id }}">
												<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat27.webp') }}" alt="icon" width="20" height="20" id="likePost" class="h-50 d-inline-block">
											</a>
											<input type="hidden" id="newsfeed_id" value="{{ $result->id }}" disabled="">
											<input type="hidden" id="user_id" value="{{ $result->user_id }}" disabled="">
											<input type="hidden" id="likes_id" value="{{ Auth::user()->id }}" disabled="">
										</li>
										<!-- <li>
											<a href="#">
												<img loading="lazy" src="{{ url('public/assets/dashboard/img/icon-chat2.webp') }}" alt="icon" width="20" height="20">
											</a>
										</li> -->
									</ul>
									<div class="names-people-likes" id="total_count">{{ $result->NewsfeedLike->count() }}</div>
								</div>
					
								<div class="comments-shared">
									<a href="#" id="comment-box" class="post-add-icon inline-items comment-box">
										<svg class="olymp-speech-balloon-icon">
											<use xlink:href="#olymp-speech-balloon-icon"></use>
										</svg>
										<span>0</span>
									</a>
								</div>
					
							</div>
						</div>
					
					</article>
					
					<!-- ... end Post -->

				</div>
			</div>
			@endforeach
			@php
			$i++;
			@endphp
			@endif
		</div>
	</div>

	
	<!-- Pagination -->
	
	<nav aria-label="Page navigation">
		@if ($results->lastPage() > 1)
		<ul class="pagination justify-content-center">
			<li class="page-item disabled {{ ($results->currentPage() == 1) ? ' disabled' : '' }}">
				<a class="page-link" href="{{ $results->url(1) }}" tabindex="-1">Previous</a>
			</li>
			@for ($i = 1; $i <= $results->lastPage(); $i++)
			<li class="page-item {{ ($results->currentPage() == $i) ? ' active' : '' }}"><a class="page-link" href="{{ $results->url($i) }}">{{ $i }}<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: -10.3833px; top: -16.8333px; background-color: rgb(255, 255, 255); transform: scale(16.7857);"></div></div></a></li>
			@endfor
			<li class="page-item {{ ($results->currentPage() == $results->lastPage()) ? ' disabled' : '' }}">
				<a class="page-link" href="{{ $results->url($results->lastPage()) }}">Next</a>
			</li>
		</ul>
		@endif
	</nav>
	
	<!-- ... end Pagination -->

</section>

@endsection
@section('page-js-link') @endsection
@section('page-js')
<script>
$(document).ready(function(){  
  $("#likePost").click(function(){

	  $(this).css("color", "red");
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
        	$('#total_count').html(data);
        }
    })
  });
});
</script>
@endsection