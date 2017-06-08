@extends('layouts.main')
@section('content')
<div id="bannerwrapper" class="clearfix" style="margin-top: 0px;">
    <div id="bannerpage">
        <div id="main-content">
            <div id="mailpage">
                <div id="leftbar">
                    <div id="mailnav">
                        <ul>
                            <li>
                                <a href="#" id="inbox-icon" class="firstnav">Inbox (66)</a>
                            </li>

                            <li>
                                <a href="#" id="favorites-icon"><span>Favorites</span></a>
                            </li>



                            <li>
                                <a href="#" class="new-folder-icon" id="createNewFolder">New Folder</a>
                            </li>


                            <li><a href="#" id="sent-icon">Sent</a></li>
                            <li><a href="#" id="trash-icon">Trash</a></li>


                            <li><a href="#" id="mail-filtered-icon" class="lastnav">Create Filter</a></li>

                        </ul>
                    </div>
                </div>
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


                                    <a href="#" class="photo-display-popup" data-devicemode="1" name="Yacania  -  25  -  Santiago de los Caballeros, Santiago, Dominican Republic" style="text-decoration:none">

                                        <div class="memberpicwidget4 morePhotos" title="">
                                            <h3><span class="memberpicwidget4">

                                                </span></h3>

                                            <span class="widget-pic" style="background-image:url(https://cdn.latinamericancupid.com/memphoto/Photo1/small/7418695.jpg);"></span>

                                        </div>

                                    </a>


                                </span>
                                <div class="msgtext">
                                    <span class="msghdg">
                                        <strong class="profilehdg">Yacania (25)</strong>
                                        <div class="standard-badge-icon" title="Standard"></div>
                                    </span>
                                    Santiago de los Caballeros, Santiago, Dominican Republic<br>
                                    <strong>Seeking:</strong>

                                    Male 50 - 62


                                    <div class="roundedbutton">
                                        <a href="javascript:void(0);" class="tipMeMore roundedbuttonleft" title="" style="cursor:default;">More Info ↓</a>

                                        <a href="#" class="roundedbuttonright" target="_parent" id="viewProfileLink">View Profile »</a>
                                    </div>


                                </div>


                                <span class="msgbtns">

                                    <a href="#"><img src="{{asset('image/btn-blockuser-up.gif')}}" data-hover="#" name="" border="0" id="blockuser-btn-email" class="rollover"></a>

                                    <a href="#"><img src="{{asset('image/btn-favorites-up.gif')}}" data-hover="#" name="080382EEC2C043B4459D0A" border="0" id="favorites-btn-email" class="rollover" style="margin-top:5px"></a>

                                    <a href="#"><img src="{{asset('image/btn-interest-up.gif')}}" data-hover="#" border="0" name="080382EEC2C043B4459D0A" id="interest-btn-email" class="rollover" style="margin-top:5px"></a>

                                </span>
                            </div>
                        </div>
                        <div id="senthdr">
                            <h1 id="mailheading-subject" class="mailheading">
                                Hi, there!
                            </h1>

                            <div id="translate">

                                <div class="icons">

                                    <a href="#" id="deletethread-btn" name="7418695">Delete All</a>

                                    <a href="#" id="printthread-btn" name="7418695">Print</a>
                                </div>

                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="scroll-pane-new">

                            <span class="sentmsg" name="276134603">
                                <div class="sentimg"><span class="nopic" style="background-image:url(https://cdn.latinamericancupid.com/memphoto/Photo1/small/5362374.jpg);"></span></div>
                                <div class="sentbubble-sm"><div class="sentbubbletop-sm">

                                        <p class="senttext-sm"><a class="evtGblurryText" href="/en/payment/upgrade?useraction=readmail&amp;memberid=5362374" target="_parent"><img src="https://cdn.latinamericancupid.com/assets/images/mail/en/blurredtext4.gif" data-hover="https://cdn.latinamericancupid.com/assets/images/mail/en/blurredtext4-ov.gif" class="rollover" border="0"></a></p>

                                        <span class="sentdate">
                                            <a href="#" target="_parent">Rosanna</a>&nbsp;	June 5, 2017 8:18 AM

                                            <img src="{{asset('image/message-locked.gif')}}" title="As a FREE standard member you cannot read messages from other standard members.<br/><strong>Upgrade Now to read this message.</strong>" class="tipMeGold right">

                                            <div class="clear"></div></span>
                                        <img src="{{asset('image/btm-msgbubble-sm.gif')}}" class="bottombubble">
                                    </div></div>
                            </span>
                            <span class="sentmsg" name="276137481">
                                <div class="sentimg">
                                    <span class="sentpic" style="background-image:url('(../image/nophoto_Male.gif');"></span>
                                </div>
                                <div class="sentbubble-sm2">
                                    <div class="sentbubbletop-sm2">
                                        <div class="bglock">

                                            <p class="senttext-sm clearfix"> hello</p>
                                            <span class="sentdate clearfix">
                                                <p>June 5, 2017 8:32 AM</p>



                                                <img src="{{asset('image/message-locked.gif')}}" title="Rosanna can't read this message as you are both FREE standard members.<br /><strong>Upgrade now so Rosanna can read this message.</strong>" class="tipMeGold right">

                                            </span>
