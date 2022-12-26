@extends('dashboard.layouts.master')
@section('title', ' Group Type')
@section('page', ' Group Type')
@section('page-css-link') @endsection
@section('page-css')
@endsection
@section('main-content')
<!-- Right Sidebar Panel End-->
<div class="header-for-bg  bg-white shadow-sm pb-2">
    <div class="background-header position-relative">
        <div class="d-flex justify-content-center">
            @if (isset($group->image) && file_exists('images/group/'.$group->image))
            <img src="{{ url('images/group/'.$group->image) }}" class="img-fluid" alt="header-bg" style="width: 60%; max-height:450px; border-radius: 0 0 15px 15px">
            @endif
        </div>
        <div class="container mt-3 pb-2" style="width: 60%">
            <div class="d-flex justify-content-between align-items-center">
                <h3>{{ $group->name }}</h3>
                <div class="justify-content-end">
                    @if (isset($groupUser))
                        @if ($groupUser->status === 0)
                        <button type="button" class="btn btn-secondary" onclick="cancelRequest({{$group->id}})">Cancel request</button>
                        @elseif ($groupUser->status === 1)
                        <a href="{{ route('get-events', $group->id) }}" type="button" class="btn btn-warning life-event-btn">Life Event</a>
                        <a href="{{ route('get-photos', $group->id) }}" type="button" class="btn btn-primary">Photos</a>
                        <button type="button" class="btn btn-outline-danger" group_id="{{ $group->id }}" route="{{ route('user-leave-group') }}">Leave group</button>
                        @elseif ($groupUser->status === 2)
                        <button type="button" class="btn btn-primary" onclick="joinGroup({{ json_encode($group) }})"><i class="fa fa-user-plus" aria-hidden="true"></i> Join group</button>
                        @endif
                    @else
                    <button type="button" class="btn btn-primary" onclick="joinGroup({{ json_encode($group) }})"><i class="fa fa-user-plus" aria-hidden="true"></i> Join group</button>
                    @endif
                    @if ($group->created_by == Auth::user()->id)
                    <a href="{{ route('group.info', $group->id) }}" type="button" class="btn btn-danger"><i class="fa fa-info" aria-hidden="true"></i>Group info</a>
                    @endif
                </div>
            </div>
        </div>
        @if (isset($groupUser) && $groupUser->status === 0)
        <div class="container alert alert-secondary" role="alert" style="width: 58%; border-color: ghostwhite">
            Your request to join is pending now.
        </div>
        @endif
    </div>
</div>
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container">
        @include('dashboard.includes.alert')
        <div class="row">
            <div class="iq-card w-100">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Members - {{ count($groupUsers) }}</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    @foreach ($groupAdmins as $admin)
                    @if (isset($admin->userData->userInfo->profile_image))
                    <img class="img-fluid avatar-40 rounded-circle" src="{{ url('images/profile/',$admin->userData->userInfo->profile_image) }}">
                    @else
                    <img class="img-fluid avatar-40 rounded-circle" src="{{url('assets/dashboard/img/default-avatar.png')}}">
                    @endif
                    @endforeach
                    @if (count($groupAdmins) > 1)
                    <p>{{ $groupAdmins[0]->userData->name }} and {{ count($groupAdmins) - 1}} other members are admins</p>
                    @else
                    <p>{{ $groupAdmins[0]->userData->name }} is admin</p>
                    @endif
                </div>
            </div>
            <div class="iq-card w-100">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Group rules from admin</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    {{ $group->terms_and_condition }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('page-js-link') @endsection
@section('page-js')
<script type="text/javascript">
    function cancelRequest(groupId) {
        $.get(`/user/group-detail-leave/${groupId}`, (resp) => {
            if (resp === "ok")
                location.reload();
        });
    }

    function joinGroup(group) {
        if (group.group_type === 0) {
            $.get(`/user/group-detail-join/${group.id}`, (resp) => {
                if (resp === "ok")
                    location.reload();
            });
        }
    }
</script>
@endsection