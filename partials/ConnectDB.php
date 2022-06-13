<?php

    $url = "localhost";
    $user = "root";
    $pass = "gagliarde";
    $db = "ctvs";

    $mysqli = new mysqli($url, $user, $pass, $db);
    
    if($mysqli -> connect_errno){
        echo ("Errore: ".$mysqli -> connect_error);
    }
?>