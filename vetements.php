<!DOCTYPE html>
<html>
<head>
  <title>Ece Amazon</title>

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
      <p>Catégorie > Vêtements</p>
    </div>
  </div>


  <!--recherche dans bdd: on selectionne tous les vetements-->
  <?php
    
    //lancement de la requête (on impose aucune condition puisque l'on désire obtenir la liste complète des propriétaires
    $vet="vetement";
    if($db_found){
    $sql = "SELECT * FROM `item` WHERE `item_type` LIKE '%$vet%'"; 
    $result = mysqli_query($db_handle, $sql);

  ?>
 

<div class="container-fluid">
  <div class="row">

    <div class="col-lg-2" >
      <div class="block">
        <div class="case">
          <p>Vetement</p>
        </div>
        <div class="case">
          <p>livres</p>
        </div>
      </div>
      
    </div>

    <?php
      //on va scanner tous les tuples un par un-->
      while ($data = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
      {
    ?>

    <!--on affiche les résultats-->
    <div class="col-lg-4" >
      <div class="item">
        <div class="item_image">
          <img class="text-center d-flex justify-content-center" src= "img/jupe.jpg"> 
          <!--item_photo à la place du chemin fb.png   : <?php// echo $data["item_photo"]?>-->
        </div>
        <div class="item_text">
          <p style="font-weight: bold;"><?php echo $data['item_titre'];?></p>
          <p style="font-style: italic;"><?php echo $data['item_description'];?></p>
          <p><?php echo $data['item_vetement_taille'].' | '.$data['item_vetement_couleur'];?></p>
          <p style="font-weight: bold;"><?php echo $data['item_prix'].'$';?></p>

         
           <!--si il reste des stocks-->
        <?php
          if($data['item_qte_stock']!=0)
          {
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
</div>
  
 
  
  <!--footer-->
  <?php include("footer.php"); ?>
  <!--footer-->
</body>
</html>