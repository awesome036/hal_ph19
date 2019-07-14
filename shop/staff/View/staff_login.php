<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>管理者ログイン</title>
</head>
<body>
	<form action="../Controller/StaffLoginCheckController.php" method="post">
		<label for="login_id">ログインID：</label>
		<input type="text" name="login_id" id="login_id">
		<br>
		<label for="password">パスワード：</label>
		<input type="password" name="password" id="password">
		<br>
		<input type="submit" value="ログイン">
		<?php echo $_POST["login_message"]; ?>
	</form>
</body>
</html>