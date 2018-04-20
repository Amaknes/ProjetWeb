<?php

session_start();

$IDParent= $_POST['IDPic'];
$Content = $_POST['Content'];
$email = $_SESSION['Email'];

	//Récupère l'ID de l'utilisateur
	$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');
	$requete = $bdd->prepare("SELECT IDUser FROM users WHERE Email = '$email'");
	$requete->execute();
	$ans = $requete->fetch();

	//Insère le commentaire
	$requete2 = $bdd->prepare("INSERT INTO comments (Content, CommentFlag, IDPicture, IDUser) VALUES('$Content' , 0, $IDParent, $ans[0])");
	$ret = $requete2->execute();
	
	//Requête pour redirection
	$MatchingEvent = $bdd->prepare("SELECT IDEvent FROM Pictures WHERE IDPicture = ?");
	$MatchingEvent->execute(array($IDParent));
	$link = $MatchingEvent->fetch();
	$MatchingEvent->closeCursor();

	//Redirection vers l'évènement
	echo ("<meta http-equiv='refresh' content='0;URL=EvenementUnique.php?id=");
	echo ($link[0]);
	echo ("'>");

?>