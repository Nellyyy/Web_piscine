	<?php
	session_start();

	//le parametre de $_POST = "name" de <input> de votre page HTML
	$email= isset($_POST["email"])? $_POST["email"] : "";

	//connexion BDD
	$database = "piscine_test";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	if($db_found)
	{
		//sql query
		$sql = "SELECT * FROM `utilisateur` WHERE `utilisateur_email` LIKE '$email'";
		$result = mysqli_query($db_handle, $sql);

		//On referme la base de donnée
		mysqli_close($db_handle);
		
		//si on ne trouve pas l'email rentré dans la base de donnée 
		if (mysqli_num_rows($result) == 0)
		{
			echo "Aucun compte associé à l'email rentré";
			$_SESSION["try_connect"] = True;
			//On redirige vers la page connexion
			header('Location: connexionPage.php');
			exit;//On n'execute pas le reste
		}
		else//On trouve cet utilisateur
		{
			//On recupère le resultat de la recherche
			$data = mysqli_fetch_assoc($result);
			$type = $data["utilisateur_type"];

						//On connecte l'utilisateur :
			$_SESSION["email"] = $_POST["email"];
			$_SESSION["type"] = $data["utilisateur_type"];
			$_SESSION["nom"] = $data["utilisateur_nom"];
			$_SESSION["prenom"] = $data["utilisateur_prenom"];

			if($type == "acheteur")
			{
				//on redirige vers la page menu acheteur
				header('Location: menu_acheteur.php');
				exit;//on n'execute pas le reste de cette page
			}
			else if($type == "vendeur" || $type == "admin")
			{
				header('Location: menu_vendeur.php');
				exit;
			}

			else
			{
				echo "problem formattage de type d'utilisateur <br/>";
			}
		}
	}
	else
	{
		echo "impossible de se connecter à la base de donnée <br/>";
	}

	?>