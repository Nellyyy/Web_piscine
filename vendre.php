<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Vente</title>
	<!--favicon-->
  <?php include("favicon.php"); ?>
  
	<meta charset="utf-8">
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js'></script>
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
		<script>
	jQuery(document).ready(function()
		{
			   // On cache la zone de texte
			jQuery('#toggle').hide();
			jQuery('#toggle2').hide();
			jQuery('#toggle3').hide();
			jQuery('#toggle4').hide();
			   // toggle() lorsque le lien avec l'ID #toggler est cliqué
			
			$("input[type=checkbox][name=vetement").change(function() {
				if(this.checked) {
	    // Si la case est cochée, on affiche en fonction
					jQuery('#toggle').toggle(400);
					return false;
				} 
				else{
					jQuery('#toggle').hide();
				}
			}); 
			
			$("input[type=checkbox][name=livre").change(function() {
				if(this.checked) {
	    // Si la case est cochée, on affiche en fonction
					jQuery('#toggle2').toggle(400);
					return false;
				} 
				else{
					jQuery('#toggle2').hide();
				}
			}); 

			$("input[type=checkbox][name=musique").change(function() {
				if(this.checked) {
	    // Si la case est cochée, on affiche en fonction
					jQuery('#toggle3').toggle(400);
					return false;
				} 
				else{
					jQuery('#toggle3').hide();
				}
			}); 

			$("input[type=checkbox][name=sport").change(function() {
				if(this.checked) {
	    // Si la case est cochée, on affiche en fonction
					jQuery('#toggle4').toggle(400);
					return false;
				} 
				else{
					jQuery('#toggle4').hide();
				}
			}); 
		});
	</script>
	 <!--menu-->
  <!-- source : https://www.w3schools.com/bootstrap/bootstrap_navbar.asp-->
  <?php include("menu.php");

  	//si l'utilisateur n'est pas conneté en tant que vendeur ou admin
  	if(!($_SESSION["type"] == "vendeur" || $_SESSION["type"] == "admin"))
  	{
  ?>
  	<center class="main">
  		<h1>Vous ne pouvez pas vendre</h1>
  		<p>Veuillez vous connecter à votre compte vendeur pour cela</p>
  	</center>
  <?php
  	}
  	else//si connecté comme vendeur ou admin
  	{
  ?>
  <!--menu-->
	<div class="container-fluid" style="margin: 0px;">
    <div class="bande">
      <h2>Mettez en vente votre article.</h2>
    </div>

    <center><div class="logo">
  	<img src="img/logoblanc.png">
  </div></center>

<center><div class="box_vente">
	<form >
		<table>
			<tr>
				<div>
					<p>Quel type d'article souhaitez-vous vendre?</p>
					<input type="checkbox" id="livre" name="livre" value="livre">
					<label for="livre">Livre</label>
					<input type="checkbox" id="musique" name="musique" value="musique">
					<label for="musique">Musique</label>
					<input type="checkbox" id="vetement" name="vetement" value="vetement">
					<label for="vetement">Vêtement</label>
					<input type="checkbox" id="sport" name="sport" value="sport">
					<label for="sport">Sport & Loisir</label>
				</div>
			</tr>
		</table>
		<br>
	</form>
	<div id="toggle"><!-- VETEMENTS -->
		<form action="mise_en_vente.php" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td><label>Vous vendez un </label></td>
					<td><input type="text" name="type" value="vetement"></td>
				</tr>
				<tr>
					<td><label>Intitulé de l'article </label></td>
					<td><input type="text" name="nom"></td>
				</tr>
				<tr>
					<td><label>Photo </label></td>
					<td><input type="file" name="photo"></td>
				</tr>
				<tr>
					<td><label>Description </label></td>
					<td><input type="text" name="description"></td>
				</tr>
				<tr>
					<td><label>Prix </label></td>
					<td><input type="number" name="prix"   min="0"></td>
				</tr>
				<tr>
					<td><label>Sexe</label></td>
						<td><select name="sexe">
							<option value="">Sélectionner un sexe</option>
							<option value="h"> Homme</option>
							<option value="f"> Femme</option>
						</select></td>	
				</tr>
				<tr>
					<td><label>Taille</label></td>
						<td><select name="taille">
							<option value="">Sélectionner une taille</option>
							<option value="XS"> XS</option>
							<option value="S"> S</option>
							<option value="M"> M</option>
							<option value="L"> L</option>
							<option value="XL"> XL</option>
						</select></td>
				</tr>
				<tr>
					<td><label>Couleur</label></td>
						<td><select name="couleur">
							<option value="">Sélectionner une couleur</option>
							<option value="rouge"> rouge</option>
							<option value="bleu"> bleu</option>
							<option value="vert"> vert</option>
							<option value="jaune"> jaune</option>
							<option value="blanc"> blanc</option>
							<option value="noir"> noir</option>
						</select></td>
				</tr>
				<tr>
					<td><label>Quantité</label></td>
					<td><input type="number" name="quantite"  min="0"></td>
				</tr>
				<tr>
					<td><label>Catégorie </label></td>
						<td><select name="categorie">
							<option value="">Sélectionner une catégorie</option>
							<option value="manteau"> manteau</option>
							<option value="pantalon"> pantalon</option>
							<option value="haut"> haut</option>
							<option value="chaussures"> chaussures</option>
						</select></td>
				</tr>
				<tr>
					<td colspan="2" align="center">	<input type="submit" value="Valider" name="bouttonv"></td>
				</tr>
			</table>
		</form>
	</div>
	<div id="toggle2"><!-- LIVRES -->
		<form action="mise_en_vente.php" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td><label>Vous vendez un </label></td>
					<td><input type="text" name="type" value="livre"></td>
				</tr>
				<tr>
					<td><label>Intitulé de l'article </label></td>
					<td><input type="text" name="nom"></td>
				</tr>
				<tr>
					<td><label>Photo </label></td>
					<td><input type="file" name="photo"></td>
				</tr>
				<tr>
					<td><label>Description</label></td>
					<td><input type="text" name="description"></td>
				</tr>
				<tr>
					<td><label>Prix </label></td>
					<td><input type="number" name="prix"  min="0"></td>
				</tr>
				<tr>
					<td><label>Auteur </label></td>
					<td><input type="text" name="auteur"></td>
				</tr>
				<tr>
					<td><label>Date de parution </label></td>
					<td><input type="number" name="dateparution"></td>
				</tr>
				<tr>
					<td><label>Catégorie </label></td>
						<td><select name="categorie">
							<option value="">Sélectionner une catégorie </option>
							<option value="roman"> roman</option>
							<option value="bd"> bd</option>
							<option value="magazine"> magazine</option>
							<option value="manga"> manga</option>
						</select></td>	
				</tr>
				<tr>
					<td><label>Quantité </label></td>
					<td><input type="number" name="quantite"  min="0"></td>
				</tr>
				<tr>
					<td>
						
						<td colspan="2" align="center"><input type="submit" value="Valider" name="bouttonv"></td>
					</td>
				</tr>
			</table>
		</form>
	</div>
	<div id="toggle3"><!-- MUSIQUE -->
		<form action="mise_en_vente.php" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td><label>Vous vendez une </label></td>
					<td><input type="text" name="type" value="musique"></td>
				</tr>
				<tr>
					<td><label>Intitulé de l'article </label></td>
					<td><input type="text" name="nom"></td>
				</tr>
				<tr>
					<td><label>Photo </label></td>
					<td><input type="file" name="photo"></td>
				</tr>
				<tr>
					<td><label>Description </label></td>
					<td><input type="text" name="description"></td>
				</tr>
				<tr>
					<td><label>Prix </label></td>
					<td><input type="number" name="prix"  min="0"></td>
				</tr>
				<tr>
					<td><label>Artiste </label></td>
					<td><input type="text" name="artiste"></td>
				</tr>
				<tr>
					<td><label>Date de sortie </label></td>
					<td><input type="nulber" name="datesortie"  min="0" ></td>
				</tr>
				<tr>
					<td><label>Catégorie </label></td>
						<td><select name="categorie">
							<option value="">Sélectionner une catégorie </option>
							<option value="classique"> classique</option>
							<option value="electro"> electro</option>
							<option value="jazz"> jazz</option>
							<option value="rap"> rap</option>
						</select></td>
				</tr>
				<tr>
					<td><label>Quantité </label></td>
					<td><input type="number" name="quantite"  min="0"></td>
				</tr>
				<tr>
					<td>
						
						<td colspan="2" align="center"><input type="submit" value="Valider" name="bouttonv"></td>
					</td>
				</tr>
			</table>
		</form>
	</div>
	<div id="toggle4"><!-- SPORT -->
		<form action="mise_en_vente.php" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td><label>Vous vendez un article de  </label></td>
					<td><input type="text" name="type" value="sport"></td>
				</tr>
				<tr>
					<td><label>Intitulé de l'article </label> </td>
					<td><input type="text" name="nom"></td>
				</tr>
				<tr>
					<td><label>Photo </label></td>
					<td><input type="file" name="photo"></td>
				</tr>
				<tr>
					<td><label>Description </label></td>
					<td><input type="text" name="description"></td>
				</tr>
				<tr>
					<td><label>Prix </label></td>
					<td><input type="number" name="prix"  min="0"></td>
				</tr>
				<tr>
					<td><label>Catégorie </label></td>
						<td><select name="categorie">
							<option value="">Sélectionner une catégorie</option>
							<option value="randonnee"> randonnée</option>
							<option value="natation"> natation</option>
							<option value="equitation"> équitation</option>
							<option value="tennis"> tennis</option>
						</select></td>	
				</tr>
				<tr>
					<td><label>Quantité </label></td>
					<td><input type="number" name="quantite"  min="0"></td>
				</tr>
				<tr>
					<td>
						
						<td colspan="2" align="center"><input type="submit" value="Valider" name="bouttonv"></td>
					</td>
				</tr>
			</table>
		</form>
		</div>

</div></center>
		 <!--footer-->
  <?php 
  	}//fin de la condiction connecté comme vendeur ou admin
  include("footer.php"); 
  ?>
  <!--footer-->
	</body>
	</html> 
