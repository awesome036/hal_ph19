<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>ログイン画面</title>
	</head>
	<body>
		<form action="./welcome.php" method="post">
			<label>ユーザーID</label>
			<?php
				$str = "";
				if(isset($_COOKIE["user"])){
					$str = $_COOKIE["user"];
				}
				echo "<input type='text' name='user' value='{$str}'>";
			?>
			<br>
			<input type="checkbox" name="check" value="1">ユーザーIDを保存する
			<br>
			<label>パスワード</label>
			<input type="password" name="password">
			<br>
			<input type="submit" value="サインイン">
		</form>
	</body>
</html>