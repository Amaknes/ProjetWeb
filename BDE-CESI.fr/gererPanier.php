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
	var_dump($UserId[0]);
	
	/*
	if($RequestType == 'addingfromlist'){
	
		if($CheckIsOrder != false) {
			
			
			if($CheckIsProduct != false) {
				
				
				addProduct()
				
			} else {}
			
			
		} else {
			
			newOrder()
			
		}

		
		$CheckCartNotEmpty = $bdd->prepare("
				SELECT Contain.IDOrder
				FROM Contain
				INNER JOIN `Orders` ON Contain.IDOrder = Orders.IDOrder
				WHERE Contain.IDProduct = ? AND Orders.IDUser = ? AND Orders.Status = 0
				");
	
		$IdProduct = "12";
	
		$CheckCartNotEmpty->execute(array($IdProduct,$UserId[0]));
		$CheckValue = $CheckCartNotEmpty->fetch();
		$CheckCartNotEmpty->closeCursor();
				
		
			
			
		var_dump($CheckValue);
				
				if($CheckValue != false) {
				
				$SQLReq = ("UPDATE Contain
				INNER JOIN `Orders` ON Contain.IDOrder = Orders.IDOrder
				INNER JOIN `Products` ON Products.IDProduct = Contain.IDProduct
				SET Quantity = (Quantity + 1)
				WHERE Contain.IDProduct = ? AND Orders.IDUser = ? AND Orders.Status = 0
				");
				
				} else {
					
					$SQLReq = ("INSERT INTO"
					
					
				}
		
			$CartOpe = $bdd->prepare($SQLReq);
		
			$CartOpe->execute(array($IdProduct, $UserId[0]));
			$CartOpe->closeCursor();
			
			$CleanOrders = $bdd->prepare("DELETE FROM Contain WHERE Quantity <= 0");
			$CleanOrders->closeCursor();
			$CleanOrders->execute();
			
			
			
	}
			*/
	echo '<meta http-equiv="refresh" content="0;URL=Panier.php">';
			
?>