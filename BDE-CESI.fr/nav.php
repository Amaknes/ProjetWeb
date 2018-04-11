<!DOCTYPE HTML>
<html>
    <nav>
		<a href="accueil.php">Accueil</a>
		<a href="evenements.php">Événements</a>
		<a href="boutique.php">Goodies</a>
		<?php
		if(isset($_SESSION['Nom'])){
			echo ("Bonjour".$_SESSION['Prenom']." ".$_SESSION['Nom']);
			echo "<a href='deconnexion.php'>Déconnexion</a>";
		}else{
			echo "<a href='inscription.php'>Inscription</a>";
			echo "<a href='connexion.php'>Connexion</a>";
		}
		?>
	</nav>
 
</html>