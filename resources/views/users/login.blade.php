<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" type="image/png" href="favicon.ico">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>ForeverWeLove - Login</title>
        <!-- Bootstrap Core CSS -->
        <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="{{url('css/custom.css')}}" rel="stylesheet">
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
        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
            }
        </script>
        <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"
        type="text/javascript"></script>
        <script>
            function translate(lang) {

                var $frame = $('.goog-te-menu-frame:first');
                if (!$frame.size()) {
                    alert("Error: Could not find Google translate frame.");
                    return false;
                }
                $frame.contents().find('.goog-te-menu2-item span.text:contains(' + lang + ')').get(0).click();
                return false;
            }
        </script>
    </head>
    <body>
        <div class="container-wrapper">
            <div class="row">

                <div class="col-md-10 col-md-offset-2">
                    <div class="header row">
                        <div class="col-md-8 logo_left header_logo">
                            <img src="{{url('image/Logo.jpg')}}" border="0" height="70" width="260" alt="logo">
                        </div>
                        <div class="col-md-4 header_logo text-right"><!--<img src="image/apache_pb2.png" />--></div>
                    </div>
                    <div class="navbar col-md-12 pd-0">
                        <div class="col-md-10 link_color pd-10"><a href="#" class="link_color">Home</a> | <a href="{{url('/signup')}}" >Join Free Now</a> | <a href="#">Testimonials</a></div>
                        <div class="col-md-2 text-right pd-0"><!--<img src="image/flag_English.gif" /><img src="image/arrowdown.png" class="pd-l-10" />--><!-- Use CSS to replace link text with flag icons -->  
                            <nav class="navbar">
                            <ul class="nav navbar-nav nav-custom">
                                <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <img src="image/flags/english.gif" alt="" />
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
                                <li><a href="javascript:;" id="English" onclick="translate(this.id);">English<span></span>
                                        <img src="image/flags/english.gif" alt="" /></a> </li>
                                <li><a href="javascript:;" id="German" onclick="translate(this.id);"><span></span>
                                        <img src="image/flags/german.gif" alt="" /></a> </li>
                                <li><a href="javascript:;" id="Italian" onclick="translate(this.id);"><span>
                                        </span>
                                        <img src="image/flags/italian.gif" alt="" /></a> </li>
                                <li><a href="javascript:;" id="Danish" onclick="translate(this.id);"><span></span>
                                        <img src="image/flags/danish.gif" alt="" /></a> </li>
                                <li><a href="javascript:;" id="Norwegian" onclick="translate(this.id);"><span></span>
                                        <img src="image/flags/norwegian.gif" alt="" /></a> </li>
                                <li><a href="javascript:;" id="Dutch" onclick="translate(this.id);"><span>
                                        </span>
                                        <img src="image/flags/dutch.gif" alt="" /></a> </li>
                                <li><a href="javascript:;" id="French" onclick="translate(this.id);"><span>
                                        </span>
                                        <img src="image/flags/french.gif" alt="" /></a> </li>
                                <li><a href="javascript:;" id="Portugese" onclick="translate(this.id);"><span>
                                        </span>
                                        <img src="image/flags/portugese.gif" alt="" /></a> </li>
                                <li><a href="javascript:;" id="Swedish" onclick="translate(this.id);"><span>
                                        </span>
                                        <img src="image/flags/swedish.gif" alt="" /></a> </li>
                            </ul>
                                </li>
                            </ul>
                            </nav>
                            <div id="google_translate_element" style="display:none;"></div>
                        </div>
                    </div>
                    <form  name="login-page" id="login-page" method="post" action="{{url('/login')}}">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="col-md-12 main_content pd-b-70">
                            <div class="col-md-12 rounded_container rounder_continer_outer mr-t-20">
                                <div class="col-md-5 login_box  mr-t-30 mr-b-40 pd-0">
                                    <div class="text-center greygrad heading">Members Login</div>
                                    @if(!empty($errors) && count($errors)>0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors as $messages)
                                            <li> {{$messages}} </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <div class="pd-l-20 pd-r-20 pd-t-10">
                                        <ul class="fberror errors hide"></ul>
                                        <input name="page" value="" type="hidden">
                                        <div class="">
                                            <label class="color_black">Email</label>
                                            <input class="email form-control float-label" style="width:100%;" size="30" tabindex="1" value="" name="email" autocomplete="off" type="email">
                                        </div>
                                        <div class="pd-t-10">
                                            <label>Password</label>
                                            <input class="password form-control float-label" size="30" tabindex="2" style="width:100%;" value="" name="password" autocomplete="off" type="password">
                                        </div>
                                        <div class="pd-t-10 forgotPW"><a href="#" tabindex="4" class="">Forgot Password</a></div>
                                        <span class="loggedin pd-t-10">
                                            <input id="RememberMe" name="RememberMe" value="1" tabindex="5" type="checkbox">
                                            <label for="RememberMe"><strong>Keep me logged in</strong></label>
                                        </span>
                                        <div class="dontcheck"><span><em>Don't check this box if you're at a public or shared computer</em></span></div>
                                        <!--                                        <div id="loginButton" class="loginbutton pd-t-10">
                                                                                    <input class="greenShinyButton pd-5" tabindex="3" value="Login" type="submit">
                                                                                </div>-->
                                        <div class="button-inner text-center">
                                            <button class="btn btn-primary btn-green" type="submit">LOGIN</button>
                                        </div>

                                    </div>

                                    <div class="horizontalLine pd-t-5">
                                        <span class="orText">OR</span>
                                    </div>
                                    <div class="fb-logo" id="fblogin">        

                                        <img src="image/fb-icon.png" border="0" alt="fb-logo">

                                        <span class="pd-l-20" >
                                            Login with Facebook
                                        </span>

                                    </div>
                                    <div class="text-center pd-10 join mr-t-15"> <em>Not a member? <strong><a href="{{url('/signup')}}">Join Free Now!</a></strong></em></div>
                                </div>
                                <div class="col-md-7">
                                    <div class="col-md-7 pd-0 pd-t-100">   
                                        <img src="image/5m.png" width="300" height="350" border="0"/>
                                    </div>
                                    <div class="col-md-5 pd-0 pd-t-100">   
                                        <!--<img src="image/5.png" width="200" height="150" border="0" />-->
                                    </div>
                                </div>    
                                <div class="sitefeatures col-md-12 mr-t-15">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-8 pd-l-40">
                                        <ul class="">
                                            <!--<li>Largest Latin Dating Site With Over 3 Million Members</li>-->
                                            <li>Access to messages, advanced matching, and instant messaging features</li>
                                            <li>Review your matches for free</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="roundedContainer social col-md-12 mr-t-15">
                                <p class="text-border text-center pd-5 mr-t-30">Help spread the word about foreverwelove.com!</p>

                                <div class="col-md-12 buttons clearfix mr-b-20">
                                    <div class="col-md-4"><a href="#" class="fb" target="_blank"><img src="image/fb-icon.png" class="socialicon" border="0">Share on Facebook</a> </div>
                                    <div class="col-md-2 pd-0"><a href="#" class="tw" target="_blank"><img src="image/tw-icon.png" class="socialicon" border="0">Twitter</a> </div>
                                    <div class="col-md-3"> <a href="#" class="ggl" target="_blank"><img src="image/ggl-icon.png" class="socialicon" border="0">Google+</a></div>
                                    <div class="col-md-3 pd-0"><a href="#" class="pinterest" target="_blank"><img src="image/pi-icon.png" class="socialicon" border="0">Pinterest</a> </div>
                                </div>

                            </div>
                        </div>
                    </form>    
                </div>  
                <div class="col-md-10 col-md-offset-2">
                    <div id="footer">
                        <p class="link_color link-padding">

                        </p>
                    </div>
                    <div class="text-center trademark"><p>&COPY;&nbsp;Foreverwelove.com</p><p>Powered By : evalueweb.com</p></div>
                </div>    
            </div> 
            <div class="bg-loader">
                <div class="cssload-loader"></div>
            </div>
        </div>
        <!-- jQuery -->
        <script src="{{url('js/jquery-1.11.1.js')}}"></script>
        <script src="{{url('js/bootstrap.min.js')}}"></script>
        <script src="{{url('js/jquery.validate.js')}}"></script>
        <script src="{{url('js/custom.js')}}"></script>
        <script src="{{url('js/script.js')}}"></script>
    </body>
</html>