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
            <input name="image_path" value="{{url('image')}}" type="hidden" />
            <div class="col-md-6 cupid-tag-page">
                <div>Add tags that you feel describe yourself (personal traits, physical characteristics, hobbies and interests etc.) <strong>Please add one CupidTag at a time.</strong></div>
                <div class="addtags">
                    <div class="terterdwordlabel"><strong>Add A CupidTag:</strong></div>
                    <div class="add-tag">
                        <input name="tags" id="tags" type="text" />
                        <input name="tag_id" type="hidden" />
                        <input type="submit" id="add-tag" value="Add" class="greenShinyButton greenShinyButton-add addbutton" name="addCupidTagsBtn">
                    </div>
                </div>

            </div>
            <div class="col-md-6  managetags">
                <div class="mr-b-30">Remove any tags below that do not describe you.</div>
                <ul id="managetaglist" class="pd-l-0">
                    <li class="quote">Remove any tags below that do not describe you.</li>
                    @if(!$tags->isEmpty())
                    @foreach($tags as $tag)
                    <li id="" style="border-bottom:0" class="cupidText clearfix"><span class="left">{{$tag->tag}} </span>
                    <img src="{{url('image/icon-deleteword.gif')}}" class="removeIcon" alt="Delete" border="0" title="Delete" style="cursor:hand;cursor:pointer" data-id="{{$tag->user_tag_id}}">
                    <a href="javascript:;"><img src="{{url('image/icon-search.gif')}}" class="icon right" border="0" alt="Search!" title="Search!" style="cursor:hand;cursor:pointer"></a>
                    </li>
                    @endforeach
                    @endif
                </ul>

            </div>
            <div class="email-address button-inner text-center">
                <button class="btn btn-primary btn-green" type="submit">Submit</button>
            </div>
        </div>
    </div>
</div>
</div>
@section('script')
<script src="{{url('js/jquery-ui.js')}}"></script>
<script>
$(function () {
    $("#tags").autocomplete({
        source: "tags",
        minLength: 2,
        select: function (event, ui) {
            console.log("Selected: " + ui.item.value + " aka " + ui.item.id);
        }
    });
    $("#add-tag").on('click', function () {
        var tag = $('input[name=tags]').val();
        var image_path = $('input[name=image_path]').val();
        $.ajax({
            url: "add-tags",
            data: {keyword: tag},
            success: function (data) {
                $html = '<li id="" style="border-bottom:0" class="cupidText clearfix"><span class="left">' + tag + ' </span>';
                $html += '<img src="' + image_path + '/icon-deleteword.gif" class="removeIcon" alt="Delete" border="0" title="Delete" style="cursor:hand;cursor:pointer" data-id="'+data.tag_id+'">';
                $html += '<a href="javascript:;"><img src="' + image_path + '/icon-search.gif" class="icon right" border="0" alt="Search!" title="Search!" style="cursor:hand;cursor:pointer"></a></li>';
                $("#managetaglist").append($html);
            }
        });

    });
    $("body").on('click','.removeIcon', function () {
    var tag_id = $(this).attr('data-id');
    var _this = $(this);
        $.ajax({
            url: "delete-tags",
            data: {tag_id: tag_id},
            success: function () {
                _this.parents('li').remove();
            }
        });

    });
});
</script>
@endsection
@endsection