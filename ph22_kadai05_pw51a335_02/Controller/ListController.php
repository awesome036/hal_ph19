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
	$_POST["userId"] = $id;

	$_POST["list"] = array();
	$_POST["list"] = image_list($id);

	require_once("../View/list.php");
?>