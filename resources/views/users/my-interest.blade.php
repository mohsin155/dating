@extends('layouts.main')
@section('content')
<div id="bannerwrapper" class="clearfix" style="margin-top: 0px;">
    <div id="bannerpage">
        <div id="main-content">
            <div class="searchhdg">
                <div class="searchhdg2">
                    <h1> Your favourites
                        <!--<img src="{{asset('image/q-mark.gif')}}" title="Users on this page match the criteria you specified in your match settings. You can edit your match settings by clicking the 'Improve Matches' link." class="tipMe">-->
                    </h1>

                </div>
                <div class="matchnav">
                    <!--<div class="matchnav_matches">
                        <span class="matches selectedTab"><img src="{{asset('image/icon_mymatches.png')}}" class="matchicon">My Matches</span> <a href="#"><img border="0" src="{{asset('image/icon_mutualmatches.png')}}" class="matchicon">Mutual Matches</a> <a href="#" class="reverse"><img border="0" src="{{asset('image/icon_reversematches.png')}}" class="matchicon">Reverse Matches</a>
                    </div>-->
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="memberships">
                @if($interests->isEmpty())
                <div id="interestdiagram">
                    <h1>You haven't shown interest in anyone yet</h1>
                    <p><strong>Are you browsing through profiles on the site and see someone you're interested in? If you can't send a message yet, "Show Interest" in them instead!</strong></p>
                    <div class="diagram">
                        <img src="{{url('image/myinterest_face.gif')}}" class="image">
                        <span class="or">or</span>
                        <img src="{{url('image/myinterest_page.gif')}}" class="image">
                        <span class="diagramtext">To show interest in a member, click on the <strong>'Show Interest'</strong> icon on their profile.</span>
                    </div>
                    <span class="btmtext">Make the first move! Show Interest in someone who fits your match criteria.<strong>It's FREE!</strong></span>
                    <a class="buttonlink" href="#">View Matches Now!</a>
                </div>
                @else
                @foreach($interests as $row)
                <div class="standardview">
                    <div class="standardinfo" style="">

                        <span class="memberpic">

                            <a href="javascript:void(0)" class="no-photo-display-popup">

                                <img border="0" height="136px" width="125px" src="{{url('uploads')}}/{{Auth::user()->user_id}}/{{$row->photo_name}}">

                            </a>

                        </span>
                        <div class="text">

                            <p class="hdg1">

                                <a href="#">{{$row->first_name}} ({{$row->age}})</a>

                            </p>

                            <p><span class="hdg2"></span>
                                {{$row->city_name}}, {{$row->state_name}}, {{$row->country_name}}
                                <br>
                                @if(!empty($row->seeking))
                                <strong>Seeking:</strong> {{$row->gender}} {{!empty($row->min_age)? $row->min_age.' - ' :''}}{{!empty($row->max_age)? $row->max_age:''}}<br>
                                @endif
                                <strong>Last Login:</strong> {{humanTiming($row['last_login'])}}</p>
                        </div>

                        <span class="icons">
                            <ul class="iconset">
                                <li class="iconstandard">
                                    <a href="{{url('users/profile')}}/{{$row->user_id}}" title="click here to view profile"></a>
                                </li>
                                <li class="iconmail">
                                    <a style="display:none;" data-sitetranslationpath="en" class="launchRegistrationModal" href="javascript: void(0);"></a>
                                    <a href="#" title="Send {{$row->first_name}} a message" class="emailpopup" rel="" memname="{{$row->first_name}}"></a>
                                </li>
                                @if(empty($row->interest_id))
                                <li class="iconinterest sendinterest" name="" data-altclass="iconinterestsent" data-msid="" data-imageurl="" data-name="{{$row->first_name}}" data-id="{{$row->user_id}}"><a href="javascript:;" title="Show interest in {{$row->first_name}}"></a></li>
                                @else
                                <li class="iconreminterest" name="" data-altclass="iconinterestsent" data-msid="" data-imageurl="" data-name="{{$row->first_name}}" data-id="{{$row->user_id}}"><a href="javascript:;" title="You had shown interest in {{$row->first_name}}"></a></li>
                                @endif
                                @if(!empty($row->favourite_id))
                                <li class="iconremfavorites remfavorites" name="" data-altclass="iconfavoritessent" data-imageurl="" data-name="{{$row->first_name}}" data-id="{{$row->user_id}}">
                                    <a href="javascript:;" title="Remove {{$row->first_name}} from your favorites"></a></li>
                                @else
                                <li class="iconfavorites addfavorites" name="" data-altclass="iconfavoritessent" data-imageurl="" data-name="{{$row->first_name}}" data-id="{{$row->user_id}}">
                                    <a href="javascript:;" title="Add {{$row->first_name}} to your favorites"></a></li>
                                @endif
                                <li class="icononlinemobileactive">
                                    <a href="#" title="I'm Online - click to chat"></a>
                                </li>
                            </ul>
                        </span>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $('body').on('click', '.addfavorites', function () {
        //$(".bg-loader").addClass("show");
        users.addFavourite(this, "search", $(this).attr('data-id'));
    });
    $('body').on('click', '.remfavorites', function () {
        //$(".bg-loader").addClass("show");
        users.removeFavourite(this, "search", $(this).attr('data-id'));
    })
</script>
@endsection