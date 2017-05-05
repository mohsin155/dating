@extends('layouts.main')
@section('content')
<div class="content-wrapper-inner">
    <div class="content-wrapper-settings search-menu">
        @include('search.search-tabs')
        <div class="address-update-container">
            <div class="address-update-inner">
                <div>
                    <h1>Cupid Tag</h1>
                </div>

            </div>
            <div class="description">
                <div class="form-group">
                <label>Cupid Tag : </label><input name="keyword" type="text" />
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
                        
                        <select class="form-control" id="country" name="country" >
                            <option value="0">--Please Select--</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="has_photo">Has Photo: </label>
                        <div class="pets-section">
                            <input type="checkbox" name="has_photo" value="1" checked="" />Yes, only show profiles with a photo.
                        </div>
                    </div>
                    <hr class="seperate-line">
                    
                    
                    <div class="button-inner text-center email-address">
                        <button class="btn btn-primary btn-green" type="submit">SAVE</button>
                    </div>
                    <div class="address-update-heading">
                        <h1>Popular CupidTag Cloud</h1>
                    </div>
                    @foreach($tags as $tag)
                    {{$tag->name}}
                    @endforeach
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
