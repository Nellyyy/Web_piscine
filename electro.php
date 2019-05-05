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

  <!--menu catégories--> 
  <div class="container-fluid" style="margin: 0px;">
    <div class="menu_categorie">
      <p>Catégorie > Musiques</p>
    </div>
  </div>


  <!--recherche dans bdd: on selectionne tous les vetements-->
  <?php
    
    //lancement de la requête (on impose aucune condition puisque l'on désire obtenir la liste complète des propriétaires
    $vet="musique";
    if($db_found){
    $sql = "SELECT * FROM `item` WHERE `item_type` LIKE '%$vet%' AND `item_categorie` LIKE 'electro'"; 
    $result = mysqli_query($db_handle, $sql);

  ?>

<div class="container-fluid left" >
    <div class="block">
        <div class="case" id="livres">
          <a href="livres.php">Livres</a>
        </div>
        <div class="case">
          <a href="vetements.php">Vêtements</a>
        </div>
        <div class="case">
          <a href="musiques.php">Musique</a>
        </div>
        <div class="case">
          <a href="sports.php">Sport et Loisir</a>
        </div>
        <div class="case">
          <a href="classique.php">Classique</a>
        </div>
        <div class="case">
          <a href="electro.php">Electro</a>
        </div>
        <div class="case">
          <a href="jazz.php">Jazz</a>
        </div>
        <div class="case">
          <a href="rap.php">Rap</a>
        </div>
    </div>
</div>


  <div class="row">

    <?php
      //on va scanner tous les tuples un par un-->
      while ($data = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
      {
        $photo_name = $data["item_photo"];
    ?>

    <!--on affiche les résultats-->
    <div class="col-lg-3 inline" >
      <div class="item">
        <div class="item_image">
          <img class="text-center d-flex justify-content-center" src= "<?php echo $photo_name?>"> 
          <!--item_photo à la place du chemin fb.png   : <?php// echo $data["item_photo"]?>-->
        </div>
        <div class="item_text">
          <p style="font-weight: bold;"><?php echo $data['item_titre'];?></p>
          <p style="font-weight: bold;"><?php echo $data['item_prix'].'$';?></p>

         
           <!--si il reste des stocks-->
        <?php
          if($data['item_qte_stock']!=0)
          {
            $id=$data['item_id'];
        ?>
          <p style="float: right;"><?php echo "<a href=recupId.php?id=". $id.">Voir +</a>"  ;?></p>

        <?php
        }//si la quantite vaut 0 sur le bouton on affiche pas posssible de vendre
        else{
          ?>
          <p style="color: red; font-style: italic; float: right; padding-bottom: 10px;">Rupture de stock.</p>
          <?php
          }
        ?>
        
        </div> 
      </div>
    </div>  
    
    <?php
      }
      //fermer la base
    }else {echo "db pas trouve";}
      mysqli_close($db_handle);
    
    ?>
 </div>

  
 
  
  <!--footer-->
  <?php include("footer.php"); ?>
  <!--footer-->
</body>
</html>