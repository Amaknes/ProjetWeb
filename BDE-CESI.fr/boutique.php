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
        <title>BDE CESI EXIA St Nazaire</title>
		<h2>Boutique</h2>
    </head>
		
		
    <body>


            <div class="products">
            <?php include("displayProducts.php"); ?>
			</div>
    </body>
	
		<?php include('footer.php'); ?>
	
</html>