<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>ログイン画面</title>
	</head>
	<body>
		<form action="./result.php" method="post">
			<?php
			if(isset($_SESSION["error"])){
				echo "<span style='color:red'>".$_SESSION["error"]."</span>";
				unset($_SESSION["error"]);
			}
			?>
			<br>
			<label>ID:</label>
			<input type="text" name="id">
			<br>
			<label>パスワード：</label>
			<input type="password" name="password">
			<br>
			<input type="submit" value="ログイン">
			<a href="./new.php">新規登録</a>
		</form>
	</body>
</html>