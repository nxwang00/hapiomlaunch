@extends('dashboard.layouts.master')
@section('title', ' Group Type')
@section('page', ' Group Type')
@section('page-css-link') @endsection
@section('page-css')
@endsection
@section('main-content')

<!-- Top Header-Profile -->
<div id="content-page" class="content-page">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="col-sm-12">
          <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
              <div class="iq-header-title">
                <h4 class="card-title">Group Store</h4>                              
              </div>
              <a href="{{ route('group') }}" class="btn-sm btn-primary btn-md-2 float-right">Back<div class="ripple-container"></div></a>							
            </div>

            <div class="iq-card-body"> 
              <p>@include('dashboard.includes.alert')</p>                       
              <form method="POST" action="{{ route('group-save') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="email">Name:</label>
                    <input class="form-control" type="text" placeholder="Enter name"  name="name" value="{{old('name')}}" required="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="email">Select User Admin:</label>
                    <select class="form-select form-control" name="users[]"  multiple="">
						@foreach($users as $user)
						<option value="{{ $user->id }}">{{ $user->name }}</option>
						@endforeach
					</select>
                  </div>                 
                </div>
                <div class="row">                  
                  <div class="form-group col-md-6">
                    <label for="email">Image:</label>
                     <div class="custom-file" style="z-index: 0;">
                        <input type="file" class="custom-file-input" id="customFile" name="image" required="">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                     </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="email">Type:</label>
                    <select class="form-select form-control group_type" name="group_type">
							<option value="0">Free</option>
							<option value="1">Paid</option>
					</select>
                  </div>                 
                </div>
                <div class="row paid_amount d-none">
                	<div class="form-group col-md-6">
	                    <label for="email">Amount:</label>
	                    <input class="form-control amount" type="text" placeholder="" value="{{ old('amount') }}" name="amount">
	                </div> 
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="email">Terms & Condition:</label>
                    <textarea class="form-control" name="terms_and_condition" rows="5" required="">{{ old('terms_and_condition') }}</textarea>
                  </div>          
                </div>                 

                <div class="form-group">
                  <label for="pwd">Status:</label>                              	
                  <div class="form-check">
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio1" name="status" class="custom-control-input" value="1" checked="">
                      <label class="custom-control-label" for="customRadio1"> Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio2" name="status" class="custom-control-input" value="0" >
                      <label class="custom-control-label" for="customRadio2"> In-active</label>
                    </div>                                    
                  </div>
                </div>                              
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('group') }}" class="btn iq-bg-danger">Cancel</a>
              </form>
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
$(document).ready(function(){
    $('.group_type').on('change', function() {
      if ( this.value == '1')
      //.....................^.......
      {
        $(".paid_amount").removeClass('d-none');
      }
      else
      {
        $(".paid_amount").addClass('d-none');
      }
    });
});


</script>
@endsection