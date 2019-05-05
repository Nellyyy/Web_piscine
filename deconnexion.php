<?php
	if(!isset($_SESSION))
	{
		session_start();
	}
	//reset all session varables
	$_SESSION["email"] = NULL;
	$_SESSION["try_connect"] = NULL;
	
	header("Location: connexionPage.php");
?>