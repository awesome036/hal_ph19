<?php
	session_start();

	// ログインしていない場合
	if(!isset($_SESSION["id"])){
		header("Location: ../Controller/LoginController.php",true,301);
		exit;
	}

	/*---------------ログイン時の処理---------------*/
	require_once("../Model/DbModel.php");

	// 入力値チェック
	$title = $_POST["title"];
	$check_title = check_title($title);
	if(!$check_title){
		$_POST["err_title"] = "タイトルを見直してください。";
		require_once("../View/upload.php");
		exit;
	}

	// ファイルサイズのチェック
	$error = $_FILES["uploadfile"]["error"];
	$tmpfile = $_FILES['uploadfile']['tmp_name'];
	$check_filesize = check_filesize($error,$tmpfile);
	if(!$check_filesize){
		$_POST["err_size"] = "ファイルサイズが大きすぎます。";
		require_once("../View/upload.php");
		exit;
	}

	// ファイル名をランダムな文字列に変更(オプション)
	$filename = $_FILES["uploadfile"]["name"];
	$mod_filename = mod_filename($filename);

	// すべてのアップロード条件を満たした場合
	$id = $_SESSION["id"];
	$result = upload_image($id,$title,$tmpfile,$mod_filename);
	if($result){
		$_POST["title"] = $title;
		$_POST["filename"] = $mod_filename;
		require_once("../View/uploaded.php");
	}else{
		// 天文学的確率でファイル名が重複していた場合
		$_POST["err_msg"] = "アップロードに失敗しました。";
		require_once("../View/upload.php");
	}
?>