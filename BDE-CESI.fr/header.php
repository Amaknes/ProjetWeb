<!DOCTYPE HTML>
<html>
    <header>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="style.css" />
		
		<img src="Ressources/SiteImages/Site_Banner.png">
	
		<div>
		<?php
		if(isset($_SESSION['Nom'])){
			echo ($_SESSION['Prenom']." ".$_SESSION['Nom']);
			echo "<a href='deconnexion.php'>Déconnexion</a>";
		}else{
			echo "<a href='inscription.php'>Inscription</a>";
			echo "<a href='connexion.php'>Connexion</a>";
		}
		?>
		</div>
		

		
			<?php include('nav.php');?>
			<br>

	
    </header>
 
</html>