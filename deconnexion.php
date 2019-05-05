<?php
	session_start();

	//reset all session varables
	$_SESSION["email"] = NULL;
	$_SESSION["type"] = NULL;
	$_SESSION["nom"] = NULL;
	$_SESSION["prenom"] = NULL;
	$_SESSION["try_connect"] = NULL;
	
	header("Location: connexionPage.php");
?>