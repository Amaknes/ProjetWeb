<!DOCTYPE HTML>

<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->
 
<html>
<?php session_start(); ?>
		<?php include('header.php'); ?>
	
	
    <head>
		<link rel="stylesheet" type="text/css" href="css/accueilstyle.css">
        <title>BDE CESI EXIA St Nazaire</title>
		<h1>Boutique</h1>
    </head>
		
		
    <body>

		<section>
				<div id="Recherche">
                    <div id="search" class="animate form">
                        <form method="post" action="displayProducts.php" autocomplete="on">
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
            </section>
	
	
	
	
            <div class="products">
           <?php include("displayProducts.php"); ?>
			</div>
    </body>
	
		<?php include('footer.php'); ?>
	
</html>