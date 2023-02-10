@php
$groups = App\Models\Groupmaster::all();
@endphp
<ul id="iq-sidebar-toggle" class="iq-menu">
    <li>
        <a href="{{ Route('user.index') }}" class=" "><i class="las la-user-friends"></i><span>Users</span></a>
    </li>
    <li>
        <a href="{{ route('newsfeed') }}" class=" "><i class="las la-newspaper"></i><span>Newsfeed</span></a>
    </li>
    <!--<li>
        <a href="{{ route('globalnewsfeed') }}" class=" "><i class="las la-user-friends"></i><span>Global News feed</span></a>
    </li>-->
    <li>
        <a href="{{ Route('chat') }}" class=" "><i class="las la-users"></i><span>Chat</span></a>
    </li>
    <li>
        <a href="{{ route('friendlist') }}" class=" "><i class="las la-user-friends"></i><span>Friends List & Search</span></a>
    </li>
    <li>
        <a href="{{ route('blockfriends') }}" class=" "><i class="las la-anchor"></i><span>Block Friends</span></a>
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
			<a href="{{ route('groups') }}" class=" " style="font-weight: bold;"><i class="las la-users"></i><span>See All Groups</span></a>
		</div>
    </li>
    <li>
        <a href="{{ route('store-index-admin') }}" class=" "><i class="las la-store"></i><span>Store</span></a>
    </li>
    <li>
        <a href="{{ route('polls') }}" class=" "><i class="lab la-wpforms"></i><span>Polls</span></a>
    </li>
    <li>
        <a href="{{ route('shopping-cart') }}" class=" "><i class="las la-bell"></i><span>Shopping Cart</span></a>
    </li>

</ul>