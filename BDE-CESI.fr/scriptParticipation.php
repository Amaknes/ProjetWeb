<?php

	session_start();
	$IDEvent = $_GET['IDEvent'];
	$email = $_SESSION['Email'];

	//Requête récupération de l'utilisateur courant / User's identification

	$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');
	$requete = $bdd->prepare("SELECT IDUser FROM Users WHERE Email = ?");

		$requete->bindValue(1, $email, PDO::PARAM_STR);
		$requete->execute();
		$ans = $requete->fetch();
	
	//Requête insertion de la participation / Participation insertion	
	$requete2 = $bdd->prepare("INSERT INTO Participate (IDUser, IDEvent) VALUES( :IDUser, :IDEvent) ");
		$requete2->bindValue(':IDUser', $ans[0], PDO::PARAM_STR);
		$requete2->bindValue(':IDEvent', $IDEvent, PDO::PARAM_STR);
		$requete2->execute();

		echo '<meta http-equiv="refresh" content="0;URL=BoiteAIdees.php">'; 		
?>