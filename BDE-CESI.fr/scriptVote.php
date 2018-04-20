<?php

	session_start();
	$IDIdea = $_GET['idea'];
	$email = $_SESSION['Email'];

	//Requête récupération de l'utilisateur courant

	$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');
	$requete = $bdd->prepare("SELECT IDUser FROM Users WHERE Email = ?");

		$requete->bindValue(1, $email, PDO::PARAM_STR);
		$requete->execute();
		$ans = $requete->fetch();
	
	//Requête insertion du vote	
	$requete2 = $bdd->prepare("INSERT INTO Vote (IDUser, IDIdea) VALUES( :IDUser, :IDIdea) ");
		$requete2->bindValue(':IDUser', $ans[0], PDO::PARAM_STR);
		$requete2->bindValue(':IDIdea', $IDIdea, PDO::PARAM_STR);
		$requete2->execute();

		echo '<meta http-equiv="refresh" content="0;URL=BoiteAIdees.php">'; 		
?>