@extends('layouts.main')
@section('content')
<div class="content-wrapper-inner">
    <div class="content-wrapper-settings search-menu">
        @include('search.search-tabs')
        <div class="address-update-container">
            <div class="address-update-inner">
                <div>
                    <h1>Keyword Search</h1>
                </div>

            </div>
            <div class="description label-single">
                <div class="form-group">
                    <label>Keyword : </label><input name="keyword" type="text" />
                </div>
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
<!--                    <div class="form-group">
                        <label for="country">Living in:</label>
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#" class="active-grey">Country</a></li>
                        </ul>
                        <select class="form-control" id="country" name="country" >
                            <option value="0">--Please Select--</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="state" name="state">
                            <option value="0">--Please Select--</option>
                        </select>
                        <select class="form-control" id="city" name="city">
                            <option value="0">--Please Select--</option>
                        </select>
                    </div>-->
                     <div class="form-group">
                        <div class="tabsPanel_container formContainer">
                            <div class="tabsPanel_container">

                             <ul class="tabsPanel nav" id="countriesTabsPanel">
 
                                 <li class="active">Single Country</li>
                                  <li>Multiple Countries</li>
                            </ul>

                                <div class="tab-content">
                                <div id="menu1" class="tab-pane fade in active tabsPanel_content" role="tabpanel">

                                    <fieldset>
                                        <label class="questionLabel">Living in:</label>
                                        <select name="countryLive" id="r_country">

                                        <option value="-1">Any Country</option>

                                        </select>
                                    </fieldset>

                                    <fieldset>
                                        <label class="questionLabel"></label>

                                        <select name="stateLive" id="r_state">

                                            <option value="-1">Any State</option>

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


                                        <select name="cityLive" id="r_city">

                                            <option value="-1">Any City</option>

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
                    <!--<div class="form-group">
                        <label for="State/Province">State/Province</label>
                        
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="State/Province">City</label>
                        
                    </div>
                    <hr class="seperate-line">-->
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
                        <input type="checkbox" name="relationship[]" value="" />Any
                        </div>
                        @foreach($form_layout[28] as $row)
                         <div class="pets-section pull-left">
                            <input type="checkbox" name="relationship[]" value="{{$row['value']}}" />{{$row['label']}}
                        </div>
                        @endforeach
                          
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="last_active">Last Active : </label>
                        <select class="form-control" name="last_active">
                            <option value="">Any</option>
                            <option value="7">within week</option>
                            <option value="30">within 1 month</option>
                            <option value="90">within 3 months</option>
                            <option value="180">within 6 months</option>
                            <option value="365">within year</option>
                        </select>
                    </div>
                    <hr class="seperate-line">
                    <div class="form-group">
                        <label for="last_active">Sort results by : </label>
                        <select class="form-control" name="sort_result">
                            <option value="active">Last Active</option>
                            <option value="photo">Photos First</option>
                            <option value="newest">Newest Member</option>
                        </select>
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
<script>
$(document).ready(function () {
    $("select[name=country]").trigger("change");
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
});
</script>

@endsection
