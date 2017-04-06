<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UtilityController;
use App\User;
class UsersController extends UtilityController {

    public function __construct() {
        
    }
    
    public function getLogin(){
        return view('users.login');
    }
    
    public function getSignup(){
        return view('users.signup');
    }
    
    public function postLogin(){
        echo "kjhk";exit;
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
            $user->processUser($inputs);
            return Redirect::to('users/login')->with('success', 'SignUp successfully!!!');
        }
    }
}