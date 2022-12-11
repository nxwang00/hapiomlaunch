@extends('dashboard.layouts.master')
@section('title', ' Settings')
@section('page', ' Settings')
@section('page-css-link') @endsection
@section('page-css')

@endsection
@section('main-content')
<!-- Top Header-Profile -->

<div class="content-page">
  <div class="container">
    <p>@include('dashboard.includes.alert')</p>
    <div class="iq-card">
      <div class="iq-card-header d-flex justify-content-between">
          <div class="iq-header-title">
            <h4 class="card-title">User Sign-up Agreement</h4>
          </div>
      </div>
      <div class="iq-card-body">
        <form method="post" action="{{ route('agreement-save') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <textarea class="form-control" name="signup_agreement" id="signup_agreement" value="{{$agreementText}}">{{$agreementText}}</textarea>
          </div>
          <button type="submit" class="btn btn-primary" id="saveAgreementBtn">Save</button>
        </form>
      </div>
    </div>
    <div class="iq-card">
      <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
          <h4 class="card-title">Privacy Policy</h4>
        </div>
      </div>
      <div class="iq-card-body">
        <form method="post" action="{{ route('privacy-save') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <textarea class="form-control" name="privacy" id="privacy" value="{{$privacyText}}">{{$privacyText}}</textarea>
          </div>
          <button type="submit" class="btn btn-primary" id="privacyBtn">Save</button>
        </form>
      </div>
    </div>
    <div class="iq-card">
      <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
          <h4 class="card-title">Terms of Use</h4>
        </div>
      </div>
      <div class="iq-card-body">
        <form method="post" action="{{ route('terms-of-use-save') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <textarea class="form-control" name="termsofuse" id="termsofuse" value="{{$termsofuseText}}">{{$termsofuseText}}</textarea>
          </div>
          <button type="submit" class="btn btn-primary" id="termsofuseBtn">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
@section('page-js-link') @endsection
@section('page-js')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
  $(window).on('load', function (){
    CKEDITOR.replace( 'signup_agreement' );
    CKEDITOR.replace( 'privacy' );
    CKEDITOR.replace( 'termsofuse' );
  });
</script>
@endsection