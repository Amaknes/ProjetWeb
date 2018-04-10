<?php
			$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');

			$Email = $_POST['Email'];
			$Password = $_POST['Password'];
			$FirstName = $_POST['Prenom'];
			$LastName = $_POST['Nom'];
			$requeteEmail = $bdd->prepare("SELECT * FROM users WHERE Email = ?");
			$requeteEmail->execute(array($Email));
			$test = $requeteEmail->fetch();
			if(count($test) == 1){
		// Requête préparée pour empêcher les injections SQL
			$requete = $bdd->prepare("INSERT INTO users (LastName, FirstName, Email, Password) VALUES( :Nom, :Prenom, :Email,:Password)");
			$requete->bindValue(':Nom', $LastName, PDO::PARAM_STR);
			$requete->bindValue(':Prenom', $FirstName, PDO::PARAM_STR);
			$requete->bindValue(':Email', $Email, PDO::PARAM_STR);
			$requete->bindValue(':Password', $Password, PDO::PARAM_STR);

			if(!$requete->execute()){
				print_r($requete->errorInfo());
				
			}
			echo $Email;
			}else echo "<h1>WHY IS THE FBI HERE ?!</h1>"; 
?>