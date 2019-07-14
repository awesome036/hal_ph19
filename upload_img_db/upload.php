<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>アップロード</title>
	</head>
	<body>
		<form action="UploadedController.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
			<label>タイトル：</label>
			<input type="text" name="title">
			<br>
			<label>ファイル名：</label>
			<input type="file" name="uploadfile">
			<br>
			<input type="submit" value="アップロード">
		</form>
		<a href="./index.html">メニュー</a>
	</body>
</html>