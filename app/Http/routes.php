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
    return Redirect::to('login');
});

Route::get('/login','UsersController@getLogin');
Route::post('/login','UsersController@postLogin');
Route::get('/signup','UsersController@getSignup');
Route::get('/embra','UsersController@getEmbra');
Route::post('/signup','UsersController@postSignup');
Route::get('/showemail','UsersController@getShowEmail');
Route::controllers([
    'users'=>'UsersController',
    'search'=>'SearchController',
    'html'=>'HtmlController',
    'payment'=>'PaymentController',
    'message'=>'MessageController'
]);


Route::get('/state/{id}','UsersController@getState');
Route::get('/city/{id}','UsersController@getCity');
Route::get('/updateapp', function()
{
    \Artisan::call('dump-autoload');
    echo 'dump-autoload complete';
});

Route::get('/chat','MessageController@chat');

Route::get('messages', 'MessageController@fetchMessages');
Route::post('messages', 'MessageController@sendMessage');


Route::get('/about-us',function(){
    return view('about-us');
});

Route::get('/safety-tips',function(){
    return view('safety-tips');
});

Route::get('/terms-condition',function(){
    return view('terms-conditions');
});

Route::get('/privacy-policy',function(){
    return view('privacy-policy');
});