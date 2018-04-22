<?php

include 'connect.php';

if (isset($_POST['quantitephp'])) {
	$iday = $_POST['iday'];//ce qu'on récupère du select
	$prixphp = $_POST['prixphp'];
	$quantitephp = $_POST['quantitephp'];
	$prixTotalphp = $_POST['prixTotalphp'];
	$requete = $pdo->prepare("INSERT INTO panier VALUES ('$quantitephp', 'id_commande', 'id_article')");
	$requete->execute();
	$requeteFinale = $requete->fetchAll();
	// echo json_encode($requeteFinale[0]); //pour que ce qui nous est renvoyé soit du json, [0] car nous n'avons besoin que d'une ligne
	foreach ($requeteFinale as $row) {
	echo "<tr><th scope='col'>".$iday."</th><th>".$prixphp."</th><th>".$quantitephp."</th><th scope='col'>".$prixTotalphp."</th></tr>";
	}

}
?>