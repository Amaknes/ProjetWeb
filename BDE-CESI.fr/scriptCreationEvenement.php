<?php
session_start();

$title = $_POST['EventTitle'];
$date = $_POST['EventDate'];
$price = $_POST['Price'];
$imageurl = $_POST['ImageURL'];
$description = $_POST['Description'];

$bdd = new PDO('mysql:host=localhost; dbname=projetweb; charset=utf8', 'root', '');
		$requete = $bdd->prepare("INSERT INTO Ideas (Name, EventDate, Price, UrlImage, Description, Selected) VALUES( :Name, :Date, :Price, :UrlImage, :Description, false) ");
		$requete->bindValue(':Name', $title, PDO::PARAM_STR);
		$requete->bindValue(':Date', $date, PDO::PARAM_STR);
		$requete->bindValue(':Price', $price, PDO::PARAM_STR);
		$requete->bindValue(':UrlImage', $imageurl, PDO::PARAM_STR);
		$requete->bindValue(':Description', $description, PDO::PARAM_STR);
		$requete->execute()













?>