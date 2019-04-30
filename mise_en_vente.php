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
$dateparution = isset($_POST["dateparution"])? $_POST["dateparution"] : "";
$nature = isset($_POST["nature"])? $_POST["nature"] : "";
$datesortie = isset($_POST["datesortie"])? $_POST["datesortie"] : "";
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
	echo"dedans";
	if ($db_found) {
		$sql = "INSERT INTO item(item_id,	item_titre,	item_prix,	item_description,	item_photo,	item_video,	item_qte_stock,	item_qte_vendue,	item_type,	item_livre_auteur,	item_livre_date_publication,	item_musique_artiste,	item_musique_style,	item_date_sortie,	item_vetement_sexe,	item_vetement_couleur,	item_vetement_taille,	item_sport_categorie)
		VALUES ('', '$nom', '$prix', '$description', '$photo', '$video', '$quantite', '$vente', '$type', '$auteur',
		'$dateparution', '$artiste', '$style', '$datesortie', '$sexe', '$couleur', '$taille', '$categorie')";
		$result = mysqli_query($db_handle, $sql);
		echo "Add successful." . "<br>";
	} else {
		echo "Database not found";
	}
}
//fermer la connexion
mysqli_close($db_handle);
?>