<?php
	session_start();
	unset($_SESSION["id"]);
	require_once("../View/login.php");
?>