<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Ece Amazon</title>
	  <!--font style-->
	  <link href="https://fonts.googleapis.com/css?family=BioRhyme+Expanded" rel="stylesheet">

	  <!--lien fichier css-->
		<link rel="stylesheet" media="screen" type="text/css" href="styles.css" />
	  
		<meta charset="utf-8">
		<!--adapt sur ordi ou tel ou tablette-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
	 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
	<h1>Menu vendeur</h1>
	<h2>Vos informations</h2>
	<div>
		<?php
			//identifier votre BDD
			$database = "piscine_test";
			//connectez-vous dans votre BDD
			//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
			$db_handle = mysqli_connect('localhost', 'root', '');
			$db_found = mysqli_select_db($db_handle, $database);
			if ($db_found)
			{
				echo "Connecté à la base de donnée";
			}
			else
			{
				echo "Database not found";
			}
			//affiche le nom et le prenom du vendeur
		?>
		<br/>
	</div>
	<h2>voulez vous changer votre fond d'écran ?</h2>
	<p>Voici votre fond d'écran</p>
	<!--ici on va chercher le nom de la photo dans la base de donnée et on affiche la photo stockée sur le serveur-->
	<?php 
		
	?>
</body>
</html>