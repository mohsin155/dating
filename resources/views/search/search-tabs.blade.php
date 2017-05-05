<ul class="nav nav-tabs">
    <li class="active"><a href="{{url('search/advance-search')}}" class="{{ Request::is('search/advance-search') ? 'active-grey' : '' }}">Advanced Search</a></li>
    <li class="active"><a href="{{url('search/saved-search')}}" class="{{ Request::is('search/') ? 'active-grey' : '' }}">Saved Searches</a></li>
    <li class="active"><a href="{{url('search/keywords')}}" class="{{ Request::is('search/keywords') ? 'active-grey' : '' }}">Keyword</a></li>
    <li class="active"><a href="{{url('search/cupid-tags')}}" class="{{ Request::is('search/cupid-tags') ? 'active-grey' : '' }}">CupidTags</a></li>
    <li class="active"><a href="{{url('search/first-name')}}" class="{{ Request::is('search/first-name') ? 'active-grey' : '' }}">FirstName</a></li>
    <li class="active"><a href="{{url('search/member-number')}}" class="{{ Request::is('search/member-number') ? 'active-grey' : '' }}">Membernumber</a></li>
    <li class="active"><a href="{{url('search/popular')}}" class="{{ Request::is('search/popular') ? 'active-grey' : '' }}">PopularSearches</a></li>
</ul>