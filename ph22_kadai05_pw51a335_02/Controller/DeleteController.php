<?php
	session_start();

	// ログインしていない場合
	if(!isset($_SESSION["id"])){
		header("Location: ../Controller/LoginController.php",true,301);
		exit;
	}

	/*---------------ログイン時の処理---------------*/
	require_once("../Model/DbModel.php");

	$image_id = $_POST["delete"];
	delete_image($image_id);
	header("Location: ../Controller/ListController.php",true,301);
?>