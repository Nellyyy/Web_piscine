	<?php

	//le parametre de $_POST = "name" de <input> de votre page HTML
	$email= isset($_POST["email"])? $_POST["email"] : "";
	$pseudo = isset($_POST["email"])? $_POST["email"] : "";
	//identifier votre BDD
	$database = "e_commerce";
	//connectez-vous dans votre BDD
	//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	if ($_POST["boutton1"]) {
		if ($db_found) {
			$sql = "SELECT * FROM utilisateurs";
			if ($email != "") {
	//on cherche l'utilisateur' avec les paramètres email et pseudo 
				$sql .= " WHERE email LIKE '%$email%'";
				if ($pseudo != "") {
					$sql .= " AND pseudo LIKE '%$pseudo%'";
				}
			}
			$result = mysqli_query($db_handle, $sql);
	//regarder s'il y a de résultat
			if (mysqli_num_rows($result) == 0) {
	//le livre recherché n'existe pas
				echo "aucun compte associe a ce pseudo et mot de passe";
			} else {
	//on trouve l'utilisateur recherché
				if($data = mysqli_fetch_assoc($result)) {
					echo "Bonjour " . $data['pseudo'] . "<br>";
					echo "<br>";
	//ici coder la connexion
				}
			}
		} else {
			echo "Database not found";
		}
	}
	//fermer la connexion
	mysqli_close($db_handle);
	?>