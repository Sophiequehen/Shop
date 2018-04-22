<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	
</body>
</html><?php
// ------------------------database connect------------------------
$host = '127.0.0.1';
$dbname = 'Shop';
$username = 'root';
$password = 'simplon';
$charset = 'utf8';
$collate = 'utf8_unicode_ci';
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_PERSISTENT => false,
	PDO::ATTR_EMULATE_PREPARES => false,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $charset COLLATE $collate"
];

$pdo = new PDO($dsn, $username, $password, $options);
// -------------------end database connect----------------------------
// ---------------------------COMMANDE----------------------------------
if (isset($_POST['date'])) {

$date = $_POST['date'];
$idclient = $_POST['select_client'];
$idvendeur = $_POST['select_vendeur'];
	
$reqdate = $pdo->prepare("INSERT INTO commandes (date_commande, id_client, id_vendeur) VALUES('$date', '$idclient', '$idvendeur')");
$reqdate->execute();
}

$reqclient = $pdo->prepare("SELECT * FROM client");
$reqclient->execute();
$reqClient = $reqclient->fetchAll();

$reqvendeur = $pdo->prepare("SELECT * FROM vendeur");
$reqvendeur->execute();
?>

<form method="POST">
	<input type="date" name="date" required>
	<select name="select_client" required>
		<?php
		foreach ($reqClient as $row) {
		echo "<option value='".$row['id_client']."'>".$row['prenom_client']." ".$row['nom_client']."</option>";
		}
		?>
	</select>
	<select name="select_vendeur" required>
		<?php
		foreach ($reqvendeur as $row) {
			echo "<option value='".$row['id_vendeur']."'>".$row['prenom_vendeur']." ".$row['nom_vendeur']."</option>";
		}
		?>
	</select>
	<input type="submit" name="valider_commande" value="Valider la commande">
</form>

