@extends('dashboard.layouts.master')
@section('title', ' Ads')
@section('page', ' Ads')
@section('page-css-link') @endsection
@section('page-css')
<style type="text/css">
	.float-right {
	  float: right !important;
	}
</style> 
@endsection
@section('main-content')
<!-- Top Header-Profile -->
<div class="header-spacer"></div>

<div class="container">
	<div class="row">
		<div class="col col-xl-12 order-xl-2 col-lg-12 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">

			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Ads List</h6>
					<a href="{{ route('ads.create') }}" class="btn btn-primary btn-md-2 float-right">Add<div class="ripple-container"></div></a>
					
				</div>
				<div class="ui-block">				
				<!-- Forums Table -->
				@include('dashboard.includes.alert')
					<table class="forums-table">
						<thead>
						<tr>
							<th class="forum">
								Id
							</th>
					
							<th class="topics">
								Title
							</th>
							<th class="store">
								Position
							</th>
					
							<th class="posts">
								Image
							</th>
							<th class="posts">
								Status
							</th>
							<th class="posts">
								Created Date
							</th>
							<th class="posts">
								Action
							</th>
						</tr>
						</thead>
						<tbody>
						@if($results->count() > 0)
	                    @foreach ($results as $index => $result)
							<tr>
								<td class="forum">
									#{{$index + $results->firstItem()}}
								</td>
								<td class="topics">
									<a href="#" class="h6 count">{{ $result->title }}</a>
								</td>
								<td class="topics">
									<a href="#" class="h6 count">{{ $result->position }}</a>
								</td>
								<td class="topics">
									@if(!empty($result->image))
										<img src="{{ url('public/images/ads/'.$result->image) }}"  style="max-width: 40px;" alt="{{ $result->image }}">
									@endif
								</td>
								<td class="topics">									
									@if($result->status == 1)							
										<span class="icon-status online"></span>
										<span>Active</span>						
									@else						
										<span class="icon-status disconected"></span>
										<span>Inactive</span>					
									@endif
								</td>
								<td class="topics">
									<a href="#" class="h6 count">{{ $result->created_at }}</a>
								</td>
								<td class="topics">
									<a href="{{ route('ads.edit',$result->id) }}" class="btn btn-sm bg-blue">Edit</a>
									<a href="javascript:void(0)" route="{{ route('ads.destroy',$result->id) }}" id="{{$result->id}}" text="remove level" class="btn btn-sm btn-border-think btn-transparent c-grey delete">Delete<div class="ripple-container"></div></a>
								</td>
							</tr>
						@endforeach
	                    @else
	                    <tr>

	                    	<td colspan="6">
	                    	 <h3 class="text-danger text-center">Ooops! no data found.</h3>
	                        </td>
	                    </tr>
	                    @endif	
						</tbody>
					</table>

				<!-- ... end Forums Table -->
			     </div>	
			    <!-- Pagination -->
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
							<a class="page-link" href="{{ $results->url($results->lastPage()) }}">Next</a>
						</li>
					</ul>
					@endif
				</nav>
				<!-- ... end Pagination -->
			    			
				<!-- Notification List Frien Requests -->			
				
				<!-- ... end Notification List Frien Requests -->
			</div>

		</div>
	</div>
</div>
@endsection
@section('page-js-link') @endsection
@section('page-js')
<script type="text/javascript">
$(document).on('click', '.block', function() {
    user_id = $(this).attr('id');
    route = $(this).attr('route');
    text = $(this).attr('text');
    text = text.replace("_", " ");
   
    if (!confirm("Are you sure? Do yo want to block user.")){
      return false;
    }
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

$(document).on('click', '.unblock', function() {
    user_id = $(this).attr('id');
    route = $(this).attr('route');
    text = $(this).attr('text');
    text = text.replace("_", " ");
   
    if (!confirm("Are you sure? Do yo want to unblock user.")){
      return false;
    }
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

$(document).on('click', '.delete', function() {
    user_id = $(this).attr('id');
    route = $(this).attr('route');
    text = $(this).attr('text');
    text = text.replace("_", " ");
   
    if (!confirm("Are you sure? Do yo want to delete ads.")){
      return false;
    }
    $.ajax({
        url: route,
        method: "DELETE",
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