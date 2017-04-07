@extends('layouts.main')
@section('title'){{'SignUp'}}@endsection
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <div class="logo_left header_logo">
                            <img src="image/Logo.jpg" border="0" height="70" width="350" alt="logo"/>
                        </div>
                        <div class="main_content main-height">
                            <form name="signup-page" class="form-inline" id="signup-page">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <div class="col-md-7 signup-page-outer">
                                    <div class="signup-page-inner">
                                        <div class="signup-page-inner-text text-center">
                                            IT'S FREE TO JOIN
                                        </div>
                                        <div class="text-center">
                                            <div class="fb-logo" id="fb">
                                                <img src="image/fb-icon.png" border="0" alt="fb-logo"/> Join with Facebook
                                            </div>
                                        </div>    
                                        <div class="horizontalLine">
                                            <span class="orText">OR</span>
                                        </div>
                                        <div class="form-group mr-t-10">
                                            <label for="email">First Name</label>
                                            <input type="text" id="firstName" name="firstname">
                                            <label class="control-label"></label>
                                        </div>
                                        <hr class="seperate-line">
                                        <div class="form-group">
                                            <label for="email">Password</label>
                                            <input type="password" id="password" name="password">
                                            <label class="control-label"></label>
                                        </div>
                                        <hr class="seperate-line">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text"  id="email" name="email">
                                            <label class="control-label"></label>
                                        </div>
                                        <hr class="seperate-line">
                                        <div class="form-group">
                                            <label for="email">I'm a</label>
                                            <label class="radio-inline"><input type="radio" name="gender" value="male">Male</label>
                                            <label class="radio-inline"><input type="radio" name="gender" value="female">Female</label>
                                            <label class="control-label"></label>
                                        </div>
                                        <hr class="seperate-line">
                                        <div class="form-group">
                                            <label for="sel1">Age:</label>
                                 <select class="form-control" id="age" name="age">0
                                                <?php
                                                for ($age= 18; $age <= 90; $age++){
                                                echo "<option>".$age."</option>";
                                                }
                                                ?>
                                                </select>
                        </div>
                        <hr class="seperate-line">
                        <div class="form-group">
                            <label for="age">Country</label>
                            <select class="form-control" id="country" name="country">
                                @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr class="seperate-line">
                        <div class="form-group">
                            <label for="State/Province">State/Province</label>
                            <select class="form-control" id="state" name="state">
                                <option value="0">--Select--</option>
                            </select>
                        </div>
                        <hr class="seperate-line">
                        <div class="form-group">
                            <label for="State/Province">City</label>
                            <select class="form-control" id="city" name="city">
                                <option value="0">--Select--</option>
                            </select>
                        </div>
                        <hr class="seperate-line">
                        <div class="button-inner text-center">
                            <button  class="btn btn-primary btn-green" type="submit">VIEW SINGLES NOW</button>
                        </div>
                        <div class="form-group">
                            <div class="text-center terms-condition">
                                <span class="mr-r-10"><input type="checkbox" value="" name="terms_condition"></span><span>Yes, I Agree to the Terms and Conditions</span>

                            </div>
                            <label class="control-label"></label>
                        </div>     
                    </div>

                </div>
                <div class="section-right">
                    <div class="col-md-4">
                        <div class="box-with-image-header">
                            <h1>You Are Moments Away From Meeting Singles Like These!</h1>

                            <div class="box-with-image-inner">

                                <img src="image/img-1.jpg" width="65" height="65" border="0" class="member">
                                <img src="image/img-2.jpg" width="65" height="65" border="0" class="member">
                                <img src="image/img-3.jpg" width="65" height="65" border="0" class="member">
                                <img src="image/img-1.jpg" width="65" height="65" border="0" class="member">
                                <img src="image/img-2.jpg" width="65" height="65" border="0" class="member">
                                <img src="image/img-3.jpg" width="65" height="65" border="0" class="member">
                                <img src="image/img-1.jpg" width="65" height="65" border="0" class="member">
                                <img src="image/img-2.jpg" width="65" height="65" border="0" class="member">
                                <img src="image/img-3.jpg" width="65" height="65" border="0" class="member">

                            </div>
                        </div>  
                    </div>
                </div>    
            </form>
        </div>
    </div>
</div>
</div>
@endsection