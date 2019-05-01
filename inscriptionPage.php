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
	<center>
		<h3>Sign Up</h3>
		<form action="inscription.php" method="post">
			<table>
				<tr>
					<td>Prénom:</td>
					<td><input type="text" name="prenom"></td>
				</tr>
				<tr>
					<td>nom:</td>
					<td><input type="text" name="nom"></td>
				</tr>
				<tr>
					<td>email:</td>
					<td><input type="text" name="email"></td>
				</tr>
				<tr>
					<td>pseudo:</td>
					<td><input type="text" name="pseudo"></td>
				</tr>
				<tr>
					<td>mot de passe:</td>
					<td><input type="password" name="mdp"></td>
				</tr>
				<tr>
					<td>photo:</td>
					<td><input type="text" name="photo"></td>
				</tr>
					<tr>
				<td><label>type: </label></td>
					<td><select name="type">
						<option value="">Sélectionner un type</option>
						<option value="vendeur"> Vendeur</option>
						<option value="acheteur"> Acheteur</option>
					</select></td>	
			</tr>
					<td>adresse:</td>
					<td><input type="text" name="adresse"></td>
				</tr>
				<tr>
					<td>code cb:</td>
					<td><input type="number" name="cb"></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" value="S'inscrire" name="bouttoni"></td>
				</tr>
			</table>
		</form>
	</center>
	 <!--footer-->
  <?php include("footer.php"); ?>
  <!--footer-->
</body>
</html>