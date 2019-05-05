<?php
if(!isset($_SESSION))
{
  session_start();
}
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

  <!--images et lien vers chaque catégorie--> 

	<div class="container-fluid ">
     <div class="pub">
       <h3>A ne pas manquer!</h3>
       <h1>Livraison gratuite dès 50$ d'achats!*</h1>
       <h6>*offre valable le mois de Mai, prix soumis à condition</h6>
     </div> 
  </div>
	
  <div class="ole1" >
  <div class="container-fluid wrap">
    <div class="pub2">
       <h3>Catégorie Livres</h3>
       <h1>Des milliers de livres disponibles à dévorer!</h1>
       <h6>Pour les petits, les grands, des mangas aux grands classiques français.</h6>
     </div> 
  </div>
</div>

<div class="ole4" >
  <div class="container-fluid wrap">
    <div class="pub2">
       <h3>Catégorie Vêtement</h3>
       <h1>Vous trouverez ici toutes les dernières nouveautés mode!</h1>
       <h6>Il y en a pour tous les styles.</h6>
     </div> 
  </div>
</div>

<div class="ole3" >
  <div class="container-fluid wrap">
    <div class="pub2">
       <h3>Catégorie Musique</h3>
       <h1>Et s'il était possible d'aller voir Armstrong en concert?</h1>
       <h6>Explorez la catégorie musique pour vous évader.</h6>
     </div> 
  </div>
</div>

<div class="ole2" >
  <div class="container-fluid wrap">
    <div class="pub2">
       <h3>Catégorie Sport et Loisir</h3>
       <h1>Le sport il n'y a que ça de vrai!</h1>
       <h6>You can do it.</h6>
     </div> 
  </div>
</div>
    <!--footer-->
	<?php include("footer.php"); ?>
	<!--footer-->
</body>
</html>