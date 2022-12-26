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
                        <h4 class="card-title">Life Events</h4>
                    </div>
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#createEventModal" class="btn-sm btn-primary btn-md-2 float-right">Add Event<div class="ripple-container"></div></a>
                </div>

                <div class="iq-card-body">
                    <p>@include('dashboard.includes.alert')</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Group</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($events->count() > 0)
                                @foreach ($events as $index => $event)
                                <tr>
                                    <th scope="row">#{{$index + 1}}</th>
                                    <td>{{ $event->ename }}</td>
                                    <td>
                                        @if(!empty($event->image))
                                        <img src="{{ url('images/event/'.$event->image) }}" style="max-width: 40px;" alt="{{ $event->image }}">
                                        @else
                                        <img src="{{ url('assets/dashboard/img/default-avatar.png') }}" alt="profile-img" class="rounded-circle avatar-40">
                                        @endif
                                    </td>
                                    @php
                                    $eventGroup = App\Models\Groupmaster::findOrFail($event->group_id);
                                    @endphp
                                    <td>{{ $eventGroup->name }}</td>
                                    <td>
                                        @php
                                        $truncated = (strlen($event->description) > 15) ? substr($event->description, 0, 15) . '...' : $event->description;
                                        @endphp
                                        {{ $truncated }}
                                    </td>
                                    <td>{{ date_format(date_create($event->start_date), 'Y-m-d') }}</td>
                                    <td>{{ date_format(date_create($event->end_date), 'Y-m-d') }}</td>
                                    <td>{{ $event->location }}</td>
                                    <td>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#editEventModal{{ $event->id }}" onclick="setId({{ $event->id }})">
                                            <span class="badge badge-primary">Edit</span>
                                        </a>
                                        <span class="badge badge-danger"><a href="javascript:void(0)" route="{{ route('delete-event') }}" event_id="{{ $event->id }}" class="event-delete">Delete</span>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editEventModal{{ $event->id }}" tabindex="-1" aria-labelledby="editEventModalModalLabel{{ $event->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editEventModalModalLabel{{ $event->id }}">Edit Event</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('edit-event') }}" method="POST" id="edit-event-{{ $event->id }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label for="event_name_{{ $event->id }}">Name:</label>
                                                                <input type="text" class="form-control" name="event_name" id="event_name_{{ $event->id }}" value="{{ $event->ename }}" required>
                                                                <input type="hidden" class="form-control" name="event_id" value="{{ $event->id }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label for="event_group_{{ $event->id }}">Group:</label>
                                                                <select class="select2 form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" name="event_group" id="event_group_{{ $event->id }}" required>
                                                                    @foreach($groups as $group)
                                                                    <option value="{{$group->id}}">{{ $group->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label for="event_name">Image:</label>
                                                                <div class="custom-file" style="z-index: 0;">
                                                                    <input type="file" class="custom-file-input" id="event_image_{{ $event->id }}" name="event_image" img_url="{{ $event->image }}">
                                                                    <label class="group-image-label custom-file-label form-control" for="event_image_{{ $event->id }}" style="line-height: 30px !important;"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @php
                                                        $hoster = App\Models\User::findOrFail($event->hoster_id);
                                                        @endphp
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label for="event_hoster_{{ $event->id }}">Hoster:</label>
                                                                <select class="select2 form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" id="event_hoster_{{ $event->id }}" name="event_hoster" hoster_id="{{ $event->hoster_id }}" hoster_name="{{ $hoster->name }}" required>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text-{{ $event->id }}" class="col-form-label">Description:</label>
                                                        <textarea class="form-control" name="event_description" id="message-text-{{ $event->id }}">{{ $event->description }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="event_name">Date:</label>
                                                        <div class="d-flex justify-content-between">
                                                            <input type="datetime-local" class="form-control" name="start_date" style="width: 48%" value="{{ $event->start_date }}" required>
                                                            <input type="datetime-local" class="form-control" name="end_date" style="width: 48%" value="{{ $event->end_date }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="event_location_{{ $event->id }}">Location:</label>
                                                        <input type="text" class="form-control" id="event_location_{{ $event->id }}" name="event_location" value="{{ $event->location }}">
                                                    </div>
                                                    <div class="text-right">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" onclick="submitEditForm({{ $event->id }})">Save</button>
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

<div class="modal fade" id="createEventModal" tabindex="-1" aria-labelledby="createEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createEventModalLabel">Create Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('create-event') }}" method="POST" id="create-event" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="event_name">Name:</label>
                                <input type="text" class="form-control" id="event_name" name="event_name" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="event_group">Group:</label>
                                <select class="select2 form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" id="event_group" name="event_group" required>
                                    @foreach($groups as $group)
                                    <option value="{{$group->id}}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="event_name">Image:</label>
                                <div class="custom-file" style="z-index: 0;">
                                    <input type="file" class="custom-file-input" id="event_image" name="event_image" required>
                                    <label class="group-image-label custom-file-label form-control" for="event_image" style="line-height: 30px !important;"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="event_hoster">Hoster:</label>
                                <select class="select2 form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" id="event_hoster" name="event_hoster" required>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Description:</label>
                        <textarea class="form-control" id="event_description" name="event_description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="event_name">Date:</label>
                        <div class="d-flex justify-content-between">
                            <input type="datetime-local" class="form-control" name="start_date" style="width: 48%" required>
                            <input type="datetime-local" class="form-control" name="end_date" style="width: 48%">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="event_location">Location:</label>
                        <input type="text" class="form-control" id="event_location" name="event_location">
                    </div>
                    <div class="text-right">
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
    let eventId = null;

    function setId(id) {
        eventId = id;
        let hosterId = $('#event_hoster_' + eventId).attr('hoster_id');
        $('#event_hoster_' + eventId).select2({
            dropdownParent: $('#editEventModal' + eventId),
            ajax: {
                url: function() {
                    return getEventHosterPath(eventId);
                },
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
        let fileName = $("#event_image_" + eventId).attr('img_url');
        $("#event_image_" + eventId).siblings(".group-image-label").addClass("selected").html($.trim(fileName.substr(0, 42)));
        $("#event_image_" + eventId).on("change", function() {
            fileName = $(this).val().split("\\").pop();
            $(this).siblings(".group-image-label").addClass("selected").html(fileName);
        });
        ajaxRequest(eventId, hosterId);
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
        $('#event_hoster').select2({
            dropdownParent: $('#createEventModal'),
            ajax: {
                url: function() {
                    return getEventHosterPath(null);
                },
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
        $('#event_group').select2({
            dropdownParent: $('#createEventModal'),
        });

        $("#event_image").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".group-image-label").addClass("selected").html(fileName);
        });

        $("#photo_image").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".photo-image-label").addClass("selected").html(fileName);
        });

        $('#photo_group').select2({
            dropdownParent: $('#createPhotoModal'),
        });
    })

    function getEventHosterPath(id) {
        let selectedGroupId;
        if (!id) {
            selectedGroupId = $("#event_group").val();
        } else {
            selectedGroupId = $("#event_group_" + id).val();
        }
        let pathForEvent = `/user-group/members/${selectedGroupId}`;
        return pathForEvent;
    }

    $('#create-event').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: "{{ route('create-event') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
                if (response) {
                    this.reset();
                    $("#createEventModal").modal('hide');
                    toastr.success(response.text);
                    location.reload();
                }
            },
            error: function(response) {
                toastr.error(response.responseJSON.message);
            }
        });
    });

    function submitEditForm(eventId) {
        $('#edit-event-' + eventId).submit();
        $('#edit-event-' + eventId).submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('edit-event') }}",
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
                        $("#editEventModal" + eventId).modal('hide');
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

    function ajaxRequest(eventId, hosterId) {
        let newData = [];
        $.ajax({
            type: 'GET',
            url: getEventHosterPath(eventId),
            dataType: 'json',
            delay: 250,
            success: (data) => {

                if (data) {
                    data.forEach(item => {
                        if (hosterId == item.id) {
                            newData.push({
                                id: item.id,
                                text: item.name,
                                selected: true
                            });
                        } else {
                            newData.push({
                                id: item.id,
                                text: item.name
                            });
                        }
                    })

                    $('#event_hoster_' + eventId).select2({
                        data: newData
                    });
                }
            }
        });
    }

    $('.event-delete').on('click', function() {
        eventId = $(this).attr('event_id');
        route = $(this).attr('route');

        if (!confirm("Are you sure? Do yo want to delete event.")) {
            return false;
        }
        $.ajax({
            url: route,
            method: "GET",
            data: {
                "_token": "{{ csrf_token() }}",
                'eventId': eventId
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