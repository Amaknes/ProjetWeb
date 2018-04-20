	<?php session_start(); ?>
		<?php include('header.php'); ?>
		
<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->	
 
	<section id="EvenementListe">
		<div id="banniere">	
			<h2>Liste des événements</h2>
		</div>
		<?php
			//récupération de la liste des événements
			$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');
			$requete = $bdd->prepare("SELECT * FROM Events");
			$requete->execute();
			foreach($requete as $ans){
				//Affichage des différents éléments de l'événement
				echo "<a class='TitleEvent' href='EvenementUnique.php?id=".$ans[0]."'>";
				echo "<div class='EventListContainer'>";
					echo "<h3>".$ans[1]."</h3>";
						$originalDate = $ans[2];
						$newDate = date("d/m/Y", strtotime($originalDate)); /* change the date format*/	
					echo "<p class='EventDate'>".$newDate."</p>";
					
					echo "<div class='EventListView'>";
					echo '<img class="EventThumbnail" src="'.$ans[4].'"/>';
					echo "</div>";
					
					echo "<p class='EventText'>".$ans[5]."</p>";
				echo "</div>";
				echo "</a>";
			}
		?>
	</section>

		<?php include('footer.php'); ?>
