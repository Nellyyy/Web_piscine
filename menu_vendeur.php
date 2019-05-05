<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Ece Amazon</title>

	 <!--favicon-->
  <?php include("favicon.php"); ?>
	  <!--font style-->
	  <link href="https://fonts.googleapis.com/css?family=BioRhyme+Expanded" rel="stylesheet">

	  <!--lien fichier css-->
		<link rel="stylesheet" media="screen" type="text/css" href="styles.css" />
	  
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
	<div>
		<?php
			//Je crée une variable locale email pour simuler la connexion, on devra récupérer ça d'une autre page plus tard
			if(isset($_SESSION["email"]))
			{
			$email = $_SESSION["email"];

			//connexion BDD
			$database = "piscine_test";
			$db_handle = mysqli_connect('localhost', 'root', '');
			$db_found = mysqli_select_db($db_handle, $database);

			if ($db_found)
			{
				//Requete utilisateur
				$sql = "SELECT * FROM `utilisateur` WHERE `utilisateur_email` LIKE '$email'";
				$result = mysqli_query($db_handle, $sql);

				//requete
				$sqlitems = "SELECT * FROM `item` WHERE `utilisateur_email` LIKE '$email'";
				$resultitems = mysqli_query($db_handle, $sqlitems);

				if($result != NULL)
				{	
					while ($data = mysqli_fetch_assoc($result)) 
					{
						//afficher l'image de fond d'écran
		?>
						<div style="background-image: url('<?php echo $data['utilisateur_vendeur_photofond']?>'); width: 100%; height: 300px">
		<?php
						if($_SESSION["type"] == "vendeur")
						{
							echo "<h1>Menu vendeur</h1>";
							//photo de profil
							echo "<img src=\"" . $data['utilisateur_photo'] . "\" width=\"100\" height=\"100\"/><br/>";
							echo "Nom: " . $data['utilisateur_nom'] . "<br>";
							echo "Prénom: " . $data['utilisateur_prenom'] . "<br>";
							echo "Type d'utilisateur: " . $data['utilisateur_type'] . "<br/>";
						}
		?>
						</div> 
		<?php
	
					}
				}
			}
			else
			{
				echo "Database not found <br/>";
			}
			//deconnexion de la base de donnée
			mysqli_close($db_handle);
			}
		?>
		<br/>
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
		<h2>Changer votre fond d'écran ?</h2>
		<form action="upload_background_pic.php" method="post" enctype="multipart/form-data">
			<input type="file" name="monfichier"/>
			<!--pour envoyer l'email à l'autre page inclusien d'une php qui retourne l'email
				note, plus tard il faudra récupérer l'email depuis cette fonction avec $_POST-->
			<input type="hidden" name="email" value=<?php  echo "\"" . "$email" . "\""?>/>
			<input type="submit" value="Envoyer"/>
		</form>
		<br/>
	</div>
	<?php
		if($_SESSION["type"]=="admin")
		{
	?>
			<a href="gestion_vendeurs.php">Gérer les vendeurs</a>

	<?php
		}
		else{

		 //on affiche tous les items en vente du vendeur
				      while ($data = mysqli_fetch_array($resultitems,MYSQLI_ASSOC)) 
				      {
				      	
				    ?>

 <div class="container-fluid">
  	<div class="row">
  		<div class="col-lg-6" >
	  		<div class="item_grand">
		  		<div class="photo_item_grand">
		  			<img src="img/jupe.jpg">
		  		</div>
	  		</div>
	  	</div>
	  	<div class="col-lg-6" >
	  		<div class="item_text_grand">
	  			<p style="font-weight: bold;"><?php echo $data['item_titre'];?></p>
	  			<p style="font-weight: bold;"><?php echo $data['item_prix'].'$';?></p>
	  			<p style="font-weight: bold;"><?php echo $data['item_qte_vendue'];?></p>
	  			<p style="font-weight: bold;"><?php echo $data['item_qte_stock'];?></p>
	         	</br>
	         	<?php
	         	$id=$data['item_id'];
	         	?>
	          <p style="float: right;"><?php echo "<a href=retirer_article.php?id=". $id.">retirer</a>"  ;?></p>
	  		</div>
	  	</div>
  	</div>
  </div>
 <?php }
		}
	?>
	<div>
		<h2>Se deconnecter</h2>
		<form action="deconnexion.php" method="post">
			<input type="submit" value="Se deconnecter">
		</form>
	</div>
	</center>
	<?php include("footer.php"); ?>
</body>
</html>