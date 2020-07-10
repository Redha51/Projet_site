<?php

class Database {
   
    public function getPdo() {
        try
        {
            $pdo = new PDO("mysql:host=localhost;port=3308;dbname=databaseprojet;charset=UTF8","root","");
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e)
        {
            echo utf8_encode($e->getMessage());
        }
    }
}