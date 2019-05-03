<?php

    //identification de notre BDD
    $database = "piscine_test";

    //connectez-vous dans la BDD-->
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if($db_found){
	    if(isset($_SESSION["email"])){
	    	$email = $_SESSION["email"];
	    	//on recupère le mec
	    	$sql = "SELECT * FROM `utilisateur` WHERE `utilisateur_email` LIKE '%$email%'"; 
	   		$result = mysqli_query($db_handle, $sql);
	   		$data = mysqli_fetch_assoc($result);
	   		$visitor_email="lyla1998@gmail.com";

	   		//on recupère son panier
	   		//$sql2 = "SELECT * FROM `panier`,`item` WHERE `panier`.`item_id` = `item`.`item_id` AND `panier`.`utilisateur_email`LIKE '%$email%' "; 
  			//$result2 = mysqli_query($db_handle, $sql2);
  			//$data2 = mysqli_fetch_assoc($result2);

  			//on recupère les données du mec
	   		$name=$data['utilisateur_nom'];
	   		$prenom=$data['utilisateur_prenom'];
			$utilisateur_email=$data['utilisateur_email'];

			//on recupère les articles de son panier
			//a faire


			//$message=$_POST['message'];
			//$commune=$_POST['commune'];

			$email_subject="ECE Amazon : bon de commande";
			$email_body="Bonjour Mme/Mr ". $nom . " ".$prenom . "\n" . "Votre commande ECE Amazon a bien été envoyée." ;
			
			$to=$utilisateur_email;
			$headers="From: $visitor_email \r\n";
			$headers .= "Reply-to: $visitor_email \r\n";
			
			mail($to,$email_subject,$email_body, $headers);
			header("Location: HomePage.php");
	    }
	}

	

?>