<?php
	session_start();

	require_once("db_control.php");

	if(isset($_SESSION["id"])) {
		$row = read_row($_SESSION["id"]);
	} else {
		$row = false;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ようこそ</title>
	</head>
	<body>
		<?php if($row) { ?>
			ようこそ、<?php print $row["name"]; ?>さん。<br>
			<a href="logout.php">ログアウト</a><br>
		<?php } else { ?>
			ログインしてください。<br>
			<a href="login.html">ログイン</a><br>
		<?php } ?>
		<a href="index.html">メニュー</a><br>
	</body>
</html>
