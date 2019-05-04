<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<meta charset="utf-8">
	<!--font style-->
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
  	<h3>Sign Up</h3>
  	<form action="inscription.php" method="post">
  		<table>
  			<tr>
  				<td>Prénom:</td>
  				<td><input type="text" name="prenom"></td>
  			</tr>
  			<tr>
  				<td>Nom:</td>
  				<td><input type="text" name="nom"></td>
  			</tr>
  			<tr>
  				<td>Email:</td>
  				<td><input type="text" name="email"></td>
  			</tr>
  			<tr>
  				<td>Mot de passe:</td>
  				<td><input type="password" name="mdp"></td>
  			</tr>
  			<tr>
  				<td>Adresse 1 :</td>
  				<td><input type="text" name="adresse1"></td>
  			</tr>
  			<tr>
  				<td>Adresse 2 :</td>
  				<td><input type="text" name="adresse2"></td>
  			</tr>
  			<tr>
  				<td>Ville:</td>
  				<td><input type="text" name="ville"></td>
  			</tr>
  			<tr>
  				<td>Code Postal:</td>
  				<td><input type="number" name="cp"></td>
  			</tr>
  			<tr>
  				<td>Pays:</td>
  				<td><input type="text" name="pays"></td>
  			</tr>
  			<tr>
  				<td>Numéro de téléphone:</td>
  				<td><input type="number" name="tel" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}"
       required></td>
       <td><span class="note">ex: 0644287394</span></td>

  			</tr>
  			<tr>
  				<td colspan="2" align="center"><input type="submit" value="S'inscrire" name="bouttoni"></td>
  			</tr>
  		</table>
  	</form>
    <?php
      if(isset($_SESSION["try_signup"]))
      {
    ?>
        <div style="color: red;"><?php echo $_SESSION["error_signup"]; ?><br/></div> 
    <?php
      }
    ?>
  </center>
  <!--footer-->
  <?php include("footer.php"); ?>
  <!--footer-->
</body>
</html>