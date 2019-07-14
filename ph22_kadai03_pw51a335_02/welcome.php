<?php
	session_start();
	$userName = $_POST["userName"];
	setcookie("user",$userName,time()+180);
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>welcome</title>
	</head>
	<body>
		<?php
			if(!empty($userName)){
				$_SESSION["userName"] = $userName;
				echo "<p>ようこそ{$userName}さん</p>";
				echo "<a href='./user.php'>{$userName}さんのページ</a>";
			}else{
				echo "<p>ようこそ</p>";
				echo "<a href='./index.php'>ログイン</a>";
			}
		?>
	</body>
</html>