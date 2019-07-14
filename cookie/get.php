 <!DOCTYPE html>
 <html lang="ja">
 	<head>
 		<meta charset="utf-8">
 		<title>クッキー取得</title>
 	</head>
 	<body>
 		<?php
			$name = $_POST["name"];
			$str = $_COOKIE[$name];
			print $str."<br>";
		?>
		<button type="button" onclick="location.href='./index.html'">戻る</button>
 	</body>
 </html>