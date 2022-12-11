@extends('dashboard.layouts.master')
@section('title', ' Group Member')
@section('page', ' Group Member')
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
                                <h4 class="card-title">Group Member</h4>
                            </div>
                            <a href="{{ route('group') }}" class="btn btn-primary btn-md-2 float-right">Back<div class="ripple-container"></div></a>
                        </div>

                        <div class="iq-card-body">
                            <p>@include('dashboard.includes.alert')</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Group Name</th>
                                            <th scope="col">Iamge</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($results->count() > 0)
                                        @foreach ($results as $index => $result)
                                        @php
                                        $groupUser = App\Models\User::where('id', $result->user_id)->first();
                                        $group = App\Models\Groupmaster::findOrFail($result->group_id);
                                        $number = $index + 1;
                                        @endphp
                                        <tr>
                                            <th scope="row">#{{ $number }}</th>
                                            <td>{{ $groupUser->name }}</td>
                                            <td>{{ $group->name }}</td>
                                            <td>
                                                @if(!empty($group->image))
                                                <img src="{{ url('images/group/'.$group->image) }}" style="max-width: 40px;">
                                                @endif
                                            </td>
                                            <td>
                                                @if($result->status == 1)
                                                <span class="btn-sm badge badge-primary">Active</span>
                                                @else
                                                <span class="btn-sm badge badge-danger">Inactive</span>
                                                @endif
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