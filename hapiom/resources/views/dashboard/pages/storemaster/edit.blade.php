@extends('dashboard.layouts.master')
@section('title', ' Store-Master')
@section('page', ' Store-Master')
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
                                <h4 class="card-title">Edit Store</h4>
                            </div>
                            <a href="{{ route('store-master') }}" class="btn-sm btn-primary btn-md-2 float-right">Back<div class="ripple-container"></div></a>
                        </div>

                        <div class="iq-card-body">
                            <p>@include('dashboard.includes.alert')</p>
                            <form method="POST" action="{{ route('store-master-update',$storemaster->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="email">Name:</label>
                                        <input class="form-control" type="text" placeholder="Enter name" name="name" value="{{ $storemaster->name }}" required="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Image:</label>
                                        <div class="d-flex">
                                            <input id="uploadFile" class="f-input" autocomplete="off" />
                                            <div class="fileUpload btn btn--browse">
                                                <span>Browse</span>
                                                <input id="uploadText" type="file" class="upload" name="image"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2 mt-4" id="preview_img">
                                        <img src="{{ url('images/store/'.$storemaster->image) }}" style="max-width: 65px;">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="email">Description:</label>
                                        <textarea class="form-control" type="text" placeholder="Enter description" name="description" required="">{{ $storemaster->description }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pwd">Status:</label>
                                    <div class="form-check">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="storestatus" class="custom-control-input" value="1" @if($storemaster->storestatus == 1) {{ 'checked' }} @endif>
                                            <label class="custom-control-label" for="customRadio1"> Active</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="storestatus" class="custom-control-input" value="0" @if($storemaster->storestatus == 0) {{ 'checked' }} @endif>
                                            <label class="custom-control-label" for="customRadio2"> In-active</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('store-master') }}" class="btn iq-bg-danger">Cancel</a>
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
<script>
    document.getElementById("uploadText").onchange = function () {
        document.getElementById("uploadFile").value = this.value.replace("C:\\fakepath\\", "");
    };
    String.prototype.filename=function(extension) {
        let file = this.replace(/\\/g, '/');
        file = file.substring(file.lastIndexOf('/') + 1);
        return file;
    }
    $(document).ready(function() {
        let image_name = $('#preview_img img').attr('src').filename();
        $('#uploadFile').val(image_name);
    })
</script>
@endsection