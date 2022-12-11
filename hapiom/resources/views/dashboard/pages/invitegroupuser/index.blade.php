@extends('dashboard.layouts.master')
@section('title', ' Invite Group Users')
@section('page', ' Invite Group Users')
@section('page-css-link') @endsection
@section('page-css')
<style type="text/css">
    /* bootstrap-tagsinput.css file - add in local */

    .bootstrap-tagsinput {
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        padding: 14px 6px;
        color: #555;
        vertical-align: middle;
        border-radius: 4px;
        max-width: 100%;
        line-height: 22px;
        cursor: text;
    }

    .bootstrap-tagsinput input {
        border: none;
        box-shadow: none;
        outline: none;
        background-color: transparent;
        padding: 0 6px;
        margin: 0;
        width: auto;
        max-width: inherit;
    }

    .bootstrap-tagsinput.form-control input::-moz-placeholder {
        color: #777;
        opacity: 1;
    }

    .bootstrap-tagsinput.form-control input:-ms-input-placeholder {
        color: #777;
    }

    .bootstrap-tagsinput.form-control input::-webkit-input-placeholder {
        color: #777;
    }

    .bootstrap-tagsinput input:focus {
        border: none;
        box-shadow: none;
    }

    .bootstrap-tagsinput .tag {
        margin-right: 2px;
        color: blue;
    }

    .bootstrap-tagsinput .tag [data-role="remove"] {
        margin-left: 8px;
        cursor: pointer;
    }

    .bootstrap-tagsinput .tag [data-role="remove"]:after {
        content: "x";
        padding: 0px 2px;
    }

    .bootstrap-tagsinput .tag [data-role="remove"]:hover {
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .bootstrap-tagsinput .tag [data-role="remove"]:hover:active {
        box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    }
</style>
@endsection
@section('main-content')
<div id="content-page" class="content-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Add the member to invite on given group</h4>
                        </div>
                    </div>
                    @include('dashboard.includes.alert')
                    <div class="iq-card-body">
                        <div class="acc-edit">
                            <form method="post" action="{{ route('group-process') }}" class="needs-validation frmInviteUser" id="frmInviteUser">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email Id:</label>
                                    <input class="form-control" type="text" placeholder="" id="tags-input" name="emails">
                                </div>
                                <div class="form-group">
                                    <label for="groups">Groups:</label>
                                    <select class="form-select form-control" name="group" id="groups">
                                        @foreach ($results as $index => $result)
                                        @if (Auth::user()->role_id == 1)
                                        <option value="{{$result->id}}">{{ $result->name }}</option>
                                        @elseif (Auth::user()->id == $result->created_by)
                                        <option value="{{$result->id}}">{{ $result->name }}</option>
                                        @elseif ($result->approvedGroupUser($result->id, Auth::user()->id))
                                        <option value="{{$result->id}}">{{ $result->name }}</option>
                                        @endif
                                        @endforeach
									</select>
                                </div>
                                <div class="form-group">
                                    <label for="altemail">Your Message:</label>
                                    <textarea class="form-control" name="message"> </textarea>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="optionsCheckbox" name="optionsCheckbox" checked="">
                                        <label class="custom-control-label" for="english">Send invitation via email</label>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g==" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var tagInputEle = $('#tags-input');
        tagInputEle.tagsinput({
            maxTags: 5
        });
    });

    $(".btn-invite-user").click(function() {
        $("#frmInviteUser").submit();
    });
</script>
@endsection