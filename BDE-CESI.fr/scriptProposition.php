<?php 
session_start();
$activity = $_POST['Activity'];
$nom = $_SESSION['Nom'];
$prenom = $_SESSION['Prenom'];
$email = $_SESSION['Email'];

		//Récupération IDUser
		$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');
		$GetUserId = $bdd->prepare("SELECT IDUser FROM Users WHERE LastName = ? AND FirstName = ? AND Email = ?");
		$GetUserId->bindValue(1, $nom, PDO::PARAM_STR);
		$GetUserId->bindValue(2, $prenom, PDO::PARAM_STR);
		$GetUserId->bindValue(3, $email, PDO::PARAM_STR);
		$GetUserId->execute();
		$ans = $GetUserId->fetch();
		
		//Insertion de l'idée
		$InsertIdea = $bdd->prepare("INSERT INTO Ideas (Activity, IdeaFlag, IDUser) VALUES( :Activity, false, :IDUser) ");
		$InsertIdea->bindValue(':Activity', $activity, PDO::PARAM_STR);
		$InsertIdea->bindValue(':IDUser', $ans[0], PDO::PARAM_STR);
		$InsertIdea->execute();
		
		//Récupération de l'ID de la proposition
		$GetProposalId = $bdd->prepare("SELECT IDIdea FROM Ideas WHERE Activity = ?");
		$GetProposalId->execute(array($activity));
		$ans2 = $GetProposalId->fetch();
		
		//Ajout du vote de l'utilisateur
		$InsertVote = $bdd->prepare("INSERT INTO Vote (IDUser, IDIdea) VALUES(? , ?) ");
		$InsertVote->execute(array($ans[0],$ans2[0]));
		
		echo '<meta http-equiv="refresh" content="0;URL=BoiteAIdees.php">';
?>