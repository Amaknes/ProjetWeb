<!DOCTYPE HTML>

<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->
 
<html>

	
    <head>
        <title>BDE CESI EXIA St Nazaire</title>
		<h2>inscription</h2>
    </head>
	
	<nav>
		<?php include('nav.php'); ?>
		<br>
	</nav>
	
    <body>
	
	<header>
		<?php include('header.php'); ?>
	</header>
	
        <?php
			$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');

			$Email = $_POST['Email'];
			$Password = $_POST['Password'];
			$requeteEmail = $bdd->prepare("SELECT * FROM users WHERE Email = ?");
			$requeteEmail->execute(array($Email));
			$test = $requeteEmail->fetch();
			if(count($test) == 1){
		// Requête préparée pour empêcher les injections SQL
			$requete = $bdd->prepare("INSERT INTO users (Email, Password) VALUES( :Email,:Password)");
			$requete->bindValue(':Email', $Email, PDO::PARAM_STR);
			$requete->bindValue(':Password', $Password, PDO::PARAM_STR);

			$requete->execute();
			}else echo "<h1>WHY IS THE FBI HERE ?!</h1>"; 
        ?>

    </body>
	
	<footer>
		<?php include('footer.php'); ?>
	</footer>
	
</html>