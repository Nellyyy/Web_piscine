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
					echo "Nom:" . $data['utilisateur_nom'] . '<br>';
					echo "Prénom: " . $data['utilisateur_prenom'] . '<br>';
				}
			}
		}
	?>
	
	<div>
		<h2>Se deconnecter</h2>
		<form action="deconnexion.php" method="post">
			<input type="submit" value="Se deconnecter">
		</form>
	</div>

	<?php include("footer.php"); ?>
</body>
</html>