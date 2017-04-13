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

class UsersController extends UtilityController {

    public function __construct() {
        
    }
    
    public function getLogin(){
        if (Auth::check()) {
            return Redirect::to('comingsoon');
        }else{
            return view('users.login');
        }
    }
    
    public function getSignup(){
        if (Auth::check()) {
            return Redirect::to('comingsoon');
        }else{
            $countries = Country::get();
            return view('users.signup')->with('countries',$countries);
        }
    }
    
    public function getComingsoon(){
        return view('users.comingsoon');
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
            return Redirect::to('login')->with('errors', $validator->errors()->all())->withInput();
        } else {
            if (Auth::attempt(['email' => $inputs['email'], 'password' => $inputs['password']], false)) {
                return Redirect::to('comingsoon')->with('success', 'login successfully!!!');
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
                return Redirect::to('/comingsoon')->with('success', 'login successfully!!!');
            } else {
                $message[] = trans('messages.login_fail');
                return Redirect::to('login')->with('errors', $message);
            }
            return Redirect::to('/comingsoon')->with('success', 'SignUp successfully!!!');
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
}