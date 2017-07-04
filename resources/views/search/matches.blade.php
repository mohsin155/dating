@extends('layouts.main')
@section('content')
<div id="bannerwrapper" class="clearfix" style="margin-top: 0px;">
    <div id="bannerpage">
        <div id="main-content">
            <div class="searchhdg">
                <div class="searchhdg2">
                    <h1> Search Results
                        <!--<img src="{{asset('image/q-mark.gif')}}" title="Users on this page match the criteria you specified in your match settings. You can edit your match settings by clicking the 'Improve Matches' link." class="tipMe">-->
                    </h1>

                    <a href="/match_registration.cfm">Improve Matches</a>
                </div>
                <div class="matchnav">


                    <!--<div class="matchnav_matches">
                        <span class="matches selectedTab"><img src="{{asset('image/icon_mymatches.png')}}" class="matchicon">My Matches</span> <a href="#"><img border="0" src="{{asset('image/icon_mutualmatches.png')}}" class="matchicon">Mutual Matches</a> <a href="#" class="reverse"><img border="0" src="{{asset('image/icon_reversematches.png')}}" class="matchicon">Reverse Matches</a>
                    </div>-->


                    <div class="clear"></div>

                </div>
                <div class="clearfix"></div>
                <div class="view">
                    <h1>View:</h1>
                    <ul class="views">


                        <li class="photoview"><a href="#" title="Photo View" class="tipMe"></a></li>

                        <li class="basicviewselected"><a href="#" title="Basic View" class="tipMe"></a></li>

                        <li class="detailview"><a href="#" title="Detail View" class="tipMe"></a></li>

                        <li class="profileview"><a href="#" title="Profile" class="tipMe"></a></li>

                    </ul>

                    <span class="display">1 - {{count($matches)}} of {{$total}}</span>


                    <div class="pagination">
                        @if($page_no == 0)
                        <span class="inactive">first</span>
                        <span class="inactive">&lt; prev</span>
                        @else
                        <a href="{{url('search/search-match').'?search_id='.$search_id}}">first</a>
                        <a href="{{url('search/search-match').'?search_id='.$search_id.'&page='.($page_no-1)}}">&lt; prev</a>
                        @endif

                        @if((($page_no*$per_page)+count($matches))>=$total)
                        <span class="inactive">next &gt;</span>
                        <span class="inactive">last</span>
                        @else
                        <a href="{{url('search/search-match').'?search_id='.$search_id.'&page='.($page_no+1)}}">next &gt;</a>
                        <a href="{{url('search/search-match').'?search_id='.$search_id.'&page='.(ceil($total/$per_page))}}">last</a>
                        @endif

                    </div>
                    <span class="orderby">
                        <p>Order By:</p>
                        <select name="order" id="jumpMenu">
                            <option value="1" {{$order==1?'selected':''}}>Newest members</option>
                            <option value="2" {{$order==2?'selected':''}}>Photos First</option>
                            <option value="3" {{$order==3?'selected':''}}>Last Active</option>
                            <option value="1" {{$order==1?'selected':''}}>Relevance</option>
                        </select>
                    </span>

                    <div class="clear"></div>
                </div>
            </div>
            <div class="memberships">
                @foreach($matches as $row)
                <div class="standardview">
                    <div class="standardinfo" style="">

                        <span class="memberpic">

                            <a href="javascript:void(0)" class="no-photo-display-popup" data-user="{{$row->user_id}}" >

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
                                <li class="iconmail open-email-popup" data-userid="{{$row->user_id}}">
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
            </div>
            <!--<div class="view">
                <div class="pagination">

                    <span class="inactive">first</span>

                    <span class="inactive">&lt; prev</span>

                    <a href="#">next &gt;</a>

                    <a href="#">last</a>

                </div>
                <div class="clear"></div></div>-->
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
    });
    $('body').on('click', '.sendinterest', function () {
        //$(".bg-loader").addClass("show");
        users.addInterest(this, "search", $(this).attr('data-id'));
    });
    // photo-display-popup
    $('body').on('click', '.no-photo-display-popup', function (e) {
        var user_id = $(this).attr('data-user');
        users.getProfile(user_id);
    });
    $("select[name=order]").on('change',function(){
        var url = removeParam('order',window.location.href);
        var final = url.indexOf("?")!=-1?url+"&order="+$(this).val():url+"?order="+$(this).val()+"&search_id={{$search_id}}";
        window.location.href = final;
    })
    function removeParam(key, sourceURL) {
    var rtn = sourceURL.split("?")[0],
        param,
        params_arr = [],
        queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
    if (queryString !== "") {
        params_arr = queryString.split("&");
        for (var i = params_arr.length - 1; i >= 0; i -= 1) {
            param = params_arr[i].split("=")[0];
            if (param === key) {
                params_arr.splice(i, 1);
            }
        }
        rtn = rtn + "?" + params_arr.join("&");
    }
    return rtn;
}
</script>
@endsection