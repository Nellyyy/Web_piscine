<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<meta charset="utf-8">
	<!--font style-->
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
	<?php 
		include("menu.php");

		$type = $_SESSION["type"];

		if(isset($_SESSION["email"]))
		{
			if($type == "acheteur")
			{
				//on redirige vers la page menu acheteur
				header('Location: menu_acheteur.php');
				exit;//on n'execute pas le reste de cette page
			}
			else if($type == "vendeur")
			{
				header('Location: menu_vendeur.php');
				exit;
			}
			else if($type == "admin")
			{
				header('Location: menu_admin.php');
				exit;
			}
			header("Location: menu_vendeur.php");
		}
		else
		{
			//redirige la page vers connexion
			header("Location: connexionPage.php");
		}
		include("footer.php");
	?>
</body>
</html>