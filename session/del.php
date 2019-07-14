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
			if(!empty($_POST["name"])){
				$name = $_POST["name"];
				unset($_SESSION[$name]);
				echo "<p>削除しました。</p>";
			}else{
				echo "<p>値を入力してください。</p>";
			}
		?>
		<input type="button" onclick="location.href='./index.html'" value="戻る">
	</body>
</html>