@extends('dashboard.layouts.master')
@section('title', ' Add User')
@section('page', ' Add User')
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
                              <h4 class="card-title">Users</h4>                              
                           </div>
                           <a href="{{ route('user.index') }}" class="btn-sm btn-primary btn-md-2 float-right">Back<div class="ripple-container"></div></a>							
                        </div>

                        <div class="iq-card-body"> 
                         <p>@include('dashboard.includes.alert')</p>                       
                           <form method="post" action="{{ route('admin.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
							                 @csrf
                              <div class="row">
                                  <div class="form-group col-md-6">
                                     <label for="email">First Name:</label>
                                     <input class="form-control" type="text" placeholder="Enter first name" value="{{ old('first_name') }}" name="first_name" required="">
                                  </div>
                                  <div class="form-group col-md-6">
                                     <label for="pwd">Last Name:</label>
                                     <input class="form-control" type="text" placeholder="Enter last name" value="{{ old('last_name') }}" name="last_name" required="">
                                  </div>
                              </div>
                              <div class="row">                                  
                                  <div class="form-group col-md-6">
                                     <label for="pwd">Email:</label>
                                     <input class="form-control" type="email" placeholder="Enter email" value="{{ old('email') }}" name="email" required="">
                                  </div>
                                  <div class="form-group col-md-6">
                                     <label for="pwd">Password:</label>
                                     <input class="form-control" type="password" placeholder="Enter password" value="{{ old('password') }}" name="password" required="">
                                  </div>
                              </div>
                              <div class="row">                                  
                                  <div class="form-group col-md-6">
                                     <label for="pwd">Company Name:</label>
                                     <input class="form-control" type="text" placeholder="Enter company name" value="{{ old('company_name') }}" name="company_name" required="">
                                  </div>
                                  <div class="form-group col-md-6">
                                     <label for="pwd">Type:</label>
                                     <select class="form-select form-control group_type" name="group_type" id="group_type">
                                      <option value="0">Basic</option>
                                      <option value="1">Paid</option>
                                     </select>
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
                                       <input type="radio" id="customRadio2" name="status" class="custom-control-input" value="0">
                                       <label class="custom-control-label" for="customRadio2"> In-active</label>
                                    </div>                                    
                                 </div>
                              </div>                              
                              <button type="submit" class="btn btn-primary">Submit</button>
                              <a href="{{ route('user.index') }}" class="btn iq-bg-danger">Cancel</a>
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
