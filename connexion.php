	<?php

	//le parametre de $_POST = "name" de <input> de votre page HTML
	$email= isset($_POST["email"])? $_POST["email"] : "";
	echo $email . "<br/>";
	//identifier votre BDD
	$database = "piscine_test";
	//connectez-vous dans votre BDD
	//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	if($db_found)
	{
		$sql = "SELECT * FROM `utilisateur` WHERE `utilisateur_email` LIKE '$email'";
		echo $sql ."<br/>";
		$result = mysqli_query($db_handle, $sql);
		echo gettype($result);



		if (mysqli_num_rows($result) == 0)
		{
			echo "Aucun compte associé à l'email rentré";
		}
		else
		{
			$data = mysqli_fetch_assoc($result);
			echo "Bonjour " . $data['utilisateur_pseudo'] . "!<br>";
		}
		
	}
	else
	{
		echo "impossible de se connecter à la base de donnée <br/>";
	}

	/*
	if ($_POST["boutton1"]) {
		if ($db_found) {
			$sql = "SELECT * FROM utilisateur";
			if ($email != "") {
	//on cherche l'utilisateur' avec les paramètres email et pseudo 
				$sql .= " WHERE utilisateur_email LIKE '%$email%'";
				if ($pseudo != "") {
					$sql .= " AND utilisateur_pseudo LIKE '%$pseudo%'";
				}
			}
			$result = mysqli_query($db_handle, $sql);
	//regarder s'il y a de résultat
			if (mysqli_num_rows($result) == 0) {
				echo "aucun compte associe a ce pseudo et email";
			} else {
	//on trouve l'utilisateur recherché
				if($data = mysqli_fetch_assoc($result)) {
					echo "Bonjour " . $data['utilisateur_pseudo'] . "!<br>";
					echo "<br>";
	//ici coder la connexion
				}
			}
		} else {
			echo "Database not found";
		}
	}
	//fermer la connexion
	*/
	mysqli_close($db_handle);

	?>