<?php
	require_once("DbModel.php");

	if($_FILES["uploadfile"]["error"] == '0'){
		$title = $_POST["title"];
		$filename = 'images/'.$_FILES["uploadfile"]["name"];

		$isSuccess = upload_image($title,$filename);
	}else{
		$isSuccess = FALSE;
	}

	if($isSuccess){
		$_POST["title"] = $title;
		$_POST["filename"] = $filename;
		require_once("uploaded.php");
	}else{
		require_once("upload_error.php");
	}
?>