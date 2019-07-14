<?php
	session_start();

	require_once("db_control.php");

	$login_id = $_POST["login_id"];
	$password = $_POST["password"];

	if($id = get_id($login_id,$password)){
		$_SESSION["id"] = $id;
		header("Location: welcome.php",true,301);
	}else{
		header("Location: login_error.html",true,301);;
	}
?>