<?php
session_start();
$IDParent= $_POST['IDEvent']; //A faire, utiliser un attribut readonly dans le form
$URL = $_POST['URLImage'];
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
		
		
$requete2 = $bdd->prepare("INSERT INTO Pictures (URLImage, PicFlag, IDEvent, IDUser) VALUES( :Url, false, :Event, :User))");
		$requete->bindValue(':Url', $URL, PDO::PARAM_STR);
		$requete->bindValue(':Event', $IDParent, PDO::PARAM_INT);
		$requete->bindValue(':User', $ans[0], PDO::PARAM_INT);
		$requete->execute();
		

echo '<meta http-equiv="refresh" content="0;URL=EvenementUnique.php?'.$IDParent.'>"

?>