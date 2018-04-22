<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Commande</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	
</body>
</html>
<?php

include 'connect.php';
include 'shop_poo.php';

echo "<form><table class='table'><thead class='thead-dark'><tr>";
echo "<th scope='col'>Nom de l'article</th>";
echo "<th scope='col'>Prix</th>";
echo "<th scope='col'>Quantité</th></tr></thead>";

$articles = new Commande;
$articles->create($pdo);
?>

<table class="table">
	<thead class="thead-dark">