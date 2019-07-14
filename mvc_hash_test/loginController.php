<?php
	session_start();
	require_once("loginModel.php");
	$_POST["login_message"] = getMsg();
	require_once("login.php");
?>