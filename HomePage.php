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

	<div class="container-fluid accueil">
     <div class="pub">
       <h3>A ne pas manquer!</h3>
       <h1>Livraison gratuite dès 50$ d'achats!*</h1>
       <h6>*offre valable le mois de Mai, prix soumis à condition</h6>
     </div> 
        
      
  </div>
	
    <!--footer-->
	<?php include("footer.php"); ?>
	<!--footer-->
</body>
</html>