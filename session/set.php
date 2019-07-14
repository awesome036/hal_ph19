<?php
	// session_start()によるキャッシュ無効を無効にする。
	session_cache_limiter('private_no_expire');
	// sessionをスタートする。
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
			if(!empty($_POST["name"]) && !empty($_POST["value"])){
				$name = $_POST["name"];
				$_SESSION[$name] = $_POST["value"];
				echo "<p>設定しました。</p>";
			}else{
				echo "<p>値を入力してください。</p>";
			}
		?>
		<input type="button" onclick="location.href='./index.html'" value="戻る">
	</body>
</html>