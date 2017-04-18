<ul class="nav nav-tabs">
    <li class="active"><a href="{{url('users/edit-photos')}}" class="{{ Request::is('users/edit-photos') ? 'active-grey' : '' }}">Photos</a></li>
    <li class="active"><a href="{{url('users/edit-profile')}}" class="{{ Request::is('users/edit-profile') ? 'active-grey' : '' }}">Profile</a></li>
    <li class="active"><a href="{{url('users/edit-match')}}" class="{{ Request::is('users/edit-match') ? 'active-grey' : '' }}">Match</a></li>
    <li class="active"><a href="{{url('users/edit-interest')}}" class="{{ Request::is('users/edit-interest') ? 'active-grey' : '' }}">Interest</a></li>
    <li class="active"><a href="{{url('users/edit-personality')}}" class="{{ Request::is('users/edit-personality') ? 'active-grey' : '' }}">Personality</a></li>
    <li class="active"><a href="{{url('users/edit-tags')}}" class="{{ Request::is('users/edit-tags') ? 'active-grey' : '' }}">Cupid Tags</a></li>
    <li class="active"><a href="{{url('users/verify-profile')}}" class="{{ Request::is('users/verify-profile') ? 'active-grey' : '' }}">Verify Profile</a></li>
    <li class="active"><a href="{{url('users/imbra')}}" class="{{ Request::is('users/imbra') ? 'active-grey' : '' }}">IMBRA</a></li>
</ul>