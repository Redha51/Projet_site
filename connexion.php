<?php
	try
		{
			$connexion = new PDO("mysql:host=localhost;port=3308;dbname=databaseprojet;charset=UTF8","root","");
			$connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e)
		{
			echo utf8_encode($e->getMessage());
		}
?>