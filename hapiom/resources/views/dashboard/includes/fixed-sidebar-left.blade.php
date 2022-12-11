<div class="iq-sidebar">
    <div id="sidebar-scrollbar">
       <nav class="iq-sidebar-menu">
            @if(Auth::user()->role_id == 1)
                @include('dashboard.includes.menu.admin-menu')
            @elseif(Auth::user()->role_id == 2)
                @include('dashboard.includes.menu.user-admin-menu')
            @else
                @include('dashboard.includes.menu.user-menu')
		    @endif
       </nav>
       <div class="p-3"></div>
    </div>
 </div>