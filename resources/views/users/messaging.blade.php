@extends('layouts.main')
@section('content')
<div id="bannerwrapper" class="clearfix" style="margin-top: 0px;">
    <div id="bannerpage">
        <div id="main-content">
            <div id="mailnav">
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

                                <li><a href="/en/mail/showinbox?page=2&amp;orderBy=1">next &gt;</a></li>

                                <li><a href="/en/mail/showinbox?page=4&amp;orderBy=1">last</a></li>


                            </ul>
                        </div>
                    </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jQuery -->
@endsection
