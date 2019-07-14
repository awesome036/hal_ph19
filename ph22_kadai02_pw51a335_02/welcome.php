<?php
	if(isset($_POST["check"])){
		$userID = $_POST["user"];
		setcookie("user",$userID,time()+180);
	}
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>ログイン成功</title>
	</head>
	<body>
		<p>ようこそ</p>
		<input type="button" onclick="location.href='./index.php'" value="戻る">
	</body>
</html>