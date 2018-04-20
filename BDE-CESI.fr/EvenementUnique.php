 <?php session_start(); ?>
		<?php include('header.php'); ?>
		
<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->

	
	
	<section id="EvenementUnique">	
		<div id="banniere">	
			<h2>Événement</h2>
		</div>
		<?php
		
		//Récupération de l'event sélectionné
		$Idreq = $_GET['id'];
		$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');
		$requete = $bdd->prepare("SELECT * FROM Events WHERE IDEvent = ?");
		$requete->bindValue(1, $Idreq, PDO::PARAM_INT);
		$requete->execute();
		$ans = $requete->fetch();
		
		/*$annee = $bdd->prepare('SELECT DATE_FORMAT("2017-06-15", "%Y"');
		$annee->execute();
		$year = $annee->fetch();*/
		
		//Conversion de la date SQL en date PHP
		$originalDate = $ans[2];
		$newDate = date("d/m/Y", strtotime($originalDate));
		
		//Echo des informations générales concernant l'événement
		echo "<div class=TheEvent>";
		echo "<p class='EventTitle'>".$ans[1]."</p>";
		/*echo "<p class='EventDate'>À lieu le : ".$ans[2]."</p>";*/
		echo "<p class='EventDate'>Date : ".$newDate."</p>";
		echo "<p class='EventPrice'>Prix : ".$ans[3]."€</p>";
		echo '<img class="EventThumbnail" src="'.$ans[4].'" alt="Image evenement"/>';
		echo "<p class='EventText'>".$ans[5]."</p>";
		echo "</div>";
		
		//Comparaison entre la date actuelle et la date de l'événement
		$eventtime = str_replace('-','',$ans[2]);
		$eventtime = strtotime($eventtime);
			
		if(time() >= $eventtime){
			
			//Requête pour récupérer les images
			$requete2 = $bdd->prepare("SELECT * FROM Pictures WHERE PicFlag=false AND IDEvent = ?");
			$requete2->bindValue(1, $Idreq, PDO::PARAM_INT);
			$requete2->execute();
			
			//Formulaire pour poster une image
			if(isset($_SESSION['Status']) && $_SESSION['Status'] == (2||3)){
			echo '<form id="PostImage" method="post" action="scriptPostImage.php" autocomplete="on">';  
			echo'<p>Publier une image<br/>';
			echo"<input id='URLImage' name='URLImage' required='required' placeholder='URL Image' />";
			echo "</p>";
			echo"<p>";
			echo"<input id='IDEvent' name='IDEvent' required='required' type='text' value='".$Idreq."' readonly>";
			echo"</p>";
			echo"<p class='ConfirmButton'>";
			echo"<button class='comment' type='submit'>Envoyer l'image</button>";
			echo"</p>";
			echo"</form>";
			}
			//Pour chaque image on l'affichera
			foreach($requete2 as $row){
				echo'<div class="PicAndCom">';
				echo '<img class="Pic" src="'.$row[1].'" alt="Image commentaire"/>';
				
				//Requête pour récupérer le nombre de likes
				$requete5 = $bdd->prepare("SELECT COUNT(IDUser) FROM Like WHERE IDPicture = ?");
				$requete5->bindValue(1, $row[0], PDO::PARAM_INT);
				$requete5->execute();
				$ans5 = $requete5->fetch();
				
				
				
				
				//Affichage des boutons
				if(isset($_SESSION['Status']) && $_SESSION['Status'] == (2||3))

				{echo "<a href='scriptSignalement.php?type=Pic&id=".$row[0]."'><div class='signal'>Signaler comme inapproprié</div></a>";
				
				
				echo "<a href='scriptLike.php?id=".$row[0]."'><div class='like'>Like</div></a>";}
				
				echo "<p class='likesnb'>".$ans5[0]."</p>"; 
				
				echo "<h3>Commentaires</h3>";

				
				//requête récupération de commentaires
				$requete3 = $bdd->prepare("
					SELECT IDComment, LastName, FirstName, Content
					FROM Users
					INNER JOIN
					(
					SELECT Comments.IDUser, IDComment, Content
					FROM Comments
					INNER JOIN Pictures
					ON Pictures.IDPicture = Comments.IDPicture
					WHERE Pictures.IDPicture = ? AND CommentFlag = false
					)	temptable
					ON Users.IDUser = temptable.IDUser");
					
				$requete3->bindValue(1, $row[0], PDO::PARAM_INT);
				$requete3->execute();
				//Formulaire commentaire
				if(isset($_SESSION['Status']) && $_SESSION['Status'] == (2||3)){
				echo '<form  method="post" action="scriptPostCommentaire.php" autocomplete="on">';  
				echo'<p>';
				echo"<textarea class='Content' name='Content' required='required'  placeholder='Tapez votre commentaire ici' ></textarea>";
				echo "</p>";
				echo"<input class='IDPic' name='IDPic' required='required' type='text' value='".$row[0]."' readonly>";
				echo"<p class='ConfirmButton'>";
				echo"<button class='comment' type='submit'>Envoyer le commentaire</button>";
				echo"</p>";
				echo"</form>";
				}
				foreach($requete3 as $row2){
					echo "<p class='CommentName'>".$row2[2]." ".$row2[1]."</p>";
					echo "<p class='CommentContent'>".$row2[3]."</p>";
					//affichage du commentaire
					if(isset($_SESSION['Status']) && $_SESSION['Status'] == (2||3))
					{echo "<a class='signal' href='scriptSignalement.php?type=Comment&id=".$row[0]."'>Signaler comme inapproprié</a>";}
				}
				
				echo"</div>";
			}
			//Téléchargement CSV de la liste des participants
			echo("<form method='get' action='genererListeDesParticipants.php'>");
			echo("<input type='text' name='id' value='".$ans[0]."' style='display:none;'/>");
			echo("<button class='DLCSV' type='submit'>Télécharger la liste des participants</button></form>");
			
		}else{
			//Si l'événement ne s'est pas encore déroulé
			//Requête du nombre de participants
		$requete4 = $bdd->prepare("SELECT COUNT(IDUser) FROM Participate WHERE IDEvent = ?");
				$requete4->bindValue(1, $Idreq, PDO::PARAM_INT);
				$requete4->execute();
				$ans4 = $requete4->fetch();
				
			//Affichage du nombre de participants
			echo "<p class='participnb'>Actuellement ".$ans4[0]." participants</p>";
			echo "<button class='participate'>Participer</button>";
			//Téléchargement CSV de la liste des participants
			echo("<form method='get' action='genererListeDesParticipants.php'>");
			echo("<input type='text' name='id' value='".$ans[0]."' style='display:none;'/>");
			echo("<button class='DLCSV' type='submit'>Télécharger la liste des participants</button></form>");
			
			
			
		}
	
		?>
	</section>
	
		<?php include('footer.php'); ?>
