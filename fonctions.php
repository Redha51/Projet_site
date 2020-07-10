<?php

// Creation d'un user
function creationUser ($connexion, $firstname, $lastname, $email, $password, $birthday){
	$request='INSERT INTO chasseur VALUES(0,:user_firstname,:user_lastname, :user_email, sha2(:user_password,512),:user_birthday)';
	$result=$connexion->prepare($request);
	$result->execute(array('user_firstname'=>$firstname,
							'user_lastname'=>$lastname,
                            'user_email'=>$password,
                            'user_password'=>$password,
                            'user_birthday'=>$birthday));
}
                            
// Pour rendre un email unique
	function uniqueMail ($connexion, $email){
        $_REQUEST='SELECT COUNT (user_email) from user WHERE user_email=:uMail';
        $result=$connexion->prepare($_REQUEST);
	$result->execute(array(':uMail'=>$email ));
	$table=$result->fetch();
	return $table;
    }
?>