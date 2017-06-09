@extends('layouts.main')
@section('content')
<style>
    .icons {
        display: block;
        float: left;
        margin: 3px;
        padding: 0px;
        border: none;
    }
</style>
<div class="responsive-main clearfix">
    <div id="column1" class="column1">
        <div class="column1-content clearfix">
            <div class="profile relative overflow-hidden profile-background p2">
                <div class="profile-overlay"></div>
                <div class="heading relative text-center">

                    <h1 class="white regular">Hi <?php if (!empty($profile_data)) echo $profile_data->first_name; ?></h1>
                </div>
                <div class="pic my2">

                    @if(!empty($photos))
                    <a title="click to enlarge photo" id="addPhotoLHSCol1" class="enlargePhoto">

                        <div class="addphoto" ><img src="{{$image_path}}{{$photos->photo_name}}" width="100%" height="100%" />

                        </div>
                    </a>
                    @else
                    <a href="{{url('users/edit-photos')}}" id="addPhotoLHSCol1"><div class="addphoto" title="The most effective way to get people to notice you is to add a photo. Add A Photo Now"></div></a>
                    @endif

                </div>
                <div class="member-benefits relative mt1">

                    <h3 class="regular mb1">Learn about membership features</h3>

                    <div title="Send Unlimited Communications" class="white icons icons-standard  inline-block"><svg viewBox="0 0 80 70" xmlns="http://www.w3.org/2000/svg"><path d="M70 0h-60c-5.5 0-10 4.5-10 10v35c0 5.5 4.5 10 10 10h20l20 15v-15h20c5.5 0 10-4.5 10-10v-35c0-5.5-4.5-10-10-10z"></path></svg></div>
                    <div title="Unlock Your Messages" class="white icons icons-standard  inline-block"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 485.213 485.212"><path d="M424.562 212.282h-181.955v-90.978c0-66.87-54.401-121.304-121.302-121.304-66.886 0-121.304 54.434-121.304 121.304v90.978h60.651v-90.978c0-33.465 27.205-60.653 60.653-60.653 33.435 0 60.651 27.188 60.651 60.653v90.978c-33.493 0-60.651 27.158-60.651 60.648v151.629c0 33.5 27.158 60.653 60.651 60.653h242.606c33.491 0 60.649-27.153 60.649-60.653v-151.629c.001-33.491-27.157-60.648-60.649-60.648zm-106.138 146.975v50.139c0 8.382-6.786 15.163-15.168 15.163-8.377 0-15.158-6.781-15.158-15.163v-50.139c-8.887-5.269-15.164-14.57-15.164-25.673 0-16.765 13.562-30.327 30.322-30.327 16.765 0 30.331 13.562 30.331 30.327 0 11.103-6.281 20.405-15.163 25.673z"></path></svg></div>
                    <div title="Say Goodbye to Ads" class="white icons icons-standard  inline-block"><svg viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg"><g><circle cx="21.732" cy="5.5" r="1.5"></circle><circle cx="17.732" cy="2.5" r="1.5"></circle><circle cx="13.732" cy="1.5" r="1.5"></circle><circle cx="9.732" cy="3.5" r="1.5"></circle><path d="M20.232 5.5v6.5c0 .276-.224.5-.5.5s-.5-.224-.5-.5v-9.5h-3v8.5c0 .276-.224.5-.5.5s-.5-.224-.5-.5v-9.5h-3v9.5c0 .276-.224.5-.5.5s-.5-.224-.5-.5v-7.5h-3v12.5l-2.025-2.771c-.6-.925-1.771-1.235-2.629-.705-.855.542-1.067 1.724-.475 2.646 0 0 3.266 4.943 4.658 7.059s3.647 3.771 7.864 3.771c6.982 0 7.607-5.392 7.607-7v-13.5h-3z"></path></g></svg></div>
                    <div title="Hide Your Profile and Photos" class="white icons icons-standard  inline-block"><svg viewBox="0 0 533.333 533.334" xmlns="http://www.w3.org/2000/svg"><path d="M437.147 171.05c40.439 28.662 73.63 67.235 96.187 112.283-49.543 98.937-150.358 166.667-266.667 166.667-32.587 0-63.954-5.319-93.322-15.148l40.602-40.602c17.218 3.802 34.881 5.75 52.72 5.75 46.646 0 92.111-13.274 131.482-38.387 31.334-19.988 57.888-46.761 77.832-78.281-19.298-30.503-44.801-56.536-74.817-76.299l35.983-35.983zm-170.48 209.158c-11.835 0-23.308-1.55-34.233-4.445l163.116-163.116c2.898 10.923 4.45 22.393 4.45 34.228 0 73.637-59.696 133.333-133.333 133.333zm233.333-363.541h-27.988l-114.382 114.381c-28.686-9.335-59.247-14.381-90.964-14.381-116.312 0-217.126 67.73-266.667 166.667 22.218 44.371 54.754 82.453 94.372 110.974l-94.371 94.37v27.989h27.989l472.011-472.012v-27.988zm-283.333 163.541c25.023 0 45.753 18.382 49.423 42.38l-57.043 57.044c-23.997-3.672-42.379-24.401-42.379-49.424-.001-27.614 22.384-50 49.999-50zm-159.315 103.125c19.944-31.522 46.497-58.293 77.83-78.279 2.041-1.302 4.102-2.563 6.176-3.802-5.187 14.233-8.025 29.595-8.025 45.623 0 30.48 10.235 58.567 27.447 81.022l-30.495 30.495c-29.204-19.606-54.038-45.194-72.933-75.059z"></path></svg></div>

                    <div title="Unlock Exclusive Galleries" class="white icons icons-standard  inline-block"><svg viewBox="0 0 368.373 368.373" xmlns="http://www.w3.org/2000/svg"><g><path d="M302.932 225.875l-22.688-3.297-10.145-20.559c-1.264-2.56-3.871-4.181-6.726-4.181-2.854 0-5.462 1.621-6.726 4.181l-10.146 20.559-22.688 3.297c-2.825.41-5.173 2.389-6.055 5.104-.882 2.715-.146 5.695 1.898 7.688l16.417 16.001-3.876 22.598c-.482 2.814.674 5.657 2.982 7.335 2.311 1.678 5.372 1.901 7.898.571l20.294-10.668 20.294 10.668c1.097.577 2.295.861 3.488.861h.021c4.143 0 7.5-3.358 7.5-7.5 0-.629-.078-1.24-.224-1.824l-3.781-22.041 16.417-16.001c2.044-1.993 2.779-4.974 1.897-7.688-.878-2.715-3.226-4.694-6.051-5.104z"></path><path d="M263.373 136.937c-34.485 0-65.14 16.713-84.293 42.463-7.653-1.61-15.582-2.463-23.707-2.463-8.643 0-17.063.965-25.165 2.781-38.121 8.543-69.149 36.066-82.606 72.092-4.669 12.5-7.229 26.02-7.229 40.127 0 8.284 6.716 15 15 15h125.596c19.246 24.348 49.03 40 82.404 40 57.898 0 105-47.103 105-105s-47.102-105-105-105zm0 180c-13.592 0-26.339-3.652-37.344-10-22.48-12.967-37.656-37.236-37.656-65 0-20.01 7.892-38.199 20.708-51.662 13.67-14.359 32.946-23.338 54.292-23.338 41.356 0 75 33.645 75 75s-33.644 75-75 75z"></path><path d="M32.622 84.187c0 23.666 18.367 43.109 41.594 44.857-7.382-13.302-11.594-28.596-11.594-44.857s4.212-31.556 11.594-44.857c-23.227 1.747-41.594 21.191-41.594 44.857z"></path><path d="M93.489 160.825c-5.17-1.077-10.482-1.639-15.867-1.639-42.801.001-77.622 34.822-77.622 77.624 0 8.284 6.716 15 15 15h1.025c11.602-40.229 40.193-73.323 77.464-90.985z"></path><path d="M104.216 47.915c-7.289 10.25-11.594 22.764-11.594 36.271s4.305 26.021 11.594 36.271c11.383 16.006 30.065 26.479 51.157 26.479 34.601 0 62.75-28.149 62.75-62.75s-28.149-62.75-62.75-62.75c-21.093.001-39.774 10.473-51.157 26.479z"></path></g></svg></div>

                    <div title="Rank Above Other Members" class="white icons icons-standard  inline-block"><!--?xml version="1.0" encoding="utf-8"?-->
                        <!-- Generator: Adobe Illustrator 21.0.2, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 784.5 535.5" style="enable-background:new 0 0 784.5 535.5;" xml:space="preserve">
                            <style type="text/css">
                            </style>
                            <path id="Path_74" class="st0" d="M769.8,51.7L568.6,83.8l46.3,57.1L444.1,279.7L321.2,128.6L14.8,377.9l36,43.9l262.4-213.4
                                  l122.3,151.1l215.3-174.8l46.3,56.6L769.8,51.7z"></path>
                        </svg>
                    </div>
                    <div title="Double Your Profile Space" class="white icons icons-standard  inline-block"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128.1 128.1" enable-background="new 0 0 128.1 128.1"><path d="M64.1 128.1c-35.4 0-64.1-28.7-64.1-64 0-35.4 28.7-64.1 64.1-64.1s64.1 28.7 64.1 64.1c-.1 35.3-28.8 64-64.1 64zm0-115.1c-28.2 0-51.1 22.9-51.1 51.1s22.9 51.1 51.1 51.1 51.1-22.9 51.1-51.1-23-51.1-51.1-51.1z"></path><g><path d="M37.7 49l3.6 6.1c1 1.9 2 3.8 3 5.5h.2l2.8-5.6 3.2-5.9h12.4l-12.1 17.4 12.2 19.2h-12.9l-3.7-6.6c-1-1.8-1.9-3.7-2.8-5.5h-.2c-.9 2-1.9 3.8-2.8 5.5l-3.4 6.6h-12.6l12.5-18.7-12.2-18h12.8zM66.5 85.7v-6.9l6.3-5.7c10.7-9.5 15.8-15 16-20.7 0-4-2.4-7.1-8-7.1-4.2 0-7.9 2.1-10.4 4.1l-3.2-8.2c3.7-2.8 9.4-5 16-5 11 0 17.1 6.5 17.1 15.3 0 8.2-5.9 14.7-13 21l-4.5 3.8v.1h18.2v9.4h-34.5z"></path></g></svg></div>
                    <div title="Stand Out From the Crowd" class="white icons icons-standard  inline-block"><svg viewBox="0 0 100 97" xmlns="http://www.w3.org/2000/svg"><path d="M98.767 40.078c1.098-.964 1.509-2.49 1.046-3.874-.464-1.385-1.713-2.355-3.17-2.464l-29.035-2.167c-1.349-.102-2.526-.941-3.058-2.18l-11.532-26.737c-.579-1.338-1.905-2.203-3.365-2.187-1.457.013-2.766.898-3.319 2.25l-11.034 26.947c-.51 1.25-1.675 2.112-3.019 2.236l-28.993 2.704c-1.453.135-2.683 1.128-3.121 2.519-.437 1.391.003 2.911 1.115 3.855l22.217 18.823c1.03.875 1.49 2.246 1.194 3.562l-6.387 28.41c-.319 1.424.243 2.901 1.434 3.749 1.191.845 2.769.898 4.013.128l24.762-15.317c1.148-.71 2.595-.724 3.759-.032l25.042 14.853c1.253.743 2.835.665 4.006-.204 1.171-.868 1.711-2.359 1.362-3.775l-6.907-28.286c-.322-1.312.112-2.694 1.125-3.585l21.866-19.228z"></path></svg></div>
                    <div title="Unlock Exclusive Search Features" class="white icons icons-standard  inline-block"><svg viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg"><path d="M48.776 42.867l-10.862-10.862-.186-.152c2.137-3.242 3.385-7.123 3.385-11.297 0-11.353-9.204-20.557-20.557-20.557-11.353 0-20.557 9.204-20.557 20.557 0 11.353 9.203 20.557 20.556 20.557 4.174 0 8.055-1.247 11.297-3.385l.152.186 10.862 10.862c1.632 1.632 4.277 1.632 5.909 0 1.632-1.632 1.632-4.277 0-5.909zm-28.22-8.881c-7.418 0-13.43-6.013-13.43-13.43 0-7.418 6.013-13.43 13.43-13.43s13.43 6.013 13.43 13.43-6.013 13.43-13.43 13.43z"></path></svg></div>
                    <div title="Get Better Matches" class="white icons icons-standard  inline-block"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 185.023 185.023"><path d="M48.673 84.839c2.604-28.959 23.995-39.233 41.523-39.233 12.031 0 23.173 4.48 30.555 11.701 2.199-2.155 4.823-3.958 7.619-5.594.048-2.14.148-4.265-.053-6.481-3.777-42.212-55.7-37.864-64.041-13.843-8.321-24.022-60.254-28.37-64.03 13.842-4.073 45.551 43.622 75.19 59.134 83.59-7.474-12.513-12.209-27.178-10.707-43.982zM184.777 85.56c-3.777-42.212-55.685-37.858-64.026-13.843-8.346-24.016-60.263-28.369-64.052 13.843-4.841 54.303 64.052 86.12 64.052 86.12s68.896-31.817 64.026-86.12z"></path></svg></div>

                    <div title="Instantly Translate Messages" class="white icons icons-standard  inline-block"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 535.5 535.5"><g><path d="M165.75 91.8l63.75 35.7-35.701-63.75 35.701-63.75-63.75 35.7-63.75-35.7 35.7 63.75-35.7 63.75zM471.75 341.7l-63.75-35.7 35.7 63.75-35.7 63.75 63.75-35.7 63.75 35.7-35.7-63.75 35.7-63.75zM535.5 0l-63.75 35.7-63.75-35.7 35.7 63.75-35.7 63.75 63.75-35.7 63.75 35.7-35.7-63.75zM341.7 135.15c-10.2-10.2-25.5-10.2-35.7 0l-298.351 298.35c-10.2 10.2-10.2 25.5 0 35.7l58.65 58.649c10.2 10.2 25.5 10.2 35.7 0l298.351-298.349c10.2-10.2 10.2-25.5 0-35.7l-58.65-58.65zm-28.05 140.25l-53.55-53.55 61.2-61.2 53.55 53.55-61.2 61.2z"></path></g></svg></div>

                </div>
                <div class="bar-loader clearfix relative mt2">

                </div>

                <div class="next-step relative mt1">
                    <a href="{{url('users/edit-photos')}}" class="green-mid-button"> Upload a photo to your profile </a>
                </div>

            </div>
            <div class="activity clearfix">
                <h1>Recent Activity</h1>
                <ul>


                    <li><a href="#" class="messages unread">63 new messages</a></li>



                    <li><a href="#" class="interests unread">1 new interests</a></li>



                    <li><a href="#" class="views unread">6 new profile views</a></li>



                    <li><a href="#" class="favorites read">0 new favorites</a></li>
                </ul>
            </div>
            <div class="search clearfix">
                <div class="heading clearfix">
                    <h1>Search</h1>
                    <a href="#" class="advanced">Advanced Search</a> 
                </div>
                <form action="{{url('search/search-match')}}" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="type" value="2"/>
                        <ul>
                            <li>
                                <label>I am:</label>

                                <select name="my_gender" >
                                    <option value="male" @if(!empty($profile_data) && $profile_data->gender=="male") selected @endif>Male</option>
                                    <option value="female" @if(!empty($profile_data) && $profile_data->gender=="female") selected @endif>Female</option> 
                                </select>

                            </li>
                            <li>
                                <label>Seeking</label>
                                <select name="gender">
                                    <option value="male" @if(!empty($profile_data) && $profile_data->gender=="female") selected @endif>Male</option>
                                    <option value="female" @if(!empty($profile_data) && $profile_data->gender=="male") selected @endif>Female</option>
                                </select>
                            </li>
                            <li>
                                <label>Age:</label>

                                <select name="min_age" id="age_min">
                                    <option value="0">-</option>
                                    @for($i=18;$i<=90;$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                to 
                                <select name="max_age" id="age_max">
                                    <option value="0">-</option>
                                    @for($i=18;$i<=90;$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                </select>

                            </li>
                            <li>
                                <label>Country:</label>
                                <select name="country" id="country">
                                    <option value="0">Any Country</option>
                                    @foreach($countries as $country)
                                    <option value="{{$country->id}}" @if($country->id==old('country')) selected @endif >{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </li>
                            <li>
                                <label for="State/Province">State:</label>
                                <select class="form-control" id="state" name="state">
                                    <option value="0">Any state</option>                                    
                                </select>
                            </li>
                            <li>
                                <label for="State/Province">City:</label>
                                <select class="form-control" id="city" name="city">
                                    <option value="0">Any City</option>                                    
                                </select>
                            </li>
                            <li>
                                <label>Photo:</label>
                                <input type="checkbox" checked="checked" value="1" id="hasPhoto" name="photo">
                                    yes, profile with a photo 
                            </li>
                            <li>
                                <label>Last active:</label>
                                <select name="last_active">
                                    <option value="">Any</option>
                                    <option value="7">within week</option>
                                    <option value="30">within 1 month</option>
                                    <option value="90">within 3 months</option>
                                    <option value="180">within 6 months</option>
                                    <option value="365">within year</option>
                                </select>
                            </li>
                        </ul>
                        <input type="submit" value="Search" name="submit">
                            </form>
                            </div>
                            <div id="popularSearches" class="popular clearfix">
                                <h1>Popular Searches</h1>
                                <ul>
                                    <li><a href="#">My Matches</a></li>
                                    <li><a href="#">Most Popular</a></li>
                                    <li><a href="#">Latest Photos</a></li>
                                    <li><a href="#">In My Area</a></li>
                                    <li><a href="#">New Members</a></li>

                                    <li><a href="#">Women Of Latin America Gallery</a></li>

                                </ul>
                            </div>
                            </div>
                            </div>

                            <div id="column2" class="column2">
                                <div class="column2-content clearfix">

                                    <div class="matches clearfix">
                                        <div class="heading clearfix">
                                            <h1>Recommended Matches</h1>

                                            <a href="{{url('users/edit-match')}}" class="green-light-button left">Improve Matches</a> 
                                            <a href="#" class="grey-light-button seematches">See all matches</a> 
                                        </div>
                                        @foreach($users as $user)
                                        <div class="member"> 
                                            <span class="memberpic">
                                                <a href="javascript:;" class="photo-display-popup" data-user="{{$user->user_id}}" data-devicemode="1" name="member" title="member">
                                                    @if(!empty($user->photo_name))
                                                    <img class="memberpic-border" width="128" height="134" src="{{url('uploads').'/' . $user->user_id.'/'}}{{$user->photo_name}}">
                                                        @else
                                                        <img class="memberpic-border" width="128" height="134" src="{{url('image/AffinityPhoto2.gif')}}" />
                                                        @endif
                                                </a> 
                                            </span>
                                            <p class="name" style="display: block;">{{$user->first_name}}, {{$user->age}}</p>
                                            <p class="location" style="display: block;">{{$user->state_name}}, {{$user->country_name}}</p>
                                            <div class="actionicons clearfix" style="display: none;">
                                                <ul>

                                                    <a title="click here to view profile" href="/en/profile/showProfile/ID/1018971">
                                                        <li class="iconstandard"></li>
                                                    </a>


                                                    <a style="display:none;" data-sitetranslationpath="en" class="launchRegistrationModal" href="javascript: void(0);"><li class="iconmail"></li></a>

                                                    <a class="emailpopup open-email-popup" title="Send {{$user->first_name}} a message" href="javascript:;" data-userid="{{$user->user_id}}" >
                                                        <li class="iconmail"></li>
                                                    </a>

                                                    @if(empty($user->interest_id))
                                                    <li class="iconinterest sendinterest" name="" data-altclass="iconinterestsent" data-msid="" data-imageurl="" data-name="{{$user->first_name}}" data-id="{{$user->user_id}}"><a href="javascript:;" title="Show interest in {{$user->first_name}}"></a></li>
                                                    @else
                                                    <li class="iconreminterest" name="" data-altclass="iconinterestsent" data-msid="" data-imageurl="" data-name="{{$user->first_name}}" data-id="{{$user->user_id}}"><a href="javascript:;" title="You had shown interest in {{$user->first_name}}"></a></li>
                                                    @endif
                                                    @if(!empty($user->favourite_id))
                                                    <li class="iconremfavorites remfavorites" name="" data-altclass="iconfavoritessent" data-imageurl="" data-name="{{$user->first_name}}" data-id="{{$user->user_id}}">
                                                        <a href="javascript:;" title="Remove {{$user->first_name}} from your favorites"></a></li>
                                                    @else
                                                    <li class="iconfavorites addfavorites" name="" data-altclass="iconfavoritessent" data-imageurl="" data-name="{{$user->first_name}}" data-id="{{$user->user_id}}">
                                                        <a href="javascript:;" title="Add {{$user->first_name}} to your favorites"></a></li>
                                                    @endif
                                                    <a href="javascript: void(0);" title="I'm Online - click to chat"></a>

                                                    <a href="#" title="On mobile device - IM not available"><li class="icononlinemobile"></li></a>

                                                </ul>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <a href="#" class="green-mid-button seemore-button">See all matches</a>
                            </div> 
                            </div>
                            <div id="advertisement-upgrade" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="modal-arrow modal-arrow-blue modal-arrow-bottom text-center px1 pb1 mb2">

                                                <div id="closeModalWindow">
                                                    <svg class="modal-icon-close modal-white-fill">
                                                        <svg viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg"><path d="M48.31 9.85l-15.15 15.151 15.15 15.151c2.253 2.254 2.253 5.906 0 8.16-1.126 1.126-2.602 1.689-4.078 1.689-1.478 0-2.954-.563-4.079-1.689l-15.153-15.152-15.152 15.152c-1.126 1.126-2.602 1.689-4.079 1.689-1.476 0-2.952-.563-4.078-1.689-2.253-2.253-2.253-5.905 0-8.16l15.149-15.151-15.15-15.151c-2.253-2.253-2.253-5.906 0-8.159 2.253-2.252 5.903-2.252 8.157 0l15.153 15.151 15.151-15.151c2.254-2.252 5.905-2.252 8.158 0 2.254 2.253 2.254 5.906.001 8.159z"></path></svg>
                                                    </svg>

                                                </div>

                                                <svg class="modal-icon-large pt2 pb1 modal-white-fill">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 314.069 314.069">
                                                        <path d="M168.133 97.482c-6.126-6.127-16.072-6.127-22.197 0h-.008l-.032.04-44.369 44.364c-6.133 6.129-6.133 16.08 0 22.208v-.009c6.129 6.132 16.068 6.132 22.201 0l17.607-17.598v65.503c0 8.664 7.033 15.701 15.701 15.701s15.696-7.037 15.696-15.701v-65.503l17.602 17.598c6.135 6.132 16.077 6.132 22.201 0v.009c6.135-6.128 6.135-16.078 0-22.208l-44.402-44.404zm124.871-18.957c-43.356-75.089-139.384-100.82-214.473-57.464-75.095 43.35-100.827 139.382-57.463 214.481 43.35 75.087 139.375 100.822 214.465 57.467 75.096-43.361 100.832-139.388 57.471-214.484zm-73.168 187.277c-60.075 34.685-136.894 14.114-171.576-45.969-34.69-60.071-14.097-136.897 45.972-171.58 60.071-34.683 136.894-14.099 171.578 45.979 34.685 60.076 14.098 136.886-45.974 171.57z"></path>
                                                    </svg>
                                                </svg> 
                                                <h2 class="pb1 bold modal-white-text h2 line-height-4">Get The Most Out Of Your Dating Experience</h2>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12 mx-auto">
                                                <div class="clearfix mxn3 mt3">
                                                    <div class="col col-md-6 px3">
                                                        <ul class="list-reset">
                                                            <li class="mb3">
                                                                <div class="mx2 inline-block col-md-2 benefit-icon align-top"><svg viewBox="0 0 80 70" xmlns="http://www.w3.org/2000/svg"><path d="M70 0h-60c-5.5 0-10 4.5-10 10v35c0 5.5 4.5 10 10 10h20l20 15v-15h20c5.5 0 10-4.5 10-10v-35c0-5.5-4.5-10-10-10z"></path></svg></div>
                                                                <div class="col-md-10 inline-block">
                                                                    <h3 class="h3 regular">Send Unlimited Communications</h3>
                                                                    <p class="regular">Start interacting via instant messenger chat. <span class="inline-block membership-type membership-type-gold mx1"><svg viewBox="0 0 101 131" xmlns="http://www.w3.org/2000/svg"><path d="M50.895 64.068c14.618 0 26.469-14.342 26.469-32.034s-3.891-32.034-26.469-32.034c-22.578 0-26.47 14.342-26.47 32.034s11.851 32.034 26.47 32.034zm-49.995 48.912c-.005-1.079-.009-.304 0 0zm99.987.843c.014-.295.005-2.049 0 0zm-.056-2.136c-.49-30.819-4.53-39.601-35.443-45.16 0 0-4.351 5.525-14.494 5.525l-14.495-5.525c-30.575 5.498-34.861 14.15-35.424 44.159-.046 2.45-.068 2.579-.076 2.295.002.533.004 1.519.004 3.238 0 0 7.36 14.783 49.991 14.783 42.63 0 49.991-14.783 49.991-14.783l.002-2.395c-.008.176-.025-.165-.056-2.136z"></path></svg></span><span class="inline-block membership-type membership-type-platinum"><svg viewBox="0 0 101 131" xmlns="http://www.w3.org/2000/svg"><path d="M50.895 64.068c14.618 0 26.469-14.342 26.469-32.034s-3.891-32.034-26.469-32.034c-22.578 0-26.47 14.342-26.47 32.034s11.851 32.034 26.47 32.034zm-49.995 48.912c-.005-1.079-.009-.304 0 0zm99.987.843c.014-.295.005-2.049 0 0zm-.056-2.136c-.49-30.819-4.53-39.601-35.443-45.16 0 0-4.351 5.525-14.494 5.525l-14.495-5.525c-30.575 5.498-34.861 14.15-35.424 44.159-.046 2.45-.068 2.579-.076 2.295.002.533.004 1.519.004 3.238 0 0 7.36 14.783 49.991 14.783 42.63 0 49.991-14.783 49.991-14.783l.002-2.395c-.008.176-.025-.165-.056-2.136z"></path></svg></span></p>
                                                                </div>
                                                            </li>
                                                            <li class="benefit mb3">
                                                                <div class="mx2 inline-block col-md-2 benefit-icon align-top"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 485.213 485.212"><path d="M424.562 212.282h-181.955v-90.978c0-66.87-54.401-121.304-121.302-121.304-66.886 0-121.304 54.434-121.304 121.304v90.978h60.651v-90.978c0-33.465 27.205-60.653 60.653-60.653 33.435 0 60.651 27.188 60.651 60.653v90.978c-33.493 0-60.651 27.158-60.651 60.648v151.629c0 33.5 27.158 60.653 60.651 60.653h242.606c33.491 0 60.649-27.153 60.649-60.653v-151.629c.001-33.491-27.157-60.648-60.649-60.648zm-106.138 146.975v50.139c0 8.382-6.786 15.163-15.168 15.163-8.377 0-15.158-6.781-15.158-15.163v-50.139c-8.887-5.269-15.164-14.57-15.164-25.673 0-16.765 13.562-30.327 30.322-30.327 16.765 0 30.331 13.562 30.331 30.327 0 11.103-6.281 20.405-15.163 25.673z"></path></svg></div>
                                                                <div class="col-md-10 inline-block">
                                                                    <h3 class="h3 regular">Unlock Your Messages</h3>
                                                                    <p class="regular">Send and receive unlimited messages to all members <span class="inline-block membership-type membership-type-gold mx1"><svg viewBox="0 0 101 131" xmlns="http://www.w3.org/2000/svg"><path d="M50.895 64.068c14.618 0 26.469-14.342 26.469-32.034s-3.891-32.034-26.469-32.034c-22.578 0-26.47 14.342-26.47 32.034s11.851 32.034 26.47 32.034zm-49.995 48.912c-.005-1.079-.009-.304 0 0zm99.987.843c.014-.295.005-2.049 0 0zm-.056-2.136c-.49-30.819-4.53-39.601-35.443-45.16 0 0-4.351 5.525-14.494 5.525l-14.495-5.525c-30.575 5.498-34.861 14.15-35.424 44.159-.046 2.45-.068 2.579-.076 2.295.002.533.004 1.519.004 3.238 0 0 7.36 14.783 49.991 14.783 42.63 0 49.991-14.783 49.991-14.783l.002-2.395c-.008.176-.025-.165-.056-2.136z"></path></svg></span><span class="inline-block membership-type membership-type-platinum"><svg viewBox="0 0 101 131" xmlns="http://www.w3.org/2000/svg"><path d="M50.895 64.068c14.618 0 26.469-14.342 26.469-32.034s-3.891-32.034-26.469-32.034c-22.578 0-26.47 14.342-26.47 32.034s11.851 32.034 26.47 32.034zm-49.995 48.912c-.005-1.079-.009-.304 0 0zm99.987.843c.014-.295.005-2.049 0 0zm-.056-2.136c-.49-30.819-4.53-39.601-35.443-45.16 0 0-4.351 5.525-14.494 5.525l-14.495-5.525c-30.575 5.498-34.861 14.15-35.424 44.159-.046 2.45-.068 2.579-.076 2.295.002.533.004 1.519.004 3.238 0 0 7.36 14.783 49.991 14.783 42.63 0 49.991-14.783 49.991-14.783l.002-2.395c-.008.176-.025-.165-.056-2.136z"></path></svg></span></p>
                                                                </div>
                                                            </li>
                                                            <li class="benefit mb3">
                                                                <div class="mx2 inline-block col-md-2 benefit-icon align-top"><svg viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg"><g><circle cx="21.732" cy="5.5" r="1.5"></circle><circle cx="17.732" cy="2.5" r="1.5"></circle><circle cx="13.732" cy="1.5" r="1.5"></circle><circle cx="9.732" cy="3.5" r="1.5"></circle><path d="M20.232 5.5v6.5c0 .276-.224.5-.5.5s-.5-.224-.5-.5v-9.5h-3v8.5c0 .276-.224.5-.5.5s-.5-.224-.5-.5v-9.5h-3v9.5c0 .276-.224.5-.5.5s-.5-.224-.5-.5v-7.5h-3v12.5l-2.025-2.771c-.6-.925-1.771-1.235-2.629-.705-.855.542-1.067 1.724-.475 2.646 0 0 3.266 4.943 4.658 7.059s3.647 3.771 7.864 3.771c6.982 0 7.607-5.392 7.607-7v-13.5h-3z"></path></g></svg></div>
                                                                <div class="col-md-10 inline-block">
                                                                    <h3 class="h3 regular">Say Goodbye to Ads</h3>
                                                                    <p class="regular">Premium members enjoy a completely ad free experience. <span class="inline-block membership-type membership-type-gold mx1"><svg viewBox="0 0 101 131" xmlns="http://www.w3.org/2000/svg"><path d="M50.895 64.068c14.618 0 26.469-14.342 26.469-32.034s-3.891-32.034-26.469-32.034c-22.578 0-26.47 14.342-26.47 32.034s11.851 32.034 26.47 32.034zm-49.995 48.912c-.005-1.079-.009-.304 0 0zm99.987.843c.014-.295.005-2.049 0 0zm-.056-2.136c-.49-30.819-4.53-39.601-35.443-45.16 0 0-4.351 5.525-14.494 5.525l-14.495-5.525c-30.575 5.498-34.861 14.15-35.424 44.159-.046 2.45-.068 2.579-.076 2.295.002.533.004 1.519.004 3.238 0 0 7.36 14.783 49.991 14.783 42.63 0 49.991-14.783 49.991-14.783l.002-2.395c-.008.176-.025-.165-.056-2.136z"></path></svg></span><span class="inline-block membership-type membership-type-platinum"><svg viewBox="0 0 101 131" xmlns="http://www.w3.org/2000/svg"><path d="M50.895 64.068c14.618 0 26.469-14.342 26.469-32.034s-3.891-32.034-26.469-32.034c-22.578 0-26.47 14.342-26.47 32.034s11.851 32.034 26.47 32.034zm-49.995 48.912c-.005-1.079-.009-.304 0 0zm99.987.843c.014-.295.005-2.049 0 0zm-.056-2.136c-.49-30.819-4.53-39.601-35.443-45.16 0 0-4.351 5.525-14.494 5.525l-14.495-5.525c-30.575 5.498-34.861 14.15-35.424 44.159-.046 2.45-.068 2.579-.076 2.295.002.533.004 1.519.004 3.238 0 0 7.36 14.783 49.991 14.783 42.63 0 49.991-14.783 49.991-14.783l.002-2.395c-.008.176-.025-.165-.056-2.136z"></path></svg></span></p>
                                                                </div>
                                                            </li>
                                                            <li class="benefit mb3">
                                                                <div class="mx2 inline-block col-md-2 benefit-icon align-top"><svg viewBox="0 0 533.333 533.334" xmlns="http://www.w3.org/2000/svg"><path d="M437.147 171.05c40.439 28.662 73.63 67.235 96.187 112.283-49.543 98.937-150.358 166.667-266.667 166.667-32.587 0-63.954-5.319-93.322-15.148l40.602-40.602c17.218 3.802 34.881 5.75 52.72 5.75 46.646 0 92.111-13.274 131.482-38.387 31.334-19.988 57.888-46.761 77.832-78.281-19.298-30.503-44.801-56.536-74.817-76.299l35.983-35.983zm-170.48 209.158c-11.835 0-23.308-1.55-34.233-4.445l163.116-163.116c2.898 10.923 4.45 22.393 4.45 34.228 0 73.637-59.696 133.333-133.333 133.333zm233.333-363.541h-27.988l-114.382 114.381c-28.686-9.335-59.247-14.381-90.964-14.381-116.312 0-217.126 67.73-266.667 166.667 22.218 44.371 54.754 82.453 94.372 110.974l-94.371 94.37v27.989h27.989l472.011-472.012v-27.988zm-283.333 163.541c25.023 0 45.753 18.382 49.423 42.38l-57.043 57.044c-23.997-3.672-42.379-24.401-42.379-49.424-.001-27.614 22.384-50 49.999-50zm-159.315 103.125c19.944-31.522 46.497-58.293 77.83-78.279 2.041-1.302 4.102-2.563 6.176-3.802-5.187 14.233-8.025 29.595-8.025 45.623 0 30.48 10.235 58.567 27.447 81.022l-30.495 30.495c-29.204-19.606-54.038-45.194-72.933-75.059z"></path></svg></div>
                                                                <div class="col-md-10 inline-block">
                                                                    <h3 class="h3 regular">Hide Your Profile and Photos</h3>
                                                                    <p class="regular">Value your privacy? Premium members can hide their profiles and photos from other members with ease. <span class="inline-block membership-type membership-type-gold mx1"><svg viewBox="0 0 101 131" xmlns="http://www.w3.org/2000/svg"><path d="M50.895 64.068c14.618 0 26.469-14.342 26.469-32.034s-3.891-32.034-26.469-32.034c-22.578 0-26.47 14.342-26.47 32.034s11.851 32.034 26.47 32.034zm-49.995 48.912c-.005-1.079-.009-.304 0 0zm99.987.843c.014-.295.005-2.049 0 0zm-.056-2.136c-.49-30.819-4.53-39.601-35.443-45.16 0 0-4.351 5.525-14.494 5.525l-14.495-5.525c-30.575 5.498-34.861 14.15-35.424 44.159-.046 2.45-.068 2.579-.076 2.295.002.533.004 1.519.004 3.238 0 0 7.36 14.783 49.991 14.783 42.63 0 49.991-14.783 49.991-14.783l.002-2.395c-.008.176-.025-.165-.056-2.136z"></path></svg></span><span class="inline-block membership-type membership-type-platinum"><svg viewBox="0 0 101 131" xmlns="http://www.w3.org/2000/svg"><path d="M50.895 64.068c14.618 0 26.469-14.342 26.469-32.034s-3.891-32.034-26.469-32.034c-22.578 0-26.47 14.342-26.47 32.034s11.851 32.034 26.47 32.034zm-49.995 48.912c-.005-1.079-.009-.304 0 0zm99.987.843c.014-.295.005-2.049 0 0zm-.056-2.136c-.49-30.819-4.53-39.601-35.443-45.16 0 0-4.351 5.525-14.494 5.525l-14.495-5.525c-30.575 5.498-34.861 14.15-35.424 44.159-.046 2.45-.068 2.579-.076 2.295.002.533.004 1.519.004 3.238 0 0 7.36 14.783 49.991 14.783 42.63 0 49.991-14.783 49.991-14.783l.002-2.395c-.008.176-.025-.165-.056-2.136z"></path></svg></span></p>
                                                                </div>
                                                            </li>

                                                            <li class="benefit mb3">
                                                                <div class="mx2 inline-block col-md-2 benefit-icon align-top"><svg viewBox="0 0 368.373 368.373" xmlns="http://www.w3.org/2000/svg"><g><path d="M302.932 225.875l-22.688-3.297-10.145-20.559c-1.264-2.56-3.871-4.181-6.726-4.181-2.854 0-5.462 1.621-6.726 4.181l-10.146 20.559-22.688 3.297c-2.825.41-5.173 2.389-6.055 5.104-.882 2.715-.146 5.695 1.898 7.688l16.417 16.001-3.876 22.598c-.482 2.814.674 5.657 2.982 7.335 2.311 1.678 5.372 1.901 7.898.571l20.294-10.668 20.294 10.668c1.097.577 2.295.861 3.488.861h.021c4.143 0 7.5-3.358 7.5-7.5 0-.629-.078-1.24-.224-1.824l-3.781-22.041 16.417-16.001c2.044-1.993 2.779-4.974 1.897-7.688-.878-2.715-3.226-4.694-6.051-5.104z"></path><path d="M263.373 136.937c-34.485 0-65.14 16.713-84.293 42.463-7.653-1.61-15.582-2.463-23.707-2.463-8.643 0-17.063.965-25.165 2.781-38.121 8.543-69.149 36.066-82.606 72.092-4.669 12.5-7.229 26.02-7.229 40.127 0 8.284 6.716 15 15 15h125.596c19.246 24.348 49.03 40 82.404 40 57.898 0 105-47.103 105-105s-47.102-105-105-105zm0 180c-13.592 0-26.339-3.652-37.344-10-22.48-12.967-37.656-37.236-37.656-65 0-20.01 7.892-38.199 20.708-51.662 13.67-14.359 32.946-23.338 54.292-23.338 41.356 0 75 33.645 75 75s-33.644 75-75 75z"></path><path d="M32.622 84.187c0 23.666 18.367 43.109 41.594 44.857-7.382-13.302-11.594-28.596-11.594-44.857s4.212-31.556 11.594-44.857c-23.227 1.747-41.594 21.191-41.594 44.857z"></path><path d="M93.489 160.825c-5.17-1.077-10.482-1.639-15.867-1.639-42.801.001-77.622 34.822-77.622 77.624 0 8.284 6.716 15 15 15h1.025c11.602-40.229 40.193-73.323 77.464-90.985z"></path><path d="M104.216 47.915c-7.289 10.25-11.594 22.764-11.594 36.271s4.305 26.021 11.594 36.271c11.383 16.006 30.065 26.479 51.157 26.479 34.601 0 62.75-28.149 62.75-62.75s-28.149-62.75-62.75-62.75c-21.093.001-39.774 10.473-51.157 26.479z"></path></g></svg></div>
                                                                <div class="col-md-10 inline-block">
                                                                    <h3 class="h3 regular">Unlock Exclusive Galleries</h3>
                                                                    <p class="regular">View our most beautiful women in our exclusive photo galleries! <span class="inline-block membership-type membership-type-gold mx1"><svg viewBox="0 0 101 131" xmlns="http://www.w3.org/2000/svg"><path d="M50.895 64.068c14.618 0 26.469-14.342 26.469-32.034s-3.891-32.034-26.469-32.034c-22.578 0-26.47 14.342-26.47 32.034s11.851 32.034 26.47 32.034zm-49.995 48.912c-.005-1.079-.009-.304 0 0zm99.987.843c.014-.295.005-2.049 0 0zm-.056-2.136c-.49-30.819-4.53-39.601-35.443-45.16 0 0-4.351 5.525-14.494 5.525l-14.495-5.525c-30.575 5.498-34.861 14.15-35.424 44.159-.046 2.45-.068 2.579-.076 2.295.002.533.004 1.519.004 3.238 0 0 7.36 14.783 49.991 14.783 42.63 0 49.991-14.783 49.991-14.783l.002-2.395c-.008.176-.025-.165-.056-2.136z"></path></svg></span><span class="inline-block membership-type membership-type-platinum"><svg viewBox="0 0 101 131" xmlns="http://www.w3.org/2000/svg"><path d="M50.895 64.068c14.618 0 26.469-14.342 26.469-32.034s-3.891-32.034-26.469-32.034c-22.578 0-26.47 14.342-26.47 32.034s11.851 32.034 26.47 32.034zm-49.995 48.912c-.005-1.079-.009-.304 0 0zm99.987.843c.014-.295.005-2.049 0 0zm-.056-2.136c-.49-30.819-4.53-39.601-35.443-45.16 0 0-4.351 5.525-14.494 5.525l-14.495-5.525c-30.575 5.498-34.861 14.15-35.424 44.159-.046 2.45-.068 2.579-.076 2.295.002.533.004 1.519.004 3.238 0 0 7.36 14.783 49.991 14.783 42.63 0 49.991-14.783 49.991-14.783l.002-2.395c-.008.176-.025-.165-.056-2.136z"></path></svg></span></p>
                                                                </div>
                                                            </li>

                                                            <li class="benefit mb3">
                                                                <div class="mx2 inline-block col-md-2 benefit-icon align-top"><!--?xml version="1.0" encoding="utf-8"?-->
                                                                    <!-- Generator: Adobe Illustrator 21.0.2, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 784.5 535.5" style="enable-background:new 0 0 784.5 535.5;" xml:space="preserve">
                                                                        <style type="text/css">
                                                                            .st0{enable-background:new    ;}
                                                                        </style>
                                                                        <path id="Path_74" class="st0" d="M769.8,51.7L568.6,83.8l46.3,57.1L444.1,279.7L321.2,128.6L14.8,377.9l36,43.9l262.4-213.4
                                                                              l122.3,151.1l215.3-174.8l46.3,56.6L769.8,51.7z"></path>
                                                                    </svg>
                                                                </div>
                                                                <div class="col-md-10 inline-block">
                                                                    <h3 class="h3 regular">Rank Above Other Members</h3>
                                                                    <p class="regular">As a premium member, your profile will rank above standard members in search results. <span class="inline-block membership-type membership-type-platinum"><svg viewBox="0 0 101 131" xmlns="http://www.w3.org/2000/svg"><path d="M50.895 64.068c14.618 0 26.469-14.342 26.469-32.034s-3.891-32.034-26.469-32.034c-22.578 0-26.47 14.342-26.47 32.034s11.851 32.034 26.47 32.034zm-49.995 48.912c-.005-1.079-.009-.304 0 0zm99.987.843c.014-.295.005-2.049 0 0zm-.056-2.136c-.49-30.819-4.53-39.601-35.443-45.16 0 0-4.351 5.525-14.494 5.525l-14.495-5.525c-30.575 5.498-34.861 14.15-35.424 44.159-.046 2.45-.068 2.579-.076 2.295.002.533.004 1.519.004 3.238 0 0 7.36 14.783 49.991 14.783 42.63 0 49.991-14.783 49.991-14.783l.002-2.395c-.008.176-.025-.165-.056-2.136z"></path></svg></span></p>
                                                                </div>
                                                            </li>
                                                        </ul>

                                                    </div>
                                                    <div class="col col-md-6 px3">
                                                        <ul class="list-reset">
                                                            <li class="mb3">
                                                                <div class="mx2 inline-block col-md-2 benefit-icon align-top"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128.1 128.1" enable-background="new 0 0 128.1 128.1"><path d="M64.1 128.1c-35.4 0-64.1-28.7-64.1-64 0-35.4 28.7-64.1 64.1-64.1s64.1 28.7 64.1 64.1c-.1 35.3-28.8 64-64.1 64zm0-115.1c-28.2 0-51.1 22.9-51.1 51.1s22.9 51.1 51.1 51.1 51.1-22.9 51.1-51.1-23-51.1-51.1-51.1z"></path><g><path d="M37.7 49l3.6 6.1c1 1.9 2 3.8 3 5.5h.2l2.8-5.6 3.2-5.9h12.4l-12.1 17.4 12.2 19.2h-12.9l-3.7-6.6c-1-1.8-1.9-3.7-2.8-5.5h-.2c-.9 2-1.9 3.8-2.8 5.5l-3.4 6.6h-12.6l12.5-18.7-12.2-18h12.8zM66.5 85.7v-6.9l6.3-5.7c10.7-9.5 15.8-15 16-20.7 0-4-2.4-7.1-8-7.1-4.2 0-7.9 2.1-10.4 4.1l-3.2-8.2c3.7-2.8 9.4-5 16-5 11 0 17.1 6.5 17.1 15.3 0 8.2-5.9 14.7-13 21l-4.5 3.8v.1h18.2v9.4h-34.5z"></path></g></svg></div>
                                                                <div class="col-md-10 inline-block">
                                                                    <h3 class="h3 regular">Double Your Profile Space</h3>
                                                                    <p class="regular">Platinum members get twice the profile space in search results. <span class="inline-block membership-type membership-type-platinum"><svg viewBox="0 0 101 131" xmlns="http://www.w3.org/2000/svg"><path d="M50.895 64.068c14.618 0 26.469-14.342 26.469-32.034s-3.891-32.034-26.469-32.034c-22.578 0-26.47 14.342-26.47 32.034s11.851 32.034 26.47 32.034zm-49.995 48.912c-.005-1.079-.009-.304 0 0zm99.987.843c.014-.295.005-2.049 0 0zm-.056-2.136c-.49-30.819-4.53-39.601-35.443-45.16 0 0-4.351 5.525-14.494 5.525l-14.495-5.525c-30.575 5.498-34.861 14.15-35.424 44.159-.046 2.45-.068 2.579-.076 2.295.002.533.004 1.519.004 3.238 0 0 7.36 14.783 49.991 14.783 42.63 0 49.991-14.783 49.991-14.783l.002-2.395c-.008.176-.025-.165-.056-2.136z"></path></svg></span></p>
                                                                </div>
                                                            </li>
                                                            <li class="mb3">
                                                                <div class="mx2 inline-block col-md-2 benefit-icon align-top"><svg viewBox="0 0 100 97" xmlns="http://www.w3.org/2000/svg"><path d="M98.767 40.078c1.098-.964 1.509-2.49 1.046-3.874-.464-1.385-1.713-2.355-3.17-2.464l-29.035-2.167c-1.349-.102-2.526-.941-3.058-2.18l-11.532-26.737c-.579-1.338-1.905-2.203-3.365-2.187-1.457.013-2.766.898-3.319 2.25l-11.034 26.947c-.51 1.25-1.675 2.112-3.019 2.236l-28.993 2.704c-1.453.135-2.683 1.128-3.121 2.519-.437 1.391.003 2.911 1.115 3.855l22.217 18.823c1.03.875 1.49 2.246 1.194 3.562l-6.387 28.41c-.319 1.424.243 2.901 1.434 3.749 1.191.845 2.769.898 4.013.128l24.762-15.317c1.148-.71 2.595-.724 3.759-.032l25.042 14.853c1.253.743 2.835.665 4.006-.204 1.171-.868 1.711-2.359 1.362-3.775l-6.907-28.286c-.322-1.312.112-2.694 1.125-3.585l21.866-19.228z"></path></svg></div>
                                                                <div class="col-md-10 inline-block">
                                                                    <h3 class="h3 regular">Stand Out From the Crowd</h3>
                                                                    <p class="regular">As a Platinum member you'll be shown at the top of search results <span class="inline-block membership-type membership-type-platinum"><svg viewBox="0 0 101 131" xmlns="http://www.w3.org/2000/svg"><path d="M50.895 64.068c14.618 0 26.469-14.342 26.469-32.034s-3.891-32.034-26.469-32.034c-22.578 0-26.47 14.342-26.47 32.034s11.851 32.034 26.47 32.034zm-49.995 48.912c-.005-1.079-.009-.304 0 0zm99.987.843c.014-.295.005-2.049 0 0zm-.056-2.136c-.49-30.819-4.53-39.601-35.443-45.16 0 0-4.351 5.525-14.494 5.525l-14.495-5.525c-30.575 5.498-34.861 14.15-35.424 44.159-.046 2.45-.068 2.579-.076 2.295.002.533.004 1.519.004 3.238 0 0 7.36 14.783 49.991 14.783 42.63 0 49.991-14.783 49.991-14.783l.002-2.395c-.008.176-.025-.165-.056-2.136z"></path></svg></span></p>
                                                                </div>
                                                            </li>
                                                            <li class="mb3">
                                                                <div class="mx2 inline-block col-md-2 benefit-icon align-top"><svg viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg"><path d="M48.776 42.867l-10.862-10.862-.186-.152c2.137-3.242 3.385-7.123 3.385-11.297 0-11.353-9.204-20.557-20.557-20.557-11.353 0-20.557 9.204-20.557 20.557 0 11.353 9.203 20.557 20.556 20.557 4.174 0 8.055-1.247 11.297-3.385l.152.186 10.862 10.862c1.632 1.632 4.277 1.632 5.909 0 1.632-1.632 1.632-4.277 0-5.909zm-28.22-8.881c-7.418 0-13.43-6.013-13.43-13.43 0-7.418 6.013-13.43 13.43-13.43s13.43 6.013 13.43 13.43-6.013 13.43-13.43 13.43z"></path></svg></div>
                                                                <div class="col-md-10 inline-block">
                                                                    <h3 class="h3 regular">Unlock Exclusive Search Features</h3>
                                                                    <p class="regular">Platinum members can search for singles by BMI, bust size, hip size and waist measurement. Meet that special someone today! <span class="inline-block membership-type membership-type-platinum"><svg viewBox="0 0 101 131" xmlns="http://www.w3.org/2000/svg"><path d="M50.895 64.068c14.618 0 26.469-14.342 26.469-32.034s-3.891-32.034-26.469-32.034c-22.578 0-26.47 14.342-26.47 32.034s11.851 32.034 26.47 32.034zm-49.995 48.912c-.005-1.079-.009-.304 0 0zm99.987.843c.014-.295.005-2.049 0 0zm-.056-2.136c-.49-30.819-4.53-39.601-35.443-45.16 0 0-4.351 5.525-14.494 5.525l-14.495-5.525c-30.575 5.498-34.861 14.15-35.424 44.159-.046 2.45-.068 2.579-.076 2.295.002.533.004 1.519.004 3.238 0 0 7.36 14.783 49.991 14.783 42.63 0 49.991-14.783 49.991-14.783l.002-2.395c-.008.176-.025-.165-.056-2.136z"></path></svg></span></p>
                                                                </div>
                                                            </li>
                                                            <li class="mb3">
                                                                <div class="mx2 inline-block col-md-2 benefit-icon align-top"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 185.023 185.023"><path d="M48.673 84.839c2.604-28.959 23.995-39.233 41.523-39.233 12.031 0 23.173 4.48 30.555 11.701 2.199-2.155 4.823-3.958 7.619-5.594.048-2.14.148-4.265-.053-6.481-3.777-42.212-55.7-37.864-64.041-13.843-8.321-24.022-60.254-28.37-64.03 13.842-4.073 45.551 43.622 75.19 59.134 83.59-7.474-12.513-12.209-27.178-10.707-43.982zM184.777 85.56c-3.777-42.212-55.685-37.858-64.026-13.843-8.346-24.016-60.263-28.369-64.052 13.843-4.841 54.303 64.052 86.12 64.052 86.12s68.896-31.817 64.026-86.12z"></path></svg></div>
                                                                <div class="col-md-10 inline-block">
                                                                    <h3 class="h3 regular">Get Better Matches</h3>
                                                                    <p class="regular">Find your perfect partner easier with access to exclusive mutual and reverse matching algorithms. It's never been easier to find that special someone. <span class="inline-block membership-type membership-type-platinum"><svg viewBox="0 0 101 131" xmlns="http://www.w3.org/2000/svg"><path d="M50.895 64.068c14.618 0 26.469-14.342 26.469-32.034s-3.891-32.034-26.469-32.034c-22.578 0-26.47 14.342-26.47 32.034s11.851 32.034 26.47 32.034zm-49.995 48.912c-.005-1.079-.009-.304 0 0zm99.987.843c.014-.295.005-2.049 0 0zm-.056-2.136c-.49-30.819-4.53-39.601-35.443-45.16 0 0-4.351 5.525-14.494 5.525l-14.495-5.525c-30.575 5.498-34.861 14.15-35.424 44.159-.046 2.45-.068 2.579-.076 2.295.002.533.004 1.519.004 3.238 0 0 7.36 14.783 49.991 14.783 42.63 0 49.991-14.783 49.991-14.783l.002-2.395c-.008.176-.025-.165-.056-2.136z"></path></svg></span></p>
                                                                </div>
                                                            </li>

                                                            <li class="mb3">
                                                                <div class="mx2 inline-block col-md-2 benefit-icon align-top"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 535.5 535.5"><g><path d="M165.75 91.8l63.75 35.7-35.701-63.75 35.701-63.75-63.75 35.7-63.75-35.7 35.7 63.75-35.7 63.75zM471.75 341.7l-63.75-35.7 35.7 63.75-35.7 63.75 63.75-35.7 63.75 35.7-35.7-63.75 35.7-63.75zM535.5 0l-63.75 35.7-63.75-35.7 35.7 63.75-35.7 63.75 63.75-35.7 63.75 35.7-35.7-63.75zM341.7 135.15c-10.2-10.2-25.5-10.2-35.7 0l-298.351 298.35c-10.2 10.2-10.2 25.5 0 35.7l58.65 58.649c10.2 10.2 25.5 10.2 35.7 0l298.351-298.349c10.2-10.2 10.2-25.5 0-35.7l-58.65-58.65zm-28.05 140.25l-53.55-53.55 61.2-61.2 53.55 53.55-61.2 61.2z"></path></g></svg></div>
                                                                <div class="col-md-10 inline-block">
                                                                    <h3 class="h3 regular">Instantly Translate Messages</h3>
                                                                    <p class="regular">Don’t let language barriers get in the way of love with messages translated instantly. <span class="inline-block membership-type membership-type-platinum"><svg viewBox="0 0 101 131" xmlns="http://www.w3.org/2000/svg"><path d="M50.895 64.068c14.618 0 26.469-14.342 26.469-32.034s-3.891-32.034-26.469-32.034c-22.578 0-26.47 14.342-26.47 32.034s11.851 32.034 26.47 32.034zm-49.995 48.912c-.005-1.079-.009-.304 0 0zm99.987.843c.014-.295.005-2.049 0 0zm-.056-2.136c-.49-30.819-4.53-39.601-35.443-45.16 0 0-4.351 5.525-14.494 5.525l-14.495-5.525c-30.575 5.498-34.861 14.15-35.424 44.159-.046 2.45-.068 2.579-.076 2.295.002.533.004 1.519.004 3.238 0 0 7.36 14.783 49.991 14.783 42.63 0 49.991-14.783 49.991-14.783l.002-2.395c-.008.176-.025-.165-.056-2.136z"></path></svg></span></p>
                                                                </div>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 pd-t-30 pd-b-70">
                                                <div class="col-md-4 next-step relative mt1 center-block">
                                                    <a href="#" class="green-mid-button"> Upgrade Now! </a>
                                                </div>
                                            </div>
                                            <div class="clearfix">
                                                <div class="right">
                                                    <div class="inline-block m2">
                                                        <span class="inline-block membership-type membership-type-gold mx1"><svg viewBox="0 0 101 131" xmlns="http://www.w3.org/2000/svg"><path d="M50.895 64.068c14.618 0 26.469-14.342 26.469-32.034s-3.891-32.034-26.469-32.034c-22.578 0-26.47 14.342-26.47 32.034s11.851 32.034 26.47 32.034zm-49.995 48.912c-.005-1.079-.009-.304 0 0zm99.987.843c.014-.295.005-2.049 0 0zm-.056-2.136c-.49-30.819-4.53-39.601-35.443-45.16 0 0-4.351 5.525-14.494 5.525l-14.495-5.525c-30.575 5.498-34.861 14.15-35.424 44.159-.046 2.45-.068 2.579-.076 2.295.002.533.004 1.519.004 3.238 0 0 7.36 14.783 49.991 14.783 42.63 0 49.991-14.783 49.991-14.783l.002-2.395c-.008.176-.025-.165-.056-2.136z"></path></svg></span> Gold Member
                                                    </div>
                                                    <div class="inline-block m2">
                                                        <span class="inline-block membership-type membership-type-platinum"><svg viewBox="0 0 101 131" xmlns="http://www.w3.org/2000/svg"><path d="M50.895 64.068c14.618 0 26.469-14.342 26.469-32.034s-3.891-32.034-26.469-32.034c-22.578 0-26.47 14.342-26.47 32.034s11.851 32.034 26.47 32.034zm-49.995 48.912c-.005-1.079-.009-.304 0 0zm99.987.843c.014-.295.005-2.049 0 0zm-.056-2.136c-.49-30.819-4.53-39.601-35.443-45.16 0 0-4.351 5.525-14.494 5.525l-14.495-5.525c-30.575 5.498-34.861 14.15-35.424 44.159-.046 2.45-.068 2.579-.076 2.295.002.533.004 1.519.004 3.238 0 0 7.36 14.783 49.991 14.783 42.63 0 49.991-14.783 49.991-14.783l.002-2.395c-.008.176-.025-.165-.056-2.136z"></path></svg></span> Platinum Member
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            @section('script')
                            <script>
                                $(document).ready(function () {
                                    $("select[name=country]").trigger("change");
                                    $('.content-wrapper').width('auto');
                                    $('.content-wrapper').css('padding-left', '0');
                                    $('body').on('click', '.icons-standard', function (e) {
                                        $('#advertisement-upgrade').modal('show');
                                    });
                                    $('body').on('click', '.modal-icon-close', function (e) {
                                        $('#advertisement-upgrade').modal('hide');
                                    });
                                    $('body').on('click', '.modal-icon-close', function (e) {
                                        $('#advertisement-upgrade').modal('hide');
                                    });
                                    // photo-display-popup
                                    $('body').on('click', '.photo-display-popup', function (e) {
                                        var user_id = $(this).attr('data-user');
                                        users.getProfile(user_id);
                                    });
                                });
                            </script>
                            @endsection
                            @endsection