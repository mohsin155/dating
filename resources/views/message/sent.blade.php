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
                            <div id="mailheading"><div class="mailheading-cell"><h1>Sent</h1></div></div>
                            
                            <div id="hdrnav">
                                <!--<ul>
                                    <li style="padding-top:2px;display:block">
                                    </li><li class="visited">first</li>
                                    <li class="visited">&lt; prev</li>
                                    <li><a href="#">next &gt;</a></li>
                                    <li><a href="#">last</a></li>
                                </ul>-->
                            </div>
                        </div>
                        <form id="mailboxform" method="post" action="{{url('message/update-message')}}">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input name="action" type="hidden" value=""/>
                        <div class="mailbox">
                                <div class="medgrey" style="padding:5px">
                                    <input name="deleteChecked" type="button" value="Delete Checked" id="deleteChecked">
                                    <p class="display-inner">Displaying {{(config('constants.msg_per_page')*$page_no)+1}} - {{(config('constants.msg_per_page')*$page_no)+count($messages)}} of {{$total}}</p>
                                    
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
                            <ul>
                                @foreach($messages as $row)
                                <li <?php echo $row->read_status == '0' ? 'class="lightgrey"' : ''; ?>>
                                    <span class="subject">
                                        <div class="center-cell">
                                            <span class="tickbox"><input name="from_id[]" class="mid" type="checkbox" value="{{$row->from_id}}"></span>
                                            <a href="{{url('message/details/'.$row->to_id)}}">
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
                        </form>
                        <div>
                            <p class="deletemsg">* Messages older than 2 months will be deleted</p> 
                            <div id="hdrnav">
                                <ul>
                                    @if($page_no == 0)
                                    <li class="visited">first</li>
                                    <li class="visited">&lt; prev</li>
                                    @else
                                    <li><a href="{{url('message/sent/')}}">first</a></li>
                                    <li><a href="{{url('message/sent/?page='.($page_no-1))}}">&lt; prev</a></li>
                                    @endif
                                    @if((($page_no*1)+count($messages))>=$total)
                                    <li class="visited">next &gt;</li>
                                    <li class="visited">last</li>
                                    @else
                                    <li><a href="{{url('message/sent/?page='.($page_no+1))}}">next &gt;</a>
                                    <li><a href="{{url('message/sent/?page='.(ceil($total/10)))}}">last</a>
                                    @endif
                                    <!--<li class="visited">first</li>
                                    <li class="visited">&lt; prev</li>
                                    <li><a href="#">next &gt;</a></li>
                                    <li><a href="#">last</a></li>-->
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
@section('script')
<script>
$(function(){
    $("#deleteChecked").on('click',function(){
        $("input[name=action]").val('delete');
        $("#mailboxform").submit();
    });
});
</script>
@endsection
@endsection
