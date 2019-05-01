	<!DOCTYPE html>
	<html>
	<head>
		<title>Vente</title>
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
  <?php include("menu.php"); ?>
  <!--menu-->
	<h2>Article à vendre</h2>
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
	</form>
	<div id="toggle">
		<form action="mise_en_vente.php" method="post">
			<table>
				<tr>
					<td>Vous vender un </td>
					<td><input type="text" name="type" value="vetement"></td>
				</tr>
				<tr>
					<td>Intitulé de l'article: </td>
					<td><input type="text" name="nom"></td>
				</tr>
				<tr>
					<td>Photo: </td>
					<td><input type="text" name="photo"></td>
				</tr>
				<tr>
					<td>Description: </td>
					<td><input type="text" name="description"></td>
				</tr>
				<tr>
					<td>Prix: </td>
					<td><input type="number" name="prix" ></td>
				</tr>
				<tr>
					<td>Vidéo: </td>
					<td><input type="text" name="video"></td>
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
					<td><label>couleur: </label></td>
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
					<td>Quantité: </td>
					<td><input type="number" name="quantite"></td>
				</tr>
				<tr>
					<td colspan="2" align="center">	<input type="submit" value="Valider" name="bouttonv"></td>
				</tr>
			</table>
		</form>
	</div>
	<div id="toggle2">
		<form action="mise_en_vente.php" method="post">
			<table>
				<tr>
					<td>Vous vender un </td>
					<td><input type="text" name="type" value="livre"></td>
				</tr>
				<tr>
					<td>Intitulé de l'article: </td>
					<td><input type="text" name="nom"></td>
				</tr>
				<tr>
					<td>Photo: </td>
					<td><input type="text" name="photo"></td>
				</tr>
				<tr>
					<td>Description: </td>
					<td><input type="text" name="description"></td>
				</tr>
				<tr>
					<td>Prix: </td>
					<td><input type="number" name="prix"></td>
				</tr>
				<tr>
					<td>Vidéo: </td>
					<td><input type="text" name="video"></td>
				</tr>
				<tr>
					<td>Auteur: </td>
					<td><input type="text" name="auteur"></td>
				</tr>
				<tr>
					<td>Date de parution: </td>
					<td><input type="text" name="dateparution"></td>
				</tr>
				<tr>
					<td><label>nature: </label></td>
						<td><select name="nature">
							<option value="">Sélectionner une nature </option>
							<option value="roman"> roman</option>
							<option value="bd"> bd</option>
							<option value="magazine"> magazine</option>
							<option value="manga"> manga</option>
							<option value="nouvelle"> nouvelle</option>
						</select></td>	
				</tr>
				<tr>
					<td>Quantité: </td>
					<td><input type="number" name="quantite"></td>
				</tr>
				<tr>
					<td>
						<input type="submit" value="Valider" name="bouttonv">
						<td colspan="2" align="center"></td>
					</td>
				</tr>
			</table>
		</form>
	</div>
	<div id="toggle3">
		<form action="mise_en_vente.php" method="post">
			<table>
				<tr>
					<td>Vous vender une </td>
					<td><input type="text" name="type" value="musique"></td>
				</tr>
				<tr>
					<td>Intitulé de l'article: </td>
					<td><input type="text" name="nom"></td>
				</tr>
				<tr>
					<td>Photo: </td>
					<td><input type="text" name="photo"></td>
				</tr>
				<tr>
					<td>Description: </td>
					<td><input type="text" name="description"></td>
				</tr>
				<tr>
					<td>Prix: </td>
					<td><input type="number" name="prix"></td>
				</tr>
				<tr>
					<td>Vidéo: </td>
					<td><input type="text" name="video"></td>
				</tr>
				<tr>
					<td>Artiste: </td>
					<td><input type="text" name="artiste"></td>
				</tr>
				<tr>
					<td>Date de sortie: </td>
					<td><input type="text" name="datesortie"></td>
				</tr>
				<tr>
					<td><label>style: </label></td>
						<td><select name="style">
							<option value="">Sélectionner un style </option>
							<option value="hip hop"> hip hop</option>
							<option value="classique"> classique</option>
							<option value="elecctro"> electro</option>
							<option value="jazz"> jazz</option>
							<option value="rap"> rap</option>
						</select></td>
				</tr>
				<tr>
					<td>Quantité: </td>
					<td><input type="number" name="quantite"></td>
				</tr>
				<tr>
					<td>
						<input type="submit" value="Valider" name="bouttonv">
						<td colspan="2" align="center"></td>
					</td>
				</tr>
			</table>
		</form>
	</div>
	<div id="toggle4">
		<form action="mise_en_vente.php" method="post">
			<table>
				<tr>
					<td>Vous vender un article de </td>
					<td><input type="text" name="type" value="sport"></td>
				</tr>
				<tr>
					<td>Intitulé de l'article: </td>
					<td><input type="text" name="nom"></td>
				</tr>
				<tr>
					<td>Photo: </td>
					<td><input type="text" name="photo"></td>
				</tr>
				<tr>
					<td>Description: </td>
					<td><input type="text" name="description"></td>
				</tr>
				<tr>
					<td>Prix: </td>
					<td><input type="number" name="prix"></td>
				</tr>
				<tr>
					<td>Vidéo: </td>
					<td><input type="text" name="video"></td>
				</tr>
				<tr>
					<td><label>catégorie: </label></td>
						<td><select name="categorie">
							<option value="">Sélectionner une catégorie</option>
							<option value="randonnee"> randonnée</option>
							<option value="natation"> natation</option>
							<option value="equitation"> équitation</option>
							<option value="tennis"> tennis</option>
							<option value="football"> football</option>
						</select></td>	
				</tr>
				<tr>
					<td>Quantité: </td>
					<td><input type="number" name="quantite"></td>
				</tr>
				<tr>
					<td>
						<input type="submit" value="Valider" name="bouttonv">
						<td colspan="2" align="center"></td>
					</td>
				</tr>
			</table>
		</form>
		</div>
		 <!--footer-->
  <?php include("footer.php"); ?>
  <!--footer-->
	</body>
	</html>
