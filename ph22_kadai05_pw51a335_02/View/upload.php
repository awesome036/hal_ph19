<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>アップロード画面</title>
	</head>
	<body>
		<form action="../Controller/UploadedController.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="MAX_FILE_SIZE" value="4000000">
			<label for="title">タイトル：</label>
			<input type="text" name="title" maxlength="127">
			<?php echo $_POST["err_title"]; ?>
			<br>
			<label for="uploadefile">ファイル名：</label>
			<input type="file" name="uploadfile" required>
			<?php echo $_POST["err_filename"]; ?>
			<?php echo $_POST["err_size"]; ?>
			<br>
			<input type="submit" value="アップロード">
			<?php echo $_POST["err_msg"]; ?>
		</form>
		<a href="../Controller/WelcomeController.php">メニュー</a>
	</body>
</html>