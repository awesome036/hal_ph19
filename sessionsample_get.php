<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>セッション確認</title>
	</head>
	<body>
		<?php
			if(isset($_SESSION["kamoku"])){
				$str = $_SESSION["kamoku"];
				echo $str;
			}else{
				echo "<p>セッションに値がありません。</p>";
			}
		?>
	</body>
</html>