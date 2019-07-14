<?php
	session_start();
	require_once("welcomeModel.php");
	$_POST["name"] = getName();
	require_once("welcome.php");
?>