<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->
 <?php session_start(); ?>
	
	<head>
	<link rel="stylesheet" href="css/BoiteAIdees.css"/>
	</head>
	<?php include('header.php'); ?>

	
<content id="AjoutEvenement">
	<div id="banniere">	
		<h2>Ajouter un événement 

<form  method="post" action="scriptCreationEvenement.php" autocomplete="on">  
				<p> 
					<textarea id="EventTitle" name="EventTitle" required="required" type="text" placeholder="Titre de l'événement" <?php if(isset($_SESSION['CacheEventTitle']))echo"value ="$_SESSION['CacheEventTitle']"" ?>></textarea>
				</p>
				<p> 
					<textarea id="EventDate" name="EventDate" required="required" type="date" placeholder="Date de l'événement en AAAA-MM-JJ" value="AAAA-MM-JJ"></textarea>
				</p>
				<p> 
					<textarea id="Price" name="Price" required="required" type="text" placeholder="Quel sera le prix de votre activité?"></textarea>
					€
				</p>
				<p> 
					<textarea id="ImageURL" name="ImageURL" required="required" type="text" placeholder="Entrez l'URL de votre image"></textarea>
				</p>
				<p> 
					<textarea id="Description" name="Description" required="required" type="text" placeholder="Décrivez votre événement"></textarea>
				</p>
				<p class="Confirm button"> 
					<button id="propose" type="submit">Envoyer l'événement</button>
				</p>
			</form>