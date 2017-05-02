@extends('layouts.main')
@section('content')
<div class="content-wrapper-inner">
    <div class="content-wrapper-settings">
        @include('users.edit-profile-tabs')
        <div class="address-update-container">
            <div class="address-update-inner">
                <div>
                    <h1>Edit Hobbies & Interests</h1>
                </div>

            </div>
            <div class="description">
                <em>Let others know what your interests are and help us connect you with other users that may have similar interests. Answer all questions below to complete this step.</em>
            </div>
            <div class="signup-page-outer">
                <form name="edit-interest" class="form-inline" method="post" id="edit-interest" action="{{url('users/edit-interest')}}">
                   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            @if(!empty($errors) && count($errors)>0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors as $messages)
                                            <li> {{$messages}} </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                   <?php print_r ($data);exit; ?>
                    <div class="form-group">
                        <label for="relationship">What do you do for fun / entertainment? : </label>
                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_393" type="checkbox" value="Antiques" @if(in_array("Antiques",$data)) checked @endif />Antiques</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_395" type="checkbox" value="Astrology" @if(in_array("Astrology",$data)) checked @endif />Astrology</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_396" type="checkbox" value="Bars / Pubs / Nightclubs" @if(in_array("Bars / Pubs / Nightclubs",$data)) checked @endif />Bars / Pubs / Nightclubs</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_399" type="checkbox" value="Board / Card Games" @if(in_array("Board / Card Games",$data)) checked @endif />Board / Card Games</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_401" type="checkbox" value="Cars / Mechanics" @if(in_array("Cars / Mechanics",$data)) checked @endif />Cars / Mechanics</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_403" type="checkbox" value="Collecting" @if(in_array("Collecting",$data)) checked @endif />Collecting</div>

                    <div class="pets-section"><input name="[interestEntertainmen]" id="interestEntertainment_404" type="checkbox" value="Computers / Internet" @if(in_array("Computers / Internet",$data)) checked @endif />Computers / Internet</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_407" type="checkbox" value="Cooking / Food and Wine" @if(in_array("Cooking / Food and Wine",$data)) checked @endif />Cooking / Food and Wine</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_409" type="checkbox" value="Dancing" @if(in_array("Dancing",$data)) checked @endif />Dancing</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_411" type="checkbox" value="Dinner Parties" @if(in_array("Dinner Parties",$data)) checked @endif />Dinner Parties</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_414" type="checkbox" value="Family" @if(in_array("Family",$data)) checked @endif />Family</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_415" type="checkbox" value="Gardening / Landscaping" @if(in_array("Gardening / Landscaping",$data)) checked @endif />Gardening / Landscaping</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_417" type="checkbox" value="Investing / Finance" @if(in_array("Investing / Finance",$data)) checked @endif />Investing / Finance</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_419" type="checkbox" value="Library" @if(in_array("Library",$data)) checked @endif />Library</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_423" type="checkbox" value="Motorcycles" @if(in_array("Motorcycles",$data)) checked @endif />Motorcycles</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_425" type="checkbox" value="Museums / Galleries" @if(in_array("Museums / Galleries",$data)) checked @endif />Museums / Galleries</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_421" type="checkbox" value="Music (Playing)" @if(in_array("Music (Playing)",$data)) checked @endif />Music (Playing)</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_427" type="checkbox" value="Pets" @if(in_array("Pets",$data)) checked @endif />Pets</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_429" type="checkbox" value="Photography" @if(in_array("Photography",$data)) checked @endif />Photography</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_431" type="checkbox" value="Reading" @if(in_array("Reading",$data)) checked @endif />Reading</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_433" type="checkbox" value="Shopping" @if(in_array("Shopping",$data)) checked @endif />Shopping</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_437" type="checkbox" value="TV: Educational / News" @if(in_array("TV: Educational / News",$data)) checked @endif />TV: Educational / News</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_435" type="checkbox" value="Theatre" @if(in_array("Theatre",$data)) checked @endif />Theatre</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_439" type="checkbox" value="Video / Online Games" @if(in_array("Video / Online Games",$data)) checked @endif />Video / Online Games</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_441" type="checkbox" value="Watching Sports" @if(in_array("Watching Sports",$data)) checked @endif />Watching Sports</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_443" type="checkbox" value="Writing" @if(in_array("Writing",$data)) checked @endif />Writing</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_394" type="checkbox" value="Art / Painting" @if(in_array("Art / Painting",$data)) checked @endif />Art / Painting</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_397" type="checkbox" value="Ballet" @if(in_array("Ballet",$data)) checked @endif />Ballet</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_398" type="checkbox" value="Beach / Parks" @if(in_array("Beach / Parks",$data)) checked @endif />Beach / Parks</div>

                    <div class="pets-section"><input name="interestEntertainment" id="interestEntertainment_400" type="checkbox" value="Camping / Nature" @if(in_array("Camping / Nature",$data)) checked @endif />Camping / Nature</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_402" type="checkbox" value="Casino / Gambling" @if(in_array("Casino / Gambling",$data)) checked @endif />Casino / Gambling</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_405" type="checkbox" value="Comedy Clubs" @if(in_array("Comedy Clubs",$data)) checked @endif />Comedy Clubs</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_406" type="checkbox" value="Concerts / Live Music" @if(in_array("Concerts / Live Music",$data)) checked @endif />Concerts / Live Music</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_408" type="checkbox" value="Crafts" @if(in_array("Crafts",$data)) checked @endif />Crafts</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_410" type="checkbox" value="Dining Out" @if(in_array("Dining Out",$data)) checked @endif />Dining Out</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_412" type="checkbox" value="Education" @if(in_array("Education",$data)) checked @endif />Education</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_413" type="checkbox" value="Fashion Events" @if(in_array("Fashion Events",$data)) checked @endif />Fashion Events</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_416" type="checkbox" value="Home Improvement" @if(in_array("Home Improvement",$data)) checked @endif />Home Improvement</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_418" type="checkbox" value="Karaoke / Sing-along" @if(in_array("Karaoke / Sing-along",$data)) checked @endif />Karaoke / Sing-along</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_422" type="checkbox" value="Meditation" @if(in_array("Meditation",$data)) checked @endif />Meditation</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_424" type="checkbox" value="Movies / Cinema" @if(in_array("Movies / Cinema",$data)) checked @endif />Movies / Cinema</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_420" type="checkbox" value="Music (Listening)" @if(in_array("Music (Listening)",$data)) checked @endif />Music (Listening)</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_426" type="checkbox" value="News / Politics" @if(in_array("News / Politics",$data)) checked @endif />News / Politics</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_428" type="checkbox" value="Philosophy / Spirituality" @if(in_array("Philosophy / Spirituality",$data)) checked @endif />Philosophy / Spirituality</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_430" type="checkbox" value="Poetry" @if(in_array("Poetry",$data)) checked @endif />Poetry</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_432" type="checkbox" value="Science and Technology" @if(in_array("Science and Technology",$data)) checked @endif />Science and Technology</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_434" type="checkbox" value="Social Causes / Activism" @if(in_array("Social Causes / Activism",$data)) checked @endif />Social Causes / Activism</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_438" type="checkbox" value="TV: Entertainment" @if(in_array("TV: Entertainment",$data)) checked @endif />TV: Entertainment</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_436" type="checkbox" value="Traveling" @if(in_array("Traveling",$data)) checked @endif />Traveling</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_440" type="checkbox" value="Volunteering" @if(in_array("Volunteering",$data)) checked @endif />Volunteering</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_442" type="checkbox" value="Wine Tasting" @if(in_array("Wine Tasting",$data)) checked @endif />Wine Tasting</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_252" type="checkbox" value="Other" @if(in_array("Other",$data)) checked @endif />Other</div>
            </div>
            <hr class="seperate-line">
            <div class="form-group">
                <label for="relationship">What sort of food do you like? : </label>
                <div class="pets-section"><input name="interestFood[]" id="interestFood_445" type="checkbox" value="American" @if(in_array("Antiques",$data)) checked @endif />American</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_451" type="checkbox" value="Cajun / Southern"/>Cajun / Southern</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_457" type="checkbox" value="Caribbean/Cuban"/>Caribbean/Cuban</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_462" type="checkbox" value="Continental"/>Continental</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_468" type="checkbox" value="Eastern European"/>Eastern European</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_446" type="checkbox" value="French"/>French</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_452" type="checkbox" value="Greek"/>Greek</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_458" type="checkbox" value="Italian"/>Italian</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_463" type="checkbox" value="Jewish / Kosher"/>Jewish / Kosher</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_469" type="checkbox" value="Mediterranean"/>Mediterranean</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_447" type="checkbox" value="Middle Eastern"/>Middle Eastern</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_453" type="checkbox" value="Soul Food"/>Soul Food</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_459" type="checkbox" value="Southwestern"/>Southwestern</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_470" type="checkbox" value="Vegan"/>Vegan</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_473" type="checkbox" value="Vietnamese"/>Vietnamese</div>
                
                <div class="pets-section"><input name="interestFood[]" id="interestFood_448" type="checkbox" value="Barbecue"/>Barbecue</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_454" type="checkbox" value="California-Fusion"/>California-Fusion</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_460" type="checkbox" value="Chinese / Dim Sum"/>Chinese / Dim Sum</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_465" type="checkbox" value="Deli"/>Deli</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_471" type="checkbox" value="Fast Food / Pizza"/>Fast Food / Pizza</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_449" type="checkbox" value="German"/>German</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_455" type="checkbox" value="Indian"/>Indian</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_461" type="checkbox" value="Japanese / Sushi"/>Japanese / Sushi</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_466" type="checkbox" value="Korean"/>Korean</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_472" type="checkbox" value="Mexican"/>Mexican</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_450" type="checkbox" value="Seafood"/>Seafood</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_456" type="checkbox" value="South American"/>South American</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_464" type="checkbox" value="Thai"/>Thai</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_467" type="checkbox" value="Vegetarian / Organic"/>Vegetarian / Organic</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_252" type="checkbox" value="Other"/>Other</div>
            </div>
            <hr class="seperate-line">
            <div class="form-group">
                <label for="relationship">What sort of music are you into? : </label>
                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_474" type="checkbox" value="Alternative"/>Alternative</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_476" type="checkbox" value="Country / Folk"/>Country / Folk</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_478" type="checkbox" value="Jazz / Blues"/>Jazz / Blues</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_480" type="checkbox" value="New Age"/>New Age</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_485" type="checkbox" value="R'n'B / Hip Hop"/>R'n'B / Hip Hop</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_483" type="checkbox" value="Reggae"/>Reggae</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_486" type="checkbox" value="Rock"/>Rock</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_488" type="checkbox" value="World"/>World</div>
                
                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_475" type="checkbox" value="Classical / Opera"/>Classical / Opera</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_477" type="checkbox" value="Dance / Techno"/>Dance / Techno</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_479" type="checkbox" value="Metal"/>Metal</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_481" type="checkbox" value="Pop"/>Pop</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_482" type="checkbox" value="Rap"/>Rap</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_484" type="checkbox" value="Religious"/>Religious</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_487" type="checkbox" value="Soft Rock"/>Soft Rock</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_252" type="checkbox" value="Other"/>Other</div>
            </div>
            <div class="button-inner text-center email-address">
                        <button class="btn btn-primary btn-green" type="submit">SAVE</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection