<?php
	$name = $_POST["name"];
	$value = $_POST["value"];
	setcookie($name,$value,time()+180);
?>
 <!DOCTYPE html>
 <html lang="ja">
 	<head>
 		<meta charset="utf-8">
 		<title>クッキーセット</title>
 	</head>
 	<body>
		<p>設定しました。</p>
		<button type="button" onclick="location.href='./index.html'">戻る</button>
 	</body>
 </html>