<?php
//recuperer les données venant de la page HTML
//le parametre de $_POST = "name" de <input> de votre page HTML
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$prix = isset($_POST["prix"])? $_POST["prix"] : "";
$photo= isset($_POST["photo"])? $_POST["photo"] : "";
$description = isset($_POST["description"])? $_POST["description"] : "";
$video = isset($_POST["video"])? $_POST["video"] : "";
$sexe = isset($_POST["sexe"])? $_POST["sexe"] : "";
$taille= isset($_POST["taille"])? $_POST["taille"] : "";
$couleur = isset($_POST["couleur"])? $_POST["couleur"] : "";
$quantite = isset($_POST["quantite"])? $_POST["quantite"] : "";
$auteur = isset($_POST["auteur"])? $_POST["auteur"] : "";
$dateparution = isset($_POST["dateparution"])? $_POST["dateparution"] : 1900;
$nature = isset($_POST["nature"])? $_POST["nature"] : "";
$datesortie = isset($_POST["datesortie"])? $_POST["datesortie"] : 1900;
$artiste = isset($_POST["artiste"])? $_POST["artiste"] : "";
$style = isset($_POST["style"])? $_POST["style"] : "";
$categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";
$type= isset($_POST["type"])? $_POST["type"] : "";
$vente= 0;

//identifier votre BDD
$database = "piscine_test";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($_POST["bouttonv"]) {
	if ($db_found) {
		//1,'$nom', '$prix', '$description', '$photo', '$video', '$quantite', '$vente', '$type', '$auteur',
		//'$dateparution', '$artiste', '$style', '$datesortie', '$sexe', '$couleur', '$taille', '$categorie'
		$sql = "INSERT INTO item 
		VALUES (3,'cha',14, 'ffff','rr','ff',15, 12, 'rr', 'ee',12, 'ee', 'ee',11, 'e','rrr','w','rr')";
		$result = mysqli_query($db_handle, $sql);
		echo "Add successful." . "<br>";
	} else {
		echo "Database not found";
	}
}
//fermer la connexion
mysqli_close($db_handle);
?>