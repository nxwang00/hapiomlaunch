@extends('dashboard.layouts.master')
@section('title', ' Mebership')
@section('page', ' Mebership')
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
					<h6 class="title">Levels</h6>
					<a href="{{ route('mebership-create') }}" class="btn btn-primary btn-md-2 float-right">Add New Level<div class="ripple-container"></div></a>
					
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
								Store
							</th>
							<th class="amount">
								Amount
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
									<a href="#" class="h6 count">{{ $result->name }}</a>
								</td>
								<td class="store">
									@foreach($result->storePermisions as $storeper)
		                                <span class="badge bg-primary">{{ $storeper->Storemaster->name }}</span>
									@endforeach
								</td>
								<td>{{ @$result->amount }}</td>
								<td class="posts">
									@if($result->levelstatus == 1)							
										<span class="icon-status online"></span>
										<span>Active</span>						
									@else						
										<span class="icon-status disconected"></span>
										<span>Inactive</span>					
									@endif
								</td>
								<td class="freshness">
									<a href="{{ route('mebership-edit',$result->id) }}" class="btn btn-sm bg-blue">Edit</a>
									<a href="javascript:void(0)" route="{{ route('mebership-delete',$result->id) }}" id="{{$result->id}}" text="remove level" class="btn btn-sm btn-border-think btn-transparent c-grey delete">Delete<div class="ripple-container"></div></a>
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
	   
	    if (!confirm("Are you sure? Do yo want to delete level.")){
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