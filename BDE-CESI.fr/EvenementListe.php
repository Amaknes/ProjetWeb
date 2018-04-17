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
		<h2>Liste des Événements</h2>
    </head>
	
	<body>
		<?php
			$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');
			$requete = $bdd->prepare("SELECT * FROM Events");
			$requete->execute();
			foreach($requete as $ans){
				echo '<div href ="EvenementUnique.php?id='.$ans[0].'">';
					echo "<p class='EventTitle'>".$ans[1]."</p>";
					echo '<img class="EventThumbnail" src="'.$ans[4].'"/>';
					echo "<p class='EventText'>".$ans[5]."</p>";
				echo "</div>";
			}
		?>
	</body>
	
	<footer>
		<?php include('footer.php'); ?>
	</footer>
</html>