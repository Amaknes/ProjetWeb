<?php session_start(); ?>
<?php include('header.php'); ?>
<?php


function AjoutPanier(){
	echo ("<p>test</p>");
}


function LaunchSearch() {
	$bdd = new PDO('mysql:host=localhost;dbname=projetweb;charset=utf8','root','');
	
	$Name = isset($_POST['PName']) ? $_POST['PName'] : "";
	$Category = isset($_POST['Category']) ? $_POST['Category'] : "Tous les produits";
	$MinPrice = isset($_POST['MinPrice']) ? $_POST['MinPrice'] : 0;
	$MaxPrice = isset($_POST['MaxPrice']) ? $_POST['MaxPrice'] : 99999999999;
	$C1=0;
	$C2= 1;
	
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
			echo("<div class='DisplayedProduct' id='".$ans[0]."'>");
			echo("<div class='ProductName'><p> ".$ans[1]." </p></div>");
			echo("<div id='imgproduit' class='ProductPic'><img src='".$ans[4]."' /></div>");
			echo("<div class='prixbouton'><div class='Price'><p> ".$ans[3]." €</p></div>");
			echo("<button class='bouton'>Ajouter au panier</button></div></div>");

	
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

	<section id="TousLesProduits">
	<div id="banniere">	
		<h2>Tous les produits</h2>
	</div>
		<div class="Ph3 TLPcategories">
            <h3>Rechercher un produit</h3>
		</div>
			<div id="Recherche" class="TLPcategories">
                <div id="search" class="animate form">
                    <form method="post" action="" autocomplete="on">
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
								
								<p id="boutonRechercher" class="SearchButton">
									<input type="submit" value="Rechercher" />
								</p>
                        </form>
                    </div>                       
                </div>
				
			
		<div id="tlproduits" class="Ph3 TLPcategories">
            <h3>Tous les produits</h3>
		</div>
				<div id="products" class="TLPcategories">
	
				<?php LaunchSearch(); ?>

			</div>

	</section>
	
			<?php include('footer.php'); ?>

 