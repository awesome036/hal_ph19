<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>登録結果</title>
	</head>
	<body>
		<?php
			require_once("func.inc");

			if($row = exist_account($_POST["id"])){
				print "<p>登録済みのIDです</p>";
		?>
				<input type="button" value="戻る" onclick="location.href='./new.html'" />
		<?php
			}else{
				add_account($_POST["id"],$_POST["pass"],$_POST["name"]);
		?>
				<input type="button" value="ホーム" onclick="location.href='./index.html'" />
		<?php
			}
		?>

	</body>
</html>