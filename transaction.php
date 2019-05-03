
	<?php

	//le parametre de $_POST = "name" de <input> de votre page HTML
	
	session_start();
	 ///je récupère l'id du mec
  $email= $_SESSION["email"];

	//identifier votre BDD
	$database = "piscine_test";
	//connectez-vous dans votre BDD
	//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

  //lancement de la requête 
	if ($_POST["boutton_transaction"]) {
		if ($db_found) {

	//je check si l'utilisateur a bien renmpli une cb
	$sqlp = "SELECT * FROM `paiement` WHERE `utilisateur_email` LIKE '%$email%'"; 
  $resultp = mysqli_query($db_handle, $sqlp);

		if (mysqli_num_rows($resultp) == 0)
		{
			echo "veuillez renseigner des coordonnées bancaires";
			$_SESSION["try_paiement"] = True;
			//On redirige vers la page connexion
			header('Location: passer_commande.php');
			exit;//On n'execute pas le reste
		}
		else{

		//on enleve de la reserve les produits achetés
				 $updatesql = "UPDATE `item`,`panier` SET item.`item_qte_stock` = item.`item_qte_stock`- (SELECT `panier_qte` FROM `panier` WHERE 
					`panier`.`item_id` = `item`.`item_id` AND `panier`.`utilisateur_email` LIKE '%$email') WHERE `panier`.`item_id` = `item`.`item_id` AND `panier`.`utilisateur_email` LIKE '%$email'";
				$result = mysqli_query($db_handle, $updatesql);
	//on augmente  de ventes de la qte des produits achetés
				$updatesql2="UPDATE `item`,`panier` SET item.`item_qte_vendue` = item.`item_qte_vendue`+ (SELECT `panier_qte` FROM `panier` WHERE 
					`panier`.`item_id` = `item`.`item_id` AND `panier`.`utilisateur_email` LIKE '%$email') WHERE `panier`.`item_id` = `item`.`item_id` AND `panier`.`utilisateur_email` LIKE '%$email'";
				$result2 = mysqli_query($db_handle, $updatesql2);

				 ///je veux afficher les articles du panier de mon utilsateur en question
  //ici on utilise une JOINTURE
  $sql3 = "SELECT * FROM `panier`,`item` WHERE `panier`.`item_id` = `item`.`item_id` AND `panier`.`utilisateur_email`LIKE '%$email%' "; 
  $result3 = mysqli_query($db_handle, $sql3);

				 while ($data = mysqli_fetch_array($result3,MYSQLI_ASSOC)) 
      {
      	$sqldelete ="DELETE FROM `panier` WHERE `utilisateur_email` LIKE '$email'";
      	 $resultdelete= mysqli_query($db_handle, $sqldelete);
      } 

		} 
	}else {
		echo "Database not found";
	}
}
	include("mail.php");

	//fermer la connexion
mysqli_close($db_handle);
?>