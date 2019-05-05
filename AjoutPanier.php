<?php
	if(!isset($_SESSION))
	{
		session_start();
	}
?>

<?php 
		
		
		$id = $_POST['id_choisi']; 
		$quantite= $_POST['quantite'];
		$utilisateur_email=$_SESSION["email"];
		
	    //identification de notre BDD
	    $database = "piscine_test";

	    //connectez-vous dans la BDD-->
	    $db_handle = mysqli_connect('localhost', 'root', '');
	    $db_found = mysqli_select_db($db_handle, $database);

	    //si la base existe
	    //on selectionne l'item avec l'id envoyé
	  
		    if($db_found){
		    	if(isset($_SESSION["email"])){
		    		$addsql="INSERT INTO panier VALUES('$id', '$utilisateur_email','$quantite')";
					$result = mysqli_query($db_handle, $addsql);
		    	}
			}else{
				echo "pas ajouter dans panier";
			}
		include("vetements.php");
		
 	?>