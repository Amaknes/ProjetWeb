<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=projetweb;charset=utf8','root','');
	$Email = $_POST['Email'];
	$Password = $_POST['Password'];
	$requeteConnexion = $bdd->prepare("SELECT * FROM users WHERE Email=? AND Password=?");
	$requeteConnexion->execute(array($Email,$Password));
				
				
		if(!$requeteConnexion->execute()){
			print_r($requeteConnexion->errorInfo());
				
		}
			
	$ans = $requeteConnexion->fetch();
	if(count($ans) == 1){
		echo"<script>";
		echo"alert('Echec de la connexion, veuillez vérifier votre Email ou votre mot de passe')";
		echo"</script>";
		echo '<meta http-equiv="refresh" content="0;URL=connexion.php">';
		/*$message = "<p class=\"red\">PAS OK.</p>";
		echo $message;*/
		$requeteConnexion->closeCursor();
	}else{
			$_SESSION['Nom'] = $ans[1];
			$_SESSION['Prenom'] = $ans[2];
			$_SESSION['Email'] = $Email;
			$_SESSION['Status'] = $ans[5];
			echo '<meta http-equiv="refresh" content="0;URL=accueil.php">';
	}
	$requeteConnexion->closeCursor();
			
?>