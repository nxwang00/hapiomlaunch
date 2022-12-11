@extends('dashboard.layouts.master')
@section('title', ' Groups')
@section('page', ' Groups')
@section('page-css-link') @endsection
@section('page-css')

@endsection
@section('main-content')


<div id="content-page" class="content-page">
    <div class="container">
       <div class="row">
          <div class="col-lg-12">
                <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Groups</h4>
                           </div>
                           <a href="{{ route('user.group.create') }}" class="btn-sm btn-primary btn-md-2 float-right">Add New Group<div class="ripple-container"></div></a>
                        </div>

                        <div class="iq-card-body">
                         <p>@include('dashboard.includes.alert')</p>
                           <div class="table-responsive">
                              <table class="table">
                                 <thead>
                                    <tr>
                                       <th scope="col">Id</th>
                                       <th scope="col">Name</th>
                                       <th scope="col">Group Type</th>
                                       <th scope="col">Image</th>
                                       <th scope="col">Status</th>
                                       <th scope="col">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                  @if($results->count() > 0)
                                  @foreach ($results as $index => $result)
                                  <tr>
                                    <th scope="row">#{{$index + $results->firstItem()}}</th>
                                    <td>{{ $result->name }}</td>
                                    <td>
                                        @if($result->group_type == 1)
											<span class="icon-status online"></span>
											<span>Paid / {{ $result->amount }}</span>
										@else
											<span class="icon-status disconected"></span>
											<span>Free</span>
										@endif
                                    </td>
                                    <td>
                                    	@if(!empty($result->image))
											<img src="{{ url('images/group/'.$result->image) }}"  style="max-width: 40px;">
										@endif
                                    </td>
                                    <td>
                                    	@if($result->status == 1)
											<span class="icon-status online"></span>
											<span>Active</span>
										@else
											<span class="icon-status disconected"></span>
											<span>Inactive</span>
										@endif
                                    </td>
                                    <td>
                                      <a href="{{ route('group-details',$result->id) }}"><span class="badge badge-primary">Details</span></a>

                                      @if($result->created_by == Auth::user()->id)
                                      <a href="{{ route('user.group.edit',$result->id) }}"><span class="badge badge-primary">Edit</span></a>

                                      <span class="badge badge-danger"><a href="javascript:void(0)" route="{{ route('user.group.delete',$result->id) }}" id="{{$result->id}}" text="remove" class="delete">Delete</span>
                                      @endif
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
                           </div>
                        </div>
                     </div>
                  </div>
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