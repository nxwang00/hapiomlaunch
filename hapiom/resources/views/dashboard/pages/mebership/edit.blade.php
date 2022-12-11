@extends('dashboard.layouts.master')
@section('title', ' Mebership')
@section('page', ' Mebership')
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
                <h4 class="card-title">Update Level</h4>
              </div>
              <a href="{{ route('mebership') }}" class="btn-sm btn-primary btn-md-2 float-right">Back<div class="ripple-container"></div></a>
            </div>

            <div class="iq-card-body">
              <p>@include('dashboard.includes.alert')</p>
              <form method="POST" action="{{ route('mebership-update',$meberships->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="email">Level Name:</label>
                    <input class="form-control" type="text" placeholder="Enter level name" value="{{ $meberships->name }}" name="name" required="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="pwd">Amount:</label>
                    <input class="form-control" placeholder="Enter amount" id="amount" name="amount" type="text" value="{{ $meberships->amount }}" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="description">Description:</label>
                  <textarea class="form-control" aria-label="With textarea" placeholder="Membership tier plan description here..." value="{{ $meberships->description }}" required="" name="description" id="description">{{ $meberships->description }}</textarea>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="pwd">Store:</label>
                    @if($storemasters->count() > 0)
                    @foreach ($storemasters as $storemaster)
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck{{$storemaster->id}}" name="store[]" @if(in_array($storemaster->id, $storepermisions)) {{'checked=""'}} @endif value="{{ $storemaster->id }}">
                      <label class="custom-control-label" for="customCheck{{$storemaster->id}}">{{ $storemaster->name }}</label>
                    </div>
                    @endforeach
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="pwd">Status:</label>
                  <div class="form-check">
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio1" name="levelstatus" class="custom-control-input" value="1" @if($meberships->levelstatus == 1) {{ 'checked' }} @endif>
                      <label class="custom-control-label" for="customRadio1"> Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio2" name="levelstatus" class="custom-control-input" value="0" @if($meberships->levelstatus == 0) {{ 'checked' }} @endif>
                      <label class="custom-control-label" for="customRadio2"> In-active</label>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('mebership') }}" class="btn iq-bg-danger">Cancel</a>
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