@extends('layouts.main')
@section('content')
<div class="content-wrapper-inner">
    <div class="content-wrapper-settings">
        @include('users.edit-profile-tabs')
        <div class="address-update-container">
            <div class="address-update-inner">
                <div>
                    <h1>Tag Your Profile</h1>
                </div>

            </div>
            <div class="description">
                Add CupidTags to your profile. It makes searching easier and can help you find other members you have something in common with.
            </div>
            <div class="col-md-12 address-update-heading">
                <div class="col-md-6 tag-profile ">
                    <h1>Add CupidTags</h1>
                </div>
                <div class="col-md-6 tag-profile">
                    <h1>Manage CupidTags</h1>
                </div>
            </div>
            <div class="col-md-6 cupid-tag-page">
                <div>Add tags that you feel describe yourself (personal traits, physical characteristics, hobbies and interests etc.) <strong>Please add one CupidTag at a time.</strong></div>
                <div class="addtags">
                    <div class="terterdwordlabel"><strong>Add A CupidTag:</strong></div>
                    <div class="add-tag">
                        <input name="newCupidWord" id="newCupidWord" type="text" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
                        <input type="submit" value="Add" class="greenShinyButton greenShinyButton-add addbutton" name="addCupidTagsBtn">
                    </div>
                </div>

            </div>
            <div class="col-md-6  managetags">
                <div class="mr-b-30">Remove any tags below that do not describe you.</div>
                <ul id="managetaglist" class="pd-l-0">
                    <li class="quote">Remove any tags below that do not describe you.</li>

                    <li id="" style="border-bottom:0" class="cupidText clearfix"><span class="left">Candid </span>

                        <img src="{{url('image//icon-deleteword.gif')}}" class="removeIcon" alt="Delete" border="0" title="Delete" style="cursor:hand;cursor:pointer" id="224">
                        <a href="#"><img src="{{url('image//icon-search.gif')}}" class="icon right" border="0" alt="Search!" title="Search!" style="cursor:hand;cursor:pointer"></a>

                    </li>

                     <li id="" style="border-bottom:0" class="cupidText clearfix"><span class="left">Candid </span>

                        <img src="{{url('image//icon-deleteword.gif')}}" class="removeIcon" alt="Delete" border="0" title="Delete" style="cursor:hand;cursor:pointer" id="224">
                        <a href="#"><img src="{{url('image//icon-search.gif')}}" class="icon right" border="0" alt="Search!" title="Search!" style="cursor:hand;cursor:pointer"></a>

                    </li>

                   
                </ul>
                
            </div>
            <div class="email-address button-inner text-center">
                        <button class="btn btn-primary btn-green" type="submit">Submit</button>
                    </div>
        </div>
    </div>
</div>
</div>
@endsection