

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
			<div class="ABh3">
				<h3>Meilleures Ventes</h3>
			</div>
			<div id="Meilleures Ventes">

					<?php
						include("meilleuresVentes.php");
					?>
            </div>
			
			<div class="BoutiqueAjoutProduit">
				<?php if(isset($_SESSION['Status']) && $_SESSION['Status'] == (2||3))
				{echo "<a class='NouveauProduit' href='NouveauProduit.php'>Ajouter un nouveau produit</a>";} ?>
			</div>
    </content>

		<?php include('footer.php'); ?>
