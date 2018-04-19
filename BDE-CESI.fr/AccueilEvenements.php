 <?php session_start(); ?>
		<?php include('header.php'); ?>

<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->
	
	
    <section id="Evenements">
		<div id="banniere">	
			<h2>Événements</h2>
		</div>
		<div class="monthevent">
			<h3>Événement du mois</h3>
			<?php
				$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');
				$requete = $bdd->prepare("SELECT * FROM Events WHERE Selected = true");
				$requete->execute();
				$ans = $requete->fetch();
				if(count($ans) == 1){
					echo "<h1>Aucun événement n'a été sélectionné</h1>";
				}else{  
					echo '<a href ="EvenementUnique.php?id='.$ans[0].'">';
					echo "<p class='EventTitle'>".$ans[1]."</p>";
					echo '<img class="EventThumbnail" src="'.$ans[4].'" alt="Evenement du mois"/>';
					echo "</a>";
				}
			?>
		</div>
		<div id="eventclick">
			<a id="allevents" href="EvenementListe.php">
				<h3>Tous les événements</h3>
				<p></p>
			</a>
			<a id="proposeevent" href="BoiteAIdees.php">
				<h3>Proposer un événement</h3>
				<p></p>
			</a>
		</div>
    </section>
	
	<?php include('footer.php'); ?>