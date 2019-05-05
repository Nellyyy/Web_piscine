<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>

	 <!--favicon-->
  <?php include("favicon.php"); ?>

  
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=BioRhyme+Expanded" rel="stylesheet">

  <!--lien fichier css-->
  <link rel="stylesheet" media="screen" type="text/css" href="styles.css">
  
  <meta charset="utf-8">
  <!--adapt sur ordi ou tel ou tablette-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>	
</head>
<body>
	<?php include("menu.php"); ?>
	<center id="bottom_body">
		<h1>Menu acheteur</h1>
		<h2>Vos informations</h2>
		<?php
			$email = $_SESSION["email"];

			//connexion BDD
			$database = "piscine_test";
			$db_handle = mysqli_connect('localhost', 'root', '');
			$db_found = mysqli_select_db($db_handle, $database);

			if ($db_found)
			{
				//Info du vendeur/////////
				$sql = "SELECT * FROM `utilisateur` WHERE `utilisateur_email` LIKE '$email'";
				$result = mysqli_query($db_handle, $sql);
				if($result != NULL)
				{	
					while ($data = mysqli_fetch_assoc($result)) 
					{
						//photo de profil
						echo "<img src=\"" . $data['utilisateur_photo'] . "\" width=\"100\" height=\"100\"/><br/>";
						//nom et prenom
						echo "Nom:" . $data['utilisateur_nom'] . '<br>';
						echo "Prénom: " . $data['utilisateur_prenom'] . '<br>';
					}
				}
				//Adresse/////////
				$sql = "SELECT * FROM `livraison` WHERE `utilisateur_email` LIKE '$email'";
				$result = mysqli_query($db_handle, $sql);
				while ($data = mysqli_fetch_assoc($result)) 
				{
					$a1 = $data["livraison_a1"];
					$a2 = $data["livraison_a2"];
					$ville = $data["livraison_ville"];
					$cp = $data["livraison_CP"];
					$pays = $data["livraison_pays"];
					$tel = $data["livraison_tel"];
		?>		
				<div>
					<h2>Adresse de livraison</h2>
		<?php
					echo "adresse1: " . $a1 . "<br/>";
					echo "adresse2: " . $a2 . "<br/>";
					echo "ville: " . $ville . "<br/>";
					echo "code postal: " . $cp . "<br/>";
					echo "pays: " . $pays . "<br/>";
					echo "télephone: " . $tel . "<br/>";
		?>
				</div>
		<?php
				}
				//Carte Bleue//////////////
				$sql = "SELECT * FROM `paiement` WHERE `utilisateur_email` LIKE '$email'";
				$result = mysqli_query($db_handle, $sql);
				while ($data = mysqli_fetch_assoc($result)) 
				{
					$type_paiement = $data["paiement_type"];
					$numero = $data["paiement_num"];
					$nom = $data["paiement_nom"];
					$date = $data["paiement_date"];
					$secu = $data["paiement_secu"];

					//Pour afficher juste les 4 derniers numero de la cb :
					$mot=strval($valeur);
					$char12 = $mot{12};
					$char13 = $mot{13};
					$char14 = $mot{14};
					$char15 = $mot{15};
		?>
					<div>
						<h2>Coordonnée banquaire</h2>
		<?php
						echo "Numero CB: XXXX XXXX XXXX " . $char12 . $char13 . $char14 . $char15 . "<br/>";
						echo "Type carte: " . $type_paiement . "<br/>";
						echo "Nom:" . $nom . "<br/>";
						echo "Date expiration: " . $date . "<br/>";
						echo "Cryptogramme: " . $secu . "<br/>";
				}
		?>
					</div>
		<?php
			}
		?>
	
		</div>
			<div>
			<h2>Changer votre photo de profil ?</h2>
			<form action="upload_profil_pic.php" method="post" enctype="multipart/form-data">
				<input type="file" name="monfichier"/>
				<!--pour envoyer l'email à l'autre page inclusien d'une php qui retourne l'email
				note, plus tard il faudra récupérer l'email depuis cette fonction avec $_POST-->
				<input type="hidden" name="email" value=<?php  echo "\"" . "$email" . "\""?>/>
				<input type="submit" value="Envoyer"/>
			</form>
		</div>

		<div>
			<h2>Se deconnecter</h2>
			<form action="deconnexion.php" method="post">
				<input type="submit" value="Deconnexion">
			</form>
		</div>
	</center>

	<?php include("footer.php"); ?>
</body>
</html>