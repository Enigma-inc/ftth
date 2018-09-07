<li >
    <a href="/admin"><i class="fa fa-tachometer"></i><span>Dashboard</span></a>
</li>

<li class="{{ Request::is('locations*') ? 'active' : '' }}">
    <a href="{!! route('locations.index') !!}"><i class="fa fa-map"></i><span>Locations</span></a>
</li>

<li class="{{ Request::is('ftthLocations*') ? 'active' : '' }}">
    <a href="{!! route('ftthLocations.index') !!}"><i class="fa fa-map-marker"></i><span>Ftth Locations</span></a>
</li>



<li class="{{ Request::is('packagesLookups*') ? 'active' : '' }}">
    <a href="{!! route('packagesLookups.index') !!}"><i class="fa fa-cube"></i><span>Packages</span></a>
</li>
<li class="{{ Request::is('ftthApplications*') ? 'active' : '' }}">
    <a href="{!! route('ftthApplications.index') !!}"><i class="fa fa-wpforms"></i><span>Applications</span></a>
</li>


@if(Auth::user()->is_admin)
    <li class="{{ Request::is('users*') ? 'active' : '' }}">
        <a href="{!! route('users.index') !!}"><i class="fa fa-users"></i><span>Users</span></a>
    </li>
 @endif

