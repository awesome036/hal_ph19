<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>ログアウト</title>
	</head>
	<body>
		<?php
			unset($_SESSION["userName"]);
			echo "<p>ログアウトしました</p>";
			echo "<a href='./index.php'>ログイン</a>";
		?>
	</body>
</html>