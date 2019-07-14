<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>認証結果</title>
	</head>
	<body>
		<?php
			require_once("func.inc");

			authorize_user($_POST["id"],$_POST["pass"]);
		?>
	</body>
</html>