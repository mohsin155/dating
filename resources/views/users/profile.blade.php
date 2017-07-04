@extends('layouts.main')
@section('content')
<div id="bannerwrapper" class="clearfix" style="margin-top: 0px;">
    <div id="bannerpage">
        <div id="main-content">
            <div id="profilepage">
                <div class="profiletop">
                    <div class="topleft">
                        @if(!empty($user_details['photos']))
                        <div id="pic" class="loading" style="background:url({{$image_path.'/'.$user_details['photos'][0]['photo_name']}}) no-repeat center center">
                            @else 
                            <div id="pic" class="loading" style="background:url({{url('image/nophoto_Male.gif')}}) no-repeat center center">
                            @endif
                            <div id="videoDisplay"></div>
                        </div>
                        <div class="addcomment">
                            <a id="photoComment" class="photo-display-popup" href="#">Comment on photo</a>
                        </div>
                    </div>
                    <div class="topright">
                        <div class="profilebubble">
                            <div class="bubble">
                                <p><span>{{$user_details['profile_heading']}}</span></p>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div id="profileinfo">
                            <div>
                                <span>{{$user_details['first_name']}} ({{$user_details['age']}})&nbsp;<img src="{{url('image/icon-standard.gif')}}" width="22" height="22"></span>
                                <div class="clear"></div>
                            </div>
                            <p>{{$user_details['gender']}} <strong style="color:#CCC">/</strong>
                                {{$user_details['marital_status']}} 
                                <strong style="color:#CCC">/</strong>  <strong style="color:#AAA;">ID: {{$user_details['user_id']}}</strong>
                                <br>

                                {{$user_details['city_name']}}, {{$user_details['state_name']}}, {{$user_details['country_name']}}
                                <br>

                                <strong>Seeking:</strong>
                                Male 40 - 60 living in Algeria 
                                <br>
                                <strong>For:</strong>
                                {{$user_details['relationship']}} 
                                <br>
                                <strong>Last active:</strong> {{humanTiming($user_details['last_login'])}}</p>
                        </div>
                        <div id="quickview">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" id="table2">
                                <tbody><tr>
                                        <td colspan="4" align="right" class="beige" id="td4">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="darkbeige">
                                                <tbody><tr>
                                                        <td width="55%" align="left"><div style="border-bottom:solid 1px #7d7f48;padding:10px;font:12px Arial, Helvetica, sans-serif"><strong style="color:#333416">Quick View 
                                                                    &nbsp;<a href="#" class="">[Edit]</a>
                                                                </strong></div></td>
                                                        <td width="45%" align="left" valign="bottom"><img src="{{url('image/matches-hdr.gif')}}" width="150" height="40"></td>
                                                    </tr>
                                                </tbody></table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="td3" class="beige" width="31%" align="left">Education:</td>
                                        <td id="td3" class="ag_16" width="49%">
                                            {{$user_details['education']}}
                                        </td>
                                        <td width="11%" class="matchesme" id="td2">
                                            <img src="{{url('image/green-dot.gif')}}" width="10" height="10" alt="Match">
                                        </td>
                                        <td width="9%" class="matchesthem" id="td2">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="td3" class="beige" width="31%" align="left">Have children:</td>
                                        <td id="td3" class="ag_6" width="49%">
                                            {{$user_details['have_children']}}
                                        </td>
                                        <td width="11%" class="matchesme" id="td2">
                                            <img src="{{url('image/green-dot.gif')}}" width="10" height="10" alt="Match">
                                        </td>
                                        <td width="9%" class="matchesthem" id="td2">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="td3" class="beige" width="31%" align="left">Drink:</td>
                                        <td id="td3" class="ag_15" width="49%">
                                            {{$user_details['drink']}}
                                        </td>
                                        <td width="11%" class="matchesme" id="td2">
                                            <img src="{{url('image/green-dot.gif')}}" width="10" height="10" alt="Match">
                                        </td>
                                        <td width="9%" class="matchesthem" id="td2">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="td3" class="beige" width="31%" align="left">Smoke:</td>
                                        <td id="td3" class="ag_51" width="49%">
                                            {{$user_details['smoke']}}
                                        </td>
                                        <td width="11%" class="matchesme" id="td2">
                                            <img src="{{url('image/green-dot.gif')}}" width="10" height="10" alt="Match">
                                        </td>
                                        <td width="9%" class="matchesthem" id="td2">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="td3" class="beige" width="31%" align="left">Religion:</td>
                                        <td id="td3" class="ag_45" width="49%">
                                            {{$user_details['religion']}}
                                        </td>
                                        <td width="11%" class="matchesme" id="td2">
                                            <img src="{{url('image/green-dot.gif')}}" width="10" height="10" alt="Match">
                                        </td>
                                        <td width="9%" class="matchesthem" id="td2">
                                            <img src="{{url('image/green-dot.gif')}}" width="10" height="10" title="Looking For<br/> Religion: Any" class="tipMeMatchTrue">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="td3" class="beige" width="31%" align="left">Occupation:</td>
                                        <td id="td3" class="ag_40" width="49%">
                                            {{$user_details['occupation']}}
                                        </td>
                                        <td width="11%" class="matchesme" id="td2">
                                            <img src="{{url('image/green-dot.gif')}}" width="10" height="10" alt="Match">
                                        </td>
                                        <td width="9%" class="matchesthem" id="td2">
                                            <img src="{{url('image/green-dot.gif')}}" width="10" height="10" title="Looking For<br/> Occupation: Any" class="tipMeMatchTrue">
                                        </td>
                                    </tr>
                                </tbody></table>
                        </div>
                        <div id="btns">
                            <a href="javascript:void:;">
                                @if(!empty($user_details['interest_id']))
                                <img src="{{url('image/btn-interest-select.gif')}}" data-hover="btn-interest-ov.gif" width="145" height="30" border="0" name="" id="" class="rollover">
                                @else
                                <img src="{{url('image/btn-interest-up.gif')}}" data-hover="btn-interest-ov.gif" width="145" height="30" border="0" name="" id="interest-btn" class="rollover">
                                @endif
                            </a>
                            <a href="javascript:void(0);" class="emailpopup open-email-popup" data-userid="{{$user_details['user_id']}}"><img src="{{url('image/btn-mail-up.gif')}}" width="145" height="30" border="0" id="mail-btn" class="rollover" /></a>
                            <div class="clear"></div>
                        </div>
                        <div id="slider" style="-moz-border-radius: 7px; border-radius: 7px;">
                            <div id="sliderpics">
                                @foreach($user_details['photos'] as $photo)
                                <a href="javascript:void(0);" class="enlargeThumb" name="1" rel="1">
                                    <img src="{{$image_path.$photo['photo_name']}}" id="283218" name="1" width="55" height="60" class="sliderpic">
                                </a>
                                @endforeach
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div> 
                <div class="navmenu">
                    <ul class="navtabs">
                        <li id="tab-profile" class="selected"><a href=""><span>Profile</span></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <input type="hidden" name="user_id" value="{{$user_details['user_id']}}" />
                <div class="profile2">
                    <div class="profileleft">
                        <div id="buttons">
                            <a href="javascript:void(0);">
                               @if(!empty($user_details['favourite_id']))
                               <img src="{{url('image/btn-favorites-select.gif')}}" class="action-style" border="0" id="favorites-rem" class="rollover">
                               @else 
                               <img src="{{url('image/btn-favorites-up.gif')}}" class="action-style" border="0" id="favorites-btn" class="rollover">
                               @endif
                               </a>
                            <a href="javascript:void(0);">
                                @if(!empty($user_details['block_id']))
                                <img src="{{url('image/btn-blockuser-select.gif')}}"  class="action-style" id="blockuser-rem" class="rollover" style="margin-top:3px">
                                @else
                                <img src="{{url('image/btn-blockuser-up.gif')}}" class="action-style" border="0" id="blockuser-btn" class="rollover">
                                @endif
                            </a>
                            <a href="#" class=""><img src="{{url('image/btn-report-up.gif')}}" name="report" class="action-style" border="0" id="report-btn" class="rollover" style="margin-top:3px"></a>
                        </div>
                        <div id="cupidwords">
                            <table width="135" border="0" cellpadding="0" cellspacing="0" dir="ltr">
                                <tbody><tr>
                                        <td id="td"><img src="{{url('image/cupidwords-top.gif')}}" border="0"><img src="{{url('image/cupidwords-q.gif')}}" title="" class="tipMe" border="0"></td>
                                    </tr>
                                    <tr>
                                        <td height="5px"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table width="135" border="0" cellpadding="0" cellspacing="0">

                                                <tbody>
                                                    <!--<tr>
                                                        <td id="tdprofile"><a href="#">Giving</a></td>
                                                        <td width="29" align="center" valign="middle" id="tdprofile2"><a href="#" class="assignCupidWordLink"><img src="{{url('image/btn-cross.gif')}}" border="0" id="addCupidWordImage1645"></a></td>
                                                    </tr>

                                                    <tr>
                                                        <td id="tdprofile" colspan="2" style="text-align:right"></td>
                                                    </tr>-->

                                                </tbody></table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="{{url('image/cupidwords-btm.gif')}}" alt="" style="border:0"></td>
                                    </tr>
                                </tbody></table>
                        </div>



                        <div id="moremembers" style="background: none center center no-repeat; padding: 20px 8px;"></div>
                    </div>
                    <div id="profile-main" class="profileright" style="display:block;">
                        <div class="profiletext">
                            <div class="navmenu2">
                                <p>Member Overview 
                                </p>

                                <ul class="navtabs">
                                    <li class="translation-tab selected"><a href=""><span class="translation-link left">English <b style="display:inline;border:solid 1px #333;font-weight:bold;margin-left:5px;padding:0 2px;color:#333;background-color:#fff" title="Profile translations are automatically generated using a computer program. If this translation does not make sense it's possible that the computer program has mis-translated this text." class="tipMe">?</b></span></a></li>
                                    <!--<li class="original-tab"><a href=""><span class="original-link left">Original Spanish</span></a></li>-->
                                </ul>

                                <div class="clear"></div>

                            </div>
                            <div class="translatedText">
                                <p>{{$user_details['about_yourself']}}</p><p></p>
                            </div>
                            <div id="profiledetailhdr" class="grey">
                                <span>
                                    About {{$user_details['first_name']}}
                                </span>
                                <img src="{{url('image/icon-matchme-rtl.gif')}}" width="85" height="35" border="0" class="left">
                                <p>
                                    @if($user_details['gender']=='male') He's @else She's @endif Looking For 
                                </p>
                                <img src="{{url('image/icon-matchthem-rtl.gif')}}" width="85" height="35" border="0" class="left">
                                <div class="clear"></div>
                            </div>
                            <div id="profiledetail">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" id="table">
                                    <tbody>
                                        <tr>
                                            <td id="profiledetailhdr2" align="left" colspan="5"><em>Basic&nbsp;&nbsp;<a href="javascript:void(0);" id="hideshow" class="hide" style="font-weight:normal;">[ hide unanswered questions ]</a>&nbsp;</em></td>
                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Gender:</td>
                                            <td id="td1" width="1%" align="center" class="beige">
                                            </td>
                                            <td id="td1" width="31%" class="ag_23">
                                                 {{$user_details['gender']}}
                                            </td>

                                            <td id="td1" width="36%" class="ag_23" align="left">
                                                {{(empty($match_details))?'Any':$match_details['gender']}}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Age:<img style="margin-left:5px;margin-top:2px;" height="12px" width="12px" src="{{url('image/q-mark.gif')}}" id="tipMeAgeInfo" title="For privacy reasons, age is accurate to within 2 weeks
                                                                                                         " border="0"></td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_1">
                                                {{$user_details['age']}}
                                            </td>

                                            <td id="td1" width="36%" class="ag_1" align="left">
                                                {{(empty($match_details))?'Any':$match_details['min_age']}} - {{(empty($match_details))?'Any':$match_details['max_age']}}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Lives in:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_11">
                                                {{$user_details['city_name']}}, {{$user_details['state_name']}}, {{$user_details['country_name']}}
                                            </td>
                                            <td id="td1" width="36%" class="ag_11" align="left">
                                                Peru 
                                            </td>

                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Relocate:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_48">
                                                {{$user_details['relocate']}} 
                                            </td>

                                            <td id="td1" width="36%" class="ag_48" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['relocate']}}</em>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td id="profiledetailhdr2" align="left" colspan="5"><em>Appearance&nbsp;</em></td>
                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Hair color:</td>
                                            <td id="td1" width="1%" align="center" class="beige">
                                            </td>
                                            <td id="td1" width="31%" class="ag_24">
                                                {{$user_details['hair_color']}}
                                            </td>
                                            <td id="td1" width="36%" class="ag_24" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['haircolor']}}</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Hair length:</td>
                                            <td id="td1" width="1%" align="center" class="beige">
                                            </td>
                                            <td id="td1" width="31%" class="ag_25">
                                                {{$user_details['hair_length']}}
                                            </td>

                                            <td id="td1" width="36%" class="ag_25" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['hair_length']}}</em>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Hair type:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_26">
                                                {{$user_details['hair_type']}} 
                                            </td>
                                            <td id="td1" width="36%" class="ag_26" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['hair_type']}}</em>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Eye color:</td>
                                            <td id="td1" width="1%" align="center" class="beige">
                                            </td>
                                            <td id="td1" width="31%" class="ag_20">
                                                {{$user_details['eye_color']}}
                                            </td>

                                            <td id="td1" width="36%" class="ag_20" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['eye_color']}}</em>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Eye wear:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_21">
                                                {{$user_details['eye_wear']}}
                                            </td>
                                            <td id="td1" width="36%" class="ag_21" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['eye_wear']}}</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Height:</td>
                                            <td id="td1" width="1%" align="center" class="beige">
                                            </td>
                                            <td id="td1" width="31%" class="ag_27">
                                                {{$user_details['height']}} (cm) 
                                            </td>
                                            <td id="td1" width="36%" class="ag_27" align="left">
                                               {{(empty($match_details))?'Any':$match_details['min_height']}} (cm) - {{(empty($match_details))?'Any':$match_details['max_height']}} (cm)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Weight:</td>
                                            <td id="td1" width="1%" align="center" class="beige">
                                            </td>
                                            <td id="td1" width="31%" class="ag_53">
                                                {{$user_details['weight']}} (kg) 
                                            </td>
                                            <td id="td1" width="36%" class="ag_53" align="left">
                                                {{(empty($match_details))?'Any':$match_details['min_weight']}} (kg) - {{(empty($match_details))?'Any':$match_details['max_weight']}} (kg)
                                            </td>

                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Body style:</td>
                                            <td id="td1" width="1%" align="center" class="beige">
                                            </td>
                                            <td id="td1" width="31%" class="ag_5">
                                                {{$user_details['body_type']}} 
                                            </td>
                                            <td id="td1" width="36%" class="ag_5" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['body']}}</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Ethnicity:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_18">
                                                {{$user_details['ethnicity']}}
                                            </td>

                                            <td id="td1" width="36%" class="ag_18" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['ethnicity']}}</em>
                                            </td>

                                        </tr>
                                        <tr class="collapsable">
                                            <td id="td1" width="21%" align="left" class="beige">Facial hair:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_22">

                                                <em>N/A</em>

                                            </td>
                                            <td id="td1" width="36%" class="ag_22" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['facial_hair']}}</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Best feature:</td>
                                            <td id="td1" width="1%" align="center" class="beige">
                                            </td>
                                            <td id="td1" width="31%" class="ag_3">
                                                {{$user_details['best_feature']}}
                                            </td>

                                            <td id="td1" width="36%" class="ag_3" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['best_feature']}}</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Body art:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_4">
                                                {{$user_details['body_art']}}
                                            </td>
                                            <td id="td1" width="36%" class="ag_4" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['body_art']}}</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Appearance:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_2">
                                                {{$user_details['appearance']}} 
                                            </td>
                                            <td id="td1" width="36%" class="ag_2" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['appearance']}}</em>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td id="profiledetailhdr2" align="left" colspan="5"><em>Lifestyle&nbsp;</em></td>
                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Drink:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_15">
                                                {{$user_details['drink']}} 
                                            </td>

                                            <td id="td1" width="36%" class="ag_15" align="left">
                                                {{(empty($match_details))?'Any':$match_details['drink']}}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Smoke:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_51">
                                                {{$user_details['smoke']}} 
                                            </td>

                                            <td id="td1" width="36%" class="ag_51" align="left">
                                                {{(empty($match_details))?'Any':$match_details['smoke']}}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Marital Status:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_37">
                                                {{$user_details['marital_status']}}
                                            </td>

                                            <td id="td1" width="36%" class="ag_37" align="left">
                                                {{(empty($match_details))?'Any':$match_details['marital_status']}}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Have children:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_6">
                                                {{$user_details['have_children']}}
                                            </td>

                                            <td id="td1" width="36%" class="ag_6" align="left">
                                                {{(empty($match_details))?'Any':$match_details['have_children']}}
                                            </td>

                                        </tr>
                                        <tr class="collapsable">
                                            <td id="td1" width="21%" align="left" class="beige">Number of children:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_7">

                                                <em>{{$user_details['no_children']}}</em>

                                            </td>

                                            <td id="td1" width="36%" class="ag_7" align="left">


                                                <em>{{(empty($match_details))?'Any':$match_details['no_children']}}</em>

                                            </td>

                                        </tr>
                                        <tr class="collapsable">
                                            <td id="td1" width="21%" align="left" class="beige">Oldest child:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_8">
                                                <em>{{$user_details['oldest_child']}}</em>
                                            </td>
                                            <td id="td1" width="36%" class="ag_8" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['old_child']}}</em>
                                            </td>

                                        </tr>
                                        <tr class="collapsable">
                                            <td id="td1" width="21%" align="left" class="beige">Youngest child:</td>
                                            <td id="td1" width="1%" align="center" class="beige">
                                            </td>
                                            <td id="td1" width="31%" class="ag_10">
                                                <em>{{$user_details['youngest_child']}}</em>
                                            </td>
                                            <td id="td1" width="36%" class="ag_10" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['min_age']}}</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Want (more) children:</td>
                                            <td id="td1" width="1%" align="center" class="beige">
                                            </td>
                                            <td id="td1" width="31%" class="ag_9">
                                                {{$user_details['more_child']}} 
                                            </td>

                                            <td id="td1" width="36%" class="ag_9" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['more_child']}}</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Have pets:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_41">
                                                {{$user_details['have_pets']}}
                                            </td>
                                            <td id="td1" width="36%" class="ag_41" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['have_pets']}}</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Occupation:</td>
                                            <td id="td1" width="1%" align="center" class="beige">
                                            </td>
                                            <td id="td1" width="31%" class="ag_40">
                                                {{$user_details['occupation']}}
                                            </td>
                                            <td id="td1" width="36%" class="ag_40" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['occupation']}}</em>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Employment status:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_17">
                                                {{$user_details['employment']}}
                                            </td>
                                            <td id="td1" width="36%" class="ag_17" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['employement']}}</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Income:</td>
                                            <td id="td1" width="1%" align="center" class="beige">
                                            </td>
                                            <td id="td1" width="31%" class="ag_29">
                                                {{$user_details['income']}} 
                                            </td>
                                            <td id="td1" width="36%" class="ag_29" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['income']}}</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Home type:</td>
                                            <td id="td1" width="1%" align="center" class="beige">
                                            </td>
                                            <td id="td1" width="31%" class="ag_28">
                                                {{$user_details['home_type']}}
                                            </td>
                                            <td id="td1" width="36%" class="ag_28" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['home_type']}}</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Living situation:</td>
                                            <td id="td1" width="1%" align="center" class="beige">
                                            </td>
                                            <td id="td1" width="31%" class="ag_36">
                                                {{$user_details['living_situation']}}
                                            </td>
                                            <td id="td1" width="36%" class="ag_36" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['living_situation']}}</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="profiledetailhdr2" align="left" colspan="5"><em>Background / Cultural Values&nbsp;</em></td>
                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Nationality:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_38">
                                                {{$user_details['nationality']}} 
                                            </td>

                                            <td id="td1" width="36%" class="ag_38" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['nationality']}}</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Education:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_16">
                                                {{$user_details['education']}}
                                            </td>

                                            <td id="td1" width="36%" class="ag_16" align="left">
                                                {{(empty($match_details))?'Any':$match_details['eduction']}}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Languages spoken:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_35">
                                                {{$user_details['languages']}}
                                            </td>

                                            <td id="td1" width="36%" class="ag_35" align="left">


                                                <em>{{(empty($match_details))?'Any':$match_details['languages']}}</em>

                                            </td>

                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Portuguese ability:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_69">
                                                {{$user_details['portugese_ability']}} 
                                            </td>

                                            <td id="td1" width="36%" class="ag_69" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['postugese_ability']}}</em>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Spanish ability:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_71">
                                                {{$user_details['spanish_ability']}}
                                            </td>

                                            <td id="td1" width="36%" class="ag_71" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['spanish_ability']}}</em>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Religion:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_45">
                                                {{$user_details['religion']}} 
                                            </td>

                                            <td id="td1" width="36%" class="ag_45" align="left">
                                                {{(empty($match_details))?'Any':$match_details['religion']}}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Religious values:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_47">
                                                {{$user_details['religious_values']}}
                                            </td>

                                            <td id="td1" width="36%" class="ag_47" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['religious_values']}}</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Star sign:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_52">
                                                {{$user_details['star_sign']}} 
                                            </td>

                                            <td id="td1" width="36%" class="ag_52" align="left">
                                                <em>{{(empty($match_details))?'Any':$match_details['star_sign']}}</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="profiledetailhdr2" align="left" colspan="5"><em>Personal&nbsp;</em></td>
                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Bust cup size:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_87">
                                                Prefer not to say 
                                            </td>

                                            <td id="td1" width="36%" class="ag_87" align="left">


                                                <em>N/A</em>

                                            </td>

                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Bust:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_86">
                                                Prefer not to say 
                                            </td>

                                            <td id="td1" width="36%" class="ag_86" align="left">


                                                <em>N/A</em>

                                            </td>

                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Waist:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_89">
                                                27" (69 cm) 
                                            </td>

                                            <td id="td1" width="36%" class="ag_89" align="left">


                                                <em>N/A</em>

                                            </td>

                                        </tr>
                                        <tr>
                                            <td id="td1" width="21%" align="left" class="beige">Hips:</td>
                                            <td id="td1" width="1%" align="center" class="beige">

                                            </td>
                                            <td id="td1" width="31%" class="ag_88">
                                                35" (90 cm) 
                                            </td>

                                            <td id="td1" width="36%" class="ag_88" align="left">


                                                <em>N/A</em>

                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                                <div class="clearfix"></div>

                            </div>
                            <div class="profiletext">
                                <div class="navmenu2">
                                    <p>Seeking 
                                    </p>

                                    <ul class="navtabs">
                                        <li class="translation-tab selected"><a href=""><span class="translation-link">English</span></a></li>
                                        <!--<li class="original-tab"><a href=""><span class="original-link">Original Spanish</span></a></li>-->
                                    </ul>

                                    <div class="clear"></div>
                                </div>



                                <div class="originalText" style="display: none;">
                                    <p></p>{{$user_details['partner']}}<p></p>
                                </div>
                                <div class="translatedText">
                                    <p>{{$user_details['partner']}}</p><p></p>
                                </div>
                            </div>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                        <td colspan="3" height="10px" align="center"></td>
                                    </tr>
                                    <tr>
                                        <td width="27%" align="center">
                                            <a href="#"><img src="{{url('image/btn-interest-up.gif')}}"  width="145" height="30" border="0" class="rollover"></a>
                                        </td>
                                        <td width="24%" align="center">
                                            <a href="#"><img src="{{url('image/btn-mail-up.gif')}}"  width="145" height="30" border="0"></a>
                                        </td>
                                        <td width="49%"><div id="backtotop"><a href="#">Back To Top &gt;&gt;</a></div></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" align="center" height="10px"></td>
                                    </tr>
                                </tbody></table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>    
<!-- jQuery -->

@endsection
@section('script')
<script>
    $(".sliderpic").on('click',function(){
        var src = $(this).attr('src');
        $("#pic").css("background","url("+src+") no-repeat center center");
    });
    $('body').on('click','#favorites-btn',function(){
        $(".bg-loader").addClass("show");
        users.addFavourite("#favorites-btn","profile",$("input[name=user_id]").val());
    });
    $('body').on('click','#favorites-rem',function(){
        $(".bg-loader").addClass("show");
        users.removeFavourite("#favorites-rem","profile",$("input[name=user_id]").val());
    });
    $('body').on('click','#blockuser-btn',function(){
        $(".bg-loader").addClass("show");
        users.blockUser("#blockuser-btn","profile",$("input[name=user_id]").val());
    });
    $('body').on('click','#blockuser-rem',function(){
        $(".bg-loader").addClass("show");
        users.unblockUser("#blockuser-rem","profile",$("input[name=user_id]").val());
    });
    $('body').on('click','#interest-btn',function(){
        $(".bg-loader").addClass("show");
        users.addInterest("#interest-btn","profile",$("input[name=user_id]").val());
    });
</script>
@endsection