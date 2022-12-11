@extends('dashboard.layouts.master')
@section('title', ' Polls Create')
@section('page', ' Polls Create')
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
                              <h4 class="card-title">Add New Poll</h4>                              
                           </div>
                           <a href="{{ route('polls') }}" class="btn-sm btn-primary btn-md-2 float-right">Back<div class="ripple-container"></div></a>							
                        </div>

                        <div class="iq-card-body"> 
                         <p>@include('dashboard.includes.alert')</p>                       
                           <form method="post" action="{{ route('polls-save') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
							@csrf
                              <div class="row">
                                  <div class="form-group col-md-6">
                                     <label for="email">Title:</label>
                                     <input class="form-control" type="text" name="title" id="title" placeholder="" value="{{ old('title') }}" required>
                                  </div>
                                  <div class="form-group col-md-6">
                                     <label for="pwd">Question:</label>
                                     <textarea class="form-control" name="question" id="question" required>{{ old('question') }}</textarea>
                                  </div>                                 
                              </div>
                              <div class="row">                                  
                                   <div class="form-group col-md-6">
                                     <label for="pwd">Option A:</label>
                                     <input class="form-control" type="text" name="optiona" id="optiona" placeholder="" value="{{ old('optiona') }}" required>
                                  </div>
                                   <div class="form-group col-md-6">
                                     <label for="pwd">Option B:</label>
                                     <input class="form-control" type="text" name="optionb" id="optionb" placeholder="" value="{{ old('optionb') }}" required>
                                  </div>
                              </div>
                              <div class="row">                                  
                                   <div class="form-group col-md-6">
                                     <label for="pwd">Option C:</label>
                                     <input class="form-control" type="text" name="optionc" id="optionc" placeholder="" value="{{ old('optionc') }}" required>
                                  </div>
                                   <div class="form-group col-md-6">
                                     <label for="pwd">Option D:</label>
                                     <input class="form-control" type="text" name="optiond" id="optiond" placeholder="" value="{{ old('optiond') }}" required>
                                  </div>
                              </div>

                              <div class="form-group">
                                <label for="pwd">Status:</label>
                                 <div class="form-check">
                                    <div class="custom-control custom-radio">
                                       <input type="radio" id="customRadio1" name="polls_status" class="custom-control-input" value="1" checked="">
                                       <label class="custom-control-label" for="customRadio1"> Active</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                       <input type="radio" id="customRadio2" name="polls_status" class="custom-control-input" value="0">
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