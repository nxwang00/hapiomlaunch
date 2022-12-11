@extends('dashboard.layouts.master')
@section('title', 'Create Ads')
@section('page', 'Create Ads')
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
                                <h4 class="card-title">Create Ads</h4>
                            </div>
                            <a href="{{ route('ads.index') }}" class="btn-sm btn-primary btn-md-2 float-right">Back<div class="ripple-container"></div></a>
                        </div>

                        <div class="iq-card-body">
                            <p>@include('dashboard.includes.alert')</p>
                            <form method="POST" action="{{ route('ads.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate id="ads_form">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Title:</label>
                                        <input class="form-control" type="text" placeholder="Enter title" name="title" value="{{old('title')}}" required="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="direction">Direction:</label>
                                        <select class="form-select form-control" name="direction" id="direction" required="">
                                            <option value="1" selected>Horizantal</option>
                                            <option value="0">Vertical</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Image:</label>
                                        <div class="d-flex">
                                            <input id="uploadFile" class="f-input" autocomplete="off" />
                                            <div class="fileUpload btn btn--browse">
                                                <span>Browse</span>
                                                <input id="uploadBtn" type="file" class="upload" name="image" required=""/>
                                            </div>
                                        </div>
                                        <div id="image-size-warning" ></div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="place">Target placement:</label>
                                        <select class="form-select form-control" name="group_id" id="place" required="">
                                            <option value="0" selected>Main feed</option>
                                            @foreach($groups as $group)
                                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                                            @endforeach
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
                                <button type="button" class="btn btn-primary" id="submit_btn">Submit</button>
                                <a href="{{ route('ads.index') }}" class="btn iq-bg-danger">Cancel</a>
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