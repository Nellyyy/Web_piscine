	<?php

	//le parametre de $_POST = "name" de <input> de votre page HTML
	$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
	$nom = isset($_POST["nom"])? $_POST["nom"] : "";
	$email= isset($_POST["email"])? $_POST["email"] : "";
	$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
	$mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
	$photo = "uploads/default_pp.png";
	$type = "acheteur";
	$adresse1 = isset($_POST["adresse1"])? $_POST["adresse1"] : "";
	$adresse2 = isset($_POST["adresse2"])? $_POST["adresse2"] : "";
	$ville = isset($_POST["ville"])? $_POST["ville"] : "";
	$cp = isset($_POST["cp"])? $_POST["cp"] : "";
	$pays = isset($_POST["pays"])? $_POST["pays"] : "";
	$tel = isset($_POST["tel"])? $_POST["tel"] : "";

	//identifier votre BDD
	$database = "piscine_test";
	//connectez-vous dans votre BDD
	//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	if ($_POST["bouttoni"]) {
		if ($db_found) {
			$sql = "SELECT * FROM `utilisateur` WHERE `utilisateur_email` LIKE '%$email%' OR `utilisateur_pseudo` LIKE '%$pseudo%' ";
			$result = mysqli_query($db_handle, $sql);
	//regarder s'il y a des résultats
			if(mysqli_num_rows($result) == 0) {
		//si le pseudo et l'email n'ont pas encore été utilisés
		//('$prenom', '$nom', '$email', '$pseudo', '$mdp', '$photo', '$type', '$adresse', '$cb'
				$addsql="INSERT INTO utilisateur VALUES('$prenom', '$nom', '$email', '$pseudo', '$mdp', '$photo', '$type', '')";
				$result2 = mysqli_query($db_handle, $addsql);
				$addsqlbis="INSERT INTO livraison VALUES(NULL,'$adresse1', '$adresse2', '$ville', '$cp', '$pays', '$tel', '$email')";
				$resultbis = mysqli_query($db_handle, $addsqlbis);
				echo "votre compte a bien été crée";
				header("Location: mon_compte.php");
			} else {
			///si ils sont déja utilisés
				echo "ce pseudi ou email est déja utilisés, veuillez en choisir un autre";
			}
		} else {
		echo "Database not found";
	}
}
	//fermer la connexion
mysqli_close($db_handle);
?>