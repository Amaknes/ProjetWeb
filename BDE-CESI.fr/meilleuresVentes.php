<?php

function MeilleuresVentesRequest() {
	$bdd = new PDO('mysql:host=localhost;dbname=projetweb;charset=utf8','root','');
	
	$Request = "SELECT `Name`, `URLImage`
				FROM `products`
				INNER JOIN(
				SELECT IDProduct, SUM(Quantity)
				FROM `orders`
				INNER JOIN `contain` ON `contain`.IDOrder = `orders`.IDOrder
				GROUP BY `IDProduct`
				ORDER BY SUM(Quantity) DESC)
				temptable
				ON products.IDProduct = temptable.IDProduct";
	
	$requeteConnexion = $bdd->prepare($Request);
	$requeteConnexion->execute();
	
	if(!$requeteConnexion->execute()){
		print_r($requeteConnexion->errorInfo());
	$requeteConnexion->closeCursor();
	}
	
	if ($requeteConnexion != null) {
		echo '<div class="slideshow-container">';
		for ($i = 0; $i <= 2; $i++) {
			$ans = $requeteConnexion->fetch();
				
				echo('<div class="mySlides fade">
					<div class="numbertext">'.($i+1).' / 3</div>
					<img src="'.$ans[1].'" style="height:100%" alt="meilleure vente">
					<div class="text">'.$ans[0].'</div></div>');
		}
		echo '<a class="prev" onclick="plusSlides(-1)"></a>
				<a class="next" onclick="plusSlides(1)"></a>
				</div>
				<br>
				<div style="text-align:center">
				<span class="dot" onclick="currentSlide(1)"></span> 
				<span class="dot" onclick="currentSlide(2)"></span> 
				<span class="dot" onclick="currentSlide(3)"></span> 
				</div>';
	}
	
	$requeteConnexion->closeCursor();
}

	MeilleuresVentesRequest();

?>