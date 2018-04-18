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
	
	fwrite($List,"Prenom;Nom\n");
	
	foreach($getList as $ans){
		
		var_dump($ans);
		
		fwrite($List,$ans[0].";".$ans[1]."\n");
		
	}
	
	$getList->closeCursor();
	
	if (file_exists($FileName)) {
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename($List).'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($List));
		readfile($List);
		exit;
	}
	
	fclose($List);
	unlink($FileName);
?>