<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Html;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\UtilityController;
use Illuminate\Http\Request;
use App\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class UsersController extends UtilityController {

    public function __construct() {
        
    }
    
    public function getLogin(){
        return view('users.login');
    }
    
    public function getSignup(){
        $countries = Country::get();
        return view('users.signup')->with('countries',$countries);
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
            return Redirect::to('users/login')->with('errors', $validator->errors()->all())->withInput();
        } else {
            if (Auth::attempt(['email' => $inputs['email'], 'password' => $inputs['password']], false)) {
                return Redirect::to('users/comingsoon')->with('success', 'login successfully!!!');
            } else {
                $message[] = trans('messages.login_fail');
                return Redirect::to('users/login')->with('errors', $message);
            }
        }
          
    }
    
    public function postSignup(){
        $user = new User();
        $inputs = Input::all();
        $rules = array(
            'firstname' => 'required',
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
            //dd($validator->errors()->all());exit;
            return Redirect::to('users/signup')->with('errors', $validator->errors()->all())->withInput();
        } else {
            $pwd=Hash::make($inputs['password']);
            
            $user = array('email'=>$inputs['email'],);
            
            User::insert($user);
            return Redirect::to('users/comingsoon')->with('success', 'SignUp successfully!!!');
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
}