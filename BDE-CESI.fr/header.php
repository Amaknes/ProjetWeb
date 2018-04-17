<!DOCTYPE HTML>
<html>
    <head>
        <title>BDE CESI EXIA St Nazaire</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="css/fonts.css"/>
    </head>
	<body>
    <header>
		<div class="session">
		<?php
		if(isset($_SESSION['Nom'])){
			echo ($_SESSION['Prenom']." ".$_SESSION['Nom']);
			echo "<a href='deconnexion.php'>Déconnexion</a>";
		}else{
			echo "<a class='test' href='inscription.php'>Inscription</a>";
			echo "<a href='connexion.php'>Connexion</a>";
		}
		?>
		</div>
		
 	
	<div id="LogoBBE">
		<a href="accueil.php"> <img class="LogoBDE" img src="Ressources/SiteImages/BDE_CESI_logo_no_text.png" alt="LogoBDE"></a>
	</div>
	<nav>
		<a class="accueilnav" href="accueil.php">Accueil</a>
		<a class="evenementsnav" href="evenements.php">Événements</a>
		<a class="boutiquenav" href="boutique.php">Boutique</a>
	</nav>
	<div id="BDEHeader">
		<a href="accueil.php">BDE CESI Saint-Nazaire</a>
	</div>
	

	
    <div id="banniere">	
			<p> Site</p>
	</div>
	
	
    </header>
	
