@extends('layouts.main')
@section('content')
<div class="content-wrapper-inner">
    <div class="content-wrapper-settings">
        @include('users.profile-tabs')
        <div class="address-update-container">
                        <div class="address-update-inner">
                            <div>
                                <h1>Billing</h1>
                            </div>

                        </div>

                        <div class="address-update-heading">
                            <h1>Current Membership</h1>
                        </div>
                        <div class="upgrade-info">
                            <div class="form-group">
                                <div class="updateconf">
                                    <p>You are currently a FREE Standard member. Click "Upgrade Now" below to learn more about the benefits of becoming a paid member.</p>
                                    <div class="button-inner text-center">
                                        <a href="{{url('payment/subscription')}}"><button class="btn btn-primary btn-green">Upgrade Now</button></a>
                                        </div>
                                </div>
                                <p><a href="#" class="show-membership"><strong>Show historic membership</strong></a></p>
                            </div>
                        </div>
                   
                      
                    </div>
                </div>
            </div>
        </div>
        @endsection