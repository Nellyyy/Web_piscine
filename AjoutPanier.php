<?php 
		echo $_GET['id_choisi'] ; 
		$id = $_GET['id_choisi'] ; 

?>

<?php 
		echo $_GET['id_choisi'] ; 
		$id = $_GET['id_choisi'] ; 
		$utilisateur_email="lyla1998@gmail.com";

	    //identification de notre BDD
	    $database = "piscine_test";

	    //connectez-vous dans la BDD-->
	    $db_handle = mysqli_connect('localhost', 'root', '');
	    $db_found = mysqli_select_db($db_handle, $database);

	    //si la base existe
	    //on selectionne l'item avec l'id envoyé
	    if($db_found){

	    $addsql="INSERT INTO panier VALUES('$id', '$utilisateur_email')";
		$result = mysqli_query($db_handle, $addsql);
		echo "add successfully to panier";
		}else{
			echo "pas ajouter dans panier";
		}
		
 	?>