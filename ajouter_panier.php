<?php

	//id acheteur nul s'il n'a pas de compte
	$id_acheteur=1;
	//identification de notre BDD
	$database = "piscine_test";

	//connectez-vous dans la BDD
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	//si on clique sur un boutton ajouter au panier
	if($_POST["ajouter_panier"]){
		//si le mec est connecte
		//if ($GLOBALS["$connecte"]) {
		//	$id_acheteur=$GLOBALS["$utilisateur_id"];
		//}
		//si on trouve la bdd
		if($db_found){
			//on ajoute l'id du mec et l'id item dans le panier
			//$sql="INSERT INTO panier(panier_id, item_id, utilisateur_id) VALUES ('','$id_acheteur', '$id_item')";
			//$result = mysqli_query($db_handle, $sql);
			$sql = "INSERT INTO panier VALUES (1, '$id_acheteur')";
			$result = mysqli_query($db_handle, $sql);

			echo "Add successfully";
		}else{
			echo "BDD non trouvée";
		}
	}
	mysqli_close($db_handle);
	echo "BDD fermee";
?>