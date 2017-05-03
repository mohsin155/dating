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
use App\Models\Tags;

class SearchController extends UtilityController {

    public function __construct() {
        $this->middleware('auth');
    }
    public function getAdvanceSearch() {
        try {
            $form_layout = $this->getProfileForm();
            $countries = Country::get();
            $languages = Languages::get();
        } catch (\Exception $e) {
            echo $e;
            exit;
        }
        return view('search.advanced-search')->with('countries', $countries)->with('languages', $languages)->with('form_layout', $form_layout);
    }

    public function getKeywords() {
        try{
            $form_layout = $this->getProfileForm();
            $countries = Country::get();
            $languages = Languages::get();
        } catch (Exception $ex) {

        }
        return view('search.keywords')->with('countries', $countries)->with('languages', $languages)->with('form_layout', $form_layout);
    }
    
    public function getCupidTags() {
        try{
            $countries = Country::get();
            $tags = Tags::get();
        } catch (Exception $ex) {

        }
        return view('search.cupid-tags')->with('countries', $countries)->with('tags',$tags);
    }
}
