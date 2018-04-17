<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->

 <?php

$dir = "Ressources/Products/*png";
$images = glob( $dir );


$bdd = new PDO('mysql:host=localhost;dbname=projetweb;charset=utf8','root','');

	
	$Name = $_POST['PName'];
	$Category = $_POST['category'];
	$MinPrice = $_POST['MinPrice'];
	$MaxPrice = $_POST['MaxPrice'];
	
	var_dump($Name);
	
	if ($Category = "Tous les produits" && $Name == "") {
		$requeteConnexion = $bdd->prepare("SELECT * FROM products");
		$requeteConnexion->execute();
	}
	else if ($Category = "Tous les produits" && $Name != "") {
		$requeteConnexion = $bdd->prepare("SELECT * FROM products WHERE Name=?");
		$requeteConnexion->execute(array($Name));
	}
	else {
		$requeteConnexion = $bdd->prepare("SELECT * FROM products WHERE Name=? AND Category=?");
		$requeteConnexion->execute(array($Name,$Category));
	}
	
	if(!$requeteConnexion->execute()){
		print_r($requeteConnexion->errorInfo());
	$requeteConnexion->closeCursor();
	}
	
	
	//$ans = $requeteConnexion->fetch();

	
	foreach($requeteConnexion as $ans){
		
		echo("<div class='DisplayedProduct'>");
		echo("<img src='".$ans[4]."' class='ProductPic' />");
		echo("<p class='ProductName'> ".$ans[1]." </p>");
		
		

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
	
	var_dump($ans);

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