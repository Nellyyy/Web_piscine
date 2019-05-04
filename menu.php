<!--menu-->
	<!-- source : https://www.w3schools.com/bootstrap/bootstrap_navbar.asp-->
	<nav class="navbar navbar-inverse" style="margin-bottom: 0px;">
	  <div class="container-fluid menu">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="HomePage.php">Ece Amazon</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="dropdown">
	        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Catégories
	        <span class="caret"></span></a>
	        <ul class="dropdown-menu">
	          <li><a href="livres.php">Livres</a></li>
	          <li><a href="vetements.php">Vêtements</a></li>
	          <li><a href="musiques.php">Musique</a></li>
	          <li><a href="sports.php">Sport et Loisirs</a></li>
	        </ul>
	      </li>
	      <li><a href="ventes_flash.php">Vente flash</a></li>
	      <li><a href="vendre.php">Vendre</a></li>
	     </ul>
	  	 <ul class="nav navbar-nav navbar-right">
	  	  <li> <form class="navbar-form navbar-right inline-form">
            <div class="form-group">
              <input type="search" class="input-sm form-control" placeholder="Recherche" name="saisie">
              <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span> <a href="recherche.php">Chercher </a></button>
            </div>
          </form>
          </li>
	  	  <li><a href="mon_compte.php">Mon compte</a></li>

	  	  <?php
	  	  	if(!isset($_SESSION["email"]))//si personne n'est connecté on affiche sign in
	  	  	{
	  	  ?>
	      		<li><a href="connexionPage.php"><span class="glyphicon glyphicon-user"></span> Sign In</a></li>
	      <?php
	      	}
	      	else//sinon on affiche le nom du mec
	      	{
	      		$nom = $_SESSION["nom"];
	      		$prenom = $_SESSION["prenom"];
	      		echo "<li><a>" . $prenom . " " . $nom ."</a></li>";
	      	}
	      ?>
	      <li><a href="panier.php"><img src="img/panier.png" width="20px" height="20px"></a></li>
	    </ul>
	  </div>
	</nav>
