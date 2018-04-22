<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>New</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	
</body>
</html>
<?php
include 'connect.php';
include 'shop_poo.php';






// ---------------------CREATE CLIENT & VENDEUR----------------------------------
if(!empty($_POST)){
$clients = new Client;
$clients->create($pdo);

$vendeurs = new Vendeur;
$vendeurs->create($pdo);
}
?>

<form method="POST">
	<input type="text" name="prenom" placeholder="Votre prénom" required>
	<input type="text" name="nom" placeholder="Votre nom" required>
	<input type="text" name="prenom_vendeur" placeholder="Le prénom de votre vendeur" required>
	<input type="text" name="nom_vendeur" placeholder="Le nom de votre vendeur" required>
	<input type="submit" name="valider_infos" value="Valider vos informations">
</form>