<?php session_start(); ?>
<?php include('header.php'); ?>
<link rel="stylesheet" href="css/caroussel.css"/>
<script type="text/javascript" src="js/Caroussel.js"></script>			
	<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->

<content id="Accueil">
	<div id="banniere">	
		<h2>Accueil</h2>
	</div>
	
	<div id="EventAccueil">
		
		<div>
			<h3>Événement à venir</h3>
		</div>
		<div>
			<img id="bde_img" class="img" src="Ressources/SiteImages/BDE.png">
		</div>
	</div>
	
	<div id="VentesAccueil">
		
		<div>
			<h3>Meilleures ventes</h3><!--caroussel-->
		</div>
		
		<!-- slideshow container -->
		<div class="slideshow-container">

		<!-- Full-width images with number and caption text -->
			<div class="mySlides fade">
				<div class="numbertext">1 / 3</div>
			<img src="Ressources/Products/Gobelet_BDE.png" style="height:100%">
			<div class="text">Meilleure vente</div>
			</div>

			<div class="mySlides fade">
				<div class="numbertext">2 / 3</div>
			<img src="Ressources/Products/Sandwich_Elior.png" style="height:100%">
				<div class="text">Deuxième meilleure vente</div>
			</div>

			<div class="mySlides fade">
					<div class="numbertext">3 / 3</div>
				<img src="Ressources/Products/4L.png" style="height:100%">
					<div class="text">Troisième meilleure vente</div>
			</div>

			<!-- Next and previous buttons -->
			<a class="prev" onclick="plusSlides(-1)"></a>
			<a class="next" onclick="plusSlides(1)"></a>
		</div>
		<br>

		<!-- The dots/circles -->
		<div style="text-align:center">
		<span class="dot" onclick="currentSlide(1)"></span> 
		<span class="dot" onclick="currentSlide(2)"></span> 
		<span class="dot" onclick="currentSlide(3)"></span> 
		</div>
		
	</div>
	
	
	<div id="NousAccueil">
		<div>
			<h3>Qui sommes-nous?</h3>
		</div>
		<div>
			<img id="bde_img" class="img" src="Ressources/SiteImages/BDE.png">
		</div>
				<p>Martine Durand, Jacquie Michel, Flavien Spataro, Judith Felix, Paul Berger</p>
	</div>	
	
</content>



		<?php include('footer.php'); ?>
