@extends('layouts.main')
@section('content')
<div class="content-wrapper-inner">
    <div class="content-wrapper-settings search-menu">
        @include('search.search-tabs')
        <div class="address-update-container">
            <div class="address-update-inner">
                <div>
                    <h1>Saved Searches</h1>
                </div>
            </div>
            <div class="address-update-heading">
                <h1>You have 0 saved searches</h1>
            </div>
            <div class="button-inner text-center email-address">
                <a href='{{url('search/add-search')}}' class="btn btn-primary">Create a new saved search</a>
            </div>
        </div>
    </div>
</div>
@endsection
        