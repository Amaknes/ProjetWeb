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
		
		$Idreq = $_GET['id'];
		$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');
		$requete = $bdd->prepare("SELECT * FROM Events WHERE IDEvent = ?");
		$requete->bindValue(1, $Idreq, PDO::PARAM_INT);
		$requete->execute();
		$ans = $requete->fetch();
		
		/*$annee = $bdd->prepare('SELECT DATE_FORMAT("2017-06-15", "%Y"');
		$annee->execute();
		$year = $annee->fetch();*/
		
		$originalDate = $ans[2];
		$newDate = date("d/m/Y", strtotime($originalDate));
		
		echo "<div class=TheEvent>";
		echo "<p class='EventTitle'>".$ans[1]."</p>";
		/*echo "<p class='EventDate'>À lieu le : ".$ans[2]."</p>";*/
		echo "<p class='EventDate'>Date : ".$newDate."</p>";
		echo "<p class='EventPrice'>Prix : ".$ans[3]."€</p>";
		echo '<img class="EventThumbnail" src="'.$ans[4].'" alt="Image evenement"/>';
		echo "<p class='EventText'>".$ans[5]."</p>";
		echo "</div>";
		
		$eventtime = str_replace('-','',$ans[2]);
		$eventtime = strtotime($eventtime);
			
		if(time() >= $eventtime){
			
			$requete2 = $bdd->prepare("SELECT * FROM Pictures WHERE PicFlag=false AND IDEvent = ?");
			$requete2->bindValue(1, $Idreq, PDO::PARAM_INT);
			$requete2->execute();
			echo '<form  method="post" action="scriptPostImage.php" autocomplete="on">';  
			echo'<p>';
			echo"<textarea id='URLImage' name='URLImage' required='required' placeholder='URL Image' ></textarea>'";
			echo "</p>";
			echo"<p>";
			echo"<input id='IDEvent' name='IDEvent' required='required' type='text' value='".$Idreq."' readonly>";
			echo"</p>";
			echo"<p class='Confirm button'>";
			echo"<button class='comment' type='submit'>Envoyer l'image</button>";
			echo"</p>";
			echo"</form>";
			foreach($requete2 as $row){
				echo '<img class="Pic" src="'.$row[1].'" alt="Image commentaire"/>';
				
				if(isset($_SESSION['Status']) && $_SESSION['Status'] == (2||3))
				{echo "<a href='scriptSignalement.php?type=Pic&id=".$row[0]."'>Signaler comme inapproprié</a>";}
				echo "<a href='scriptLike.php?id=".$row[0]."'>Like</a>";
				echo "<p>Commentaires</p>";
				
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
				
				echo '<form  method="post" action="scriptPostCommentaire.php" autocomplete="on">';  
				echo'<p>';
				echo"<textarea class='Content' name='Content' required='required'  placeholder='URL Image' ></textarea>'";
				echo "</p>";
				echo"<p>";
				echo"<input class='IDPic' name='IDPic' required='required' type='text' value='".$row[0]."' readonly>";
				echo"</p>";
				echo"<p class='Confirm button'>";
				echo"<button class='comment' type='submit'>Envoyer le commentaire</button>";
				echo"</p>";
				echo"</form>";
				
				foreach($requete3 as $row2){
					echo "<p class='CommentName'>".$row2[2]." ".$row2[1]."</p>";
					echo "<p class='CommentContent'>".$row2[3]."</p>";
					
					if(isset($_SESSION['Status']) && $_SESSION['Status'] == (2||3))
					{echo "<a href='scriptSignalement.php?type=Comment&id=".$row[0]."'>Signaler comme inapproprié</a>";}
				}
			}
			echo("<form method='get' action='genererListeDesParticipants.php'>");
			echo("<input type='text' name='id' value='".$ans[0]."' style='display:none;'/>");
			echo("<button class='DLCSV' type='submit'>Télécharger la liste des participants</button></form>");
			
		}else{
		$requete4 = $bdd->prepare("SELECT COUNT(IDUser) FROM Participate WHERE IDEvent = ?");
				$requete4->bindValue(1, $Idreq, PDO::PARAM_INT);
				$requete4->execute();
				$ans4 = $requete4->fetch();
				
			//Placeholder pour le nombre de participants à revérifier
			echo "<p class='participnb'>Actuellement ".$ans4[0]." participants</p>";
			echo "<button class='participate'>Participer</button>";
			
			echo("<form method='get' action='genererListeDesParticipants.php'>");
			echo("<input type='text' name='id' value='".$ans[0]."' style='display:none;'/>");
			echo("<button class='DLCSV' type='submit'>Télécharger la liste des participants</button></form>");
			
			
			
		}
	
		?>
	</section>
	
		<?php include('footer.php'); ?>
