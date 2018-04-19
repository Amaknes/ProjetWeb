<?php session_start(); ?>
<link rel="stylesheet" href="css/caroussel.css"/>
<?php include('header.php'); ?>

<script type="text/javascript" src="js/Caroussel.js"></script>			
	<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->

<section id="Accueil">
	<div id="banniere">	
		<h2>Accueil</h2>
	</div>
	
	<div id="EventAccueil" class="AccueilCategorie">
		
<!--		<div class="Ah3">
			<h3>Événement à venir</h3>
		</div>
		<div>
			<img id="bde_img" class="img" src="Ressources/SiteImages/BDE.png">
		</div>
		-->
		<div class="monthevent">
			<h3 class="Ah3">Événement du mois</h3>
			<?php
				$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');
				$requete = $bdd->prepare("SELECT * FROM Events WHERE Selected = true");
				$requete->execute();
				$ans = $requete->fetch();
				if(count($ans) == 1){
					echo "<h1>Aucun événement n'a été sélectionné</h1>";
				}else{  
					echo '<a href ="EvenementUnique.php?id='.$ans[0].'">';
					echo '<img class="EventThumbnail" src="'.$ans[4].'"/>';
					echo "<p class='EventTitle'>".$ans[1]."</p>";
					/*echo "<p class='EventText'>".$ans[5]."</p>";*/
					echo "</a>";
				}
			?>
		</div>
		
	</div>
	
	<div id="VentesAccueil" class="AccueilCategorie">
		<div class="Ah3">
			<h3>Meilleures ventes</h3>
		</div>
		<?php include("meilleuresVentes.php"); ?>

	</div>
	
	
	<div id="NousAccueil" class="AccueilCategorie">
		<div class="Ah3">
			<h3>Qui sommes-nous?</h3>
		</div>
		<div>
			<img id="bde_img" class="img" src="Ressources/SiteImages/BDE.png">
		</div>
			<p>Martine Durand, Jacquie Michel, Flavien Spataro, Judith Felix, Paul Berger</p>
	</div>	
	
</section>



		<?php include('footer.php'); ?>
