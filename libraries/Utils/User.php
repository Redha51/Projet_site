<?php

namespace Libraries\Utils;

abstract class User {

    public static function isConnected(){
        if(empty($_SESSION['email'])){
            $connected = false;
        } else {
            $connected = true;
        }
        return $connected;
    }

}