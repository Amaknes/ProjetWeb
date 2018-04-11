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
			
	$test = $requeteConnexion->fetch();
	if(count($test) == 1){
		echo "<h1>PAS OK</h1>";
		//$message = "<p class=\"red\">PAS OK.</p>";
		echo $message;
		$requeteConnexion->closeCursor();
	}else{ echo "<h1>OK</h1>";
			$_SESSION['Nom'] = $test[1];
			$_SESSION['Prenom'] = $test[2];
			echo '<meta http-equiv="refresh" content="0;URL=accueil.php">';
	}
	$requeteConnexion->closeCursor();
			
?>