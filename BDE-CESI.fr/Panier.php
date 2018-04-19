<?php session_start();?>
<?php include('header.php'); ?>


<?php
	function LecturePanier() {

$email = $_SESSION['Email'];
$C1=0;
$C2= 1;

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
			
		$C1++;
		echo($C1);
		
		if($C1==1){
			echo("test test bite");
		}
			
			echo("<div class='Container' id='".$C2."'>");
		
		echo("2eme test");
			echo("<div id='".$ans2[0]."'>");
			echo("<div class='ProductName'><p> ".$ans2[1]." </p></div>");
			echo("<div class='Price'><p> ".$ans2[2]." €</p></div>");
			echo("<div class='Quantity'><p> ".$ans2[3]."</p></div>");
			
			echo("<form method='post' action='gererPanier.php'>");
			echo("<input type='text' name='type' value='deletion' style='display:none;'/>");
			echo("<input type='text' name='idproduct' value='".$ans2[0]."'style='display:none;'/>");
			echo("<button type='submit' class='deleteproduct'>Delete</button></form>");
			
			
		// if($C1==3){
			echo("</div>");
			$C1=0;
			$C2++;
			
			
		}
	
	$RequestPanier->closeCursor();
	}

?>

<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->

 
 
<content id="Panier">
	<div id="banniere">	
		<h2>Mon panier</h2>
	</div>
	
	
	<div>
		<h3>Mes produits</h3>
		<?php if(isset($_SESSION['Status'])){LecturePanier();}
		else {echo("Vous devez vous connecter pour accéder à votre panier");}?>
	
	</div>
	
	
	<div>
		<h3></h3>
	
	</div>
	
	
	
</content>

		<?php include('footer.php'); ?>