<?php
			session_start();
			$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');

			$Name = $_POST['Name'];
			$Category = $_POST['Category'];
			$Price = $_POST['Price'];
			$UrlImage = $_POST['UrlImage'];

			$requeteName = $bdd->prepare("SELECT * FROM products WHERE Name = ?");
			$requeteName->execute(array($Name));
			$test = $requeteName->fetch();
			if(count($test) == 1){
			
									$requete = $bdd->prepare("INSERT INTO products (Name, Category, Price, UrlImage) VALUES( :Name, :Category, :Price,:UrlImage)");
									$requete->bindValue(':Name', $Name, PDO::PARAM_STR);
									$requete->bindValue(':Category', $Category, PDO::PARAM_STR);
									$requete->bindValue(':Price', $Price, PDO::PARAM_STR);
									$requete->bindValue(':UrlImage', $UrlImage, PDO::PARAM_STR);
					
									$requete->execute();
									
						
									echo '<meta http-equiv="refresh" content="0;URL=TousLesProduits.php">';
					
			}
			else{ 
				echo"<script>";
				echo"alert('Ce nom correspond déjà à un produit')";
				echo"</script>";
				echo '<meta http-equiv="refresh" content="0;URL=NouveauProduit.php">';
			} 	
			
?>