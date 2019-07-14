<?php
	session_start();

	// ログインしていない場合
	if(!isset($_SESSION["id"])){
		header("Location: ../Controller/LoginController.php",true,301);
		exit;
	}

	/*---------------ログイン時の処理---------------*/
	require_once("../Model/DbModel.php");

	if($_POST["public"]){
		// 画像を公開にするときの処理
		$image_id = $_POST["public"];
		public_image($image_id);
		header("Location: ../Controller/ListController.php",true,301);
		exit;
	}elseif($_POST["private"]){
		// 画像を非公開にするときの処理
		$image_id = $_POST["private"];
		private_image($image_id);
		header("Location: ../Controller/ListController.php",true,301);
		exit;
	}
?>