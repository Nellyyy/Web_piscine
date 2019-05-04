<?php

	//identification de notre BDD
	$database = "piscine_test";

	//connectez-vous dans la BDD
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	//si on clique sur un boutton voir +
	//if($_POST["voir_plus"]){
		
		if($db_found){
			
			$item_id=$data['item_id'];
			echo "id trouve : ". $item_id;
		}else{
			echo "BDD non trouvée";
		}
	//}
	mysqli_close($db_handle);
	echo "BDD fermee";
?>