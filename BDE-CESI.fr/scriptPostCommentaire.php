<?php

session_start();

$IDParent= $_POST['IDPic']; //A faire, utiliser un attribut readonly dans le form
$Content = $_POST['Content'];
$email = $_SESSION['Email'];

$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');
$requete = $bdd->prepare("SELECT IDUser FROM users WHERE Email = '$email'");
$requete->execute();
$ans = $requete->fetch();

$requete2 = $bdd->prepare("INSERT INTO comments (Content, CommentFlag, IDPicture, IDUser) VALUES('$Content' , 0, $IDParent, $ans[0])");
$ret = $requete2->execute();

echo '<meta http-equiv="refresh" content="0;URL=EvenementListe.php">';
?>