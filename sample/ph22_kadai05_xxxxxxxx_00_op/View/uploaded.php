<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ファイルアップロード</title>
	</head>
	<body>
		<?php print $_POST["title"]; ?><br>
		<img src="../<?php print $_POST["filename"]; ?>"><br>
		<a href="../Controller/MenuController.php">メニュー</a>
  </body>
</html>
