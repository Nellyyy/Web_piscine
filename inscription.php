<?php
	session_start();

	//le parametre de $_POST = "name" de <input> de votre page HTML
	$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
	$nom = isset($_POST["nom"])? $_POST["nom"] : "";
	$email= isset($_POST["email"])? $_POST["email"] : "";
	$pseudo = "balek";
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

	if ($_POST["bouttoni"]) 
	{
		if ($db_found) {
			if($email != "")//si l'email est rempli
			{
				$sql = "SELECT * FROM `utilisateur` WHERE `utilisateur_email` LIKE '%$email%'";
				$result = mysqli_query($db_handle, $sql);
				//regarder s'il y a des résultats
				if(mysqli_num_rows($result) == 0)//si le pseudo et l'email n'ont pas encore été utilisés
				{
					//création de l'utilisateur
					$addsql="INSERT INTO utilisateur VALUES('$prenom', '$nom', '$email', '$pseudo', '$mdp', '$photo', '$type', '')";
					$result2 = mysqli_query($db_handle, $addsql);
					//création de son adresse (dans une autre table)
					$addsqlbis="INSERT INTO livraison VALUES(NULL,'$adresse1', '$adresse2', '$ville', '$cp', '$pays', '$tel', '$email')";
					$resultbis = mysqli_query($db_handle, $addsqlbis);
					//delete the session variable
					$_SESSION["error_signup"] = NULL;
					header("Location: mon_compte.php");//go to mon comptee
					exit;
				}
				else
				{
					$_SESSION["error_signup"] = "Cet email est déjà associé à un compte";
					header("Location: inscriptionPage.php");
					exit;
				}
			}
			else//l'utilisateur n'a pas rempli le champ email
			{
				$_SESSION["error_signup"] = "Veuillez rentrer un email valide";
				header("Location: inscriptionPage.php");
				exit;
			}
		}
		else 
		{
			$_SESSION["error_signup"] = "Database not found";
			header("Location: inscriptionPage.php");
			exit;
		}
	}
	//fermer la connexion
	mysqli_close($db_handle);
?>