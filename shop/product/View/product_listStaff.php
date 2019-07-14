<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>商品一覧（スタッフ）</title>
</head>
<body>
	<?php foreach($_POST["list"] as $row){ ?>
		商品コード：<?php echo $row["code"]; ?><br>
		商品名：<?php echo $row["name"]; ?><br>
		価格：<?php echo $row["price"]; ?><br>
		<img src="../<?php echo $row["image_name"]; ?>"><br>
		<form method="post" action="../Controller/ProductDeleteController.php">
			<input type="hidden" name="code" value="<?php echo $row["code"]; ?>">
			<input type="hidden" name="filename" value="<?php echo $row["image_name"]; ?>">
			<input type="submit" value="削除">
		</form>
	<?php } ?>
	<br>
	<a href="../../staff/Controller/StaffMenuController.php">メニュー</a>

</body>
</html>