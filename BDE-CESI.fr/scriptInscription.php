<?php
			session_start();
			$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');

			$Email = $_POST['Email'];
			$Password = $_POST['Password'];
			$FirstName = $_POST['Prenom'];
			$LastName = $_POST['Nom'];
			$PasswordConfirm = $_POST['PasswordConfirm'];

			$requeteEmail = $bdd->prepare("SELECT * FROM users WHERE Email = ?");
			$requeteEmail->execute(array($Email));
			$test = $requeteEmail->fetch();
			if(count($test) == 1){
		// Requête préparée pour empêcher les injections SQL
					if (strlen($Password) >= 8 && preg_match('/(?=.*[0-9])[A-Z]|(?=.*[A-Z])[0-9]/', $Password)) //le mot de passe doit contenir au moins un chiffre et une majuscule
					{
						if ( $_POST['PasswordConfirm'] != $_POST['Password'] ){
							echo"<script>";
							echo"alert('Les deux mots de passe sont différents')";
							echo"</script>";
							echo '<meta http-equiv="refresh" content="0;URL=inscription.php">';
						}
						else{
							echo 'Mot de passe conforme';
						
								//if (preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $Email)) {
								if (preg_match('#^[\w.-]+@(cesi.fr|viacesi.fr)$#i', $Email)) //Accepte uniquement les addresses finissant par cesi.fr ou viacesi.fr
								{  
									echo 'Cet email est correct.';

			
									$requete = $bdd->prepare("INSERT INTO users (LastName, FirstName, Email, Password) VALUES( :Nom, :Prenom, :Email,:Password)");
									$requete->bindValue(':Nom', $LastName, PDO::PARAM_STR);
									$requete->bindValue(':Prenom', $FirstName, PDO::PARAM_STR);
									$requete->bindValue(':Email', $Email, PDO::PARAM_STR);
									$requete->bindValue(':Password', $Password, PDO::PARAM_STR);
					
									$requete->execute();
									$_SESSION['Nom'] = $LastName;
									$_SESSION['Prenom'] = $FirstName;
									$_SESSION['Email'] = $Email;
									$_SESSION['Status'] = 1;
									/*echo $LastName;
									echo $FirstName;
									echo $Email;
									echo $Password;
									echo $PasswordConfirm;*/
						
									echo '<meta http-equiv="refresh" content="0;URL=accueil.php">';
					
								}
									else {
									echo"<script>";
									echo"alert('Cet email a un format non adapté. (Veuillez vous connecter avec votre addresse mail cesi.)')";
									echo"</script>";
									echo '<meta http-equiv="refresh" content="0;URL=inscription.php">';
									}
						}
					
					}
					else{ 
					//echo "pb";

					echo"<script>";
					echo"alert('Votre mot de passe nest pas conforme')";
					echo"</script>";
					echo '<meta http-equiv="refresh" content="0;URL=inscription.php">';
					//echo 'Mot de passe non conforme';

					} 	
			}
			//echo $Email;
			//else echo "<h1>WHY IS THE FBI HERE ?!</h1>";	
?>