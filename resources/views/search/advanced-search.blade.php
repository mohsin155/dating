@extends('layouts.main')
@section('content')
<div class="content-wrapper-inner">
    <div class="content-wrapper-settings">
        @include('search.search-tabs')
        <div class="address-update-container">
            <div class="address-update-inner">
                <div>
                    <h1>Advance Search</h1>
                </div>

            </div>
            <div class="address-update-heading">
                <h1>Basic:</h1>
            </div>
            <div class="signup-page-outer">
                <form class="form-inline">
                    <div class="form-group">
                        <label for="gender">I am: </label>
                        <select class="form-control" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="gender">I am seeking a: </label>
                        <select class="form-control" name="seeking">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="gender">Age between: </label>
                        <select class="form-control" name="age_from">
                            <option value="male">18</option>
                        </select><span>&nbsp;to&nbsp;</span>
                        <select class="form-control" name="age_to">
                            <option value="male">18</option>
                        </select>
                    </div>
                    <hr class="seperate-line">
                    
                    <div class="form-group">
                        <label for="photo">Has Photo:</label>
                        <input type="checkbox" name="has_photo"><span>Only show profile with photo</span>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="last_active">Last Active: </label>
                        <select class="form-control" name="last_active">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="searching_for">Searching for:</label>
                        <input type="checkbox" name="searching_for"><span>Any</span>
                        <input type="checkbox" name="searching_for"><span>Friendship</span>
                        <input type="checkbox" name="searching_for"><span>Penpal</span>
                        <input type="checkbox" name="searching_for"><span>Romance/Dating</span>
                        <input type="checkbox" name="searching_for"><span>Marriage</span>
                        
                    </div>
                    <hr class="seperate-line">
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection