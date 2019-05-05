<?php
if(!isset($_SESSION))
{
	session_start();
}
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

 <!--menu catégories--> 
  <div class="container-fluid" style="margin: 0px;">
    <div class="bande">
      <h2>Recapitulatif de votre panier</h2>
    </div>
  </div>

  <div class="container-fluid">

	  	<?php
	  		//identification de notre BDD
   			 $database = "piscine_test";

		    //connection dans la BDD-->
		    $db_handle = mysqli_connect('localhost', 'root', '');
		    $db_found = mysqli_select_db($db_handle, $database);

		    $email= $_SESSION["email"];

		    if($db_found){
		    	if(isset($email)){
		    	
		    	//compteur
		    		$count=0;
		    		$total=0;
			    	//on recherche dans items les items du mec
			    	///je veux afficher les articles du panier de mon utilsateur en question
				  //ici on utilise une JOINTURE
				  $sql = "SELECT * FROM `panier`,`item` WHERE `panier`.`item_id` = `item`.`item_id` AND `panier`.`utilisateur_email`LIKE '%$email%' ";
				  $result = mysqli_query($db_handle, $sql);
						
				      //on va scanner tous les tuples un par un-->
				      while ($data = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
				      {
				      	$sous_total=0;
				      	 $photo_name = $data["item_photo"];
				    ?>

 <div class="container-fluid">
  	<div class="row hola">
  		<div class="col-lg-4" >
	  		<div class="item_grand">
		  		<div class="photo_item_grand">
		  			<img src="<?php echo $photo_name?>">
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

	         	<p><?php echo "Quantite choisie : ".$data['panier_qte'];?></p>
	         	<?php
 				$count=$count+1;
				 $sous_total=$sous_total + $data['item_prix']*$data['panier_qte'];
				 ?>
				<p><?php echo "Sous-total : "?></p>
				 <p style="font-weight: bold; float: right;"><?php echo $sous_total.'$';?></p>
				</br>
				 <hr class="separateur_footer" >
	         	
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

	         	<p><?php echo "Quantite choisie : ".$data['panier_qte'];?></p>
	         	<?php
 				$count=$count+1;
				 $sous_total=$sous_total + $data['item_prix']*$data['panier_qte'];
				 ?>
				<p><?php echo "Sous-total : "?></p>
				 <p style="font-weight: bold; float: right;"><?php echo $sous_total.'$';?></p>
				</br>
				 <hr class="separateur_footer" >
	         	
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

	         	<p><?php echo "Quantite choisie : ".$data['panier_qte'];?></p>
	         	<?php
 				$count=$count+1;
				 $sous_total=$sous_total + $data['item_prix']*$data['panier_qte'];
				 ?>
				<p><?php echo "Sous-total : "?></p>
				 <p style="font-weight: bold; float: right;"><?php echo $sous_total.'$';?></p>
				</br>
				 <hr class="separateur_footer" >
	         	
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

	         	<p><?php echo "Quantite choisie : ".$data['panier_qte'];?></p>
	         	<?php
 				$count=$count+1;
				 $sous_total=$sous_total + $data['item_prix']*$data['panier_qte'];
				 ?>
				<p><?php echo "Sous-total : "?></p>
				 <p style="font-weight: bold; float: right;"><?php echo $sous_total.'$';?></p>
				</br>
				 <hr class="separateur_footer" >
	         	
	         	</br>
	  		</div>
	  	</div>


	  	<?php
	  		}
	  	?>
<!--fin affichage sport-->


	  	<div class="col-lg-4">
	  		<p> 
				<?php
	         	$id=$data['item_id'];
	         	?>
	         	<!--<div id="supp">-->
	         	<div>		
	         		<!--<div id="supp_img"><img src="img/supprimer.jpg"></div>-->
	         		 <p style="padding-left: 50px;"><?php echo "<a href=delete_article.php?id=". $id.">Supprimer du panier</a>"  ;?></p>
	          </div>
	  		</p>
	  	</div>
  	</div>
  </div>
<!--fin affichage des details -->
  


<!--affichage total-->

 <?php
 $total= $total + $sous_total;
      }
      if($count==0){
?>
      	<center class="main">
      		<p>Pas d'articles dans le panier</p>
      	</center>
<?php
      }else {
?>
<div id="total">
<p><?php echo "Total de votre commande: "?></p>
				 <p style="font-weight: bold; float: right;"><?php echo $total.'$';?></p>
				</br>
				 <hr class="separateur_footer" >

		<form method="post" action="passer_commande.php" style="float: right; margin: 40px 10px;">
						
						<input type="hidden" name="total" value=" <?php echo $total;?>">
						<input type="submit" value="Finaliser la commande" >
		</form>
</div>
  </div>
 
 <?php }
      //fermer la base
    }
  }else {echo "db pas trouve";}
      mysqli_close($db_handle);

?> 
  
  <!--footer-->
  <?php include("footer.php"); ?>
  <!--footer-->
</body>
</html>