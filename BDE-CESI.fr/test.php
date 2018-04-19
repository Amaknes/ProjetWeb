<?php
	
	ini_set ("SMTP","smtp.gmail.com");
	ini_set ("smtp_port","587");
	//ini_set("sendmail_from","<email-address>@gmail.com>");
	
	//mail('matthis.moyon@viacesi.fr', 'Votre proposition a été sélectionnée !', 'Félicitation ! Votre proposition a été sélectionnée par un membre du BDE qui a créé un événement à partir de celle-ci. Venez vite voir le résultat sur le site du BDE CESI Saint-Nazaire !');


	
	
$mail = 'matthis.moyon@viacesi.fr'; // Déclaration de l'adresse de destination.

//$passage_ligne = "\r\n";
$passage_ligne = "\n";


$message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP.";

 
//=====Création de la boundary
$boundary = "-----=".md5(rand());

 
//=====Définition du sujet.
$sujet = "test";

 
//=====Création du header de l'e-mail.
$header = "From: \"MM\"<matthis.moyon@viacesi.fr>".$passage_ligne;
$header.= "Reply-to: \"MM\" <matthis.moyon@viacesi.fr>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========
 
//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========

$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========
 
//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
//==========

?>