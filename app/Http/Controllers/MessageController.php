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
use App\Models\UserInterest;
use App\Models\UserMatch;
use App\Models\UserImbra;
use App\Models\UserFavourite;
use App\Models\UserBlock;
use App\Models\ShowInterest;
use App\Models\UserSetting;
use App\Models\Message;

class MessageController extends UtilityController {

    public function __construct() {
        $this->middleware('auth');
    }
    
    public function getInbox(){
        $logged_in = Auth::user()->user_id;
        $inputs = Input::all();
        if(isset($inputs['page'])&&!empty($inputs['page'])){
            $page_no = $inputs['page'];
        }else{
            $page_no = 0;
        }
        $query = Message::select('messages.*','users.first_name','users.age',DB::raw('(select photo_name from user_photos where user_photos.user_id = messages.from_id limit 0,1) as photo'),
                DB::raw('(select name from countries as c where users.country=c.id) as country_name,(select name from states as s where users.state=s.id) as state_name,(select name from cities as c where users.city=c.id) as city_name'))
                ->join('users','users.user_id','=','messages.from_id')
                ->where(array('folder_id'=>0,'to_id'=>$logged_in));
        $total = $query->count();
        $messages = $query->skip($page_no*0)->limit(10)->get();
        return view('message.list')->with(array('messages'=>$messages,'total'=>$total));
    }
    
    public function postCreateFolder() {
        $logged_in = Auth::user()->user_id;
        $inputs = Input::all();
        \App\Models\MessageFolder::insert(array('user_id'=>$logged_in,'folder_name'=>$inputs['folder_name']));
        return redirect()->back();
    }
}