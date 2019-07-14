<?php
	session_start();
	require_once("db_control.php");

	unset($_SESSION["id"]);
	unset($_SESSION["login_message"]);

	if (!isset($_POST["login_id"]) or !isset($_POST["password"])) {
		$_SESSION["login_message"] = "ログインIDまたはパスワードを見直してください。";
		header("Location:loginController.php");
		exit;
	}

	$id = read_id($_POST["login_id"], $_POST["password"]);
	if ($id > 0) {
		$_SESSION["id"] = $id;
		header("Location:welcomeController.php");
		exit;
	} else {
		$_SESSION["login_message"] = "ログインIDまたはパスワードを見直してください。";
		header("Location:loginController.php");
		exit;
	}
?>
