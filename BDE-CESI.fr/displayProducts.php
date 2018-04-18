<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->

 <?php

$dir = "Ressources/Products/*png";
$images = glob( $dir );


$bdd = new PDO('mysql:host=localhost;dbname=projetweb;charset=utf8','root','');
	
	$Name = isset($_POST['PName']) ? $_POST['PName'] : "";
	$Category = isset($_POST['Category']) ? $_POST['Category'] : "Tous les produits";
	$MinPrice = isset($_POST['MinPrice']) ? $_POST['MinPrice'] : 0;
	$MaxPrice = isset($_POST['MaxPrice']) ? $_POST['MaxPrice'] : 99999999999;
	
	if ($Category == 'Tous les produits') {$Category = '%';} else {}
	if ($MinPrice == '') {$MinPrice = 0;} else {}
	if ($MaxPrice == '') {$MaxPrice = 99999999999;} else {}
	
	$Name = "%".$Name."%";
	
	
	$Request = "SELECT * FROM products WHERE Name LIKE ? AND Category LIKE ? AND Price BETWEEN ? AND ?";
	$Param = array($Name,$Category,$MinPrice,$MaxPrice);
	
	
	$requeteConnexion = $bdd->prepare($Request);
	$requeteConnexion->execute($Param);
	
	
	if(!$requeteConnexion->execute()){
		print_r($requeteConnexion->errorInfo());
	$requeteConnexion->closeCursor();
	}
	


	if ($requeteConnexion != null) {
		foreach($requeteConnexion as $ans){

			echo("<div id='".$ans[0]."' class='DisplayedProduct'>");
			echo("<p class='ProductName'> ".$ans[1]." </p>");
			echo("<img src='".$ans[4]."' class='ProductPic' />");
			echo("<p class='Price'> ".$ans[3]." €</p>");
			
		}
	}
	
	$requeteConnexion->closeCursor();



?>