@extends('layouts.main')
@section('content')
<div id="bannerwrapper" class="clearfix" style="margin-top: 0px;">
    <div id="bannerpage">
        <div id="main-content">
            <div class="searchhdg">
                <div class="searchhdg2">
                    <h1> Your blocks
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
                    <h1>You haven't blocked anyone yet</h1>
                    <p><strong>If you have received an offensive message or received a message from someone that you do not like you can create a "Block" to stop that person from contacting you.</strong></p>

                    <div class="diagram">
                        <img src="{{url('/')}}/image/block_face.gif" class="image">

                        <span class="or">or</span>
                        <img src="{{url('/')}}/image/block_page.gif" class="image">

                        <span class="diagramtext">To add someone to your block list you can do any of the following:
                            <ul>
                                <li>After you read their message, click on "Block"</li>
                                <li>Click on "Block User" on their profile</li>
                                <li>Click on "Block" in the Instant Messenger "More" menu</li>
                            </ul>
                        </span>

                    </div>


                    <span class="btmtext">Continue your search for someone special....</span>

                    <a class="buttonlink" href="#">View Matches Now!</a>

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
