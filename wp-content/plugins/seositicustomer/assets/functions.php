<?php

namespace seositi;

function curPageURL() {
    $pageURL = 'http';     
    
    if ($_SERVER["HTTPS"] == "on") { 
        $pageURL .= "s"; 
    } 
     
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
     $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
     $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

function checkResult($temp){
    if($temp != null && count($temp) > 0){
        return true;
    }
    return false;
}

function getRoleUser(){
    if(is_user_logged_in()){
        $user = wp_get_current_user();
        return (array) $user->roles;
    }
    else{
        return false;
    }
}

