@extends('layouts.main')
@section('content')
<div class="content-wrapper-inner">
    <div class="content-wrapper-settings">
        @include('users.edit-profile-tabs')
        <div class="address-update-container">
            <div class="address-update-inner">
                <div>
                    <h1>Edit Profile</h1>
                </div>

            </div>
            <div class="address-update-heading">
                <h1>Your Basics:</h1>
            </div>
            <div class="signup-page-outer">
                <form class="form-inline">
                    <div class="form-group">
                        <label for="gender">First Name: </label>
                        <input name="first_name" value=""/>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="gender">I am: </label>
                        <select class="form-control" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="dob">Date of birth: </label>
                        <select class="form-control" name="dob_month">
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <select class="form-control" name="dob_year">
                            @for($i=1912;$i<=date('Y',strtotime('now'));$i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        <span>* To protect your privacy we only store your month and year of birth</span>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="age">Country</label>
                        <select class="form-control" id="country" name="country">
                            <option value="0">--Please Select--</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}" @if($country->id==old('country')) selected @endif>{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="State/Province">State/Province</label>
                        <select class="form-control" id="state" name="state">
                            <option value="0">--Please Select--</option>
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="State/Province">City</label>
                        <select class="form-control" id="city" name="city">
                            <option value="0">--Please Select--</option>
                        </select>
                    </div>
                    <div class="address-update-heading">
                        <h1>Your Appearance:</h1>
                    </div>
                    <div class="form-group">
                        <label for="hair_color">Hair Color : </label>
                        <select class="form-control" name="hair_color">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[1] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="hair_length">Hair Length : </label>
                        <select class="form-control" name="hair_length">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[2] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="hair_type">Hair Type : </label>
                        <select class="form-control" name="hair_type">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[3] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="eye_color">Eye Color : </label>
                        <select class="form-control" name="eye_color">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[4] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="eye_wear">Eye Wear : </label>
                        <select class="form-control" name="eye_wear">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[5] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="height">Height : </label>
                        <select class="form-control" name="height">
                            <option value="0">--Please Select--</option>
                            @for($i=140;$i<220;$i++)
                            <option value="{{$i}}">{{$i}}cm</option>
                            @endfor
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="weight">Weight : </label>
                        <select class="form-control" name="weight">
                            <option value="0">--Please Select--</option>
                            @for($i=140;$i<220;$i++)
                            <option value="{{$i}}">{{$i}}kg</option>
                            @endfor
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="body_type">Body Type : </label>
                        <select class="form-control" name="body_type">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[8] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="ethnicity">Your ethnicity is mostly : </label>
                        <select class="form-control" name="ethnicity">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[9] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="facial_hair">Facial hair : </label>
                        <select class="form-control" name="facial_hair">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[10] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="best_feature">My best feature : </label>
                        <select class="form-control" name="facial_hair">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[11] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="body_art">Body Art : </label>
                        <select class="form-control" name="body_art">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[12] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="appearance">I consider my appearance as : </label>
                        <select class="form-control" name="appearance">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[13] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="address-update-heading">
                        <h1>Your Lifestyle:</h1>
                    </div>
                    <div class="form-group">
                        <label for="drink">Do you drink? : </label>
                        <select class="form-control" name="drink">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[14] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="smoke">Do you smoke? : </label>
                        <select class="form-control" name="smoke">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[15] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="marital_status">Marital Status : </label>
                        <select class="form-control" name="marital_status">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[16] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="have_children">Do you have children? : </label>
                        <select class="form-control" name="children">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[17] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="no_children">Number of children : </label>
                        <select class="form-control" name="no_children">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[18] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="oldest_child">Oldest Child : </label>
                        <select class="form-control" name="no_children">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[19] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="youngest_child">Youngest Child : </label>
                        <select class="form-control" name="youngest_child">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[20] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="more_child">Do you want (more) children? : </label>
                        <select class="form-control" name="more_child">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[21] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="have_pets">Do you have pets? : </label>
                        @foreach($form_layout[22] as $row)
                        <input type="checkbox" name="have_pets" value="{{$row['value']}}" />{{$row['label']}}
                        @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="occupation">Occupation : </label>
                        <select class="form-control" name="occupation">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[23] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="employment">Employment status : </label>
                        <select class="form-control" name="employment">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[24] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="income">Annual Income : </label>
                        <select class="form-control" name="income">
                            <option value="0">--Please Select--</option>
                            <option value="1">$0 - $30,000 (USD)</option>
                            <option value="2">$30,001 - $60,000 (USD)</option>
                            <option value="3">$60,001 - $120,000 (USD)</option>
                            <option value="4">$120,001 - $180,000 (USD)</option>
                            <option value="5">$180,001 - $240,000 (USD)</option>
                            <option value="6">$240,001 - $600,000+ (USD)</option>
                            <option value="7">Prefer not to say</option>
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="home_type">Home type : </label>
                        <select class="form-control" name="home_type">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[25] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="living_situation">Living situation : </label>
                        <select class="form-control" name="living_situation">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[26] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="relocate">Willing to relocate : </label>
                        <select class="form-control" name="relocate">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[27] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="relationship">Relationship you're looking for : </label>
                        @foreach($form_layout[28] as $row)
                        <input type="checkbox" name="relationship" value="{{$row['value']}}" />{{$row['label']}}
                        @endforeach
                        </select>
                    </div>
                    <div class="address-update-heading">
                        <h1>Your Background / Cultural Values</h1>
                    </div>
                    <div class="form-group">
                        <label for="nationality">Nationality : </label>
                        <select class="form-control" name="nationality">
                            <option value="0">--Please Select--</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}" @if($country->id==old('country')) selected @endif>{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="education">Education : </label>
                        <select class="form-control" name="education">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[29] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="languages">Languages : </label>
                        <select class="form-control" name="languages" multiple="" size="12">
                            <option value="0">--Please Select--</option>
                            @foreach($languages as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="english_ability">English language ability : </label>
                        <select class="form-control" name="english_ability">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[30] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="portugese_ability">Portuguese language ability : </label>
                        <select class="form-control" name="portugese_ability">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[31] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="spanish_ability">Spanish language ability : </label>
                        <select class="form-control" name="spanish_ability">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[32] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="religion">Religion : </label>
                        <select class="form-control" name="religion">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[33] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="religious_values">Religious values : </label>
                        <select class="form-control" name="religious_values">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[34] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="star_sign">Star sign : </label>
                        <select class="form-control" name="star_sign">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[35] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="address-update-heading">
                        <h1>In your own words:</h1>
                    </div>
                    <div class="form-group">
                        <label for="profile_heading">Your profile heading : </label>
                        <input type="text" class="form-control" name="profile_heading" />
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="about_yourself">A little about yourself : </label>
                        <textarea class="form-control" name="about_yourself"></textarea>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="partner">What you're looking for in a partner : </label>
                        <textarea class="form-control" name="partner"></textarea>
                    </div>
                    <hr class="seperate-line">
                    <div class="button-inner text-center">
                        <button class="btn btn-primary btn-green" type="submit">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@section('script')
<script>
    $(document).ready(function () {
        $("select[name=country]").trigger("change");
    });
</script>
@endsection
@endsection