<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ようこそ</title>
	</head>
	<body>
		<?php if($_POST["name"]) { ?>
			ようこそ、<?php echo $_POST["name"]; ?>さん。<br>
			<a href="logout.php">ログアウト</a><br>
		<?php } else { ?>
			ログインしてください。<br>
			<a href="loginController.php">ログイン</a><br>
		<?php } ?>
		<a href="index.html">メニュー</a><br>
	</body>
</html>
