<?php 
session_start();
$activity = $_POST['Activity'];
$nom = $_SESSION['Nom'];
$prenom = $_SESSION['Prenom'];
$email = $_SESSION['Email'];

		//Récupération IDUser
		$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');
		$requete = $bdd->prepare("SELECT IDUser FROM Users WHERE LastName = ? AND FirstName = ? AND Email = ?");
		$requete->bindValue(1, $nom, PDO::PARAM_STR);
		$requete->bindValue(2, $prenom, PDO::PARAM_STR);
		$requete->bindValue(3, $email, PDO::PARAM_STR);
		$requete->execute();
		$ans = $requete->fetch();
		
		//Insertion de l'événement
		$requete2 = $bdd->prepare("INSERT INTO Ideas (Activity, IdeaFlag, IDUser) VALUES( :Activity, false, :IDUser) ");
		$requete2->bindValue(':Activity', $activity, PDO::PARAM_STR);
		$requete2->bindValue(':IDUser', $ans[0], PDO::PARAM_STR);
		$requete2->execute();
		
		echo '<meta http-equiv="refresh" content="0;URL=BoiteAIdees.php">';
?>