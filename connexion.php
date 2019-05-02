	<?php
	session_start();

	//le parametre de $_POST = "name" de <input> de votre page HTML
	$email= isset($_POST["email"])? $_POST["email"] : "";

	//identifier votre BDD
	$database = "piscine_test";
	//connectez-vous dans votre BDD
	//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	if($db_found)
	{
		$sql = "SELECT * FROM `utilisateur` WHERE `utilisateur_email` LIKE '$email'";
		$result = mysqli_query($db_handle, $sql);
		//On referme la base de donnée
		mysqli_close($db_handle);

		if (mysqli_num_rows($result) == 0)
		{
			echo "Aucun compte associé à l'email rentré";
			header('Location: connexionPage.php');
			exit;
		}
		else
		{
			$data = mysqli_fetch_assoc($result);
			
			//On connecte l'utilisateur :
			$_SESSION["email"] = $_POST["email"];
			//on redirige vers la page menu vendeur
			header('Location: menu_vendeur.php');//grave stylé !!!
			exit;
		}
		
	}
	else
	{
		echo "impossible de se connecter à la base de donnée <br/>";
	}

	?>