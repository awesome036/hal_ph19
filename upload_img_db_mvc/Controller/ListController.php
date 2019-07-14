<?php
	require_once("../Model/DbModel.php");

	$_POST["list"] = array();
	$_POST["list"] = itiran_image();

	require_once("../View/list.php");
?>