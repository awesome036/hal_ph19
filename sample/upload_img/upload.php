<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ファイルアップロード</title>
	</head>
	<body>
		<?php
		$filename = 'images/'.$_FILES['uploadfile']['name'];
		$isSuccess = move_uploaded_file($_FILES['uploadfile']['tmp_name'], $filename);	// 画像を保存
		if($isSuccess) {
			print $_POST["title"]."<br>";
			print '<img src="'.$filename.'"><br>';
		} else {
			print "アップロード失敗<br>";
		}
		?>
  </body>
</html>
