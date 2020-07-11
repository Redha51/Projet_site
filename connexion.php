<?php
session_start();
use Libraries\Models\UserModel;

$pageTitle = "Connexion";

include_once('include/head.php');
include_once('include/header.php');
include_once('libraries/Models/UserModel.php');
include_once('libraries/Utils/User.php');

$user = new UserModel();

if (isset($_POST['email']) && isset($_POST['password'])) {
    $password = $user->setPassword($_POST['password']);
    $email = $user->setEmail($_POST['email']);
    $user->connexion($email, $password);
}
var_dump($_SESSION);
if (!UserModel::isConnected()) {   
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

<?php
}
?>

</div>