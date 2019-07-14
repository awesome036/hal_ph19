<?php
	session_start();
	require_once("../Model/StaffDbModel.php");

	unset($_SESSION["account_id"]);
	$_POST["login_message"] = "";

	if (empty($_POST["login_id"]) || empty($_POST["password"])) {
		$_POST["login_message"] = "ログインIDまたはパスワードを見直してください。ng";
		require_once("../View/staff_login.php");
		exit;
	}

	$id = read_id($_POST["login_id"], $_POST["password"]);
	if ($id) {
		$_SESSION["account_id"] = $id;
		header("Location:StaffMenuController.php");
		exit;
	} else {
		$_POST["login_message"] = "ログインIDまたはパスワードを見直してください。";
		require_once("../View/staff_login.php");
		exit;
	}
?>