<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>セッションファイル削除</title>
	</head>
	<body>
		<?php
			session_destroy();
			echo "<p>ファイル削除しました。</p>";
		?>
		<input type="button" onclick="location.href='./index.html'" value="戻る">
	</body>
</html>