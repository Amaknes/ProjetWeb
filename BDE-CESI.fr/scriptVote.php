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
		
$requete2 = $bdd->prepare("INSERT INTO Vote (IDUser, IDIdea) VALUES( :IDUser, :IDIdea) ");
		$requete2->bindValue(':IDUser', $ans[0], PDO::PARAM_STR);
		$requete2->bindValue(':IDIdea', $Idreq, PDO::PARAM_STR);
		$requete2->execute();
		
echo '<meta http-equiv="refresh" content="0;URL=BoiteAIdees.php">'; 		
?>