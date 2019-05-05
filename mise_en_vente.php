<?php
	if(!isset($_SESSION))
	{
		session_start();
	}


//recuperer les données venant de la page HTML
//le parametre de $_POST = "name" de <input> de votre page HTML
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$prix = isset($_POST["prix"])? $_POST["prix"] : 1;
//$photo= isset($_POST["photo"])? $_POST["photo"] : "";
$description = isset($_POST["description"])? $_POST["description"] : "";
$sexe = isset($_POST["sexe"])? $_POST["sexe"] : "";
$taille= isset($_POST["taille"])? $_POST["taille"] : "";
$couleur = isset($_POST["couleur"])? $_POST["couleur"] : "";
$quantite = isset($_POST["quantite"])? $_POST["quantite"] : 1;
$auteur = isset($_POST["auteur"])? $_POST["auteur"] : "";
$dateparution = isset($_POST["dateparution"])? $_POST["dateparution"] : 2000;
$nature = isset($_POST["nature"])? $_POST["nature"] : "";
$datesortie = isset($_POST["datesortie"])? $_POST["datesortie"] : 2000;
$artiste = isset($_POST["artiste"])? $_POST["artiste"] : "";
$categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";
$type= isset($_POST["type"])? $_POST["type"] : "lol";
$email= $_SESSION["email"];//clé de l'utilisateur
$vente= 0;

//identifier votre BDD
$database = "piscine_test";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


if ($_POST["bouttonv"]) 
{
	if ($db_found) 
	{		
		$photo = "uploads/" . $_FILES["photo"]["name"];

		//insérer le nouvel item dans la base de donnée
		//ne marche pas avec les livres !
		$sql = "INSERT INTO item 
		VALUES (NULL,'$nom', '$prix', '$description', '$photo', NULL,    '$quantite', '$vente', '$type', '$categorie', '$auteur',
		'$dateparution', '$artiste', '$datesortie', '$sexe', '$couleur', '$taille','$email')";
		
    $result = mysqli_query($db_handle, $sql);

		//récuppérer son id
		$sql = "SELECT * FROM item WHERE item_id=LAST_INSERT_ID()";
		$result = mysqli_query($db_handle, $sql);

		while ($data = mysqli_fetch_assoc($result)) 
		{
			$id_item = $data["item_id"];
		}

		$target_dir = "uploads/";
		//get the name of the uploaded file
		$target_file = $target_dir . basename($_FILES["photo"]["name"]);
		$ext = pathinfo($target_file, PATHINFO_EXTENSION);//extract the extension of the file (without the dot)
		
		//créer un fichier avec l'id de l'utilisateur
		$file_name = $target_dir . $id_item . ".". $ext;

		//On copie la photo sur le serveur
		if(move_uploaded_file($_FILES["photo"]["tmp_name"], $file_name ))
		{
			$sql = "UPDATE `item` SET `item_photo`='$file_name' WHERE `item_id` LIKE '$id_item'";
			$result = mysqli_query($db_handle, $sql);
			mysqli_close($db_handle);
		}
		else
		{
			echo "Une erreur est survenue lors du chargement de votre image <br/>";
		}
		
	} 
	else 
	{
		echo "Database not found";
	}

		include("HomePage.php");
}
?>