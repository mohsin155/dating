@extends('layouts.main')
@section('content')
<div class="content-wrapper-inner">
    <div class="content-wrapper-settings search-menu">
        @include('search.search-tabs')
        <div class="address-update-container">
            <div class="address-update-inner">
                <div>
                    <h1>Member Number</h1>
                </div>
            </div>
            <div class="signup-page-outer edit-profile-page-setting">
                <form name="edit-match" class="form-inline" id="edit-match" method="post" action="{{url('search/search-match')}}">
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

                        <div class="updateconf">
                            <p><h1>Your match criteria has been updated</h1></p>
                        </div>


                    </div>
                    @endif
                    <input type="hidden" name="type" value="2" />
                    <div class="description">
                        <div class="form-group">
                            <label>Member Number : </label><input name="member_number" type="text" />
                        </div>
                    </div>

                    <div class="button-inner text-center email-address">
                        <button class="btn btn-primary btn-green" type="submit">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
