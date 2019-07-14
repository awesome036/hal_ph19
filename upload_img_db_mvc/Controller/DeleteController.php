<?php
	require_once("../Model/DbModel.php");

	$filename = $_GET["filename"];
	delete_image($filename);

	require_once("ListController.php");
?>