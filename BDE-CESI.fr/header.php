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
					<ul>
						<li> <a class="accueilnav" href="accueil.php">Accueil</a>
						</li>
						<li> <a class="evenementsnav" href="evenements.php">Événements</a>
							<ul class="submenu">
								<li><a href="AccueilEvenements.php">Accueil événements</a></li>
								<li><a href="EvenementListe.php">Tous les événements</a></li>
								<li><a href="BoiteAIdee.php">Propositions d'activités</a></li>
							</ul>
						</li>
						<li> <a class="boutiquenav" href="AccueilBoutique.php">Boutique</a>
							<ul class="submenu">
								<li><a href="AccueilBoutique.php">Accueil boutique</a></li>
								<li><a href="TousLesProduits.php">Tous les produits</a></li>
								<li><a href="Panier.php">Mon panier</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			
			
			
				<div class="session">

					<?php
						if(isset($_SESSION['Nom'])){
							$sessionfinale= ($_SESSION['Prenom']." ".$_SESSION['Nom']);
							echo "<p>$sessionfinale</p>";
							echo "<a class='sessionsignout' href='deconnexion.php'>Déconnexion</a>";;
					}else{
							echo "<a class='sessionsignup' href='inscription.php'>Inscription</a>";
							echo "<a class='sessionlogin' href='connexion.php'>Connexion</a>";
					}
					?>
				</div>
			</section>

		</header>
	
