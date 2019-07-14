<?php
	require_once("../Model/StaffDbModel.php");

	$login_id = $_POST["login_id"];
	$password = $_POST["password"];
	$name = $_POST["name"];

	if (!isset($login_id) or !isset($password)
		|| !preg_match("/^[a-zA-Z0-9]{3,10}$/", $login_id)
		|| !preg_match("/^[a-zA-Z0-9]{3,10}$/", $password)) {
		$_POST["regist_message"] = "ログインIDまたはパスワードを見直してください。";
		require_once("../View/staff_regist.php");
		exit;
	}

	if (mb_strlen($name) == 0 or mb_strlen($name) > 20) {
		$_POST["regist_message"] = "名前を見直してください。";
		require_once("../View/staff_regist.php");
		exit;
	}

	$result = insert($login_id, $password, $name);
	if ($result) {
		header("Location:StaffLoginController.php");
		exit;
	}else{
		$_POST["regist_message"] = "ログインIDは使われています。";
		require_once("../View/staff_regist.php");
	}
?>