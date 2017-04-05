<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UtilityController;

class UsersController extends UtilityController {

    public function __construct() {
        
    }
    
    public function getLogin(){
        return view('users.login');
    }
}