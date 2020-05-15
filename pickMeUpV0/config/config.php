<?php

define("BASE_URL", $_SERVER['DOCUMENT_ROOT'].'/pickMeUpV0/');
define("LOG_FAJL", BASE_URL."/data/log.txt");
define("ENV_FAJL", BASE_URL."/config/.env");
define("ERROR_FILE", BASE_URL."/data/errors.txt");
define("SERVER", env("SERVER"));
define("DATABASE", env("DATABASE"));
define("USERNAME", env("USERNAME"));
define("PASSWORD", env("PASSWORD"));


function env($parametar){
    $file = file(BASE_URL . "config/.env");

    $vrednost = "";

    foreach($file as $red){
        $podaci = explode("=", trim($red));
        if($parametar == $podaci[0]){
            $vrednost = $podaci[1];
        }
    }
    return $vrednost;

}