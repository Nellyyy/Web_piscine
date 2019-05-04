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
		<h3>Sign In</h3>
		<form action="connexion.php" method="post">
			<table>
				<tr>
					<td>email:</td>
					<td><input type="text" name="email"></td>
				</tr>
				<tr>
					<td>mot de passe:</td>
					<td><input type="passeword" name="pwd"></td>
				</tr>
				<tr>
						<td colspan="2" align="center"><input type="submit" value="Se connecter" name="boutton1"></td>
				</tr>
			</table>
		</form>
	 	<div>
	 		<a href="inscriptionPage.php"> pas encore de compte? **S'inscire ici**</a>
	 	</div>

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