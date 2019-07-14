<?php
	session_start();
	require_once("db_control.php");

	unset($_SESSION["regist_message"]);

	if (!isset($_POST["login_id"]) or !isset($_POST["password"])
	 || !preg_match("/^[a-zA-Z0-9]{3,10}$/", $_POST["login_id"])
	 || !preg_match("/^[a-zA-Z0-9]{3,10}$/", $_POST["password"])) {
		$_SESSION["regist_message"] = "ログインIDまたはパスワードを見直してください。";
		header("Location:registController.php");
		exit;
	}

	if (mb_strlen($_POST["name"]) == 0 or mb_strlen($_POST["name"]) > 20) {
		$_SESSION["regist_message"] = "名前を見直してください。";
		header("Location:registController.php");
		exit;
	}

	$exists = exists($_POST["login_id"]);
	if ($exists) {
		$_SESSION["regist_message"] = "ログインIDは使われています。";
		header("Location:registController.php");
		exit;
	}

	$result = insert($_POST["login_id"], $_POST["password"], $_POST["name"]);
	if ($result) {
		header("Location:regist_success.html");
		exit;
	}
?>
