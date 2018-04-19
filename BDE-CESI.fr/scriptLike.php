<?php
session_start();
$Idreq = $_GET['id'];
$nom = $_SESSION['Nom'];
$prenom = $_SESSION['Prenom'];
$email = $_SESSION['Email'];

$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');
$requete = $bdd->prepare("SELECT IDUser FROM Users WHERE LastName = ? AND FirstName = ? AND Email = ?");
		
		$requete->bindValue(1, $nom, PDO::PARAM_STR);
		$requete->bindValue(2, $prenom, PDO::PARAM_STR);
		$requete->bindValue(3, $email, PDO::PARAM_STR);
		
		$requete->execute();
		$ans = $requete->fetch();
		$requete->closeCursor();
		
		var_dump($ans);
		var_dump($Idreq);
		
$requete2 = $bdd->prepare("INSERT INTO Like (IDUser, IDPicture) VALUES( :IDUser, :IDPicture) ");
		$requete2->bindValue(':IDUser', $ans[0], PDO::PARAM_STR);
		$requete2->bindValue(':IDPicture', $Idreq, PDO::PARAM_STR);
		$requete2->execute();
		$requete2->closeCursor();
		
	//Requête pour redirection
	$requete3 = $bdd->prepare("SELECT IDEvent FROM Pictures WHERE IDPicture = ?");
	$requete3->execute(array($Idreq));
	$ans = $requete3->fetch();
	$requete3->closeCursor();
	var_dump($ans2[0]);
	echo ('<meta http-equiv="refresh" content="0" URL=EvenementUnique.php?id="'.$ans2[0].'">');
?>