<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ファイルアップロード</title>
	</head>
	<body>
		<?php print $_POST["upload_message"]; ?><br>
		<form method="post" action="../Controller/UploadedController.php" enctype="multipart/form-data">
			<?php print $_POST["title_message"]; ?><br>
			タイトル：<input type="text" name="title"><br>
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
			<?php print $_POST["file_message"]; ?><br>
			ファイル名：<input type="file" name="uploadfile"><br>
			<input type="submit" value="アップロード"><br>
		</form>
		<a href="../Controller/MenuController.php">メニュー</a>
  </body>
</html>
