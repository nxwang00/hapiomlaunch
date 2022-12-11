@extends('dashboard.layouts.master')
@section('title', ' Free')
@section('page', ' Free')
@section('page-css-link') @endsection
@section('page-css')
<style type="text/css">
	.float-right {
	  float: right !important;
	}
</style>
@endsection
@section('main-content')
<!-- Stunning header -->

<div class="header-spacer"></div>

<div class="container">
	<div class="row">
		<div class="col col-xl-12 order-xl-2 col-lg-12 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">

			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Free</h6>
					<a href="{{ route('free-create') }}" class="btn btn-primary btn-md-2 float-right">Add New Free<div class="ripple-container"></div></a>

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

							<th class="description">
								Description
							</th>

							<th class="image">
								Image
							</th>

							<th class="posts">
								Status
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
								<a href="#" class="h6 count">{{ $result->free }}</a>
							</td>
							<td class="description">
								<a href="#" class="h6 count">{{ $result->description }}</a>
							</td>
							<td class="image">
								@if(!empty($result->image))
								<img src="{{ url('images/free/'.$result->image) }}" style="max-width: 40px;">
 								@endif
							</td>
							<td class="posts">
								@if($result->free_status == 1)
									<span class="icon-status online"></span>
									<span>Active</span>
								@else
									<span class="icon-status disconected"></span>
									<span>Inactive</span>
								@endif
							</td>
							<td class="freshness">
								<a href="{{ route('free-edit',$result->id) }}" class="btn btn-sm bg-blue">Edit</a>
								<a href="javascript:void(0)" route="{{ route('free-delete',$result->id) }}" id="{{$result->id}}" text="remove Free" class="btn btn-sm btn-border-think btn-transparent c-grey delete">Delete<div class="ripple-container"></div></a>
							</td>
						</tr>
						@endforeach
	                    @else
	                    <h3 class="text-danger">Ooops! no data found.</h3>
	                    @endif
						</tbody>
					</table>
				<!-- ... end Forums Table -->
			     </div>
				<!-- Notification List Frien Requests -->

				<!-- ... end Notification List Frien Requests -->
			</div>

			<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 align-center pb120">

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

			</div>

		</div>
	</div>
</div>
@endsection
@section('page-js-link') @endsection
@section('page-js')
<script type="text/javascript">
	$(document).on('click', '.delete', function() {
	    user_id = $(this).attr('id');
	    route = $(this).attr('route');
	    text = $(this).attr('text');
	    text = text.replace("_", " ");

	    if (!confirm("Are you sure? Do yo want to delete free.")){
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