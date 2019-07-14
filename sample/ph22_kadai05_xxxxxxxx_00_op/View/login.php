<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ログイン</title>
	</head>
	<body>
		<?php print $_POST["login_message"]; ?>
		<form method="post" action="LoginCheckController.php">
			ログインID：<input type="text" name="login_id"><br>
			パスワード：<input type="password" name="password"><br>
			<input type="submit" value="ログイン"><br>
		</form>
		<a href="../index.html">トップ</a><br>
	</body>
</html>
