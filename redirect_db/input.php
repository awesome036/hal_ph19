<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>登録画面</title>
	</head>
	<body>
		<!-- 登録データ一覧表示 -->
		<?php
			require_once("db_func.php");
			all_display();
		?>
		<!-- /登録データ一覧表示 -->

		<form action="./regist.php" method="post">
			<label>クラス記号：</label>
			<input type="text" name="class" maxlength="8">
			<br>
			<label>No:</label>
			<input type="text" name="no">
			<br>
			<label>名：</label>
			<input type="text" name="name">
			<br>
			<input type="submit" value="登録">
		</form>
	</body>
</html>
