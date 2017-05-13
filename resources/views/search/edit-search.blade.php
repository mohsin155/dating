@extends('layouts.main')
@section('content')
<div class="content-wrapper-inner">
    <div class="content-wrapper-settings search-menu">
        @include('search.search-tabs')
        <div class="address-update-container">
            <div class="address-update-inner">
                <div>
                    <h1>Edit saved search <?php echo $user_search->search_name; ?></h1>
                    <div class="contentContainerHeaderActionLink">
                        <a href="#" >Clear Form</a>
                    </div>
                </div>
            </div>
            <div class="address-update-heading">
                <h1>Basic</h1>
            </div>

            <div class="signup-page-outer edit-profile-page-setting">
                <form name="edit-search" class="form-inline" id="edit-match" method="post" action="{{url('search/add-search')}}">
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
                            <p><h1>Your search has been edited</h1></p>
                        </div>


                    </div>
                    @endif
                  <div class="form-group">
                        <label for="gender">I'm a: </label>
                        <select class="form-control" name="gender" >
                            <option value="male" <?php echo (!empty($user_search) && $user_search->gender == 'male') ? 'selected' : ''; ?>>Male</option>
                            <option value="female" <?php echo (!empty($user_search) && $user_search->gender == 'female') ? 'selected' : ''; ?>>Female</option>
                        </select>
                    </div>      
                 
                    <div class="form-group">
                        <label for="gender">I'm seeking a: </label>
                        <select class="form-control" name="seeking" >
                            <option value="male" <?php echo (!empty($user_search) && $user_search->gender == 'male') ? 'selected' : ''; ?>>Male</option>
                            <option value="female" <?php echo (!empty($user_search) && $user_search->gender == 'female') ? 'selected' : ''; ?>>Female</option>
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group edit-profile-page">
                        <label for="age_btw">Aged between: </label>
                        <select class="form-control" name="min_age" >
                            <option value="">----</option>
                            @for($i=18;$i<=90;$i++)
                            <option value="{{$i}}" <?php echo (!empty($user_search) && $user_search->min_age == $i) ? 'selected' : ''; ?>>{{$i}}</option>
                            @endfor
                        </select>
                        and 
                        <select class="form-control" name="max_age" >
                            <option value="">----</option>
                            @for($i=18;$i<=90;$i++)
                            <option value="{{$i}}" <?php echo (!empty($user_search) && $user_search->max_age == $i) ? 'selected' : ''; ?>>{{$i}}</option>
                            @endfor
                        </select>

                    </div>

                    <hr class="seperate-line">

                    <div class="form-group">
                        <div class="tabsPanel_container formContainer">
                            <div class="tabsPanel_container">

                             <ul class="tabsPanel nav" id="countriesTabsPanel">
 
                                 <li class="active">Single Country</a</li>
                            <!--<li>Multiple Countries</li>-->
                            </ul>

                                <div class="tab-content">
                                <div id="menu1" class="tab-pane fade in active tabsPanel_content" role="tabpanel">

                                    <fieldset>
                                        <label class="questionLabel">Living in:</label>
                                        <select name="country" id="country">
                                            <option value="">Any Country</option>
                                            @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>

                                    <fieldset>
                                        <label class="questionLabel"></label>

                                        <select name="state" id="state">
                                            <option value="">Any State</option>
                                        </select>
                                    </fieldset>
                                    <input type="hidden" name="distanceUnit" value="kms">
                                    <fieldset>
                                        <label class="questionLabel"></label>within
                                        <select name="livingWithinRadius" id="livingWithinRadius" disabled="disabled">
                                            <option value="-1">-</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="250">250</option>
                                            <option value="500">500</option>
                                        </select>
                                        <span class="divider">kms</span>
                                        <span class="divider">of</span>
                                        <select name="city" id="city">
                                            <option value="">Any City</option>
                                        </select>
                                    </fieldset>
                                    <input type="hidden" name="countrySearchType" value="1">
                                </div>
                                <div id="menu2" class="tabsPanel_content tab-pane fade" role="tabpanel">
                                    <fieldset>
                                        <div id="countryMultiSelectTree">
                                            <label class="questionLabel">Living in:</label>
                                            <label class="itemisedQuestion"><strong>Click on a region or country to select</strong></label>
                                                <label class="questionLabel">&nbsp;</label>  
                                            <div id="tree-container"></div>
                                        </div>
                                    </fieldset>
                                    <input type="hidden" name="countrySearchType" value="4" disabled="disabled">
                                </div>
                                </div>    
                            </div>
                        </div>

                    </div>    
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="has_photo">Has Photo: </label>
                        <div class="pets-section">
                            <input type="checkbox" name="has_photo" value="1" checked="" />Yes, only show profiles with a photo.
                        </div>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group search-for">
                        <label for="searching_for" class="pull-left">Searching For: </label>
                        <div class="pets-section pull-left">
                            <input type="checkbox" name="relationship[]" value="" checked="" />Any
                        </div>
                        @foreach($form_layout[28] as $row)
                        <div class="pets-section pull-left">
                            <input type="checkbox" name="relationship[]" value="{{$row['value']}}" />{{$row['label']}}
                        </div>
                        @endforeach
                        
                    </div>
                    <div class="form-group">
                        <label for="last_active">Last Active : </label>
                        <select class="form-control" name="last_active">
                            <option value="">Any</option>
                            <option value="">within week</option>
                            <option value="">within 1 month</option>
                            <option value="">within 3 month</option>
                            <option value="">within 6 month</option>
                            <option value="">within year</option>
                        </select>
                    </div>
                    <div class="address-update-heading">
                        <h1>Their Appearance:</h1>
                    </div>
                    <div id="accordion" class="accordion-inner">

                        <h3>Hair Length : {{!empty($user_search)?$user_search->hair_length:'Any'}}</h3>
                        <div class="form-group">
                            <div class="hair-length pull-left">
                                <input type="checkbox" name="hair_length[]" value="" checked=""/>Any
                            </div>
                            @foreach($form_layout[2] as $row)
                            <div class="hair-length pull-left">
                                <input type="checkbox" name="hair_length[]" value="{{$row['value']}}" {{!empty($user_search) && in_array($row['value'],unserialize($user_search->getOriginal()['hair_length']))?'checked':''}} />{{$row['label']}}  
                            </div>
                            @endforeach
                            </select>
                        </div>
                        <h3>Hair Type : {{!empty($user_search)?$user_search->hair_type:'Any'}}</h3>
                        <div class="form-group">
                            <div class="hair-length pull-left">
                            <input type="checkbox" name="hair_type[]" value="" checked="true" />Any
                            </div>
                            @foreach($form_layout[3] as $row)
                            <div class="hair-length pull-left">
                                <input type="checkbox" name="hair_type[]" value="{{$row['value']}}" {{!empty($user_search) && in_array($row['value'],unserialize($user_search->getOriginal()['hair_type']))?'checked':''}} />{{$row['label']}}  
                            </div>
                            @endforeach
                            </select>
                        </div>
                        <h3>Hair Color : {{!empty($user_search)?$user_search->hair_color:'Any'}}</h3>
                         <div class="form-group">
                        <div class="hair-length pull-left">

                            <input type="checkbox" name="hair_color[]" value="" checked="true" />Any
                        </div>
                            @foreach($form_layout[1] as $row)
                            <div class="hair-length pull-left">
                                <input type="checkbox" name="hair_color[]" value="{{$row['value']}}"  {{!empty($user_search) && in_array($row['value'],unserialize($user_search->getOriginal()['hair_color']))?'checked':''}} />{{$row['label']}}  
                            </div>
                            @endforeach
                            </select>
                        </div>
                        <h3>Eye Color : {{!empty($user_search)?$user_search->eye_color:'Any'}}</h3>
                        <div class="form-group">
                            <div class="hair-length pull-left">
                            <input type="checkbox" name="eye_color[]" value="" checked="true" />Any
                            </div>
                            @foreach($form_layout[4] as $row)
                            <div class="hair-length pull-left">
                                <input type="checkbox" name="eye_color[]" value="{{$row['value']}}"  {{!empty($user_search) && in_array($row['value'],unserialize($user_search->getOriginal()['eye_color']))?'checked':''}} />{{$row['label']}} 
                            </div>
                            @endforeach
                            </select>
                        </div>
                        <h3>Eye Wear : {{!empty($user_search)?$user_search->eye_wear:'Any'}}</h3>
                        <div class="form-group">
                            <div class="hair-length pull-left">
                            <input type="checkbox" name="eye_wear[]" value="" checked="true" />Any
                            </div>
                            @foreach($form_layout[5] as $row)
                            <div class="hair-length pull-left">
                                <input type="checkbox" name="eye_wear[]" value="{{$row['value']}}"  {{!empty($user_search) && in_array($row['value'],unserialize($user_search->getOriginal()['eye_wear']))?'checked':''}} />{{$row['label']}}  
                            </div>
                            @endforeach
                            </select>
                        </div>
                        <h3>Height : {{!empty($user_search)?$user_search->min_height:'Any'}}</h3>
                        <div class="form-group">
                            <select class="form-control" name="min_height">
                                <option value="155">155cm</option>
                                @for($i=140;$i<220;$i++)
                                <option value="{{$i}}"  {{!empty($user_search) && $i==$user_search->getOriginal()['min_height']?'selected':''}} >{{$i}}</option>
                                @endfor
                            </select>
                            and
                            <select class="form-control" name="max_height">
                                <option value="155">155cm</option>
                                @for($i=140;$i<220;$i++)
                                <option value="{{$i}}" {{!empty($user_search) && $i==$user_search->getOriginal()['max_height']?'selected':''}} >{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <h3>Weight : {{!empty($user_search)?$user_search->min_weight:'Any'}}</h3>
                        <div class="form-group">
                            <?php //echo $user_search->getOriginal()['min_weight'];exit;?>
                            <select class="form-control" name="min_weight">
                                <option value="any">Any</option>
                                @for($i=40;$i<220;$i++)
                                <option value="{{$i}}" {{!empty($user_search) && $i==$user_search->getOriginal()['min_weight']?'selected':''}} >{{$i}}</option>
                                @endfor
                            </select>
                            and
                            <select class="form-control" name="max_weight">
                                <option value="any">Any</option>
                                @for($i=40;$i<220;$i++)
                                <option value="{{$i}}" {{!empty($user_search) && $i==$user_search->getOriginal()['max_weight']?'selected':''}} >{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <h3>Body type : {{!empty($user_search)?$user_search->body_type:'Any'}}</h3>
                        <div class="form-group">
                            <input type="checkbox" name="body_type[]" value="" checked="true" />Any
                            @foreach($form_layout[8] as $row)
                            <div class="pets-section">

                                <input type="checkbox" name="body_type[]" value="{{$row['value']}}" {{!empty($user_search) && in_array($row['value'],unserialize($user_search->getOriginal()['body_type']))?'checked':''}} />{{$row['label']}}  
                            </div>
                            @endforeach
                            </select>
                        </div>
                        <h3>Their ethnicity is mostly : {{!empty($user_search)?$user_search->ethnicity:'Any'}}</h3>
                        <div class="form-group">
                             <div class="hair-length pull-left">
                            <input type="checkbox" name="ethnicity[]" value="" checked="true" />Any
                             </div>
                            @foreach($form_layout[9] as $row)
                            <div class="hair-length pull-left">
                                <input type="checkbox" name="ethnicity[]" value="{{$row['value']}}" {{!empty($user_search) && in_array($row['value'],unserialize($user_search->getOriginal()['ethnicity']))?'checked':''}} />{{$row['label']}}  
                            </div>
                            @endforeach
                            </select>
                        </div>

                        <h3>Their best feature : {{!empty($user_search)?$user_search->best_feature:'Any'}}</h3>
                        <div class="form-group">
                             <div class="hair-length pull-left">
                            <input type="checkbox" name="best_feature[]" value="" checked="true" />Any
                             </div>
                            @foreach($form_layout[11] as $row)
                          <div class="hair-length pull-left">
                                <input type="checkbox" name="best_feature[]" value="{{$row['value']}}" {{!empty($user_search) && in_array($row['value'],unserialize($user_search->getOriginal()['best_feature']))?'checked':''}} />{{$row['label']}}  
                            </div>
                            @endforeach
                            </select>
                        </div>
                        <h3>Body art : {{!empty($user_search)?$user_search->body_art:'Any'}}</h3>
                        <div class="form-group">
                             <div class="hair-length pull-left">
                            <input type="checkbox" name="body_art[]" value="" checked="true" />Any
                             </div>
                            @foreach($form_layout[12] as $row)
                            <div class="hair-length pull-left">
                                <input type="checkbox" name="body_art[]" value="{{$row['value']}}" {{!empty($user_search) && in_array($row['value'],unserialize($user_search->getOriginal()['body_art']))?'checked':''}} />{{$row['label']}}  
                            </div>
                            @endforeach
                            </select>
                        </div>

                        <h3>Consider their appearance as : {{!empty($user_search)?$user_search->appearance:'Any'}}</h3>
                        <div class="form-group">
                             <div class="hair-length pull-left">
                            <input type="checkbox" name="appearance[]" value="" checked="true" />Any
                             </div>
                            @foreach($form_layout[13] as $row)
                              <div class="hair-length pull-left">
                                <input type="checkbox" name="appearance[]" value="{{$row['value']}}" {{!empty($user_search) && in_array($row['value'],unserialize($user_search->getOriginal()['appearance']))?'checked':''}} />{{$row['label']}}  
                            </div>
                            @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="address-update-heading">
                        <h1>Their Lifestyle : {{!empty($user_search)?$user_search->drink:'Any'}}</h1>
                    </div>
                    <div id="accordion1" class="accordion-inner">
                        <h3>Do they drink? </h3>
                        <div class="form-group">
                              <div class="hair-length pull-left">
                            <input type="checkbox" name="drink[]" value="" checked="true" />Any
                              </div>
                            @foreach($form_layout[14] as $row)
                             <div class="hair-length pull-left">
                                <input type="checkbox" name="drink[]" value="{{$row['value']}}" {{!empty($user_search) && in_array($row['value'],unserialize($user_search->getOriginal()['drink']))?'checked':''}} />{{$row['label']}}  
                            </div>
                            @endforeach
                            </select>
                        </div>
                        <h3>Do they smoke? : {{!empty($user_search)?$user_search->smoke:'Any'}}</h3>
                        <div class="form-group">
                              <div class="hair-length pull-left">
                            <input type="checkbox" name="smoke[]" value="" checked="true" />Any
                              </div>
                            @foreach($form_layout[15] as $row)
                              <div class="hair-length pull-left">
                                <input type="checkbox" name="smoke[]" value="{{$row['value']}}" {{!empty($user_search) && in_array($row['value'],unserialize($user_search->getOriginal()['smoke']))?'checked':''}} />{{$row['label']}}  
                            </div>
                            @endforeach
                            </select>
                        </div>
                        <h3>Marital Status : {{!empty($user_search)?$user_search->marital_status:'Any'}}</h3>
                        <div class="form-group">
                              <div class="hair-length pull-left">
                            <input type="checkbox" name="marital_status[]" value="" checked="true" />Any
                              </div>
                            @foreach($form_layout[16] as $row)
                              <div class="hair-length pull-left">
                                <input type="checkbox" name="marital_status[]" value="{{$row['value']}}" {{!empty($user_search) && in_array($row['value'],unserialize($user_search->getOriginal()['marital_status']))?'checked':''}} />{{$row['label']}}  
                            </div>
                            @endforeach
                        </div>
                        <h3>Do they have children? : {{!empty($user_search)?$user_search->have_children:'Any'}}</h3>
                        <div class="form-group">
                              <div class="hair-length pull-left">
                            <input type="checkbox" name="have_children[]" value="" checked="true" />Any
                              </div>
                            @foreach($form_layout[17] as $row)
                              <div class="hair-length pull-left">
                                <input type="checkbox" name="have_children[]" value="{{$row['value']}}" {{!empty($user_search) && in_array($row['value'],unserialize($user_search->getOriginal()['have_children']))?'checked':''}} />{{$row['label']}}  
                            </div>
                            @endforeach
                        </div>
                        <h3>Number of children (or below) : {{!empty($user_search)?$user_search->no_children:'Any'}}</h3>
                        <div class="form-group">

                            <select class="form-control" name="no_children">
                                <option value="any">Any</option>
                                <option value="0">0</option>
                                @foreach($form_layout[18] as $row)
                                <option value="{{$row['value']}}" {{!empty($user_search) && $row['value']==$user_search->getOriginal()['no_children']?'selected':''}} >{{$row['label']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <h3>Youngest Child (or below) : {{!empty($user_search)?$user_search->youngest_child:'Any'}}</h3>
                        <div class="form-group">

                            <select class="form-control" name="youngest_child">
                                <option value="any">Any</option>
                                <option value="0">0</option>
                                @foreach($form_layout[20] as $row)
                                <option value="{{$row['value']}}" {{!empty($user_search) && $row['value']==$user_search->getOriginal()['youngest_child']?'selected':''}} >{{$row['label']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <h3>Oldest Child (or below) : {{!empty($user_search)?$user_search->oldest_child:'Any'}}</h3>
                        <div class="form-group">

                            <select class="form-control" name="oldest_child">
                                <option value="any">Any</option>
                                <option value="0">0</option>
                                @foreach($form_layout[19] as $row)
                                <option value="{{$row['value']}}" {{!empty($user_search) && $row['value']==$user_search->getOriginal()['oldest_child']?'checked':''}} >{{$row['label']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <h3>Do they want more children? : {{!empty($user_search)?$user_search->more_child:'Any'}}</h3>
                        <div class="form-group">
                              <div class="hair-length pull-left">
                            <input type="checkbox" name="more_child[]" value="" checked="true" />Any
                              </div>
                            @foreach($form_layout[21] as $row)
                              <div class="hair-length pull-left">
                                <input type="checkbox" name="more_child[]" value="{{$row['value']}}" {{!empty($user_search) && in_array($row['value'],unserialize($user_search->getOriginal()['more_child']))?'checked':''}} />{{$row['label']}}
                            </div>
                            @endforeach
                            </select>
                        </div>
                        <h3>Occupation : {{!empty($user_search)?$user_search->occupation:'Any'}}</h3>
                        <div class="form-group">
                                <div class="hair-length pull-left">
                            <input type="checkbox" name="occupation[]" value="" checked="true" />Any
                              </div>
                            @foreach($form_layout[23] as $row)
                              <div class="hair-length pull-left">
                                <input type="checkbox" name="occupation[]" value="{{$row['value']}}" {{!empty($user_search) && in_array($row['value'],unserialize($user_search->getOriginal()['occupation']))?'checked':''}} />{{$row['label']}}
                            </div>
                            @endforeach
                            </select>
                        </div>
                        <h3>Employment status : {{!empty($user_search)?$user_search->employment:'Any'}}</h3>
                        <div class="form-group">
                              <div class="hair-length pull-left">
                            <input type="checkbox" name="employment[]" value="" checked="true" />Any
                              </div>
                            @foreach($form_layout[24] as $row)
                              <div class="hair-length pull-left">
                                <input type="checkbox" name="employment[]" value="{{$row['value']}}" {{!empty($user_search) && in_array($row['value'],unserialize($user_search->getOriginal()['employment']))?'checked':''}} />{{$row['label']}}
                            </div>
                            @endforeach
                            </select>
                        </div>
                        <h3>Annual Income (or above) : {{!empty($user_search)?$user_search->income:'Any'}}</h3>
                        <div class="form-group">

                            <select class="form-control" name="income">
                                <option value="0">Any</option>
                                <option value="1" {{!empty($user_search) && $user_search->getOriginal()['income']==1?'selected':''}}>$0 - $30,000 (USD)</option>
                                <option value="2" {{!empty($user_search) && $user_search->getOriginal()['income']==2?'selected':''}} >$30,001 - $60,000 (USD)</option>
                                <option value="3" {{!empty($user_search) && $user_search->getOriginal()['income']==3?'selected':''}}>$60,001 - $120,000 (USD)</option>
                                <option value="4" {{!empty($user_search) && $user_search->getOriginal()['income']==4?'selected':''}}>$120,001 - $180,000 (USD)</option>
                                <option value="5" {{!empty($user_search) && $user_search->getOriginal()['income']==5?'selected':''}}>$180,001 - $240,000 (USD)</option>
                                <option value="6" {{!empty($user_search) && $user_search->getOriginal()['income']==6?'selected':''}}>$240,001 - $600,000+ (USD)</option>
                                <option value="7" {{!empty($user_search) && $user_search->getOriginal()['income']==7?'selected':''}}>Prefer not to say</option>
                            </select>
                        </div>
                        <h3> Home type : {{!empty($user_search)?$user_search->home_type:'Any'}}</h3>
                        <div class="form-group">
                              <div class="hair-length pull-left">
                            <input type="checkbox" name="home_type[]" value="" checked="true" />Any
                              </div>
                            @foreach($form_layout[25] as $row)
                              <div class="hair-length pull-left">
                                <input type="checkbox" name="home_type[]" value="{{$row['value']}}" {{!empty($user_search) && in_array($row['value'],unserialize($user_search->getOriginal()['home_type']))?'checked':''}} />{{$row['label']}}
                            </div>
                            @endforeach
                            </select>
                        </div>
                        <h3>Living situation : {{!empty($user_search)?$user_search->living_situation:'Any'}}</h3>
                        <div class="form-group">
                              <div class="hair-length pull-left">
                            <input type="checkbox" name="living_situation[]" value="" checked="true" />Any
                              </div>
                            @foreach($form_layout[26] as $row)
                              <div class="hair-length pull-left">
                                <input type="checkbox" name="living_situation[]" value="{{$row['value']}}" {{!empty($user_search) && in_array($row['value'],unserialize($user_search->getOriginal()['living_situation']))?'checked':''}} />{{$row['label']}}
                            </div>
                            @endforeach
                            </select>
                        </div>
                        <h3>Willing to relocate : {{!empty($user_search)?$user_search->relocate:'Any'}}</h3>
                        <div class="form-group">
                              <div class="hair-length pull-left">
                            <input type="checkbox" name="relocate[]" value="" checked="true" />Any
                              </div>
                            @foreach($form_layout[27] as $row)
                              <div class="hair-length pull-left">
                                <input type="checkbox" name="relocate[]" value="{{$row['value']}}" {{!empty($user_search) && in_array($row['value'],unserialize($user_search->getOriginal()['relocate']))?'checked':''}} />{{$row['label']}}  
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="address-update-heading">
                        <h1>Their Background / Cultural Values</h1>
                    </div>
                    <div id="accordion2" class="accordion-inner">
                        <h3>Nationality : {{!empty($user_search)?$user_search->nationality:'Any'}}</h3>
                        <div class="form-group">

                            <select class="selectpicker" name="nationality[]" multiple>
                                <option value="" selected="selected">Any</option>
                                @foreach($countries as $row)
                                <option  value="{{$row->id}}" {{!empty($user_search) && $row->id==$user_search->getOriginal()['nationality']?'selected':''}} >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <h3>Education : {{!empty($user_search)?$user_search->education:'Any'}}</h3>
                        <div class="form-group">

                            <select class="form-control" name="education">
                                <option value="" selected="selected">Any</option>
                                @foreach($form_layout[29] as $row)
                                <option value="{{$row['value']}}" {{!empty($user_search) && $row['value']==$user_search->getOriginal()['education']?'selected':''}} >{{$row['label']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <h3>English language ability : {{!empty($user_search)?$user_search->english_ability:'Any'}}</h3>
                        <div class="form-group">

                            <select class="form-control" name="english_ability">
                                <option value="" selected="selected">Any</option>
                                @foreach($form_layout[30] as $row)
                                <option value="{{$row['value']}}" {{!empty($user_search) && $row['value']==$user_search->getOriginal()['english_ability']?'selected':''}} >{{$row['label']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <h3>Portuguese language ability : {{!empty($user_search)?$user_search->portugese_ability:'Any'}}</h3>
                        <div class="form-group">

                            <select class="form-control" name="portugese_ability">
                                <option value="" selected="selected">Any</option>
                                @foreach($form_layout[31] as $row)
                                <option value="{{$row['value']}}" {{!empty($user_search) && $row['value']==$user_search->getOriginal()['portugese_ability']?'selected':''}} >{{$row['label']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <h3>Spanish language ability : {{!empty($user_search)?$user_search->spanish_ability:'Any'}}</h3>
                        <div class="form-group">

                            <select class="form-control" name="spanish_ability">
                                <option value="" selected="selected">Any</option>
                                @foreach($form_layout[32] as $row)
                                <option value="{{$row['value']}}" {{!empty($user_search) && $row['value']==$user_search->getOriginal()['spanish_ability']?'selected':''}} >{{$row['label']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <h3>Languages : {{!empty($user_search)?$user_search->languages:'Any'}}</h3>
                        <div class="form-group">

                            <select class="selectpicker" name="languages[]" multiple>
                                <option value="" selected="selected">Any</option>
                                @foreach($languages as $row)
                                <option value="{{$row->id}}" {{!empty($user_search) && $row['value']==$user_search->getOriginal()['languages']?'selected':''}} >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <h3>Religion : {{!empty($user_search)?$user_search->religion:'Any'}}</h3>
                        <div class="form-group">

                            <select class="form-control" name="religion">
                                <option value="" selected="selected">Any</option>
                                @foreach($form_layout[33] as $row)
                                <option value="{{$row['value']}}" {{!empty($user_search) && $row['value']==$user_search->getOriginal()['religion']?'selected':''}} >{{$row['label']}}</option> 
                                @endforeach
                            </select>
                        </div>
                        <h3 class="religious-label">Religious values : {{!empty($user_search)?$user_search->religious_values:'Any'}}</h3>
                        <div class="form-group">
                              <div class="hair-length pull-left">
                            <input type="checkbox" name="religious_values[]" value="" checked="true"/>Any
                              </div>
                            @foreach($form_layout[34] as $row)
                             <div class="hair-length pull-left">
                                <input type="checkbox" name="religious_values[]" value="{{$row['value']}}" {{!empty($user_search) && in_array($row['value'],unserialize($user_search->getOriginal()['religious_values']))?'checked':''}} />{{$row['label']}}  
                            </div>
                            @endforeach
                        </div>
                        <h3 class="star-label">Star sign : {{!empty($user_search)?$user_search->star_sign:'Any'}}</h3>
                        <div class="form-group">
                              <div class="hair-length pull-left">
                            <input type="checkbox" name="star_sign[]" value="" checked="true"/>Any
                              </div>
                            @foreach($form_layout[35] as $row)
                             <div class="hair-length pull-left">
                                <input type="checkbox" name="star_sign[]" value="{{$row['value']}}"  {{!empty($user_search) && in_array($row['value'],unserialize($user_search->getOriginal()['star_sign']))?'checked':''}}/>{{$row['label']}}  
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Save search:</label>
                        <input type="text" name="search_name" value="{{is_null($user_search)?'':$user_search->search_name}}" />
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
    });
</script>
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
//    $('#countriesTabsPanel li').click(function(){
//       $(this).closest('.form-group').find('li').removeClass('active');
//       
//    });
    $('#countriesTabsPanel li').click(function (e) {
         $(this).closest('.form-group').find('li').removeClass('active');
         $(this).addClass('active');
    if($(this).closest('.form-group').find('li:first').hasClass('active')){
         
       $('.tab-pane').removeClass('in');
       $('.tab-pane').removeClass('active');
       $('.tab-pane:first').addClass('in');
       $('.tab-pane:first').addClass('active');
    }
    else {
          $('.tab-pane').removeClass('in');
          $('.tab-pane').removeClass('active');
          $('.tab-pane:last').addClass('in');
           $('.tab-pane:last').addClass('active');
    }
    });


            var mockData = [];
            mockData.push({
                item:{
                    id: 'id1',
                    label: 'Lorem ipsum dolor 1',
                    checked: false
                },
                children: [{
                   item:{
                        id: 'id11',
                        label: 'Lorem ipsum dolor 11',
                        checked: false
                    } 
                },{
                   item:{
                        id: 'id12',
                        label: 'Lorem ipsum dolor 12',
                        checked: false
                    } 
                },{
                   item:{
                        id: 'id13',
                        label: 'Lorem ipsum dolor 13',
                        checked: false
                    } 
                }]
            });

            mockData.push({
                item:{
                    id: 'id2',
                    label: 'Lorem ipsum dolor 2',
                    checked: false
                },
                children: [{
                   item:{
                        id: 'id21',
                        label: 'Lorem ipsum dolor 21',
                        checked: false
                    } 
                },{
                   item:{
                        id: 'id22',
                        label: 'Lorem ipsum dolor 22',
                        checked: true
                    } 
                },{
                   item:{
                        id: 'id23',
                        label: 'Lorem ipsum dolor 23',
                        checked: false
                    } 
                }]
            });

            mockData.push({
                item:{
                    id: 'id3',
                    label: 'Lorem ipsum dolor 3',
                    checked: false
                },
                children: [{
                   item:{
                        id: 'id31',
                        label: 'Lorem ipsum dolor 31',
                        checked: true
                    } 
                },{
                   item:{
                        id: 'id32',
                        label: 'Lorem ipsum dolor 32',
                        checked: false
                    },
                    children: [{
                        item:{
                            id: 'id321',
                            label: 'Lorem ipsum dolor 321',
                            checked: false
                        }
                    },{
                        item:{
                            id: 'id322',
                            label: 'Lorem ipsum dolor 322',
                            checked: false
                        }
                    }]
                }]
            });

            $('#tree-container').highCheckTree({
                data: mockData
            });
$("input[type=checkbox]").on('click',function(e){
    var name = $(this).attr('name');
    
    if($(this).is(":checked") && $(this).val() == ''){
        console.log(name);
        $('input[name="'+name+'"]').prop('checked',false);
        //$('input[name="'+name+'"]').each(function () {
          //  $(this).removeAttr('checked');
        //});
        $(this).prop('checked',true);
    }else if($(this).is(":checked") && $(this).val() != ''){
        $('input[name="'+name+'"][value=""]').prop('checked',false);
    }else if($(this).not(":checked") && $(this).val() == ''){
        e.preventDefault();
    }
});
//$("input[type=checkbox]").each(function(){
   // $(this).trigger('change');
//});
});
</script>

@endsection
