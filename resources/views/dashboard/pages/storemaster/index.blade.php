@extends('dashboard.layouts.master')
@section('title', 'Store-Master')
@section('page', ' Store-Master')
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
					<h6 class="title">Store-Master</h6>
					<a href="{{ route('store-master-create') }}" class="btn btn-primary btn-md-2 float-right">Add New Store<div class="ripple-container"></div></a>
					
				</div>				
				<!-- Notification List Frien Requests -->
				@include('dashboard.includes.alert')
				<ul class="notification-list friend-requests">
					@if($results->count() > 0)
                    @foreach ($results as $index => $result)
					<li>
						<div class="h6">
							#{{$index + $results->firstItem()}}
						</div>
						<div class="notification-event">
							<span class="chat-message-item">{{ $result->name }}</span>
						</div>
						<div class="notification-icon">
							@if($result->storestatus == 1)							
								<span class="icon-status online"></span>
								<span>Active</span>						
							@else						
								<span class="icon-status disconected"></span>
								<span>Inactive</span>					
							@endif
						</div>
						<span class="notification-icon">
							<a href="{{ route('store-master-edit',$result->id) }}" class="btn btn-sm bg-blue">Edit</a>
							<a href="javascript:void(0)" route="{{ route('store-master-delete',$result->id) }}" id="{{$result->id}}" text="remove test" class="btn btn-sm btn-border-think btn-transparent c-grey delete">Delete<div class="ripple-container"></div></a>
						</span>
					</li>
					@endforeach
                    @else	
                    <li><h3 class="text-danger">Ooops! no data found.</h3></li>	
                    @endif
				</ul>
				
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
   
    if (!confirm("Are you sure? Do yo want to delete store.")){
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