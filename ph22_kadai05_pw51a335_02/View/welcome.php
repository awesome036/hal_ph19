<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>メニュー画面</title>
	</head>
	<body>
		<?php echo $_POST["name"]; ?>
		<ul>
			<li><a href="../Controller/UploadController.php">アップロード</a></li>
			<li><a href="../Controller/ListController.php">一覧</a></li>
		</ul>
		<a href="../Controller/LogoutController.php">ログアウト</a>
	</body>
</html>