<!--                                            <img src="{{asset('image/btm-msgbubble-sm2.gif')}}" class="bottombubble">-->
                                        </div>
                                    </div>
                                </div>
                            </span>
                            <span class="sentmsg" name="276137481">
                                <div class="sentimg">
                                    <span class="sentpic" style="background-image:url(../image/nophoto_Male.gif);"></span>
                                </div>
                                <div class="sentbubble-sm2">
                                    <div class="sentbubbletop-sm2">
                                        <div class="bglock">

                                            <p class="senttext-sm clearfix"> hello</p>
                                            <span class="sentdate clearfix">
                                                <p>June 5, 2017 8:32 AM</p>



                                                <img src="{{asset('image/message-locked.gif')}}" title="Rosanna can't read this message as you are both FREE standard members.<br /><strong>Upgrade now so Rosanna can read this message.</strong>" class="tipMeGold right">

                                            </span>
                                            <img src="{{asset('image/btm-msgbubble-sm2.gif')}}" class="bottombubble">
                                        </div>
                                    </div>
                                </div>
                            </span>
                            <span class="sentmsg" name="276137481">
                                <div class="sentimg">
                                    <span class="sentpic" style="background-image:url(../image/nophoto_Male.gif);"></span>
                                </div>
                                <div class="sentbubble-sm2">
                                    <div class="sentbubbletop-sm2">
                                        <div class="bglock">

                                            <p class="senttext-sm clearfix"> hello</p>
                                            <span class="sentdate clearfix">
                                                <p>June 5, 2017 8:32 AM</p>



                                                <img src="{{asset('image/message-locked.gif')}}" title="Rosanna can't read this message as you are both FREE standard members.<br /><strong>Upgrade now so Rosanna can read this message.</strong>" class="tipMeGold right">

                                            </span>
                                            <img src="{{asset('image/btm-msgbubble-sm2.gif')}}" class="bottombubble">
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </div>

                        <div id="reply" class="clearfix">
                            <form id="emailreplyform" method="post" action="" autocomplete="off">
                                <input type="hidden" id="currentMostRecentSubject" name="" value="default_1">
                                <input type="hidden" id="replyID" name="replyID" value="">

                                <input type="hidden" id="replyMessageId" name="replyMessageId" value="">
                                <input type="hidden" id="memberID" name="memberID" value="">
                                <input name="mailsInThread" id="mailsInThread" type="hidden" readonly="readonly" value="2">
                                <input type="hidden" id="imbraconsent" name="imbraconsent" value="0">

                                <div id="replyform">
                                    <ul>
                                        <li><label class="replyformlabel">Subject:&nbsp;</label>

                                            <input size="30" type="text" id="emailsubject" name="subject" class="required defaultText outlineMe email-subject" title="Write a subject here" value="Hi, there!" tabindex="1">

                                        </li>
                                        <div class="validationerror"></div>

                                        <li><label class="replyformlabel">
                                                <span class="inbox-nopic" style="background-image:url('../image/nophoto_Male.gif');"></span>
                                            </label><textarea name="body" id="emailbody" rows="4" class="required defaultText outlineMe elasticMe defaultTextActive" title="Write a message to Yacania here" style="float: left; max-height: 350px; overflow: hidden;" tabindex="2"></textarea><div style="position: absolute; display: none; word-wrap: break-word; border-color: rgb(170, 170, 170); border-style: solid; border-width: 1px; font-weight: normal; width: 460px; font-family: Arial, Helvetica, sans-serif; line-height: normal; font-size: 12px; padding: 2px;">Write a message to Yacania here&nbsp;</div></li>
                                        <div class="validationerror"></div>
                                    </ul>
                                </div>

                                <div class="submitbtn">
                                    <input class="submit" type="submit" id="sendEmailBtn" name="7418695" value="Send Message" tabindex="3"><br><br>
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
                                    <div id="onlinesafetynav"><a href="/en/general/datingsafety">» For more safety tips click here</a></div>
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
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body" style="padding: 0px;">
                <div id="mail">
                    <div id="mailboxhdr">
                        <div id="mailheading"><div class="mailheading-cell"><h1>Send a message to laura</h1></div></div>

                    </div>
                    <div id="senthdr">
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
                    </div>
                    <div class="messages" dir="ltr">
                        <div id="msgprofile" class="clearfix" dir="ltr">
                            <span class="msgpic">


                                <a href="#" class="photo-display-popup" data-devicemode="1" name="Yacania  -  25  -  Santiago de los Caballeros, Santiago, Dominican Republic" style="text-decoration:none">

                                    <div class="memberpicwidget4 morePhotos" title="">
                                        <h3><span class="memberpicwidget4">

                                            </span></h3>

