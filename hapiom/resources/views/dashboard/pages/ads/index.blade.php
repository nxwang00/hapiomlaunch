@extends('dashboard.layouts.master')
@section('title', ' Ads')
@section('page', ' Ads')
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
                                <h4 class="card-title">Ads List</h4>
                            </div>
                            <a href="{{ route('ads.create') }}" class="btn-sm btn-primary btn-md-2 float-right">Add<div class="ripple-container"></div></a>
                        </div>

                        <div class="iq-card-body">
                            <p>@include('dashboard.includes.alert')</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Direction</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Target placement</th>
                                            <th scope="col">Created Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($results['results']->count() > 0)
                                        @foreach ($results['results'] as $index => $result)
                                        <tr>
                                            <th scope="row">#{{$index + $results['results']->firstItem()}}</th>
                                            <td>{{ $result->title }}</td>
                                            @if ($result->direction == '1')
                                            <td>Horizantal</td>
                                            @else
                                            <td>Vertical</td>
                                            @endif
                                            <td>
                                                @if(!empty($result->image))
                                                <img src="{{ url('images/ads/'.$result->image) }}" style="max-width: 40px;" alt="{{ $result->image }}">
                                                @endif
                                            </td>
                                            <td>
                                                @if($result->status == 1)
                                                <span class="btn-sm badge badge-primary">Active</span>
                                                @else
                                                <span class="btn-sm badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            @foreach($groups as $group)
                                            @if($group->id == $result->group_id)
                                            <td>{{ $group->name }}</td>
                                            @else
                                            <td>Main feed</td>
                                            @endif
                                            @endforeach
                                            <td>{{ $result->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <a href="{{ route('ads.edit',$result->id) }}" class="btn btn-sm bg-blue"> <span class="badge badge-primary">Edit </span></a>
                                                <a href="javascript:void(0)" route="{{ route('ads.destroy',$result->id) }}" id="{{$result->id}}" text="remove level" class="btn btn-sm btn-border-think btn-transparent c-grey delete"><span class="badge badge-danger">Delete</span></a>
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

        if (!confirm("Are you sure? Do yo want to delete ads.")) {
            return false;
        }
        $.ajax({
            url: route,
            method: "DELETE",
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