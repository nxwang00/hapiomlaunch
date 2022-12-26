@extends('dashboard.layouts.master')
@section('title', ' Personal Information')
@section('page', ' Personal Information')
@section('page-css-link') @endsection
@section('page-css') @endsection
@section('main-content')

 <div id="content-page" class="content-page">
    <div class="container">
       <div class="row">
          <div class="col-sm-12">
            @if (isset($recentNotification))
            <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">My Recent Notification</h4>
                  </div>
               </div>
               <div class="iq-card-body">
                  <ul class="request-list list-inline m-0 p-0">
                     <li class="align-items-center d-flex justify-content-between">
                        <div style="max-width: 80%">
                           <div class="user-img img-fluid d-flex">
                              <h6 class="mr-2">By</h6>
                              @if(isset($recentNotification->senderInfo->profile_image) && file_exists('images/profile/'.$recentNotification->senderInfo->profile_image))
                                 <img src="{{ url('images/profile/'.$recentNotification->senderInfo->profile_image) }}" alt="story-img" class="rounded-circle avatar-20">
                              @else
                                 <img src="{{ url('assets/dashboard/img/default-avatar-1.png') }}" alt="profile-img" class="rounded-circle avatar-20" />
                              @endif
                              <h6 class="ml-1"> {{ $recentNotification->sender->name }}</h6>
                              <small class="font-size-14 ml-4 text-info">{{ substr($recentNotification->created_at, 5, 11) }}</small>
                           </div>
                           <div class="media-support-info mt-2 font-size-18 text-dark" style="line-height: 25px">
                              {{ $recentNotification->content }}
                           </div>
                        </div>
                        <div style="max-width: 20%">
                           <!-- <button class="btn" style="background-color:transparent">
                              <i class="ri-eye-line text-primary" style="font-size: 20px"></i>
                           </button> -->
                           <a href="{{ route('notification-delete', ['id'=>$recentNotification->id]) }}" class="btn mr-2" style="background-color:transparent" >
                              <i class="ri-delete-bin-line text-danger" style="font-size: 20px"></i>
                           </a>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
            @endif
            <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">My Notifications</h4>
                  </div>
               </div>
               <div class="iq-card-body" style="max-height:500px; overflow-y: auto;">
                  <ul class="request-list list-inline m-0 p-0">
                     @foreach( $notifications as $notification )
                     <li class="align-items-center d-flex justify-content-between">
                        <div style="max-width: 80%">
                           <div class="user-img img-fluid d-flex">
                              <h6 class="mr-2">By</h6>
                              @if(isset($notification->senderInfo->profile_image) && file_exists('images/profile/'.$notification->senderInfo->profile_image))
                                 <img src="{{ url('images/profile/'.$notification->senderInfo->profile_image) }}" alt="story-img" class="rounded-circle avatar-20">
                              @else
                                 <img src="{{ url('assets/dashboard/img/default-avatar-1.png') }}" alt="profile-img" class="rounded-circle avatar-20" />
                              @endif
                              <h6 class="ml-1"> {{ $notification->sender->name }}</h6>
                              <small class="font-size-14 ml-4 text-info">{{ substr($notification->created_at, 5, 11) }}</small>
                           </div>
                           <div class="media-support-info mt-2 font-size-18 text-dark" style="line-height: 25px">
                              {{ $notification->content }}
                           </div>
                        </div>
                        <div style="max-width: 20%">
                           <!-- <button class="btn" style="background-color:transparent">
                              <i class="ri-eye-line text-primary" style="font-size: 20px"></i>
                           </button> -->
                           <a href="{{ route('notification-delete', ['id'=>$notification->id]) }}" class="btn mr-2" style="background-color:transparent">
                              <i class="ri-delete-bin-line text-danger" style="font-size: 20px"></i>
                           </a>
                        </div>
                     </li>
                     @endforeach
                  </ul>
               </div>
            </div>
          </div>
       </div>
    </div>
 </div>

@endsection
@section('page-js-link') @endsection
@section('page-js')
@endsection