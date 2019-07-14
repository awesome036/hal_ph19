<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>アップロード成功</title>
		<style type="text/css">
			img {
				width: 100%;
			}
			.resultBox {
				max-width: 800px;
			}
		</style>
	</head>
	<body>
		<div class="resultBox">
			<h1><?php echo $_POST["title"]; ?></h1>
			<img src="<?php echo $_POST["filename"]; ?>">
		</div>
		<a href="./index.html">メニュー</a>
	</body>
</html>