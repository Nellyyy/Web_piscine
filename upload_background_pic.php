<?php
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["monfichier"]["name"]);
	
	echo $target_file . "<br/>";

	if(move_uploaded_file($_FILES["monfichier"]["tmp_name"], $target_file))
	{
		echo "bendo";
	}
	else
		echo "pas bendo";
	/*
	if(is_uploaded_file($_FILES['monfichier']['name']) )
	{
		echo "yesay";
	}
	else
	{
		echo "probleme problème";
	}
	*/
	//echo $_FILES['bendo']['name'];



?>