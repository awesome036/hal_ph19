<?php
	session_start();
	require_once("registModel.php");
	$_POST["regist_message"] = getRegMsg();
	require_once("regist.php");
?>