<?php 
if(!isset($_SESSION))
{
	session_start();
};
?>

<!DOCTYPE html>
<html>
<head>
  <title>Ece Amazon</title>

   <!--favicon-->
  <?php include("favicon.php"); ?>

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

   <!--recupération de l'id du l'item clique-->
	<?php 
		//echo $_GET['id'] ; 
		$id = $_GET['id'] ; 

	    //identification de notre BDD
	    $database = "piscine_test";

	    //connectez-vous dans la BDD-->
	    $db_handle = mysqli_connect('localhost', 'root', '');
	    $db_found = mysqli_select_db($db_handle, $database);

	    //si la base existe
	    //on selectionne l'item avec l'id envoyé
	    if($db_found){
	    	$sql = "SELECT * FROM `item` WHERE `item_id` LIKE '%$id%'"; 
	    	$result = mysqli_query($db_handle, $sql);
	    	$data = mysqli_fetch_assoc($result);
	    	$photo = $data["item_photo"];
		}
		
 	?>

 

<div class="container-fluid">
  	<div class="row hola">
  		<div class="col-lg-4" >
	  		<div class="item_grand">
		  		<div class="photo_item_grand">
		  			<img src="<?php echo $photo?>">
		  		</div>
	  		</div>
	  	</div>
	  	

<!--affichage des details pour les livres-->
	  	<?php 
	  		if($data['item_type'] == "livre")
	  		{
	  	?>

	  	<div class="col-lg-4" >
	  		<div class="item_text_grand">
	  			
	  			<p style="font-weight: bold;"><?php echo $data['item_titre'];?></p>
	  			<p style="font-style: italic;"><?php echo $data['item_description'];?></p>
	  			<p><?php echo "Catégorie : ".$data['item_categorie'];?></p>
	  			<p><?php echo "Auteur : ".$data['item_livre_auteur'];?></p>
	         	<p><?php echo "Date de parution : ".$data['item_livre_date_publication'];?></p>

	         	<hr class="separateur_footer">
	         	<p><?php echo "Prix unitaire : "?></p>
	  			<p style="font-weight: bold; float: right;"><?php echo $data['item_prix'].'$';?></p>
	  			</br>
	  			<hr class="separateur_footer">

	  
	         	
	         	</br>
	  		</div>
	  	</div>


	  	<?php
	  		}
	  	?>
<!--fin affichage des details pour les livres-->


<!--affichage des details pour les vetement-->
	  	<?php 
	  		 if($data['item_type'] == "vetement")
	  		{
	  	?>

	  	<div class="col-lg-4" >
	  		<div class="item_text_grand">
	  			
	  			<p style="font-weight: bold;"><?php echo $data['item_titre'];?></p>
	  			<p style="font-style: italic;"><?php echo $data['item_description'];?></p>
	  			<p><?php echo "Taille : ".$data['item_vetement_taille'];?></p>
	  			<p><?php echo "Couleur : ".$data['item_vetement_couleur'];?></p>

	         	<hr class="separateur_footer">
	         	<p><?php echo "Prix unitaire : "?></p>
	  			<p style="font-weight: bold; float: right;"><?php echo $data['item_prix'].'$';?></p>
	  			</br>
	  			<hr class="separateur_footer">

	         	
	         	</br>
	  		</div>
	  	</div>


	  	<?php
	  		}
	  	?>
<!--fin affichage vetement-->
<!--affichage des details pour les musique-->
	  	<?php 
	  		 if($data['item_type'] == "musique")
	  		{
	  	?>

	  	<div class="col-lg-4" >
	  		<div class="item_text_grand">
	  			
	  			<p style="font-weight: bold;"><?php echo $data['item_titre'];?></p>
	  			<p style="font-style: italic;"><?php echo $data['item_description'];?></p>
	  			<p><?php echo "Style : ".$data['item_categorie'];?></p>
	  			<p><?php echo "Artiste : ".$data['item_musique_artiste'];?></p>
	  			<p><?php echo "Date de sortie : ".$data['item_date_sortie'];?></p>

	         	<hr class="separateur_footer">
	         	<p><?php echo "Prix unitaire : "?></p>
	  			<p style="font-weight: bold; float: right;"><?php echo $data['item_prix'].'$';?></p>
	  			</br>
	  			<hr class="separateur_footer">

	        
	         	
	         	</br>
	  		</div>
	  	</div>


	  	<?php
	  		}
	  	?>
<!--fin affichage musique-->

<!--affichage des details pour les sport-->
	  	<?php 
	  		 if($data['item_type'] == "sport")
	  		{
	  	?>

	  	<div class="col-lg-4" >
	  		<div class="item_text_grand">
	  			
	  			<p style="font-weight: bold;"><?php echo $data['item_titre'];?></p>
	  			<p style="font-style: italic;"><?php echo $data['item_description'];?></p>
	  			<p><?php echo "Catégorie : ".$data['item_categorie'];?></p>


	         	<hr class="separateur_footer">
	         	<p><?php echo "Prix unitaire : "?></p>
	  			<p style="font-weight: bold; float: right;"><?php echo $data['item_prix'].'$';?></p>
	  			</br>
	  			<hr class="separateur_footer">

	         	
	         	
	         	</br>
	  		</div>
	  	</div>


	  	<?php
	  		}
	  	?>
<!--fin affichage sport-->











	         	<p style="font-style: italic; color: #cccccc;">Dépechez-vous, il ne reste plus que <?php echo $data['item_qte_stock'];?> article(s) en stock!</p>
	         	<?php  $id=$data['item_id'];?>

<?php
	$utilisateur_email=$_SESSION["email"];
	if ($utilisateur_email) {
	
	
?>
	         	<form method="post" action="AjoutPanier.php">
					<tr>
					<td><input type="number" name="quantite"   min="1" max="<?php echo $data['item_qte_stock'];?>"></td>
				</tr>
				<input type="hidden" name="id_choisi" value=" <?php echo $data['item_id'];?>">
				<input type="submit" value="Ajouter au panier" >
				  
				</form>

<?php	
}  
else {	?>
				<form method="post" action="connexionPage.php">
					
					<tr>
					<td><input type="number" name="quantite"   min="1" max="<?php echo $data['item_qte_stock'];?>"></td>
				</tr>
					<input type="submit" value="Ajouter au panier" >
				  
				</form>
				<?php
       	 
       	}       	
?>	            
	  		</div>
	   	</div>
  </div>
</div>


  
  <!--footer-->
  <?php include("footer.php"); ?>
  <!--footer-->
</body>
</html>