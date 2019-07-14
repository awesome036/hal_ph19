<?php
session_start();
require_once "../Model/DbModel.php";

$extension = pathinfo($_FILES['uploadfile']['name'], PATHINFO_EXTENSION);
$filename = 'images/'.time().".".$extension;
//$filename = 'images/'.$_FILES['uploadfile']['name'];

if ($_POST["title"] == "") {
	$_POST["upload_message"] = "アップロードできませんでした";
	$_POST["title_message"] = "タイトルを入力してください";
	$_POST["file_message"] = "";
	include_once("../View/upload.php");
	exit;
}

$isSuccess = write($_SESSION["account_id"], $filename, $_POST["title"]);
if(!$isSuccess) {
	$_POST["upload_message"] = "アップロードできませんでした";
	$_POST["title_message"] = "";
	$_POST["file_message"] = "同じ名前のファイルが存在します";
	include_once("../View/upload.php");
	exit;
}

$isSuccess = move_uploaded_file($_FILES['uploadfile']['tmp_name'], "../".$filename);
if(!$isSuccess) {
	$_POST["upload_message"] = "アップロードできませんでした";
	$_POST["title_message"] = "";
	$_POST["file_message"] = "";
	include_once("../View/upload.php");
	exit;
}

//$_POST["title"] = $_POST["title"];
$_POST["filename"] = $filename;
include_once("../View/uploaded.php");
?>
