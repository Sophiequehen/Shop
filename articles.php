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


$stmt = $pdo->prepare("SELECT * FROM article");
$stmt->execute();

?>

<?php
	echo "<form><table class='table'><thead class='thead-dark'><tr>";
	echo "<th scope='col'>Nom de l'article</th>";
	echo "<th scope='col'>Prix</th>";
	echo "<th scope='col'>Quantité</th></tr></thead>";

foreach ($stmt as $row) {

	echo "<tr><th scope='col'>".$row['nom_article']."</th>";
	echo "<th scope='col'>".$row['prix_article']."</th>";
	echo "<th scope='col'><input type='number' min='0' name='quantité' placeholer='0'</th></tr>";

}
?>

<table class="table">
  <thead class="thead-dark">