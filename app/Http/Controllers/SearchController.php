<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\UtilityController;
use App\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Languages;
use App\Models\Tags;
use App\Models\UserMatch;
use App\Models\UserSearch;

class SearchController extends UtilityController {

    public function __construct() {
        $this->middleware('auth');
    }

    public function getAdvanceSearch() {
        try {
            $user_match = null;
            $form_layout = $this->getProfileForm();
            $countries = Country::get();
            $languages = Languages::get();
            $user_id = Auth::user()->user_id;
            $user_match = UserMatch::where('user_id', $user_id)->first();
            //dd($user_match);
            if (!empty($user_match)) {
                $this->getMatchData($user_match);
            }
        } catch (\Exception $e) {
            echo $e;
            exit;
        }
        return view('search.advanced-search')->with('user_match', $user_match)->with('countries', $countries)->with('languages', $languages)->with('form_layout', $form_layout);
    }
    
   

    public function getKeywords() {
        try {
            $form_layout = $this->getProfileForm();
            $countries = Country::get();
            $languages = Languages::get();
        } catch (Exception $ex) {
            
        }
        return view('search.keywords')->with('countries', $countries)->with('languages', $languages)->with('form_layout', $form_layout);
    }

    public function getCupidTags() {
        try {
            $countries = Country::get();
            $tags = Tags::get();
        } catch (Exception $ex) {
            
        }
        return view('search.cupid-tags')->with('countries', $countries)->with('tags', $tags);
    }

    public function getFirstName() {
        try {
            $form_layout = $this->getProfileForm();
            $countries = Country::get();
        } catch (Exception $ex) {
            
        }
        return view('search.first-name')->with('countries', $countries)->with('form_layout', $form_layout);
    }

    public function getMemberNumber() {
        try {
            $countries = Country::get();
            $tags = Tags::get();
        } catch (Exception $ex) {
            
        }
        return view('search.member-number')->with('countries', $countries)->with('tags', $tags);
    }

    public function getPopular() {
        try {
            $countries = Country::get();
            $tags = Tags::get();
        } catch (Exception $ex) {
            
        }
        return view('search.cupid-tags')->with('countries', $countries)->with('tags', $tags);
    }

    public function postAdvancedSearch() {
        try {
              
        $inputs = Input::all();
       
     $user_search = UserSearch::firstOrNew(array('user_id' => Auth::user()->user_id));
        if(!empty($inputs['search_name'])){
        $user_search->gender = $inputs['gender'];
        $user_search->min_age = $inputs['min_age'];
        $user_search->max_age = $inputs['max_age'];
        $user_search->country = $inputs['country'];
        $user_search->state = $inputs['state'];
        $user_search->city = $inputs['city'];
        $user_search->min_height = $inputs['min_height'];
        $user_search->max_height = $inputs['max_height'];
        $user_search->min_weight = $inputs['min_weight'];
        $user_search->max_weight = $inputs['max_weight'];
        $user_search->hair_color = isset($inputs['hair_color'])?serialize($inputs['hair_color']):'';
        $user_search->hair_length = isset($inputs['hair_length'])?serialize($inputs['hair_length']):'';
        $user_search->hair_type = isset($inputs['hair_type'])?serialize($inputs['hair_type']):'';
        $user_search->eye_color = isset($inputs['eye_color'])?serialize($inputs['eye_color']):'';
        $user_search->eye_wear = isset($inputs['eye_wear'])?serialize($inputs['eye_wear']):'';
        $user_search->body_type = isset($inputs['body_type'])?serialize($inputs['body_type']):'';
        $user_search->ethnicity = isset($inputs['ethnicity'])?serialize($inputs['ethnicity']):'';
        $user_search->best_feature = isset($inputs['best_feature'])?serialize($inputs['best_feature']):'';
        $user_search->body_art = isset($inputs['body_art'])?serialize($inputs['body_art']):'';
        $user_search->appearance = isset($inputs['appearance'])?serialize($inputs['appearance']):'';
        $user_search->drink = isset($inputs['drink'])?serialize($inputs['drink']):'';
        $user_search->smoke = isset($inputs['smoke'])?serialize($inputs['smoke']):'';
         $user_search->marital_status = isset($inputs['marital_status'])?serialize($inputs['marital_status']):'';
        $user_search->have_children = isset($inputs['have_children'])?serialize($inputs['have_children']):'';
        $user_search->no_children = $inputs['no_children'];
        $user_search->oldest_child = $inputs['oldest_child'];
        $user_search->youngest_child = $inputs['youngest_child'];
        $user_search->more_child = isset($inputs['more_child'])?serialize($inputs['more_child']):'';
        $user_search->have_pets = isset($inputs['have_pets'])?serialize($inputs['have_pets']):'';
        $user_search->occupation = isset($inputs['occupation'])?serialize($inputs['occupation']):'';
        $user_search->employment = isset($inputs['employment'])?serialize($inputs['employment']):'';
        $user_search->income = $inputs['income'];
        $user_search->home_type = isset($inputs['home_type'])?serialize($inputs['home_type']):'';
        $user_search->living_situation = isset($inputs['living_situation'])?serialize($inputs['living_situation']):'';
        $user_search->relocate = isset($inputs['relocate'])?serialize($inputs['relocate']):'';
        
        $user_search->nationality = isset($inputs['nationality'])?serialize($inputs['nationality']):'';
        $user_search->education = $inputs['education'];
        $user_search->languages = isset($inputs['languages'])?serialize($inputs['languages']):'';
        $user_search->english_ability = $inputs['english_ability'];
        $user_search->portugese_ability = $inputs['portugese_ability'];
        $user_search->spanish_ability = $inputs['spanish_ability'];
        $user_search->religion = $inputs['religion'];
        $user_search->religious_values = isset($inputs['religious_values'])?serialize($inputs['religious_values']):'';
        $user_search->home_type = isset($inputs['home_type'])?serialize($inputs['home_type']):'';
        $user_search->living_situation = isset($inputs['living_situation'])?serialize($inputs['living_situation']):'';
        $user_search->star_sign = isset($inputs['star_sign'])?serialize($inputs['star_sign']):'';
       $user_search->search_name = $inputs['search_name'];
         $user_search->save();
        return Redirect::to('search/advanced-search')->with('success',trans('messages.search_saved'));
        }
        else{
            return Redirect::to('users/listing');
        }
        } 
        catch (\Exception $e) {
            echo $e;
            exit;
        }
        return view('search.advanced-search')->with('countries', $countries)->with('languages', $languages)->with('form_layout', $form_layout);
    }

