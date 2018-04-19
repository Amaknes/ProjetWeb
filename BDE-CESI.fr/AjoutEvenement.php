<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->
 <?php session_start(); ?>
	
	<?php include('header.php'); ?>

	
<div id="AjoutEvenement">
	<div id="banniere">	
		<h2>Ajouter un événement 
	</div>

		<form  method="post" action="scriptCreationEvenement.php" autocomplete="on">  
				<p> 
					<input id="EventTitle" name="EventTitle" required="required" type="text" placeholder="Titre de l'événement"></input>
				</p>
				<p> 
					<input id="EventDate" name="EventDate" required="required" type="date" placeholder="Date de l'événement en AAAA-MM-JJ" value="AAAA-MM-JJ"></input>
				</p>
				<p> 
					<input id="Price" name="Price" required="required" type="text" placeholder="Prix de votre activité en euros"></input>
				</p>
				<p> 
					<input id="ImageURL" name="ImageURL" required="required" type="text" placeholder="Entrez l'URL de votre image"></input>
				</p>
				<p> 
					<textarea id="Description" name="Description" required="required" type="text" placeholder="Décrivez votre événement" <?php if(isset($_SESSION['CacheEventContent'])){echo'value ="'.$_SESSION['CacheEventContent'].'"';} ?>></textarea>
				</p>
				<p class="Confirm button"> 
					<button id="propose" type="submit">Envoyer l'événement</button>
				</p>
				
				
		</form>
</div>

	<?php include('footer.php'); ?>