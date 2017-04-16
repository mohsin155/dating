@extends('layouts.main')
@section('content')
<div class="content-wrapper-inner">
    <div class="content-wrapper-settings">
        @include('users.profile-tabs')
        <div class="address-update-container">
            <div class="address-update-inner">
                <div>
                    <h1>Email Address</h1>
                </div>

            </div>
            <div class="description">
                Please update your email if it has changed so you do not miss any communications or match alerts.
            </div>
            <div class="address-update-heading">
                <h1>Change Email Address</h1>
            </div>
            <div class="email-address signup-page-outer">
                <form name="change-email" class="form-inline" id="change-email"  method="post" action="{{url('users/account-settings')}}">
                   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    @if(!empty($errors) && count($errors)>0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors as $messages)
                                            <li> {{$messages}} </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    
                                    @elseif(session('success'))
                                        <div class="alert alert-success">
                                        <ul>
                                            <li> {{session('success')}} </li>
                                        </ul>
                                    </div>
                                    @endif
                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="text" id="email" name="email">
                        <label class="control-label"></label>
                    </div>
                    <hr class="seperate-line">
                    <div class="button-inner text-center">
                        <button class="btn btn-primary btn-green" type="submit">SAVE</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection