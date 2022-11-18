@extends('dashboard.layouts.master')
@section('title', ' Users')
@section('page', ' Users')
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
					<h6 class="title">Users</h6>
					<!-- <a href="{{ route('mebership-create') }}" class="btn btn-primary btn-md-2 float-right">Add New Level<div class="ripple-container"></div></a> -->
					
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
								Name
							</th>
							<th class="store">
								Emial
							</th>
					
							<th class="posts">
								Role
							</th>
							<th class="posts">
								Created Date
							</th>
							<th class="freshness">
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
									{{ $result->name }}
								</td>
								<td class="topics">
									<a href="#" class="h6 count">{{ $result->email }}</a>
								</td>
								<td class="topics">
									{{ $result->Role->name }}
								</td>
								<td class="topics">
									{{ $result->created_at }}
								</td>
								<td class="freshness">
									@if(Auth::user()->role_id == 1)
									<a href="{{ route('user.list',$result->id) }}" class="btn btn-sm bg-blue">User List</a>
									@endif
									@if(Auth::user()->role_id == 1)
									<a href="{{ route('user.viewdetails',$result->id) }}" class="btn btn-sm bg-primary">View details</a>
									@endif
									@if($result->block == 1)
									<a href="javascript:void(0)" route="{{ route('user.block',$result->id) }}" id="{{$result->id}}" text="block" class="btn btn-sm btn-border-think btn-transparent c-grey block">Block<div class="ripple-container"></div></a>
									@else
									<a href="javascript:void(0)" route="{{ route('user.unblock',$result->id) }}" id="{{$result->id}}" text="block" class="btn btn-sm btn-border-think btn-transparent c-grey unblock">Un-Block<div class="ripple-container"></div></a>
									@endif
									<a href="javascript:void(0)" route="{{ route('user-delete',$result->id) }}" id="{{$result->id}}" text="remove user" class="btn btn-sm btn-danger delete">Delete<div class="ripple-container"></div></a>

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
   
    if (!confirm("Are you sure? Do yo want to delete user.")){
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

</script> 
@endsection