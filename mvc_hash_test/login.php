<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ログイン</title>
	</head>
	<body>
		<?php echo $_POST["login_message"]; ?><br>
		<form method="post" action="login_check.php">
			ログインID：<input type="text" name="login_id"><br>
			パスワード：<input type="password" name="password"><br>
			<input type="submit" value="ログイン"><br>
		</form>
		<a href="index.html">メニュー</a><br>
	</body>
</html>
