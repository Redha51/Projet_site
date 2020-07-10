<?php
session_start();
include_once('include/head.php');
include_once('include/header.php');
include_once('libraries/models/User.php');

$pageTitle = "Connexion";

$test = new Users();

$test->connexion($email, $pasword);
?>

<form method="post" action="connexion.php">
<fieldset>
<legend>Connexion</legend>
<p>
<label for="email">Mail :</label><input name="email" type="text" id="email" /><br />
<label for="password">Mot de Passe :</label><input type="password" name="password" id="password" />
</p>
</fieldset>
<p><input type="submit" value="Connexion" /></p></form>
<a href="./inscription.php">Pas encore inscrit ?</a>
    
</div>