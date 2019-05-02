<?php
	$target_dir = "uploads/";
	//get the name of the uploaded file
	$target_file = $target_dir . basename($_FILES["monfichier"]["name"]);
	$ext = pathinfo($target_file, PATHINFO_EXTENSION);//extract the extension of the file (without the dot)
	echo $target_file . "<br/>";
	echo $ext . "<br/>";

	$id_utilisateur = $_POST["email"];
	echo $id_utilisateur . "<br/>";

	
	/*
	$database = "piscine_test";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	//requête sql pour récupérer les infos du vendeur dont c'est le compte
	$sql = "SELECT * FROM `utilisateur` WHERE `utilisateur_email` LIKE '$id_utilisateur'";
	echo $sql;
	$result = mysqli_query($db_handle, $sql);
	*/


	//créer un fichier avec l'id del'utilisateur
	$file_name = $target_dir . $id_utilisateur . "_bp." . $ext;
	echo $file_name . "<br/>";

	//move the uploaded file from temporary directory to server directory
	//note the name of the picture is formatted this way
	//adress@email.com_bp.ext where bp stands for background picture
	if(move_uploaded_file($_FILES["monfichier"]["tmp_name"], $file_name ))
	{
		echo "Votre photo a été enregistrée avec succès <br/>";
		//enregistrer le nom dans la base de donnée (nécessaire pour l'extension du fichier)
		//connection BDD
		$database = "piscine_test";
		$db_handle = mysqli_connect('localhost', 'root', '');
		$db_found = mysqli_select_db($db_handle, $database);
		//query :
		$sql = "UPDATE `utilisateur` SET `utilisateur_vendeur_photofond`='$file_name' WHERE `utilisateur_email` LIKE '$id_utilisateur'";
		echo $sql;
		$result = mysqli_query($db_handle, $sql);
		
	}
	else
	{
		echo "Une erreur est survenue lors du chargement de votre image <br/>";
	}

	//mettre le nom du fichier dans la base de donnée









	//puis faire en sorte que les fichiers aient tous un nom différent dans le serveur

?>


