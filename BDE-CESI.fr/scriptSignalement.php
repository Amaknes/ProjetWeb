<?php
$Typereq = $_GET['type'];
$Idreq = $_GET['id'];
$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');

//Vérification du type d'élément passé en GET
switch($Typereq){
	
	//Si c'est une image
	case "Pic" :
		//Requête d'ajout du Flag
		$requete = $bdd->prepare("UPDATE Pictures SET PicFlag = 1 WHERE IDPicture = ?");
		$requete->bindValue(1, $Idreq, PDO::PARAM_INT);
		$requete->execute();
	
		//Requête pour redirection
		$requete2 = $bdd->prepare("SELECT IDEvent FROM Pictures WHERE IDPicture = ?");
		$requete2->bindValue(1, $Idreq, PDO::PARAM_INT);
		$requete2->execute();
		$ans = $requete2->fetch();
		//Redirection vers l'événement précédent
		/*echo ("<meta http-equiv='refresh' content='0;URL=EvenementUnique.php?id=");
		echo ($ans[0]);
		echo ("'>");
		*/
	break;
	//Si c'est un commentaire
	case "Comment" :
		//Requête d'ajout du Flag
		$var_dump($Idreq);
		$requete = $bdd->prepare("UPDATE Comments SET CommentFlag = 1 WHERE IDComment = ?");
		$requete->bindValue(1, $Idreq, PDO::PARAM_INT);
		$requete->execute();
	
		//Requête pour redirection
		$requete2 = $bdd->prepare("SELECT IDEvent FROM Comments INNER JOIN Pictures ON Comments.IDPicture = Pictures.IDPicture WHERE IDComment = ?");
		$requete2->bindValue(1, $Idreq, PDO::PARAM_INT);
		$requete2->execute();
		$ans = $requete2->fetch();
		//Redirection vers l'événement précédent
		echo ("<meta http-equiv='refresh' content='0;URL=EvenementUnique.php?id=");
		echo ($ans[0]);
		echo ("'>");
	
	break;
	//Si c'est une idée
	case "Idea" :
		//Requête d'ajout du Flag
		$requete = $bdd->prepare("UPDATE Ideas SET IdeaFlag = 1 WHERE IDIdea = ?");
		$requete->bindValue(1, $Idreq, PDO::PARAM_INT);
		$requete->execute();
		
		echo '<meta http-equiv="refresh" content="0;URL=BoiteAIdees.php">';
		
	break;
	}
?>