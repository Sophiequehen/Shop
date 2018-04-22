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
if(!empty($_POST)){//pour éviter d'envoyer un formulaire dès qu'on arrive sur la page

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$nom_vendeur = $_POST['nom_vendeur'];
$prenom_vendeur = $_POST['prenom_vendeur'];

// ---------------------CREATE CLIENT & VENDEUR----------------------------------


$createclient = $pdo->prepare("INSERT INTO client VALUES(NULL, '$nom', '$prenom')");
$createclient->execute();

$createvendeur = $pdo->prepare("INSERT INTO vendeur VALUES(NULL, '$nom_vendeur', '$prenom_vendeur')");
$createvendeur->execute();
}

?>

<form method="POST">
	<input type="text" name="nom" placeholder="Votre nom" required>
	<input type="text" name="prenom" placeholder="Votre prénom" required>
	<input type="text" name="nom_vendeur" placeholder="Le nom de votre vendeur" required>
	<input type="text" name="prenom_vendeur" placeholder="Le prénom de votre vendeur" required>
	<input type="submit" name="valider_infos" value="Valider vos informations">
</form>