<?php

function haveGoodRole(array $rolesCompatibles) :bool {
    if(!isset($_SESSION["Login"])){
        return false;
    }
    // Comparaison role par role
    $roleFound = false;
    $rolesSession = json_decode($_SESSION["Login"]["Roles"]);
    foreach ($rolesSession as $role){
        if(in_array($role, $rolesCompatibles)){
            $roleFound = true;
            break;
        }
    }
    return $roleFound;
}