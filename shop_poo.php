<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	

	<?php
	include 'connect.php';

	class Client{

		function read($db){
			$reqclient = $db->prepare("SELECT * FROM client");
			$reqclient->execute();
			$reqClient = $reqclient->fetchAll();

			foreach ($reqClient as $row) {
				echo "<option value='".$row['id_client']."'>".$row['prenom_client']." ".$row['nom_client']."</option>";
			}
		}

		function create($db){
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];

			$createclient = $db->prepare("INSERT INTO client VALUES(NULL, '$nom', '$prenom')");
			$createclient->execute();
		}
	}

	class Vendeur{

		function read($db){
			$reqvendeur = $db->prepare("SELECT * FROM vendeur");
			$reqvendeur->execute();
			$reqVendeur = $reqvendeur->fetchAll();

			foreach ($reqVendeur as $row) {
				echo "<option value='".$row['id_vendeur']."'>".$row['prenom_vendeur']." ".$row['nom_vendeur']."</option>";
			}
		}

		function create($db){
			$nom_vendeur = $_POST['nom_vendeur'];
			$prenom_vendeur = $_POST['prenom_vendeur'];

			$createvendeur = $db->prepare("INSERT INTO vendeur VALUES(NULL, '$nom_vendeur', '$prenom_vendeur')");
			$createvendeur->execute();
		}
	}

	class Panier {
		function create($db){
			$stmt = $db->prepare("SELECT * FROM article");
			$stmt->execute();

			foreach ($stmt as $row) {
				echo "<option value='".$row['id_article']."'>".$row['nom_article']."</option>";
			}
		}
	}

	class Commande{
		function create($db){
			$stmt = $db->prepare("SELECT * FROM article");
			$stmt->execute();

			foreach ($stmt as $row) {
				echo "<option value='".$row['id_article']."'>".$row['nom_article']."</option>";
			}
		}
	}

	?>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</body>
</html>