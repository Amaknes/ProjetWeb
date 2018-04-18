<?php

	$IDEvent = $_GET['id'];
	$FileName = "Liste_des_participants.csv";
	
	$bdd = new PDO('mysql:host=localhost;dbname=projetweb;charset=utf8','root','');
	$getList = $bdd->prepare("SELECT FirstName,LastName
		FROM Users
		INNER JOIN Participate
		ON Users.IDUser = Participate.IDUser
		INNER JOIN Events
		ON Events.IDEvent = Participate.IDEvent
		WHERE Events.IDEvent = ?");
		
	$getList->execute(array($IDEvent));
				
				
	if(!$getList->execute()){
		print_r($getList->errorInfo());
	}

	$List = fopen($FileName, "w") or die("Impossible d'ouvrir le fichier!");
	
	echo("Prénom;Nom\n");
	
	foreach($getList as $ans){
		echo($ans[0].";".$ans[1]."\n");
	}
	
	fclose($List);
		
	$getList->closeCursor();
	
	if (file_exists($FileName)) {
		header('Content-Description: File Transfer');
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Length: ' . filesize($FileName));
		readfile($FileName);
		exit;
	}

	unlink($FileName);
?>