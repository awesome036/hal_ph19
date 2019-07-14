<?php
	$str = "";
	if(isset($_COOKIE["login_id"])){
		$str = $_COOKIE["login_id"];
	}
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>ログイン画面</title>
	</head>
	<body>
		<form action="./login_check.php" method="post">
			<label>ログインID:</label>
			<input type="text" name="login_id" value="<?php echo $str; ?>">
			<br>
			<label>パスワード:</label>
			<input type="password" name="password">
			<br>
			<input type="submit" value="ログイン">
			<br>
		</form>
		<a href="./index.html">メニュー</a>
	</body>
</html>