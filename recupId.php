<?php 
	session_start();
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

  	<!--affichage de l'item-->
  <div class="container-fluid">
  	<div class="row">
  		<div class="col-lg-6" >
	  		<div class="item_grand">
		  		<div class="photo_item_grand">
		  			<img src="<?php echo $photo; ?>">
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
	         	</br>
	         	<p style="font-style: italic; color: #cccccc;">Dépechez-vous, il ne reste plus que <?php echo $data['item_qte_stock'];?></p>
	         	
	         	<p>id avant le bouton <?php echo $id=$data['item_id'];?></p> 
	         	<?php  $id=$data['item_id'];?>

	         	<form method="post" action="AjoutPanier.php">
				<select  name="quantite">
				    <option value="1">1</option>
				    <option value="2">2</option>
				    <option value="3">3</option>
				    <option value="4">4</option>
				</select>
				<input type="hidden" name="id_choisi" value=" <?php echo $data['item_id'];?>">
				<input type="submit" value="Ajouter au panier" >
				  
				</form>
	         	
	            
	  		</div>
	  	</div>
  	</div>
  </div>


  
  <!--footer-->
  <?php include("footer.php"); ?>
  <!--footer-->
</body>
</html>