<!--                                        <span class="widget-pic" style="background-image:url(https://cdn.latinamericancupid.com/memphoto/Photo1/small/7418695.jpg);"></span>-->

                                    </div>

                                </a>


                            </span>
                            <div class="msgtext">
                                <span class="msghdg">
                                    <strong class="profilehdg">Yacania (25)</strong>
                                    <div class="standard-badge-icon" title="Standard"></div>
                                </span>
                                Santiago de los Caballeros, Santiago, Dominican Republic<br>
                                <strong>Seeking:</strong>

                                Male 50 - 62







                                <div class="roundedbutton">
                                    <a href="javascript:void(0);" class="tipMeMore roundedbuttonleft" title="" style="cursor:default;">More Info ↓</a>

                                    <a href="#" class="roundedbuttonright" target="_parent" id="viewProfileLink">View Profile »</a>
                                </div>


                            </div>


                            <span class="msgbtns">

                                <a href="#"><img src="http://localhost/dating/public/image/btn-blockuser-up.gif" data-hover="#" name="" border="0" id="blockuser-btn-email" class="rollover"></a>

                                <a href="#"><img src="http://localhost/dating/public/image/btn-favorites-up.gif" data-hover="#" name="080382EEC2C043B4459D0A" border="0" id="favorites-btn-email" class="rollover" style="margin-top:5px"></a>

                                <a href="#"><img src="http://localhost/dating/public/image/btn-interest-up.gif" data-hover="#" border="0" name="080382EEC2C043B4459D0A" id="interest-btn-email" class="rollover" style="margin-top:5px"></a>

                            </span>
                        </div>
                    </div>

                    <div class="scroll-pane-new">
                        <div id="nothread" class="hide">

                            <p class="opaque20_global nothread-large">Write your first message to Laura<br>↓</p>
                        </div>
                        <span class="sentmsg" name="">
                            <div class="sentimg"><span class="sentpic" style="background-image:url('../image/nophoto_Male.gif');"></span></div>
                            <div class="sentbubble-sm2">
                                <div class="sentbubbletop-sm2">
                                    <p class="senttext-sm"><strong>Subject: </strong>I like your profile<br><br>sadas</p>
                                    <span class="sentdate clearfix"><p>June 8, 2017 7:27 AM</p>


