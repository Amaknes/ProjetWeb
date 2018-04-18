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
			$requete = $bdd->prepare("SELECT Activity,LastName,FirstName FROM Ideas INNER JOIN Users ON Users.IDUser = Ideas.IDUser WHERE IdeaFlag=false");
			$requete->execute();
			foreach($requete as $ans){
				echo '<div>';
					echo "<p class='IdeeName'>"+$ans[2]+" "+$ans[1]+"</p>";
					echo "<p class='IdeeContent'>"$ans[0]"</p>";
					if(isset($_SESSION['Status']))echo "<button>Voter pour cette idée</button>";
					if($_SESSION['Status']=2)echo "<button>Signaler comme inapproprié</button>";
					if($_SESSION['Status']=3)echo "<button>Créer un événement</button>";
				echo "</div>";
		?>
		
    </body>
	
	<?php include('footer.php'); ?>
	
</html>