	<?php
	session_start();
	 ///je récupère l'id du mec
  $email= $_SESSION["email"];

	//le parametre de $_POST = "name" de <input> de votre page HTML
	$type = isset($_POST["type"])? $_POST["type"] : "";
	$numero = isset($_POST["numero"])? $_POST["numero"] : "";
	$nom= isset($_POST["nom"])? $_POST["nom"] : "";
	$date = isset($_POST["date"])? $_POST["date"] : "";
	$secu = isset($_POST["secu"])? $_POST["secu"] : "";

	//identifier votre BDD
	$database = "piscine_test";
	//connectez-vous dans votre BDD
	//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	if ($_POST["bouttone"]) {
		if ($db_found) {
		
		//si le pseudo et l'email n'ont pas encore été utilisés
		//('$prenom', '$nom', '$email', '$pseudo', '$mdp', '$photo', '$type', '$adresse', '$cb'
				$addsql="INSERT INTO paiement VALUES('$type', '$numero', '$nom', '$date', '$secu','$email')";
				$result = mysqli_query($db_handle, $addsql);
		} else {
		echo "Database not found";
	}
}
include("passer_commande.php");
	//fermer la connexion
mysqli_close($db_handle);
?>