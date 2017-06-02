@extends('layouts.main')
@section('content')

<div id="bannerwrapper" class="clearfix" style="margin-top: 0px;">
    <div id="bannerpage">
        <div id="main-content">
            <div class="searchhdg">
                <div class="searchhdg2">
                    <h1> My Matches
                        <img src="{{asset('image/q-mark.gif')}}" title="Users on this page match the criteria you specified in your match settings. You can edit your match settings by clicking the 'Improve Matches' link." class="tipMe">
                    </h1>

                    <a href="/match_registration.cfm">Improve Matches</a>
                </div>
                <div class="matchnav">


                    <div class="matchnav_matches">
                        <span class="matches selectedTab"><img src="{{asset('image/icon_mymatches.png')}}" class="matchicon">My Matches</span> <a href="#"><img border="0" src="{{asset('image/icon_mutualmatches.png')}}" class="matchicon">Mutual Matches</a> <a href="#" class="reverse"><img border="0" src="{{asset('image/icon_reversematches.png')}}" class="matchicon">Reverse Matches</a>
                    </div>

                    <div class="clear"></div>

                </div>
                <div class="clear"></div>

            </div>
            <div class="clearfix"></div>
            <div class="view">
                <h1>View:</h1>
                <ul class="views">


                    <li class="photoviewselected"><a href="#" title="Photo View" class="tipMe"></a></li>

                    <li class="basicview"><a href="#" title="Basic View" class="tipMe"></a></li>

                    <li class="detailview"><a href="#" title="Detail View" class="tipMe"></a></li>

                    <li class="profileview"><a href="#" title="Profile" class="tipMe"></a></li>

                </ul>

                <span class="display">1 - 20 of 1000+</span>


                <div class="pagination">

                    <span class="inactive">first</span>

                    <span class="inactive">&lt; prev</span>

                    <a href="#">next &gt;</a>

                    <a href="#">last</a>

                </div>
                <span class="orderby">
                    <p>Order By:</p>
                    <select name="jumpMenu" id="jumpMenu">


                        <option value="#">Newest members</option>


                        <option value="#">Photos First</option>


                        <option value="#">Last Active</option>



                        <option value="#" selected="">Relevance</option>

                    </select>
                </span>

                <div class="clear"></div>
            </div>
            <div class="clearfix"></div>
            <div class="photoview">
                <div class="platinumpic">
                    <span class="memberpic2">


                        <a href="" data-devicemode="1" title="Nono  -  28  -  Richards Bay, South Africa">

                            <div class="photo">
                                <p>4</p>
                            </div>
                        </a>

                        <a href="" data-devicemode="1" title="Nono  -  28  -  Richards Bay, South Africa">

                            <img border="0" height="136px" width="125px" src="https://cdn.latinamericancupid.com/memphoto/Photo1/small/8950106.jpg">

                        </a>

                    </span>

                    <span class="icons">

                        <ul class="iconset">

                            <li class="iconstandard">

                                <a href="#" title="click here to view profile"></a>

                            </li>


                            <li class="iconmail">
                                <a style="display:none;" data-sitetranslationpath="en" class="launchRegistrationModal" href="javascript: void(0);"></a>

                                <a href="/en/mail/showemail?mid=8950106" title="Send Nono a message" class="emailpopup" rel="" memname=""></a>
                            </li>

                            <li class="iconinterest sendinterest" name="" data-altclass="iconinterestsent" data-msid="8950106" data-imageurl="" data-name="Nono"><a href="/en/memberrelationship/showinterest/070E86E6C5C940B4529D0A" title="Show interest in Nono"></a></li>

                            <li class="iconfavorites addfavorites" name="" data-altclass="iconfavoritessent" data-imageurl="" data-name="Nono"><a href="/en/memberrelationship/addfavorite/070E86E6C5C940B4529D0A" title="Add Nono to your favorites"></a></li>

                            <li class="icononlinemobileactive">

                                <a href="#" title="I'm Online - click to chat"></a>

                            </li>

                        </ul>
                    </span>
                </div>
                  <div class="standardpic">
                    <span class="memberpic2">


                        <a href="" data-devicemode="1" title="Nono  -  28  -  Richards Bay, South Africa">

                            <div class="photo">
                                <p>4</p>
                            </div>
                        </a>

                        <a href="" data-devicemode="1" title="Nono  -  28  -  Richards Bay, South Africa">

                            <img border="0" height="136px" width="125px" src="https://cdn.latinamericancupid.com/memphoto/Photo1/small/8950106.jpg">

                        </a>

                    </span>

                    <span class="icons">

                        <ul class="iconset">

                            <li class="iconstandard">

                                <a href="#" title="click here to view profile"></a>

                            </li>


                            <li class="iconmail">
                                <a style="display:none;" data-sitetranslationpath="en" class="launchRegistrationModal" href="javascript: void(0);"></a>

                                <a href="/en/mail/showemail?mid=8950106" title="Send Nono a message" class="emailpopup" rel="" memname=""></a>
                            </li>

                            <li class="iconinterest sendinterest" name="" data-altclass="iconinterestsent" data-msid="8950106" data-imageurl="" data-name="Nono"><a href="/en/memberrelationship/showinterest/070E86E6C5C940B4529D0A" title="Show interest in Nono"></a></li>

                            <li class="iconfavorites addfavorites" name="" data-altclass="iconfavoritessent" data-imageurl="" data-name="Nono"><a href="/en/memberrelationship/addfavorite/070E86E6C5C940B4529D0A" title="Add Nono to your favorites"></a></li>

                            <li class="icononlinemobileactive">

                                <a href="#" title="I'm Online - click to chat"></a>

                            </li>

                        </ul>
                    </span>
                </div>
                 <div class="standardpic">
                    <span class="memberpic2">


                        <a href="" data-devicemode="1" title="Nono  -  28  -  Richards Bay, South Africa">

                            <div class="photo">
                                <p>4</p>
                            </div>
                        </a>

                        <a href="" data-devicemode="1" title="Nono  -  28  -  Richards Bay, South Africa">

                            <img border="0" height="136px" width="125px" src="https://cdn.latinamericancupid.com/memphoto/Photo1/small/8950106.jpg">

                        </a>

                    </span>

                    <span class="icons">

                        <ul class="iconset">

                            <li class="iconstandard">

                                <a href="#" title="click here to view profile"></a>

                            </li>


                            <li class="iconmail">
                                <a style="display:none;" data-sitetranslationpath="en" class="launchRegistrationModal" href="javascript: void(0);"></a>

                                <a href="/en/mail/showemail?mid=8950106" title="Send Nono a message" class="emailpopup" rel="" memname=""></a>
                            </li>

                            <li class="iconinterest sendinterest" name="" data-altclass="iconinterestsent" data-msid="8950106" data-imageurl="" data-name="Nono"><a href="/en/memberrelationship/showinterest/070E86E6C5C940B4529D0A" title="Show interest in Nono"></a></li>

                            <li class="iconfavorites addfavorites" name="" data-altclass="iconfavoritessent" data-imageurl="" data-name="Nono"><a href="/en/memberrelationship/addfavorite/070E86E6C5C940B4529D0A" title="Add Nono to your favorites"></a></li>

                            <li class="icononlinemobileactive">

                                <a href="#" title="I'm Online - click to chat"></a>

                            </li>

                        </ul>
                    </span>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="view">
                <div class="pagination">

                    <span class="inactive">first</span>

                    <span class="inactive">&lt; prev</span>

                    <a href="#">next &gt;</a>

                    <a href="#">last</a>

                </div>
                <div class="clear"></div></div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
</script>
@endsection