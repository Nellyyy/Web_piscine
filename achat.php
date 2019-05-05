<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Ece Amazon</title>
  <!--favicon-->
  <?php include("favicon.php"); ?>

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
  <!--menu-->
  <!-- source : https://www.w3schools.com/bootstrap/bootstrap_navbar.asp-->
  <?php include("menu.php"); ?>
  <!--menu-->

  <center>
  	<h1> Votre achat a été effectué avec succès!</h1>
  	<img class="text-center d-flex justify-content-center" src= "img/colis.png"> 
  	<p>Vous recevrez votre colis à domicile d'ici quelques jours</p>
  	<button><a href="HomePage.php">Retour à l'accueil</a></button>
  </center>
  
  <!--footer-->
  <?php include("footer.php"); ?>
  <!--footer-->
</body>
</html>