@extends('dashboard.layouts.master')
@section('title', ' Group Type')
@section('page', ' Group Type')
@section('page-css-link') @endsection
@section('page-css') @endsection
@section('main-content')
<!-- Top Header-Profile -->

<div id="content-page" class="content-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Groups</h4>
                            </div>
                            <a href="{{ route('group-create') }}" class="btn-sm btn-primary btn-md-2 float-right">Add New Group<div class="ripple-container"></div></a>
                        </div>

                        <div class="iq-card-body">
                            <p>@include('dashboard.includes.alert')</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Group Type</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">User Admin</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($results->count() > 0)
                                        @foreach ($results as $index => $result)
                                        <tr>
                                            <th scope="row">#{{$index + $results->firstItem()}}</th>
                                            <td><a href="{{  route('group-users.show', $result->id) }}" class="h6 count">{{ $result->name }}</a></td>
                                            <td>
                                                @if($result->group_type == 1)
                                                <span>Paid / {{ $result->amount }}</span>
                                                @else
                                                <span>Free</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if(!empty($result->image))
                                                <img src="{{ url('images/group/'.$result->image) }}" style="max-width: 40px;">
                                                @endif
                                            </td>
                                            <td>
                                                @foreach($result->groupAdmin as $user)
                                                <span class="badge bg-secondary">{{ @$user->userData->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                @if($result->status == 1)
                                                <span class="btn-sm badge badge-primary">Active</span>
                                                @else
                                                <span class="btn-sm badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ((Auth::user()->role_id == 1 || in_array(Auth::user()->meberships_id, [1,2,3])) && $result->group_type == 1)
                                                <a href="{{ route('group-users.show',$result->id) }}" class="btn btn-sm bg-pink"> <span class="badge badge-info">Show Group Member</span></a>
                                                @endif
                                                <a href="{{ route('group-edit',$result->id) }}" class="btn btn-sm bg-blue"> <span class="badge badge-primary">Edit </span></a>
                                                <a href="javascript:void(0)" route="{{ route('group-delete',$result->id) }}" id="{{$result->id}}" text="remove level" class="btn btn-sm btn-border-think btn-transparent c-grey delete"><span class="badge badge-danger">Delete</span></a>
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
    $(document).on('click', '.delete', function() {
        user_id = $(this).attr('id');
        route = $(this).attr('route');
        text = $(this).attr('text');
        text = text.replace("_", " ");

        if (!confirm("Are you sure? Do yo want to delete group.")) {
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