    public function getSavedSearch() {
        return view('search.saved-search');
    }

    public function getAddSearch() {
        $user_match = null;
        $form_layout = $this->getProfileForm();
        $countries = Country::get();
        $languages = Languages::get();
        $user_id = Auth::user()->user_id;
        $user_match = UserMatch::where('user_id', $user_id)->first();
        //dd($user_match);
        if (!empty($user_match)) {
            $this->getMatchData($user_match);
        }
        return view('search.add-search')->with('user_match', $user_match)->with('countries', $countries)->with('languages', $languages)->with('form_layout', $form_layout);
    }

    public function getMatchData($user_match) {
        $this->setMasterArray();
        $user_match->body_type = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->body_type)), ','));
        $user_match->ethnicity = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->ethnicity)), ','));
        $user_match->appearance = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->appearance)), ','));
        $user_match->hair_color = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->hair_color)), ','));
        $user_match->hair_length = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->hair_length)), ','));
        $user_match->hair_type = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->hair_type)), ','));
        $user_match->eye_color = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->eye_color)), ','));
        $user_match->eye_wear = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->eye_wear)), ','));
        $user_match->best_feature = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->best_feature)), ','));
        $user_match->body_art = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->body_art)), ','));
        $user_match->smoke = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->smoke)), ','));
        $user_match->drink = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->drink)), ','));
        $user_match->relocate = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->relocate)), ','));
        $user_match->marital_status = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->marital_status)), ','));
        $user_match->have_children = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->have_children)), ','));
        $user_match->more_child = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->more_child)), ','));
        $user_match->have_pets = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->have_pets)), ','));
        $user_match->occupation = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->occupation)), ','));
        $user_match->employment = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->employment)), ','));
        $user_match->home_type = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->home_type)), ','));
        $user_match->living_situation = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->living_situation)), ','));
        $user_match->nationality = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->nationality)), ','));
        //$user_match->education = unserialize($user_match->education);
        $user_match->languages = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->languages)), ','));
        $user_match->religious_values = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->religious_values)), ','));
        $user_match->star_sign = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->star_sign)), ','));
        return $user_match;
    }
    
      public function getState($country_id) {
        $response = array();
        $states = State::where('country_id', $country_id)->get();
        if (!$states->isEmpty()) {
            $response['status'] = 1;
            $response['states'] = $states;
        } else {
            $response['status'] = 0;
            $response['states'] = '';
        }
        return response()->json($response);
    }

    public function getCity($state_id) {
        $response = array();
        $cities = City::where('state_id', $state_id)->get();
        if (!$cities->isEmpty()) {
            $response['status'] = 1;
            $response['cities'] = $cities;
        } else {
            $response['status'] = 0;
            $response['cities'] = '';
        }
        return response()->json($response);
    }

}
