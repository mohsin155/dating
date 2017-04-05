@extends('layouts.main')
@section('title'){{'Login'}}@endsection
@section('content')
<div class="row">

    <div class="col-md-10 col-md-offset-2">
        <div class="header row">
            <div class="col-md-8 logo_left header_logo">
                <img src="{{url('image/guestheaderlogo.gif')}}" border="0" alt="logo">
            </div>
            <div class="col-md-4 header_logo text-right"><img src="image/apache_pb2.png" /></div>
        </div>
        <div class="navbar col-md-12 pd-0">
            <div class="col-md-10 link_color"><a href="#" class="link_color">Home</a> | <a href="#" >Join Free Now</a> | <a href="#">Testinomials</a></div>
            <div class="col-md-2 text-right pd-0"><img src="image/flag_English.gif" /><img src="image/arrowdown.png" class="pd-l-10" /> </div>
        </div>
        <form  name="login-page" id="login-page" action="{{url('users/login')}}">
            <div class="col-md-12 main_content pd-b-70">
                <div class="col-md-12 rounded_container rounder_continer_outer mr-t-20">
                    <div class="col-md-5 login_box  mr-t-30 mr-b-40 pd-0">
                        <div class="text-center greygrad heading">Members Login</div>
                        <div class="pd-l-20 pd-r-20 pd-t-10">

                            <input name="page" value="" type="hidden">
                            <div class="">
                                <label class="color_black">Email</label>
                                <input class="email" style="width:100%;" size="30" tabindex="1" value="" name="email" autocomplete="off" type="email">
                            </div>
                            <div class="pd-t-10">
                                <label>Password</label>
                                <input class="password" size="30" tabindex="2" style="width:100%;" value="" name="password" autocomplete="off" type="password">
                            </div>
                            <div class="pd-t-10 forgotPW"><a href="/en/auth/showforgotpassword" tabindex="4" class="">Forgot Password</a></div>
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
                        <div class="fb-logo">        

                            <img src="image/fb-icon.png" border="0" alt="fb-logo">

                            <span class="pd-l-20">
                                Login with Facebook
                            </span>

                        </div>
                        <div class="text-center pd-10 join mr-t-15"> <em>Not a member? <strong><a href="#">Join Free Now!</a></strong></em></div>
                    </div>
                    <div class="col-md-7">
                        <div class="col-md-7 pd-0 pd-t-30">   
                            <img src="image/5m.png" width="300" height="350" border="0"/>
                        </div>
                        <div class="col-md-5 pd-0 pd-t-50">   
                            <img src="image/5.png" width="200" height="150" border="0" />
                        </div>
                    </div>    
                    <div class="sitefeatures col-md-12 mr-t-15">
                        <div class="col-md-4"></div>
                        <div class="col-md-8 pd-l-40">
                            <ul class="">
                                <li>Largest Latin Dating Site With Over 3 Million Members</li>
                                <li>Access to messages, advanced matching, and instant messaging features</li>
                                <li>Review your matches for free</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="roundedContainer social col-md-12 mr-t-15">
                    <p class="text-border text-center pd-5 mr-t-30">Help spread the word about LatinAmericanCupid.com!</p>

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
        <div class="text-center trademark"><p>&COPY;Company Name</p></div>
    </div>    
</div> 
@endsection