<?php
   session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
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
  <h2>Voici la liste de tous les vendeurs</h2>
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

<? include("footer.php"); ?>
</body>
</html>

<table>
   <tr>
      <td></td>

   </tr>

</table>