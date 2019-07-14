<?php
	if(isset($_POST["submit"])){
		session_start();
		require_once("db_control.php");

		$id = $_SESSION["id"];
		$login_id = $_POST["login_id"];
		$password = $_POST["password"];
		$name = $_POST["name"];

		// 入力値チェック
		$check = TRUE;
		if(!preg_match("/^[a-zA-Z0-9]{3,10}$/",$login_id)){
			$check = FALSE;
		}
		if(!preg_match("/^[a-zA-Z0-9]{3,10}$/",$password)){
			$check = FALSE;
		}

		if($check){
			$result = accounts_update($id,$login_id,$password,$name);
			if($result){
				header("Location: change_success.html",true,301);
			}else{
				header("Location: change_error.html",true,301);
			}
		}else{
			header("Location: change_error.html",true,301);
		}
	}else{
		header("Location: change.php",true,301);
	}

?>