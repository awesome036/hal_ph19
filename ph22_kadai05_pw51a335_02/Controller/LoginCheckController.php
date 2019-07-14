<?php
	session_start();
	require_once("../Model/DbModel.php");

	if(isset($_POST["submit"])){
		// ログイン画面からの遷移
		$login_id = $_POST["login_id"];
		$password = $_POST["password"];
		$id = get_id($login_id,$password);
		if($id > 0){
			// ログイン成功の場合
			$_SESSION["id"] = $id;
			$_POST["name"] = get_name($id);
			// 「戻る」ボタンでブラウザキャッシュ参照回避のためコントローラにリダイレクト
			header("Location: ../Controller/WelcomeController.php",true,301);
			exit;
		}else{
			// ログイン失敗の場合
			$_POST["err_msg"] = "ログインIDまたはパスワードを見直してください。";
			require_once("../View/login.php");
			exit;
		}
	}else{
		// ログイン画面以外からの遷移
		if(isset($_SESSION["id"])){
			// ログイン済みの場合
			$id = $_SESSION["id"];
			$_POST["name"] = get_name($id);
			require_once("../View/welcome.php");
			exit;
		}else{
			// ログインしてない場合
			require_once("../View/login.php");
		}
	}
?>