 <?php session_start(); ?>
		<?php include('header.php'); ?>
		
<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->

	
	
	<content id="EvenementUnique">	
		<?php
		
		$Idreq = $_GET['id'];
		$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');
		$requete = $bdd->prepare("SELECT * FROM Events WHERE IDEvent = ?");
		$requete->bindValue(1, $Idreq, PDO::PARAM_INT);
		$requete->execute();
		$ans = $requete->fetch();
		
		echo "<p class='EventTitle'>".$ans[1]."</p>";
		echo '<img class="EventThumbnail" src="'.$ans[4].'"/>';
		echo "<p class='EventDate'>".$ans[2]."</p>";
		echo "<p class='EventPrice'>".$ans[3]."</p>";
		echo "<p class='EventText'>".$ans[5]."</p>";
		
		$eventtime = str_replace('-','',$ans[2]);
		$eventtime = strtotime($eventtime);
			
		if(time() >= $eventtime){
			
			$requete2 = $bdd->prepare("SELECT * FROM Pictures WHERE PicFlag=false AND IDEvent = ?");
			$requete2->bindValue(1, $Idreq, PDO::PARAM_INT);
			$requete2->execute();
			
			foreach($requete2 as $row){
				echo '<img class="Pic" src="'.$row[1].'"/>';
				
				if(isset($_SESSION['Status']) && $_SESSION['Status'] == (2||3))
				{echo "<a href='scriptSignalement.php?type=Pic&id=".$row[0]."'>Signaler comme inapproprié</a>";}
			
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
				
				foreach($requete3 as $row2){
					echo "<p class='CommentName'>".$row2[2]." ".$row2[1]."</p>";
					echo "<p class='CommentContent'>".$row2[3]."</p>";
					
					if(isset($_SESSION['Status']) && $_SESSION['Status'] == (2||3))
					{echo "<button>Signaler comme inapproprié</button>";}
				}
			}
			
		}else{
		$requete4 = $bdd->prepare("SELECT COUNT FROM Participate  WHERE IDEvent = ?");
				$requete4->bindValue(1, $Idreq, PDO::PARAM_INT);
				$requete4->execute();
				$ans4 = $requete4->fetch();
				
			//Placeholder pour le nombre de participants à revérifier
			echo "<p>Déja ".$ans4[0]." participants</p>";
			echo "<button>participer</button>";
			if($_SESSION['Status']=2) echo "<button>Signaler comme inapproprié</button>";
			if($_SESSION['Status']=3) echo "<button>Télécharger en CSV</button>";
			if($_SESSION['Status']=3) echo "<button>Télécharger en PDF</button>";
		}
	
		?>
	</content>
	
		<?php include('footer.php'); ?>
