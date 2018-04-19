<?php

	session_start();
	$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');

	$RequestType = $_POST['type'];
	$IdProduct = $_POST['idproduct'];
	$Email = ($_SESSION['Email']);

	$GetUserID = $bdd->prepare("SELECT IDUser FROM Users WHERE Email = ?");
	$GetUserID->execute(array($Email));
	$UserId = $GetUserID->fetch();
	$GetUserID->closeCursor();
	
	var_dump($IdProduct);
	var_dump($UserId[0]);/*
	$IdProduct = "5";
	$UserId[0] = "4";
	var_dump($IdProduct);
	var_dump($UserId[0]);*/
	$CheckCartNotEmpty = $bdd->prepare("
				SELECT Contain.IDOrder
				FROM Contain
				INNER JOIN `Orders` ON Contain.IDOrder = Orders.IDOrder
				WHERE Contain.IDProduct = :IdProduct AND Orders.IDUser = :UserId AND Orders.Status = 0
				");
				
	$CheckCartNotEmpty->bindValue(':IdProduct', $IdProduct, PDO::PARAM_STR);
	$CheckCartNotEmpty->bindValue(':UserId', $UserId[0], PDO::PARAM_STR);
	
	$result = $CheckCartNotEmpty->fetch();
	$CheckCartNotEmpty->closeCursor();
				
				var_dump($result);
				
				
				/*
				$SQLReq = ("UPDATE Contain
				INNER JOIN `Orders` ON Contain.IDOrder = Orders.IDOrder
				INNER JOIN `Products` ON Products.IDProduct = Contain.IDProduct
				SET Quantity = (Quantity + 1)
				WHERE Contain.IDProduct = :IdProduct AND Orders.IDUser = :UserId AND Orders.Status = 0
				");
				
		
			$CartOpe = $bdd->prepare($SQLReq);
	
			$CartOpe->bindValue(':IdProduct', $IdProduct, PDO::PARAM_STR);
			$CartOpe->bindValue(':UserId', $UserId[0], PDO::PARAM_STR);
			
		
			$CartOpe->execute();
			$CartOpe->closeCursor();
			
			$CleanOrders = $bdd->prepare("DELETE FROM Contain WHERE Quantity <= 0");
			$CleanOrders->closeCursor();
			$CleanOrders->execute();
			
			*/
			
			
			
			
	// echo '<meta http-equiv="refresh" content="0;URL=Panier.php">';
			
?>