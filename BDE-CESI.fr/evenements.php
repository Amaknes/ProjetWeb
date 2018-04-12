<!DOCTYPE HTML>

<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->
 
<html>
	<?php 
		session_start(); 
		include('header.php'); 
	?>
	
	
    <head>
        <title>BDE CESI EXIA St Nazaire</title>
		<h2>Événements</h2>
    </head>
	
	
    <body>
		<h3>Évènement du mois</h3>
		<?php
			$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');
			$requete = $bdd->prepare("SELECT * FROM Events WHERE Selected = true");
			$requete = execute();
			$ans = $requete->fetch();
			if(count($ans) == 1){
				echo "<h1>PAS OK</h1>";
			}else{  
				echo '<div href ="EvenementUnique.php?id='.$ans[0].'">'
					echo "<p class='EventTitle'>".$ans[1]."</p>";
					echo '<img class="EventThumbnail" src="'.$ans[4].'"/>'
					echo "<p class='EventText'>".$ans[5]."</p>";
				echo "</div>"
			}
		?>
		<h3><a href="EventList.php">Liste des évènements</a></h3>
		
    </body>
	
	<?php include('footer.php'); ?>
	
</html>