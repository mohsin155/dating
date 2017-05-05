<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AppearanceMaster;
use App\Models\UserPhotos;
use Illuminate\Support\Facades\Auth;
use App\Models\Languages;

class UtilityController extends Controller {

    public $master_array = array();
    public $languages_array = array();
    public function __construct() {
        
    }

    public function getProfileForm() {
        $form_data = array();
        $appear = AppearanceMaster::get();
        foreach ($appear as $row) {
            $row_data = array('label' => $row->label, 'value' => $row->appearance_id);
            if (array_key_exists($row->appearance_type, $form_data)) {
                array_push($form_data[$row->appearance_type], $row_data);
            } else {
                if ($row->appearance_type == 18) {
                    for ($i = 1; $i <= 8; $i++) {
                        $form_data[$row->appearance_type][] = array('label' => $i, 'value' => $i);
                    }
                }elseif($row->appearance_type == 19 || $row->appearance_type == 20){
                   for ($i = 1; $i <= 18; $i++) {
                        $form_data[$row->appearance_type][] = array('label' => $i, 'value' => $i);
                    } 
                }
                $form_data[$row->appearance_type][] = $row_data;
                
            }
        }
        //dd($form_data);
        return $form_data;
    }

    public static function getUserImage(){
        $user_id = Auth::user()->user_id;
        $photo = UserPhotos::where('user_id',$user_id)->orderBy('created_at','asc')->first();
        if(!is_null($photo)){
            $image = url('uploads').'/'.$user_id.'/'.$photo->photo_name;
        }else{
            $image = url('image/nophoto_Male.gif');
        }
        return $image;
    }
    
    public function getFormLabel($value){
        if(isset($this->master_array[$value])){
            return $this->master_array[$value];
        }else{
            return $value;
        }
    }
    
    public function setMasterArray(){
        $appear = AppearanceMaster::get();
        foreach($appear as $row){
            $appear_arr[$row->appearance_id] = $row->label;
        }
        $appear_arr['any'] = 'Any';
        $appear_arr['0'] = 'No answer';
        $appear_arr[''] = 'No answer';
        $this->master_array = $appear_arr;
    }
    
    public function setLanguagesArray(){
        $language = Languages::get();
        foreach($language as $row){
            $language_arr[$row->id] = $row->name;
        }
        $language_arr[''] = 'No answer';
        $this->languages_array = $language_arr;
    }
    
    public function getLanguageName($value){
        if(isset($this->languages_array[$value])){
            return $this->languages_array[$value];
        }else{
            return $value;
        }
    }
}
