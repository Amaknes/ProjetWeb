<?php session_start(); ?>
<link rel="stylesheet" href="css/caroussel.css"/>
<?php include('header.php'); ?>

<script type="text/javascript" src="js/Caroussel.js"></script>			
	<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->

<content id="Accueil">
	<div id="banniere">	
		<h2>Accueil</h2>
	</div>
	
	<div id="EventAccueil" class="AccueilCategorie">
		
		<div class="Ah3">
			<h3>Événement à venir</h3>
		</div>
		<div>
			<img id="bde_img" class="img" src="Ressources/SiteImages/BDE.png">
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
	
</content>



		<?php include('footer.php'); ?>
