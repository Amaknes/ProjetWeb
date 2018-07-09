<?php session_start();?>
<?php include('header.php'); ?>


<?php

	

	function LecturePanier() {
$TotalPanier=0;
$email = $_SESSION['Email'];

	$bdd = new PDO('mysql:host=localhost;dbname=projetweb;charset=utf8','root','');

	$requeteTakeID = $bdd->prepare("SELECT IDUser FROM Users WHERE Email = ?");

		$requeteTakeID->bindValue(1, $email, PDO::PARAM_STR);
		$requeteTakeID->execute();
		$ans = $requeteTakeID->fetch();
		$requeteTakeID->closeCursor();
	
	$RequestPanier = $bdd->prepare("SELECT Products.IDProduct,`Name`, `Price`, `Quantity`
									FROM `Products`
									INNER JOIN `Contain` ON Products.IDProduct = Contain.IDProduct
									INNER JOIN `Orders` ON Contain.IDOrder = Orders.IDOrder
									WHERE IDUser = ? AND Status = 0");
									
	$RequestPanier->bindValue(1, $ans[0], PDO::PARAM_INT);
	$RequestPanier->execute();
	
		foreach($RequestPanier as $ans2){
			
			echo('<div class="PanierDisplayedProduct" id="'.$ans2[0].'">');
			echo('<a class="minus" href="gererPanier.php?type=removingOnefrompanier&idproduct='.$ans2[0].'"></a>');
			echo('<a class="multiplication" href="gererPanier.php?type=removingProductfrompanier&idproduct='.$ans2[0].'"></a>');
			echo('<a class="plus" href="gererPanier.php?type=addingOnetoPanier&idproduct='.$ans2[0].'"></a>');
			echo("<div class='PanierProductName'><p> ".$ans2[1]." </p></div>");
			echo("<div class='PanierQuantity'><p> ".$ans2[3]."</p></div>");
			echo("<div class='PanierPrice'><p> ".$ans2[2]." €</p></div>");
			$subtotal=$ans2[2]*$ans2[3];
			echo("<div class='PanierSubtotal'><p> ".$subtotal." €</p></div></div>");
	
	$TotalPanier=$TotalPanier+$subtotal;
			

			echo("<form method='post' action='gererPanier.php'>");
			echo("<input type='text' name='type' value='deletion' style='display:none;'/>");
			echo("<input type='text' name='idproduct' value='".$ans2[0]."'style='display:none;'/>");
			

		}
	
	
	
	$RequestPanier->closeCursor();
	
	return $TotalPanier;
	
	}
	


?>

<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->

 
 
<section id="Panier">
	<div id="banniere">	
		<h2>Mon panier</h2>
	</div>
	
	

	<div id="CommandeEnAttente">
		<?php if(isset($_SESSION['Status'])){
			$Total=0;
			echo("<div class=ListePanier>");
				$Total=LecturePanier();
			echo("</div>");
			echo("<div class=TotalPanier>".$Total." €</div>");
			echo("<a href='scriptCommande.php'><div class=ValidationCommande>Valider la commande</div></a>");
		}
		else {echo("Vous devez vous connecter pour accéder à votre panier");}?>
	</div>
	
	
	<div>
		<h3></h3>
	
	</div>
	
	
	
</section>

		<?php include('footer.php'); ?>