@extends('dashboard.layouts.master')
@section('title', ' Polls')
@section('page', ' Polls')
@section('page-css-link') @endsection
@section('page-css') @endsection
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
                              <h4 class="card-title">Update Poll</h4>                              
                           </div>
                           <a href="{{ route('polls') }}" class="btn-sm btn-primary btn-md-2 float-right">Back<div class="ripple-container"></div></a>							
                        </div>

                        <div class="iq-card-body"> 
                         <p>@include('dashboard.includes.alert')</p>                       
                           <form method="post" action="{{ route('polls-update',$polls->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate>
							@csrf
                              <div class="row">
                                  <div class="form-group col-md-6">
                                     <label for="email">Title:</label>
                                     <input class="form-control" type="text" name="title" id="title" placeholder="" value="{{ $polls->title }}" required>
                                  </div>
                                  <div class="form-group col-md-6">
                                     <label for="pwd">Question:</label>
                                     <textarea class="form-control" name="question" id="question" required>{{ $polls->question }}</textarea>
                                  </div>                                 
                              </div>
                              <div class="row">                                  
                                   <div class="form-group col-md-6">
                                     <label for="pwd">Option A:</label>
                                     <input class="form-control" type="text" name="optiona" id="optiona" placeholder="" value="{{ $polls->option_a }}" required>
                                  </div>
                                   <div class="form-group col-md-6">
                                     <label for="pwd">Option B:</label>
                                     <input class="form-control" type="text" name="optionb" id="optionb" placeholder="" value="{{ $polls->option_b }}" required>
                                  </div>
                              </div>
                              <div class="row">                                  
                                   <div class="form-group col-md-6">
                                     <label for="pwd">Option C:</label>
                                     <input class="form-control" type="text" name="optionc" id="optionc" placeholder="" value="{{ $polls->option_c }}" required>
                                  </div>
                                   <div class="form-group col-md-6">
                                     <label for="pwd">Option D:</label>
                                     <input class="form-control" type="text" name="optiond" id="optiond" placeholder="" value="{{ $polls->option_d }}" required>
                                  </div>
                              </div>

                              <div class="form-group">
                                <label for="pwd">Status:</label>
                                 <div class="form-check">
                                    <div class="custom-control custom-radio">
                                       <input type="radio" id="customRadio1" name="polls_status" class="custom-control-input" value="1" @if($polls->polls_status == 1) {{ 'checked=""' }} @endif>
                                       <label class="custom-control-label" for="customRadio1"> Active</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                       <input type="radio" id="customRadio2" name="polls_status" class="custom-control-input" value="0" @if($polls->polls_status == 0) {{ 'checked=""' }} @endif>
                                       <label class="custom-control-label" for="customRadio2"> In-active</label>
                                    </div>                                    
                                 </div>
                              </div>                              
                              <button type="submit" class="btn btn-primary">Submit</button>
                              <a href="{{ route('polls') }}" class="btn iq-bg-danger">Cancel</a>
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
@section('page-js') @endsection