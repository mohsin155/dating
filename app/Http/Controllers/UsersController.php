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
use App\Models\UserPersonality;
use App\Models\Tags;
use Illuminate\Support\Facades\DB;
use App\Models\UserTags;
use App\Models\UserProfile;
use App\Models\UserPhotos;
use App\Models\UserInterest;
use App\Models\UserMatch;
use App\Models\UserImbra;

class UsersController extends UtilityController {

    public function __construct() {
        $this->middleware('auth', ['except' => ['getSignup', 'postSignup', 'getLogin', 'postLogin', 'getState', 'getCity', 'postFbsignup', 'postFblogin']]);
        $this->setLanguagesArray();
        $this->setMasterArray();
    }

    public function getLogin() {
        if (Auth::check()) {
            return Redirect::to('users/listing');
        } else {
            return view('users.login');
        }
    }

    public function getSignup() {
        if (Auth::check()) {
            return Redirect::to('users/listing');
        } else {
            $countries = Country::get();
            return view('users.signup')->with('countries', $countries);
        }
    }

    public function postLogin() {
        try{
        $user = new User();
        $inputs = Input::all();
        $rules = array(
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|max:12'
        );
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            //dd($validator->errors()->all());exit;
            return Redirect::to('/login')->with('errors', $validator->errors()->all())->withInput();
        } else {
            if (Auth::attempt(['email' => $inputs['email'], 'password' => $inputs['password']], false)) {
                return Redirect::to('users/listing')->with('success', 'login successfully!!!');
            } else {
                $message[] = trans('messages.login_fail');
                return Redirect::to('login')->with('errors', $message);
            }
        }
        } catch (\Exception $e){
            echo $e;exit;
        }
    }

    public function postSignup() {
        $user = new User();
        $inputs = Input::all();
        //dd($inputs);
        $rules = array(
            'first_name' => 'required',
            'password' => 'required|min:6|max:12',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required',
            'age' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required'
        );
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            //dd($validator->errors()->all());
            //echo "error";
            return Redirect::to('signup')->with('errors', $validator->errors()->all())->withInput();
        } else {
            $pwd = Hash::make($inputs['password']);

            $user = array('first_name' => $inputs['first_name'],
                'password' => $pwd,
                'email' => $inputs['email'],
                'gender' => $inputs['gender'],
                'age' => $inputs['age'],
                'country' => $inputs['country'],
                'state' => $inputs['state'],
                'city' => $inputs['city']
            );

            User::insert($user);
            if (Auth::attempt(['email' => $inputs['email'], 'password' => $inputs['password']], false)) {
                return Redirect::to('users/listing')->with('success', 'login successfully!!!');
            } else {
                $message[] = trans('messages.login_fail');
                return Redirect::to('login')->with('errors', $message);
            }
            return Redirect::to('users/listing')->with('success', 'SignUp successfully!!!');
        }
    }

    public function index() {
        $countries = DB::table("countries")->lists("name", "id");
        return view('index', compact('countries'));
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

    public function postFbsignup() {
        $inputs = Input::all();
        $rules = array(
            'email' => 'email|unique:users,email',
            'facebook_id' => 'unique:users,facebook_id'
        );
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            $response['status'] = 0;
            $response['errors'] = $validator->errors()->first();
        } else {
            $user = array('first_name' => $inputs['first_name'], 'email' => isset($inputs['email']) ? $inputs['email'] : '', 'gender' => $inputs['gender'], 'facebook_id' => $inputs['facebook_id']);
            $user_id = User::insertGetId($user);
            if (Auth::loginUsingId($user_id, true)) {
                $response['status'] = 1;
                $response['redirect_url'] = url('comingsoon');
            } else {
                $response['status'] = 1;
                $response['redirect_url'] = url('login');
            }
        }
        return response()->json($response);
    }

    public function postFblogin() {
        $inputs = Input::all();
        $rules = array(
            'facebook_id' => 'required|exists:users,facebook_id'
        );
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            $response['status'] = 0;
            $response['errors'] = $validator->errors()->first();
        } else {
            $user = User::where('facebook_id', $inputs['facebook_id'])->first();
            if (Auth::loginUsingId($user->user_id, true)) {
                $response['status'] = 1;
                $response['redirect_url'] = url('comingsoon');
            } else {
                $response['status'] = 1;
                $response['redirect_url'] = url('login');
            }
        }
        return response()->json($response);
    }

    public function getLogout() {
        Auth::logout();
        Session::flush();
        return Redirect::to('login');
    }

    public function getProfileSettings() {
        return view('users.profile-settings');
    }

    public function getAccountSettings() {
        return view('users.account-settings');
    }

    public function getBilling() {
        return view('users.billing');
    }

    public function getNotification() {
        return view('users.notification');
    }

    public function getResetPassword() {
        return view('users.reset-password');
    }

    public function postAccountSettings() {
        $user = new User();
        $inputs = Input::all();

        $rules = array('email' => 'required|email|unique:users,email');
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {

            return Redirect::to('users/account-settings')->with('errors', $validator->errors()->all())->withInput();
        } else {
            $affectedRows = User::where('user_id', '=', Auth::user()->user_id)->update(array('email' => $inputs['email']));

            $message = trans('messages.email_id changed');
            $status = 'success';
        }
        return Redirect::to('users/account-settings')->with($status, $message);
    }

    public function postResetPassword() {
        $user = new User();
        $inputs = Input::all();

        $rules = array('newpassword' => 'required|min:6|max:12|same:confirmpassword'
                //'confirmpassword' => 'required|min:6|max:12'
        );
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {

            return Redirect::to('users/reset-password')->with('errors', $validator->errors()->all())->withInput();
        } else {
            $pwd = Hash::make($inputs['newpassword']);
            $affectedRows = User::where('user_id', '=', Auth::user()->user_id)->update(array('password' => $pwd));

            $message = trans('messages.password changed');
            $status = 'success';
        }
        return Redirect::to('users/reset-password')->with($status, $message);
    }

    public function postNotification() {
        $user = new User();
        $inputs = Input::all();
        $rules = array(
            'email_newmessages' => 'required',
            'email_interest' => 'required',
            'email_instantmsg' => 'required',
            'email_offers' => 'required',
            'email_promotions' => 'required',
            'realtime_messages' => 'required',
            'realtime_interest' => 'required',
            'realtime_viewprofile' => 'required',
            'realtime_fav' => 'required',
            'realtime_matches' => 'required'
        );

        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {

            return Redirect::to('users/notification')->with('errors', $validator->errors()->all())->withInput();
        } else {
            $email_notification = array(
                'email_newmessages' => $inputs['email_newmessages'],
                'email_interest' => $inputs['email_interest'],
                'email_instantmsg' => $inputs['email_instantmsg'],
                'email_offers' => $inputs['email_offers'],
                'email_promotions' => $inputs['email_promotions'],
                'realtime_messages' => $inputs['realtime_messages'],
                'realtime_interest' => $inputs['realtime_interest'],
                'realtime_viewprofile' => $inputs['realtime_viewprofile'],
                'realtime_fav' => $inputs['realtime_fav'],
                'realtime_matches' => $inputs['realtime_matches']
            );

            $email_value = serialize($email_notification);

            $affectedRows = User::where('user_id', '=', Auth::user()->user_id)->update(array('email_notifications' => $email_value));
            $message = trans('messages.notification updated');
            $status = 'success';
        }
        return Redirect::to('users/notification')->with($status, $message);
    }

    public function getEditProfile() {
        $form_layout = $this->getProfileForm();
        $countries = Country::get();
        $languages = Languages::get();
        $profile_data= UserProfile::where('user_id',Auth::user()->user_id) ->first();
       // print_r($profile_data);
        return view('users.edit-profile')->with('countries', $countries)->with('profile_data', $profile_data)->with('languages', $languages)->with('form_layout', $form_layout);
    }

    public function getEditMatch() {

        $form_layout = $this->getProfileForm();
        $countries = Country::get();
        $languages = Languages::get();
        $match_data= UserMatch::where('user_id',Auth::user()->user_id) ->first();
        //print_r($match_data);
        return view('users.edit-match')->with('countries', $countries)->with('match_data', $match_data)->with('languages', $languages)->with('form_layout', $form_layout);
    }

    public function getEditInterest() {

            $interest_data= UserInterest::where('user_id',Auth::user()->user_id) ->first();
            //print_r($interest_data);
            $data=unserialize($interest_data['interest']);   
                return view('users.edit-interest')->with('data',$data);
        }
        

    public function getEditPersonality() {
        $user_per = UserPersonality::where('user_id', Auth::user()->user_id)->first();
        return view('users.edit-personality')->with('user_per', $user_per);
    }

    public function getEditTags() {
        $tags = UserTags::where('user_id', Auth::user()->user_id)->get();
        return view('users.edit-tags')->with('tags', $tags);
    }

    public function getVerifyProfile() {
        return view('users.verify-profile');
    }

    public function getImbra() {
        $countries = Country::get();
        return view('users.imbra')->with('countries', $countries);
    }
     public function getListing() {
         $countries = Country::get();
         $profile_data= UserProfile::where('user_id',Auth::user()->user_id) ->first();
         $photos = UserPhotos::where('user_id', Auth::user()->user_id)->first();
         $image_path = url('uploads').'/' . Auth::user()->user_id.'/';
        // print_r ($photos); exit;
        return view('users.listing')->with('countries', $countries)->with('image_path', $image_path)->with('profile_data', $profile_data)->with('photos', $photos);
    }
    
     public function getMessaging() {
        return view('users.messaging');
    }
    public function getEditPhotos($id = 0) {
        $photos = UserPhotos::where('user_id', Auth::user()->user_id)->get();
        $sel_photo = null;
        if($id!=0){
            $sel_photo = UserPhotos::where('user_id', Auth::user()->user_id)->where('photo_id',$id)->first();
        }
        $image_path = url('uploads').'/' . Auth::user()->user_id.'/';
        return view('users.edit-photos')->with('photos', $photos)->with('image_path', $image_path)->with('sel_photo',$sel_photo);
    }

    public function postEditPersonality() {
        $inputs = Input::all();
        $user_per = UserPersonality::firstOrNew(array('user_id' => Auth::user()->user_id));
        $user_per->fav_movie = $inputs['fav_movie'];
        $user_per->fav_book = $inputs['fav_book'];
        $user_per->typeof_food = $inputs['typeof_food'];
        $user_per->music = $inputs['music'];
        $user_per->hobby_intrst = $inputs['hobby_intrst'];
        $user_per->dress_apprce = $inputs['dress_apprce'];
        $user_per->sence_of_humar = $inputs['sence_of_humar'];
        $user_per->personality = $inputs['personality'];
        $user_per->travel = $inputs['travel'];
        $user_per->adaptive = $inputs['adaptive'];
        $user_per->romantic_wkend = $inputs['romantic_wkend'];
        $user_per->perfect_match = $inputs['perfect_match'];
        $user_per->save();
        return Redirect::to('users/edit-personality')->with('success', trans('messages.personality_updated'));
    }

    public function postEditProfile() {

        $inputs = Input::all();
        $have_pet = isset($inputs['have_pets']) ? $inputs['have_pets'] : '';
        $pets = serialize($have_pet);
        $relation = isset($inputs['relationship']) ? $inputs['relationship'] : '';
        $rel = serialize($relation);
        $language = isset($inputs['languages']) ? $inputs['languages'] : '';
        $lang = serialize($language);

        $user_profile = UserProfile::firstOrNew(array('user_id' => Auth::user()->user_id));
        $user_profile->first_name = $inputs['first_name'];
        $user_profile->gender = $inputs['gender'];
        $user_profile->dob_month = $inputs['dob_month'];
        $user_profile->dob_year = $inputs['dob_year'];
        $user_profile->country = $inputs['country'];
        $user_profile->state = $inputs['state'];
        $user_profile->city = $inputs['city'];
        $user_profile->hair_color = $inputs['hair_color'];
        $user_profile->hair_length = $inputs['hair_length'];
        $user_profile->hair_type = $inputs['hair_type'];
        $user_profile->eye_color = $inputs['eye_color'];
        $user_profile->eye_wear = $inputs['eye_wear'];
        $user_profile->height = $inputs['height'];
        $user_profile->weight = $inputs['weight'];
        $user_profile->body_type = $inputs['body_type'];
        $user_profile->ethnicity = $inputs['ethnicity'];
        $user_profile->facial_hair = $inputs['facial_hair'];
        $user_profile->best_feature = $inputs['best_feature'];
        $user_profile->body_art = $inputs['body_art'];
        $user_profile->appearance = $inputs['appearance'];
        $user_profile->drink = $inputs['drink'];
        $user_profile->smoke = $inputs['smoke'];
        $user_profile->marital_status = $inputs['marital_status'];
        $user_profile->have_children = $inputs['have_children'];
        $user_profile->no_children = $inputs['no_children'];
        $user_profile->oldest_child = $inputs['oldest_child'];
        $user_profile->youngest_child = $inputs['youngest_child'];
        $user_profile->more_child = $inputs['more_child'];
        $user_profile->have_pets = $pets;
        $user_profile->occupation = $inputs['occupation'];
        $user_profile->employment = $inputs['employment'];
        $user_profile->income = $inputs['income'];
        $user_profile->home_type = $inputs['home_type'];
        $user_profile->living_situation = $inputs['living_situation'];
        $user_profile->relocate = $inputs['relocate'];
        $user_profile->relationship = $rel;
        $user_profile->nationality = $inputs['nationality'];
        $user_profile->education = $inputs['education'];
        $user_profile->languages = $lang;
        $user_profile->english_ability = $inputs['english_ability'];
        $user_profile->portugese_ability = $inputs['portugese_ability'];
        $user_profile->spanish_ability = $inputs['spanish_ability'];
        $user_profile->religion = $inputs['religion'];
        $user_profile->religious_values = $inputs['religious_values'];
        $user_profile->home_type = $inputs['home_type'];
        $user_profile->living_situation = $inputs['living_situation'];
        $user_profile->star_sign = $inputs['star_sign'];
        $user_profile->profile_heading = $inputs['profile_heading'];
        $user_profile->about_yourself = $inputs['about_yourself'];
        $user_profile->partner = $inputs['partner'];
        $user_profile->save();
        return Redirect::to('users/edit-profile')->with('success', trans('messages.profile_updated'));
    }

    public function getTags() {
        $inputs = Input::all();
        $tags = Tags::select(DB::raw('tag_id as id,name as label,name as value'))->where('name', 'like', '%' . $inputs["term"] . '%')->get();
        return response()->json($tags);
    }

    public function getAddTags() {
        $inputs = Input::all();
        $id = UserTags::insertGetId(array('tag' => $inputs['keyword'], 'user_id' => Auth::user()->user_id));
        return response()->json(array('tag_id' => $id));
    }

    public function getDeleteTags() {
        $inputs = Input::all();
        UserTags::where(array('user_tag_id' => $inputs['tag_id'], 'user_id' => Auth::user()->user_id))->delete();
        return;
    }

    public function postEditPhotos() {
        $inputs = Input::file('uploadForm');
        $input_id = Input::all();
        if (!empty($inputs)) {
            $user_id = Auth::user()->user_id;
            $destinationPath = public_path() . '/uploads/' . Auth::user()->user_id;
            $fileName = Input::file('uploadForm')->getClientOriginalName();
            $extension = Input::file('uploadForm')->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            Input::file('uploadForm')->move($destinationPath, $fileName);
            if($input_id['photo_id'] == 0){
                UserPhotos::insert(array('user_id' => $user_id, 'photo_name' => $fileName));
            }else{
                UserPhotos::where(array('user_id' => $user_id,'photo_id'=>$input_id['photo_id']))->update(array('photo_name' => $fileName));
            }
        }
        return Redirect::to('users/edit-photos')->with('success',trans('messages.photo_uploaded'));
    }

    public function postEditInterest() {

        $inputs = Input::all();
        $data = array(
            'interestEntertainment' => isset($inputs['interestEntertainment'])?$inputs['interestEntertainment']:'',
            'interestFood' => isset($inputs['interestFood'])?$inputs['interestFood']:'',
            'interestMusic' => isset($inputs['interestMusic'])?$inputs['interestMusic']:''
        );
        $user_intrest = serialize($data);
        $user_intr = UserInterest::firstOrNew(array('user_id' => Auth::user()->user_id));
        $user_intr->interest = $user_intrest;
        $user_intr->save();
        return Redirect::to('users/edit-interest')->with('success', trans('messages.userinterest_updated'));
    }

    public function getDeleteImage($id){
        UserPhotos::where('user_id',Auth::user()->user_id)->where('photo_id',$id)->delete();
        return Redirect::to('users/edit-photos')->with('success', trans('messages.photo_deleted'));
    }
    public function postEditMatch(){
        
        $inputs = Input::all();
       
     $user_match = UserMatch::firstOrNew(array('user_id' => Auth::user()->user_id));
        
        $user_match->gender = $inputs['gender'];
        $user_match->min_age = $inputs['min_age'];
        $user_match->max_age = $inputs['max_age'];
        $user_match->country = $inputs['country'];
        $user_match->state = $inputs['state'];
        $user_match->city = $inputs['city'];
        $user_match->min_height = $inputs['min_height'];
        $user_match->max_height = $inputs['max_height'];
        $user_match->min_weight = $inputs['min_weight'];
        $user_match->max_weight = $inputs['max_weight'];
        $user_match->hair_color = isset($inputs['hair_color'])?serialize($inputs['hair_color']):'';
        $user_match->hair_length = isset($inputs['hair_length'])?serialize($inputs['hair_length']):'';
        $user_match->hair_type = isset($inputs['hair_type'])?serialize($inputs['hair_type']):'';
        $user_match->eye_color = isset($inputs['eye_color'])?serialize($inputs['eye_color']):'';
        $user_match->eye_wear = isset($inputs['eye_wear'])?serialize($inputs['eye_wear']):'';
        $user_match->body_type = isset($inputs['body_type'])?serialize($inputs['body_type']):'';
        $user_match->ethnicity = isset($inputs['ethnicity'])?serialize($inputs['ethnicity']):'';
        $user_match->best_feature = isset($inputs['best_feature'])?serialize($inputs['best_feature']):'';
        $user_match->body_art = isset($inputs['body_art'])?serialize($inputs['body_art']):'';
        $user_match->appearance = isset($inputs['appearance'])?serialize($inputs['appearance']):'';
        $user_match->drink = isset($inputs['drink'])?serialize($inputs['drink']):'';
        $user_match->smoke = isset($inputs['smoke'])?serialize($inputs['smoke']):'';
         $user_match->marital_status = isset($inputs['marital_status'])?serialize($inputs['marital_status']):'';
        $user_match->have_children = isset($inputs['have_children'])?serialize($inputs['have_children']):'';
        $user_match->no_children = $inputs['no_children'];
        $user_match->oldest_child = $inputs['oldest_child'];
        $user_match->youngest_child = $inputs['youngest_child'];
        $user_match->more_child = isset($inputs['more_child'])?serialize($inputs['more_child']):'';
        $user_match->have_pets = isset($inputs['have_pets'])?serialize($inputs['have_pets']):'';
        $user_match->occupation = isset($inputs['occupation'])?serialize($inputs['occupation']):'';
        $user_match->employment = isset($inputs['employment'])?serialize($inputs['employment']):'';
        $user_match->income = $inputs['income'];
        $user_match->home_type = isset($inputs['home_type'])?serialize($inputs['home_type']):'';
        $user_match->living_situation = isset($inputs['living_situation'])?serialize($inputs['living_situation']):'';
        $user_match->relocate = isset($inputs['relocate'])?serialize($inputs['relocate']):'';
        
        $user_match->nationality = isset($inputs['nationality'])?serialize($inputs['nationality']):'';
        $user_match->education = $inputs['education'];
        $user_match->languages = isset($inputs['languages'])?serialize($inputs['languages']):'';
        $user_match->english_ability = $inputs['english_ability'];
        $user_match->portugese_ability = $inputs['portugese_ability'];
        $user_match->spanish_ability = $inputs['spanish_ability'];
        $user_match->religion = $inputs['religion'];
        $user_match->religious_values = isset($inputs['religious_values'])?serialize($inputs['religious_values']):'';
        $user_match->home_type = isset($inputs['home_type'])?serialize($inputs['home_type']):'';
        $user_match->living_situation = isset($inputs['living_situation'])?serialize($inputs['living_situation']):'';
        $user_match->star_sign = isset($inputs['star_sign'])?serialize($inputs['star_sign']):'';
       
         $user_match->save();
        return Redirect::to('users/edit-match')->with('success',trans('messages.match_updated'));
    }
   
    public function postImbra() {
         $inputs = Input::all();
          $user_imbra = UserImbra::firstOrNew(array('user_id' => Auth::user()->user_id));
        
        $user_imbra->first_name = $inputs['first_name'];
        $user_imbra->last_name = $inputs['last_name'];
        $user_imbra->middle_initial = $inputs['middle_initial'];
        $user_imbra->dob_month = $inputs['dob_month'];
        $user_imbra->dob_day = $inputs['dob_day'];
        $user_imbra->dob_year = $inputs['dob_year'];
        $user_imbra->court_order = serialize($inputs['court_order']);
        $user_imbra->prosecution_ref = serialize($inputs['prosecution_ref']);
        $user_imbra->drugs_alcohol = $inputs['drugs_alcohol'];
        $user_imbra->criminal_history = serialize($inputs['criminal_history']);
        $user_imbra->currently_married = $inputs['currently_married'];
        $user_imbra->previously_married = $inputs['previously_married'];
        //$user_imbra->mar_month = $inputs['mar_day'];
        //$user_imbra->mar_day = $inputs['mar_day'];
        //$user_imbra->mar_year = $inputs['mar_year'];
       // $user_imbra->terminated_reason = $inputs['terminated_reason'];
        $user_imbra->alien_sponsored = $inputs['alien_sponsored'];
        $user_imbra->child_age = $inputs['child_age'];
        $user_imbra->country = $inputs['country'];
        $user_imbra->state = $inputs['state'];
         
        $user_imbra->save();
        return Redirect::to('users/imbra')->with('success',trans('messages.record_updated'));
    }
    
    public function getProfile($id) {
        $logged = Auth::user()->user_id;
        $view_user = $id;
        $user = new User;
        $user_details = $user->getUserDetails($view_user);
        $user_details['hair_color'] = $this->master_array[$user_details['hair_color']];
        $user_details['hair_length'] = $this->master_array[$user_details['hair_length']];
        $user_details['hair_type'] = $this->master_array[$user_details['hair_type']];
        $user_details['eye_color'] = $this->master_array[$user_details['eye_color']];
        $user_details['eye_wear'] = $this->master_array[$user_details['eye_wear']];
        $user_details['body_type'] = $this->master_array[$user_details['body_type']];
        $user_details['ethnicity'] = $this->master_array[$user_details['ethnicity']];
        $user_details['facial_hair'] = $this->master_array[$user_details['facial_hair']];
        $user_details['best_feature'] = $this->master_array[$user_details['best_feature']];
        $user_details['body_art'] = $this->master_array[$user_details['body_art']];
        $user_details['appearance'] = $this->master_array[$user_details['appearance']];
        $user_details['drink'] = $this->master_array[$user_details['drink']];
        $user_details['smoke'] = $this->master_array[$user_details['smoke']];
        $user_details['marital_status'] = $this->master_array[$user_details['marital_status']];
        $user_details['have_children'] = $this->master_array[$user_details['have_children']];
        $user_details['more_child'] = $this->master_array[$user_details['more_child']];
        $user_details['occupation'] = $this->master_array[$user_details['occupation']];
        $user_details['employment'] = $this->master_array[$user_details['employment']];
        $user_details['home_type'] = $this->master_array[$user_details['home_type']];
        $user_details['living_situation'] = $this->master_array[$user_details['living_situation']];
        $user_details['relocate'] = $this->master_array[$user_details['relocate']];
        $user_details['education'] = $this->master_array[$user_details['education']];
        $user_details['english_ability'] = $this->master_array[$user_details['english_ability']];
        $user_details['portugese_ability'] = $this->master_array[$user_details['portugese_ability']];
        $user_details['spanish_ability'] = $this->master_array[$user_details['spanish_ability']];
        $user_details['religion'] = $this->master_array[$user_details['religion']];
        $user_details['religious_values'] = $this->master_array[$user_details['religious_values']];
        $user_details['star_sign'] = $this->master_array[$user_details['star_sign']];
        
        if(!empty($user_details['have_pets']))
        $user_details['have_pets'] = implode(array_map(array($this, 'getFormLabel'),unserialize($user_details['have_pets'])?unserialize($user_details['have_pets']):array()),',');
        if(!empty($user_details['relationship']))
        $user_details['relationship'] = implode(array_map(array($this, 'getFormLabel'),unserialize($user_details['relationship'])?unserialize($user_details['relationship']):array()),',');
        $languages = implode(array_map(array($this, 'getLanguageName'),unserialize($user_details['languages'])?unserialize($user_details['languages']):array()),',');
        $user_details['languages'] = $languages;
        //dd($user_details);
        $match_details = $user->getMatchDetails($logged);
        //dd($match_details);
        $image_path = url('uploads').'/' . Auth::user()->user_id.'/';
        return view('users.profile')->with('match_details', $match_details)->with('user_details', $user_details)->with('image_path',$image_path);
    }
    
    
}
