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


/** AGGIORNA OGGETTO **/
function updateTo($type, \seositi\MyObject $o){
    $result = null;
    
    switch($type){
        case OBJ_AMM:
            $result = new Amministratore();
            break;
        case OBJ_CLI:
            $result = new Cliente();
            break;
        case OBJ_COM:
            $result = new Commerciale();
            break;
        case OBJ_REP:
            $result = new Report();
            break;
        case OBJ_RIN:
            $result = new Rinnovo();
            break;
        case OBJ_SER:
            $result = new Servizio();
            break;
        case OBJ_UG:
            $result = new UtenteGestionale();
            break;
    }    
    $result = $o;
    return $result;
}

//restituisco l'oggetto richiesto
function updateToAmministratore(\seositi\MyObject $o): \seositi\Amministratore{
    return updateTo(OBJ_AMM, $o);
}
function updateToCliente(\seositi\MyObject $o): \seositi\Cliente{
    return updateTo(OBJ_CLI, $o);
}
function updateToCommerciale(\seositi\MyObject $o): seositi\Commerciale{
    return updateTo(OBJ_COM, $o);
}
function updateToReport(\seositi\MyObject $o): seositi\Report{
    return updateTo(OBJ_REP, $o);
}
function updateToRinnovo(\seositi\MyObject $o): \seositi\Rinnovo{
    return updateTo(OBJ_RIN, $o);
}
function updateToServizio(\seositi\MyObject $o): seositi\Servizio{
    return updateTo(OBJ_SER, $o);
}
function updateToUG(\seositi\MyObject $o): \seositi\UtenteGestionale{
    return updateTo(OBJ_UG, $o);
}
