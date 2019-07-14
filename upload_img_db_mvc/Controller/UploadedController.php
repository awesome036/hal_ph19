<?php
	require_once("../Model/DbModel.php");

	if($_FILES["uploadfile"]["error"] == '0'){
		$title = $_POST["title"];
		$filename = '../images/'.$_FILES["uploadfile"]["name"];

		$isSuccess = upload_image($title,$filename);
	}else{
		$isSuccess = FALSE;
	}

	if($isSuccess){
		$_POST["title"] = $title;
		$_POST["filename"] = $filename;
		require_once("../View/uploaded.php");
	}else{
		$_POST["err_msg"] = "アップロード出来ません";
		require_once("../View/upload.php");
	}
?>