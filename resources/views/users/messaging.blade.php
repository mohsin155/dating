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
                            <form id="topform" method="post">
                                <input name="formType" id="topformType" type="hidden" value="">


                                <a href="/en/mail/showfilter" id="filterOff">
                                    <div class="mailheading-cell"><div class="filter-off tipMeRed" title="<strong>Message Filter is Off</strong><br/>Turning the message filter on will filter out messages that do not meet your filter criteria into a 'Filtered' folder.<br/><br/>To edit your filter criteria click on <strong>'Filter Settings'</strong>">Filter is off</div></div>
                                </a><input type="hidden" name="onOffFilter" value="1">

                            </form>
                            <div id="hdrnav">


                                <ul>
                                    <li style="padding-top:2px;display:block">


                                    </li><li class="visited">first</li>

                                    <li class="visited">&lt; prev</li>

                                    <li><a href="#">next &gt;</a></li>

                                    <li><a href="#">last</a></li>


                                </ul>
                            </div>
                        </div>
                        <div class="mailbox">
                            <form id="mailboxform" method="post">
                                <div class="medgrey" style="padding:5px">

                                    <input name="deleteChecked" type="button" value="Delete Checked" id="deleteChecked">

                                    <p class="display">Displaying 1 - 20 of 74</p>

                                    <select id="moveMailToFolder" name="moveMailToFolder" class="pull-right">
                                        <option value="">Copy checked to:</option>

                                        <option value="createNew">Create new folder</option>

                                    </select>

                                    <div class="clear">
                                    </div>
                                </div>
                                <div class="lightgrey mailboxhdg">
                                    <span class="title" style="padding:3px 5px"><input id="checkall" type="checkbox" value=""></span>
                                    <span class="subject-title">Subject</span>
                                    <span class="title from"><a href="#">From </a></span>
                                    <span class="title date"><a href="#">Date <img src="{{asset('image/arrowdown.gif')}}" border="0"></a></span>
                                    <span class="title grade"><a href="#">Grade </a></span>
                                </div>
                            </form>
                            <ul>
                                <li class="lightgrey">


                                    <span class="subject">
                                        <div class="center-cell">
                                            <span class="tickbox"><input name="mid" class="mid" type="checkbox"></span>
                                            <a href="#">

                                                <div class="mailIcon">

                                                    <img src="{{asset('image/unread1.gif')}}" title="New message - Click to read" class="tipMe" border="0">

                                                </div>

                                                <div class="subject2 ">
                                                    Hi, there! <br><span class="msg"> Ok...

                                                    </span>

                                                </div>
                                            </a></div><a href="#">

                                        </a></span><a href="#">
                                    </a>

                                    <span class="from">

                                        <div class="mailpic">

                                            <a href="#" class="photo-display-popup" data-devicemode="1" name="maribel  - 27 - Santo Domingo, Dominican Republic">

                                                <span style="background-image:url(../image/5099500.jpg);" class="inbox-pic memberpic5" title=""></span>

                                            </a>

                                        </div>


                                        <div class="name">
                                            <div class="center-cell">

                                                <a href="#"><span>maribel </span></a>



                                                <div id="online">
                                                    <span class="unbold">27 / Santo Domingo, Dominican Republic</span>
                                                </div>
                                            </div>
                                        </div>
                                    </span>


                                    <span class="date ">
                                        <div class="center-cell">5/7/17 8:15 PM
                                        </div>
                                    </span>

                                    <span class="grade">
                                        <div class="center-cell">
                                            <strong>

                                                <div class="standard-badge-icon" title="Standard"></div>

                                            </strong>
                                        </div>
                                    </span>
                                </li>
                                <li class="">


                                    <span class="subject">
                                        <div class="center-cell">
                                            <span class="tickbox"><input name="mid" class="mid" type="checkbox"></span>
                                            <a href="#">

                                                <div class="mailIcon">

                                                    <img src="{{asset('image/unread1.gif')}}" title="New message - Click to read" class="tipMe" border="0">

                                                </div>

                                                <div class="subject2 ">
                                                    Hi, there! <br><span class="msg"> Ok...

                                                    </span>

                                                </div>
                                            </a></div><a href="#">

                                        </a></span><a href="#">
                                    </a>

                                    <span class="from">

                                        <div class="mailpic">

                                            <a href="#" class="photo-display-popup" data-devicemode="1" name="maribel  - 27 - Santo Domingo, Dominican Republic">

                                                <span style="background-image:url(../image/5099500.jpg);" class="inbox-pic memberpic5" title=""></span>

                                            </a>

                                        </div>


                                        <div class="name">
                                            <div class="center-cell">

                                                <a href="#"><span>maribel </span></a>



                                                <div id="online">
                                                    <span class="unbold">27 / Santo Domingo, Dominican Republic</span>
                                                </div>
                                            </div>
                                        </div>
                                    </span>


                                    <span class="date ">
                                        <div class="center-cell">5/7/17 8:15 PM
                                        </div>
                                    </span>

                                    <span class="grade">
                                        <div class="center-cell">
                                            <strong>

                                                <div class="standard-badge-icon" title="Standard"></div>

                                            </strong>
                                        </div>
                                    </span>
                                </li>
                                <li class="lightgrey">


                                    <span class="subject">
                                        <div class="center-cell">
                                            <span class="tickbox"><input name="mid" class="mid" type="checkbox"></span>
                                            <a href="#">

                                                <div class="mailIcon">

                                                    <img src="{{asset('image/unread1.gif')}}" title="New message - Click to read" class="tipMe" border="0">

                                                </div>

                                                <div class="subject2 ">
                                                    Hi, there! <br><span class="msg"> Ok...

                                                    </span>

                                                </div>
                                            </a></div><a href="#">

                                        </a></span><a href="#">
                                    </a>

                                    <span class="from">

                                        <div class="mailpic">

                                            <a href="#" class="photo-display-popup" data-devicemode="1" name="maribel  - 27 - Santo Domingo, Dominican Republic">

                                                <span style="background-image:url(../image/5099500.jpg);" class="inbox-pic memberpic5" title=""></span>

                                            </a>

                                        </div>


                                        <div class="name">
                                            <div class="center-cell">

                                                <a href="#"><span>maribel </span></a>



                                                <div id="online">
                                                    <span class="unbold">27 / Santo Domingo, Dominican Republic</span>
                                                </div>
                                            </div>
                                        </div>
                                    </span>


                                    <span class="date ">
                                        <div class="center-cell">5/7/17 8:15 PM
                                        </div>
                                    </span>

                                    <span class="grade">
                                        <div class="center-cell">
                                            <strong>

                                                <div class="standard-badge-icon" title="Standard"></div>

                                            </strong>
                                        </div>
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <p class="deletemsg">* Messages older than 2 months will be deleted</p> 
                            <div id="hdrnav">
                                <ul>


                                    <li class="visited">first</li>

                                    <li class="visited">&lt; prev</li>

                                    <li><a href="#">next &gt;</a></li>

                                    <li><a href="#">last</a></li>

                                </ul>
                            </div>

                            <div class="clear"></div>
                        </div>
                    </div>    
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
