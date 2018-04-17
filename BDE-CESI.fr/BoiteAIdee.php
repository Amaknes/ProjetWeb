<!DOCTYPE HTML>

<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->
 
<html>
	<?php 
		session_start(); 
		include('header.php'); 
	?>
	
	
    <head>
        <title>BDE CESI EXIA St Nazaire</title>
		<h2>Boite a Idées</h2>
    </head>
	
	
    <body>
		<h3>Proposer une idée</h3>
			
		<h3>Idées</h3>
		<?php
			$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');
			$requete = $bdd->prepare("SELECT * FROM Events INNER JOIN Users ON Users.IDUser = Comments.IDUser WHERE PicFlag=false");
			$requete->execute();
			foreach($requete as $ans){
				echo '<div>';
					echo "<p class='IdeeName'>""</p>";
					echo "<p class='IdeeContent'>" "</p>";
				echo "</div>";
		?>
		
    </body>
	
	<?php include('footer.php'); ?>
	
</html>