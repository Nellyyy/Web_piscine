<?php
//recuperer les données venant de la page HTML
//le parametre de $_POST = "name" de <input> de votre page HTML
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$prix = isset($_POST["prix"])? $_POST["prix"] : 1;
$photo= isset($_POST["photo"])? $_POST["photo"] : "";
$description = isset($_POST["description"])? $_POST["description"] : "";
$video = isset($_POST["video"])? $_POST["video"] : "";
$sexe = isset($_POST["sexe"])? $_POST["sexe"] : "";
$taille= isset($_POST["taille"])? $_POST["taille"] : "";
$couleur = isset($_POST["couleur"])? $_POST["couleur"] : "";
$quantite = isset($_POST["quantite"])? $_POST["quantite"] : 1;
$auteur = isset($_POST["auteur"])? $_POST["auteur"] : "";
$dateparution = isset($_POST["dateparution"])? $_POST["dateparution"] : 2000;
$nature = isset($_POST["nature"])? $_POST["nature"] : "";
$datesortie = isset($_POST["datesortie"])? $_POST["datesortie"] : 2000;
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
		//NULL,'$nom', '$prix', '$description', '$photo', '$video', '$quantite', '$vente', '$type', '$auteur',
		//'$dateparution', '$artiste', '$style', '$datesortie', '$sexe', '$couleur', '$taille', '$categorie'
		//NULL,'$nom','$prix', 'ffff','rr','ff',15, 12, 'rr', 'ee',12, 'ee', 'ee','$datesortie', 'e','rrr','w','rr'
		$sql = "INSERT INTO item 
		VALUES (NULL,'$nom', '$prix', '$description', '$photo', '$video', '$quantite', '$vente', '$type', '$auteur',
		'$dateparution', '$artiste', '$style', '$datesortie', '$sexe', '$couleur', '$taille', '$categorie')";
		$result = mysqli_query($db_handle, $sql);
		echo "nom:" . $nom . '<br>';
		echo "Prix: " . $prix . '<br>';
		echo "description: " . $description . '<br>';
		echo "photo: " . $photo . '<br>';
		echo "video: " . $video. '<br>';
		echo "quantite: " . $quantite. '<br>';
		echo "vente: " . $vente . '<br>';
		echo "type: " . $type. '<br>';
		echo "auteur: " . $auteur . '<br>';
		echo "dateparution: " . $dateparution . '<br>';
		echo "artiste" . $artiste . '<br>';
		echo "style" . $style . '<br>';
		echo " datesortie" . $datesortie . '<br>';
		echo "sexe " . $sexe . '<br>';
		echo "couleur" . $couleur . '<br>';
		echo "taile" . $taille . '<br>';
		echo "categorie " . $categorie . '<br>';
		echo "Add successful." . "<br>";
	} else {
		echo "Database not found";
	}
}
//fermer la connexion
mysqli_close($db_handle);
?>