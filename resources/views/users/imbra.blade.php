@extends('layouts.main')
@section('content')
<div class="content-wrapper-inner">
    <div class="content-wrapper-settings">
        @include('users.edit-profile-tabs')
        <div id="profile-bar">
            <div id="profilecompletionbar">
                <div id="profilecompletionlevel" style="width: 43%;"><p class="profilebartext">43% Complete</p></div>
            </div>
            <a href="#" id="profileCompletionExpand" class="right">What's next? <span id="toggleArrow" data-up="+" data-down="-">+</span></a>
        </div>
       <div class="roundedContainer">
        <div class="imbra">
         <form name="edit-imbra" class="form-inline" id="edit-imbra" method="post" action="{{url('users/imbra')}}">
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
        <div class="address-update-container">
            <div class="address-update-inner">
                <div>
                    <h1>International Marriage Broker Regulation Act (IMBRA)</h1>
                </div>
            </div>
            <div class="address-update-outer">
                <p>To help protect the safety of our members, we now request members to complete the International Marriage Brokers Act (IMBRA) safety information form.</p> 
                <p>For more information on IMBRA please read our FAQ or visit the <strong><u><a href="https://en.wikipedia.org/wiki/International_Marriage_Broker_Regulation_Act" target="_blank">IMBRA Wikipedia</a></u></strong> page</p>
            </div>
            <div class="upgrade-info">
                <div class="form-group">
                    <div class="updateconf">
                        <p><strong>IMPORTANT:</strong> if you apply for a USA K non-immigrant visa for your foreign partner then as part of the visa assessment process you may be asked to demonstrate that this background information was provided to your partner.</p>
                    </div>

                </div>
            </div>
        </div>
        <div class="your-information">
            <div class="your-information-heading"><h1>Your Information</h1><span class='your-information-heading-right'>Your name and date of birth will not be shared</span><span class='your-information-heading-image'><img src='../image/info.png' width='15px' height='15px'/></span></div>
            <div class='your-info'>
                <div class='your-info-row1'>
                    <div class='your-info-col1'>
                        <label>First Name:</label>
                        <input type="text" name="first_name"  autocomplete="off">
                    </div>
                    <div class='your-info-col2'>
                        <label>Last Name:</label>
                        <input type="text" name="last_name"  autocomplete="off">
                    </div>
                </div>
                <div class='your-info-row2'>
                    <div class='your-info-col3'>
                        <label>Middle Initial:</label>
                        <select name="middle_initial" class="combo">
                            <option value="" selected=""></option>
                             @foreach (range('A', 'Z') as $i)
                            <option value="{{$i}}">{{$i}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class='your-info-col4'>
                        <label>Date of Birth:</label>
                        <select name="dob_month" id="dob_m" class="dob">
                            <option value=""></option>
                            <option value="1" selected="">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <select name="dob_day" id="dob_d" class="dob">
                            <option value=""></option>
                            @for($i=1;$i<32;$i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        <select name="dob_year" id="dob_y" class="dob">
                            <option value=""></option>
                            @for($i=2017;$i>=1918;$i--)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>

                </div>
            </div>
        </div>
        <div class="criminal-history">
            <div class="criminal-history-heading"><h1>Criminal History</h1></div>
            <ul class='criminal-listing-ul'>
                <li class="imbraText">
                    Do you have any court order restricting your physical or other contact with, behavior towards, or communication with another person, including any temporary or permanent civil restraining order or protection order?
                </li>
                <li id="courtOrder" class="imbraText">
                    <input type="radio" id="courtOrderYes" name="court_order" value="1"> <label for="court_orderYes">Yes</label>
                    <input type="radio" id="courtOrderNo" name="court_order" value="2" checked=""> <label for="court_orderNo">No</label>
                    <span class="radioRequiredMsg"></span>
                </li>
                <li class="imbraText">Have you ever been arrested or convicted by any Federal, State, or local authority for any of the following (leave all boxes blank if none apply):</li>
                <li class="imbraText">
                    <input type="checkbox"  name="prosecution_ref" value="26"><label>solely, principally, or incidentally engaging in prosecution </label>
                </li>
                <li class="imbraText">
                    <input type="checkbox" name="prosecution_ref" value="27"><label>a direct or indirect attempt to procure prostitutes or persons for the purpose of prosecution </label>
                </li>
                <li class="imbraText">
                    <input type="checkbox" name="prosecution_ref" value="28"><label>receiving, in whole or in part, of the proceeds of prosecution </label>
                </li>
                <li class="imbraText">Have you ever been arrested or convicted by any Federal, State, or local authority for any offenses related to controlled substances or alcohol?</li>      
                <li id="drugsAlcohol" class="imbraText">
                    <input type="radio" id="drugsAlcoholYes" name="drugs_alcohol" value="1"> <label for="drugsAlcoholYes">Yes</label>
                    <input type="radio" id="drugsAlcoholNo" name="drugs_alcohol" value="2" checked=""> <label for="drugsAlcoholNo">No</label>
                    <span class="radioRequiredMsg">Required</span>
                </li>
                <li class="imbraText">Please indicate with a check in the appropriate box if you have ever been arrested or convicted of any of the following (leave all boxes blank if none apply):</li>
                <ul class="criminalhistory left">

                    <li class="imbraText">
                        <input type="checkbox"  name="criminal_history" value="3"><label>Homicide</label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox"  name="criminal_history" value="4"><label>Murder</label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox"  name="criminal_history" value="5"><label>Abusive Sexual Contact </label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox"  name="criminal_history" value="6"><label>Manslaughter</label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox"  name="criminal_history" value="7"><label>Battery</label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" name="criminal_history" value="8"><label>Unlawful Criminal Restraint</label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" name="criminal_history" value="9"><label>Rape</label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox"  name="criminal_history" value="10"><label>Assault</label>
                    </li>

                </ul>
                <ul class="criminalhistory left">

                    <li class="imbraText">
                        <input type="checkbox" name="criminal_history" value="11"><label>Domestic Violence </label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" name="criminal_history" value="12"><label>Peonage</label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" name="criminal_history" value="13"><label>Incest</label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" name="criminal_history" value="14"><label>Child Abuse or Neglect </label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" name="criminal_history" value="15"><label>Torture</label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" name="criminal_history" value="16"><label>Trafficking</label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" name="criminal_history" value="17"><label>Sexual Exploitation </label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" name="criminal_history" value="18"><label>Abduction</label>
                    </li>

                </ul>
                <ul class="criminalhistory left">

                    <li class="imbraText">
                        <input type="checkbox" name="criminal_history" value="19"><label>False Imprisonment </label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" name="criminal_history" value="20"><label for="criminal_20"  >Holding Hostage </label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" name="criminal_history" value="21"><label for="criminal_21"  >Stalking</label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" name="criminalHistory" value="22"><label for="criminal_22"  >Kidnapping</label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" name="criminal_history" value="23"><label for="criminal_23"  >Sexual Assault </label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" name="criminal_history" value="24"><label for="criminal_24"  >Slave Trade </label>
                    </li>

                    <li class="imbraText">
                        <input type="checkbox" name="criminal_history" value="25"><label for="criminal_25"  >Involuntary Servitude </label>
                    </li>

                </ul>
            </ul>
            <div class="clearfix"></div>

            <ul class='martial-status'>
                <li class="sectionHeading clearfix imbraTopline"><h1>Marital Status and Dependents</h1></li>
                <li id="currentlyMarried" class="imbraText">
                    <span class="maritalStatus left">Are you currently married?</span>
                    <span class="labelyesno">
                        <input type="radio" id="currentlyMarriedYes" name="currently_married" value="1">
                        <label for="currentlyMarriedYes">Yes</label>
                        <input type="radio" id="currentlyMarriedNo" name="currently_married" value="2" checked="">
                        <label for="currentlyMarriedNo">No</label>
                    </span>

                </li>
                <li id="previouslyMarried" class="imbraText">
                    <span class="maritalStatus left">Were you previously married?</span>
                    <span class="labelyesno">
                        <input type="radio" id="priviouslyMarriedYes" name="previously_married" value="1">
                        <label for="priviouslyMarriedYes">Yes</label>
                        <input type="radio" id="priviouslyMarriedNo" name="previously_married" value="2" checked="">
                        <label for="priviouslyMarriedNo">No</label>

                    </span>
                </li>
               
                <li class="imbraText">
                    <span class="imbraText left" style="display:block; margin-right: 30px;">Have you previously sponsored an alien to whom you were engaged or married?</span>
                    <span class="labelyesno"><input type="radio" id="alienSponsoredYes" name="alien_sponsored" value="1"> <label for="alienSponsoredYes">Yes</label></span>
                    <input type="radio" id="alienSponsoredNo" name="alien_sponsored" value="2" checked="checked"> <label for="alienSponsoredNo">No</label>

                </li>
                <li class="imbraText">If you have children under the age of 18, please provide their ages below (leave blank if you have no children).</li>
                <li class="imbraText" style="padding:0 25px">
                    <table id="childrenAge" style="display:none" class="childrenAge">
                        <tbody><tr id="childrenAgeInfoHeader">
                                <th>Age</th>
                                <th></th>
                            </tr>


                        </tbody></table>
                </li>
                <li class="clearfix agetext">
                    <div id="addAgeText" class="left">Add age:</div>
                    <div style="width:22%; padding-top:5px;" class="left">
                        <select id="childAge" name="child_age" class="combo">
                            <option value="" selected="">Please Select...</option>
                                @for($i=17;$i>0;$i--)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                            <option value="<1">&lt;1</option>
                        </select>
                        
                    </div>
                </li>
            </ul>
            <ul class='martial-status'>
                <li class="sectionHeading clearfix"><h1>Residence History</h1></li>
                <li class="imbraText">Please provide all the countries and states where you have resided since the age of 18.</li>
                <li class="imbraText" style="padding:0 0 10px 25px">

                    <table id="residenceInfo" class="residenceInfo formContainer">
                        <tbody><tr id="residenceInfoHeader">
                                <th>Country</th>
                                <th>State/Province</th>
                            </tr>

                            <tr id="residenceRow_1">
                                <td style="border:0">
                                    <input type="hidden" id="r_country_1" name="country_live" valucountryLive_1e="223" readonly="readonly">
                                    <p>USA</p>
                                </td>
                                <td style="border:0">
                                    <input type="hidden" id="r_state_1" name="state_live" value="4644" readonly="readonly">
                                    <p>California</p>
                                </td>
                            </tr>

                        </tbody></table>
                </li>

                <li style="border:0">Add another: </li>
                <li class="clearfix" style="border:0">
                    <div id="countryLive" style="border:0;padding-right:5px" class="form-group left">
                        <select name="country" id="country" class="form-control">
                            <option value="0">Please Select...</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}" @if($country->id==old('country')) selected @endif>{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                        <div id="stateLive" style="border:0;padding-left:0" class="form-group left">
					
                        <select name="state" id="state" class="form-control">
                            <option value="0">Please Select...</option>
                        </select>
                    </div>
                </li>
                <input id="residence_totalRecords" name="residence_totalRecords" value="1" type="hidden" readonly="readonly">
            </ul>
            <ul class='martial-status'>
                <li class="imbraText" style="line-height:1.6em;border-top:1px solid #ddd; padding: 7px 30px;">I understand that the above information (except for name and DOB) will be accessible to every foreign national whom I communicate with or who attempts to communicate with me. I understand that if I file a petition for a K non-immigrant visa, then as part of the visa application process, I will be subject to a criminal background check by the US government. I understand that a search of the National Sex Offenders Public Register (NSOPR) will be carried out as part of the background information compilation process. I understand that the results of the NSOPR search will be accessible to every foreign national whom I communicate with or who attempts to communicate with me. I certify that the above information is truthful and accurate and I give my permission for the above information to be released to every foreign national whom I communicate with or who attempts to communicate with me. I hereby waive any rights or obligations that I may have regarding Privacy Regulations and I agree to hold harmless and discharge Cupid Media Pty Ltd from any and all liabilities arising from the use and release of the above information.  </li>
                <li id="agree" class="text-center">
                    <input type="checkbox" id="agreement" name="agree"  class="mr-r-10" required><label for="agreement">I Agree</label>
                    <span class="checkboxRequiredMsg"></span>
                </li>
                <li id="error_zone" style="list-style-type: none; display: none;">
                    <span class="errorMessageValidation">Oops: You forgot to answer all the questions. Please scroll up to complete any unanswered questions.</span>
                </li>
                
            </ul>

                                <div class="button-inner text-center">
                                    <button class="btn btn-primary btn-green" type="submit">SUBMIT</button>
                                </div>
        </div>
                         </form>

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
<!-- jQuery -->
@endsection
