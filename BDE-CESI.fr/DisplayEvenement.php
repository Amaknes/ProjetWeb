<?php
$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');
$requete = $bdd->prepare("SELECT * FROM Events WHERE Selected = true");
$requete = execute();
$ans = $requete->fetch();
if(count($ans) == 1){
		echo "<h1>PAS OK</h1>";
	}else{  
	echo "<p class='EventTitle'>".$ans[1]."</p>";
	echo "<img src="$ans[4]">"
	echo "<p class='EventText'>".$ans[5]."</p>";
	}
?>