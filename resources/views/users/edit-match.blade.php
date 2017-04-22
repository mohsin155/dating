@extends('layouts.main')
@section('content')
<div class="content-wrapper-inner">
    <div class="content-wrapper-settings">
        @include('users.edit-profile-tabs')
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
                                    @endif
                     <div class="form-group">
                        <label for="gender">I'm seeking a: </label>
                        <select class="form-control" name="gender" >
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
                        <h1>Their Appearance:</h1>
                    </div>
                    <div class="form-group">
                        <label for="height">Height : </label>
                        <select class="form-control" name="min_height">
                            <option value="155">155cm</option>
                            @for($i=140;$i<220;$i++)
                            <option value="{{$i}}">{{$i}}cm</option>
                            @endfor
                        </select>
                        and
                        <select class="form-control" name="max_height">
                            <option value="155">155cm</option>
                            @for($i=140;$i<220;$i++)
                            <option value="{{$i}}">{{$i}}cm</option>
                            @endfor
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="weight">Weight : </label>
                        <select class="form-control" name="min_weight">
                            <option value="any">Any</option>
                            @for($i=40;$i<220;$i++)
                            <option value="{{$i}}">{{$i}}kg</option>
                            @endfor
                        </select>
                        and
                         <select class="form-control" name="max_weight">
                           <option value="any">Any</option>
                            @for($i=40;$i<220;$i++)
                            <option value="{{$i}}">{{$i}}kg</option>
                            @endfor
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="body_type">Body type: </label>
                            <input type="checkbox" name="body_type[]" value="any" checked="true" />Any
                            @foreach($form_layout[8] as $row)
                            <div class="pets-section">
                            <input type="checkbox" name="body_type[]" value="{{$row['value']}}" />{{$row['label']}}
                            </div>
                            @endforeach
                        </select>
                    </div>
					
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="ethnicity">Their ethnicity is mostly: </label>
                            <input type="checkbox" name="ethnicity[]" value="any" checked="true" />Any
                            @foreach($form_layout[9] as $row)
                            <div class="pets-section">
                            <input type="checkbox" name="ethnicity[]" value="{{$row['value']}}" />{{$row['label']}}
                            </div>
                            @endforeach
                        </select>
                    </div>
					
                    <hr class="seperate-line">
                     <div class="form-group">
                        <label for="appearance">Consider their appearance as : </label>
                            <input type="checkbox" name="appearance[]" value="any" checked="true" />Any
                            @foreach($form_layout[13] as $row)
                            <div class="pets-section">
                            <input type="checkbox" name="appearance[]" value="{{$row['value']}}" />{{$row['label']}}
                            </div>
                            @endforeach
                        </select>
                    </div>
					
                    <hr class="seperate-line">
                
                   <div class="form-group">
                        <label for="hair_color">Hair Color : </label>
                            <input type="checkbox" name="hair_color[]" value="any" checked="true" />Any
                            @foreach($form_layout[1] as $row)
                            <div class="pets-section">
                            <input type="checkbox" name="hair_color[]" value="{{$row['value']}}" />{{$row['label']}}
                            </div>
                            @endforeach
                        </select>
                    </div>
					
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="hair_length">Hair Length : </label>
                       
                            <input type="checkbox" name="hair_length[]" value="any" checked="true" />Any
                       
                            @foreach($form_layout[2] as $row)
                            <div class="pets-section">
                            <input type="checkbox" name="hair_length[]" value="{{$row['value']}}" />{{$row['label']}}
                            </div>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                   <div class="form-group">
                        <label for="hair_type">Hair Type : </label>
                            <input type="checkbox" name="hair_type[]" value="any" checked="true" />Any
                            @foreach($form_layout[3] as $row)
                            <div class="pets-section">
                            <input type="checkbox" name="hair_type[]" value="{{$row['value']}}" />{{$row['label']}}
                            </div>
                            @endforeach
                        </select>
                    </div>
                    
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="eye_color">Eye Color : </label>
                            <input type="checkbox" name="eye_color[]" value="any" checked="true" />Any
                            @foreach($form_layout[4] as $row)
                            <div class="pets-section">
                            <input type="checkbox" name="eye_color[]" value="{{$row['value']}}" />{{$row['label']}}
                            </div>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="eye_wear">Eye Wear : </label>
                            <input type="checkbox" name="eye_wear[]" value="any" checked="true" />Any
                            @foreach($form_layout[5] as $row)
                            <div class="pets-section">
                            <input type="checkbox" name="eye_wear[]" value="{{$row['value']}}" />{{$row['label']}}
                            </div>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                  <div class="form-group">
                        <label for="best_feature">Their best feature: </label>
                            <input type="checkbox" name="best_feature[]" value="any" checked="true" />Any
                            @foreach($form_layout[11] as $row)
                            <div class="pets-section">
                            <input type="checkbox" name="best_feature[]" value="{{$row['value']}}" />{{$row['label']}}
                            </div>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                   <div class="form-group">
                        <label for="body_art">Body art: </label>
                            <input type="checkbox" name="body_art[]" value="any" checked="true" />Any
                            @foreach($form_layout[12] as $row)
                            <div class="pets-section">
                            <input type="checkbox" name="body_art[]" value="{{$row['value']}}" />{{$row['label']}}
                            </div>
                            @endforeach
                        </select>
                    </div>
                  
                    
                    <div class="address-update-heading">
                        <h1>Their Lifestyle:</h1>
                    </div>
                   <div class="form-group">
                        <label for="smoke">Do they smoke? </label>
                            <input type="checkbox" name="smoke[]" value="any" checked="true" />Any
                            @foreach($form_layout[15] as $row)
                            <div class="pets-section">
                            <input type="checkbox" name="smoke[]" value="{{$row['value']}}" />{{$row['label']}}
                            </div>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                   <div class="form-group">
                        <label for="drink">Do they drink? </label>
                            <input type="checkbox" name="drink[]" value="any" checked="true" />Any
                            @foreach($form_layout[14] as $row)
                            <div class="pets-section">
                            <input type="checkbox" name="drink[]" value="{{$row['value']}}" />{{$row['label']}}
                            </div>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="relocate">Willing to relocate: </label>
                            <input type="checkbox" name="relocate[]" value="any" checked="true" />Any
                            @foreach($form_layout[27] as $row)
                            <div class="pets-section">
                            <input type="checkbox" name="relocate[]" value="{{$row['value']}}" />{{$row['label']}}
                            </div>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                     <div class="form-group">
                        <label for="marital_status">Marital Status: </label>
                            <input type="checkbox" name="marital_status[]" value="any" checked="true" />Any
                            @foreach($form_layout[16] as $row)
                            <div class="pets-section">
                            <input type="checkbox" name="marital_status[]" value="{{$row['value']}}" />{{$row['label']}}
                            </div>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    
                    <div class="form-group">
                        <label for="have_children">Do they have children? : </label>
                            <input type="checkbox" name="have_children[]" value="any" checked="true" />Any
                            @foreach($form_layout[17] as $row)
                            <div class="pets-section">
                            <input type="checkbox" name="have_children[]" value="{{$row['value']}}" />{{$row['label']}}
                            </div>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="no_children">Number of children : </label>
                        <select class="form-control" name="no_children">
                            <option value="any">Any</option>
                            <option value="0">0</option>
                            @foreach($form_layout[18] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="oldest_child">Oldest Child : </label>
                        <select class="form-control" name="oldest_child">
                            <option value="any">Any</option>
                            <option value="0">0</option>
                            @foreach($form_layout[19] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="youngest_child">Youngest Child : </label>
                        <select class="form-control" name="youngest_child">
                            <option value="any">Any</option>
                            <option value="0">0</option>
                            @foreach($form_layout[20] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="more_child">Do they want more children? : </label>
                            <input type="checkbox" name="more_child[]" value="any" checked="true" />Any
                            @foreach($form_layout[21] as $row)
                            <div class="pets-section">
                            <input type="checkbox" name="more_child[]" value="{{$row['value']}}" />{{$row['label']}}
                            </div>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="have_pets" class="pets-label">Do you have pets? : </label>
                       
                        <input type="checkbox" name="have_pets[]" value="any" checked="true" />Any
                   
                        @foreach($form_layout[22] as $row)
                        <div class="pets-section">
                        <input type="checkbox" name="have_pets[]" value="{{$row['value']}}" />{{$row['label']}}
                        </div>
                        @endforeach
                    </div>
                    <hr class="seperate-line">
                   <div class="form-group">
                        <label for="occupation">Occupation : </label>
                            <input type="checkbox" name="occupation[]" value="any" checked="true" />Any
                            @foreach($form_layout[23] as $row)
                            <div class="pets-section">
                            <input type="checkbox" name="occupation[]" value="{{$row['value']}}" />{{$row['label']}}
                            </div>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="employment">Employment status: : </label>
                            <input type="checkbox" name="employment[]" value="any" checked="true" />Any
                            @foreach($form_layout[24] as $row)
                            <div class="pets-section">
                            <input type="checkbox" name="employment[]" value="{{$row['value']}}" />{{$row['label']}}
                            </div>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="income">Annual Income (or above): </label>
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
                        <label for="home_type"> Home type: </label>
                            <input type="checkbox" name="home_type[]" value="any" checked="true" />Any
                            @foreach($form_layout[25] as $row)
                            <div class="pets-section">
                            <input type="checkbox" name="home_type[]" value="{{$row['value']}}" />{{$row['label']}}
                            </div>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="living_situation">Living situation: </label>
                            <input type="checkbox" name="living_situation[]" value="any" checked="true" />Any
                            @foreach($form_layout[26] as $row)
                            <div class="pets-section">
                            <input type="checkbox" name="living_situation[]" value="{{$row['value']}}" />{{$row['label']}}
                            </div>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                   
                    <div class="address-update-heading">
                        <h1>Their Background / Cultural Values</h1>
                    </div>
                    <div class="form-group">
                        <label for="nationality">Nationality : </label>
                        <select class="selectpicker" name="nationality[]" multiple>
                            <option value="any" selected="selected">Any</option>
                            @foreach($countries as $row)
                            <option  value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                    </div>
					
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="education">Education : </label>
                        <select class="form-control" name="education">
                            <option value="any" selected="selected">Any</option>
                            @foreach($form_layout[29] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    
                    <div class="form-group">
                        <label for="english_ability">English language ability : </label>
                        <select class="form-control" name="english_ability">
                            <option value="any" selected="selected">Any</option>
                            @foreach($form_layout[30] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="portugese_ability">Portuguese language ability : </label>
                        <select class="form-control" name="portugese_ability">
                            <option value="any" selected="selected">Any</option>
                            @foreach($form_layout[31] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="spanish_ability">Spanish language ability : </label>
                        <select class="form-control" name="spanish_ability">
                            <option value="any" selected="selected">Any</option>
                            @foreach($form_layout[32] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="languages">Languages : </label>
                        <select class="selectpicker" name="languages[]" multiple>
                            <option value="any" selected="selected">Any</option>
                            @foreach($languages as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="religion">Religion : </label>
                        <select class="form-control" name="religion">
                            <option value="any" selected="selected">Any</option>
                            @foreach($form_layout[33] as $row)
                            <option value="{{$row['value']}}">{{$row['label']}}</option> 
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                   <div class="form-group">
                        <label for="religious_values" class="religious-label">Religious values:</label>
                        <input type="checkbox" name="religious_values[]" value="any" checked="true"/>Any
                        @foreach($form_layout[34] as $row)
                        <div class="pets-section">
                        <input type="checkbox" name="religious_values[]" value="{{$row['value']}}" />{{$row['label']}}
                        </div>
                        @endforeach
                    </div>			
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="star_sign" class="star-label">Star sign:</label>
                        <input type="checkbox" name="star_sign[]" value="any" checked="true"/>Any
                        @foreach($form_layout[35] as $row)
                        <div class="pets-section">
                        <input type="checkbox" name="star_sign[]" value="{{$row['value']}}" />{{$row['label']}}
                        </div>
                        @endforeach
                    </div>			
                    <hr class="seperate-line">
                  <div class="button-inner text-center email-address">
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