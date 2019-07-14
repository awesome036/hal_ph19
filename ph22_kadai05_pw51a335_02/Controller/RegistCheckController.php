<?php
	require_once("../Model/DbModel.php");

	$login_id = $_POST["login_id"];
	$password = $_POST["password"];
	$name = $_POST["name"];

	// 入力値チェック
	$check = TRUE;	// TRUE:OK FALSE:NG
	$check_login_id = check_login_id($login_id);
	if(!$check_login_id){
		$_POST["err_login_id"] = "ログインIDを見直してください。";
		$check = FALSE;
	}
	$check_password = check_password($password);
	if(!$check_password){
		$_POST["err_password"] = "パスワードを見直してください。";
		$check = FALSE;
	}
	$check_name = check_name($name);
	if(!$check_name){
		$_POST["err_name"] = "名前を見直してください。";
		$check = FALSE;
	}

	// 入力値に誤りがあった場合
	if(!$check){
		require_once("../View/regist.php");
		exit;
	}

	// ログインIDが重複していた場合
	$exists = exist_login_id($login_id);
	if($exists){
		$_POST["err_exists"] = "このログインIDは使われています。";
		require_once("../View/regist.php");
		exit;
	}

	// すべての登録条件を満たした場合
	$result = insert_account($login_id,$password,$name);
	if($result){
		require_once("../View/login.php");
		exit;
	}else{
		$_POST["err_msg"] = "登録に失敗しました。";
		require_once("../View/regist.php");
	}
?>