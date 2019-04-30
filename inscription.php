	<?php

	//le parametre de $_POST = "name" de <input> de votre page HTML
	$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
	$nom = isset($_POST["nom"])? $_POST["nom"] : "";
	$email= isset($_POST["email"])? $_POST["email"] : "";
	$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
	$mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
	$photo = isset($_POST["photo"])? $_POST["photo"] : "";
	$type = isset($_POST["type"])? $_POST["type"] : "";
	$adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
	$cb = isset($_POST["cb"])? $_POST["cb"] : "";
	//identifier votre BDD
	$database = "piscine_test";
	//connectez-vous dans votre BDD
	//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	if ($_POST["bouttoni"]) {
		if ($db_found) {
			$sql = "SELECT * FROM utilisateur";
			if ($email != "") {
				//on cherche l'utilisateur' avec les paramètres email et pseudo 
				$sql .= " WHERE email LIKE '%$email%'";
				if ($pseudo != "") {
					$sql .= " OR pseudo LIKE '%$pseudo%'";
				}
			}
			$result = mysqli_query($db_handle, $sql);
	//regarder s'il y a des résultats
			if(mysqli_num_rows($result) == 0) {
		//si le pseudo et l'email n'ont pas encore été utilisés
		//('$prenom', '$nom', '$email', '$pseudo', '$mdp', '$photo', '$type', '$adresse', '$cb'
				$sql="INSERT INTO utilisateur VALUES('BRUNO','charlene','charlene.bruno','cha','kingking','c.jpg', 'vendeur', '180 rue Jean Monnet','128763')";
				$result = mysqli_query($db_handle, $sql);
				echo "votre compte a bien été crée";
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