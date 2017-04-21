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

class UsersController extends UtilityController {

    public function __construct() {
        $this->middleware('auth', ['except' => ['getSignup', 'postSignup', 'getLogin', 'postLogin','getState','getCity','postFbsignup','postFblogin']]);
    }

    public function getLogin() {
        if (Auth::check()) {
            return Redirect::to('users/account-settings');
        } else {
            return view('users.login');
        }
    }

    public function getSignup() {
        if (Auth::check()) {
            return Redirect::to('users/account-settings');
        } else {
            $countries = Country::get();
            return view('users.signup')->with('countries', $countries);
        }
    }

    public function postLogin() {

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
                return Redirect::to('users/account-settings')->with('success', 'login successfully!!!');
            } else {
                $message[] = trans('messages.login_fail');
                return Redirect::to('login')->with('errors', $message);
            }
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
                return Redirect::to('users/account-settings')->with('success', 'login successfully!!!');
            } else {
                $message[] = trans('messages.login_fail');
                return Redirect::to('login')->with('errors', $message);
            }
            return Redirect::to('users/account-settings')->with('success', 'SignUp successfully!!!');
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
    
     public function postNotification(){
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
        }
        else
        {
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
             
             $email_value= serialize($email_notification);
            
              $affectedRows = User::where('user_id', '=', Auth::user()->user_id )->update(array('email_notifications' => $email_value));
            $message = trans('messages.notification updated');
                $status = 'success';
        }
        return Redirect::to('users/notification')->with($status, $message);
    }
        
   


    public function getEditProfile() {
        $form_layout = $this->getProfileForm();
        $countries = Country::get();
        $languages = Languages::get();
        return view('users.edit-profile')->with('countries', $countries)->with('languages', $languages)->with('form_layout', $form_layout);
    }

    public function getEditMatch() {

        $form_layout = $this->getProfileForm();
        $countries = Country::get();
        $languages = Languages::get();
        return view('users.edit-match')->with('countries', $countries)->with('languages', $languages)->with('form_layout', $form_layout);
    }

    public function getEditInterest() {
        
        return view('users.edit-interest');
    }

    public function getEditPersonality() {
        $user_per = UserPersonality::where('user_id',Auth::user()->user_id)->first();
        return view('users.edit-personality')->with('user_per',$user_per);
    }

    public function getEditTags() {
        $tags = UserTags::where('user_id',Auth::user()->user_id)->get();
        return view('users.edit-tags')->with('tags',$tags);
    }

    public function getVerifyProfile() {
        return view('users.verify-profile');
    }

    public function getImbra() {
        return view('users.imbra');
    }

    public function getEditPhotos() {
        $photos = UserPhotos::where('user_id',Auth::user()->user_id)->get();
        $image_path = public_path().'/uploads/'.Auth::user()->user_id;
        return view('users.edit-photos')->with('photos',$photos)->with('image_path',$image_path);
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
        return Redirect::to('users/edit-personality')->with('success',trans('messages.personality_updated'));
    }
    
    
    public function postEditProfile(){
            $user = new UserProfile();
        $inputs = Input::all();
       $rules = array(
            'first_name' =>'required',
                     'gender' =>'required',
                    'dob_month' =>'required',
                    'dob_year' =>'required',
                    'country' =>'required',
                    'state' =>'required',
                    'city' =>'required',
                    'hair_color' =>'required',
                    'hair_length' =>'required',
                    'hair_type' =>'required',
                    'eye_color' =>'required',
                    'eye_wear' =>'required',
                    'height' =>'required',
                    'weight' =>'required',
                    'body_type' =>'required',
                    'ethnicity' =>'required',
                    'facial_hair' =>'required',
                    'best_feature' =>'required',
                    'body_art' =>'required',
                    'appearance' =>'required',
                    'drink' =>'required',
                    'smoke' =>'required',
                    'marital_status' =>'required',
                    'have_children'  =>'required',
                    'no_children' =>'required',
                    'oldest_child' =>'required',
                    'youngest_child'=>'required',
                    'more_child' =>'required',
                    'have_pets' =>'required',
                    'occupation' =>'required',
                    'employment' =>'required',
                    'income' =>'required',
                    'home_type' =>'required',
                    'living_situation' =>'required',
                    'relocate' =>'required',
                    'relationship' =>'required',
                    'nationality' =>'required',
                    'education'  =>'required',
                    'languages' =>'required',
                    'english_ability' =>'required',
                    'portugese_ability'  =>'required',
                    'spanish_ability'   =>'required',
                    'religion'=>'required',
                    'religious_values' =>'required',
                    'star_sign' =>'required',
                    'profile_heading' =>'required',
                    'about_yourself' =>'required',
                    'partner' =>'required'
           );
           
       $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
           
            return Redirect::to('users/edit-profile')->with('errors', $validator->errors()->all())->withInput();
        }
        else
        {
             $profile_data = array(
                 'user_id'=>Auth::user()->user_id,
                 'first_name' =>$inputs['first_name'],
                     'gender' =>$inputs['gender'],
                    'dob_month' =>$inputs['dob_month'],
                    'dob_year' =>$inputs['dob_year'],
                    'country' =>$inputs['country'],
                    'state' =>$inputs['state'],
                    'city' =>$inputs['city'],
                    'hair_color' =>$inputs['hair_color'],
                    'hair_length' =>$inputs['hair_length'],
                    'hair_type' =>$inputs['hair_type'],
                    'eye_color' =>$inputs['eye_color'],
                    'eye_wear' =>$inputs['eye_wear'],
                    'height' =>$inputs['height'],
                    'weight' =>$inputs['weight'],
                    'body_type' =>$inputs['body_type'],
                    'ethnicity' =>$inputs['ethnicity'],
                    'facial_hair' =>$inputs['facial_hair'],
                    'best_feature' =>$inputs['best_feature'],
                    'body_art' =>$inputs['body_art'],
                    'appearance' =>$inputs['appearance'],
                    'drink' =>$inputs['drink'],
                    'smoke' =>$inputs['smoke'],
                    'marital_status' =>$inputs['marital_status'],
                    'have_children'  =>$inputs['have_children'],
                    'no_children' =>$inputs['no_children'],
                    'oldest_child' =>$inputs['oldest_child'],
                    'youngest_child'=>$inputs['youngest_child'],
                    'more_child' =>$inputs['more_child'],
                    'have_pets' =>$inputs['have_pets'],
                    'occupation' =>$inputs['occupation'],
                    'employment' =>$inputs['employment'],
                    'income' =>$inputs['income'],
                    'home_type' =>$inputs['home_type'],
                    'living_situation' =>$inputs['living_situation'],
                    'relocate' =>$inputs['relocate'],
                    'relationship' =>$inputs['relationship'],
                    'nationality' =>$inputs['nationality'],
                    'education'  =>$inputs['education'],
                    'languages' =>$inputs['languages'],
                    'english_ability' =>$inputs['english_ability'],
                    'portugese_ability'  =>$inputs['portugese_ability'],
                    'spanish_ability'   =>$inputs['spanish_ability'],
                    'religion'=>$inputs['religion'],
                    'religious_values' =>$inputs[ 'religious_values'],
                    'star_sign' =>$inputs['star_sign'],
                    'profile_heading' =>$inputs['profile_heading'],
                    'about_yourself' =>$inputs['about_yourself'],
                    'partner' =>$inputs['partner']
                    
                    
            
           );
             
            
            
              $affectedRows = UserProfile::insert($profile_data);
             
            $message = trans('messages.profile updated');
                $status = 'success';
        }
        return Redirect::to('users/edit-profile')->with($status, $message);
    
    }

    public function getTags(){
        $inputs = Input::all();
        $tags = Tags::select(DB::raw('tag_id as id,name as label,name as value'))->where('name','like','%'.$inputs["term"].'%')->get();
        return response()->json($tags);
    }
    
    public function getAddTags(){
        $inputs = Input::all();
        $id = UserTags::insertGetId(array('tag'=>$inputs['keyword'],'user_id'=>Auth::user()->user_id));
        return response()->json(array('tag_id'=>$id));
    }
    
    public function getDeleteTags(){
        $inputs = Input::all();
        $id = UserTags::where(array('user_tag_id'=>$inputs['tag_id'],'user_id'=>Auth::user()->user_id))->delete();
        return;
    }
    
    public function postEditPhotos() {
        $inputs = Input::file('uploadForm');
        if(!empty($inputs)){
            $user_id = Auth::user()->user_id;
            $destinationPath = public_path().'/uploads/'.Auth::user()->user_id;
            $fileName = Input::file('uploadForm')->getClientOriginalName();
            $extension = Input::file('uploadForm')->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            Input::file('uploadForm')->move($destinationPath, $fileName);
            UserPhotos::insert(array('user_id'=>$user_id,'photo_name'=>$fileName));
        }
        return Redirect::to('users/edit-photos');
    }
}
