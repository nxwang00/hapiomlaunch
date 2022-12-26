@php
$groups = App\Models\Groupmaster::all();
@endphp
<ul id="iq-sidebar-toggle" class="iq-menu">
	<li>
		<a href="{{ route('user.index') }}" class=" "><i class="las la-user-friends"></i><span>Users</span></a>
	</li>
	<li>
		<a href="{{ route('mebership') }}" class=" "><i class="las la-user"></i><span>Membership Master</span></a>
	</li>
	<li>
		<a href="{{ route('store-master') }} " class=" "><i class="las la-store"></i><span>Store Master</span></a>
	</li>
	<li>
		<a href="#" class="dropdown-group-btn d-flex justify-content-between">
			<div><i class="las la-users"></i><span>Groups</span></div><i class="las la-plus"></i>
		</a>
		<div class="dropdown-container">
			@foreach($groups as $key =>$group)
			@if($key > 4)
				@break;
			@endif
			<a href="{{ route('group-users.show', $group->id)}}">
				@if(isset($group->image))
				<img src="{{ url('images/group/'.$group->image) }}" alt="profile-img" class="rounded-circle img-fluid avatar-20">
				@else
				<img src="{{ url('assets/dashboard/images/page-img/gi-1.jpg') }}" alt="profile-img" class="rounded-circle img-fluid avatar-20">
				@endif
				{{ $group->name }}
			</a>
			@endforeach
			<a href="{{ route('group') }}" class=" " style="font-weight: bold;"><i class="las la-users"></i><span>See All Groups</span></a>
		</div>
	</li>
	<li>
		<a href="{{ route('ads.index') }}" class=" "><i class="las la-image"></i><span>Ads</span></a>
	</li>
	<li>
		<a href="{{ route('admin-settings') }}" class=" "><i class="las la-cog"></i><span>Settings</span></a>
	</li>
</ul>