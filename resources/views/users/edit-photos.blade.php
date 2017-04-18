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

            <div class="email-address signup-page-outer">
                <div class="photo-upload-section text-center">
                    <h3 class="pcOrFacebook">From your computer</h3>
                        <div class="button-inner text-center">
                            <button class="btn btn-primary btn-green" type="button" id="upload-file">+ Choose File</button>
                    </div>
                    <form class="mx-auto block col-4 center" name="uploadPhotoForm" action="#" method="post" enctype="multipart/form-data">
            
                <input type="file" name="uploadForm" value="uploadForm" id="uploadForm2" accept="image/jpeg,image/gif,image/png,image/bmp" class="hide">
            </form>
                </div>
            </div>
            
        </div>
        
    </div>
</div>
@endsection