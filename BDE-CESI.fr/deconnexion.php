﻿<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->
 
 <?php
	session_start();
	unset($_SESSION['Nom']);
	unset($_SESSION['Prenom']);
	unset($_SESSION['Email']);
	unset($_SESSION['Status']);
	echo '<meta http-equiv="refresh" content="0;URL=accueil.php">' 
 ?>