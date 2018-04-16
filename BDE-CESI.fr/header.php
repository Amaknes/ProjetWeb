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
	
