<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CommandePoo</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
	session_start();
	include_once 'shop_poo.php';
	include_once 'connect.php';


	if (isset($_POST['valider_infos'])) {
		
		?>
		<div id="barre_infos">
			<p>Informations de la commande</p>
		</div>
		<form method="POST">
			<input type="date" name="date" value="<?php echo $_POST['date']; ?>" disabled>
			<!-- ici le $_POST prend la dernière valeur qui a été rentrée -->
			<input type="text" name="clients" value="<?php echo $_POST['select_client']; ?>" disabled>
			<input type="text" name="vendeurs" value="<?php echo $_POST['select_vendeur']; ?>" disabled>
		</form>

		<form>
			<table class='table'>
				<thead class='thead-dark'>
					<tr>
						<th scope='col'>Nom de l'article</th>
						<th scope='col'>Prix</th>
						<th scope='col'>Quantité</th>
						<th scope='col'>Prix total</th>
					</tr>
				</thead>
				<div id="ligne_ajout">
				</div>
		
				<tr>
					<th scope='col'>
						<select id="select_client" name='select_article' required>
							<option selected='Choisis ouesh'>Choisis ouesh</option>;
							<?php
							$articles = new Commande;
							$articles->create($pdo);
							?>
						</select>
					</th>
					<th id="col_prix" scope='col'></th>
					<th scope='col'><input id="col_quantite" type='number' min='0' name='quantité' placeholer='0' required></th>
					<th id="col_prixtotal" scope='col'></th>
				</tr>
			</table>
		</form>

		<input id="addArticle" type="submit" name="ajouter_article" value="Ajouter l'article">


		<input type="submit" name="valider_commande" value="Valider la commande">
		<?php
	}else{
		?>
		<div id="barre_infos">
			<p>Informations de la commande</p>
		</div>
		<form method="POST">
			<input type="date" name="date" required>
			<select name="select_client" required>
				<option selected="Choisis ouesh">Choisis ouesh</option>
				<?php
				$clients = new Client;
				$clients->read($pdo);
				?>
			</select>
			<select name="select_vendeur" required>
				<option selected="Choisis ouesh">Choisis ouesh</option>
				<?php
				$vendeurs = new Vendeur;
				$vendeurs->read($pdo);
				?>
			</select>
			<input type="submit" name="valider_infos" value="Valider les infos">
		</form>
		<?php
	}
	?>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="app.js"></script>
</body>
</html>