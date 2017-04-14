@extends('layouts.main')
@section('content')
<div class="content-wrapper-inner">
    <div class="content-wrapper-settings">
        @include('users.profile-tabs')
          <div class="address-update-container">
                        <div class="address-update-inner">
                            <div>
                                <h1>Profile Settings</h1>
                            </div>

                        </div>
                        <div class="description">
                            Update your profile display options and localization.
                        </div>
                        <div class="address-update-heading">
                            <h1>Online Options:</h1>
                        </div>
                        <div class="signup-page-outer">
                            <div class="form-group">
                                <label for="OnlineStatus" class="">Online Status:</label>
                                <label class="radio-inline"><input type="radio" name="optradio">Show me as online</label>
                                <label class="radio-inline"><input type="radio" name="optradio">Show me as busy</label>
                                
                            </div>
                        </div>
                        <hr class="seperate-line">
                         <div class="signup-page-outer">
                            <div class="form-group">
                                <label for="DisplayProfile:" class="disabled">Display Profile:<img  id="displayProfileToolTip" alt="info" src="image/info.png" class="pd-l-5" data-toggle="tooltip" data-placement="bottom" title="If you hide your profile you will not be visible to other members in search results or members online. Your basic details will still be visible to members you've been in contact with.!"></label>
                                <label class="radio-inline disabled"><input type="radio" name="optradio1" checked="checked" disabled="disabled">Display my profile to users</label>
                                <label class="radio-inline disabled"><input type="radio" name="optradio1" disabled="disabled">Hide my profile from users</label>
                            </div>
                        </div>
                        <div class="address-update-heading upgrade-tip">
                            <h1><a href="#" target="_blank">Upgrade now to hide your profile from other users and browse anonymously >></a></h1>
                        </div>
                        <div class="address-update-heading">
                            <h1>Localization</h1>
                        </div>
                        <div class="clearfix"></div>
                        <div class="email-address signup-page-outer">
                            <form name="change-password" class="form-inline" id="change-password" novalidate="novalidate">
                                <div class="form-group">
                                    <label for="TimeZones">Time Zones:</label>
                                    <select class="form-control" id="country" name="country">
                                        <option>India</option>

                                    </select>
                                    <span><em>(Filter time zones by country)</em></span>
                                    <label class="control-label"></label>
                                    <div class="pacific_time">
                                        <select class="form-control" id="pacifictime" name="pacifictime">
                                            <option>(GMT-10:00) Hawaii Time</option>

                                        </select>
                                    </div>
                                </div>
                                <hr class="seperate-line">
                                <div class="form-group">
                                    <label for="TimeZones">Date & Time Format:</label>
                                    <select class="form-control" id="date-time" name="date-time">
                                        <option>English (United States)</option>

                                    </select>
                                    <img   alt="info" src="{{url('image/info.png')}}" class="pd-l-5" data-toggle="tooltip" data-placement="bottom" title="The date and time will be formatted according to your selection.">
                                    <label class="control-label"></label>

                                </div>
                                <hr class="seperate-line">
                                <div class="form-group">
                                    <label for="TimeZones">Measurement Units:</label>
                                    <select class="form-control" id="measureUnits" name="measureUnits">
                                        <option>Imperial USA</option>

                                    </select>
                                      <img   alt="info" src="{{url('image/info.png')}}" class="pd-l-5" data-toggle="tooltip" data-placement="bottom" title="Metric uses measurement units like metre, kilometre, and kilogram. Imperial uses measurement units like inch, mile, and pound. Metric Imperial displays both the metric and imperial systems.">
                                    <label class="control-label"></label>

                                </div>
                                <hr class="seperate-line">
                                <div class="button-inner text-center">
                                    <button class="btn btn-primary btn-green" type="submit">SAVE</button>
                                </div>
                            </form>
                        </div>
                        <div class="address-update-heading">
                            <h1>Switch Off Profile</h1>
                        </div>
                        <div class="email-address signup-page-outer">
                            <div class="form-group">
                                <p>To switch your profile off on LatinAmericanCupid.com please <a href="#">click here</a></p>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>
@endsection