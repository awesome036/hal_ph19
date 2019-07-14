<?php
	session_start();
	require_once("../Model/ProductDbModel.php");

	$extension = pathinfo($_FILES['uploadfile']['name'], PATHINFO_EXTENSION);
	$image_name = 'images/'.time().".".$extension;
	//$filename = 'images/'.$_FILES['uploadfile']['name'];

	if ($_POST["name"] == "") {
		$_POST["upload_message"] = "アップロードできませんでした";
		$_POST["title_message"] = "商品名を入力してください";
		$_POST["file_message"] = "";
		require_once("../View/product_upload.php");
		exit;
	}

	$isSuccess = write($_POST["code"],$_POST["name"],$_POST["price"],$image_name);
	if(!$isSuccess) {
		$_POST["upload_message"] = "アップロードできませんでした";
		$_POST["title_message"] = "";
		$_POST["file_message"] = "同じ名前のファイルが存在します";
		require_once("../View/product_upload.php");
		exit;
	}

	$isSuccess = move_uploaded_file($_FILES['uploadfile']['tmp_name'], "../".$image_name);
	if(!$isSuccess) {
		$_POST["upload_message"] = "アップロードできませんでした";
		$_POST["title_message"] = "";
		$_POST["file_message"] = "";
		require_once("../View/product_upload.php");
		exit;
	}

	//$_POST["title"] = $_POST["title"];
	$_POST["filename"] = $image_name;
	require_once("../View/product_uploaded.php");
?>
