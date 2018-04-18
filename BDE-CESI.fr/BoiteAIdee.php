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
		<?phpif(isset($_SESSION['Status']))echo"<p>Vous devez être connectés pour pouvoir participer ou proposer une idée</p>";?>
		
						<p> 
                                    <label for="Activity" class="Activity">Activité </label>
                                    <input id="Activity" name="Activity" required="required" type="Activity" placeholder="Décrivez votre activité"/>
						</p>
                                
						<p class="Confirm button"> 
                                    <input type="submit" value="Proposer"/> 
						</p>
		<h3>Idées</h3>
		<?php
			$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');
			$requete = $bdd->prepare("SELECT * FROM Ideas INNER JOIN Users ON Users.IDUser = Ideas.IDUser WHERE PicFlag=false");
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