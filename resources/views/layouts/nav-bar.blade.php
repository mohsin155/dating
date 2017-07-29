<div class="header">
    <!--<div class="top-header"></div>-->
    <div class="header-inner">
        <div class="header-inner-content clearfix">
            <div class="logo"><a href="{{url('users/listing')}}"><img src="{{url('image')}}/Logo.jpg" border="0" height="35" width="160" alt="logo"/></a></div>
            <ul class="menu">
                <li id="menu1">
                    <a href="#">2,514 Members Online</a>
                </li>
                <li id="menu2">
                    <a href="#">Matches</a>
                </li>
                <li id="menu3">
                    <a href="{{url('search/advance-search')}}">Search</a>
                </li>
                <li id="menu4">
                    <a href="{{url('message/inbox/0')}}">Messages<span class="mynotificationCircle circle">{{getUnreadCount()}}</span></a>
                </li>
                <li id="menu5" class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Activity <b class="caret"></b></a>
                    <ul class="dropdown-menu activity-dropdown-menu-left">
                        <li class="dropdown-submenu activity-dropdown-menu-left-heading">Activity Towards Me
                            <ul class="dropdown-menu activity-dropdown-menu-right">
                                <li class="activity-dropdown-menu-left-heading">Recent Activity</li>
                                <?php $activity_list = getActivityList();?>
                                @foreach($activity_list as $row)
                                <li>
                                    <a href="{{url('users/profile')}}/{{$row->user_id}}">
                                        <div class="menuactivitytext">
                                            <p>
                                                <strong>{{$row->first_name}} ({{$row->age}}) </strong>
                                                <br>
                                                <!--<img src="#">-->
                                                {{config('constants.activity_msg.'.$row->type)}} {{humanTiming($row->created_at)}} ago
                                                <br>
                                            </p>
                                        </div>
                                        <span class="menuactivitypic">
                                            @if(!empty($row->photo))
                                            <img src="{{url('uploads').'/' . $row->user_id.'/'}}{{$row->photo}}" width="40px" height="45px" border="0">
                                            @else  
                                            <img src="{{url('image/AffinityPhoto2.gif')}}" width="40px" height="45px" border="0">
                                            @endif
                                        </span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="{{url('users/interested-me')}}" class="clearfix">
                                <p>
                                    <span class="dropmenutext">Interested In Me</span>
                                </p>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('users/favourite-me')}}" class="clearfix">
                                <p>
                                    <span class="dropmenutext">I'm Their Favorite</span>
                                </p>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('users/viewed-me')}}" style="border: 0;" class="clearfix">
                                <p>
                                    <span class="dropmenutext">Viewed My Profile</span>
                                    <span class="mynotificationCircle circle_sm activity_cirlce">5</span>
                                </p>
                            </a>
                        </li>
                        <li>&nbsp;</li>
                        <li class="activity-dropdown-menu-left-heading">Activity From Me</li>
                        <li><a href="{{url('users/my-interest')}}"><p>My Interests</p></a></li>
                        <li><a href="{{url('users/my-favourites')}}"><p>My Favorites</p></a></li>
                        <li><a href="{{url('users/my-viewed-profile')}}"><p>Profiles I Viewed</p></a></li>
                        <li class="line"></li>
                        <li><a href="{{url('users/my-blocks')}}"><p>Block List</p></a></li>
                    </ul>
                </li>
            </ul>   
            <div class="other-details">
                <ul class="sidemenu">
                       <li id="menu7" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> 
                            <div class="icon-setting"></div>
                        </a>
                        <span class="caret up_caret hide"></span>

                        <ul class="dropdown-menu dropdown-menu-header">
                            <div class="dropdown_1columns col_1 bg-grey colSty">
                            <li>Account Settings</li>
                            <li><a href="{{url('users/account-settings')}}">Email Address</a></li>
                            <li><a href="{{url('users/reset-password')}}">Password</a></li>
                            <li><a href="{{url('users/profile-settings')}}">Profile Settings</a></li>
                            <li><a href="{{url('users/billing')}}">Billing</a></li>
                            <li><a href="{{url('users/notification')}}">Notifications</a></li>
                            <li class="line"></li>
                            <li><a href="#">Help</a></li>
                            <li>
                                <a href="{{url('payment/subscription')}}" id="evtGUpgradeMemberHeaderSubNav">
                                    Upgrade Membership
                                </a>
                            </li>

                            <li><a href="{{url('users/logout')}}">Logout</a></li>
                            </div>
                        </ul>

                    </li>
                    <li id="menu6">
                        <a class="iconlink" href="javascript:void(0);">   
                        <img src="{{Utility::getUserImage()}}" alt="no image" width="25" height="30" border="0" class="img-menu">
                        </a>
                        <ul class="submenu" style="margin-left: -513px;">
                            <li>
                                <div class="dropdown_2columns" style="width:570px; padding:0;">
                                    <div class="col_2_1 bg-grey colLeftSty">
                                        <h3>Edit Profile</h3>
                                        <ul class="list_unstyled">
                                            <li><a href="{{url('users/edit-profile')}}" class="clearfix">Profile</a></li>
                                            <li><a id="evtGAddPhotoMemberHeader" href="{{url('users/edit-photos')}}">Photos</a></li>
                                            <li><a href="{{url('users/edit-match')}}" class="clearfix">Matches</a></li>
                                            <li><a href="{{url('users/edit-interest')}}" class="clearfix">Hobbies &amp; Interests</a></li>
                                            <li><a href="{{url('users/edit-personality')}}" class="clearfix">Personality Questions</a></li>

                                            <li><a href="#" class="clearfix">Verify Questions</a></li>

                                            <li><a href="{{url('users/edit-tags')}}" class="clearfix">CupidTags</a></li>  

                                            <li><a href="{{url('users/imbra')}}" class="clearfix">IMBRA</a></li>

                                        </ul>
                                    </div>
                                    <div class="col_2_2 colSty" style="width: 370px; height: 257px;">
                                        <div class="myprofile clearfix">
                                            <div class="pic">       	

                                                <img src="{{Utility::getUserImage()}}" height="70" border="0">

                                            </div>
                                            <span class="myprofiletext">
                                                <h1>Hi {{Auth::user()->first_name}}</h1>
                                                <a href="{{url('users/profile')}}/{{Auth::user()->user_id}}">View My Profile</a> 
                                            </span> 
                                        </div>
                                        <div class="myinfo clearfix">
                                            <h1>Your profile is 43% complete</h1>
                                            <div class="bar">
                                                <div class="level" style="width: 43%;"></div>
                                            </div>


                                            <h2>Next Step</h2>


                                            <a href="" class="profile-button">
                                                Complete profile questions
                                            </a>

                                        </div>
                                    </div>
                                </div>                    
                            </li>
                        </ul>
                    </li>
                 

                </ul>
            </div>
        </div>
    </div>

</div>