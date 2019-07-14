<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>アップロード完了</title>
	</head>
	<body>
		<h1><?php echo $_POST["title"]; ?></h1>
		<img src="<?php echo $_POST["filename"]; ?>">
		<br>
		<a href="../Controller/WelcomeController.php">メニュー</a>
	</body>
</html>