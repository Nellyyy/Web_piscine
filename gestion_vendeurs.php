<?php
   session_start();
   $email = $_SESSION["email"];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
  <!--favicon-->
  <?php include("favicon.php"); ?>
  
	<meta charset="utf-8">
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
<?php include("menu.php"); ?>
  <h1>Menu administrateur<h1>

<div class="row">
  <div class="col-lg-6">
  <h3>Liste des vendeurs</h3>
  <table>

  <?php
      //connexion BDD
      $database = "piscine_test";
      $db_handle = mysqli_connect('localhost', 'root', '');
      $db_found = mysqli_select_db($db_handle, $database);
      //select all users
      $sql = "SELECT * FROM `utilisateur`";
      $result = mysqli_query($db_handle, $sql);
      
      while ($data = mysqli_fetch_assoc($result)) 
      {
         ?>
         <tr>
            <td>
               <?php echo $data["utilisateur_email"]; ?>
            </td>
            <td>
               <form method="post" action="supprimer_vendeur.php">
                  <input type="hidden" name="email_suppr" value="<?php echo $data["utilisateur_email"]; ?>">
                  <input type="submit" value="Supprimer">
               </form>
            </td>
            <?php
      }
  ?>
  </table>
  </div>

  <div class="col-lg-6">
  <h3>Ajouter un vendeur</h3>
  <form action="inscription.php" method="post">
    <table>
      <tr>
        <td>Prénom</td>
        <td><input type="text" name="prenom"></td>
      </tr>
      <tr>
        <td>Nom</td>
        <td><input type="text" name="nom"></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><input type="text" name="email"></td>
      </tr>
      <tr>
        <td>Mot de passe</td>
        <td><input type="password" name="mdp"></td>
      </tr>
      <input type="hidden" name="type" value="vendeur">
      <tr>
        <td colspan="2" align="center"><input type="submit" value="Ajouter" name="bouttoni"></td>
      </tr>
    </table>
  </form>
  </div>

</div>

  <?php include("footer.php"); ?>



</body>
</html>