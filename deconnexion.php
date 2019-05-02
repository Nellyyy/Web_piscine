<?php
	session_start();

	$_SESSION["email"] = NULL;
	echo !isset($_SESSION["email"]);

	//it's better to not close the php tag at the end of file containing only php
	header("Location: connexionPage.php");
?>