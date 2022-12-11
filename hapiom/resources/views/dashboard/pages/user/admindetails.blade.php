@extends('dashboard.layouts.master')
@section('title', ' User List')
@section('page', ' User List')
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
                              <h4 class="card-title">{{ @$user->name }} Details</h4>                              
                           </div>
                           <a href="{{ route('user.index') }}" class="btn-sm btn-primary btn-md-2 float-right">Back<div class="ripple-container"></div></a>							
                        </div>

                        <div class="iq-card-body"> 
                         <p>@include('dashboard.includes.alert')</p>                       
                           <form method="post" action="{{ route('user.addcomment') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
							@csrf
                              <div class="row">
                                  <div class="form-group col-md-12">
                                     <label for="email">Comment:</label>
                                     <textarea name="comment" class="form-control valid" type="text" placeholder="" required="" aria-invalid="false"> {{ @$user->userInfo->comment }}</textarea>
                                  </div>                                  
                              </div>                                           
                              <button type="submit" class="btn btn-primary">Submit</button>
                              <a href="{{ route('user.index') }}" class="btn iq-bg-danger">Cancel</a>
                              <button type="button" class="btn btn-primary">Refund</button>

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
@endsection