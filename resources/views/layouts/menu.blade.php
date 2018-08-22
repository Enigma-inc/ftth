<li class="{{ Request::is('ftthLocations*') ? 'active' : '' }}">
    <a href="{!! route('ftthLocations.index') !!}"><i class="fa fa-edit"></i><span>Ftth Locations</span></a>
</li>


<li class="{{ Request::is('locations*') ? 'active' : '' }}">
    <a href="{!! route('locations.index') !!}"><i class="fa fa-edit"></i><span>Locations</span></a>
</li>

<li class="{{ Request::is('packagesLookups*') ? 'active' : '' }}">
    <a href="{!! route('packagesLookups.index') !!}"><i class="fa fa-edit"></i><span>Packages</span></a>
</li>
<li class="{{ Request::is('ftthApplications*') ? 'active' : '' }}">
    <a href="{!! route('ftthApplications.index') !!}"><i class="fa fa-edit"></i><span>Ftth Applications</span></a>
</li>

