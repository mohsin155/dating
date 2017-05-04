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
            <div class="description">
                <em>Answering these profile questions will help other users find you in search results and help us to find you more accurate matches. Answer all questions below to complete this step.</em>
            </div>
            <div class="address-update-heading">
                <h1>Your Basics:</h1>
            </div>
         
            <div class="signup-page-outer edit-profile-page-setting">
                  <form name="edit-profile" class="form-inline" id="edit-profile" method="post" action="{{url('users/edit-profile')}}">
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
                                                <p><h1>Your Profile Has Been Updated Sucessfully</h1></p>
                                            </div>
                                    </div>
                                    @endif
               
                    <div class="form-group">
                        <label for="name">First Name: </label>
                        <input type="text" name="first_name"  value="{{is_null($profile_data)?'':$profile_data->first_name}}">
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="gender">I am: </label>
                        <select class="form-control" name="gender" >
                                 <option value="male" @if(!empty($profile_data) && $profile_data->gender=="male") selected @endif>Male</option>
                                 <option value="female" @if(!empty($profile_data) && $profile_data->gender=="female") selected @endif>Female</option> 
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group edit-profile-page">
                        <label for="dob">Date of birth: </label>
                        <select class="form-control" name="dob_month" > 
                            <option value="01" @if(!empty($profile_data) && $profile_data->dob_month==1) selected @endif>January</option>
                            <option value="02" @if(!empty($profile_data) && $profile_data->dob_month==2) selected @endif>February</option>
                            <option value="03" @if(!empty($profile_data) && $profile_data->dob_month==3) selected @endif>March</option>
                            <option value="04" @if(!empty($profile_data) && $profile_data->dob_month==4) selected @endif>April</option>
                            <option value="05" @if(!empty($profile_data) && $profile_data->dob_month==5) selected @endif>May</option>
                            <option value="06" @if(!empty($profile_data) && $profile_data->dob_month==6) selected @endif>June</option>
                            <option value="07" @if(!empty($profile_data) && $profile_data->dob_month==7) selected @endif>July</option>
                            <option value="08" @if(!empty($profile_data) && $profile_data->dob_month==8) selected @endif>August</option>
                            <option value="09" @if(!empty($profile_data) && $profile_data->dob_month==9) selected @endif>September</option>
                            <option value="10" @if(!empty($profile_data) && $profile_data->dob_month==10) selected @endif>October</option>
                            <option value="11" @if(!empty($profile_data) && $profile_data->dob_month==11) selected @endif>November</option>
                            <option value="12" @if(!empty($profile_data) && $profile_data->dob_month==12) selected @endif>December</option>
                        </select>
                           
                        <select class="form-control" name="dob_year" >
                            @for($i=1912;$i<=date('Y',strtotime('now'));$i++)
                            @if(!empty($profile_data) && $profile_data->dob_year==$i)
                            <option value="{{$i}}" selected="selected">{{$i}}</option>
                            @else
                             <option value="{{$i}}">{{$i}}</option>
                             @endif
                            @endfor
                        </select>
                        
                    </div>
                    <div class="text-center">* To protect your privacy we only store your month and year of birth</div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="country">Country</label>
                        <select class="form-control" id="country" name="country" >
                            <option value="0">--Please Select--</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}" @if($country->id==old('country')) selected @endif @if(!empty($profile_data) && $country->id==$profile_data->country)) selected @endif>{{$country->name}}</option>
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
                            @if(!empty($profile_data) && $row['value']==$profile_data->hair_color){
                                <option value="{{$profile_data->hair_color}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>  
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="hair_length">Hair Length : </label>
                        <select class="form-control" name="hair_length">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[2] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->hair_length){
                                <option value="{{$profile_data->hair_length}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="hair_type">Hair Type : </label>
                        <select class="form-control" name="hair_type">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[3] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->hair_type){
                                <option value="{{$profile_data->hair_type}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="eye_color">Eye Color : </label>
                        <select class="form-control" name="eye_color">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[4] as $row)
                             @if(!empty($profile_data) && $row['value']==$profile_data->eye_color){
                                <option value="{{$profile_data->eye_color}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="eye_wear">Eye Wear : </label>
                        <select class="form-control" name="eye_wear">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[5] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->eye_wear){
                                <option value="{{$profile_data->eye_wear}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="height">Height : </label>
                        <select class="form-control" name="height">
                            <option value="0">--Please Select--</option>
                            @for($i=140;$i<220;$i++)
                            @if(!empty($profile_data) && $i==$profile_data->height){
                                <option value="{{$profile_data->height}}" selected="selected">{{$i}}cm</option>
                                }
                               @else{
                            <option value="{{$i}}">{{$i}}cm</option>
                            }
                            @endif
                            @endfor
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="weight">Weight : </label>
                        <select class="form-control" name="weight">
                            <option value="0">--Please Select--</option>
                            @for($i=40;$i<220;$i++)
                            @if(!empty($profile_data) && $i==$profile_data->weight){
                                <option value="{{$profile_data->weight}}" selected="selected">{{$i}}</option>
                                }
                               @else{
                            <option value="{{$i}}">{{$i}}kg</option>
                            }
                            @endif
                            @endfor
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="body_type">Body Type : </label>
                        <select class="form-control" name="body_type">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[8] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->body_type){
                                <option value="{{$profile_data->body_type}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="ethnicity">Your ethnicity is mostly : </label>
                        <select class="form-control" name="ethnicity">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[9] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->ethnicity){
                                <option value="{{$profile_data->ethnicity}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="facial_hair">Facial hair : </label>
                        <select class="form-control" name="facial_hair">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[10] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->facial_hair){
                                <option value="{{$profile_data->facial_hair}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="best_feature">My best feature : </label>
                        <select class="form-control" name="best_feature">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[11] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->best_feature){
                                <option value="{{$profile_data->best_feature}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="body_art">Body Art : </label>
                        <select class="form-control" name="body_art">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[12] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->body_art){
                                <option value="{{$profile_data->body_art}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="appearance">I consider my appearance as : </label>
                        <select class="form-control" name="appearance">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[13] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->appearance){
                                <option value="{{$profile_data->appearance}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
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
                             @if(!empty($profile_data) && $row['value']==$profile_data->drink){
                                <option value="{{$profile_data->drink}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="smoke">Do you smoke? : </label>
                        <select class="form-control" name="smoke">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[15] as $row)
                             @if(!empty($profile_data) && $row['value']==$profile_data->smoke){
                                <option value="{{$profile_data->smoke}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="marital_status">Marital Status : </label>
                        <select class="form-control" name="marital_status">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[16] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->marital_status){
                                <option value="{{$profile_data->marital_status}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="have_children">Do you have children? : </label>
                        <select class="form-control" name="have_children">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[17] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->have_children){
                                <option value="{{$profile_data->have_children}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="no_children">Number of children : </label>
                        <select class="form-control" name="no_children">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[18] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->no_children){
                                <option value="{{$profile_data->no_children}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="oldest_child">Oldest Child : </label>
                        <select class="form-control" name="oldest_child">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[19] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->oldest_child){
                                <option value="{{$profile_data->oldest_child}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="youngest_child">Youngest Child : </label>
                        <select class="form-control" name="youngest_child">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[20] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->youngest_child){
                                <option value="{{$profile_data->youngest_child}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="more_child">Do you want (more) children? : </label>
                        <select class="form-control" name="more_child">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[21] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->more_child){
                                <option value="{{$profile_data->more_child}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="have_pets" class="pets-label">Do you have pets? : </label>
                        @foreach($form_layout[22] as $row)
                        <div class="pets-section">
                            @if((!empty($profile_data) && !empty(unserialize($profile_data->have_pets))) && in_array($row['value'],unserialize($profile_data->have_pets)))
                            <input type="checkbox" name="have_pets[]" value="{{$row['value']}}" checked="checked" />{{$row['label']}}
                         @else
                         <input type="checkbox" name="have_pets[]" value="{{$row['value']}}" />{{$row['label']}}
                         
                         @endif
                        </div>
                        @endforeach
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="occupation">Occupation : </label>
                        <select class="form-control" name="occupation">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[23] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->occupation){
                                <option value="{{$profile_data->occupation}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="employment">Employment status : </label>
                        <select class="form-control" name="employment">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[24] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->employment){
                                <option value="{{$profile_data->employment}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="income">Annual Income : </label>
                        <select class="form-control" name="income">
                            <option value="0" @if(!empty($profile_data) && $profile_data->income==0) selected @endif>--Please Select--</option>
                            <option value="1" @if(!empty($profile_data) && $profile_data->income==1) selected @endif>$0 - $30,000 (USD)</option>
                            <option value="2" @if(!empty($profile_data) && $profile_data->income==2) selected @endif>$30,001 - $60,000 (USD)</option>
                            <option value="3" @if(!empty($profile_data) && $profile_data->income==3) selected @endif>$60,001 - $120,000 (USD)</option>
                            <option value="4" @if(!empty($profile_data) && $profile_data->income==4) selected @endif>$120,001 - $180,000 (USD)</option>
                            <option value="5" @if(!empty($profile_data) && $profile_data->income==5) selected @endif>$180,001 - $240,000 (USD)</option>
                            <option value="6" @if(!empty($profile_data) && $profile_data->income==6) selected @endif>$240,001 - $600,000+ (USD)</option>
                            <option value="7" @if(!empty($profile_data) && $profile_data->income==7) selected @endif>Prefer not to say</option>
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="home_type">Home type : </label>
                        <select class="form-control" name="home_type">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[25] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->home_type){
                                <option value="{{$profile_data->home_type}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="living_situation">Living situation : </label>
                        <select class="form-control" name="living_situation">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[26] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->living_situation){
                                <option value="{{$profile_data->living_situation}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="relocate">Willing to relocate : </label>
                        <select class="form-control" name="relocate">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[27] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->relocate){
                                <option value="{{$profile_data->relocate}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="relationship">Relationship you're looking for : </label>

                        @foreach($form_layout[28] as $row)
                          <div class="pets-section">
                              @if(!empty($profile_data) && !empty(unserialize($profile_data->relationship)) && in_array($row['value'],unserialize($profile_data->relationship)))
                              <input type="checkbox" name="relationship[]" value="{{$row['value']}}" checked="checked" />{{$row['label']}}
                               @else
                             <input type="checkbox" name="relationship[]" value="{{$row['value']}}" />{{$row['label']}}
                        @endif
                        </div>
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
                           @if(!empty($profile_data) && $country->id==$profile_data->nationality){
                                <option value="{{$profile_data->nationality}}" selected="selected">{{$country->name}}</option>
                                }
                               @else{
                            <option value="{{$country->id}}" @if($country->id==old('country')) selected @endif>{{$country->name}}</option>
                           }
                           @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="education">Education : </label>
                        <select class="form-control" name="education">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[29] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->education){
                                <option value="{{$profile_data->education}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="languages">Languages : </label>
                        <select class="selectpicker" name="languages[]" multiple>
                            <option value="0">--Please Select--</option>
                            @foreach($languages as $row)
                            @if(!empty($profile_data) && !empty(unserialize($profile_data->languages)) && in_array($row->id,unserialize($profile_data->languages)))
                                <option value="{{$row->id}}" selected="selected">{{$row->name}}</option>   
                               @else
                            <option value="{{$row->id}}">{{$row->name}}</option> 
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="english_ability">English language ability : </label>
                        <select class="form-control" name="english_ability">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[30] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->english_ability){
                                <option value="{{$profile_data->english_ability}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="portugese_ability">Portuguese language ability : </label>
                        <select class="form-control" name="portugese_ability">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[31] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->portugese_ability){
                                <option value="{{$profile_data->portugese_ability}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="spanish_ability">Spanish language ability : </label>
                        <select class="form-control" name="spanish_ability">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[32] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->spanish_ability){
                                <option value="{{$profile_data->spanish_ability}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="religion">Religion : </label>
                        <select class="form-control" name="religion">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[33] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->religion){
                                <option value="{{$profile_data->religion}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="religious_values">Religious values : </label>
                        <select class="form-control" name="religious_values">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[34] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->religious_values){
                                <option value="{{$profile_data->religious_values}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="star_sign">Star sign : </label>
                        <select class="form-control" name="star_sign">
                            <option value="0">--Please Select--</option>
                            @foreach($form_layout[35] as $row)
                            @if(!empty($profile_data) && $row['value']==$profile_data->star_sign){
                                <option value="{{$profile_data->star_sign}}" selected="selected">{{$row['label']}}</option>
                                }
                               @else{
                            <option value="{{$row['value']}}">{{$row['label']}}</option>
                            }
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="address-update-heading">
                        <h1>In your own words:</h1>
                    </div>
                    <div class="form-group">
                        <label for="profile_heading">Your profile heading : </label>
                        <input type="text" class="form-control" name="profile_heading" value="{{is_null($profile_data)?'':$profile_data->profile_heading}}"/>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="about_yourself">A little about yourself : </label>
                        <textarea class="form-control" name="about_yourself">{{is_null($profile_data)?'':$profile_data->about_yourself}}</textarea>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="partner">What you're looking for in a partner : </label>
                        <textarea class="form-control" name="partner">{{is_null($profile_data)?'':$profile_data->partner}}</textarea>
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