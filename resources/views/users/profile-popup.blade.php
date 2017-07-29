<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{$user_details->first_name}}  -  {{$user_details->age}}  -  {{$user_details->state_name}}, {{$user_details->country_name}}</h4>
            </div>
            <div class="modal-body">
                <div class="photo-panel">
                    <section class="slider">
                        <div id="slider" class="flexslider">
                            <ul class="slides">
                                @if(!$user_details->photos->isEmpty())
                                @foreach($user_details->photos as $photo)
                                <li>
                                    <img src="{{url('uploads').'/' . $user_details->user_id.'/'}}{{$photo->photo_name}}" />
                                </li>
                                @endforeach
                                @else
                                <li>
                                <img src="{{url('image/AffinityPhoto2.gif')}}" />
                                </li>
                                @endif
                            </ul>
                        </div>
                        <div id="carousel" class="flexslider">
                            <ul class="slides">
                                @if(!$user_details->photos->isEmpty())
                                @foreach($user_details->photos as $photo)
                                <li>
                                    <img src="{{url('uploads').'/' . $user_details->user_id.'/'}}{{$photo->photo_name}}" />
                                </li>
                                @endforeach
                                @else
                                <li>
                                <img src="{{url('image/AffinityPhoto2.gif')}}" />
                                </li>
                                @endif
                            </ul>
                        </div>
                    </section>
                </div>
                <div class="activity-panel">
                    <div class="profile-panel" class="clear-fix">
                        <div class="first-line">
                            <strong>{{$user_details->first_name}} <span>({{$user_details->age}})</span></strong>
                            <img id="member-grade" src="{{asset('image/icon_standard.gif')}}" alt="Standard" width="18" height="18">
                            <a class="roundedbutton" href="{{url('users/profile')}}/{{$user_details->user_id}}">View Profile<span id="arrow">»</span></a>
                        </div>
                        <div class="second-line">{{$user_details->city_name}}, {{$user_details->state_name}}, {{$user_details->country_name}}</div>
                        <div class="third-line">
                            <strong>Seeking:</strong>
                            Male 30 - 45 
                        </div>
                        <div id="action-buttons">
                            <a href="javascript:void(0);">
                               @if(!empty($user_details->favourite_id))
                               <img src="{{url('image/btn-favorites-select.gif')}}" width="135" height="25" border="0" id="favorites-rem" class="rollover">
                               @else 
                               <img src="{{url('image/btn-favorites-up.gif')}}" width="135" height="25" border="0" id="favorites-btn" class="rollover">
                               @endif
                               </a>
                            <a href="javascript:void(0);">
                                @if(!empty($user_details->interest_id))
                                <img src="{{url('image/btn-interest-select-popup.gif')}}"  width="135" height="25" border="0" class="rollover">
                                @else
                                <img src="{{url('image/btn-interest-up.gif')}}" width="135" height="25" border="0" id="interest-btn" class="rollover">
                                @endif
                            </a>

                        </div>
                    </div>
                        <div id="comments-panel">
                    <div id="">
                        <h1 style="margin-left: 6px;">Start a conversation with {{$user_details->first_name}} and say hi!</h1>
                    </div>  


                    <form id="commentform">
                        <textarea id="comment" class="grey-border" placeholder="Write a comment...">I would love to get to know you. I'm looking for a serious relationship. What about you?</textarea>
                        @if(Auth::user()->subscription_type != 0 && strtotime(Auth::user()->subscription_end) > strtotime('now'))
                        <button id="addcomment" class="greyShinyButton">
                            <span class="iconbtn iconarrow" dir="ltr"></span>
                            
                            <span class="send">Send</span>
                            <span class="sending" style="display: none">Sending...</span>
                        </button>
                        @else
                        <a href="{{url('payment/subscription')}}">
                        <button class="greyShinyButton" id="addcomment" >
                            <span class="iconbtn iconarrow" dir="ltr"></span>
                            
                            <span class="send">Send</span>
                            <span class="sending" style="display: none">Sending...</span>
                        </button>
                        </a>
                        @endif
                    </form>
                </div>
                </div>
            
            </div>
            <div class="modal-footer">

            </div>
<input name="user_id" value="{{$user_details->user_id}}" type="hidden" />
<script src="{{url('js/popup.js')}}"></script>
<!-- jQuery -->