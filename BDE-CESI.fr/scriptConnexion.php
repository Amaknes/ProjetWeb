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
		echo "<h1>PAS OK</h1>";
		//$message = "<p class=\"red\">PAS OK.</p>";
		echo $message;
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