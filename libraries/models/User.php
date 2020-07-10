<?php

require_once('libraries/models/Model.php');

class Users extends Model {
    protected $id;
    protected $email;
    protected $lastName;
    protected $firstName;
    protected $password;
    protected $birthday;
    protected $create_at;


    // Creation d'un user
    function register ($connexion, $firstname, $lastname, $email, $password, $birthday) : void {
        $request='INSERT INTO chasseur VALUES(0,:user_firstname,:user_lastname, :user_email, sha2(:user_password,512),:user_birthday)';
        $result=$connexion->prepare($request);
        $result->execute(array('user_firstname'=>$firstname,
                                'user_lastname'=>$lastname,
                                'user_email'=>$email,
                                'user_password'=>$password,
                                'user_birthday'=>$birthday));
    }
                                
    // Pour rendre un email unique
    function checkMail ($connexion, $email) : array {
        $_REQUEST='SELECT COUNT (user_email) from user WHERE user_email=:uMail';
        $result=$connexion->prepare($_REQUEST);
    $result->execute(array(':uMail'=>$email ));
    $table=$result->fetch();
    return $table;
    }

    function connexion ($email, $password) : void {
        if (isset($_POST['email'])){
            $email = stripslashes($_REQUEST['email']);
            $email = mysqli_real_escape_string($this->pdo, $email);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($this->pdo, $password);
            $query = "SELECT * FROM `users` WHERE email='$email' and password='$password'";
            $result = mysqli_query($this->pdo,$query) or die(mysql_error($this->pdo));
            $rows = mysqli_num_rows($result);
            if($rows==1){
                $_SESSION['email'] = $email;
                header("Location: index.php");
            }else{
                $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
            }
        }
    }
}
