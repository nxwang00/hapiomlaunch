@extends('dashboard.layouts.master')
@section('title', 'Event List')
@section('page', 'Event List')
@section('page-css-link') @endsection
@section('page-css')
<style>
    .custom-file-label::after {
        height: 3em;
        line-height: 2.0
    }

    /* select2 style */
    .select2-container .select2-selection--single {
        height: 43px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 40px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 5px;
    }

    .select2-container--default .select2-selection--single {
        background-color: #fff;
        border: 1px solid #edebeb;
        border-radius: 8px;
    }
</style>
@endsection
@section('main-content')
<!-- Right Sidebar Panel End-->
<div class="header-for-bg  bg-white shadow-sm pb-2">
    <div class="background-header position-relative">
        <div class="d-flex justify-content-center">
            @if (isset($group->image))
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
        <div class="row">
            <div class="iq-card w-100">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Photos</h4>
                    </div>
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#createPhotoModal" class="btn-sm btn-primary btn-md-2 float-right">Add Photo<div class="ripple-container"></div></a>
                </div>

                <div class="iq-card-body">
                    <p>@include('dashboard.includes.alert')</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Group</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($photos->count() > 0)
                                @foreach ($photos as $index => $photo)
                                <tr>
                                    <th scope="row">#{{$index + 1}}</th>
                                    <td>
                                        @if(!empty($photo->image))
                                        <img src="{{ url('images/photo/'.$photo->image) }}" style="max-width: 40px;" alt="{{ $photo->image }}">
                                        @else
                                        <img src="{{ url('assets/dashboard/img/default-avatar.png') }}" alt="profile-img" class="rounded-circle avatar-40">
                                        @endif
                                    </td>
                                    @php
                                    $photoGroup = App\Models\Groupmaster::findOrFail($photo->group_id);
                                    @endphp
                                    <td>{{ $photoGroup->name }}</td>
                                    <td>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#editPhotoModal{{ $photo->id }}" onclick="setId({{ $photo->id }})">
                                            <span class="badge badge-primary">Edit</span>
                                        </a>
                                        <span class="badge badge-danger"><a href="javascript:void(0)" route="{{ route('delete-photo') }}" photo_id="{{ $photo->id }}" class="photo-delete">Delete</span>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editPhotoModal{{ $photo->id }}" tabindex="-1" aria-labelledby="editPhotoModalLabel{{ $photo->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editPhotoModalLabel{{ $photo->id }}">Edit Photo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('edit-photo') }}" method="POST" id="edit-photo-{{ $photo->id }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="photo_group">Group:</label>
                                                        <select class="select2 form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" id="photo_group_{{ $photo->id }}" name="photo_group" required>
                                                            @foreach($groups as $group)
                                                            <option value="{{$group->id}}">{{ $group->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="photo_image">Image:</label>
                                                        <div class="custom-file" style="z-index: 0;">
                                                            <input type="file" class="custom-file-input" id="photo_image_{{ $photo->id }}" name="photo_image" img_url="{{ $photo->image }}">
                                                            <label class="photo-image-label custom-file-label form-control" for="photo_image_{{ $photo->id }}" style="line-height: 30px !important;"></label>
                                                            <input type="hidden" class="form-control" name="photo_id" value="{{ $photo->id }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-4">
                                                        <label for="photo_image">Visible:</label><br />
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="photo_visible" id="photo_visible1_{{ $photo->id }}" value="0" @if($photo->visible == 0) {{ 'checked=""' }} @endif >
                                                            <label class="form-check-label" for="photo_visible1_{{ $photo->id }}">Public</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="photo_visible" id="photo_visible2_{{ $photo->id }}" @if($photo->visible == 1) {{ 'checked=""' }} @endif value="1">
                                                            <label class="form-check-label" for="photo_visible2_{{ $photo->id }}">Group</label>
                                                        </div>
                                                    </div>
                                                    <div class="text-right mt-3">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" onclick="submitEditForm({{ $photo->id }})">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

<div class="modal fade" id="createPhotoModal" tabindex="-1" aria-labelledby="createPhotoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('create-photo') }}" method="POST" id="create-photo" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="photo_group">Group:</label>
                        <select class="select2 form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" id="photo_group" name="photo_group" required>
                            @foreach($groups as $group)
                            <option value="{{$group->id}}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="photo_image">Image:</label>
                        <div class="custom-file" style="z-index: 0;">
                            <input type="file" class="custom-file-input" id="photo_image" name="photo_image" required>
                            <label class="photo-image-label custom-file-label form-control" for="photo_image" style="line-height: 30px !important;"></label>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <label for="photo_image">Visible:</label><br />
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="photo_visible" id="photo_visible1" value="0" checked>
                            <label class="form-check-label" for="photo_visible1">Public</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="photo_visible" id="photo_visible2" value="1">
                            <label class="form-check-label" for="photo_visible2">Group</label>
                        </div>
                    </div>
                    <div class="text-right mt-3">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-js-link') @endsection
@section('page-js')
<script type="text/javascript">
    let photoId = null;

    function setId(id) {
        photoId = id;
        let fileName = $("#photo_image_" + photoId).attr('img_url');
        $("#photo_image_" + photoId).siblings(".photo-image-label").addClass("selected").html($.trim(fileName));
        $("#photo_image_" + eventId).on("change", function() {
            fileName = $(this).val().split("\\").pop();
            $(this).siblings(".photo-image-label").addClass("selected").html(fileName);
        });
        $("#photo_image_" + eventId).val(fileName);
        // ajaxRequest(photoId, hosterId);
    }

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

    $(document).ready(function() {
        $('#photo_group').select2({
            dropdownParent: $('#createPhotoModal'),
        });

        $("#photo_image").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".photo-image-label").addClass("selected").html(fileName);
        });
    })

    $('#create-photo').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: "{{ route('create-photo') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
                if (response) {
                    this.reset();
                    $("#createPhotoModal").modal('hide');
                    location.reload();
                    toastr.success(response.text);
                }
            },
            error: function(response) {
                toastr.error(response.responseJSON.message);
            }
        });
    });

    function submitEditForm(photoId) {
        $('#edit-photo-' + photoId).submit();
        $('#edit-photo-' + photoId).submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('edit-photo') }}",
                contentType: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                beforeSend: function() {

                },
                success: (response) => {
                    if (response) {
                        this.reset();
                        $("#editPhotoModal" + photoId).modal('hide');
                        location.reload();
                        toastr.success(response.text);
                    }
                },
                error: function(response) {
                    toastr.error(response.responseJSON.message);
                }
            });
        });
    }

    $('.photo-delete').on('click', function() {
        photoId = $(this).attr('photo_id');
        route = $(this).attr('route');

        if (!confirm("Are you sure? Do yo want to delete photo.")) {
            return false;
        }
        $.ajax({
            url: route,
            method: "GET",
            data: {
                "_token": "{{ csrf_token() }}",
                'photoId': photoId
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