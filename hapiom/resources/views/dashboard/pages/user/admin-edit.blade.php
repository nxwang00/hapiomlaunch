@extends('dashboard.layouts.master')
@section('title', ' Edit User')
@section('page', ' Edit User')
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
                                <h4 class="card-title">Edit user</h4>
                            </div>
                            <a href="{{ route('user.index') }}" class="btn-sm btn-primary btn-md-2 float-right">Back<div class="ripple-container"></div></a>
                        </div>

                        <div class="iq-card-body">
                            <p>@include('dashboard.includes.alert')</p>
                            <form method="POST" action="{{ route('admin.update',$admin_user->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="email">First Name:</label>
                                        <input class="form-control" type="text" placeholder="Enter first name" value="{{ $admin_user->first_name }}" name="first_name" required="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="pwd">Last Name:</label>
                                        <input class="form-control" type="text" placeholder="Enter last name" value="{{ $admin_user->last_name }}" name="last_name" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="pwd">Email:</label>
                                        <input class="form-control" type="email" placeholder="Enter email" value="{{ $admin_user->email }}" name="email" required="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="pwd">Company Name:</label>
                                        <input class="form-control" type="text" placeholder="Enter company name" value="{{ $admin_user->company_name }}" name="company_name" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="pwd">Type:</label>
                                        <select class="form-select form-control group_type" name="group_type" id="group_type">
                                            <option value="0" @if($admin_user->group_type == 0) {{ 'selected' }} @endif>Basic</option>
                                            <option value="1" @if($admin_user->group_type == 1) {{ 'selected' }} @endif>Paid</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="pwd">Status:</label>
                                        <div class="form-check">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio1" name="status" class="custom-control-input" value="1" @if($admin_user->status == 1) {{ 'checked=""' }} @endif>
                                                <label class="custom-control-label" for="customRadio1"> Active</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio2" name="status" class="custom-control-input" value="0" @if($admin_user->status == 0) {{ 'checked=""' }} @endif>
                                                <label class="custom-control-label" for="customRadio2"> In-active</label>
                                            </div>
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