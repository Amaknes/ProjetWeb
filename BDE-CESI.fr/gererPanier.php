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
	
	$GetOrderID = $bdd->prepare("SELECT * FROM Orders WHERE IDUser = ? AND Status = 0");
	$GetOrderID->execute(array($UserId[0]));
	$OrderID = $GetOrderID->fetch();
	$GetOrderID->closeCursor();
	
	if(isset($OrderID[1])){
	
	}else{
		$getdate = $bdd->prepare("SELECT DATE( NOW())");
		$getdate->execute();
		$datenow = $getdate->fetch();
		
		$CreateOrder = $bdd->prepare("INSERT INTO Orders VALUES (?, 0, ?)");
		$CreateOrder->execute(array($datenow[0],$UserId[0]));
		$OrderID = $CreateOrder->fetch();
		$CreateOrder->closeCursor();
		}
	
	
	switch($RequestType){
		
		case "addingProducttopanier" :
		$CheckProduct = $bdd->prepare("SELECT * FROM Contain WHERE IDOrder = ? AND IDProduct = ?");
		$CheckProduct->execute($OrderID,$IdProduct));
		$CheckAns = $CheckProduct->fetch();
		
		if(isset($CheckAns[1])){
		$newQuantity = $CheckAns[0]+1;
		
		$ChangeQuantity = $bdd->prepare("UPDATE Contain SET Quantity = ? WHERE IDOrder = ? AND IDProduct = ?");
		$ChangeQuantity->execute($newQuantity,$OrderID,$IDProduct);
		}else{ 
		$AddProduct = $bdd->prepare("INSERT INTO Contain VALUES(1,?,?)");
		$AddProduct->execute($OrderID,$IDProduct);
		}
		
		break;
		case "addingOnetoPanier" :
		$CheckProduct = $bdd->prepare("SELECT * FROM Contain WHERE IDOrder = ? AND IDProduct = ?");
		$CheckProduct->execute($OrderID,$IdProduct));
		$CheckAns = $CheckProduct->fetch();
		
		$newQuantity = $CheckAns[0]+1;
		
		$ChangeQuantity = $bdd->prepare("UPDATE Contain SET Quantity = ? WHERE IDOrder = ? AND IDProduct = ?");
		$ChangeQuantity->execute($newQuantity,$OrderID,$IDProduct);
		
		break;
		case "removingOnefrompanier" :
		$CheckProduct = $bdd->prepare("SELECT * FROM Contain WHERE IDOrder = ? AND IDProduct = ?");
		$CheckProduct->execute($OrderID,$IdProduct));
		$CheckAns = $CheckProduct->fetch();
		
		$newQuantity = $CheckAns[0]-1;
		
		if($newQuantity <= 0){
			$DeleteProductFromOrder = $bdd->prepare("DELETE FROM Contain WHERE IDOrder = ? AND IDProduct = ?");
			$DeleteProductFromOrder->execute($OrderID,$IdProduct));
		}else{
			$ChangeQuantity = $bdd->prepare("UPDATE Contain SET Quantity = ? WHERE IDOrder = ? AND IDProduct = ?");
			$ChangeQuantity->execute($newQuantity,$OrderID,$IDProduct);	
		}
		
		break;
		case "removingProductfrompanier" :
		$DeleteProductFromOrder = $bdd->prepare("DELETE FROM Contain WHERE IDOrder = ? AND IDProduct = ?");
		$DeleteProductFromOrder->execute($OrderID,$IdProduct));
		break;
	}
	
	echo '<meta http-equiv="refresh" content="0;URL=Panier.php">';
			
?>