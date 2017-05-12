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
use Illuminate\Support\Facades\DB;
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
            //dd($user_match);exit;
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
            if (!empty($inputs['search_name'])) {
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
                $user_search->hair_color = isset($inputs['hair_color']) ? serialize($inputs['hair_color']) : '';
                $user_search->hair_length = isset($inputs['hair_length']) ? serialize($inputs['hair_length']) : '';
                $user_search->hair_type = isset($inputs['hair_type']) ? serialize($inputs['hair_type']) : '';
                $user_search->eye_color = isset($inputs['eye_color']) ? serialize($inputs['eye_color']) : '';
                $user_search->eye_wear = isset($inputs['eye_wear']) ? serialize($inputs['eye_wear']) : '';
                $user_search->body_type = isset($inputs['body_type']) ? serialize($inputs['body_type']) : '';
                $user_search->ethnicity = isset($inputs['ethnicity']) ? serialize($inputs['ethnicity']) : '';
                $user_search->best_feature = isset($inputs['best_feature']) ? serialize($inputs['best_feature']) : '';
                $user_search->body_art = isset($inputs['body_art']) ? serialize($inputs['body_art']) : '';
                $user_search->appearance = isset($inputs['appearance']) ? serialize($inputs['appearance']) : '';
                $user_search->drink = isset($inputs['drink']) ? serialize($inputs['drink']) : '';
                $user_search->smoke = isset($inputs['smoke']) ? serialize($inputs['smoke']) : '';
                $user_search->marital_status = isset($inputs['marital_status']) ? serialize($inputs['marital_status']) : '';
                $user_search->have_children = isset($inputs['have_children']) ? serialize($inputs['have_children']) : '';
                $user_search->no_children = $inputs['no_children'];
                $user_search->oldest_child = $inputs['oldest_child'];
                $user_search->youngest_child = $inputs['youngest_child'];
                $user_search->more_child = isset($inputs['more_child']) ? serialize($inputs['more_child']) : '';
                $user_search->have_pets = isset($inputs['have_pets']) ? serialize($inputs['have_pets']) : '';
                $user_search->occupation = isset($inputs['occupation']) ? serialize($inputs['occupation']) : '';
                $user_search->employment = isset($inputs['employment']) ? serialize($inputs['employment']) : '';
                $user_search->income = $inputs['income'];
                $user_search->home_type = isset($inputs['home_type']) ? serialize($inputs['home_type']) : '';
                $user_search->living_situation = isset($inputs['living_situation']) ? serialize($inputs['living_situation']) : '';
                $user_search->relocate = isset($inputs['relocate']) ? serialize($inputs['relocate']) : '';

                $user_search->nationality = isset($inputs['nationality']) ? serialize($inputs['nationality']) : '';
                $user_search->education = $inputs['education'];
                $user_search->languages = isset($inputs['languages']) ? serialize($inputs['languages']) : '';
                $user_search->english_ability = $inputs['english_ability'];
                $user_search->portugese_ability = $inputs['portugese_ability'];
                $user_search->spanish_ability = $inputs['spanish_ability'];
                $user_search->religion = $inputs['religion'];
                $user_search->religious_values = isset($inputs['religious_values']) ? serialize($inputs['religious_values']) : '';
                $user_search->home_type = isset($inputs['home_type']) ? serialize($inputs['home_type']) : '';
                $user_search->living_situation = isset($inputs['living_situation']) ? serialize($inputs['living_situation']) : '';
                $user_search->star_sign = isset($inputs['star_sign']) ? serialize($inputs['star_sign']) : '';
                $user_search->search_name = $inputs['search_name'];
                $user_search->save();
                return Redirect::to('search/advanced-search')->with('success', trans('messages.search_saved'));
            } else {
                return Redirect::to('users/listing');
            }
        } catch (\Exception $e) {
            echo $e;
            exit;
        }
        return view('search.advanced-search')->with('countries', $countries)->with('languages', $languages)->with('form_layout', $form_layout);
    }

    public function getSavedSearch() {
        $search_row= UserSearch::select()->where('user_search.user_id', '=',Auth::user()->user_id)->get();
        $cnt= count($search_row);
       // print_r($search_row);echo $cnt;exit;
        return view('search.saved-search')->with('cnt',$cnt)->with('search_row',$search_row);
    }
   
    public function getAddSearch() {
        $user_search = null;
        $form_layout = $this->getProfileForm();
        $countries = Country::get();
        $languages = Languages::get();
        $user_id = Auth::user()->user_id;
        $user_search = UserSearch::where('user_id', $user_id)->first();
        
       
        return view('search.add-search')->with('user_search', $user_search)->with('countries', $countries)->with('languages', $languages)->with('form_layout', $form_layout);
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
       // $user_match->have_pets = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->have_pets)), ','));
        $user_match->occupation = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->occupation)), ','));
        $user_match->employment = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->employment)), ','));
        $user_match->home_type = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->home_type)), ','));
        $user_match->living_situation = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->living_situation)), ','));
        $user_match->nationality = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->nationality)), ','));
        //$user_match->education = unserialize($user_match->education);
        $user_match->languages = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->languages)), ','));
        $user_match->religious_values = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->religious_values)), ','));
        $user_match->star_sign = ucfirst(implode(array_map(array($this, 'getFormLabel'), unserialize($user_match->star_sign)), ','));
        $user_match->english_ability = ucfirst(implode(array_map(array($this, 'getFormLabel'), [$user_match->english_ability]), ','));
        $user_match->portugese_ability = ucfirst(implode(array_map(array($this, 'getFormLabel'), [$user_match->portugese_ability]), ','));
        $user_match->spanish_ability = ucfirst(implode(array_map(array($this, 'getFormLabel'), [$user_match->spanish_ability]), ','));
        $user_match->religion = ucfirst(implode(array_map(array($this, 'getFormLabel'), [$user_match->religion]), ','));
        return $user_match;
    }

    public function postSearchMatch() {
        $inputs = Input::all();
        $logged = Auth::user()->user_id;
        //dd($inputs);
        $query = User::select(DB::raw('f.favourite_id,users.*,ph.photo_name,(select name from countries as c where users.country=c.id) as country_name,(select name from states as s where users.state=s.id) as state_name,(select name from cities as c where users.city=c.id) as city_name'))
                        ->leftJoin('user_profile as p', 'users.user_id', '=', 'p.user_id')
                ->leftJoin('user_photos as ph', 'users.user_id', '=', 'ph.user_id')->leftJoin('user_favourites as f','f.favourite_to','=','users.user_id')
                ->whereRaw('f.favourite_by = "'.$logged.'" or f.favourite_by is null');
        if (isset($inputs['gender']) && !empty($inputs['gender'])) {
            $query = $query->where('users.gender', $inputs['gender']);
        }
        if (isset($inputs['min_age']) || isset($inputs['max_age'])) {
            if (!empty($inputs['min_age']) && !empty($inputs['max_age'])) {
                $query = $query->whereBetween('age', array($inputs['min_age'], $inputs['max_age']));
            } elseif (!empty($inputs['min_age'])) {
                $query = $query->where('age', '>=', $inputs['min_age']);
            } elseif (!empty($inputs['max_age'])) {
                $query = $query->where('age', '<=', $inputs['max_age']);
            }
        }
        if (isset($inputs['country']) && !empty($inputs['country'])) {
            $query = $query->where('users.country', $inputs['country']);
        }
        if (isset($inputs['state']) && !empty($inputs['state'])) {
            $query = $query->where('users.state', $inputs['state']);
        }
        if (isset($inputs['city']) && !empty($inputs['city'])) {
            $query = $query->where('users.city', $inputs['city']);
        }
        if (isset($inputs['photo']) && !empty($inputs['photo'])) {
            $query = $query->whereRaw('photo_name is not null');
        }
        if (isset($inputs['last_login']) && !empty($inputs['last_login'])) {
            $query = $query->where('last_login', '>=', DB::raw("CURDATE() - INTERVAL " . $inputs['last_login'] . " DAY"));
        }
        if (isset($inputs['body_type']) && !empty($inputs['body_type'])) {
            if (is_array($inputs['body_type']) && !empty($inputs['body_type'][0])) {
                $query->whereIn('body_type', $inputs['body_type']);
            }
        }
        if (isset($inputs['ethnicity']) && !empty($inputs['ethnicity'])) {
            if (is_array($inputs['ethnicity']) && !empty($inputs['ethnicity'][0])) {
                $query->whereIn('ethnicity', $inputs['ethnicity']);
            }
        }
        if (isset($inputs['appearance']) && !empty($inputs['appearance'])) {
            if (is_array($inputs['appearance']) && !empty($inputs['appearance'][0])) {
                $query->whereIn('appearance', $inputs['appearance']);
            }
        }
        if (isset($inputs['hair_color']) && !empty($inputs['hair_color'])) {
            if (is_array($inputs['hair_color']) && !empty($inputs['hair_color'][0])) {
                $query->whereIn('hair_color', $inputs['hair_color']);
            }
        }
        if (isset($inputs['hair_length']) && !empty($inputs['hair_length'])) {
            if (is_array($inputs['hair_length']) && !empty($inputs['hair_length'][0])) {
                $query->whereIn('hair_length', $inputs['hair_length']);
            }
        }
        if (isset($inputs['hair_type']) && !empty($inputs['hair_type'])) {
            if (is_array($inputs['hair_type']) && !empty($inputs['hair_type'][0])) {
                $query->whereIn('hair_type', $inputs['hair_type']);
            }
        }
        if (isset($inputs['eye_color']) && !empty($inputs['eye_color'])) {
            if (is_array($inputs['eye_color']) && !empty($inputs['eye_color'][0])) {
                $query->whereIn('eye_color', $inputs['eye_color']);
            }
        }
        if (isset($inputs['eye_wear']) && !empty($inputs['eye_wear'])) {
            if (is_array($inputs['eye_wear']) && !empty($inputs['eye_wear'][0])) {
                $query->whereIn('eye_wear', $inputs['eye_wear']);
            }
        }
        if (isset($inputs['best_feature']) && !empty($inputs['best_feature'])) {
            if (is_array($inputs['best_feature']) && !empty($inputs['best_feature'][0])) {
                $query->whereIn('best_feature', $inputs['best_feature']);
            }
        }
        if (isset($inputs['body_art']) && !empty($inputs['body_art'])) {
            if (is_array($inputs['body_art']) && !empty($inputs['body_art'][0])) {
                $query->whereIn('body_art', $inputs['body_art']);
            }
        }
        if (isset($inputs['smoke']) && !empty($inputs['smoke'])) {
            if (is_array($inputs['smoke']) && !empty($inputs['smoke'][0])) {
                $query->whereIn('smoke', $inputs['smoke']);
            }
        }
        if (isset($inputs['drink']) && !empty($inputs['drink'])) {
            if (is_array($inputs['drink']) && !empty($inputs['drink'][0])) {
                $query->whereIn('drink', $inputs['drink']);
            }
        }
        if (isset($inputs['relocate']) && !empty($inputs['relocate'])) {
            if (is_array($inputs['relocate']) && !empty($inputs['relocate'][0])) {
                $query->whereIn('relocate', $inputs['relocate']);
            }
        }
        if (isset($inputs['marital_status']) && !empty($inputs['marital_status'])) {
            if (is_array($inputs['marital_status']) && !empty($inputs['marital_status'][0])) {
                $query->whereIn('marital_status', $inputs['marital_status']);
            }
        }
        if (isset($inputs['have_children']) && !empty($inputs['have_children'])) {
            if (is_array($inputs['have_children']) && !empty($inputs['have_children'][0])) {
                $query->whereIn('have_children', $inputs['have_children']);
            }
        }
        if (isset($inputs['more_child']) && !empty($inputs['more_child'])) {
            if (is_array($inputs['more_child']) && !empty($inputs['more_child'][0])) {
                $query->whereIn('more_child', $inputs['more_child']);
            }
        }
        if (isset($inputs['have_pets']) && !empty($inputs['have_pets'])) {
            if (is_array($inputs['have_pets']) && !empty($inputs['have_pets'][0])) {
                $query->whereIn('have_pets', $inputs['have_pets']);
            }
        }
        if (isset($inputs['occupation']) && !empty($inputs['occupation'])) {
            if (is_array($inputs['occupation']) && !empty($inputs['occupation'][0])) {
                $query->whereIn('occupation', $inputs['occupation']);
            }
        }
        if (isset($inputs['employment']) && !empty($inputs['employment'])) {
            if (is_array($inputs['employment']) && !empty($inputs['employment'][0])) {
                $query->whereIn('employment', $inputs['employment']);
            }
        }
        if (isset($inputs['home_type']) && !empty($inputs['home_type'])) {
            if (is_array($inputs['home_type']) && !empty($inputs['home_type'][0])) {
                $query->whereIn('home_type', $inputs['home_type']);
            }
        }
        if (isset($inputs['living_situation']) && !empty($inputs['living_situation'])) {
            if (is_array($inputs['living_situation']) && !empty($inputs['living_situation'][0])) {
                $query->whereIn('living_situation', $inputs['living_situation']);
            }
        }
        if (isset($inputs['nationality']) && !empty($inputs['nationality'])) {
            if (is_array($inputs['nationality']) && !empty($inputs['nationality'][0])) {
                $query->whereIn('nationality', $inputs['nationality']);
            }
        }
        if (isset($inputs['languages']) && !empty($inputs['languages'])) {
            if (is_array($inputs['languages']) && !empty($inputs['languages'][0])) {
                $query->whereIn('languages', $inputs['languages']);
            }
        }
        if (isset($inputs['religious_values']) && !empty($inputs['religious_values'])) {
            if (is_array($inputs['religious_values']) && !empty($inputs['religious_values'][0])) {
                $query->whereIn('religious_values', $inputs['religious_values']);
            }
        }
        if (isset($inputs['star_sign']) && !empty($inputs['star_sign'])) {
            if (is_array($inputs['star_sign']) && !empty($inputs['star_sign'][0])) {
                $query->whereIn('star_sign', $inputs['star_sign']);
            }
        }
        $result = $query->groupBy('users.user_id')->get();
        //dd($result);
        return view('search.matches')->with('matches', $result);
    }

    //dd($result);
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
    
     public function postAddSearch() {
        try {
              
        $inputs = Input::all();
       
    
        if(!empty($inputs['search_name'])){
            $search_data=array(
                'user_id'=> Auth::user()->user_id,
                'gender' =>$inputs['gender'],
                'seeking' =>$inputs['seeking'],
                'min_age' =>$inputs['min_age'],
                'max_age' =>$inputs['max_age'],
                 'country' =>$inputs['country'],
                'state' =>$inputs['state'],
                'city' =>$inputs['city'],
                'has_photo' =>$inputs['has_photo'],
                'relationship' => isset($inputs['relationship'])?serialize($inputs['relationship']):'',
                'last_active' => $inputs['last_active'],
                'hair_color' =>isset($inputs['hair_color'])?serialize($inputs['hair_color']):'',
                'hair_length' => isset($inputs['hair_length'])?serialize($inputs['hair_length']):'',
                'hair_type' => isset($inputs['hair_type'])?serialize($inputs['hair_type']):'',
                'eye_color' => isset($inputs['eye_color'])?serialize($inputs['eye_color']):'',
                'eye_wear' => isset($inputs['eye_wear'])?serialize($inputs['eye_wear']):'',
                'min_height' => $inputs['min_height'],
                'max_height' => $inputs['max_height'],
                'min_weight' => $inputs['min_weight'],
                'max_weight' => $inputs['max_weight'],
                'body_type' => isset($inputs['body_type'])?serialize($inputs['body_type']):'',
                'ethnicity' => isset($inputs['ethnicity'])?serialize($inputs['ethnicity']):'',
                'best_feature' => isset($inputs['best_feature'])?serialize($inputs['best_feature']):'',
                'body_art' => isset($inputs['body_art'])?serialize($inputs['body_art']):'',
                'appearance' => isset($inputs['appearance'])?serialize($inputs['appearance']):'',
                'drink' => isset($inputs['drink'])?serialize($inputs['drink']):'',
                'smoke' => isset($inputs['smoke'])?serialize($inputs['smoke']):'',
                'marital_status' => isset($inputs['marital_status'])?serialize($inputs['marital_status']):'',
                'have_children' => isset($inputs['have_children'])?serialize($inputs['have_children']):'',
                'no_children' => $inputs['no_children'],
                'oldest_child' => $inputs['oldest_child'],
                'youngest_child' => $inputs['youngest_child'],
                'more_child' => isset($inputs['more_child'])?serialize($inputs['more_child']):'',
                'occupation' => isset($inputs['occupation'])?serialize($inputs['occupation']):'',
                'employment' => isset($inputs['employment'])?serialize($inputs['employment']):'',
                'income' => $inputs['income'],
                'home_type' => isset($inputs['home_type'])?serialize($inputs['home_type']):'',
                'living_situation' => isset($inputs['living_situation'])?serialize($inputs['living_situation']):'',
                'relocate' => isset($inputs['relocate'])?serialize($inputs['relocate']):'',

                'nationality' => isset($inputs['nationality'])?serialize($inputs['nationality']):'',
                'education' => $inputs['education'],
                'languages' => isset($inputs['languages'])?serialize($inputs['languages']):'',
                'english_ability' => $inputs['english_ability'],
                'portugese_ability' => $inputs['portugese_ability'],
                'spanish_ability' => $inputs['spanish_ability'],
                'religion' => $inputs['religion'],
                'religious_values' => isset($inputs['religious_values'])?serialize($inputs['religious_values']):'',
                'home_type' => isset($inputs['home_type'])?serialize($inputs['home_type']):'',
                'living_situation' => isset($inputs['living_situation'])?serialize($inputs['living_situation']):'',
                'star_sign' => isset($inputs['star_sign'])?serialize($inputs['star_sign']):'',
               'search_name' => $inputs['search_name']
                       );
                       UserSearch::insert($search_data);
                return Redirect::to('search/add-search')->with('success',trans('messages.search_saved'));
        }
        
        } 
        catch (\Exception $e) {
            echo $e;
            exit;
        }
        return view('search.advanced-search')->with('countries', $countries)->with('languages', $languages)->with('form_layout', $form_layout);
    }
    
 
    
     public function getEditSearch($search_id) {
        try {
            $user_search = null;
            $form_layout = $this->getProfileForm();
            $countries = Country::get();
            $languages = Languages::get();
           
            $user_search = UserSearch::where('search_id', $search_id)->first();
            //dd($user_search);exit;
            if (!empty($user_search)) {
                $user_search=$this->getMatchData($user_search);
            }
        } catch (\Exception $e) {
            echo $e;
            exit;
        }
        return view('search.edit-search')->with('user_search', $user_search)->with('countries', $countries)->with('languages', $languages)->with('form_layout', $form_layout);
    }
    
    public function getDelete($search_id){
        
        UserSearch::destroy($search_id);
        return Redirect::to('search/saved-search')->with('success',trans('messages.search_deleted'));
    }

 }
 
