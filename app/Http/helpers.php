<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function humanTiming($time) {

    $time = time() - strtotime($time); // to get the time since that moment
    $time = ($time < 1) ? 1 : $time;
    $tokens = array(
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit)
            continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
    }
}

function getLength($value, $format) {
    if ($format == 1) {
        return $value;
    } elseif ($format == 2) {
        $inches = $value / 2.54;
        $feet = intval($inches / 12);
        $inches = $inches % 12;
        return sprintf('%d\' %d" (%d cm)', $feet, $inches,$value);
    }elseif($format==3){
        $inches = $value / 2.54;
        $feet = intval($inches / 12);
        $inches = $inches % 12;
        return sprintf('%d\' %d"', $feet, $inches);
    }elseif($format==4){
        $inches = $value / 2.54;
        $feet = intval($inches / 12);
        $inches = $inches % 12;
        return sprintf('%d\' %d" (%d cm)', $feet, $inches,$value);
    }
}

function getWeight($value, $format) {
    if ($format == 1) {
        return $value;
    } elseif ($format == 2) {
        $stone_val = $value / 6.35029318;
        $stone = (int) $stone_val;  // 5
        $frac  = $stone_val - (int) $stone_val;  // .7
        $pound = round($frac*14);
        //$inches = $inches % 12;
        return sprintf('%dst %dlb (%d kg)', $stone, $pound,$value);
    }elseif($format==3){
        $stone_val = $value / 6.35029318;
        $stone = (int) $stone_val;  // 5
        $frac  = $stone_val - (int) $stone_val;  // .7
        $pound = round($frac*14);
        //$inches = $inches % 12;
        return sprintf('%dst %dlb', $stone, $pound);
    }elseif($format==4){
        $stone_val = $value / 6.35029318;
        $stone = (int) $stone_val;  // 5
        $frac  = $stone_val - (int) $stone_val;  // .7
        $pound = round($frac*14);
        //$inches = $inches % 12;
        return sprintf('%dst %dlb (%d kg)', $stone, $pound,$value);
    }
}

function cm2feet($cm) {
    $inches = $cm / 2.54;
    $feet = intval($inches / 12);
    $inches = $inches % 12;
    return sprintf('%d\' %d "', $feet, $inches);
}


function getFolderList(){
    $logged_in = \Illuminate\Support\Facades\Auth::user()->user_id;
    $list = \App\Models\MessageFolder::where('user_id',$logged_in)->get();
    return $list;
}

function getInboxTotal(){
    $logged_in = \Illuminate\Support\Facades\Auth::user()->user_id;
    $total = \App\Models\Message::where('to_id',$logged_in)->count();
    return $total;
}