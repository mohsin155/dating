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
                            @elseif(session('success'))
                                        <div class="alert alert-success">
                                            <div class="updateconf">
                                                <p><h1>Your hobbies & interests have been updated</h1></p>
                                            </div>
                                    </div>
                                    @endif

                                   <?php print_r($data);  ?>

                        <label for="relationship">What do you do for fun / entertainment? : </label>
                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_393" type="checkbox" value="Antiques" @if(!empty($data['interestEntertainment']) && in_array("Antiques",$data['interestEntertainment'])) checked @endif />Antiques</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_395" type="checkbox" value="Astrology" @if(!empty($data['interestEntertainment']) && in_array("Astrology",$data['interestEntertainment'])) checked @endif />Astrology</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_396" type="checkbox" value="Bars / Pubs / Nightclubs" @if(!empty($data['interestEntertainment']) &&  in_array("Bars / Pubs / Nightclubs",$data['interestEntertainment'])) checked @endif />Bars / Pubs / Nightclubs</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_399" type="checkbox" value="Board / Card Games" @if(!empty($data['interestEntertainment']) &&  in_array("Board / Card Games",$data['interestEntertainment'])) checked @endif />Board / Card Games</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_401" type="checkbox" value="Cars / Mechanics" @if(!empty($data['interestEntertainment']) &&  in_array("Cars / Mechanics",$data['interestEntertainment'])) checked @endif />Cars / Mechanics</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_403" type="checkbox" value="Collecting" @if(!empty($data['interestEntertainment']) &&  in_array("Collecting",$data['interestEntertainment'])) checked @endif />Collecting</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_404" type="checkbox" value="Computers / Internet" @if(!empty($data['interestEntertainment']) &&  in_array("Computers / Internet",$data['interestEntertainment'])) checked @endif />Computers / Internet</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_407" type="checkbox" value="Cooking / Food and Wine" @if(!empty($data['interestEntertainment']) &&  in_array("Cooking / Food and Wine",$data['interestEntertainment'])) checked @endif />Cooking / Food and Wine</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_409" type="checkbox" value="Dancing" @if(!empty($data['interestEntertainment']) &&  in_array("Dancing",$data['interestEntertainment'])) checked @endif />Dancing</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_411" type="checkbox" value="Dinner Parties" @if(!empty($data['interestEntertainment']) &&  in_array("Dinner Parties",$data['interestEntertainment'])) checked @endif />Dinner Parties</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_414" type="checkbox" value="Family" @if(!empty($data['interestEntertainment']) &&  in_array("Family",$data['interestEntertainment'])) checked @endif />Family</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_415" type="checkbox" value="Gardening / Landscaping" @if(!empty($data['interestEntertainment']) &&  in_array("Gardening / Landscaping",$data['interestEntertainment'])) checked @endif />Gardening / Landscaping</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_417" type="checkbox" value="Investing / Finance" @if(!empty($data['interestEntertainment']) &&  in_array("Investing / Finance",$data['interestEntertainment'])) checked @endif />Investing / Finance</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_419" type="checkbox" value="Library" @if(!empty($data['interestEntertainment']) &&  in_array("Library",$data['interestEntertainment'])) checked @endif />Library</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_423" type="checkbox" value="Motorcycles" @if(!empty($data['interestEntertainment']) &&  in_array("Motorcycles",$data['interestEntertainment'])) checked @endif />Motorcycles</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_425" type="checkbox" value="Museums / Galleries" @if(!empty($data['interestEntertainment']) &&  in_array("Museums / Galleries",$data['interestEntertainment'])) checked @endif />Museums / Galleries</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_421" type="checkbox" value="Music (Playing)" @if(!empty($data['interestEntertainment']) &&  in_array("Music (Playing)",$data['interestEntertainment'])) checked @endif />Music (Playing)</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_427" type="checkbox" value="Pets" @if(!empty($data['interestEntertainment']) &&  in_array("Pets",$data['interestEntertainment'])) checked @endif />Pets</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_429" type="checkbox" value="Photography" @if(!empty($data['interestEntertainment']) &&  in_array("Photography",$data['interestEntertainment'])) checked @endif />Photography</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_431" type="checkbox" value="Reading" @if(!empty($data['interestEntertainment']) &&  in_array("Reading",$data['interestEntertainment'])) checked @endif />Reading</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_433" type="checkbox" value="Shopping" @if(!empty($data['interestEntertainment']) &&  in_array("Shopping",$data['interestEntertainment'])) checked @endif />Shopping</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_437" type="checkbox" value="TV: Educational / News" @if(!empty($data['interestEntertainment']) &&  in_array("TV: Educational / News",$data['interestEntertainment'])) checked @endif />TV: Educational / News</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_435" type="checkbox" value="Theatre" @if(!empty($data['interestEntertainment']) &&  in_array("Theatre",$data['interestEntertainment'])) checked @endif />Theatre</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_439" type="checkbox" value="Video / Online Games" @if(!empty($data['interestEntertainment']) &&  in_array("Video / Online Games",$data['interestEntertainment'])) checked @endif />Video / Online Games</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_441" type="checkbox" value="Watching Sports" @if(!empty($data['interestEntertainment']) &&  in_array("Watching Sports",$data['interestEntertainment'])) checked @endif />Watching Sports</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_443" type="checkbox" value="Writing" @if(!empty($data['interestEntertainment']) &&  in_array("Writing",$data['interestEntertainment'])) checked @endif />Writing</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_394" type="checkbox" value="Art / Painting" @if(!empty($data['interestEntertainment']) &&  in_array("Art / Painting",$data['interestEntertainment'])) checked @endif />Art / Painting</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_397" type="checkbox" value="Ballet" @if(!empty($data['interestEntertainment']) &&  in_array("Ballet",$data['interestEntertainment'])) checked @endif />Ballet</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_398" type="checkbox" value="Beach / Parks" @if(!empty($data['interestEntertainment']) &&  in_array("Beach / Parks",$data['interestEntertainment'])) checked @endif />Beach / Parks</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_400" type="checkbox" value="Camping / Nature" @if(!empty($data['interestEntertainment']) &&  in_array("Camping / Nature",$data['interestEntertainment'])) checked @endif />Camping / Nature</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_402" type="checkbox" value="Casino / Gambling" @if(!empty($data['interestEntertainment']) &&  in_array("Casino / Gambling",$data['interestEntertainment'])) checked @endif />Casino / Gambling</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_405" type="checkbox" value="Comedy Clubs" @if(!empty($data['interestEntertainment']) &&  in_array("Comedy Clubs",$data['interestEntertainment'])) checked @endif />Comedy Clubs</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_406" type="checkbox" value="Concerts / Live Music" @if(!empty($data['interestEntertainment']) &&  in_array("Concerts / Live Music",$data['interestEntertainment'])) checked @endif />Concerts / Live Music</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_408" type="checkbox" value="Crafts" @if(!empty($data['interestEntertainment']) &&  in_array("Crafts",$data['interestEntertainment'])) checked @endif />Crafts</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_410" type="checkbox" value="Dining Out" @if(!empty($data['interestEntertainment']) &&  in_array("Dining Out",$data['interestEntertainment'])) checked @endif />Dining Out</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_412" type="checkbox" value="Education" @if(!empty($data['interestEntertainment']) &&  in_array("Education",$data['interestEntertainment'])) checked @endif />Education</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_413" type="checkbox" value="Fashion Events" @if(!empty($data['interestEntertainment']) &&  in_array("Fashion Events",$data['interestEntertainment'])) checked @endif />Fashion Events</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_416" type="checkbox" value="Home Improvement" @if(!empty($data['interestEntertainment']) &&  in_array("Home Improvement",$data['interestEntertainment'])) checked @endif />Home Improvement</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_418" type="checkbox" value="Karaoke / Sing-along" @if(!empty($data['interestEntertainment']) &&  in_array("Karaoke / Sing-along",$data['interestEntertainment'])) checked @endif />Karaoke / Sing-along</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_422" type="checkbox" value="Meditation" @if(!empty($data['interestEntertainment']) &&  in_array("Meditation",$data['interestEntertainment'])) checked @endif />Meditation</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_424" type="checkbox" value="Movies / Cinema" @if(!empty($data['interestEntertainment']) &&  in_array("Movies / Cinema",$data['interestEntertainment'])) checked @endif />Movies / Cinema</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_420" type="checkbox" value="Music (Listening)" @if(!empty($data['interestEntertainment']) &&  in_array("Music (Listening)",$data['interestEntertainment'])) checked @endif />Music (Listening)</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_426" type="checkbox" value="News / Politics" @if(!empty($data['interestEntertainment']) &&  in_array("News / Politics",$data['interestEntertainment'])) checked @endif />News / Politics</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_428" type="checkbox" value="Philosophy / Spirituality" @if(!empty($data['interestEntertainment']) &&  in_array("Philosophy / Spirituality",$data['interestEntertainment'])) checked @endif />Philosophy / Spirituality</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_430" type="checkbox" value="Poetry" @if(!empty($data['interestEntertainment']) &&  in_array("Poetry",$data['interestEntertainment'])) checked @endif />Poetry</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_432" type="checkbox" value="Science and Technology" @if(!empty($data['interestEntertainment']) &&  in_array("Science and Technology",$data['interestEntertainment'])) checked @endif />Science and Technology</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_434" type="checkbox" value="Social Causes / Activism" @if(!empty($data['interestEntertainment']) &&  in_array("Social Causes / Activism",$data['interestEntertainment'])) checked @endif />Social Causes / Activism</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_438" type="checkbox" value="TV: Entertainment" @if(!empty($data['interestEntertainment']) &&  in_array("TV: Entertainment",$data['interestEntertainment'])) checked @endif />TV: Entertainment</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_436" type="checkbox" value="Traveling" @if(!empty($data['interestEntertainment']) &&  in_array("Traveling",$data['interestEntertainment'])) checked @endif />Traveling</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_440" type="checkbox" value="Volunteering" @if(!empty($data['interestEntertainment']) &&  in_array("Volunteering",$data['interestEntertainment'])) checked @endif />Volunteering</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_442" type="checkbox" value="Wine Tasting" @if(!empty($data['interestEntertainment']) &&  in_array("Wine Tasting",$data['interestEntertainment'])) checked @endif />Wine Tasting</div>

                    <div class="pets-section"><input name="interestEntertainment[]" id="interestEntertainment_252" type="checkbox" value="Other" @if(!empty($data['interestEntertainment']) &&  in_array("Other",$data['interestEntertainment'])) checked @endif />Other</div>
            </div>
            <hr class="seperate-line">
            <div class="form-group">
                <label for="relationship">What sort of food do you like? : </label>
                <div class="pets-section"><input name="interestFood[]" id="interestFood_445" type="checkbox" value="American" @if(!empty($data['interestFood']) &&  in_array("American",$data['interestFood'])) checked @endif />American</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_451" type="checkbox" value="Cajun / Southern" @if(!empty($data['interestFood']) &&  in_array("Cajun / Southern",$data['interestFood'])) checked @endif />Cajun / Southern</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_457" type="checkbox" value="Caribbean/Cuban" @if(!empty($data['interestFood']) &&  in_array("Caribbean/Cuban",$data['interestFood'])) checked @endif />Caribbean/Cuban</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_462" type="checkbox" value="Continental" @if(!empty($data['interestFood']) &&  in_array("Continental",$data['interestFood'])) checked @endif />Continental</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_468" type="checkbox" value="Eastern European" @if(!empty($data['interestFood']) &&  in_array("Eastern European",$data['interestFood'])) checked @endif />Eastern European</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_446" type="checkbox" value="French" @if(!empty($data['interestFood']) &&  in_array("French",$data['interestFood'])) checked @endif />French</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_452" type="checkbox" value="Greek" @if(!empty($data['interestFood']) &&  in_array("Greek",$data['interestFood'])) checked @endif />Greek</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_458" type="checkbox" value="Italian" @if(!empty($data['interestFood']) &&  in_array("Italian",$data['interestFood'])) checked @endif />Italian</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_463" type="checkbox" value="Jewish / Kosher" @if(!empty($data['interestFood']) &&  in_array("Jewish / Kosher",$data['interestFood'])) checked @endif />Jewish / Kosher</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_469" type="checkbox" value="Mediterranean" @if(!empty($data['interestFood']) &&  in_array("Mediterranean",$data['interestFood'])) checked @endif />Mediterranean</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_447" type="checkbox" value="Middle Eastern" @if(!empty($data['interestFood']) &&  in_array("Middle Eastern",$data['interestFood'])) checked @endif />Middle Eastern</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_453" type="checkbox" value="Soul Food" @if(!empty($data['interestFood']) &&  in_array("Soul Food",$data['interestFood'])) checked @endif />Soul Food</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_459" type="checkbox" value="Southwestern" @if(!empty($data['interestFood']) &&  in_array("Southwestern",$data['interestFood'])) checked @endif />Southwestern</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_470" type="checkbox" value="Vegan" @if(!empty($data['interestFood']) &&  in_array("Vegan",$data['interestFood'])) checked @endif />Vegan</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_473" type="checkbox" value="Vietnamese" @if(!empty($data['interestFood']) &&  in_array("Vietnamese",$data['interestFood'])) checked @endif />Vietnamese</div>
                
                <div class="pets-section"><input name="interestFood[]" id="interestFood_448" type="checkbox" value="Barbecue" @if(!empty($data['interestFood']) &&  in_array("Barbecue",$data['interestFood'])) checked @endif />Barbecue</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_454" type="checkbox" value="California-Fusion" @if(!empty($data['interestFood']) &&  in_array("California-Fusion",$data['interestFood'])) checked @endif />California-Fusion</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_460" type="checkbox" value="Chinese / Dim Sum" @if(!empty($data['interestFood']) &&  in_array("Chinese / Dim Sum",$data['interestFood'])) checked @endif />Chinese / Dim Sum</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_465" type="checkbox" value="Deli" @if(!empty($data['interestFood']) &&  in_array("Deli",$data['interestFood'])) checked @endif />Deli</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_471" type="checkbox" value="Fast Food / Pizza" @if(!empty($data['interestFood']) &&  in_array("Fast Food / Pizza",$data['interestFood'])) checked @endif />Fast Food / Pizza</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_449" type="checkbox" value="German" @if(!empty($data['interestFood']) &&  in_array("German",$data['interestFood'])) checked @endif />German</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_455" type="checkbox" value="Indian" @if(!empty($data['interestFood']) &&  in_array("Indian",$data['interestFood'])) checked @endif />Indian</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_461" type="checkbox" value="Japanese / Sushi" @if(!empty($data['interestFood']) &&  in_array("Japanese / Sushi",$data['interestFood'])) checked @endif />Japanese / Sushi</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_466" type="checkbox" value="Korean" @if(!empty($data['interestFood']) &&  in_array("Korean",$data['interestFood'])) checked @endif />Korean</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_472" type="checkbox" value="Mexican" @if(!empty($data['interestFood']) &&  in_array("Mexican",$data['interestFood'])) checked @endif />Mexican</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_450" type="checkbox" value="Seafood" @if(!empty($data['interestFood']) &&  in_array("Seafood",$data['interestFood'])) checked @endif />Seafood</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_456" type="checkbox" value="South American" @if(!empty($data['interestFood']) &&  in_array("South American",$data['interestFood'])) checked @endif />South American</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_464" type="checkbox" value="Thai" @if(!empty($data['interestFood']) &&  in_array("Thai",$data['interestFood'])) checked @endif />Thai</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_467" type="checkbox" value="Vegetarian / Organic" @if(!empty($data['interestFood']) &&  in_array("Vegetarian / Organic",$data['interestFood'])) checked @endif />Vegetarian / Organic</div>

                <div class="pets-section"><input name="interestFood[]" id="interestFood_252" type="checkbox" value="Other" @if(!empty($data['interestFood']) &&  in_array("Other",$data['interestFood'])) checked @endif />Other</div>
            </div>
            <hr class="seperate-line">
            <div class="form-group">
                <label for="relationship">What sort of music are you into? : </label>
                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_474" type="checkbox" value="Alternative" @if(!empty($data['interestMusic']) &&  in_array("Alternative",$data['interestMusic'])) checked @endif />Alternative</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_476" type="checkbox" value="Country / Folk" @if(!empty($data['interestMusic']) &&  in_array("Country / Folk",$data['interestMusic'])) checked @endif />Country / Folk</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_478" type="checkbox" value="Jazz / Blues" @if(!empty($data['interestMusic']) &&  in_array("Jazz / Blues",$data['interestMusic'])) checked @endif />Jazz / Blues</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_480" type="checkbox" value="New Age" @if(!empty($data['interestMusic']) &&  in_array("New Age",$data['interestMusic'])) checked @endif />New Age</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_485" type="checkbox" value="R'n'B / Hip Hop" @if(!empty($data['interestMusic']) &&  in_array("R'n'B / Hip Hop",$data['interestMusic'])) checked @endif />R'n'B / Hip Hop</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_483" type="checkbox" value="Reggae" @if(!empty($data['interestMusic']) &&  in_array("Reggae",$data['interestMusic'])) checked @endif />Reggae</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_486" type="checkbox" value="Rock" @if(!empty($data['interestMusic']) &&  in_array("Rock",$data['interestMusic'])) checked @endif />Rock</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_488" type="checkbox" value="World" @if(!empty($data['interestMusic']) &&  in_array("World",$data['interestMusic'])) checked @endif />World</div>
                
                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_475" type="checkbox" value="Classical / Opera" @if(!empty($data['interestMusic']) &&  in_array("Classical / Opera",$data['interestMusic'])) checked @endif />Classical / Opera</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_477" type="checkbox" value="Dance / Techno" @if(!empty($data['interestMusic']) &&  in_array("Dance / Techno",$data['interestMusic'])) checked @endif />Dance / Techno</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_479" type="checkbox" value="Metal" @if(!empty($data['interestMusic']) &&  in_array("Metal",$data['interestMusic'])) checked @endif />Metal</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_481" type="checkbox" value="Pop" @if(!empty($data['interestMusic']) &&  in_array("Pop",$data['interestMusic'])) checked @endif />Pop</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_482" type="checkbox" value="Rap" @if(!empty($data['interestMusic']) &&  in_array("Rap",$data['interestMusic'])) checked @endif />Rap</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_484" type="checkbox" value="Religious" @if(!empty($data['interestMusic']) &&  in_array("Religious",$data['interestMusic'])) checked @endif />Religious</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_487" type="checkbox" value="Soft Rock" @if(!empty($data['interestMusic']) &&  in_array("Soft Rock",$data['interestMusic'])) checked @endif />Soft Rock</div>

                <div class="pets-section"><input name="interestMusic[]" id="interestMusic_252" type="checkbox" value="Other" @if(!empty($data['interestMusic']) &&  in_array("Other",$data['interestMusic'])) checked @endif />Other</div>
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