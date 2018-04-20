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

		<script>
		function validateForm() {
		var Title = document.forms["CreateEvent"]["EventTitle"].value;
		var Date = document.forms["CreateEvent"]["EventDate"].value;
		var Price = document.forms["CreateEvent"]["Price"].value;
		var ImageURL = document.forms["CreateEvent"]["ImageURL"].value;
		var Description = document.forms["CreateEvent"]["Description"].value;
		
		if (Title == "") {
			alert("Veuillez entrer un titre, tout le monde ne lit pas vos pensées");
			return false;
			}
		if (Date == "") {
			alert("Les étudiants n'ayant pas des disponibilités jusqu'à la mort thermique de l'univers, je suggère que vous donniez une date");
			return false;
			}
		if (Price == "") {
			alert("Désolé, mais le trésorier a dit qu'il faut trouver plus d'argent");
			return false;
			}
		if (ImageURL == "") {
			alert("Vous imaginez un tableau exposé avec seulement une étiquette?");
			return false;
			}
		if (Description == "") {
			alert("Si vous ne mettez qu'un titre, c'est clair que dans votre tête je vous jure");
			return false;
			}
		} 
		</script>
		
		
		<form name="CreateEvent" method="post" action="scriptCreationEvenement.php" onsubmit="return validateForm()"  autocomplete="on">  
				<p> 
					<input id="EventTitle" name="EventTitle" type="text" placeholder="Titre de l'événement"/>
				</p>
				<p> 
					<input id="EventDate" name="EventDate" type="date"/>
				</p>
				<p> 
					<input id="Price" name="Price" type="text" placeholder="Prix de votre activité en euros"/>
				</p>
				<p> 
					<input id="ImageURL" name="ImageURL" type="text" placeholder="Entrez l'URL de votre image"/>
				</p>
				<p> 
					<textarea id="Description" name="Description" placeholder="Décrivez votre événement"></textarea>
				</p>
					<?php echo("<input type='text' name='id' value='".$IdIdea."' style='display:none;'/>"); ?>
				<p class="Confirm button"> 
					<button id="propose" type="submit">Envoyer l'événement</button>
				</p>
				
				
		</form>
</section>




	<?php include('footer.php'); ?>