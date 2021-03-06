<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=BioRhyme+Expanded" rel="stylesheet">

  <!--lien fichier css-->
  <link rel="stylesheet" media="screen" type="text/css" href="styles.css">
  
  <meta charset="utf-8">
  <!--adapt sur ordi ou tel ou tablette-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>	
</head>
<body>
	<?php include("menu.php"); ?>
	<center id="bottom_body">
		<h1>Menu acheteur</h1>
		<h2>Vos informations</h2>
		<?php
			$email = $_SESSION["email"];

			//connexion BDD
			$database = "piscine_test";
			$db_handle = mysqli_connect('localhost', 'root', '');
			$db_found = mysqli_select_db($db_handle, $database);

			if ($db_found)
			{
				$sql = "SELECT * FROM `utilisateur` WHERE `utilisateur_email` LIKE '$email'";
				$result = mysqli_query($db_handle, $sql);
				if($result != NULL)
				{	
					while ($data = mysqli_fetch_assoc($result)) 
					{
						//photo de profil
						echo "<img src=\"" . $data['utilisateur_photo'] . "\" width=\"100\" height=\"100\"/><br/>";
						//nom et prenom
						echo "Nom:" . $data['utilisateur_nom'] . '<br>';
						echo "Prénom: " . $data['utilisateur_prenom'] . '<br>';
					}
				}
			}
		?>
	
		</div>
			<div>
			<h2>Changer votre photo de profil ?</h2>
			<form action="upload_profil_pic.php" method="post" enctype="multipart/form-data">
				<input type="file" name="monfichier"/>
				<!--pour envoyer l'email à l'autre page inclusien d'une php qui retourne l'email
				note, plus tard il faudra récupérer l'email depuis cette fonction avec $_POST-->
				<input type="hidden" name="email" value=<?php  echo "\"" . "$email" . "\""?>/>
				<input type="submit" value="Envoyer"/>
			</form>
		</div>

		<div>
			<h2>Se deconnecter</h2>
			<form action="deconnexion.php" method="post">
				<input type="submit" value="Deconnexion">
			</form>
		</div>
	</center>

	<?php include("footer.php"); ?>
</body>
</html>