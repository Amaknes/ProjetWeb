<?php
session_start();

	//Récupération des paramètres
	$IDParent= $_POST['IDEvent'];
	$URL = $_POST['URLImage'];
	$email = $_SESSION['Email'];

	//Requête pour retrouver l'utilisateur courant
	$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');
	$requete = $bdd->prepare("SELECT IDUser FROM Users WHERE Email = ?");
		$requete->bindValue(1, $email, PDO::PARAM_STR);
		$requete->execute();
		$ans = $requete->fetch();
		
	//Requête d'insertion d'image	
	$requete2 = $bdd->prepare("INSERT INTO Pictures (URLImage, PicFlag, IDEvent, IDUser) VALUES (:Url, 0, :Event, :User)");
		$requete2->bindValue(':Url', $URL , PDO::PARAM_STR);
		$requete2->bindValue(':Event', $IDParent, PDO::PARAM_INT);
		$requete2->bindValue(':User', $ans[0], PDO::PARAM_INT);
		$requete2->execute();

	//Récupération de l'ID de l'image
	$GetProposalId = $bdd->prepare("SELECT IDPicture FROM Pictures WHERE URLImage = ?");
		$GetProposalId->execute(array($URL));
		$ans2 = $GetProposalId->fetch();
		
	//Ajout du like de l'utilisateur
		$InsertVote = $bdd->prepare("INSERT INTO `Like` (IDUser, IDPicture) VALUES(? , ?) ");
		$InsertVote->execute(array($ans[0],$ans2[0]));
		
	//Redirection vers l'évènement
	echo ("<meta http-equiv='refresh' content='0;URL=EvenementUnique.php?id=");
	echo ($IDParent);
	echo ("'>");


?>