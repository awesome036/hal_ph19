<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>アップロード成功</title>
</head>
<body>
	商品コード：<?php echo $_POST["code"]; ?><br>
	商品名：<?php echo $_POST["name"]; ?><br>
	価格：<?php echo $_POST["price"]; ?><br>
	<img src="../<?php echo $_POST["filename"]; ?>"><br>
	<a href="../../staff/Controller/StaffMenuController.php">メニュー</a>
</body>
</html>