<!DOCTYPE html>
<html>
<head>
	<title>Ece Amazon</title>

  <!--font style-->
  <link href="https://fonts.googleapis.com/css?family=BioRhyme+Expanded" rel="stylesheet">

  <!--lien fichier css-->
  <link rel="stylesheet" media="screen" type="text/css" href="styles.css" />
  
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

  <!--connection bdd-->
  <?php
  //identification de notre BDD
  $database = "piscine_test";

  //connectez-vous dans la BDD-->
  $db_handle = mysqli_connect('localhost', 'root', '');
  $db_found = mysqli_select_db($db_handle, $database);
  ?>

  <!--petit texte haut de page-->
  <h2>Finalisation de la commande </h2>
  <?php 

  ///je récupère l'id du mec
  $email $_GET['email'] ;

    ///je récupère le montant avant frais de port
    ///faire une fonction calcul total prix en ajouter des frais de port selon un pourcentage 
  $total $_GET['total'] ;  

  ?>

  <!--recherche dans bdd: on selectionne tous les vetements-->
  <?php

  //lancement de la requête 
  $vet="vetement";
  if($db_found){
  ///je veux afficher l'adresse de livraison de mon utilsateur en question
  $sql = "SELECT * FROM `livraison` WHERE `utilisateur_email` LIKE '%$email%'"; 
  $result = mysqli_query($db_handle, $sql);

  ///je veux afficher les coordonnées bancaires de mon utilsateur en question
  $sql2 = "SELECT * FROM `paiement` WHERE `utilisateur_email` LIKE '%$email%'"; 
  $result2 = mysqli_query($db_handle, $sql2);

    ///je veux afficher les articles du panier de mon utilsateur en question
    //ici on utilise une JOINTURE
  $sql3 = "SELECT * FROM `panier`,`item` WHERE `panier`.`item_id` = `item`.`item_id` AND  `panier`.`utilisateur_email` LIKE '%email'"; 
  $result3 = mysqli_query($db_handle, $sql3);

  ?>

  <div class="container-fluid">
    <div class="row">

      <?php
      //on va scanner tous les tuples un par un-->
      while ($data = mysqli_fetch_array($result3,MYSQLI_ASSOC)) 
      {
        ?>

        <!--on affiche les résultats-->
        <div class="col-lg-4" >
          <div class="articles">
            <div class="articles_text">
              <p style="font-weight: bold;"><?php echo $data['item_titre'];?></p>
              <p style="font-style: italic;"><?php echo $data['item_prix'];?></p>
              <p style="font-style: italic;"><?php echo $data['item_photo'];?></p>
               <p style="font-style: italic;"><?php echo $data['panier_qte'];?></p>
            </div> 
          </div>
        </div>

        <?php
      }
      //fermer la base
      //}else {echo "db pas trouve";}
      //mysqli_close($db_handle);

      ?>
    </div>
    <div class="row">

      <?php
      //on va scanner tous les tuples un par un-->
      if(mysqli_fetch_array($result,MYSQLI_ASSOC)!=0){
      while($data = mysqli_fetch_array($result2,MYSQLI_ASSOC)) 
      {
        ?>

        <!--on affiche les résultats-->
        <div class="col-lg-4" >
          <div class="paiement">
            <div class="paiement_text">
              <form>
                <table>
                  <tr>
                    <td>type de carte: </td>
                    <td><input type="text" name="type" value="$data['paiement_type']"></td>
                  </tr>
                  <tr>
                    <td>Numéro de carte: </td>
                    <td><input type="number" name="numero" value="$data['paiement_num']"></td>
                  </tr>
                  <tr>
                    <td>titulaire: </td>
                    <td><input type="text" name="nom" value="$data['paiement_nom']"></td>
                  </tr>
                  <tr>
                    <td>date d'expiration: </td>
                    <td><input type="number" nom="date" value="$data['paiement_date']"></td>
                  </tr>
                  <tr>
                    <td>code de sécurité: </td>
                    <td><input type="number" nom="secu" value="$data['paiement_secu']" ></td>
                  </tr>
                </table>
              </form>
            </div> 
          </div>
        </div>

        <?php
      }}
      //fermer la base
      //}else {echo "db pas trouve";}
      //mysqli_close($db_handle);

      ?>
    </div>
  </div>

   <div class="row">

      <?php
      //on va scanner tous les tuples un par un-->
      if(mysqli_fetch_array($result,MYSQLI_ASSOC)==0){
        ?>

        <!--on affiche les résultats-->
        <div class="col-lg-4" >
          <div class="paiement">
            <div class="paiement_text">
              <form action="bancaire.php" method="post">
                <table>
                  <tr>
                    <td>type de carte: </td>
                    <td><input type="text" name="type"></td>
                  </tr>
                  <tr>
                    <td>Numéro de carte: </td>
                    <td><input type="number" name="numero"></td>
                  </tr>
                  <tr>
                    <td>titulaire: </td>
                    <td><input type="text" name="nom"></td>
                  </tr>
                  <tr>
                    <td>date d'expiration: </td>
                    <td><input type="number" name="date"></td>
                  </tr>
                  <tr>
                    <td>code de sécurité: </td>
                    <td><input type="number" name="secu" ></td>
                  </tr>
                  <tr>
                      <td colspan="2" align="center"> <input type="submit" value="Enregistrer" name="bouttone"></td>
                   </tr>
                </table>
              </form>
            </div> 
          </div>
        </div>

        <?php
      }
      //fermer la base
      //}else {echo "db pas trouve";}
      //mysqli_close($db_handle);

      ?>
    </div>
  </div>
  
}


<!--lien avec fichier php qui ajoute au panier-->
<form action="transaction.php" method="post">
  <!--bouton ajouter au panier-->
  <input type="submit" value="valider" name="boutton_transaction">
</form>

<!--footer-->
<?php include("footer.php"); ?>
<!--footer-->
</body>
</html>