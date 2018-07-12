<?php
include 'scriptNouveauProduit.php';

function Create_APIUser($Username,$Password){
	$PasswordCrypted = openssl_encrypt($Password,'aes128','R75CxT0wcYb+oNSuml9nMcocrJUpqAkLEPwN8OJrwE4=');
	setcookie($Username , $PasswordCrypted,time() + (86400 * 365), "/"); //Cookie qui dure un an
}

function LoginToAPI($Username,$Password){
  if($Password == openssl_decrypt($_COOKIE[$Username],'aes128','R75CxT0wcYb+oNSuml9nMcocrJUpqAkLEPwN8OJrwE4=')){
	return true;	
  }else{
	return false;
  }
 }

 switch($_SERVER['REQUEST_METHOD']){
	case'GET':
	header("HTTP/1.0 405 Methode GET non acceptee");
	break;
 
	case'PUT':
	header("HTTP/1.0 405 Methode PUT non acceptee");
	break;
 
	case'POST':
	$JSON_DATA = json_decode(file_get_contents('php://input'),TRUE);
	if(isset($JSON_DATA["Request"]) && isset($JSON_DATA["Username"]) && isset($JSON_DATA["Password"])){
	
		switch($JSON_DATA["Request"]){
			
			case "AccessRequest":
				Create_APIUser($JSON_DATA["Username"],$JSON_DATA["Password"]);
				header("HTTP/1.0 200 Acces cree");
			break;
			
			case "CreateProduct":
				LoginToAPI($JSON_DATA["Username"],$JSON_DATA["Password"]);
				if(isset($JSON_DATA["ProductName"]) && isset($JSON_DATA["Category"]) && isset($JSON_DATA["Price"]) && isset($JSON_DATA["URLImage"]))
				CreateNewproduct($JSON_DATA["ProductName"],$JSON_DATA["Category"],$JSON_DATA["Price"],$JSON_DATA["URLImage"])
				header("HTTP/1.0 200 Produit Cree");
				}else{
				header("HTTP/1.0 422 Requete invalide");	
				}
			break;
		
			case "TestLogin" :
				if(LoginToAPI($JSON_DATA["Username"],$JSON_DATA["Password"])){
				header("HTTP/1.0 200 Connexion Effectuee Correctement");
				}else{
				header("HTTP/1.0 401 Mauvais Identifiant ou Mot de Passe");
				}
			break;
			
			default:
				header("HTTP/1.0 422 Requete invalide");
				break;
			}
	
	}else{
		header("HTTP/1.0 401 Vous devez vous authentifier ou creer un acces");
	} 
 
	break;
 
	case 'DELETE':
	header("HTTP/1.0 405 Methode DELETE non acceptee");
	break;
 
	default:
	header("HTTP/1.0 405 Methode non acceptée");
	break;
}
?>