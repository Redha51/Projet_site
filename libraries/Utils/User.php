<?php

namespace Libraries\Utils;

abstract class User {

    public static function isConnected(){
        if(empty($_SESSION['connexion'])){
            $connected = false;
        } else {
            $connected = true;
            echo "Vous êtes connecté !";
        }
        return $connected;
    }

}