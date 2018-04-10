<!DOCTYPE HTML>
<html>
    <nav>
		<a href="accueil.php">Accueil</a>
		<a href="evenements.php">Événements</a>
		<a href="boutique.php">Goodies</a>
		<?php
		if($_SESSION['Nom'] == null){
			echo "<a href='inscription.php'>Inscription</a>"
			echo "<a href='connexion.php'>Connexion</a>"
		}else
			echo "<a>Déconnexion</a>"
		?>
	</nav>
 
</html>