<!DOCTYPE HTML>

<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->
 
<html>
<?php session_start(); ?>
	<header>
		<?php include('header.php'); ?>
	</header>
	
	
    <head>
        <title>BDE CESI EXIA St Nazaire</title>
		<h2>Accueil</h2>
    </head>
	
	
    <body>
	
        <?php
		if(isset($_SESSION['Nom'])){
		echo "<h3>Bonjour</h3>".$_SESSION['Prenom']." ".$_SESSION['Nom'];
		}else echo "Nope"
        ?>
		
    </body>
	
	<footer>
		<?php include('footer.php'); ?>
	</footer>
	
</html>