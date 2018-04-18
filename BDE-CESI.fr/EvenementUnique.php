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
		if($_SESSION['Status']=2)echo "<button>Signaler comme inapproprié</button>";
		echo '<img class="EventThumbnail" src="'.$ans[4].'"/>';
		echo "<p class='EventDate'>".$ans[2]."</p>";
		echo "<p class='EventPrice'>".$ans[3]."</p>";
		echo "<p class='EventText'>".$ans[5]."</p>";
		$eventtime = strtotime($ans[2]);
		if(time() >= strtotime($eventtime)){
			$requete2 = $bdd->prepare("SELECT * FROM Pictures WHERE PicFlag=false");
			$requete2->execute();
			foreach($requete2 as $row){
				echo '<img class="Pic" src="'.$row[1].'"/>';
				if($_SESSION['Status']=2) echo "<button href='scriptSignalement.php?type='Event'&id=".$row[0]."'>Signaler comme inapproprié</button>";
				echo "<p>Commentaires</p>";
				
				//requête récupération de commentaires
				$requete3 = $bdd->prepare("SELECT IDComment,Content,LastName,FirstName FROM Comments INNER JOIN Users ON Users.IDUser = Comments.IDUser  WHERE IDPicture = ?");
				$requete3->bindValue(1, $row[0], PDO::PARAM_INT);
				$requete3->execute();
				foreach($requete3 as $row2){
					echo "<p class='CommentName'>".$row2[3]." ".$row2[2]."</p>";
					echo "<p class='CommentContent'>".$row2[1]."</p>";
					if($_SESSION['Status']=2) echo "<button>Signaler comme inapproprié</button>";
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
