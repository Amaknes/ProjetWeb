

<?php session_start(); ?>
<?php include('header.php'); ?>
<link rel="stylesheet" href="css/caroussel.css"/>
<script type="text/javascript" src="js/Caroussel.js"></script>		

<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->

	<content id="AccueilBoutique">
		<div id="banniere">	
			<h2>Accueil boutique</h2>
		</div>
			<div id="Meilleures Ventes">
				<h1>Meilleures Ventes</h1>
					<?php
						include("meilleuresVentes.php");
					?>
            </div>
    </content>

		<?php include('footer.php'); ?>
