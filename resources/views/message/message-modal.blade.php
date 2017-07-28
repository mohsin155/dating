            <div class="modal-body" style="padding: 0px;">
                <div id="mail">
                    <div id="mailboxhdr">
                        <div id="mailheading"><div class="mailheading-cell"><h1>Send a message to {{$user_details->first_name}}</h1></div></div>
                    </div>
                    <!--<div id="senthdr">
                        <h1 id="mailheading-subject" class="mailheading">
                            I like your profile
                        </h1>
                        <div id="translate">
                            <div class="icons">
                                <a href="#" id="deletethread-btn" name="7418695">Delete All</a>
                                <a href="#" id="printthread-btn" name="7418695">Print</a>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>-->
                    <input name="user_id" value="{{$user_details->user_id}}" type="hidden" />
                    <div class="messages" dir="ltr">
                        <div id="msgprofile" class="clearfix" dir="ltr">
                            <span class="msgpic">
                                <a href="#" class="photo-display-popup" data-devicemode="1" name="" style="text-decoration:none">
                                    <div class="memberpicwidget4 morePhotos" title="">
                                        <h3><span class="memberpicwidget4">
                                            </span></h3>
                                        <?php $user_photo = !($user_details->photos->isEmpty())?url('uploads').'/' . $user_details->user_id.'/'.$user_details->photos[0]->photo_name:url('image/AffinityPhoto2.gif');?>
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
                            <a href="javascript:void(0);">
                                @if(!empty($user_details['interest_id']))
                                <img src="{{url('image/btn-interest-select-popup.gif')}}"  class="action-style" class="rollover" style="margin-top:3px">
                                @else
                                <img src="{{url('image/btn-interest-up-popup.gif')}}" class="action-style" border="0" id="interest-btn" class="rollover"></a>
                                @endif
                            </a>
                            </span>
                        </div>
                    </div>
                    <div class="scroll-pane-new">
                        <div id="nothread" class="hide">
                            <p class="opaque20_global nothread-large">Write your first message to Laura<br>↓</p>
                        </div>
                        <?php $my_pic = Utility::getUserImage();?>
                        @foreach($msg_details as $msg)
                        <span class="sentmsg" name="">
                            <div class="sentimg">
                                @if($msg->from_id==$user_details->user_id)
                                <span class="sentpic" style="background-image:url({{$user_photo}});"></span>
                                @else
                                <span class="sentpic" style="background-image:url({{$my_pic}});"></span>
                                @endif
                            </div>
                            <div class="sentbubble-sm2">
                                <div class="sentbubbletop-sm2">
                                    <p class="senttext-sm"><strong>Subject: </strong>{{config('constants.subject')[$msg->subject]}}<br><br>{{$msg->message}}</p>
                                    <span class="sentdate clearfix"><p>{{$msg->created_at}}</p>
<!--                                        <img src="../image/message-locked.gif" style="float:right;padding-left:5px" title="Laura can't read this message as you are both FREE standard members.<br /><strong>Upgrade now so Laura can read this message.</strong>" class="tipMeGold">-->
                                    </span>
                                    <span id="upgradetick">
                                        <img src="{{asset('image/upgrade-tick.gif')}}" class="tickicon" height="30" width="30">
                                        <p class="upgradeticknoupgrade-sm" style="font-size:14px;padding-top:7px;"><a href="#" target="_parent">Upgrade now</a> so {{$user_details->first_name}} can read this message.</p>
                                        <div class="clear"></div>
                                    </span>
                                    <img src="{{asset('image/btm-msgbubble-sm2.gif')}}" class="bottombubble">
                                </div></div>
                        </span>
                        @endforeach
                    </div>
                    <div id="basicViewBanner">
                        <a href="#" target="_parent" id="evtGUpgradeBannerBasicView"><img src="{{asset('image/upgradebanner3.gif')}}" border="0"></a>
                    </div>
                    <div id="reply" class="clearfix">
                        <form id="emailreplyform" method="post" action="" autocomplete="off">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="hidden" id="currentMostRecentSubject" name="folder_id" value="{{!($msg_details->isEmpty())?$msg_details[0]->folder_id:''}}">
                            <input type="hidden" name="to" value="{{$user_details->user_id}}">
                            <div id="replyform">
                                <ul>
                                    <li><label class="replyformlabel">Subject:&nbsp;</label>
                                        <select name="subject" id="emailsubject" class="outlineMe" tabindex="1">
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
                                            <span class="inbox-nopic" style="background-image:url('../image/nophoto_Male.gif');"></span>
                                        </label><textarea name="message" id="emailbody" rows="4" class="required defaultText outlineMe elasticMe defaultTextActive" title="Write a message to Yacania here" style="float: left; max-height: 350px; overflow: hidden;" tabindex="2"></textarea><div style="position: absolute; display: none; word-wrap: break-word; border-color: rgb(170, 170, 170); border-style: solid; border-width: 1px; font-weight: normal; width: 460px; font-family: Arial, Helvetica, sans-serif; line-height: normal; font-size: 12px; padding: 2px;">Write a message to Yacania here&nbsp;</div></li>
                                    <div class="validationerror"></div>
                                </ul>
                            </div>
                            <div class="submitbtn">
                                <input class="submit" type="button" id="sendEmailBtn" value="Send Message" tabindex="3"><br><br>
                            </div>
                            <div class="clear"></div>
                        </form>
                    </div>
                    <div>
                        <div class="clear"></div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
                <script>
                    $("#sendEmailBtn").on('click',function(){
    var user_id = $('#emailreplyform').find("input[name=to]").val();
    var basepath = $("input[name=basepath]").val();
    $.ajax({
        type: 'POST',
        url: basepath+'/message/send-message-popup',
        async: false,
        data: $("#emailreplyform").serialize(),
        success: function () {
            $.ajax({
            type: 'GET',
            url: basepath+'/message/popup-message/'+user_id,
            async: false,
            success: function (data) {
                //alert(data);
                $('.message-popup').html(data);
            }
        });
        }
    });
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