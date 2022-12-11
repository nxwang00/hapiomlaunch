<div class="right-sidebar-mini right-sidebar">
    <div class="right-sidebar-panel p-0">
       <div class="iq-card shadow-none">
          <div class="iq-card-body p-0">
             <div class="media-height p-3" data-scrollbar="init">
             	@foreach(Auth::user()->getUser() as $userValue)
                <div class="media align-items-center mb-4">
                   <div class="iq-profile-avatar status-online">
                      <img class="rounded-circle avatar-50" src="{{ url('assets/dashboard/images/user/01.jpg') }}" alt="">
                   </div>
                   <div class="media-body ml-3">
                      <h6 class="mb-0"><a href="{{ route('messages.chat', [ 'ids' => encrypt(auth()->user()->id  . '-' . $userValue->friend_id) ]) }}">{{ ucwords($userValue->friendUser->name) }}</a></h6>
                      <p class="mb-0">Admin</p>
                   </div>
                </div>
				@endforeach
             </div>
             <div class="right-sidebar-toggle bg-primary mt-3">
                <i class="ri-arrow-left-line side-left-icon"></i>
                <i class="ri-arrow-right-line side-right-icon"><span class="ml-3 d-inline-block">Close Menu</span></i>
             </div>
          </div>
       </div>
    </div>
 </div>