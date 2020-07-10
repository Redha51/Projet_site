<?php

class Users {
    public $id;
    public $email;
    public $lastName;
    public $firstName;
    public $password;
    public $birthday;
    public $create_at;

    public function __construct($id, $email, $lastName, $firstName, $password, $birthday, $create_at)
    {
        $this->id = $id;
        $this->email = $email;
        $this->lastname = $lastName;
        $this->firstName = $firstName;
        $this->passowrd = $password;
        $this->birthday = $birthday;
        $this->create_at = $create_at;
    }

    public function inscription($email, $lastName, $firstName, $password, $birthday)

    public function verificationMail($id, $email) {
        if ($_POST['email'] )
    }

}