<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->

 <?php

<<<<<<< HEAD
$dir = "Ressources/SiteImages/Products/*png";
=======
$dir = "Ressources/Products/*png";
>>>>>>> b479d5e9a50f1a29b6b6956b1f633fd04d393e8b
$images = glob( $dir );

foreach( $images as $image ):
    echo "<div class='displayprod'>
	<img src='" . $image . "', class='prodpic' />
		<div class='price'> 150€ </div>
		<div class='description'> 
			Foot control and protection with active comfort provided through a stable chassis ...
		</div>
	</div>";
endforeach;

?>