<?php
	$email_suppr = $_POST["email_suppr"];

	//connexion BDD
	$database = "piscine_test";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);
	
	//supprimer le panier
	$sql = "DELETE FROM `panier` WHERE `utilisateur_email` LIKE '$email_suppr'";
	mysqli_query($db_handle, $sql);
	//supprime les objets vendues par le mec
	$sql = "DELETE FROM `item` WHERE `utilisateur_email` LIKE '$email_suppr'";
	mysqli_query($db_handle, $sql);
	//Livraison (il ne devrait pas y en avoir)
	$sql = "DELETE FROM `livraison` WHERE `utilisateur_email` LIKE '$email_suppr'";
	mysqli_query($db_handle, $sql);
	//Paiement (il ne devrait pas y en avoir)
	$sql = "DELETE FROM `paiement` WHERE `utilisateur_email` LIKE '$email_suppr'";
	mysqli_query($db_handle, $sql);

	//Supprimer l'utilisateur
	$sql = "DELETE FROM `utilisateur` WHERE `utilisateur_email` LIKE '$email_suppr'";
	echo $sql . "<br/>";
	
	$result = mysqli_query($db_handle, $sql);
	if(!$result)
		echo "Faux";
	else if($result==1)
		echo 'True';

	header("Location: gestion_vendeurs.php")
?>
