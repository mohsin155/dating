@extends('layouts.main')
@section('content')
<div class="content-wrapper-inner">
    <div class="content-wrapper-settings">
        @include('users.profile-tabs')
          <div class="address-update-container">
                        <div class="address-update-inner notification-header">
                            <div class="">
                                <h1>Notifications</h1>
                            </div>
                            <div class="pull-right mr-t25">
                                <a href="{{url('users/account-settings')}}" class="btn btn-primary btn-block">Change Email Address</a>
                            </div>
                        </div>

                        <div class="description">
                            Update your email and realtime notifications.
                        </div>
                        <div class="address-update-heading">
                            <h1>Email Notifications</h1>
                        </div>
                    <div class="notification signup-page-outer">
                         <form name="notification" class="form-inline" id="notification" method="post" action="{{url('users/notification')}}">
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
                                <label for="email_newmessages">New messages:</label>
                                <label class="radio-inline"><input type="radio" name="email_newmessages"  checked="checked" value="1">Yes</label>
                                <label class="radio-inline"><input type="radio" name="email_newmessages" value="0">No</label>
                            </div>
                          <hr class="seperate-line">
                          <div class="form-group">
                                <label for="email_interest">Interest in me:</label>
                                <label class="radio-inline"><input type="radio" name="email_interest" checked="checked" value="1">Yes</label>
                                <label class="radio-inline"><input type="radio" name="email_interest" value="0">No</label>
                            </div>
                          <hr class="seperate-line">
                           <div class="form-group">
                                <label for="email_instantmsg">Missed Instant Messenger attempts:</label>
                                <label class="radio-inline"><input type="radio" name="email_instantmsg" checked="checked" value="1">Yes</label>
                                <label class="radio-inline"><input type="radio" name="email_instantmsg" value="0">No</label>
                            </div>
                          <hr class="seperate-line">
                          <div class="form-group">
                                <label for="email_offers">ForeverWeLove.com offers and promotions:</label>
                                <label class="radio-inline"><input type="radio" name="email_offers" checked="checked" value="1">Yes</label>
                                <label class="radio-inline"><input type="radio" name="email_offers" value="0">No</label>
                            </div>
                          <hr class="seperate-line">
                          <div class="form-group">
                                <label for="email_promotions">ForeverWeLove offers and promotions:</label>
                                <label class="radio-inline"><input type="radio" name="email_promotions" checked="checked" value="1">Yes</label>
                                <label class="radio-inline"><input type="radio" name="email_promotions" value="0">No</label>
                            </div>
    

                         <div class="address-update-heading">
                            <h1>Realtime Notifications</h1>
                        </div>
                        <div class="form-group">
                                <label for="realtime_messages">New messages:</label>
                                <label class="radio-inline"><input type="radio" name="realtime_messages" checked="checked" value="1">Yes</label>
                                <label class="radio-inline"><input type="radio" name="realtime_messages" value="0">No</label>
                            </div>
                          <hr class="seperate-line">
                          <div class="form-group">
                                <label for="realtime_interest">Interest in me:</label>
                                <label class="radio-inline"><input type="radio" name="realtime_interest" checked="checked" value="1">Yes</label>
                                <label class="radio-inline"><input type="radio" name="realtime_interest" value="0">No</label>
                            </div>
                          <hr class="seperate-line">
                          <div class="form-group">
                                <label for="realtime_viewprofile">Someone viewed my profile:</label>
                                <label class="radio-inline"><input type="radio" name="realtime_viewprofile" checked="checked" value="1">Yes</label>
                                <label class="radio-inline"><input type="radio" name="realtime_viewprofile" value="0">No</label>
                            </div>
                          <hr class="seperate-line">
                          <div class="form-group">
                                <label for="realtime_fav">Someone added me as a favorite:</label>
                                <label class="radio-inline"><input type="radio" name="realtime_fav" checked="checked" value="1">Yes</label>
                                <label class="radio-inline"><input type="radio" name="realtime_fav" value="0">No</label>
                            </div>
                          <hr class="seperate-line">
                          <div class="form-group">
                                <label for="realtime_matches">Potential matches:</label>
                                <label class="radio-inline"><input type="radio" name="realtime_matches" checked="checked" value="1">Yes</label>
                                <label class="radio-inline"><input type="radio" name="realtime_matches" value="0">No</label>
                            </div>
                          <div class="button-inner text-center">
                                 <button class="btn btn-primary btn-green" type="submit">SAVE</button>
                            </div>
                         </form>
                         </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection