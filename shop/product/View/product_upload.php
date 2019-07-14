<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ファイルアップロード</title>
</head>
<body>
	<?php echo $_POST["upload_message"]; ?><br>
	<form method="post" action="../Controller/ProductUploadedController.php" enctype="multipart/form-data">
		商品コード：<input type="text" name="code" maxlength="10"><br>
		<?php echo $_POST["title_message"]; ?><br>
		商品名：<input type="text" name="name"><br>
		商品価格：<input type="text" name="price" maxlength="30">
		<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
		<?php echo $_POST["file_message"]; ?><br>
		商品画像：<input type="file" name="uploadfile"><br>
		<input type="submit" value="アップロード"><br>
	</form>
	<a href="../../staff/Controller/StaffMenuController.php">メニュー</a>
</body>
</html>
