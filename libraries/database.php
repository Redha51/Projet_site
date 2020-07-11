<?php


namespace Libraries;

use PDO;
use Exception;

class Database {

    public static function getPdo() : PDO {
        try
        {
            $pdo = new PDO("mysql:host=localhost;port=3306;dbname=databaseprojet;charset=UTF8","root","");
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (Exception $e)
        {
            echo utf8_encode($e->getMessage());
        }
        return $pdo;
    }
}