<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>ログイン画面</title>
	</head>
	<body>
		<form action="../Controller/LoginCheckController.php" method="post">
			<p><?php echo $_POST["err_msg"]; ?></p>
			<label for="login_id">ログイン：</label>
			<input type="text" name="login_id">
			<br>
			<label for="password">パスワード：</label>
			<input type="password" name="password">
			<br>
			<input type="submit" name="submit" value="ログイン">
			<br>
			<a href="../index.html">トップ</a>
		</form>
	</body>
</html>