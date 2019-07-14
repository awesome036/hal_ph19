<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>セッション取得</title>
	</head>
	<body>
		<?php
			if(!empty($_POST["name"])){
				$name = $_POST["name"];
				$str = $_SESSION[$name];
				echo $str."<br>";
			}else{
				echo "<p>値を入力してください。</p>";
			}
		?>
		<input type="button" onclick="location.href='./index.html'" value="戻る">
	</body>
</html>