@extends('layouts.main')
@section('content')
<div id="bannerwrapper" class="clearfix" style="margin-top: 0px;">
    <div id="bannerpage">
        <div id="main-content">
            <div id="mailpage">
                @include('message.mail-left')
                <div id="right">
                    <div id="mail">
                        <div id="mailboxhdr">
                            <div id="mailheading"><div class="mailheading-cell"><h1>Received</h1></div></div>
                            <div id="hdrnav">
                                <form id="mailboxform" method="post">
                                    <input name="formType" id="formType" type="hidden" value="">
                                    <input name="mid" value="7418695" type="checkbox" checked="checked" style="display:none">
                                    <select id="moveMailToFolder" name="moveMailToFolder" class="movemail">
                                        <option value="">Copy message to:</option>
                                        <option value="createNew">Create new folder</option>
                                    </select>
                                </form>
                                <ul>
                                    <li style="padding-top:2px;display:block">
                                    </li><li><a href="#">&lt;&lt; back to inbox</a></li>
                                    <li class="visited">&lt; prev</li>
                                    <li><a href="#">next &gt;</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="messages" dir="ltr">
                            <div id="msgprofile" class="clearfix" dir="ltr">
                                <span class="msgpic">
                                    <a href="#" class="photo-display-popup" data-devicemode="1" name="" style="text-decoration:none">
                                        <div class="memberpicwidget4 morePhotos" title="">
                                            <h3><span class="memberpicwidget4">
                                                </span>
                                            </h3>
                                            <?php $user_photo = !empty($photos)?url('uploads').'/' . $user_details->user_id.'/'.$photos[0]->photo_name:url('image/AffinityPhoto2.gif');?>
                                            <span class="widget-pic" style="background-image:url({{$user_photo}});"></span>
                                        </div>
                                    </a>
                                </span>
                                <div class="msgtext">
                                    <span class="msghdg">
                                        <strong class="profilehdg">{{$user_details->first_name}} ({{$user_details->age}})</strong>
                                        <div class="standard-badge-icon" title="Standard"></div>
                                    </span>
                                    {{$user_details->city_name}}, {{$user_details->state_name}}, {{$user_details->city_name}}<br>
                                    <strong>Seeking:</strong>
                                    {{$user_details->seeking}} {{$user_details->min_age}} - {{$user_details->max_age}}
                                    <div class="roundedbutton">
                                        <a href="javascript:void(0);" class="tipMeMore roundedbuttonleft" title="" style="cursor:default;">More Info ↓</a>
                                        <a href="{{url('users/profile')}}/{{$user_details->user_id}}" class="roundedbuttonright" target="_parent" id="viewProfileLink">View Profile »</a>
                                    </div>
                                </div>
                                <span class="msgbtns">
                                    <a href="javascript:void(0);">
                                        @if(!empty($user_details->favourite_id))
                                        <img src="{{url('image/btn-favorites-select.gif')}}" border="0" id="favorites-rem" class="rollover">
                                        @else 
                                        <img src="{{url('image/btn-favorites-up.gif')}}" border="0" id="favorites-btn" class="rollover">
                                        @endif
                                    </a>
                                    <a href="javascript:void(0);">
                                        @if(!empty($user_details->interest_id))
                                        <img src="{{url('image/btn-interest-select-popup.gif')}}"  border="0" class="rollover" style="margin-top:5px">
                                        @else
                                        <img src="{{url('image/btn-interest-up.gif')}}" border="0" id="interest-btn" class="rollover" style="margin-top:5px">
                                        @endif
                                    </a>
                                    <a href="javascript:void(0);">
                                        @if(!empty($user_details->block_id))
                                        <img src="{{url('image/btn-blockuser-select.gif')}}"  border="0" class="rollover" id="blockuser-remove"  style="margin-top:5px">
                                        @else
                                        <img src="{{url('image/btn-blockuser-up.gif')}}" border="0" id="blockuser-btn" class="rollover" style="margin-top:5px">
                                        @endif
                                    </a>
                                    <!--<a href="#"><img src="{{asset('image/btn-blockuser-up.gif')}}" data-hover="#" name="" border="0" id="blockuser-btn-email" class="rollover"></a>
                                    <a href="#"><img src="{{asset('image/btn-favorites-up.gif')}}" data-hover="#" name="080382EEC2C043B4459D0A" border="0" id="favorites-btn-email" class="rollover" style="margin-top:5px"></a>
                                    <a href="#"><img src="{{asset('image/btn-interest-up.gif')}}" data-hover="#" border="0" name="080382EEC2C043B4459D0A" id="interest-btn-email" class="rollover" style="margin-top:5px"></a>-->
                                </span>
                            </div>
                        </div>
                        <div id="senthdr">
                            <h1 id="mailheading-subject" class="mailheading">
                                {{config('constants.subject')[$msg_details->last()->subject]}}
                            </h1>
                            <div id="translate">
                                <div class="icons">
                                    <a href="#" id="deletethread-btn" name="">Delete All</a>
                                    <a href="#" id="printthread-btn" name="">Print</a>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php $my_pic = Utility::getUserImage();?>
                        <div class="scroll-pane-new">
                            
                            @foreach($msg_details as $msg)
                            <span class="sentmsg" name="276137481">
                                <div class="sentimg">
                                    @if($msg->from_id==$user_details->user_id)
                                    <span class="nopic" style="background-image:url({{$user_photo}});"></span>
                                    @else
                                    <span class="nopic" style="background-image:url({{$my_pic}});"></span>
                                    @endif
                                </div>
                                <div class="sentbubble-sm2">
                                    <div class="sentbubbletop-sm2">
                                        <div class="bglock">
                                            <p class="senttext-sm clearfix"> {{$msg->message}}</p>
                                            <span class="sentdate clearfix">
                                                <p>{{$msg->created_at}}</p>
                                                <img src="{{asset('image/message-locked.gif')}}" title="Rosanna can't read this message as you are both FREE standard members.<br /><strong>Upgrade now so Rosanna can read this message.</strong>" class="tipMeGold right">
                                            </span>
                                            <img src="{{asset('image/btm-msgbubble-sm2.gif')}}" class="bottombubble">
                                        </div>
                                    </div>
                                </div>
                            </span>
                            <?php //$subject = end($msg_details)?$msg->subject:'';?>
                            @endforeach
                        </div>

                        <div id="reply" class="clearfix">
                            <form id="emailreplyform" method="post" action="{{url('message/send-message')}}" autocomplete="off">
                                <input name='folder_id' type="hidden" value="{{$folder_id}}" />
                                <input name='to' type="hidden" value="{{$user_details->user_id}}" />
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <div id="replyform">
                                    <ul>
                                        <li><label class="replyformlabel">Subject:&nbsp;</label>
                                            <select name="subject">
                                            <option value="1">Hi, there!</option>
                                            <option value="2">I like your profile</option>
                                            <option value="3">Nice photo!</option>
                                            <option value="4" selected="">I'm interested in you</option>
                                            <option value="5">You caught my eye</option>
                                            <option value="6">You are cute</option>
                                            <option value="7">Love at first sight</option>
                                            <option value="8">We are a perfect match</option>
                                            <option value="9">Please accept my contact</option>
                                            <option value="10">Seeking marriage</option>
                                            </select>
                                        </li>
                                        <div class="validationerror"></div>
                                        <li><label class="replyformlabel">
                                                <span class="inbox-nopic" style="background-image:url({{$my_pic}}});"></span>
                                            </label>
                                            <textarea name="message" id="emailbody" rows="4" class="required" title="Write a message here" style="float: left; max-height: 350px; overflow: hidden;" tabindex="2">
                                                
                                            </textarea>
                                            <div style="position: absolute; display: none; word-wrap: break-word; border-color: rgb(170, 170, 170); border-style: solid; border-width: 1px; font-weight: normal; width: 460px; font-family: Arial, Helvetica, sans-serif; line-height: normal; font-size: 12px; padding: 2px;">
                                                Write a message here&nbsp;</div></li>
                                        <div class="validationerror"></div>
                                    </ul>
                                </div>
                                <div class="submitbtn">
                                    <input class="submit" type="submit" id="sendEmailBtn" name="" value="Send Message" tabindex="3"><br><br>
                                </div>
                                <div class="clear"></div>
                            </form>
                        </div>
                        <div>
                            <div id="hdrnav">
                                <ul>
                                    <li class="visited">&lt; prev</li>
                                    <li class="visited">next &gt;</li>
                                </ul>
                            </div>

                            <div class="clear"></div>

                            <div id="onlinesafety">
                                <h1>Safety Tip - Protect your PC and keep your account safe</h1>
                                <div id="onlinesafetylady">
                                    <div id="odstright">
                                        <p>
                                            Ensure your PC has anti-virus software, a firewall and is upto date with all security patches.
                                        </p>
                                        <!--onlinesafetynav-->

                                        <div class="clear"></div>
                                    </div>
                                    <!--odstright-->
                                    <div id="onlinesafetynav"><a href="#">» For more safety tips click here</a></div>
                                    <!--onlinesafetylady2-->
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="clear"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@section('script')
<script>
$(function(){
    $('.scroll-pane').jScrollPane().bind('mousewheel',function (e){
        e.preventDefault();
    });
});

</script>
@endsection
@endsection

