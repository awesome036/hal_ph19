<?php
	$title = $_POST["title"];
	$filename = 'images/'.$_POST["filename"];
	$isSuccess = move_uploaded_file($_FILES['uploadfile']['tmp_name'],$filename);

	if($isSuccess){
		echo<<<EOM
			<h1>$title</h1>
			<img src="$filename">
EOM;
	}else{
		echo "アップロード失敗<br>";
	}
?>