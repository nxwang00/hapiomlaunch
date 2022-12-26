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
                                <h4 class="card-title">Users</h4>
                            </div>
                            <a href="{{ route('admin.create') }}" class="btn-sm btn-primary btn-md-2 float-right">Add New Admin<div class="ripple-container"></div></a>
                        </div>

                        <div class="iq-card-body">
                            <p>@include('dashboard.includes.alert')</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($results->count() > 0)
                                        @foreach ($results as $index => $result)
                                        <tr>
                                            <th scope="row">#{{$index + $results->firstItem()}}</th>
                                            <td>{{ $result->name }}</td>
                                            <td>{{ $result->email }}</td>
                                            <td>{{ $result->Role->name }}</td>
                                            <td>{{ $result->created_at }}</td>
                                            <td>
                                                @if($result->block == 1)
                                                <a href="javascript:void(0)" route="{{ route('user.block',$result->id) }}" id="{{$result->id}}" text="block" class="block"><span class="badge badge-secondary">Block</span></a>
                                                @else
                                                <a href="javascript:void(0)" route="{{ route('user.unblock',$result->id) }}" id="{{$result->id}}" text="block" class="unblock"><span class="badge badge-secondary">Un-Block</span></a>
                                                @endif
                                                <span class="badge badge-danger"><a href="javascript:void(0)" route="{{ route('user-delete',$result->id) }}" id="{{$result->id}}" text="remove user" class="delete">Delete</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="6">
                                                <h3 class="text-danger text-center">Ooops! no data found.</h3>
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
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
@section('page-js')
<script type="text/javascript">
    $(document).on('click', '.block', function() {
        user_id = $(this).attr('id');
        route = $(this).attr('route');
        text = $(this).attr('text');
        text = text.replace("_", " ");

        if (!confirm("Are you sure? Do yo want to block user.")) {
            return false;
        }
        $.ajax({
            url: route,
            method: "GET",
            data: {
                "_token": "{{ csrf_token() }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status) {
                    location.reload();
                }
            }
        })
    });

    $(document).on('click', '.unblock', function() {
        user_id = $(this).attr('id');
        route = $(this).attr('route');
        text = $(this).attr('text');
        text = text.replace("_", " ");

        if (!confirm("Are you sure? Do yo want to unblock user.")) {
            return false;
        }
        $.ajax({
            url: route,
            method: "GET",
            data: {
                "_token": "{{ csrf_token() }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status) {
                    location.reload();
                }
            }
        })
    });

    $(document).on('click', '.delete', function() {
        user_id = $(this).attr('id');
        route = $(this).attr('route');
        text = $(this).attr('text');
        text = text.replace("_", " ");

        if (!confirm("Are you sure? Do yo want to delete user.")) {
            return false;
        }
        $.ajax({
            url: route,
            method: "GET",
            data: {
                "_token": "{{ csrf_token() }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status) {
                    location.reload();
                }
            }
        })
    });
</script>
@endsection