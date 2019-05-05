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
	 <!--menu-->
  <!-- source : https://www.w3schools.com/bootstrap/bootstrap_navbar.asp-->
  <?php include("menu.php"); ?>
  <!--menu-->
	<center id="bottom_body">
		

		<!--titre--> 
  <div class="container-fluid" style="margin: 0px;">
    <div class="bande">
      <h2>Sign In</h2>
    </div>
  </div>

  <div class="logo">
  	<img src="img/logoblanc.png">
  </div>

  <center><div class="box_connection">
		<form action="connexion.php" method="post">
			
				
					<tr>Adresse email</tr>
					<br>
					<tr><input type="text" name="email"></tr>
					<br>
			
					<tr>Mot de passe</tr>
					<br>
					<tr><input type="password" name="pwd"></tr>
					<br>
					<br>
				
				<tr>
						<td colspan="2" align="center"><input type="submit" value="Se connecter" name="boutton1"></td>
				</tr>
		
		</form>
	 	<div id="creer">
	 		<p>Nouveau chez ECE Amazon?</p>
	 		<a href="inscriptionPage.php">  ** Créer votre compte ici 	**</a>
	 	</div>

	 	</div></center>

	 	<?php
	 		if(isset($_SESSION["try_connect"]))
	 		{
		?>
				<div style="color: red;"><?php echo $_SESSION["try_connect"]?></div> 
		<?php
	 		}
	 	?>
	</center>	
 <!--footer-->
  <?php include("footer.php"); ?>
  <!--footer-->
</body>
</html>