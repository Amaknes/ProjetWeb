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
	//var_dump($UserId);
	
		$DeleteProductFromCart = $bdd->prepare(
			"UPDATE Contain
			INNER JOIN `Orders` ON Contain.IDOrder = Orders.IDOrder
			INNER JOIN `Products` ON Products.IDProduct = Contain.IDProduct
			SET Quantity = (Quantity-1)
			WHERE Contain.IDProduct = :IdProduct AND Orders.IDUser = :UserId AND Orders.Status = 0
			");
	
		$DeleteProductFromCart->bindValue(':IdProduct', $IdProduct, PDO::PARAM_STR);
		$DeleteProductFromCart->bindValue(':UserId', $UserId[0], PDO::PARAM_STR);
		
		$DeleteProductFromCart->execute();
		$DeleteProductFromCart->closeCursor();
			
			$CleanOrders = $bdd->prepare("DELETE FROM Contain WHERE Quantity <= 0");
			$CleanOrders->execute();
			$CleanOrders->closeCursor();
			
			
			
			
			
			
			
			
?>