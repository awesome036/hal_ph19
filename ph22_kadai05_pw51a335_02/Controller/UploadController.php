<?php
	session_start();

	// ログインしていない場合
	if(!isset($_SESSION["id"])){
		header("Location: ../Controller/LoginController.php",true,301);
		exit;
	}

	/*---------------ログイン時の処理---------------*/
	require_once("../View/upload.php");
?>