<?php


namespace Libraries\Models;

use Libraries\Database;
use PDO;

require_once('libraries/database.php');

abstract class CoreModel {

    protected $pdo;

    const TABLE_NAME = '';

    public function __construct()
    {
        $this->pdo = Database::getPdo();
    }

    public function findAll() : array {

        $result = $this->pdo->query("SELECT * FROM `user`");

        $users = $result->fetchAll();

        return $users;

        $sql = 'SELECT * FROM ' . static::TABLE_NAME . ' ORDER BY id DESC';
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, static::class);
        return $result;
    }

    public static function find($id) : int {
        $sql = 'SELECT * FROM ' . static::TABLE_NAME . ' WHERE id = :id';
 
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $pdoStatement->execute();

        $result = $pdoStatement->fetchObject(static::class);
        return $result;
    }

    public static function isConnected(){
        if(empty($_SESSION['email'])){
            $connected = false;
        } else {
            $connected = true;
        }
        return $connected;
    }

}