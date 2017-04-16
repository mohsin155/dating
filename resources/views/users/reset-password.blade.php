@extends('layouts.main')
@section('content')
<div class="content-wrapper-inner">
    <div class="content-wrapper-settings">
        @include('users.profile-tabs')
        <div class="address-update-container">
                        <div class="address-update-inner">
                            <div>
                                <h1>Reset your password</h1>
                            </div>

                        </div>
                        <div class="description">
                            To help keep your account secure we recommend that you routinely change your password.<br>
                            <strong>Important: For extra security ensure that your new password is NOT the same as your email password.</strong>
                        </div>
                        <div class="address-update-heading">
                            <h1>Enter your new password</h1>
                        </div>
                         <div class="email-address signup-page-outer">
                             <form name="change-password" class="form-inline" id="change-password" method="post" action="{{url('users/reset-password')}}">
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
                                            <label for="email">New Password:</label>
                                            <input type="password" id="newpassword" name="newpassword">
                                            <label class="control-label"></label>
                                 </div>
                                 <hr class="seperate-line">
                                  <div class="form-group">
                                            <label for="email">Confirm New Password:</label>
                                            <input type="password" id="confirmpassword" name="confirmpassword">
                                            <label class="control-label"></label>
                                 </div>
                                 <hr class="seperate-line">
                                 <div class="button-inner text-center">
                                            <button class="btn btn-primary btn-green" type="submit">SAVE</button>
                                        </div>
                             </form>
                        </div>
                         <div class="address-update-heading">
                            <h1>Password Guidelines</h1>
                        </div>
                        <div class="email-address signup-page-outer mr-b-60">
                            <div class="form-group">
                                <div class="lock-icon pull-left">
                                <img src="{{url('image/Lock.gif')}}"  alt="lock icon"/>
                                </div>
                         <p>
                <strong>Your password must meet the following criteria:</strong>
            </p>
            <div class="passwordGuideline pull-left">
                <ul>
                    <li>Must be between 6 to 20 characters in length.</li>
                    <li>Must contain at least one alpha character (eg. A-Z). </li>
                    <li>Must contain at least one number.</li>
                    <li>Must contain NO spaces.</li>
					<li>Must not be the same as previous passwords</li>
                </ul>
            </div>
                            </div>
                  
                        </div>
                    </div>
                </div>
    </div>
</div>
@endsection