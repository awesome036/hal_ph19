<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>ユーザーページ</title>
	</head>
	<body>
		<?php
			if(isset($_SESSION["userName"])){
				$userName = $_SESSION["userName"];
				echo "<p>{$userName}さんのページです。</p>";
				echo "<a href='./logout.php'>ログアウト</a>";
			}else{
				echo "<p>ログインしてください</p>";
				echo "<a href='./index.php'>ログイン</a>";
			}
		?>
	</body>
</html>