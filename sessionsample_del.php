<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>セッション削除</title>
	</head>
	<body>
		<?php
			unset($_SESSION["kamoku"]);
		?>
		<p>削除しました。</p>
		<a href="sessionsample_get.php">確認ページ</a>
	</body>
</html>