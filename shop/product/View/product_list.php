<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>商品一覧（お客様）</title>
</head>
<body>
	<?php echo $_POST["cart_message"]; ?>
	<?php foreach($_POST["list"] as $row){ ?>
		商品コード：<?php echo $row["code"]; ?><br>
		商品名：<?php echo $row["name"]; ?><br>
		価格：<?php echo $row["price"]; ?><br>
		<img src="../<?php echo $row["image_name"]; ?>"><br>
		<form method="post" action="../../cart/Controller/CartInController.php">
			<input type="hidden" name="code" value="<?php echo $row["code"]; ?>">
			<input type="submit" value="カートに入れる">
		</form>
	<?php } ?>
	<br>
	<a href="../../cart/Controller/CartListController.php">カートの中を見る</a>
	<br>
	<a href="../../index.html">トップ</a>
</body>
</html>