<?php
session_start();
//Récupération des paramètres
$IDParent= $_POST['IDEvent']; //A faire, utiliser un attribut readonly dans le form
$URL = $_POST['URLImage'];
$email = $_SESSION['Email'];
//Requête pour retrouver l'utilisateur courant
$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');
$requete = $bdd->prepare("SELECT IDUser FROM Users WHERE Email = ?");
		$requete->bindValue(1, $email, PDO::PARAM_STR);
		$requete->execute();
		$ans = $requete->fetch();
//requête d'insertion d'image	
$requete2 = $bdd->prepare("INSERT INTO Pictures (URLImage, PicFlag, IDEvent, IDUser) VALUES (:Url, 0, :Event, :User)");
		$requete2->bindValue(':Url', $URL_FINAL , PDO::PARAM_STR);
		$requete2->bindValue(':Event', $IDParent, PDO::PARAM_INT);
		$requete2->bindValue(':User', $ans[0], PDO::PARAM_INT);
		$requete2->execute();
//redirection
echo '<meta http-equiv="refresh" content="0;URL=EvenementListe.php">'

?>