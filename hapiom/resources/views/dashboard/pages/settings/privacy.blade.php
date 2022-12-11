@extends('dashboard.layouts.master')
@section('title', 'Privacy Policy')
@section('page', 'Privacy Policy')
@section('page-css-link') @endsection
@section('page-css')
<style>
   .medium-lovely-div {
      background: url("/assets/dashboard/images/logo-wing.png") no-repeat center;
   }

   .medium-lovely-inner-div {
      background-color: #ffffff;
      opacity: 0.95;
      padding-top: 50px;
      padding-bottom: 10px;
   }
</style>
@endsection
@section('main-content')

 <div id="content-page" class="content-page">
    <div class="container">
       <div class="row">
          <div class="col-sm-12">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Privacy Policy</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                  <div class="medium-lovely-div">
                     <div class="medium-lovely-inner-div">
                        <div class="text-center">
                           <img src="{{ url('assets/dashboard/images/logo-wing.png') }}" style="width:20%">
                        </div>
                        <p class="text-left mt-3" style="font-size:18px">
                           {!! $privacyText !!}
                        </p>
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
@section('page-js') @endsection