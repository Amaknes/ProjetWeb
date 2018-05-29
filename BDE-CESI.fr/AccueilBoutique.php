<?php session_start(); ?>
<?php include('header.php'); ?>
<link rel="stylesheet" href="css/caroussel.css"/>
<script  src="js/Caroussel.js"></script>		<!-- APPAREMENT INUTILE : type="text/javascript"	-->

<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->

	<section id="AccueilBoutique">
		<div id="banniere">	
			<h2>Accueil boutique</h2>
		</div>
			<div class="ABh3">
				<h3>Meilleures Ventes</h3>
			</div>
			<div id="MeilleuresVentes">

					<?php
						include("meilleuresVentes.php");
					?>
            </div>
			
			<div id="BoutiqueAjoutProduit">
				<?php if(isset($_SESSION['Status']) && ($_SESSION['Status'] != 1))
					{echo "<a id='NouveauProduit' class='NouveauProduit' href='NouveauProduit.php'>Ajouter un nouveau produit</a>";} ?>
			</div>
    </section>

		<?php include('footer.php'); ?>
