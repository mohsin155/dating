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
                            <div class="form-group">
                                <label for="Newmessages">New messages:</label>
                                <label class="radio-inline"><input type="radio" name="msg" vlaue="1">Yes</label>
                                <label class="radio-inline"><input type="radio" name="msg" vlaue="0">No</label>
                            </div>
                          <hr class="seperate-line">
                          <div class="form-group">
                                <label for="Newmessages">Interest in me:</label>
                                <label class="radio-inline"><input type="radio" name="interest_in_me" vlaue="1">Yes</label>
                                <label class="radio-inline"><input type="radio" name="interest_in_me" vlaue="0">No</label>
                            </div>
                          <hr class="seperate-line">
                           <div class="form-group">
                                <label for="Newmessages">Missed Instant Messenger attempts:</label>
                                <label class="radio-inline"><input type="radio" name="missed_instant_messenger" vlaue="1">Yes</label>
                                <label class="radio-inline"><input type="radio" name="missed_instant_messenger" vlaue="0">No</label>
                            </div>
                          <hr class="seperate-line">
                          <div class="form-group">
                                <label for="Newmessages">ForeverWeLove.com offers and promotions:</label>
                                <label class="radio-inline"><input type="radio" name="offers_and_promotions" vlaue="1">Yes</label>
                                <label class="radio-inline"><input type="radio" name="offers_and_promotions" vlaue="0">No</label>
                            </div>
                          <hr class="seperate-line">
                          <div class="form-group">
                                <label for="Newmessages">ForeverWeLove offers and promotions:</label>
                                <label class="radio-inline"><input type="radio" name="promotions" vlaue="1">Yes</label>
                                <label class="radio-inline"><input type="radio" name="promotions" vlaue="0">No</label>
                            </div>
    

                         <div class="address-update-heading">
                            <h1>Realtime Notifications</h1>
                        </div>
                        <div class="form-group">
                                <label for="Newmessages">New messages:</label>
                                <label class="radio-inline"><input type="radio" name="new_msg" vlaue="1">Yes</label>
                                <label class="radio-inline"><input type="radio" name="new_msg" vlaue="0">No</label>
                            </div>
                          <hr class="seperate-line">
                          <div class="form-group">
                                <label for="Newmessages">Interest in me:</label>
                                <label class="radio-inline"><input type="radio" name="interest_me" vlaue="1">Yes</label>
                                <label class="radio-inline"><input type="radio" name="interest_me" vlaue="0">No</label>
                            </div>
                          <hr class="seperate-line">
                          <div class="form-group">
                                <label for="Newmessages">Someone viewed my profile:</label>
                                <label class="radio-inline"><input type="radio" name="profile_view" vlaue="1">Yes</label>
                                <label class="radio-inline"><input type="radio" name="profile_view" vlaue="0">No</label>
                            </div>
                          <hr class="seperate-line">
                          <div class="form-group">
                                <label for="Newmessages">Someone added me as a favorite:</label>
                                <label class="radio-inline"><input type="radio" name="favorite" vlaue="1">Yes</label>
                                <label class="radio-inline"><input type="radio" name="favorite" vlaue="0">No</label>
                            </div>
                          <hr class="seperate-line">
                          <div class="form-group">
                                <label for="Newmessages">Potential matches:</label>
                                <label class="radio-inline"><input type="radio" name="potential_matches" vlaue="1">Yes</label>
                                <label class="radio-inline"><input type="radio" name="potential_matches" vlaue="0">No</label>
                            </div>
                          <div class="button-inner text-center">
                                            <button class="btn btn-primary btn-green" type="submit">SAVE</button>
                                        </div>
                                                  </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection