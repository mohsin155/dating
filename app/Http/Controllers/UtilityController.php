<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AppearanceMaster;

class UtilityController extends Controller {

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

}
