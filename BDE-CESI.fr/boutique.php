

<?php session_start(); ?>
<?php include('header.php'); ?>
<?php

function LaunchSearch() {
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
}
?>
?>

<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->

	<content id="Boutique">
			<div id="Recherche">
                <div id="search" class="animate form">
                    <form method="post" action="" autocomplete="on">
                        <h1>Rechercher un produit</h1>
                            <p> 
                                    <label for="PName" class="PName"> Nom du produit : </label>
                                    <input id="PName" name="PName" type="text" placeholder="Nom du produit"/>
                                </p>
								
								<p class="categoryList">
									Catégorie du produit :
									<select name="Category" size="1">
									<option>Tous les produits
									<option>Vêtements
									<option>Alimentaire
									<option>Accessoires
									<option>Voiture
									</select>
									
								</p>
                            
                                <p class="priceGap"> 
                                    
									De :
									<label for="MinPrice" class="MinPrice" ></label>
                                    <input id="MinPrice" name="MinPrice" type="number" placeholder="Prix minimum" min="0" max="99999999999"/>
									€
									à :
									<label for="MaxPrice" class="MaxPrice" ></label>
                                    <input id="MaxPrice" name="MaxPrice" type="number" placeholder="Prix maximum" min="0" max="99999999999"/>
									€
									
                                </p>
								
								<p class="SearchButton">
									<input type="submit" value="Rechercher" />
								</p>
                        </form>
                    </div>                       
                </div> 
            </content>
	
	
	
	
            <div class="products">

            <?php LaunchSearch(); ?>

			</div>
	
		<?php include('footer.php'); ?>
