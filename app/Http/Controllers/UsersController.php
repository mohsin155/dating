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

class UsersController extends UtilityController {

    public function __construct() {
        
    }
    
    public function getLogin(){
        if (Auth::check()) {
            return Redirect::to('users/account-settings');
        }else{
            return view('users.login');
        }
    }
    
    public function getSignup(){
        if (Auth::check()) {
            return Redirect::to('users/account-settings');
        }else{
            $countries = Country::get();
            return view('users.signup')->with('countries',$countries);
        }
    }
    
    
    public function postLogin(){
       
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
    
    public function postSignup(){
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
            $pwd=Hash::make($inputs['password']);
            
            $user = array('first_name'=>$inputs['first_name'],
                            'password'=>$pwd,
                            'email'=>$inputs['email'],
                            'gender'=>$inputs['gender'],
                            'age'=>$inputs['age'],
                            'country'=>$inputs['country'],
                            'state'=>$inputs['state'],
                            'city'=>$inputs['city']
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
    public function index()
    {
        $countries = DB::table("countries")->lists("name","id");
        return view('index',compact('countries'));
    }
    public function getState($country_id){
        $response = array();
        $states = State::where('country_id',$country_id)->get();
        if(!$states->isEmpty()){
            $response['status'] = 1;
            $response['states'] = $states;
        }else{
            $response['status'] = 0;
            $response['states'] = '';
        }
        return response()->json($response);
    }
    
    public function getCity($state_id){
        $response = array();
        $cities = City::where('state_id',$state_id)->get();
        if(!$cities->isEmpty()){
            $response['status'] = 1;
            $response['cities'] = $cities;
        }else{
            $response['status'] = 0;
            $response['cities'] = '';
        }
        return response()->json($response);
    }
    
    public function postFbsignup(){
        $inputs = Input::all();
        $rules = array(
            'email' => 'email|unique:users,email',
            'facebook_id' => 'unique:users,facebook_id'
        );
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            $response['status'] = 0;
            $response['errors'] = $validator->errors()->first();
        }else{
            $user = array('first_name'=>$inputs['first_name'],'email'=>isset($inputs['email'])?$inputs['email']:'','gender'=>$inputs['gender'],'facebook_id'=>$inputs['facebook_id']);
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
    
    public function postFblogin(){
        $inputs = Input::all();
        $rules = array(
            'facebook_id' => 'required|exists:users,facebook_id'
        );
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            $response['status'] = 0;
            $response['errors'] = $validator->errors()->first();
        }else{
            $user = User::where('facebook_id',$inputs['facebook_id'])->first();
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
    
    public function getProfileSettings(){
        return view('users.profile-settings');
    }
     public function getAccountSettings(){
        return view('users.account-settings');
    }
    
    public function getBilling(){
        return view('users.billing');
    }
    public function getNotification(){
        return view('users.notification');
    }
     public function getResetPassword(){
        return view('users.reset-password');
    }
    
     public function postAccountSettings(){
         $user = new User();
        $inputs = Input::all();
        
        $rules= array('email' => 'required|email|unique:users,email');
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
           
            return Redirect::to('users/account-settings')->with('errors', $validator->errors()->all())->withInput();
        }
        else
        {
            $affectedRows = User::where('user_id', '=', Auth::user()->user_id )->update(array('email' => $inputs['email']));
            
            $message = trans('messages.email_id changed');
                $status = 'success';
            
        }
        return Redirect::to('users/account-settings')->with($status, $message);
    }
    public function postResetPassword(){
        $user = new User();
        $inputs = Input::all();
        
        $rules= array('newpassword' => 'required|min:6|max:12|same:confirmpassword'
                       //'confirmpassword' => 'required|min:6|max:12'
                        );
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
           
            return Redirect::to('users/reset-password')->with('errors', $validator->errors()->all())->withInput();
        }
        else
        {
            $pwd=Hash::make($inputs['newpassword']);
            $affectedRows = User::where('user_id', '=', Auth::user()->user_id )->update(array('password' => $pwd));
            
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
        
    public function getEditProfile(){
        $form_layout = $this->getProfileForm();
        $countries = Country::get();
        $languages = Languages::get();
        return view('users.edit-profile')->with('countries',$countries)->with('languages',$languages)->with('form_layout',$form_layout);
    }
    
}