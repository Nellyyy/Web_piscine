<?php
	$email_suppr = $_POST["email_suppr"];

	//connexion BDD
	$database = "piscine_test";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);
	
	//supprimer l'adresse du mec

	$sql = "DELETE FROM `utilisateur` WHERE `utilisateur_email` LIKE '$email_suppr'";
	echo $sql . "<br/>";
	
	$result = mysqli_query($db_handle, $sql);
	if(!$result)
		echo "Faux";
	else if($result==1)
		echo 'True';
?>
