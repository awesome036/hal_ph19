<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>新規登録</title>
	</head>
	<body>
		<?php echo $_POST["regist_message"]; ?><br>
		<form method="post" action="regist_check.php">
			ログインID：<input type="text" name="login_id" placeholder="半角英数3～10文字"><br>
			パスワード：<input type="password" name="password" placeholder="半角英数3～10文字"><br>
			名前：<input type="text" name="name" placeholder="1～20文字"><br>
			<input type="submit" value="登録"><br>
		</form>
		<a href="index.html">メニュー</a><br>
	</body>
</html>
