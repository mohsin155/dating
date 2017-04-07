<?php

namespace App\Http\Controllers;
use Illuminate\Html;
use App\Http\Requests;
use App\Http\Controllers\UtilityController;
use Illuminate\Http\Request;
use App\User;
use DB;
class UsersController extends UtilityController {

    public function __construct() {
        
    }
    
    public function getLogin(){
        return view('users.login');
    }
    
    public function getSignup(){
        return view('users.signup');
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
                return Redirect::to('users/login')->with('success', 'login successfully!!!');
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
            'age' => 'required'
        );
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            //dd($validator->errors()->all());exit;
            return Redirect::to('users/signup')->with('errors', $validator->errors()->all())->withInput();
        } else {
            $user = array('email'=>$inputs['email'],);
            User::insert($user);
            return Redirect::to('users/login')->with('success', 'SignUp successfully!!!');
        }
    }
    
    public function index()
    {
        $countries = DB::table("countries")->lists("name","id");
        return view('index',compact('countries'));
    }
    public function getStateList(Request $request)
    {
        $states = DB::table("states")
                    ->where("country_id",$request->country_id)
                    ->lists("name","id");
        return response()->json($states);
    }
    public function getCityList(Request $request)
    {
        $cities = DB::table("cities")
                    ->where("state_id",$request->state_id)
                    ->lists("name","id");
        return response()->json($cities);
    }
     
}