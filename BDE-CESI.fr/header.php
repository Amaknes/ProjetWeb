<!DOCTYPE HTML>
<html>
    <head>
        <title>BDE CESI EXIA St Nazaire</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="css/fonts.css"/>
		<link rel="icon" type="image/png" href="Ressources/SiteImages/Site_Favicon5.png" />
    </head>
	<body>
		<header>
			<section id="top">
				<div id="LogoBDE">
					<a href="accueil.php"> <img class="LogoBDE" img src="Ressources/SiteImages/BDE_CESI_logo_no_text.png" alt="LogoBDE"></a>
				</div>

				<div id="BDEHeader">
					<a href="accueil.php"><h1><span>BDE </span><span>CESI </span><span>Saint-Nazaire </span></h1></a>
				</div>
			
				<nav>
					<a class="accueilnav" href="accueil.php">Accueil</a>
					<a class="evenementsnav" href="evenements.php">Événements</a>
					<a class="boutiquenav" href="boutique.php">Boutique</a>
				</nav>
			
				<div class="session">

					<?php
						if(isset($_SESSION['Nom'])){
							echo ($_SESSION['Prenom']." ".$_SESSION['Nom']);
							echo "<a href='deconnexion.php'>Déconnexion</a>";
						}else{
							echo "<a class='sessionsignup' href='inscription.php'>Inscription</a>";
							echo "<a class='sessionlogin' href='connexion.php'>Connexion</a>";
						}
					?>
				</div>
			</section>

		</header>
	
