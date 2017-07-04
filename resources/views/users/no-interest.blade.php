@extends('layouts.main')
@section('content')
<div id="bannerwrapper" class="clearfix" style="margin-top: 0px;">
    <div id="bannerpage">
        <div id="main-content">
            <div class="searchhdg">
                <div class="searchhdg2">
                    <h1> Your Interest
                        <!--<img src="{{asset('image/q-mark.gif')}}" title="Users on this page match the criteria you specified in your match settings. You can edit your match settings by clicking the 'Improve Matches' link." class="tipMe">-->
                    </h1>

                </div>
                <div class="matchnav">
                    <!--<div class="matchnav_matches">
                        <span class="matches selectedTab"><img src="{{asset('image/icon_mymatches.png')}}" class="matchicon">My Matches</span> <a href="#"><img border="0" src="{{asset('image/icon_mutualmatches.png')}}" class="matchicon">Mutual Matches</a> <a href="#" class="reverse"><img border="0" src="{{asset('image/icon_reversematches.png')}}" class="matchicon">Reverse Matches</a>
                    </div>-->
                    <div class="clear"></div>
                </div>
                <div class="clearfix"></div>
               
            </div>
            
            <div class="memberships">
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
                
            </div>
        </div>
    </div>
</div>
@endsection
