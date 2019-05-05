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
	<?php 
  include("menu.php"); ?>
  <!--menu-->

  <!--connection bdd-->
  <?php
  //identification de notre BDD
  $database = "piscine_test";
  $db_handle = mysqli_connect('localhost', 'root', '');
  $db_found = mysqli_select_db($db_handle, $database);
  ?>

  <!--petit texte haut de page-->
  <!--menu catégories--> 
  <div class="container-fluid" style="margin: 0px;">
    <div class="menu_categorie">
      <p>Panier > Finalisation de la commande </p>
    </div>
  </div>


  <?php 

  ///je récupère l'id du mec
  $email= $_SESSION["email"];


  ///je récupère le montant avant frais de port
  $total = $_POST['total'];


  //lancement de la requête 
  if($db_found){
  ///je veux afficher l'adresse de livraison de mon utilsateur en question
  $sql = "SELECT * FROM `livraison` WHERE `utilisateur_email` LIKE '%$email%'"; 
  $result = mysqli_query($db_handle, $sql);

  ///je veux afficher les coordonnées bancaires de mon utilsateur en question
  $sql2 = "SELECT * FROM `paiement` WHERE `utilisateur_email` LIKE '%$email%'"; 
  $result2 = mysqli_query($db_handle, $sql2);

  ///je veux afficher les articles du panier de mon utilsateur en question
  //ici on utilise une JOINTURE
  $sql3 = "SELECT * FROM `panier`,`item` WHERE `panier`.`item_id` = `item`.`item_id` AND `panier`.`utilisateur_email`LIKE '%$email%' "; 
  $result3 = mysqli_query($db_handle, $sql3);

  ?>

  <div class="container-fluid">
    <div class="row">
        <h3 style="padding-left: 20px;">Récapitulatif des items</h3>
        <hr class="separateur_footer" >
      <?php
      //on va scanner tous les tuples un par un-->

      while ($data = mysqli_fetch_array($result3,MYSQLI_ASSOC)) 
      { 
              $photo_name = $data["item_photo"];
        ?>

        <!--on affiche les résultats--> 
       
        <div class="col-lg-4" >
          <div class="articles">
            <div class="articles_text" style="padding-top: 30px;">
             
              <p style="font-weight: bold;"><?php echo $data['item_titre'];?></p>
              <img style="height: 360px; width: 380px;" class="text-center d-flex justify-content-center" src= "<?php echo $photo_name?>">
              <br>
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
      while ($data = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
      {
        ?>

        <!--on affiche les résultats-->
        <div class="col-lg-4" >
          <div class="livraison">
            <div class="livraison_text">
              <h3>Adresse de livraison</h3>
              <hr class="separateur_footer" >
              <p style="font-weight: bold;"><?php echo $data['livraison_a1'];?></p>
              <p style="font-style: italic;"><?php echo $data['livraison_a2'];?></p>
              <p style="font-style: italic;"><?php echo $data['livraison_ville'];?></p>
              <p style="font-style: italic;"><?php echo $data['livraison_CP'];?></p>
              <p style="font-style: italic;"><?php echo $data['livraison_pays'];?></p>
              <p style="font-style: italic;"><?php echo "Tél: ".$data['livraison_tel'];?></p>
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
      $count = 0;
      while($data = mysqli_fetch_array($result2,MYSQLI_ASSOC)) 
      {
        ?>

        <!--on affiche les résultats-->
        <div class="col-lg-4" >
          <div class="paiement">
            <div class="paiement_text">
               <h3>Vos informations bancaires</h3>
               <hr class="separateur_footer" >
              <form>
                <table>
                  <tr>
                    <td>Type de carte </td>
                    <td><input type="text" name="type" value=" <?php echo $data['paiement_type'];?>"></td>
                  </tr>
                  <tr>
                    <td>Numéro de carte </td>
                    <td><input type="number" name="numero" value="<?php echo $data['paiement_num'];?>"></td>
                  </tr>
                  <tr>
                    <td>Titulaire </td>
                    <td><input type="text" name="nom" value="<?php echo $data['paiement_nom'];?>"></td>
                  </tr>
                  <tr>
                    <td>Date d'expiration </td>
                    <td><input type="number" nom="date" value="<?php echo $data['paiement_date'];?>"></td>
                  </tr>
                  <tr>
                    <td>Code de sécurité </td>
                    <td><input type="number" nom="secu" value="<?php echo $data['paiement_secu'];?>" ></td>
                  </tr>
                </table>
              </form>
            </div> 
          </div>
        </div>
        <br>
        <?php
        // }
        $count = $count+1;
      }
      //fermer la base
      //}else {echo "db pas trouve";}
      //mysqli_close($db_handle);

      ?>
    </div>
    <div class="row">
      <?php
      //on va scanner tous les tuples un par un-->
      if($count ==0){
      ?>

      <!--on affiche les résultats-->
      <div class="col-lg-4" >
        <div class="paiement">
          <div class="paiement_text">
            <h3>Vos informations bancaires</h3>
               <hr class="separateur_footer" >
            <form action="bancaire.php" method="post">
              <table>
                 <tr>
                  <td>Type </td>
                  <td><input type="text" name="type"></td>
                </tr>
                <tr>
                  <td>Numéro de carte </td>
                  <td><input type="number" name="numero"></td>
                </tr>
                <tr>
                  <td>Titulaire </td>
                  <td><input type="text" name="nom"></td>
                </tr>
                <tr>
                  <td>Date d'expiration </td>
                  <td><input type="number" name="date"></td>
                </tr>
                <tr>
                  <td>Code de sécurité </td>
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
      <br>
      <?php
    }
    //fermer la base
  }else {echo "db pas trouve";}
  //mysqli_close($db_handle);
 
  if($total<50){ 

  echo 'Total à payer (sans frais de port):'.$total .'<br>';
 $frais = $total*0.1;
  echo 'frais de port:'.$frais.'<br>';
  $total = $total + $frais;
  echo 'total à payer TTC:'.$total . '<br>';

  }else{
     
    echo 'frais de port offerts! <br>' ; 
    echo 'total à payer:'.$total."$";
  }
  ?>
}
</div>
</div>
 <?php
      if(isset($_SESSION["try_paiement"]))
      {
    ?>
        <div style="color: red;">
        <p>Aucune carte bancaire renseignée </p><br/>
        </div> 
    <?php
      }
    ?>
<!--lien avec fichier php qui ajoute au panier-->
<form action="transaction.php" method="post" style="margin-top: 40px; margin-left: 220px;">
  <!--bouton ajouter au panier-->
  <input type="submit" value="valider" name="boutton_transaction">
</form>

 
<!--footer-->
<?php include("footer.php"); ?>
<!--footer-->
</body>
</html>