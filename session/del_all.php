<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>セッション全削除</title>
	</head>
	<body>
		<?php
			$_SESSION = array();
			echo "<p>すべて削除しました。</p>";
		?>
		<input type="button" onclick="location.href='./index.html'" value="戻る">
	</body>
</html>