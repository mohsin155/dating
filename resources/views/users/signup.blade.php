<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" type="image/png" href="favicon.ico">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>ForeverWeLove - Signup</title>
        <!-- Bootstrap Core CSS -->
        <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/custom.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
        <script>
WebFont.load({
    google: {
        families: ["Montserrat", "Montserrat-Medium", "Montserrat-Light"]
    }
});
window.fbAsyncInit = function () {
    FB.init({
        appId: '359387991123702',
        xfbml: true,
        version: 'v2.8'
    });
    FB.AppEvents.logPageView();
};
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
        </script>
    </head>
    <body>
        <div class="container-wrapper">
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    <div class="logo_left header_logo">
                        <a href="{{url('/')}}"><img src="image/Logo.jpg" border="0" height="70" width="260" alt="logo"/></a>
                    </div>

                    <div class="main_content main-height">                        
                        <div class="main_content main-height">
                            <form name="signup-page" class="form-inline" id="signup-page" method ="post" action="{{url('/signup')}}">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                                <input type="hidden" name="state_pre" value="{{old('state')}}">
                                <input type="hidden" name="city_pre" value="{{old('city')}}">
                                <div class="col-md-7 signup-page-outer">
                                    <div class="signup-page-inner">
                                        <div class="signup-page-inner-text text-center">
                                            IT'S FREE TO JOIN
                                        </div>
                                        <div class="text-center">
                                            <ul class="fberror errors hide"></ul>
                                            <div class="fb-logo" id="fb">
                                                <img src="image/fb-icon.png" border="0" alt="fb-logo"/> Join with Facebook
                                            </div>
                                        </div>    
                                        <div class="horizontalLine">
                                            <span class="orText">OR</span>
                                        </div>
                                        @if(!empty($errors) && count($errors)>0)
                                        <div class="alert alert-danger">
                                            @foreach($errors as $msg)
                                            <p>{{$msg}}</p>
                                            @endforeach
                                        </div>
                                        @endif
                                        <div class="form-group mr-t-10">
                                            <label for="email">First Name</label>
                                            <input type="text" id="firstName" name="first_name" class="form-control float-label" value="{{old('first_name')}}">
                                            <label class="control-label"></label>
                                        </div>
                                        <hr class="seperate-line">
                                        <div class="form-group">
                                            <label for="email">Password</label>
                                            <input type="password" id="password" name="password" class="form-control float-label">
                                            <label class="control-label"></label>
                                        </div>
                                        <hr class="seperate-line">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text"  id="email" name="email" class="form-control float-label" value="{{old('email')}}">
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
                                                for ($age = 18; $age <= 90; $age++) {
                                                    echo "<option>" . $age . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <hr class="seperate-line">
                                        <div class="form-group">
                                            <label for="age">Country</label>
                                            <select class="form-control" id="country" name="country">
                                                <option value="0">--Select--</option>
                                                @foreach($countries as $country)
                                                <option value="{{$country->id}}" @if($country->id==old('country')) selected @endif>{{$country->name}}</option>
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
                                        </div>
                                    </div>
                                </div>
                                <div class="section-right">
                                    <div class="col-md-4">
                                        <div class="box-with-image-header">
                                            <h1>You Are Moments Away From Meeting Singles Like These!</h1>

                                            <div class="box-with-image-inner">

                                                <img src="image/img-1.jpg" width="100%" height="256" border="0" class="member">


                                            </div>
                                        </div>  
                                    </div>
                                </div>    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-2">
                <div id="footer">
                    <p class="link_color link-padding">

                    </p>
                </div>
                <div class="text-center trademark"><p>&COPY;&nbsp;Foreverwelove.com</p><p>Powered By : evalueweb.com</p></div>
            </div>    
            <div class="bg-loader">
                <div class="cssload-loader"></div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{url('js/jquery-1.11.1.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="{{url('js/jquery.validate.js')}}"></script>
    <script src="{{url('js/custom.js')}}"></script>
    <script src="{{url('js/script.js')}}"></script>
    <script>
$(document).ready(function () {
$("select[name=country]").trigger("change");
});
    </script>
</body>
</html>