<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>スタッフメニュー</title>
</head>
<body>
	<h1>ようこそ<?php echo $_POST["name"]; ?>さん</h1>
	<ul>
		<li><a href="../../product/Controller/ProductUploadController.php">商品登録</a></li>
		<li><a href="../../product/Controller/ProductListStaffController.php">商品一覧</a></li>
		<li><a href="../Controller/StaffLogoutController.php">ログアウト</a></li>
	</ul>
</body>
</html>