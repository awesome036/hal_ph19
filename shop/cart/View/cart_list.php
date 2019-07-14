<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>カート一覧</title>
</head>
<body>
	<?php echo $_POST["cart_message"]; ?>
	<table>
		<tr>
			<th>商品コード</th>
			<th>商品名</th>
			<th>価格</th>
			<th>商品画像</th>
		</tr>
		<?php $i=0; ?>
		<?php foreach($_POST["list"] as $row){ ?>
			<tr>
				<td><?php echo $row["code"]; ?></td>
				<td><?php echo $row["name"]; ?><br>
					<form method="post" action="../../cart/Controller/CartOutController.php">
						<input type="hidden" name="index" value="<?php echo $i; ?>">
						<input type="submit" value="削除">
					</form>
				</td>
				<td><?php echo $row["price"]; ?></td>
				<td><img style="height:100px;" src="../../product/<?php echo $row["image_name"]; ?>"></td>
			</tr>
		<?php $i++;} ?>
	</table>
	<a href="../../product/Controller/ProductListController.php">商品一覧</a>
	<br>
	<a href="../../index.html">トップ</a>
</body>
</html>