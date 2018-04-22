<?php

include 'connect.php';

if (isset($_POST['iday'])) {
	$iday = $_POST['iday'];//ce qu'on récupère du select
	$quet = $pdo->prepare("SELECT * FROM article WHERE id_article = $iday");
	$quet->execute();
	$requet = $quet->fetchAll();
	echo json_encode($requet[0]); //pour que ce qui nous est renvoyé soit du json, [0] car nous n'avons besoin que d'une ligne
}

?>