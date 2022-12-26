@extends('dashboard.layouts.master')
@section('title', 'Group Detail')
@section('page', 'Group Detail')
@section('page-css-link') @endsection
@section('page-css')
<style>
  .check-icon {
    font-size: 10px;
    margin-left: 10px;
    margin-right: 5px
  }
  .visible {
    border: 2px solid #ededed;
    border-radius: 5px;
    padding: 2px 0px 2px 8px
  }
</style>
@endsection
@section('main-content')
<div id="content-page" class="content-page">
	<div class="container">
		<div class="iq-card">
			<div class="iq-card-header d-flex justify-content-between">
				<div class="iq-header-title">
					<h4 class="card-title">Incoming Join Request</h4>
				</div>
			</div>
      <div class="iq-card-body">
        <ul class="request-list m-0 p-0">
          @foreach($groupUsers as $groupUser)
            <li class="d-flex align-items-center">
              <div class="user-img img-fluid">
                @if(isset($groupUser->groupUserName->userInfo->profile_image) && file_exists('images/profile/'. $groupUser->groupUserName->userInfo->profile_image))
                  <img src="{{ url('images/profile/',$groupUser->groupUserName->userInfo->profile_image) }}" alt="story-img" class="rounded-circle avatar-40">
				      	@else
									<img src="{{ url('assets/dashboard/img/default-avatar.png') }}" alt="profile-img" class="rounded-circle avatar-40" />
								@endif
              </div>
              <div class="media-support-info ml-3">
                <h6><a href="{{ route('user-profile',encrypt($groupUser->groupUserName->id)) }}">{{ ucwords($groupUser->groupUserName->name) }}</a></h6>
              </div>
							<div class="d-flex align-items-center">
								<a href="{{ route('group-action',['id' => $groupUser->group_id,'user_id' => $groupUser->user_id, 'status' =>1 ]) }}" class="mr-3 btn btn-primary rounded"><i class="fa fa-check" aria-hidden="true"></i>Approve</a>
								<a href="{{ route('group-action',['id' => $groupUser->group_id,'user_id' => $groupUser->user_id, 'status' =>2]) }}" class="mr-3 btn btn-secondary rounded">Reject</a>
							</div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="iq-card">
			<div class="iq-card-header d-flex justify-content-between">
				<div class="iq-header-title">
					<h4 class="card-title">Incoming Events Request</h4>
				</div>
			</div>
      <div class="iq-card-body">
        <ul class="request-list m-0 p-0">
          @foreach($groupEvents as $groupEvent)
            <li class="d-flex align-items-center">
              <div class="user-img img-fluid">
                @if(isset($groupEvent->image) && file_exists('images/event/'. $groupEvent->image))
                  <img src="{{ url('images/event/', $groupEvent->image) }}" class="rounded" alt="event image" style="object-fit:cover" width="200" height="150">
								@endif
              </div>
              <div class="media-support-info ml-3">
                <h4><a href="">{{ ucwords($groupEvent->ename) }}</a></h4>
                @if (strlen($groupEvent->description) > 140)
                  <div>
                    <span id="long_description_{{$groupEvent->id}}">{{substr($groupEvent->description, 0, 140).'...'}}</span>
                    <i class="fas fa-angle-double-right text-primary ml-4" style="cursor:pointer" onclick="expandDescription(this, {{ $groupEvent }})" id="expand_description"></i>
                    <i class="fas fa-angle-double-left text-primary ml-4" style="cursor:pointer; display: none" onclick="reduceDescription(this, {{ $groupEvent }})" id="reduce_description"></i>
                  </div>
                @else
                  <div>{{$groupEvent->description}}</div>
                @endif

                <div><i class="fas fa-user check-icon" style="font-size:12px;"></i>created by
                  <span class="font-weight-bolder">{{ $groupEvent->creater->name }}</span>
                </div>
                <div><i class="fas fa-user-tie check-icon" style="font-size:12px;"></i>hosted by
                  <span class="font-weight-bolder">{{ $groupEvent->hoster->name }}</span>
                </div>
                <div><i class="far fa-calendar-alt check-icon" style="font-size:12px;"></i>
                  {{ $groupEvent->start_date }}
                  @if (isset($groupEvent->end_date))
                    - {{ $groupEvent->end_date }}
                  @endif
                </div>
              </div>
							<div class="ml-3">
                <div class="visible">
                  <h6>Visibility</h6>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="visible_{{$groupEvent->id}}" value="0" @if ($groupEvent->visible === 0) checked @endif data-id="{{$groupEvent->id}}">Public
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="visible_{{$groupEvent->id}}" value="1" @if ($groupEvent->visible === 1) checked @endif data-id="{{$groupEvent->id}}">Group
                    </label>
                  </div>
                </div>
                <div class="mt-2">
								  <a href='javascript:appoveEvent("{{$groupEvent->id}}")' class="btn btn-primary rounded">Approve</a><br />
								  <a href='javascript:rejectEvent("{{$groupEvent->id}}")' class="mt-1 btn btn-secondary rounded" style="padding-left: 20px; padding-right: 19px;">Reject</a>
                </div>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
	</div>
</div>
@endsection
@section('page-js-link') @endsection
@section('page-js')
<script>
  function expandDescription(ele, groupEvent) {
    $(ele).css('display', 'none');
    $(ele).next().css('display', 'inline');
    $("#long_description_"+groupEvent.id).html(groupEvent.description);
  }

  function reduceDescription(ele, groupEvent) {
    $(ele).css('display', 'none');
    $(ele).prev().css('display', 'inline');
    $("#long_description_"+groupEvent.id).html(groupEvent.description.substring(0, 140)+"...");
  }

  function appoveEvent(eventId) {
    $.get(`/event/approve/${eventId}`, function(resp) {
      if (resp === "ok") {
        location.reload()
      }
    })
  }

  function rejectEvent(eventId) {
    $.get(`/event/reject/${eventId}`, function(resp) {
      if (resp === "ok") {
        location.reload()
      }
    })
  }

  $(document).ready(function() {
    $("input[type=radio]").on('change', function() {
      var eventId = $(this).data('id');
      var visibility = $(`input[name=visible_${eventId}]:checked`).val();
      var data = {
        eventId,
        visibility,
        "_token": "{{ csrf_token() }}",
      }
      var url = "{{route('visible-event')}}";
      $.post(url, data, function(resp) {
        if (resp) {
          if (visibility === "0") {
            toastr.success('This event will show to everyone.')
          } else {
            toastr.success('This event will show only to group members.')
          }
        } else {
          toastr.error('Something wrong happend.')
        }
      })
    })
  })
</script>
@endsection