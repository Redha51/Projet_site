<?php
session_start();
var_dump($_SESSION);

use Libraries\Models\UserModel;

include('include/head.php');
include('include/header.php');
include_once('libraries/Models/UserModel.php');
$pageTitle = "Accueil";

$user = new UserModel;

?>