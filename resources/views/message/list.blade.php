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
                            <form id="topform" method="post">
                                <input name="formType" id="topformType" type="hidden" value="">
                                <a href="#" id="filterOff">
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
                                @foreach($messages as $row)
                                <li <?php echo $row->read_status == '0' ? 'class="lightgrey"' : ''; ?>>
                                    <span class="subject">
                                        <div class="center-cell">
                                            <span class="tickbox"><input name="mid" class="mid" type="checkbox"></span>
                                            <a href="#">
                                                <div class="mailIcon">

                                                    <img src="{{asset('image/unread1.gif')}}" title="New message - Click to read" class="tipMe" border="0">
                                                </div>
                                                <div class="subject2 ">
                                                    {{$row->subject}} <br><span class="msg"> {{$row->message}}
                                                    </span>
                                                </div>
                                            </a></div><a href="#">
                                        </a></span><a href="#">
                                    </a>
                                    <span class="from">
                                        <div class="mailpic">
                                            <a href="#" class="photo-display-popup" data-devicemode="1" name="">
                                                @if(!empty($row->photo_name))
                                                <span style="background-image:url({{url('uploads').'/' . $row->user_id.'/'}}{{$photo_name}});" class="inbox-pic memberpic5" title=""></span>
                                                @else
                                                <span style="background-image:url({{url('image/AffinityPhoto2.gif')}});" class="inbox-pic memberpic5" title=""></span>
                                                @endif
                                            </a>
                                        </div>
                                        <div class="name">
                                            <div class="center-cell">
                                                <a href="#"><span>{{$row->first_name}} </span></a>
                                                <div id="online">
                                                    <span class="unbold">{{$row->age}} / {{$row->city_name}}, {{$row->state_name}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                    <span class="date ">
                                        <div class="center-cell">{{$row->created_at}}
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
                                @endforeach
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

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Folder</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('message/create-folder')}}">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="text" name="folder_name" />
                <input type="submit" value="Submit" />
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
