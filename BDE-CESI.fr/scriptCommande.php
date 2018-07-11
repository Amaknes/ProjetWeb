<?php

	session_start();
	
	
	$client = $_SESSION['Email'];
	$Total=0;
	
	$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');
	
	$requete3 = $bdd->prepare("SELECT orders.IDOrder,orders.IDUser,orders.OrderDate,users.FirstName,users.LastName,users.Email,contain.IDProduct,products.Name,contain.Quantity,products.Price FROM `contain`,orders,products,users WHERE contain.IDOrder=orders.IDOrder AND contain.IDProduct=products.IDProduct AND orders.IDUser=users.IDUser AND orders.Status='0' AND users.Email = ?");
	$requete3->execute(array($client));
	$ans3 = $requete3->fetch();	
	
		//$requete = $bdd->prepare("SELECT IDUser FROM Users WHERE Email = ?");
		$requete = $bdd->prepare("UPDATE orders,users SET orders.Status = '1' WHERE orders.IDUser = users.IDUser AND users.Email = ? AND orders.status=0");
		$requete->execute(array($client));
		$idclient = $requete->fetch();
	
	
		/*$requete2 = $bdd->prepare("UPDATE orders SET orders.Status = '1' WHERE orders.IDUser = users.IDUser AND users.Email = ?");
		$requete2->execute(array($idclient));*/
		
	if($ans3[8]>=1){
		
		$f_contact_email = "florentin.cheraud@viacesi.fr";
		$subject = "Commande ".$ans3[0]."";
		
		$from = "BDE.shop@cesi.fr";
		$body = "<html><body>\r\n";
		
		
		$body .= "<p>Une commande a été passée par <b>".$ans3[3]." ".$ans3[4]."</b></p>";
		$body .= "<p><b>Date de la commande : </b>".$ans3[2]."</p>";
		$body .= "<p><b>Contacter le client : </b>".$ans3[5]."</p>";
		
		$body .= "<table border=1 maxwidth='100%' cellpadding=5 cellspacing=0>";
		$body .= "<tr align=center><td><b>Produit</b></td><td><b>Prix à l'unité</b></td><td><b>Quantité</b></td><td><b>Sous-Total</b></td></tr>\r\n";
		
		$subtotal=$ans3[8]*$ans3[9];
		$Total=$Total+$subtotal;
		
		$body .= "<tr align=center><td>".$ans3[7]."</td><td>".$ans3[9]." €</td><td>".$ans3[8]."</td><td>".$subtotal." €</td></tr>\r\n";
		
		
		
	
		
		$requete4 = $requete3;
		foreach($requete4 as $ans4){
			$subtotal=$ans4[8]*$ans4[9];
			$Total=$Total+$subtotal;
			$body .= "<tr align=center><td>".$ans4[7]."</td><td>".$ans4[9]." €</td><td>".$ans4[8]."</td><td>".$subtotal." €</td></tr>\r\n";
			
		}
		
		$body .= "</table>";
		
		$body .= "<p><b>Montant total de la commande : ".$Total." €</b></p>";
		
		$body .= "</body></html> \r\n";

		$headers  = "From: $from\r\n";
		$headers .= "Content-type: text/html\r\n";

		/* Send eMail Now... */
		$m_true = mail($f_contact_email, $subject, $body, $headers);
		echo $m_true;
		
	}
	
	echo '<meta http-equiv="refresh" content="0;URL=Panier.php">';
		

	
?>