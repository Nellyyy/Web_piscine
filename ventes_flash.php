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

  <!--connection bdd-->
  <?php
    //identification de notre BDD
    $database = "piscine_test";

    //connectez-vous dans la BDD-->
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
  ?>

  <!--accueil vetements-->
  <div class="container-fluid" style="margin: 0px;">
    <div class="menuSeller" style="width: 100%;
  height: 60px;
  padding: 2px 3px;
  background-color: #EDEFF4;
  color: black;
  margin: 0;">
      <h2 style="text-align: center;">Top 3 des best sellers de chaque catégorie!</h2>
    </div>
  </div>

  <!--recherche dans bdd: on selectionne tous les vetements-->
  <?php
    
    //lancement de la requête vetements
   $sql = "SELECT * FROM `item` WHERE `item_type` LIKE '%vetement%' ORDER BY  `item_qte_vendue` DESC";
    $result = mysqli_query($db_handle, $sql);

    //lancement de la requête livres
   $sql2 = "SELECT * FROM `item` WHERE `item_type` LIKE '%livre%' ORDER BY  `item_qte_vendue` DESC";
    $result2 = mysqli_query($db_handle, $sql2);

     //lancement de la requête musiques
   $sql3 = "SELECT * FROM `item` WHERE `item_type` LIKE '%musique%' ORDER BY  `item_qte_vendue` DESC";
    $result3 = mysqli_query($db_handle, $sql3);

   //lancement de la requête sport
   $sql4 = "SELECT * FROM `item` WHERE `item_type` LIKE '%sport%' ORDER BY  `item_qte_vendue` DESC";
    $result4 = mysqli_query($db_handle, $sql4);



  ?>

