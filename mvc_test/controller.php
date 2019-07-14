<?php
	require_once("model.php");
	$msg = getMsg();
	$_POST["message"] = $msg;
	require_once("view.php");
?>