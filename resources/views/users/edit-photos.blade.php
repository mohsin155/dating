@extends('layouts.main')
@section('content')
<div class="content-wrapper-inner">
    <div class="content-wrapper-settings">
        @include('users.edit-profile-tabs')
        <div class="address-update-container">
            <div class="address-update-inner">
                <div>
                    <h1>Upload a photo</h1>
                </div>
            </div>
            @if(session()->has('success'))
            <div class="alert alert-success">
                <ul>
                    <li> {{session()->get('success')}} </li>
                </ul>
            </div>
            @endif
            <div class="email-address signup-page-outer">
                <?php $photo_id = 0;?>
                @if(!empty($sel_photo))
                <div class="formContainer">
                    <img src="{{$image_path}}{{$sel_photo->photo_name}}" height="130px" width="130px"/>
                </div>
                <?php $photo_id = $sel_photo->photo_id;?>
                @endif
                <div class="photo-upload-section text-center">
                    <h3 class="pcOrFacebook">From your computer</h3>
                    <div class="button-inner text-center">
                        <button class="btn btn-primary btn-green" type="button" id="upload-file">+ Choose File</button>
                    </div>
                    <form class="mx-auto block col-4 center upload_photo" name="uploadPhotoForm" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="photo_id" value="{{$photo_id}}" />
                        <input type="file" name="uploadForm" value="uploadForm" id="uploadForm2" accept="image/jpeg,image/gif,image/png,image/bmp" class="hide">
                    </form>
                </div>
            </div>
            <div class="sectionHeading clearfix"><h2 style="width:300px">Photo Guidelines</h2><!--<a href="#" class="addNewPhoto right" id="addNewPhoto">Can't upload photos? Try these alternatives »</a>--></div>
            <div class="guidelines clearfix">
                <div class="left"><img src="{{url('image/personality.jpg')}}" class="guidelinepic" width="80" height="80"><img src="{{url('image/fullbody.jpg')}}"  class="guidelinepic" width="80" height="80"></div>
                <p style="padding-bottom:5px"><strong>How to choose the right gallery photos:</strong></p>
                <div class="guideline left">
                    <ul>
                        <li>Shows you doing something you enjoy</li>
                        <li>Reflects your personality</li>
                        <li>At least 1 photo shows your full body</li>
                        <li>Shows you in a unique setting (conversation-starters)</li>
                    </ul>
                    <div class="clear"></div></div>
                <div class="guideline left">
                    <ul>
                        <li>Clearly shows your face</li>
                        <li>Good quality and well lit</li>
                        <li>MUST contain YOU</li>
                        <li>DOES NOT contain nudity</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="roundedContainer">
            <div class="formContainer">
                <div class="mainHeading clearfix"><h1>Manage Photos</h1></div>
                <ul>
                    <li>
                        <p><strong>You can add {{5-count($photos)}} more photos to your gallery.</strong> Use the uploader options above to add more photos to your profile.</p>
                    </li>
                </ul>
            </div>     
            <!--<div class="errormsg clearfix">
                <strong class="left">Pending photos should be processed within 12 hours. You cannot re-order photos while they are pending approval. </strong>
            </div>-->
            <form method="post" action="" id="managePhotosForm">
                <div class="photos clearfix ui-sortable" id="sortable" unselectable="on">
                    <?php $i = 1;?>
                    @foreach($photos as $photo)
                    <div class="photobg profilePhoto" id="p_{{$i}}" data-id="ui.position">
                        @if($i == 1)<div class="photoHeading"><span class="primaryTitle">Primary Photo</span></div>@endif
                        <div class="photooverlay" id="photoOverlay_1" style="display:none;">
                            <ul>
                                <li><a href="{{url('users/delete-image')}}/{{$photo->photo_id}}" class="delete-photo">Delete</a></li><li>
                                </li><li><a href="{{url('users/edit-photos')}}/{{$photo->photo_id}}" class="replace-photo">Replace</a></li>
                                <!--<li><a href="#">Unhide</a></li>-->
                            </ul>
                        </div>
                        <a title="click to enlarge photo" id="photoid_1" class="enlargePhoto">
                            <span class="photo " ><img src="{{$image_path}}{{$photo->photo_name}}" width="100%" height="100%" />
                            </span>
                        </a>
                        <div class="replace">
                            <a href="JavaScript:void(0);" data-photooverlayid="photoOverlay_1" class="photoOptions">Edit Photo</a>
                        </div>
                        <input name="photoOrder" type="hidden" value="1">
                    </div>
                    <?php $i++;?>
                    @endforeach
                    @for(;$i<=5;$i++)
                    <div class="photobg"  id="p_{{$i}}" data-id="ui.position">
                        <div class="photoHeading"><span class="primaryTitle"></span></div>
                        <div class="photooverlay" id="photoOverlay_2" style="display:none;">
                            <ul>
                                <li><a href="JavaScript:void(0);" data-number="2" class="delete-photo">Delete</a></li><li>
                                </li><li><a href="#" class="replace-photo">Replace</a></li>
                            </ul>
                        </div>
                        <a title="click to enlarge photo" id="photoid_2" class="enlargePhoto" href="" data-status="2" data-modaltitle="Photo 2">
                            <span class="photo " >
                                <div class="status pending hide">hidden</div>
                            </span>
                        </a>
                        <div class="replace hide">
                            <a href="JavaScript:void(0);" data-photooverlayid="photoOverlay_2" class="photoOptions">Edit Photo</a>
                        </div>
                        <input name="photoOrder" type="hidden" value="2">
                    </div>
                    @endfor
                    
                </div>
            </form>
        </div>
    </div>
</div>
@endsection