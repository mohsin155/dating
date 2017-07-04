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
                <div class="clearfix"></div>
            </div>
            <div class="memberships">
                <div id="interestdiagram">
                    <h1>You haven't added any favorites yet</h1>
                    <p><strong>Your Favorites list is a great way to keep track of members you are particularly interested in. </strong></p>

                    <div class="diagram">


                        <img src="{{url('/')}}/image/favorites_face.gif" class="image">

                        <span class="or">or</span>
                        <img src="{{url('/')}}/image/favorites_page.gif" class="image">

                        <span class="diagramtext">To add a member to your favorites list, click on the 'Add Favorites' icon on their profile.</span>

                    </div>


                    <span class="btmtext">Browse your matches and start creating your Favorites list today.</span>

                    <a class="buttonlink" href="#">View Matches Now!</a>

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
