<ul class="nav nav-tabs">
    <li class="active"><a href="{{url('users/account-settings')}}" class="{{ Request::is('users/account-settings') ? 'active-grey' : '' }}">Email Address</a></li>
    <li class="active"><a href="{{url('users/reset-password')}}" class="{{ Request::is('users/reset-password') ? 'active-grey' : '' }}">Password</a></li>
    <li class="active"><a href="{{url('users/profile-settings')}}" class="{{ Request::is('users/profile-settings') ? 'active-grey' : '' }}">Profile Setting </a></li>
    <li class="active"><a href="{{url('users/billing')}}" class="{{ Request::is('users/billing') ? 'active-grey' : '' }}">Billing</a></li>
    <li class="active"><a href="{{url('users/notification')}}" class="{{ Request::is('users/notification') ? 'active-grey' : '' }}">Notification</a></li>
</ul>