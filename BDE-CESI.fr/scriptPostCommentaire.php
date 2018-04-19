<?php
session_start();

$IDParent= $_POST['IDPic']; //A faire, utiliser un attribut readonly dans le form
$Content = $_POST['Content'];
$email = $_SESSION['Email'];

$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');
$requete = $bdd->prepare("SELECT IDUser FROM Users WHERE Email = ?");
		$requete->bindValue(1, $email, PDO::PARAM_STR);
		$requete->execute();
		$ans = $requete->fetch();
		
$requete2 = $bdd->prepare("INSERT INTO Comments (Content, CommentFlag, IDPicture, IDUser) VALUES( :Content, false, :Pic, :User))");
		$requete2->bindValue(':Content', $Content, PDO::PARAM_STR);
		$requete2->bindValue(':Pic', $IDParent, PDO::PARAM_INT);
		$requete2->bindValue(':User', $ans[0], PDO::PARAM_INT);
		$requete2->execute();


$requete3 = $bdd->prepare("SELECT IDEvent FROM Pictures WHERE IDPicture=?");
		$requete3->bindValue(1, $IDParent, PDO::PARAM_INT);
		$requete3->execute();
		$ans2 = $requete->fetch();
echo '<meta http-equiv="refresh" content="0;URL=EvenementListe.php">';

?>