<?php

use Libraries\Models\UserModel;

session_start();

include('include/head.php');
include('include/header.php');
include_once('libraries/Models/UserModel.php');
$pageTitle = "Accueil";

$user = new UserModel;

var_dump($user->getEmail());

?>