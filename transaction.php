///+1 _1 et envoie email

	<?php

	//le parametre de $_POST = "name" de <input> de votre page HTML
	
	//session_start();
	 ///je récupère l'id du mec
  //$email= $_SESSION["email"];
  $email = 'charlene.bruno@edu.ece.fr';

	//identifier votre BDD
	$database = "piscine_test";
	//connectez-vous dans votre BDD
	//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

  //lancement de la requête 
	if ($_POST["boutton_transaction"]) {
		if ($db_found) {
		
		//on enleve de la reserve les produits achetés
				 $updatesql = "UPDATE `item`,`panier` SET item.`item_qte_stock` = item.`item_qte_stock`- (SELECT `panier_qte` FROM `panier` WHERE 
					`panier`.`item_id` = `item`.`item_id` AND `panier`.`utilisateur_email` LIKE '%$email') WHERE `panier`.`item_id` = `item`.`item_id` AND `panier`.`utilisateur_email` LIKE '%$email'";
				$result = mysqli_query($db_handle, $updatesql);
	//on augmente  de ventes de la qte des produits achetés
				$updatesql2="UPDATE `item`,`panier` SET item.`item_qte_vendue` = item.`item_qte_vendue`+ (SELECT `panier_qte` FROM `panier` WHERE 
					`panier`.`item_id` = `item`.`item_id` AND `panier`.`utilisateur_email` LIKE '%$email') WHERE `panier`.`item_id` = `item`.`item_id` AND `panier`.`utilisateur_email` LIKE '%$email'";
				$result2 = mysqli_query($db_handle, $updatesql2);

		} else {
		echo "Database not found";
	}
}
	//fermer la connexion
mysqli_close($db_handle);
?>