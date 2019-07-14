<?php
	require_once("DbModel.php");

	$filename = $_GET["filename"];
	delete_image($filename);

	header("Location: ListController.php",true,301);
?>