<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>ログイン画面</title>
	</head>
	<body>
		<form action="./welcome.php" method="post">
			<label>ユーザー名：</label>
			<?php
				$str = "";
				if(isset($_COOKIE["user"])){
					$str = $_COOKIE["user"];
				}
				echo "<input type='text' name='userName' value='{$str}'>";
			?>
			<br>
			<input type="submit" value="ログイン">
		</form>
	</body>
</html>