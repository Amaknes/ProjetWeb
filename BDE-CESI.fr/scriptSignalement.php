<?php
$Typereq = $_GET['type'];
$Idreq = $_GET['id'];
$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');

switch($Typereq){
	case "Pic" :
	$requete = $bdd->prepare("UPDATE Pictures SET PicFlag = 1 WHERE IDPicture = ?");
	$requete->bindValue(1, $Idreq, PDO::PARAM_INT);
	$requete->execute();
	
	//Requête pour redirection
	$requete2 = $bdd->prepare("SELECT IDEvent FROM Pictures WHERE IDPicture = ?");
	$requete2->bindValue(1, $Idreq, PDO::PARAM_INT);
	$requete2->execute();
	$ans = $requete2->fetch();
	
	echo '<meta http-equiv="refresh" content="0;URL=EvenementUnique.php?id=".'$ans[0]'.">';
	break;
	
	case "Comment" :
	$requete = $bdd->prepare("UPDATE Comments SET CommentFlag = 1 WHERE IDComment = ?");
	$requete->bindValue(1, $Idreq, PDO::PARAM_INT);
	$requete->execute();
	
	//Requête pour redirection
	$requete2 = $bdd->prepare("SELECT IDEvent FROM Comments INNER JOIN Pictures ON Comments.IDPicture = Pictures.IDPicture WHERE IDComment = ?");
	$requete2->bindValue(1, $Idreq, PDO::PARAM_INT);
	$requete2->execute();
	$ans = $requete2->fetch();
	
	echo '<meta http-equiv="refresh" content="0;URL=EvenementUnique.php?id=".'$ans[0]'.">';
	break;
	
	case "Idea" :
	$requete = $bdd->prepare("UPDATE Ideas SET IdeaFlag = 1 WHERE IDIdea = ?");
	$requete->bindValue(1, $Idreq, PDO::PARAM_INT);
	$requete->execute();
	echo '<meta http-equiv="refresh" content="0;URL=BoiteAIdees.php">'
	break;
	}
?>