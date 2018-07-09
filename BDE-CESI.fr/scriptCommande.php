<?php

	session_start();
	
	
	$client = $_SESSION['Email'];
	
	$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');
	
		//$requete = $bdd->prepare("SELECT IDUser FROM Users WHERE Email = ?");
		$requete = $bdd->prepare("UPDATE orders,users SET orders.Status = '1' WHERE orders.IDUser = users.IDUser AND users.Email = ?");
		$requete->execute(array($client));
		$idclient = $requete->fetch();
	
		/*$requete2 = $bdd->prepare("UPDATE orders SET orders.Status = '1' WHERE orders.IDUser = users.IDUser AND users.Email = ?");
		$requete2->execute(array($idclient));*/

		

	
?>