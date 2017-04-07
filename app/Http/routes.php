<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login','UsersController@getLogin');
Route::post('users/login','UsersController@postLogin');

Route::get('/signup','UsersController@getSignup');
Route::post('users/signup','UsersController@postSignup');

Route::get('/comingsoon','UsersController@getComingsoon');
Route::get('/state/{id}','UsersController@getState');
Route::get('/city/{id}','UsersController@getCity');