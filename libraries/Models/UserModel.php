<?php

namespace Libraries\Models;


use PDO;
use Libraries\Models\CoreModel;

require_once('libraries/models/CoreModel.php');

class UserModel extends CoreModel {

    protected $id;
    protected $email;
    protected $lastName;
    protected $firstName;
    protected $password;
    protected $birthday;
    protected $create_at;

    const TABLE_NAME = 'user';

    // Creation d'un user
    public function register ($connexion, $firstname, $lastname, $email, $password, $birthday) : void {
        $request='INSERT INTO chasseur VALUES(0,:user_firstname,:user_lastname, :user_email, sha2(:user_password,512),:user_birthday)';
        $result=$connexion->prepare($request);
        $result->execute(array('user_firstname'=>$firstname,
                                'user_lastname'=>$lastname,
                                'user_email'=>$email,
                                'user_password'=>$password,
                                'user_birthday'=>$birthday));
    }
    
    // Pour rendre un email unique
    public function checkMail ($email) : array {
    $query="SELECT COUNT (user_email) from user WHERE user_email='$email'";
    $result=$this->pdo->prepare($query);
    $result->execute(array(':uMail'=>$email ));
    $table=$result->fetch();
    return $table;
    }

    
    public function connexion ($email, $password) : void {
        if (isset($_POST['email'])){
            $query = "SELECT * FROM `user` WHERE user_email='$email' and user_password='$password'";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(':password', $this->getPassword(), PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result){
                $_SESSION['connexion'] = $result;
                echo 'Vous êtes connecté !';
            }else{
                echo("Connexion impossible, veuillez vérifier vos identifiants");
            }
        }
    }


    /**
     * Get the value of email
    */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;
        return $this->email;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;
        return $this->password;
    }


    /**
     * Get the value of firstName
     */ 
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */ 
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of lastName
     */ 
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */ 
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }
}
