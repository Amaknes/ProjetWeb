<!DOCTYPE HTML>
<html>
    <head>
        <title>BDE CESI EXIA St Nazaire</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="css/fonts.css"/>
		<link rel="icon" type="image/png" href="Ressources/SiteImages/Site_Favicon4.png" />
    </head>
	<body>
    <header>
		<img src="Ressources/SiteImages/Site_Banner.png" alt="Bannière du site">
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
	
