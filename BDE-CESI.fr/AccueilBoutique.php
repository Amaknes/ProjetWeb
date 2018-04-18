

<?php session_start(); ?>
<?php include('header.php'); ?>
<?php

function MeilleuresVentesRequest() {
	$bdd = new PDO('mysql:host=localhost;dbname=projetweb;charset=utf8','root','');
	
	$Request = "SELECT products.IDProduct,`Name`, `URLImage`
				FROM `products`
				INNER JOIN(
				SELECT IDProduct, SUM(Quantity)
				FROM `orders`
				INNER JOIN `contain` ON `contain`.IDOrder = `orders`.IDOrder
				GROUP BY `IDProduct`
				ORDER BY SUM(Quantity) DESC)
				temptable
				ON products.IDProduct = temptable.IDProduct";
	
	$requeteConnexion = $bdd->prepare($Request);
	$requeteConnexion->execute();
	
	
	if(!$requeteConnexion->execute()){
		print_r($requeteConnexion->errorInfo());
	$requeteConnexion->closeCursor();
	}


	
	if ($requeteConnexion != null) {
		for ($i = 0; $i <= 2; $i++) {
			$ans = $requeteConnexion->fetch();
				
				echo("<div id='".$ans[0]."' class='BestSoldProduct'>");
				echo("<p class='ProductName'> ".$ans[1]." </p>");
				echo("<img src='".$ans[2]."' class='ProductPic' />");
				
		}
	}
	
	
	
	$requeteConnexion->closeCursor();
}
?>

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
						MeilleuresVentesRequest();
					?>
				
				
				
            </div>
    </content>
	

	
		<?php include('footer.php'); ?>
