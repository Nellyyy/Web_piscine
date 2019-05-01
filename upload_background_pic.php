<?php
	$target_dir = "uploads/";
	//get the name of the uploaded file
	$target_file = $target_dir . basename($_FILES["monfichier"]["name"]);
	$ext = pathinfo($target_file, PATHINFO_EXTENSION);
	echo $target_file . "<br/>";
	echo $ext;
	echo $_POST["bendo"];
	//connectez-vous dans votre BDD
	$database = "piscine_test";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	$sql = "SELECT * FROM `utilisateur` WHERE `utilisateur_email` LIKE"


	//move the uploaded file from temporary directory to server directory
	/*
	if(move_uploaded_file($_FILES["monfichier"]["tmp_name"], $target_dir . ))
	{
		echo "Votre photo a été enregistrée avec succès";
	}
	else
	{
		echo "Une erreur est survenue lors du chargement de votre image";
	}
*/
	//mettre le nom du fichier dans la base de donnée









	//puis faire en sorte que les fichiers aient tous un nom différent dans le serveur

?>


