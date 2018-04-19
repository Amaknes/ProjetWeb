<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->
<?php session_start(); ?>
<?php include('header.php'); ?>
<?php $IdIdea = isset($_POST['id']) ? $_POST['id'] : "";?>



<section id="AjoutEvenement">
	<div id="banniere">	
		<h2>Ajouter un événement </h2>
	</div>

		<form  method="post" action="scriptCreationEvenement.php" autocomplete="on">  
				<p> 
					<input id="EventTitle" name="EventTitle" required="required" type="text" placeholder="Titre de l'événement"/>
				</p>
				<p> 
					<input id="EventDate" name="EventDate" required="required" type="date"/>
				</p>
				<p> 
					<input id="Price" name="Price" required="required" type="text" placeholder="Prix de votre activité en euros"/>
				</p>
				<p> 
					<input id="ImageURL" name="ImageURL" required="required" type="text" placeholder="Entrez l'URL de votre image"/>
				</p>
				<p> 
					<textarea id="Description" name="Description" required="required" placeholder="Décrivez votre événement" <?php if(isset($_SESSION['CacheEventContent'])){echo'value ="'.$_SESSION['CacheEventContent'].'"';} ?>></textarea>
				</p>
				<input type='text' name='id' value='<?php $IdIdea?>' style='display:none;'/>
				<p class="Confirm button"> 
					<button id="propose" type="submit">Envoyer l'événement</button>
				</p>
				
				
		</form>
</section>

	<?php include('footer.php'); ?>