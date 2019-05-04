
	<?php

	session_start();
	 ///je récupère l'id du mec
  $email= $_SESSION["email"];

  //id de l'item
  $id = $_GET['id'] ;	

	//identifier votre BDD
	$database = "piscine_test";

	//connectez-vous dans votre BDD
	//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

  //lancement de la requête 

		if ($db_found) {

	//je supprime l'article en vente

      	$sqlretirer ="DELETE FROM `item` WHERE `utilisateur_email` LIKE '$email' AND  `item_id` LIKE '$id'";
      	 $resultretirer = mysqli_query($db_handle, $sqlretirer);
 
	}else {
		echo "Database not found";
	}
	include("menu_vendeur.php");
?>