<!--                                        <img src="../image/message-locked.gif" style="float:right;padding-left:5px" title="Laura can't read this message as you are both FREE standard members.<br /><strong>Upgrade now so Laura can read this message.</strong>" class="tipMeGold">-->

                                    </span>
                                    <span id="upgradetick">
                                <img src="{{asset('image/upgrade-tick.gif')}}" class="tickicon" height="30" width="30">
                                
								<p class="upgradeticknoupgrade-sm" style="font-size:14px;padding-top:7px;"><a href="/en/payment/upgrade?useraction=standardtostandard&amp;memberid=452163" target="_parent">Upgrade now</a> so Jadhilly can read this message.</p>
                                <div class="clear"></div>
                            </span>
<!--                                    <div id="upgraderead2">

                                        <span id="upgradereadhdg">Upgrade now so Laura can read this</span>
                                        <div id="upgradereadwrap">
                                            <p id="readtext">Laura can't read this message as you are both FREE standard members.</p>
                                            <a class="evtGUpgradeButtonSentMail" href="#" target="_parent"><img src="{{asset('image/btn-upgradenow-big.gif')}}" class="upgradegreen" border="0"></a>
                                        </div>
                                        <div class="clear"></div>
                                    </div>-->

                                    <img src="{{asset('image/btm-msgbubble-sm2.gif')}}" class="bottombubble">
                                </div></div>
                        </span>
                   
                    </div>
                         <div id="basicViewBanner">
            	<a href="#" target="_parent" id="evtGUpgradeBannerBasicView"><img src="{{asset('image/upgradebanner3.gif')}}" border="0"></a>
            </div>
                    <div id="reply" class="clearfix">
                        <form id="emailreplyform" method="post" action="" autocomplete="off">
                            <input type="hidden" id="currentMostRecentSubject" name="" value="default_1">
                            <input type="hidden" id="replyID" name="replyID" value="">

                            <input type="hidden" id="replyMessageId" name="replyMessageId" value="">
                            <input type="hidden" id="memberID" name="memberID" value="">
                            <input name="mailsInThread" id="mailsInThread" type="hidden" readonly="readonly" value="2">
                            <input type="hidden" id="imbraconsent" name="imbraconsent" value="0">

                            <div id="replyform">
                                <ul>
                                    <li><label class="replyformlabel">Subject:&nbsp;</label>

                                        <select name="subject" id="emailsubject" class="outlineMe" tabindex="1">
                                            <option value="default_1">Hi, there!</option> <option value="default_2" selected="">I like your profile</option> <option value="default_3">Nice photo!</option> <option value="default_4">I'm interested in you</option> <option value="default_5">You caught my eye</option> <option value="default_6">You are cute</option> <option value="default_7">Love at first sight</option> <option value="default_8">We are a perfect match</option> <option value="default_9">Please accept my contact</option> <option value="default_10">Seeking marriage</option> 
                                        </select>

                                    </li>
                                    <div class="validationerror"></div>

                                    <li><label class="replyformlabel">
                                            <span class="inbox-nopic" style="background-image:url('../image/nophoto_Male.gif');"></span>
                                        </label><textarea name="body" id="emailbody" rows="4" class="required defaultText outlineMe elasticMe defaultTextActive" title="Write a message to Yacania here" style="float: left; max-height: 350px; overflow: hidden;" tabindex="2"></textarea><div style="position: absolute; display: none; word-wrap: break-word; border-color: rgb(170, 170, 170); border-style: solid; border-width: 1px; font-weight: normal; width: 460px; font-family: Arial, Helvetica, sans-serif; line-height: normal; font-size: 12px; padding: 2px;">Write a message to Yacania here&nbsp;</div></li>
                                    <div class="validationerror"></div>
                                </ul>
                            </div>

                            <div class="submitbtn">
                                <input class="submit" type="submit" id="sendEmailBtn" name="7418695" value="Send Message" tabindex="3"><br><br>
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

        </div>

    </div>
</div>
@endsection
@section('script')
<script>
    $(function ()
    {
        $('.scroll-pane')
                .jScrollPane()
                .bind(
                        'mousewheel',
                        function (e)
                        {
                            e.preventDefault();
                        }
                );
    });
    $('#myModal').modal('show');
</script>
@endsection
