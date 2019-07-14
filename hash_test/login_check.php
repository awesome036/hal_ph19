<?php
	session_start();
	require_once("db_control.php");

	unset($_SESSION["id"]);
	unset($_SESSION["regist_message"]);

	if (!isset($_POST["login_id"]) or !isset($_POST["password"])) {
		$_SESSION["regist_message"] = "ログインIDまたはパスワードを見直してください。";
		header("Location:login.php");
		exit;
	}

	$id = read_id($_POST["login_id"], $_POST["password"]);
	if ($id > 0) {
		$_SESSION["id"] = $id;
		header("Location:welcome.php");
		exit;
	} else {
		$_SESSION["regist_message"] = "ログインIDまたはパスワードを見直してください。";
		header("Location:login.php");
		exit;
	}
?>