<div class="container-fluid">
  <div class="row" style="margin-top: 20px; margin-bottom: 60px;">
    <h3 style="margin-left: 20px; font-weight: bold;">Top vente vêtements</h3>
    <hr class="separateur_top" style=" border-width: 2px;  margin-left: 20px; margin-right: 76%;">

    <?php

      //variable qui permet d'afficher le top 3
      $count1 =0;
      //on va scanner tous les tuples un par un-->
      while ($data = mysqli_fetch_array($result) ) 
      {
        if($count1 <3){
        $count1 = $count1 + 1;
         $photo_name = $data["item_photo"];
    ?>
      
    <!--on affiche les résultats-->
    <div class="col-lg-4" >
      <p style=" font-style: italic; margin-left: 6px;"><?php echo 'Numéro '.$count1;?></p>
      <div class="item">
        <div class="item_image">
          <img class="text-center d-flex justify-content-center" src="<?php echo $photo_name?>">   <!--item_photo à la place du chemin fb.png-->
        </div>
        <div class="item_text">
          <p style="font-weight: bold;"><?php echo $data['item_titre'];?></p>
          <p style="font-style: italic;">nombre de ventes: <?php echo $data['item_qte_vendue'];?></p>
          <p style="float: right;"><?php echo "<a href=recupId.php?id=". $id.">Voir +</a>"  ;?></p>
        </div> 
      </div>
    </div>
    
    <?php
    }
      }
      //fermer la base
      //mysqli_close($db_handle);
    ?>
 </div>
 <div class="row" style="margin-top: 20px; margin-bottom: 60px;">

    <h3 style="margin-left: 20px; font-weight: bold;">Top vente livres</h3>
    <hr class="separateur_top" style=" border-width: 2px;  margin-left: 20px; margin-right: 76%;">

    <?php

      //variable qui permet d'afficher le top 3
      $count2 =0;
      //on va scanner tous les tuples un par un-->
      while ($data = mysqli_fetch_array($result2)) 
      {
         if($count2 <3){
        $count2 = $count2 + 1;
        $photo_name = $data["item_photo"];
    ?>

    <!--on affiche les résultats-->
    <div class="col-lg-4" >
      <p style=" font-style: italic; margin-left: 6px;"><?php echo 'Numéro '.$count2;?></p>
      <div class="item">
        <div class="item_image">
          <img class="text-center d-flex justify-content-center" src="<?php echo $photo_name?>">   <!--item_photo à la place du chemin fb.png-->
        </div>
        <div class="item_text">
          <p style="font-weight: bold;"><?php echo $data['item_titre'];?></p>
          <p style="font-style: italic;">nombre de ventes: <?php echo $data['item_qte_vendue'];?></p>
           <p style="float: right;"><?php echo "<a href=recupId.php?id=". $id.">Voir +</a>"  ;?></p>
        </div> 
      </div>
    </div> 
    <?php
      }
    }
      //fermer la base
      //mysqli_close($db_handle);
    ?>
 </div>
  <div class="row" style="margin-top: 20px; margin-bottom: 60px;">
    
    <h3 style="margin-left: 20px; font-weight: bold;">Top vente musique</h3>
    <hr class="separateur_top" style=" border-width: 2px;  margin-left: 20px; margin-right: 76%;">
    <?php
     //variable qui permet d'afficher le top 3
      $count3 =0;
      //on va scanner tous les tuples un par un-->
      while ($data = mysqli_fetch_array($result3)) 
      {
         if($count3 <3){
        $count3 = $count3 + 1;
        $photo_name = $data["item_photo"];
    ?>
    <!--on affiche les résultats-->
    
    <div class="col-lg-4" >
      <p style=" font-style: italic; margin-left: 6px;"><?php echo 'Numéro '.$count3;?></p>
      <div class="item">
        <div class="item_image">
          <img class="text-center d-flex justify-content-center" src="<?php echo $photo_name?>">   <!--item_photo à la place du chemin fb.png-->
        </div>
        <div class="item_text">
          <p style="font-weight: bold;"><?php echo $data['item_titre'];?></p>
          <p  style="font-style: italic;">nombre de ventes: <?php echo $data['item_qte_vendue'];?></p>
          <p style="float: right;"><?php echo "<a href=recupId.php?id=". $id.">Voir +</a>";?></p>
        </div> 
      </div>
    </div>
    <?php
      }
    }
      //fermer la base
      //mysqli_close($db_handle);
    ?>
 </div>
  <div class="row" style="margin-top: 20px; margin-bottom: 60px;">

    <h3 style="margin-left: 20px; font-weight: bold;">Top vente sport et loisir</h3>
    <hr class="separateur_top" style=" border-width: 2px;  margin-left: 20px; margin-right: 76%;">
    <?php
      //variable qui permet d'afficher le top 3
      $count4 =0;
      //on va scanner tous les tuples un par un-->
      while ($data = mysqli_fetch_array($result4)) 
      {
          if($count4 <3){
        $count4 = $count4 + 1;
        $photo_name = $data["item_photo"];
    ?>
    <!--on affiche les résultats-->
    
    <div class="col-lg-4" >
       <p style=" font-style: italic; margin-left: 6px;"><?php echo 'Numéro '.$count4;?></p>
      <div class="item">
        <div class="item_image">
          <img class="text-center d-flex justify-content-center" src="<?php echo $photo_name?>">   <!--item_photo à la place du chemin fb.png-->
        </div>
        <div class="item_text">
          <p style="font-weight: bold;"><?php echo $data['item_titre'];?></p>
          <p style="font-style: italic;">nombre de ventes: <?php echo $data['item_qte_vendue'];?></p>
          <p style="float: right;"><?php echo "<a href=recupId.php?id=". $id.">Voir +</a>";?></p>
        </div> 
      </div>
    </div> 
    <?php
      }
    }
      //fermer la base
      //mysqli_close($db_handle);
    ?>
 </div>
</div>
  <!--footer-->
  <?php include("footer.php"); ?>
  <!--footer-->
</body>
</html>