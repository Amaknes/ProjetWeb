<?php
session_start();

$IDParent= $_POST['IDEvent']; //A faire, utiliser un attribut readonly dans le form
$Content = $_POST['Content'];
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
		
$requete2 = $bdd->prepare("INSERT INTO Comments (Content, CommentFlag, IDPicture, IDUser) VALUES( :Content, false, :Pic, :User))");
		$requete2->bindValue(':Content', $Content, PDO::PARAM_STR);
		$requete2->bindValue(':Pic', $IDParent, PDO::PARAM_INT);
		$requete2->bindValue(':User', $ans[0], PDO::PARAM_INT);
		$requete2->execute();


$requete3 = $bdd->prepare("SELECT IDEvent FROM Pictures WHERE IDPicture=?");
		$requete3->bindValue(1, $ans[0], PDO::PARAM_INT);
		$requete3->execute();
		$ans2 = $requete->fetch();
echo '<meta http-equiv="refresh" content="0;URL=EvenementUnique.php?'.$ans2[0].'>"

?>