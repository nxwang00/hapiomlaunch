@extends('dashboard.layouts.master')
@section('title', ' Polls')
@section('page', ' Polls')
@section('page-css-link') @endsection
@section('page-css') @endsection
@section('main-content')
<div id="content-page" class="content-page">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="col-sm-12">
               <div class="iq-card">
                  <div class="iq-card-header d-flex justify-content-between">
                     <div class="iq-header-title">
                        <h4 class="card-title">Polls</h4>                              
                     </div>
                     <a href="{{ route('polls-create') }}" class="btn-sm btn-primary btn-md-2 float-right">Add New Poll<div class="ripple-container"></div></a>							
                  </div>

                  <div class="iq-card-body"> 
                     <p>@include('dashboard.includes.alert')</p>                       
                     <div class="table-responsive">
                        <table class="table">
                           <thead>
                              <tr>
                                 <th scope="col">Id</th>
                                 <th scope="col">Title</th> 
                                 <th scope="col">Question</th>                                          
                                 <th scope="col">Status</th>
                                 <th scope="col">Action</th>                           
                              </tr>
                           </thead>
                           <tbody>
                              @if($results->count() > 0)
                              @foreach ($results as $index => $result)
                              <tr>
                                 <th scope="row">#{{$index + $results->firstItem()}}</th>
                                 <td>{{ $result->title }}</td> 
                                 <td>{{ @$result->question }}</td>                               
                                 <td>
                                    @if($result->polls_status == 1)							
                                    <span class="icon-status online"></span>
                                    <span>Active</span>						
                                    @else						
                                    <span class="icon-status disconected"></span>
                                    <span>Inactive</span>					
                                    @endif
                                 </td>
                                 <td>

                                    <a href="{{ route('polls-edit',$result->id) }}"><span class="badge badge-primary">Edit</span></a>
                                    <span class="badge badge-danger"><a href="javascript:void(0)" route="{{ route('polls-delete',$result->id) }}" id="{{$result->id}}" text="remove" class="delete">Delete</span>
                                    <a href="{{ route('polls-detail',$result->id) }}"><span class="badge badge-primary">Details</span></a>

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
	   
	    if (!confirm("Are you sure? Do yo want to delete polls.")){
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