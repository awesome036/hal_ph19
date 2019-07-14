<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>セッション設定</title>
	</head>
	<body>
		<?php
			$_SESSION["kamoku"] = "ph22";
		?>
		<p>設定しました。</p>
		<a href="sessionsample_get.php">確認ページ</a>
	</body>
</html>