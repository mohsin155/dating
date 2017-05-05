@extends('layouts.main')
@section('content')
<div class="content-wrapper-inner">
    <div class="content-wrapper-settings search-menu">
        @include('search.search-tabs')
        <div class="address-update-container">
            <div class="address-update-inner">
                <div>
                    <h1>Keyword Search</h1>
                </div>

            </div>
            <div class="description">
                <div class="form-group">
                <label>Keyword : </label><input name="keyword" type="text" />
                </div>
            </div>

            <div class="signup-page-outer edit-profile-page-setting">
                <form name="edit-match" class="form-inline" id="edit-match" method="post" action="{{url('users/edit-match')}}">
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
                    <div class="form-group">
                        <label for="gender">I'm a: </label>
                        <select class="form-control" name="gender" >
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>               
                    <div class="form-group">
                        <label for="gender">I'm seeking a: </label>
                        <select class="form-control" name="seeking" >
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group edit-profile-page">
                        <label for="age_btw">Aged between: </label>
                        <select class="form-control" name="min_age" >
                            <option value="0">----</option>
                            @for($i=18;$i<=90;$i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        and 
                        <select class="form-control" name="max_age" >
                            <option value="0">----</option>
                            @for($i=18;$i<=90;$i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>

                    </div>

                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="country">Living in:</label>
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#" class="active-grey">Country</a></li>
                        </ul>
                        <select class="form-control" id="country" name="country" >
                            <option value="0">--Please Select--</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="state" name="state">
                            <option value="0">--Please Select--</option>
                        </select>
                        <select class="form-control" id="city" name="city">
                            <option value="0">--Please Select--</option>
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <!--<div class="form-group">
                        <label for="State/Province">State/Province</label>
                        
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="State/Province">City</label>
                        
                    </div>
                    <hr class="seperate-line">-->
                    <div class="form-group">
                        <label for="has_photo">Has Photo: </label>
                        <div class="pets-section">
                            <input type="checkbox" name="has_photo" value="1" checked="" />Yes, only show profiles with a photo.
                        </div>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="searching_for">Searching For: </label>
                      
                        @foreach($form_layout[28] as $row)
                        <div class="pets-section">
                            <input type="checkbox" name="relationship[]" value="{{$row['value']}}" />{{$row['label']}}
                        </div>
                        @endforeach
                          <div class="pets-section">
                        <input type="checkbox" name="relationship[]" value="" />Any
                        </div>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="last_active">Last Active : </label>
                        <select class="form-control" name="last_active">
                            <option value="">Any</option>
                            <option value="7">within week</option>
                            <option value="30">within 1 month</option>
                            <option value="90">within 3 months</option>
                            <option value="180">within 6 months</option>
                            <option value="365">within year</option>
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="last_active">Sort results by : </label>
                        <select class="form-control" name="sort_result">
                            <option value="active">Last Active</option>
                            <option value="photo">Photos First</option>
                            <option value="newest">Newest Member</option>
                        </select>
                    </div>
                    <div class="button-inner text-center email-address">
                        <button class="btn btn-primary btn-green" type="submit">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('script')
<script>
$(document).ready(function () {
    $("select[name=country]").trigger("change");
});
</script>

@endsection
