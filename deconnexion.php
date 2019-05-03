<?php
	session_start();

	//reset all session varables
	$_SESSION["email"] = NULL;
	$_SESSION["try_connect"] = NULL;

	//it's better to not close the php tag at the end of file containing only php
	header("Location: connexionPage.php");
?>