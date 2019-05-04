<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Ece Amazon</title>

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

  <div class="container-fluid">
  	<h1>Recapitulatif de votre panier</h1>
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
	  			<hr class="separateur_footer" style="margin: 0 40% 15px ;">
	  			<p style="font-style: italic;"><?php echo $data['item_description'];?></p>
	  			<hr class="separateur_footer" style="margin: 0 40% 15px ;">
	         	<p><?php echo "Disponible en taille : ".$data['item_vetement_taille'];?></p>
	         	<p><?php echo "Couleur de l'article : ".$data['item_vetement_couleur'];?></p>
	         	<p><?php echo "Quantite choisie : ".$data['panier_qte'];?></p>
	         	</br>
	         	<?php
	         	$id=$data['item_id'];
	         	?>
	          <p style="float: right;"><?php echo "<a href=delete_article.php?id=". $id.">retirer</a>"  ;?></p>
	  		</div>
	  	</div>
  	</div>
  </div>

  <!-- séparateur entre les articles affichés-->
   <hr class="separateur_footer" style="margin: 0 10% 10px;">

 <?php
 $count=$count+1;
 $sous_total=$sous_total + $data['item_prix']*$data['panier_qte'];
 ?>

 <h5>le sous total de l'article est <?php echo $sous_total;?> </h5>

 <?php
 $total= $total + $sous_total;
      }
      if($count==0){
      	echo "pas d'articles dans le panier";
      }else {
?>

<h4>le total de votre commande est <?php echo $total;?> </h4>
		<form method="post" action="passer_commande.php">
						
						<input type="hidden" name="total" value=" <?php echo $total;?>">
						<input type="submit" value="Finaliser la commande" >
		</form>

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