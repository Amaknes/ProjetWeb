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

	/*
	$MinPrice = isset($_POST['MinPrice']) ? $_POST['MinPrice'] : 0;
	$MaxPrice = isset($_POST['MaxPrice']) ? $_POST['MaxPrice'] : 99999999999;
	
	$MinPrice = $MinPrice=='' ? $_POST['MinPrice'] : '0';
	$MaxPrice = $MaxPrice=='' ? $_POST['MaxPrice'] : '99999999999';
	*/
	
	var_dump($Name);
	var_dump($Category);
	
	/*
	var_dump($MinPrice);
	var_dump($MaxPrice);
	*/
	
	if ($Category == "Tous les produits" && $Name == "") {
		$Request = "SELECT * FROM products";
		$Param = array();
	}
	else if ($Category == "Tous les produits" && $Name != "") {
		$Request = "SELECT * FROM products WHERE Name=?";
		$Param = array($Name);
	}
	else if ($Category != "Tous les produits" && $Name == "") {
		$Request = "SELECT * FROM products WHERE Category=?";
		$Param = array($Category);
	}
	else {
		$Request = "SELECT * FROM products WHERE Name=? AND Category=?";
		$Param = array($Name,$Category);
	}
	
	$requeteConnexion = $bdd->prepare($Request);
	$requeteConnexion->execute($Param);
	
	
	
	if(!$requeteConnexion->execute()){
		print_r($requeteConnexion->errorInfo());
	$requeteConnexion->closeCursor();
	}
	

	
	
	//$ans = $requeteConnexion->fetch();

	if ($requeteConnexion != null) {
		foreach($requeteConnexion as $ans){
		
			echo("<div class='DisplayedProduct'>");
			echo("<img src='".$ans[4]."' class='ProductPic' />");
			echo("<p class='ProductName'> ".$ans[1]." </p>");
		
		}
	}


/*
foreach( $images as $image ):
    echo "<div class='displayprod'>
	<img src='" . $image . "', class='prodpic' />
		<div class='price'> 150€ </div>
		<div class='description'> 
			Foot control and protection with active comfort provided through a stable chassis ...
		</div>
	</div>";
endforeach;
*/
	
	$requeteConnexion->closeCursor();

	/*
	
	if(count($ans) == 1){
		echo "<h1>PAS OK</h1>";
		//$message = "<p class=\"red\">PAS OK.</p>";
		echo $message;
		$requeteConnexion->closeCursor();
	}else{ echo "<h1>OK</h1>";
			$_SESSION['Nom'] = $ans[1];
			$_SESSION['Prenom'] = $ans[2];
			$_SESSION['Email'] = $Email;
			$_SESSION['Status'] = $ans[5];
			echo '<meta http-equiv="refresh" content="0;URL=accueil.php">';
			
			
	}
	$requeteConnexion->closeCursor();

	*/



?>