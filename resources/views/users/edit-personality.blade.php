@extends('layouts.main')
@section('content')
<div class="content-wrapper-inner">
    <div class="content-wrapper-settings">
        @include('users.edit-profile-tabs')
        <div class="address-update-container">
            <div class="address-update-inner">
                <div>
                    <h1>Edit Personality Profile</h1>
                </div>

            </div>
            @if(session()->has('success'))
            <div class="alert alert-success">
                <ul>
                    <li> {{session()->get('success')}} </li>
                </ul>
            </div>
            @endif
            <div class="signup-page-outer">
                <form class="form-inline" method="post" action="{{url('users/edit-personality')}}">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <label for="fav_movie">What is your favorite movie?: </label>
                        <textarea name="fav_movie" cols="72" rows="2">{{is_null($user_per)?'':$user_per->fav_movie}}</textarea>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="fav_book">What is your favorite book?: </label>
                        <textarea name="fav_book" cols="72" rows="2">{{is_null($user_per)?'':$user_per->fav_book}}</textarea>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="typeof_food">What sort of food do you like?: </label>
                        <textarea name="typeof_food" cols="72" rows="2">{{is_null($user_per)?'':$user_per->typeof_food}}</textarea>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="music">What sort of music do you like?: </label>
                        <textarea name="music" cols="72" rows="2">{{is_null($user_per)?'':$user_per->music}}</textarea>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="hobby_intrst">What are your hobbies and interests?: </label>
                        <textarea name="hobby_intrst" cols="72" rows="2">{{is_null($user_per)?'':$user_per->hobby_intrst}}</textarea>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="dress_apprce">How would you describe your dress sense and physical appearance?: </label>
                        <textarea name="dress_apprce" cols="72" rows="2">{{is_null($user_per)?'':$user_per->dress_apprce}}</textarea>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="sence_of_humar">How would you describe your sense of humor?: </label>
                        <textarea name="sence_of_humar" cols="72" rows="2">{{is_null($user_per)?'':$user_per->sence_of_humar}}</textarea>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="personality">How would you describe your personality?: </label>
                        <textarea name="personality" cols="72" rows="2">{{is_null($user_per)?'':$user_per->personality}}</textarea>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="travel">Where have you traveled or would like to travel to?: </label>
                        <textarea name="travel" cols="72" rows="2">{{is_null($user_per)?'':$user_per->travel}}</textarea>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="adaptive">How adaptive are you to having a partner from a different culture to your own?: </label>
                        <textarea name="adaptive" cols="72" rows="2">{{is_null($user_per)?'':$user_per->adaptive}}</textarea>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="romantic_wkend">How would you spend a perfect romantic weekend?: </label>
                        <textarea name="romantic_wkend" cols="72" rows="2">{{is_null($user_per)?'':$user_per->romantic_wkend}}</textarea>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="perfect_match">What sort of person would be your perfect match?: </label>
                        <textarea name="perfect_match" cols="72" rows="2">{{is_null($user_per)?'':$user_per->perfect_match}}</textarea>
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