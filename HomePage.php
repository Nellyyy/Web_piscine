<?php
session_start();
?>

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
	<!--menu-->
	<!-- source : https://www.w3schools.com/bootstrap/bootstrap_navbar.asp-->
	<?php include("menu.php"); ?>
	<!--menu-->

	<!--petit texte haut de page-->

  <div class="container-fluid accueil">
    <center>
    <h1 style=" font-style: italic;  font-family: 'Pacifico', cursive;">N'hésitez plus blabla</h1>
    <p style=" font-style: italic;">Il est temps d'acheter mes amis ou faites de l'argent en vendant</p>
    </center>
  </div>

  <hr class="separateur_footer" style="margin: 0 15% 34px ;">

  <!--images et lien vers chaque catégorie--> 

	<div class="container-fluid accueil">
      <div class="row">
        <div class="col-lg-3 col-lg-offset-1"><img src="img/livre.jpg"></div>
        
      </div>
      <div class="row ">
        <div class="col-lg-2"></div>
        <div class="col-lg-4 acc"><div class="acc_texte"><p>Vêtements</p></div></div>
        <div class="col-lg-6"><div class="acc_img"><img src="img/vetements.jpg"></div></div>
      </div>
      <div class="row">
        <div class="col-lg-6"><div class="acc_img"><img src="img/livre.jpg"></div></div>
        <div class="col-lg-2"></div>
        <div class="col-lg-4 acc"><div class="acc_texte"><p>Musique</p></div></div>
      </div>
      <div class="row ">
        <div class="col-lg-2"></div>
        <div class="col-lg-4 acc"><div class="acc_texte"><p>Sport et Loisir</p></div></div>
        <div class="col-lg-6"><div class="acc_img"><img src="img/vetements.jpg"></div></div>
      </div>
    </div>
	
    <!--footer-->
	<?php include("footer.php"); ?>
	<!--footer-->
</body>
</html>