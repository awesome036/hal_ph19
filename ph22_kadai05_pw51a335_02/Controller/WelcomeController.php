<?php
	session_start();

	// ログインしていない場合
	if(!isset($_SESSION["id"])){
		header("Location: ../Controller/LoginController.php",true,301);
		exit;
	}

	/*---------------ログイン時の処理---------------*/
	require_once("../Model/DbModel.php");

	$id = $_SESSION["id"];
	$row = get_name($id);
	if(!$row){
		header("Location: ../Controller/LoginController.php",true,301);
		exit;
	}
	$_POST["name"] = $row;
	require_once("../View/welcome.php");
?>