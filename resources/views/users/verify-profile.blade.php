@extends('layouts.main')
@section('content')
<div class="content-wrapper-inner">
    <div class="content-wrapper-settings">
        @include('users.edit-profile-tabs')
        <div class="address-update-container">
            <div class="address-update-inner">
                <div>
                    <h1>Edit Profile</h1>
                </div>

            </div>
            <div class="address-update-heading">
                <h1>Your Basics:</h1>
            </div>
            <div class="signup-page-outer">
                <form class="form-inline">
                    <div class="form-group">
                        <label for="gender">First Name: </label>
                        <input name="first_name" value=""/>
                    </div>
                    <hr class="seperate-line">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection