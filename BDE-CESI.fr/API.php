<?php
function Create_APIUser($Username,$Password){
	$PasswordCrypted = openssl_encrypt($Password,'aes128','R75CxT0wcYb+oNSuml9nMcocrJUpqAkLEPwN8OJrwE4=');
	setcookie($Username , $PasswordCrypted,time() + (86400 * 365), "/"); //Cookie qui dure un an
}

function LoginToAPI($Username,$Password){
  if($Password == openssl_encrypt($_COOKIE[$Username],'aes128','R75CxT0wcYb+oNSuml9nMcocrJUpqAkLEPwN8OJrwE4=')){
	return TRUE;	
  }else{
	return FALSE;
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
 
 break;
 
 case 'DELETE':
 header("HTTP/1.0 405 Methode DELETE non acceptee");
 break;
 
 default:
 header("HTTP/1.0 405 Methode non acceptée");
 break;
}
?>