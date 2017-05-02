@extends('layouts.main')
@section('content')
<div class="content-wrapper-inner">
    <div class="content-wrapper-settings">
        @include('search.search-tabs')
        <div class="address-update-container">
            <div class="address-update-inner">
                <div>
                    <h1>Edit Match Criteria</h1>
                </div>

            </div>
            <div class="description">
                <em>Help us find you the perfect match by telling us what is important to you in a partner. Answer the questions below and tell us what you’re looking for.</em>
            </div>
            <div class="address-update-heading">
                <h1>Their Basic Details:</h1>
            </div>

            <div class="signup-page-outer edit-profile-page-setting">
                <form name="edit-match" class="form-inline" id="edit-match" method="post" action="{{url('users/edit-match')}}">
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
                            <p><h1>Your match criteria has been updated</h1></p>
                        </div>


                    </div>
                    @endif
                    <div class="form-group">
                        <label for="gender">I'm a: </label>
                        <select class="form-control" name="gender" >
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>               
                    <div class="form-group">
                        <label for="gender">I'm seeking a: </label>
                        <select class="form-control" name="seeking" >
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group edit-profile-page">
                        <label for="age_btw">Aged between: </label>
                        <select class="form-control" name="min_age" >
                            <option value="0">----</option>
                            @for($i=18;$i<=90;$i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        and 
                        <select class="form-control" name="max_age" >
                            <option value="0">----</option>
                            @for($i=18;$i<=90;$i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>

                    </div>

                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="country">Living in:</label>
                        <select class="form-control" id="country" name="country" >
                            <option value="0">--Please Select--</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
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
                    <div class="form-group">
                        <label for="has_photo">Has Photo: </label>
                        <div class="pets-section">
                            <input type="checkbox" name="has_photo" value="1" checked="" />Yes, only show profiles with a photo.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="searching_for">Searching For: </label>
                        <input type="checkbox" name="relationship[]" value="" />Any
                        @foreach($form_layout[28] as $row)
                        <div class="pets-section">
                            <input type="checkbox" name="relationship[]" value="{{$row['value']}}" />{{$row['label']}}
                        </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="last_active">Last Active : </label>
                        <select class="form-control" name="last_active">
                            <option value="">Any</option>
                        </select>
                    </div>
                    <div class="address-update-heading">
                        <h1>Their Appearance:</h1>
                    </div>
                    <div id="accordion">
                        <h3>Height</h3>
                        <div class="form-group">
                            <select class="form-control" name="min_height">
                                <option value="155">155cm</option>
                                @for($i=140;$i<220;$i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            and
                            <select class="form-control" name="max_height">
                                <option value="155">155cm</option>
                                @for($i=140;$i<220;$i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <h3>Weight : </h3>
                        <div class="form-group">
                            <select class="form-control" name="min_weight">
                                <option value="any">Any</option>
                                @for($i=40;$i<220;$i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            and
                            <select class="form-control" name="max_weight">
                                <option value="any">Any</option>
                                @for($i=40;$i<220;$i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <h3>Body type: </h3>
                        <div class="form-group">
                            <input type="checkbox" name="body_type[]" value="any" checked="true" />Any
                            @foreach($form_layout[8] as $row)
                            <div class="pets-section">

                                <input type="checkbox" name="body_type[]" value="{{$row['value']}}" />{{$row['label']}}  
                            </div>
                            @endforeach
                            </select>
                        </div>
                        <h3>Their ethnicity is mostly: </h3>
                        <div class="form-group">
                            
                            <input type="checkbox" name="ethnicity[]" value="any" checked="true" />Any
                            @foreach($form_layout[9] as $row)
                            <div class="pets-section">
                                <input type="checkbox" name="ethnicity[]" value="{{$row['value']}}" />{{$row['label']}}  
                            </div>
                            @endforeach
                            </select>
                        </div>
                        <h3>Consider their appearance as : </h3>
                        <div class="form-group">
                            
                            <input type="checkbox" name="appearance[]" value="any" checked="true" />Any
                            @foreach($form_layout[13] as $row)
                            <div class="pets-section">
                                <input type="checkbox" name="appearance[]" value="{{$row['value']}}" />{{$row['label']}}  
                            </div>
                            @endforeach
                            </select>
                        </div>
                        <h3>Hair Color : </h3>
                        <div class="form-group">
                            
                            <input type="checkbox" name="hair_color[]" value="any" checked="true" />Any
                            @foreach($form_layout[1] as $row)
                            <div class="pets-section">
                                <input type="checkbox" name="hair_color[]" value="{{$row['value']}}" />{{$row['label']}}  
                            </div>
                            @endforeach
                            </select>
                        </div>
                        <h3>Hair Length : </h3>
                        <div class="form-group">
                            <input type="checkbox" name="hair_length[]" value="any" checked="true" />Any

                            @foreach($form_layout[2] as $row)
                            <div class="pets-section">
                                <input type="checkbox" name="hair_length[]" value="{{$row['value']}}" />{{$row['label']}}  
                            </div>
                            @endforeach
                            </select>
                        </div>
                        <h3>Hair Type : </h3>
                        <div class="form-group">
                            
                            <input type="checkbox" name="hair_type[]" value="any" checked="true" />Any
                            @foreach($form_layout[3] as $row)
                            <div class="pets-section">
                                <input type="checkbox" name="hair_type[]" value="{{$row['value']}}" />{{$row['label']}}  
                            </div>
                            @endforeach
                            </select>
                        </div>
                        <h3>Eye Color : </h3>
                        <div class="form-group">
                            <input type="checkbox" name="eye_color[]" value="any" checked="true" />Any
                            @foreach($form_layout[4] as $row)
                            <div class="pets-section">
                                <input type="checkbox" name="eye_color[]" value="{{$row['value']}}" />{{$row['label']}} 
                            </div>
                            @endforeach
                            </select>
                        </div>
                        <h3>Eye Wear : </h3>
                        <div class="form-group">
                            
                            <input type="checkbox" name="eye_wear[]" value="any" checked="true" />Any
                            @foreach($form_layout[5] as $row)
                            <div class="pets-section">
                                <input type="checkbox" name="eye_wear[]" value="{{$row['value']}}" />{{$row['label']}}  
                            </div>
                            @endforeach
                            </select>
                        </div>
                        <h3>Their best feature: </h3>
                        <div class="form-group">
                            
                            <input type="checkbox" name="best_feature[]" value="any" checked="true" />Any
                            @foreach($form_layout[11] as $row)
                            <div class="pets-section">
                                <input type="checkbox" name="best_feature[]" value="{{$row['value']}}" />{{$row['label']}}  
                            </div>
                            @endforeach
                            </select>
                        </div>
                        <h3>Body art: </h3>
                        <div class="form-group">
                            
                            <input type="checkbox" name="body_art[]" value="any" checked="true" />Any
                            @foreach($form_layout[12] as $row)
                            <div class="pets-section">
                                <input type="checkbox" name="body_art[]" value="{{$row['value']}}" />{{$row['label']}}  
                            </div>
                            @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="address-update-heading">
                        <h1>Their Lifestyle:</h1>
                    </div>
                    <div id="accordion1">
                        <h3>Do they smoke? </h3>
                    <div class="form-group">
                        
                        <input type="checkbox" name="smoke[]" value="any" checked="true" />Any
                        @foreach($form_layout[15] as $row)
                        <div class="pets-section">
                            <input type="checkbox" name="smoke[]" value="{{$row['value']}}" />{{$row['label']}}  
                        </div>
                        @endforeach
                        </select>
                    </div>
                    <h3>Do they drink? </h3>
                    <div class="form-group">
                        
                        <input type="checkbox" name="drink[]" value="any" checked="true" />Any
                        @foreach($form_layout[14] as $row)
                        <div class="pets-section">
                            <input type="checkbox" name="drink[]" value="{{$row['value']}}" />{{$row['label']}}  
                        </div>
                        @endforeach
                        </select>
                    </div>
                    <h3>Willing to relocate: </h3>
                    <div class="form-group">
                        
                        <input type="checkbox" name="relocate[]" value="any" checked="true" />Any
                        @foreach($form_layout[27] as $row)
                        <div class="pets-section">
                            <input type="checkbox" name="relocate[]" value="{{$row['value']}}" />{{$row['label']}}  
                        </div>
                        @endforeach
                    </div>
                    <h3>Marital Status: </h3>
                    <div class="form-group">
                        
                        <input type="checkbox" name="marital_status[]" value="any" checked="true" />Any
                        @foreach($form_layout[16] as $row)
                        <div class="pets-section">
                            <input type="checkbox" name="marital_status[]" value="{{$row['value']}}" />{{$row['label']}}  
                        </div>
                        @endforeach
                    </div>
                    <h3>Do they have children? : </h3>
                    <div class="form-group">
                        
                        <input type="checkbox" name="have_children[]" value="any" checked="true" />Any
                        @foreach($form_layout[17] as $row)
                        <div class="pets-section">
                            <input type="checkbox" name="have_children[]" value="{{$row['value']}}" />{{$row['label']}}  
                        </div>
                        @endforeach
                    </div>
                    <h3>Number of children : </h3>
                    <div class="form-group">
                        
                        <select class="form-control" name="no_children">
                            <option value="any">Any</option>
                            <option value="0">0</option>
                            @foreach($form_layout[18] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <h3>Oldest Child : </h3>
                    <div class="form-group">
                        
                        <select class="form-control" name="oldest_child">
                            <option value="any">Any</option>
                            <option value="0">0</option>
                            @foreach($form_layout[19] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <h3>Youngest Child : </h3>
                    <div class="form-group">
                        
                        <select class="form-control" name="youngest_child">
                            <option value="any">Any</option>
                            <option value="0">0</option>
                            @foreach($form_layout[20] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <h3>Do they want more children? : </h3>
                    <div class="form-group">
                        
                        <input type="checkbox" name="more_child[]" value="any" checked="true" />Any
                        @foreach($form_layout[21] as $row)
                        <div class="pets-section">
                            <input type="checkbox" name="more_child[]" value="{{$row['value']}}" />{{$row['label']}}
                        </div>
                        @endforeach
                        </select>
                    </div>
                    <h3>Do you have pets? : </h3>
                    <div class="form-group">
                        
                        <input type="checkbox" name="have_pets[]" value="any" checked="true" />Any

                        @foreach($form_layout[22] as $row)
                        <div class="pets-section">
                            <input type="checkbox" name="have_pets[]" value="{{$row['value']}}" />{{$row['label']}}
                        </div>
                        @endforeach
                    </div>
                    <h3>Occupation : </h3>
                    <div class="form-group">
                        
                        <input type="checkbox" name="occupation[]" value="any" checked="true" />Any
                        @foreach($form_layout[23] as $row)
                        <div class="pets-section">
                            <input type="checkbox" name="occupation[]" value="{{$row['value']}}" />{{$row['label']}}
                        </div>
                        @endforeach
                        </select>
                    </div>
                    <h3>Employment status: : </h3>
                    <div class="form-group">
                        
                        <input type="checkbox" name="employment[]" value="any" checked="true" />Any
                        @foreach($form_layout[24] as $row)
                        <div class="pets-section">
                            <input type="checkbox" name="employment[]" value="{{$row['value']}}" />{{$row['label']}}
                        </div>
                        @endforeach
                        </select>
                    </div>
                    <h3>Annual Income (or above): </h3>
                    <div class="form-group">
                        
                        <select class="form-control" name="income">
                            <option value="0">Any</option>
                            <option value="1">$0 - $30,000 (USD)</option>
                            <option value="2">$30,001 - $60,000 (USD)</option>
                            <option value="3">$60,001 - $120,000 (USD)</option>
                            <option value="4">$120,001 - $180,000 (USD)</option>
                            <option value="5">$180,001 - $240,000 (USD)</option>
                            <option value="6">$240,001 - $600,000+ (USD)</option>
                            <option value="7">Prefer not to say</option>
                        </select>
                    </div>
                    <h3> Home type: </h3>
                    <div class="form-group">
                        
                        <input type="checkbox" name="home_type[]" value="any" checked="true" />Any
                        @foreach($form_layout[25] as $row)
                        <div class="pets-section">
                            <input type="checkbox" name="home_type[]" value="{{$row['value']}}" />{{$row['label']}}
                        </div>
                        @endforeach
                        </select>
                    </div>
                    <h3>Living situation: </h3>
                    <div class="form-group">
                        
                        <input type="checkbox" name="living_situation[]" value="any" checked="true" />Any
                        @foreach($form_layout[26] as $row)
                        <div class="pets-section">
                            <input type="checkbox" name="living_situation[]" value="{{$row['value']}}" />{{$row['label']}}
                        </div>
                        @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="address-update-heading">
                        <h1>Their Background / Cultural Values</h1>
                    </div>
                    <div id="accordion2">
                    <h3>Nationality : </h3>
                    <div class="form-group">
                        
                        <select class="selectpicker" name="nationality[]" multiple>
                            <option value="any" selected="selected">Any</option>
                            @foreach($countries as $row)
                            <option  value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <h3>Education : </h3>
                    <div class="form-group">
                        
                        <select class="form-control" name="education">
                            <option value="any" selected="selected">Any</option>
                            @foreach($form_layout[29] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <h3>English language ability : </h3>
                    <div class="form-group">
                        
                        <select class="form-control" name="english_ability">
                            <option value="any" selected="selected">Any</option>
                            @foreach($form_layout[30] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <h3>Portuguese language ability : </h3>
                    <div class="form-group">
                        
                        <select class="form-control" name="portugese_ability">
                            <option value="any" selected="selected">Any</option>
                            @foreach($form_layout[31] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <h3>Spanish language ability : </h3>
                    <div class="form-group">
                        
                        <select class="form-control" name="spanish_ability">
                            <option value="any" selected="selected">Any</option>
                            @foreach($form_layout[32] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <h3>Languages : </h3>
                    <div class="form-group">
                        
                        <select class="selectpicker" name="languages[]" multiple>
                            <option value="any" selected="selected">Any</option>
                            @foreach($languages as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <h3>Religion : </h3>
                    <div class="form-group">
                        
                        <select class="form-control" name="religion">
                            <option value="any" selected="selected">Any</option>
                            @foreach($form_layout[33] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option> 
                            @endforeach
                        </select>
                    </div>
                    <h3 class="religious-label">Religious values:</h3>
                    <div class="form-group">
                        
                        <input type="checkbox" name="religious_values[]" value="any" checked="true"/>Any
                        @foreach($form_layout[34] as $row)
                        <div class="pets-section">
                            <input type="checkbox" name="religious_values[]" value="{{$row['value']}}" />{{$row['label']}}  
                        </div>
                        @endforeach
                    </div>
                    <h3 class="star-label">Star sign:</h3>
                    <div class="form-group">
                        
                        <input type="checkbox" name="star_sign[]" value="any" checked="true"/>Any
                        @foreach($form_layout[35] as $row)
                        <div class="pets-section">
                            <input type="checkbox" name="star_sign[]" value="{{$row['value']}}" />{{$row['label']}}  
                        </div>
                        @endforeach
                    </div>
            </div>
                    <div class="form-group">
                        <label>Save search:</label>
                        <input type="text" name="search_name" value="" />
                    </div>
                    <div class="button-inner text-center email-address">
                        <button class="btn btn-primary btn-green" type="submit">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('script')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function () {
    $("select[name=country]").trigger("change");
    $("#accordion").accordion({
        collapsible: true,
        active: false
    });
    $("#accordion1").accordion({
        collapsible: true,
        active: false
    });
    $("#accordion2").accordion({
        collapsible: true,
        active: false
    });
});
</script>

@endsection
