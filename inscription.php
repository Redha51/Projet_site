<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Page inscription</title>
    <link rel= 'stylesheet' href='css/bootstrap.min.css'>
    <link rel= 'stylesheet' href='css/style.css'>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
</head>
<body>

</body>
    <?php
        include('include/header.php');
        include('include/menu.php');

    ?>
    <form action="" method="POST">
        <p id="titleform">SIGN UP</p>
        <p class="textsignup"><input type="text" name="Firstname"placeholder="Firstname" required/></p>
		<p class="textsignup"><input type="text" name="Lastname"placeholder="Lastname" required/></p>
        <p class="textsignup"><input type="email" name="eMail"placeholder="Mail" required/></p>
        <p class="textsignup"><input type="password" name="Password"placeholder="Password" required/></p>
        <p class="textsignup"><input type="password" name="ConfirmPassword"placeholder="Confirm Password" required/></p>
        Birthday<p class="textsignup"><input type="date" name="Birthday"required/></p>
        <p class="submit"><input type="submit" name="Submit" value="Sign UP" /></p>
    </form>

    <?php
        require_once ("connexion.php");
        require_once ("fonctions.php");
        if(isset($_POST['Submit'])):
            $mail= uniqueMail($_connexion, $_POST['email']);
            if ($mail[0] == 1):
                echo '<p class="alert alert-danger" role="alert">Cette addresse email est déjà utilisée.</p>';
                elseif ($_POST['Password'] != ($_POST['ConfirmPassword'])):
                    echo '<p class="alert alert-danger" role="alert">Les mots de passe ne sont pas identique ! </p>';
                elseif(strlen($_POST['Password']) < 6 OR strtolower ($_POST['Password']) == $_POST['Password'] OR strtoupper ($_POST['Password']) == $_POST['Password']):
                    echo '<p class="alert alert-danger" role="alert">Le mot de passe doit avoir au moins 6 caratères, une majuscule,une minuscule !</p>';
            else:
                creationUser($connexion,$_POST['Firstname'], $_POST['Lastname'], $_POST['email'], $_POST['Password'], $_POST['Birthday']);
                echo '<p class="alert alert-success" role="alert">Vous avez bien été enregistré !</p>';
            endif;
        endif;

    ?>

<footer>    
</footer>
    <script src='js/function.js'></script>
</body>

</html>