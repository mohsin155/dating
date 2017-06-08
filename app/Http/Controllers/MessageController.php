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
    
    public function getInbox($folder_id=0){
        $logged_in = Auth::user()->user_id;
        $inputs = Input::all();
        if(isset($inputs['page'])&&!empty($inputs['page'])){
            $page_no = $inputs['page'];
        }else{
            $page_no = 0;
        }
        
        if(isset($inputs['favourites'])&&!empty($inputs['favourites'])){
            $favourites = $inputs['favourites'];
        }else{
            $favourites = 0;
        }
        $message = new Message;
        $messages = $message->getMessageList($page_no, $logged_in, $folder_id, $favourites);
        return view('message.list')->with(array('messages'=>$messages['list'],'total'=>$messages['total'], 'page_no'=>$page_no, 'favourites'=>$favourites,'folder_id'=>$folder_id));
    }
    
    public function postCreateFolder() {
        $logged_in = Auth::user()->user_id;
        $inputs = Input::all();
        \App\Models\MessageFolder::insert(array('user_id'=>$logged_in,'folder_name'=>$inputs['folder_name']));
        return redirect()->back();
    }
    
    public function getDetails($from_id,$folder_id=0) {
        $logged_in = Auth::user()->user_id;
        $message = new Message;
        $msg_details = $message->getConversation($logged_in, $from_id);
        //dd($msg_details);
        $user = new User();
        $user_details = $user->getUserSummary($from_id, $logged_in);
        //dd($user_details);
        return view('message.details')->with(array('msg_details'=>$msg_details,'user_details'=>$user_details,'folder_id'=>$folder_id));
    }
    
    public function postSendMessage(){
        $inputs = Input::all();
        Message::insert(array("subject"=>$inputs['subject'],"message"=>$inputs['message'],"from_id"=>Auth::user()->user_id,
            "to_id"=>$inputs["to"],"folder_id"=>$inputs['folder_id'],"created_at"=>date('Y-m-d h:i:s', strtotime('now'))));
        return redirect()->back();
    }
    
    public function postUpdateMessage(){
        $inputs = Input::all();
        if(isset($inputs['from_id']) && !empty($inputs['from_id'])){
            if($inputs['action']=='folder'){
                foreach($inputs['from_id'] as $from){
                    Message::whereRaw('(from_id='.$from.' and to_id='.Auth::user()->user_id.') or (to_id='.$from.' and from_id='.Auth::user()->user_id.')')->update(array('folder_id'=>$inputs['moveMailToFolder']));
                }
            }elseif($inputs['action']=='delete'){
                foreach($inputs['from_id'] as $from){
                    Message::whereRaw('(from_id='.$from.' and to_id='.Auth::user()->user_id.') or (to_id='.$from.' and from_id='.Auth::user()->user_id.')')->update(array('deleted_at'=>date('Y-m-d h:i:s', strtotime('now'))));
                }
            }
        }
        return redirect()->back();
    }
    
    public function getSent(){
        $logged_in = Auth::user()->user_id;
        $inputs = Input::all();
        if(isset($inputs['page'])&&!empty($inputs['page'])){
            $page_no = $inputs['page'];
        }else{
            $page_no = 0;
        }
        
        $message = new Message;
        $messages = $message->getSentList($page_no, $logged_in);
        return view('message.sent')->with(array('messages'=>$messages['list'],'total'=>$messages['total'], 'page_no'=>$page_no));
    }
    
    public function getTrash(){
        $logged_in = Auth::user()->user_id;
        $inputs = Input::all();
        if(isset($inputs['page'])&&!empty($inputs['page'])){
            $page_no = $inputs['page'];
        }else{
            $page_no = 0;
        }
        
        $message = new Message;
        $messages = $message->getTrashList($page_no, $logged_in);
        return view('message.trash')->with(array('messages'=>$messages['list'],'total'=>$messages['total'], 'page_no'=>$page_no));
    }
    public function getSentDetails($to_id) {
        $logged_in = Auth::user()->user_id;
        $message = new Message;
        $msg_details = $message->getSentConversation($logged_in, $to_id);
        //dd($msg_details);
        $user = new User();
        $user_details = $user->getUserSummary($to_id, $logged_in);
        //dd($user_details);
        return view('message.details')->with(array('msg_details'=>$msg_details,'user_details'=>$user_details,'folder_id'=>$folder_id));
    }
}