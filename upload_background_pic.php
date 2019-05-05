<?php
	$target_dir = "uploads/";
	//get the name of the uploaded file
	$target_file = $target_dir . basename($_FILES["monfichier"]["name"]);
	$ext = pathinfo($target_file, PATHINFO_EXTENSION);//extract the extension of the file (without the dot)
	$id_utilisateur = $_POST["email"];

	//créer un fichier avec l'id de l'utilisateur
	$file_name = $target_dir . $id_utilisateur . "_bp." . $ext;

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
		$result = mysqli_query($db_handle, $sql);
		mysqli_close($db_handle);
	}
	else
	{
		echo "Une erreur est survenue lors du chargement de votre image <br/>";
	}
	//faire un boutton revenir au menu vendeur !
	include("menu_vendeur.php");
?>


