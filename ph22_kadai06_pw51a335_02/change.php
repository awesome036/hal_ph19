<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>アカウント情報変更画面</title>
	</head>
	<body>
		<?php
			require_once("db_control.php");
			if(isset($_SESSION["id"])){
				$list = array();
				$list = get_account_info($_SESSION["id"]);
				$login_id = $list["login_id"];
				$password = $list["password"];
				$name = $list["name"];

				echo<<<EOM
				<form action="./change_check.php" method="post">
					<input type="text" value="{$login_id}" disabled>
					<input type="password" value="{$password}" disabled>
					<input type="text" value="{$name}" disabled>
					<br>
					<input type="text" name="login_id" value="{$login_id}" placeholder="半角英数3~10文字" required>
					<input type="password" name="password" value="{$password}" placeholder="半角英数3~10文字" required>
					<input type="text" name="name" value="{$name}" placeholder="1~20文字" maxlength="20" required>
					<br>
					<input type="submit" name="submit" value="変更">
				</form>
				<ul style="list-style-type: none; margin: 0; padding: 0;">
					<li><a href="./welcome.php">戻る</a></li>
					<li><a href="./index.html">メニュー</a></li>
				</ul>
EOM;
			}else{
				login_error();
			}
		?>
	</body>
</html>